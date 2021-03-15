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


class MdController extends Controller
{
   
    public function index()
    {
        $crew_defender = User::where('category_id', '=', 1)->get();
        $crew_guardsman = User::where('category_id', '=', 2)->get();
        $crew_defender_i = User::where('category_id', '=', 3)->get();
        $crew_swift = User::where('category_id', '=', 4)->get();
        $crew_strider = User::where('category_id', '=',5 )->get();
        $crew_lince = User::where('category_id', '=',7 )->get();
        $staff = User::where('category_id', '=', 6)->get();
        $users = User::all()->take(5);
        $payroll = Payroll::all()->take(5);

        $data['notification'] = Notifications::where([
    		    	['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
                ])->get();
                
        return view('md/index',[
            'crew_defender' => $crew_defender,
            'crew_guardsman' => $crew_guardsman,
            'crew_defender_i' => $crew_defender_i,
            'crew_swift' => $crew_swift,
            'crew_strider' => $crew_strider,
            'crew_lince' => $crew_lince,
            'staff' => $staff,
            'users' => $users,
            'payroll' => $payroll,
        ],$data);
    }

    //return page with all employees in divs
    public function employees()
    {
        $users = User::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    //->take(66)
                    ->get();
        $categories = Category::all();
        $departments = Department::all();
        //$colleagues = User::where('department_id',$employee->department_id)->where('id', '!=', $employee->id)->get();
        $positions = Position::all();

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('md.employees.index', [
            'users' => $users,
            'categories' => $categories,
            'departments' => $departments,
            'positions' => $positions,
            //'colleagues' => $colleagues
        ],$data);
    }

    //return page with all employees in tabular form
    public function employees_list()
    {
        $users = User::where('deleted_at', NULL)
                    ->orderBy('id', 'desc')
                    //->take(66)
                    ->get();
        $categories = Category::all();
        $departments = Department::all();
        $positions = Position::all();
        //$colleagues = User::where('department_id',$employee->department_id)->where('id', '!=', $employee->id)->get();

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('md.employees.list', [
            'users' => $users,
            'categories' => $categories,
            'departments' => $departments,
            'positions' => $positions,
            $data,
            //'colleagues' => $colleagues
        ]);
    }

    public function fetch($id)
    {
        $departments = Department::where('category_id',$id)->latest()->get();
        //dd($departments);
        return response()->json($departments);
    }

    public function fetchpos($id)
    {
        $positions = Position::where('department_id', $id)->latest()->get();
        return response()->json($positions);
    }

    //return page to allow MD create new employee accounts
    public function employee_create()
    {
        return view('md.employees.create');
    }

    public function employee_delete($id)
    {
        $employee = User::find($id);
        if($employee == Auth::user())
        {
            //Session::flash('error', 'You are not permited to deactivate your own account! Are you normal?');
            Session::flash('error', 'Chief, why would you want to disable your own account? Is everything well with you at all?');
            return redirect()->back();
        }else{
          $employee -> delete();

        Session::flash('success', 'You have successfully deleted an Employee.');
            return redirect()->route('md.employees');
        }  
    }
        
    public function employee_profile($slug)
    {
        $employee = User::where('slug',$slug)->get()->first();
        $pfas = Pfa::all();
        $colleagues = User::where('department_id',$employee->department_id)->where('id', '!=', $employee->id)->get();
        $categories = Category::all();
        $departments = Department::all();
        $positions = Position::all();

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('md.employees.profile',[
            'employee' => $employee,
            'pfas' => $pfas,
            'colleagues' => $colleagues,
            'categories' => $categories,
            'departments' => $departments,
            'positions' => $positions,
        ], $data);
    }

    public function employee_search_results($query)
    {
        $users = User::with('profile')->where('name', 'like', '%' . request('query'). '%')->whereHas('profile')->orderByRaw('RAND()')->paginate(15);
        $categories = Category::all();
        $departments = Department::all();
        //$colleagues = User::where('department_id',$employee->department_id)->where('id', '!=', $employee->id)->get();
        $positions = Position::all();

        $data['notification'] = Notifications::where([
        ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('md.employees.index', [
        'users' => $users,
        'categories' => $categories,
        'departments' => $departments,
        'positions' => $positions,
        'query' => request('query'),
        ],$data); 
        
    }

    public function employee_trashed()
    {
        $users = User::onlyTrashed()->get();
        $categories = Category::all();
        $departments = Department::all();
        //$colleagues = User::where('department_id',$employee->department_id)->where('id', '!=', $employee->id)->get();
        $positions = Position::all();

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('md.employees.trashed', [
            'users' => $users,
            'categories' => $categories,
            'departments' => $departments,
            'positions' => $positions,
            //'colleagues' => $colleagues
        ],$data);
    }

    public function employee_kill($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        $user->forceDelete();

        Session::flash('success', 'Employee account deleted Permanently.');
            return redirect()->back();
    }

    public function employee_restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->first();

        $user->restore();

        Session::flash('success', 'Employee account restored Successfully.');
            return redirect()->route('md.employees');
    }

    public function my_profile()
    {
        $employee = User::find(AUTH::user()->id);
        $categories = Category::all();
        $departments = Department::all();
        $positions = Position::all();
        $pfas = Pfa::all();

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('md.profile', [
            'employee' => $employee,
            'departments' => $departments,
            'categories' => $categories,
            'positions' => $positions,
            'pfas' => $pfas,
        ],$data);
    }

    public function update_my_profile(Request $request)
    {
        $employee = User::find(AUTH::user()->id);

        if($request->hasFile('dp'))
        {
            // get file
            $filenameWithExt = $request->file('dp')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '', $filename);
            $ext = $request->file('dp')->getClientOriginalExtension();
            $storedname = $filename.'_'.time().'.'.$ext;
            $store = $request->file('dp')->storeAs('public/uploads/employees/' . $employee->id .'/dp/', $storedname);
            if($store)
            {
                $path = Storage::url($storedname);
                $imgfile = str_replace('/storage/', 'storage/uploads/employees/' . $employee->id . '/dp/', $path);
                $employee->profile->avatar = $imgfile;
                $employee->profile->save();
            }
        }

        if($request->hasFile('contract_letter'))
        {
            // get file
            $filenameWithExt = $request->file('contract_letter')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename = str_replace(' ', '', $filename);
            $ext = $request->file('contract_letter')->getClientOriginalExtension();
            $storedname = $filename.'_'.time().'.'.$ext;
            $store = $request->file('contract_letter')->storeAs('public/uploads/employees/' . $employee->id .'/documents/', $storedname);
            if($store)
            {
                $path = Storage::url($storedname);
                $imgfile = str_replace('/storage/', 'storage/uploads/employees/' . $employee->id . '/documents/', $path);
                $employee->profile->contract_letter = $imgfile;
                $employee->profile->save();
            }
        }

        if($request->has('password'))
        {
            if(!empty($request->password) || !is_null($request->password))
            {
                $employee->password = bcrypt($request->password);
                $employee->save();
            }
        }

        if($request->has('f_name') && !empty($request->f_name))
        {
            $employee->f_name = $request->f_name;
        }
        
        if($request->has('l_name') && !empty($request->l_name))
        {
            $employee->l_name = $request->l_name;
        }
        
        if($request->has('o_name') && !empty($request->o_name))
        {
            $employee->o_name = $request->o_name;
        }

        if($request->has('role') && !empty($request->role))
        {
            $employee->role = $request->role;
        }

        if($request->has('email') && !empty($request->email))
        {
            $employee->email = $request->email;
        }

        if($request->has('category') && !empty($request->category))
        {
            $employee->category_id = $request->category;
        }

        if($request->has('department') && !empty($request->department))
        {
            $employee->department_id = $request->department;
        }

        if($request->has('position') && !empty($request->position))
        {
            $employee->position_id = $request->position;
        }

        if($request->has('start_date') && !is_null($request->start_date))
        {
            $employee->profile->start_date = $request->start_date;
            $employee->profile->save();
        }

        if($request->has('phone') && !empty($request->phone))
        {
            $employee->profile->phone = $request->phone;
            $employee->profile->save();
        }

        if($request->has('emp_id') && !empty($request->emp_id))
        {
            $employee->profile->emp_id = $request->emp_id;
            $employee->profile->save();
        }

        if($request->has('gender') && !empty($request->gender))
        {
            $employee->profile->gender = $request->gender;
            $employee->profile->save();
        }

        if($request->has('d_o_b') && !empty($request->d_o_b))
        {
            $employee->profile->d_o_b = $request->d_o_b;
            $employee->profile->save();
        }

        if($request->has('r_address') && !empty($request->r_address))
        {
            $employee->profile->r_address = $request->r_address;
            $employee->profile->save();
        }

        if($request->has('p_address') && !empty($request->p_address))
        {
            $employee->profile->p_address = $request->p_address;
            $employee->profile->save();
        }

        if($request->has('nhf_no') && !empty($request->nhf_no))
        {
            $employee->profile->nhf_no = $request->nhf_no;
            $employee->profile->save();
        }

        if($request->has('nhf_no') && !empty($request->nhf_no))
        {
            $employee->profile->nhf_no = $request->nhf_no;
            $employee->profile->save();
        }

        if($request->has('rsa_pin_no') && !empty($request->rsa_pin_no))
        {
            $employee->profile->rsa_pin_no = $request->rsa_pin_no;
            $employee->profile->save();
        }

        if($request->has('grade') && !empty($request->grade))
        {
            $employee->profile->grade = $request->grade;
            $employee->profile->save();
        }

        if($request->has('pfa') && !empty($request->pfa))
        {
            $employee->profile->pfa = $request->pfa;
            $employee->profile->save();
        }

        if($request->has('title') && !empty($request->title))
        {
            $employee->profile->title = $request->title;
            $employee->profile->save();
        }

        if($request->has('p_address') && !empty($request->p_address))
        {
            $employee->profile->p_address = $request->p_address;
            $employee->profile->save();
        }

        if($request->has('p_o_b') && !empty($request->p_o_b))
        {
            $employee->profile->p_o_b = $request->p_o_b;
            $employee->profile->save();
        }

        if($request->has('nationality') && !empty($request->nationality))
        {
            $employee->profile->nationality = $request->nationality;
            $employee->profile->save();
        }

        if($request->has('state_of_origin') && !empty($request->state_of_origin))
        {
            $employee->profile->state_of_origin = $request->state_of_origin;
            $employee->profile->save();
        }

        if($request->has('home_town') && !empty($request->home_town))
        {
            $employee->profile->home_town = $request->home_town;
            $employee->profile->save();
        }

        if($request->has('local_govt') && !empty($request->local_govt))
        {
            $employee->profile->local_govt = $request->local_govt;
            $employee->profile->save();
        }

        if($request->has('marital_status') && !empty($request->marital_status))
        {
            $employee->profile->marital_status = $request->marital_status;
            $employee->profile->save();
        }

        if($request->has('religion') && !empty($request->religion))
        {
            $employee->profile->religion = $request->religion;
            $employee->profile->save();
        }

        if($request->has('name_of_spouse') && !empty($request->name_of_spouse))
        {
            $employee->profile->name_of_spouse = $request->name_of_spouse;
            $employee->profile->save();
        }

        if($request->has('maiden_name') && !empty($request->maiden_name))
        {
            $employee->profile->maiden_name = $request->maiden_name;
            $employee->profile->save();
        }

        if($request->has('spouse_phone') && !empty($request->spouse_phone))
        {
            $employee->profile->spouse_phone = $request->spouse_phone;
            $employee->profile->save();
        }

        if($request->has('address_of_spouse') && !empty($request->address_of_spouse))
        {
            $employee->profile->address_of_spouse = $request->address_of_spouse;
            $employee->profile->save();
        }

        if($request->has('next_of_kin_ben') && !empty($request->next_of_kin_ben))
        {
            $employee->profile->next_of_kin_ben = $request->next_of_kin_ben;
            $employee->profile->save();
        }

        if($request->has('relationship_ben') && !empty($request->relationship_ben))
        {
            $employee->profile->relationship_ben = $request->relationship_ben;
            $employee->profile->save();
        }

        if($request->has('address_ben') && !empty($request->address_ben))
        {
            $employee->profile->address_ben = $request->address_ben;
            $employee->profile->save();
        }

        if($request->has('tel_ben') && !empty($request->tel_ben))
        {
            $employee->profile->tel_ben = $request->tel_ben;
            $employee->profile->save();
        }

        if($request->has('next_of_kin_em') && !empty($request->next_of_kin_em))
        {
            $employee->profile->next_of_kin_em = $request->next_of_kin_em;
            $employee->profile->save();
        }

        if($request->has('relationship_em') && !empty($request->relationship_em))
        {
            $employee->profile->relationship_em = $request->relationship_em;
            $employee->profile->save();
        }

        if($request->has('address_em') && !empty($request->address_em))
        {
            $employee->profile->address_em = $request->address_em;
            $employee->profile->save();
        }

        if($request->has('tel_em') && !empty($request->tel_em))
        {
            $employee->profile->tel_em = $request->tel_em;
            $employee->profile->save();
        }

        if($request->has('disability') && !empty($request->disability))
        {
            $employee->profile->disability = $request->disability;
            $employee->profile->save();
        }

        if($request->has('height') && !empty($request->height))
        {
            $employee->profile->height = $request->height;
            $employee->profile->save();
        }

        if($request->has('weight') && !empty($request->weight))
        {
            $employee->profile->weight = $request->weight;
            $employee->profile->save();
        }

        if($request->has('blood_group') && !empty($request->blood_group))
        {
            $employee->profile->blood_group = $request->blood_group;
            $employee->profile->save();
        }

        if($request->has('genotype') && !empty($request->genotype))
        {
            $employee->profile->genotype = $request->genotype;
            $employee->profile->save();
        }

        if($request->has('hobbies') && !empty($request->hobbies))
        {
            $employee->profile->hobbies = $request->hobbies;
            $employee->profile->save();
        }

        if($request->has('indebted') && !empty($request->indebted))
        {
            $employee->profile->indebted = $request->indebted;
            $employee->profile->save();
        }

        if($request->has('languages') && !empty($request->languages))
        {
            $employee->profile->languages = $request->languages;
            $employee->profile->save();
        }

        if($request->has('debt_details') && !empty($request->debt_details))
        {
            $employee->profile->debt_details = $request->debt_details;
            $employee->profile->save();
        }

        if($request->has('intention') && !empty($request->intention))
        {
            $employee->profile->intention = $request->intention;
            $employee->profile->save();
        }

        if($request->has('convict') && !empty($request->convict))
        {
            $employee->profile->convict = $request->convict;
            $employee->profile->save();
        }

        if($request->has('crime_details') && !empty($request->crime_details))
        {
            $employee->profile->crime_details = $request->crime_details;
            $employee->profile->save();
        }

        if($request->has('bank_name') && !empty($request->bank_name))
        {
            $employee->profile->bank_name = $request->bank_name;
            $employee->profile->save();
        }

        if($request->has('account_no') && !empty($request->account_no))
        {
            $employee->profile->account_no = $request->account_no;
            $employee->profile->save();
        }

        if($request->has('sort_code') && !empty($request->sort_code))
        {
            $employee->profile->sort_code = $request->sort_code;
            $employee->profile->save();
        }

        if($request->has('reports_to') && !empty($request->reports_to))
        {
            //dd($request->reports_to);
            if(ReportsTo::where('user_id', $employee->id )->exists())
            {
                $rep = ReportsTo::where('user_id',$employee->id)->first();
                $rep->reports_to = $request->reports_to;
                $rep->save();
            }else
            {
                $rep = new ReportsTo;
                $rep->user_id = $employee->id;
                $rep->reports_to = $request->reports_to;
                $rep->save();
            }
                
        }

        if($request->has('f_name') && !empty($request->f_name) && $request->has('o_name') && !empty($request->o_name) && $request->has('l_name') && !empty($request->l_name))
        {
            $employee->slug = str_slug($request->f_name.' '.$request->o_name.' '.$request->l_name);
            $employee->save();
        }

        Session::flash('success', 'You have successfully updated an Employee account.');
        return redirect()->back();
    }

    public function mysalary()
    {
        $salaries = Payroll::where('employee_id', Auth::user()->id)->get();

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('md.salary',[
            'salaries' => $salaries,
        ], $data);
    }

    public function mypayslip($id)
    {
        $payslip = Payroll::find($id);
        
        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('md.mypayslip', [
            'payslip' => $payslip,
        ],$data);
    }

    public function reports($cat)
    {
        //dd(Carbon::now()->endOfMonth());
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $timestamp = mktime(0, 0, 0, date('n') - $i, 1);
            $months[date('n', $timestamp)] = date('F-Y', $timestamp);
        }

        $reports = Report::where('category_id', $cat)->get();

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        if($cat == 1){
            $title = "NUE Defender Daily Reports";
        }elseif($cat == 2){
            $title = "SVS Guardsman Daily Reports"; 
        }elseif($cat == 3){
            $title = "NUE Defender I Daily Reports";
        }elseif($cat == 4){
            $title = "NUE Swift Daily Reports";
        }elseif($cat == 5){
            $title = "NUE Strider Daily Reports";
        }elseif($cat == 6){
            $title = "Staff Weekly Reports";
        }elseif($cat == 7){
            $title = "NUE Lince Daily Reports";
        }

        return view('md.reports.index',[
            'title' => $title,
            'cat' => $cat,
            'months' => $months,
            'reports' => $reports,
        ],$data);
  
    }

