@extends('layouts/hr')

    @section('title')
		<title>My Salary - N.U.E Offshore Staff Portal</title>
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
                            <h3 class="page-title">My Salary</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('staff.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">My Salary</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <!-- /Page Header -->
                
                <!-- Search Filter -->
                <div class="row filter-row">
                   
                   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                        <div class="form-group form-focus">
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                            <label class="focus-label">From</label>
                        </div>
                    </div>
                   <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                        <div class="form-group form-focus">
                            <div class="cal-icon">
                                <input class="form-control floating datetimepicker" type="text">
                            </div>
                            <label class="focus-label">To</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">  
                        <a href="#" class="btn btn-success btn-block"> Search </a>  
                    </div>     
                </div>
                <!-- /Search Filter -->
                
                <div class="row">
                    <div class="col-md-12">
                    @if($salaries->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Month of</th>
                                        <th>Basic</th>
                                        <th>Housing</th>
                                        <th>Transport</th>
                                        <th>Entertainment</th>
                                        <th>Meal</th>
                                        <th>Utility</th>
                                        <th>Staff Expense</th>
                                        <th>Net Salary</th>
                                        <th>Monthly Gross</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach($salaries as $salary)
                                    <tr>
                                        <td>{{$salary->month_of->format("M, Y")}}</td>
                                        <td>₦{{number_format($salary->basic, 2)}}</td>
                                        <td>₦{{number_format($salary->housing, 2)}}</td>
                                        <td>₦{{number_format($salary->transport, 2)}}</td>
                                        <td>₦{{number_format($salary->entertainment, 2)}}</td>
                                        <td>₦{{number_format($salary->meal_allowance, 2)}}</td>
                                        <td>₦{{number_format($salary->utility_allowance, 2)}}</td>
                                        <td>₦{{number_format($salary->net_pay, 2)}}</td>
                                        <td>₦{{number_format($salary->net_salary, 2)}}</td>
                                        <td>₦{{number_format($salary->gross_income, 2)}}</td>

                                        <td><a class="btn btn-sm btn-primary" href="{{route('hr.mypayslip', ['id' => $salary->id] )}}">Generate Payslip</a></td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    @else
                    <hr/>
                    <div class="col-md-6">
                        <h3>OPPSSS!!!! </h3>
                        <p>Sorry! there are no salaries for your profile at this time. Check back soon</p>
                        <a class="btn btn-danger" href="javascript:history.back()">Go Back</a>

                    </div>
                    @endif
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
                        
        </div>
        <!-- /Page Wrapper -->
    @endsection