<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Category;
use App\Department;
use App\Position;
use App\Pfa;
use App\Payroll;
use Session;
use App\ReportsTo;
use App\Report;
use Carbon\Carbon;
use Notification;
use App\Notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function weekly_reports()
    {
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $timestamp = mktime(0, 0, 0, date('n') - $i, 1);
            $months[date('n', $timestamp)] = date('F-Y', $timestamp);
        }

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('hr.reports',[
            'months' => $months,
        ],$data);
  
    }

    public function daily_reports()
    {
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $timestamp = mktime(0, 0, 0, date('n') - $i, 1);
            $months[date('n', $timestamp)] = date('F-Y', $timestamp);
        }

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('crew.reports',[
            'months' => $months,
        ],$data);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'report_date' => ['required'],
            'report' => ['required', 'mimetypes:application/pdf', 'max:10000'],
        ]);

        if($request->hasFile('report'))
        {
            // get file
            $filenameWithExt = $request->file('report')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '', $filename);
            $ext = $request->file('report')->getClientOriginalExtension();
            $storedname = $filename.'_'.time().'.'.$ext;
            $store = $request->file('report')->storeAs('public/uploads/employees/' . Auth::user()->id .'/reports/', $storedname);
            if($store)
            {
                $clpath = Storage::url($storedname);
                $imgfile = str_replace('/storage/', 'storage/uploads/employees/' . Auth::user()->id . '/reports/', $clpath);
            }
        }else
        {
            $imgfile = NULL;
        }

        $report = Report::create([
            'user_id' => AUTH::user()->id,
            'category_id' => AUTH::user()->category_id,
            'report_date' => $request->report_date,
            'report' => $imgfile,
        ]); 
        
        Session::flash('success', 'You have successfully uploaded a report.');
        return redirect()->back();
    }

    public function reports_details($cat, $month)
    {
        $creports = Report::where([
            ['category_id', '=', $cat],
            ['report_date', '>', Carbon::now()->startOfMonth()],
            ['report_date', '<', Carbon::now()->endOfMonth()],
                ])->get()->count();

            //dd($cpayroll);
            
        if($creports > 0)
        {
            $reports = Report::where('report_date', '>', Carbon::now()->startOfMonth())
                                ->where('report_date', '<', Carbon::now()->endOfMonth())
                                ->where('category_id', '=', $cat)
                                ->latest()->get();

                $data['notification'] = Notifications::where([
                    ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
                ])->get();

                return view('hr.report_details',[
                    'reports' => $reports,
                    'month' => $month,
                    'cat' => $cat,
                ],$data);

        }else{
            Session::flash('info', 'Sorry, there are no reports created for the month requested yet.');
            return redirect()->back();    
        }
    }

    public function daily_reports_details($cat, $month)
    {
        $creports = Report::where([
            ['category_id', '=', $cat],
            ['report_date', '>', Carbon::now()->startOfMonth()],
            ['report_date', '<', Carbon::now()->endOfMonth()],
                ])->get()->count();

            //dd($cpayroll);
            
        if($creports > 0)
        {
            $reports = Report::where('report_date', '>', Carbon::now()->startOfMonth())
                                ->where('report_date', '<', Carbon::now()->endOfMonth())
                                ->where('category_id', '=', $cat)
                                ->latest()->get();

                $data['notification'] = Notifications::where([
                    ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
                ])->get();

                return view('crew.report_details',[
                    'reports' => $reports,
                    'month' => $month,
                    'cat' => $cat,
                ],$data);

        }else{
            Session::flash('info', 'Sorry, there are no reports created for the month requested yet.');
            return redirect()->back();    
        }
    }


    public function update(Request $request, Report $report)
    {
        //
    }

    public function destroy(Report $report)
    {
        //
    }
}
