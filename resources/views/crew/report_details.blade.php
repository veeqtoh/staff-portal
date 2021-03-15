@extends('layouts/crew')

    @section('title')
		<title>{{str_replace('-', ', ', $month)}} Daily Reports - N.U.E Offshore Staff Portal</title>
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
                            <h3 class="page-title">{{str_replace('-', ', ', $month)}} Daily Reports</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('crew.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route('crew.reports')}}">Daily Reports</a></li>
                                <li class="breadcrumb-item active">{{str_replace('-', ', ', $month)}} Reports`</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                          <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_report"><i class="fa fa-plus"></i> Upload Report</a>
                          
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
                                                <a href="#!" class="avatar"><img alt="" src="{{$report->employee->profile->avatar}}"></a>
                                                <a href="#!">{{$report->employee->f_name}} {{str_limit($report->employee->l_name, $limit = 1, $end = '.')}} <span>{{$report->employee->position->name}}</span></a>
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
            
            <!-- Upload Report Modal -->
            <div id="add_report" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Daily Report</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                           
                          <form action="{{route('report.store')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                                <div class="row">
                                    <div class="col-sm-4">  
                                        <div class="form-group">
                                            <label class="col-form-label">Report for<span class="text-danger">*</span></label>
                                            <div class=""><input class="form-control" name="report_date" type="date" required></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="col-form-label">Report File (PDF)<span class="text-danger">*</span></label>
                                            <input class="form-control" type="file" name="report" required>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Upload</button>
                                </div>
                            </form>
                            
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Upload Report Modal -->
            
            <!-- Edit Salary Modal -->
            <div id="edit_salary" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Staff Salary</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row"> 
                                    <div class="col-sm-6"> 
                                        <div class="form-group">
                                            <label>Select Staff</label>
                                            <select class="select"> 
                                                <option>John Doe</option>
                                                <option>Richard Miles</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6"> 
                                        <label>Net Salary</label>
                                        <input class="form-control" type="text" value="$4000">
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-6"> 
                                        <h4 class="text-primary">Earnings</h4>
                                        <div class="form-group">
                                            <label>Basic</label>
                                            <input class="form-control" type="text" value="$6500">
                                        </div>
                                        <div class="form-group">
                                            <label>DA(40%)</label>
                                            <input class="form-control" type="text" value="$2000">
                                        </div>
                                        <div class="form-group">
                                            <label>HRA(15%)</label>
                                            <input class="form-control" type="text" value="$700">
                                        </div>
                                        <div class="form-group">
                                            <label>Conveyance</label>
                                            <input class="form-control" type="text" value="$70">
                                        </div>
                                        <div class="form-group">
                                            <label>Allowance</label>
                                            <input class="form-control" type="text" value="$30">
                                        </div>
                                        <div class="form-group">
                                            <label>Medical  Allowance</label>
                                            <input class="form-control" type="text" value="$20">
                                        </div>
                                        <div class="form-group">
                                            <label>Others</label>
                                            <input class="form-control" type="text">
                                        </div>  
                                    </div>
                                    <div class="col-sm-6">  
                                        <h4 class="text-primary">Deductions</h4>
                                        <div class="form-group">
                                            <label>TDS</label>
                                            <input class="form-control" type="text" value="$300">
                                        </div> 
                                        <div class="form-group">
                                            <label>ESI</label>
                                            <input class="form-control" type="text" value="$20">
                                        </div>
                                        <div class="form-group">
                                            <label>PF</label>
                                            <input class="form-control" type="text" value="$20">
                                        </div>
                                        <div class="form-group">
                                            <label>Leave</label>
                                            <input class="form-control" type="text" value="$250">
                                        </div>
                                        <div class="form-group">
                                            <label>Prof. Tax</label>
                                            <input class="form-control" type="text" value="$110">
                                        </div>
                                        <div class="form-group">
                                            <label>Labour Welfare</label>
                                            <input class="form-control" type="text" value="$10">
                                        </div>
                                        <div class="form-group">
                                            <label>Fund</label>
                                            <input class="form-control" type="text" value="$40">
                                        </div>
                                        <div class="form-group">
                                            <label>Others</label>
                                            <input class="form-control" type="text" value="$15">
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Report Modal -->
            
            <!-- Delete Report Modal -->
            <div class="modal custom-modal fade" id="delete_salary" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Report</h3>
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
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
            <!-- /Delete Report Modal -->
            
        </div>
        <!-- /Page Wrapper -->
    @endsection