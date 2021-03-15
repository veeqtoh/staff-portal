@extends('layouts/crew')

    @section('title')
		<title>My {{$payslip->month_of->format("F Y")}} Payslip - N.U.E Offshore Staff Portal</title>
	@endsection

    @section('body')
        <!-- Page Wrapper -->
        <div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">My Payslip</h3>
                            <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('staff.home')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{route('staff.salary')}}">My Salary</a></li>
                                <li class="breadcrumb-item active">My {{$payslip->month_of->format("F Y")}} Payslip</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-white">CSV</button>
                                <button class="btn btn-white">PDF</button>
                                <button class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="payslip-title">Payslip for the month of {{$payslip->month_of->format("F, Y")}}</h4>
                                <div class="row">
                                    <div class="col-sm-6 m-b-20">
                                        <img src="img\logo2.png" class="inv-logo" alt="">
                                        <ul class="list-unstyled mb-0">
                                            <li>N.U.E Offshore Resources LTD.</li>
                                            <li>26, Prof Kiumi Akingbehin street,</li>
                                            <li>Off Awkuzu, Off Omorinre Johnson,</li>
                                            <li>Lekki phase 1, Nigeria.</li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6 m-b-20">
                                        <div class="invoice-details">
                                            <h3 class="text-uppercase">Payslip #{{$payslip->ref}}</h3>
                                            <ul class="list-unstyled">
                                                <li>Salary Month: <span>{{$payslip->month_of->format("F, Y")}}</span></li>
                                                <li>Day Rate: <span>{{number_format($payslip->day_rate, 2)}}</span></li>
                                                <li>Days Worked: <span>{{$payslip->days_worked}} days</span></li>
                                                @if($payslip->employee->profile->account_no)
                                                <li>Bank Name: <span>{{$payslip->employee->profile->bank_name}}</span></li>
                                                <li>Account Number: <span>{{$payslip->employee->profile->account_no}}</span></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 m-b-20">
                                        <ul class="list-unstyled">
                                            <li><h5 class="mb-0"><strong>{{$payslip->employee->f_name}} {{$payslip->employee->l_name}}</strong></h5></li>
                                            <li><span>{{$payslip->employee->position->name}}</span></li>
                                            @if($payslip->employee->profile->emp_id)
                                            <li>Employee ID: {{$payslip->employee->profile->emp_id}}</li>
                                            @endif
                                            <li>Joined: {{$payslip->employee->profile->start_date->DiffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div>
                                            <h4 class="m-b-10"><strong>Earnings</strong></h4>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Basic Pay</strong> <span class="float-right">₦{{number_format($payslip->basic, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Housing</strong> <span class="float-right">₦{{number_format($payslip->housing, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Transport</strong> <span class="float-right">₦{{number_format($payslip->transport, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Entertainment</strong> <span class="float-right">₦{{number_format($payslip->entertainment, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Meal Allowance</strong> <span class="float-right">₦{{number_format($payslip->meal_allowance, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Utility Allowance</strong> <span class="float-right">₦{{number_format($payslip->utility_allowance, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Gross Pay</strong> <span class="float-right">₦{{number_format($payslip->gross_pay, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>LESS: Total Tax Reliefs</strong> <span class="float-right">₦{{number_format($payslip->total_tax_relief, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Taxable Pay</strong> <span class="float-right">₦{{number_format($payslip->taxable_pay, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>PAYE Tax</strong> <span class="float-right">₦{{number_format($payslip->paye_tax, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Pension Contribution</strong> <span class="float-right">₦{{number_format($payslip->pension_contribution, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Total Statutory Deductions</strong> <span class="float-right">₦{{number_format($payslip->total_statutory_deductions, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Employer Pension Contributions</strong> <span class="float-right">₦{{number_format($payslip->employer_pension_contribution, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Staff Expense/Offshore Call Card</strong> <span class="float-right" style="color:blue"><strong>₦{{number_format($payslip->net_pay, 2)}}</strong></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>NET SALARY</strong> <span class="float-right" style="color:blue"><strong>₦{{number_format($payslip->net_salary, 2)}}</strong></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div>
                                            <h4 class="m-b-10"><strong>Deductions</strong></h4>
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Total Pension Contribution</strong> <span class="float-right" style="color:red">₦{{number_format($payslip->total_pension_contribution, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Loan Deduction</strong> <span class="float-right">₦{{number_format($payslip->loan_deduction, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Salary Overpayment</strong> <span class="float-right">₦{{number_format($payslip->salary_overpayment, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Reimbursements</strong> <span class="float-right">₦{{number_format($payslip->reimbursements, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Loan Addition</strong> <span class="float-right">₦{{number_format($payslip->loan_addition, 2)}}</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Total Deductions</strong> <span class="float-right"><strong>₦{{number_format($payslip->total_deductions, 2)}}</strong></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{--<div class="col-sm-12">
                                        <p><strong>Net Salary: $59698</strong> (Fifty nine thousand six hundred and ninety eight only.)</p>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            
        </div>
        <!-- /Page Wrapper -->
    @endsection
 