@extends('layouts/md')

    @section('title')
		<title>Dashboard - N.U.E Offshore Staff Portal</title>
	@endsection

    @section('body')
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Welcome {{Auth::user()->f_name}}!</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->           

                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$staff->count()}}</h3>
                                    <span>Staff Members</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-ship"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$crew_guardsman->count()}}</h3>
                                    <span>Crew Members - SVS Guardsman</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-ship"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$crew_defender->count()}}</h3>
                                    <span>Crew Members - NUE Defender</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-ship"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$crew_defender_i->count()}}</h3>
                                    <span>Crew Members - NUE Defender I</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-ship"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$crew_swift->count()}}</h3>
                                    <span>Crew Members - NUE Swift</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-ship"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$crew_strider->count()}}</h3>
                                    <span>Crew Members - NUE Strider</span>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-ship"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$crew_lince->count()}}</h3>
                                    <span>Crew Members - NUE Lince</span>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Employees</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($users->count() >0)
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{route('md.employee.profile', ['slug' => $user->slug] )}}" class="avatar"><img alt="" src="{{$user->profile->avatar}}" width="25px" height="40px"></a>
                                                            <a href="{{route('md.employee.profile', ['slug' => $user->slug] )}}">{{$user->f_name}} {{$user->l_name}}<span>{{$user->position->name}}</span></a>
                                                        </h2>
                                                    </td>
                                                    <td>{{str_limit($user->email, $limit = 10, $end = '...')}}</td>
                                                    <td>
                                                        <div class="dropdown action-label">
                                                            <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="fa fa-dot-circle-o text-success"></i> Active
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Active</a>
                                                                <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Inactive</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a class="dropdown-item" href="{{route('md.employee.profile', ['slug' => $user->slug] )}}"><i class="fa fa-pencil m-r-5"></i>Profile</a>
                                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee{{$user->id}}"><i class="fa fa-trash-o m-r-5"></i> Deactivate</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <!-- Delete Employee Modal -->
                                                <div class="modal custom-modal fade" id="delete_employee{{$user->id}}" role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="form-header">
                                                                    <h3>Disable {{$user->f_name}} {{$user->l_name}}</h3>
                                                                    <p>Are you sure want to disable this employee account?</p>
                                                                </div>
                                                                <div class="modal-btn delete-action">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <a href="{{route('md.employee.delete', ['id'=>$user->id])}}" class="btn btn-primary continue-btn">Disable</a>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Delete Employee Modal -->
                                            @endforeach
                                        @else
                                        <tr><td>No Employees at this time</td></tr>
                                        @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('md.employees')}}">View all employees</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card card-table flex-fill">
                            <div class="card-header">
                                <h3 class="card-title mb-0">Payroll</h3>
                            </div>
                            <div class="card-body">
                            @if($payroll->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-nowrap custom-table mb-0">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>Month of</th>
                                                <th>Gross Income</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            @foreach($payroll as $p)
                                            <tr>
                                                <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{route('md.employee.profile', ['slug' => $p->employee->slug] )}}" class="avatar"><img alt="" src="{{$p->employee->profile->avatar}}"></a>
                                                    <a href="{{route('md.employee.profile', ['slug' => $p->employee->slug] )}}">{{$p->employee->f_name}} {{str_limit($p->employee->l_name, $limit = 1, $end = '.')}} <span>{{$p->employee->position->name}}</span></a>
                                                </h2>
                                            </td>
                                                <td>{{$p->month_of->format("M, Y")}}</td>
                                                <td>₦{{number_format($p->gross_pay, 2)}}</td>
                                                <td><a class="btn btn-sm btn-primary" href="{{route('md.payslip', ['id' => $p->id] )}}">Generate Payslip</a></td>

                                                {{--<td>
                                                    <span class="badge bg-inverse-success"> Paid</span>
                                                </td>--}}
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            @else
                            <div class="card-footer">
                                <p>Ain't no one paid salary yet. Click <a href="{{route('md.payroll', ['cat' => 6] )}}">here</a> to pay salaries</p>
                            </div>
                            @endif
                            </div>
                            <div class="card-footer">
                                <a href="{{route('md.payroll', ['cat' => 6] )}}">View all payroll</a>
                            </div>
                        </div>
                    </div>
                </div> 

                <!-- Statistics Widget -->
                {{--<div class="row">
                    
                    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h4 class="card-title">Today Absent <span class="badge bg-inverse-danger ml-2">5</span></h4>
                                <div class="leave-info-box">
                                    <div class="media align-items-center">
                                        <a href="profile.html" class="avatar"><img alt="" src="img\user.jpg"></a>
                                        <div class="media-body">
                                            <div class="text-sm my-0">Martin Lewis</div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <h6 class="mb-0">4 Sep 2019</h6>
                                            <span class="text-sm text-muted">Leave Date</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="badge bg-inverse-danger">Pending</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="leave-info-box">
                                    <div class="media align-items-center">
                                        <a href="profile.html" class="avatar"><img alt="" src="img\user.jpg"></a>
                                        <div class="media-body">
                                            <div class="text-sm my-0">Martin Lewis</div>
                                        </div>
                                    </div>
                                    <div class="row align-items-center mt-3">
                                        <div class="col-6">
                                            <h6 class="mb-0">4 Sep 2019</h6>
                                            <span class="text-sm text-muted">Leave Date</span>
                                        </div>
                                        <div class="col-6 text-right">
                                            <span class="badge bg-inverse-success">Approved</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="load-more text-center">
                                    <a class="text-dark" href="javascript:void(0);">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>--}}
                <!-- /Statistics Widget -->
                
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Wrapper -->
    @endsection