    /** Month returns end and Payroll results starts here */

    public function reports_details($cat, $month)
    {
        //dd(Carbon::parse($month)->endOfMonth());
        $creports = Report::where('category_id', '=', $cat)
                            ->where('report_date', '>=', Carbon::parse($month)->startOfMonth())
                            ->where('report_date', '<=', Carbon::parse($month)->endOfMonth())
                            ->get()->count(); 

        if($creports > 0)
        {
            $reports = Report::where('category_id', '=', $cat)
                                ->where('report_date', '>', Carbon::parse($month)->startOfMonth())
                                ->where('report_date', '<', Carbon::parse($month)->endOfMonth())
                                ->get();

                $data['notification'] = Notifications::where([
                    ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
                ])->get();

                if($cat == 1){
                    $title = "NUE Defender Daily Reports";
                }elseif($cat == 2){
                    $title = "SVS Guardsman Daily Reports"; 
                }elseif($cat == 3){
                    $title = "NUE Defender I Daily Reports";
                }elseif($cat == 4){
                    $title = "NUE Swift Daily Reports";
                }elseif($cat == 5){
                    $title = "NUE Strider Daily Reports";
                }elseif($cat == 6){
                    $title = "Staff Weekly Reports";
                }elseif($cat == 7){
                    $title = "NUE Lince Daily Reports";
                }

                return view('md.reports.details',[
                    'reports' =>$reports,
                    'month' => $month,
                    'cat' => $cat,
                    'title' => $title,
                ],$data);

        }else{
            Session::flash('info', 'Sorry, there are no reports created for the month requested yet.');
            return redirect()->back();    
        }
    }
}
