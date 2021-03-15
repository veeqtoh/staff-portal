<?php

namespace App\Http\Controllers;

use App\Payroll;
use App\User;
use App\Profile;
use App\Category;
use App\Department;
use App\Position;
use App\Pfa;
use Session;
use App\ReportsTo;
use Carbon\Carbon;
use Notification;
use App\Notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    /**Return months for which to search payroll by per category */
    
    public function payroll($cat)
    {
        //dd($cat);
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $timestamp = mktime(0, 0, 0, date('n') - $i, 1);
            $months[date('n', $timestamp)] = date('F-Y', $timestamp);
        }

        $employees = User::where('category_id', $cat)->get();

        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        if($cat == 1){
            $title = "Crew - NUE Defender";
        }elseif($cat == 2){
            $title = "Crew - SVS Guardsman"; 
        }elseif($cat == 3){
            $title = "Crew - NUE Defender I";
        }elseif($cat == 4){
            $title = "Crew - NUE Swift";
        }elseif($cat == 5){
            $title = "Crew - NUE Strider";
        }elseif($cat == 6){
            $title = "Staff";
        }elseif($cat == 7){
            $title = "Crew - NUE Lince";
        }

        return view('hr.payroll.index',[
            'title' => $title,
            'cat' => $cat,
            'months' => $months,
            'employees' => $employees,
        ],$data);
    }

    /** Month returns end and Payroll results starts here */

    public function payroll_details($cat, $month)
    {
        $cpayroll = Payroll::where([
            ['category_id', '=', $cat],
            ['month_of', 'like', '%'.date("Y-m", strtotime($month)).'%'],
                ])->get()->count();

            //dd($cpayroll);
            
        if($cpayroll > 0)
        {
            $payroll = Payroll::where([
                    ['month_of', 'like', '%'.date("Y-m", strtotime($month)).'%'],
                        ])->get();

                $data['notification'] = Notifications::where([
                    ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
                ])->get();

                if($cat == 1){
                    $title = "Crew - NUE Defender";
                }elseif($cat == 2){
                    $title = "Crew - SVS Guardsman"; 
                }elseif($cat == 3){
                    $title = "Crew - NUE Defender I";
                }elseif($cat == 4){
                    $title = "Crew - NUE Swift";
                }elseif($cat == 5){
                    $title = "Crew - NUE Strider";
                }elseif($cat == 6){
                    $title = "Staff";
                }elseif($cat == 7){
                    $title = "Crew - NUE Lince";
                }

                return view('hr.payroll.result',[
                    'payroll' => $payroll,
                    'month' => $month,
                    'cat' => $cat,
                    'title' => $title,
                ],$data);

        }else{
            Session::flash('info', 'Sorry, there are no payroll created for the month requested.');
            return redirect()->back();    
        }
    }

    /** Payroll results ends and Payslip starts here */
    
    public function payslip($id)
    {
        $payslip = Payroll::find($id);
        
        $data['notification'] = Notifications::where([
            ['receiver', '=', auth()->user()->id],['status', '=', 'SENT'],
        ])->get();

        return view('hr.payroll.payslip', [
            'payslip' => $payslip,

        ],$data);
    }

    /** Payslip ends and *** starts here */

    /**
     * Store a newly created payslip.
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $validatedData = $request->validate([
        'employee' => 'required',
        'month_of' => 'required',
        'basic' => 'required',
        'housing' => 'required',
        'transport' => 'required'
        ]);

        //dd($request->employee, date("Y-m", strtotime($request->month_of)));
        $cpayroll = Payroll::where([
                            ['employee_id', '=', $request->employee],
                            ['month_of', 'like', '%'.date("Y-m", strtotime($request->month_of)).'%'],
                                ])->get()->count();

                            //dd($cpayroll);
                            

        if($cpayroll == 1)
        {
            Session::flash('info', 'You are trying to add an already created payslip.');
            return redirect()->back();
            
        }else{
            $user = User::find($request->employee);
            $payroll = new Payroll;
            $payroll->employee_id = $request->employee;
            $payroll->basic = str_replace(",","",$request->basic);
            $payroll->housing = str_replace(",","",$request->housing);
            $payroll->transport = str_replace(",","",$request->transport);
            $payroll->entertainment = str_replace(",","",$request->entertainment);
            $payroll->meal_allowance = str_replace(",","",$request->meal_allowance);
            $payroll->utility_allowance = str_replace(",","",$request->utility_allowance);
            $payroll->gross_pay = str_replace(",","",$request->gross_pay);
            $payroll->gross_income = str_replace(",","",$request->gross_income);
            $payroll->total_tax_relief = str_replace(",","",$request->total_tax_relief);
            $payroll->taxable_pay = str_replace(",","",$request->taxable_pay);
            $payroll->total_statutory_deductions = str_replace(",","",$request->total_statutory_deductions);
            $payroll->employer_pension_contribution = str_replace(",","",$request->employer_pension_contribution);
            $payroll->total_pension_contribution = str_replace(",","",$request->total_pension_contribution);
            $payroll->pension_contribution = str_replace(",","",$request->pension_contribution);
            $payroll->net_salary = str_replace(",","",$request->net_salary);
            $payroll->net_pay = str_replace(",","",$request->net_pay);
            $payroll->paye_tax = str_replace(",","",$request->paye_tax);
            $payroll->month_of = $request->month_of;
            $payroll->days_worked = $request->days_worked;
            $payroll->ref = strtoupper(substr(md5(now()), 0, 5));
            $payroll->day_rate = ($payroll->gross_income / $request->days_worked);
            $payroll->category_id = $user->category_id;

            if(!empty($request->loan_deduction) || !is_null($request->loan_deduction)){
                $payroll->loan_deduction = str_replace(",","",$request->loan_deduction);
            }
            if(!empty($request->salary_overpayment) || !is_null($request->salary_overpayment)){
                $payroll->salary_overpayment = str_replace(",","",$request->salary_overpayment);
            }
            if(!empty($request->reimbursements) || !is_null($request->reimbursements)){
                $payroll->reimbursements  = str_replace(",","",$request->reimbursements);
            }
            if(!empty($request->loan_addition) || !is_null($request->loan_addition)){
                $payroll->loan_addition  = str_replace(",","",$request->loan_addition);
            }

            $payroll->save();

            $payslip_for = array();
            array_push($payslip_for, User::find($request->employee));
            //dd($payslip_for);

           // Notification::send($payslip_for, new \App\Notifications\NewPayslipAdded());
            
            Session::flash('success', 'You have successfully Generated a staff salary.');
                return redirect()->back();
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payroll  $payroll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payroll $payroll)
    {
        //
    }




}
