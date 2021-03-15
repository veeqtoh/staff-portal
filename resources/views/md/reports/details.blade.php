@extends('layouts/md')

    @section('title')
		<title>{{str_replace('-', ', ', $month)}} Weekly Reports - N.U.E Offshore Staff Portal</title>
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
                            <h3 class="page-title">{{str_replace('-', ', ', $month)}} Weekly Reports</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('md.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{str_replace('-', ', ', $month)}} Reports`</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <!-- /Page Header -->

                @foreach ($errors->all() as $error)
                  <div class="alert alert-danger">
                      <li> <strong>{{ $error }}</strong> </li>
                  </div>                  
                @endforeach
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Uploaded by</th>
                                        <th>Report Date</th>
                                        <th>Uploaded</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reports as $report)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{route('md.employee.profile', ['slug' => $report->employee->slug] )}}" class="avatar"><img alt="" src="{{$report->employee->profile->avatar}}"></a>
                                                <a href="{{route('md.employee.profile', ['slug' => $report->employee->slug] )}}">{{$report->employee->f_name}} {{str_limit($report->employee->l_name, $limit = 1, $end = '.')}} <span>{{$report->employee->position->name}}</span></a>
                                            </h2>
                                        </td>

                                        <td>{{$report->report_date->diffForHumans()}}</td>
                                        <td>{{$report->created_at->diffForHumans()}}</td>
                                       
                                        <td class="text-right"><a class="btn btn-sm btn-primary" href="{{asset($report->report)}}">Download report</a></td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            
        </div>
        <!-- /Page Wrapper -->
    @endsection