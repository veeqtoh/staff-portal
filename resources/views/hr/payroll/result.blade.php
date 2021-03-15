@extends('layouts/hr')

    @section('title')
		<title>{{str_replace('-', ', ', $month)}} Staff Payroll - N.U.E Offshore Staff Portal</title>
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
                            <h3 class="page-title">{{str_replace('-', ', ', $month)}} Payroll</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('hr.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route('hr.payroll', ['cat' => $cat] )}}">{{$title}} Payroll</a></li>
                                <li class="breadcrumb-item active">{{str_replace('-', ', ', $month)}} Payroll</li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Staff</th>
                                        <th>Basic</th>
                                        <th>Housing</th>
                                        <th>Transport</th>
                                        <th>Entertainment</th>
                                        <th>Meal</th>
                                        <th>Utility</th>
                                        <th>Gross Pay</th>
                                        <th>Net Pay</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payroll as $p)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{route('hr.employee.profile', ['slug' => $p->employee->slug] )}}" class="avatar"><img alt="" src="{{$p->employee->profile->avatar}}"></a>
                                                <a href="{{route('hr.employee.profile', ['slug' => $p->employee->slug] )}}">{{$p->employee->f_name}} {{str_limit($p->employee->l_name, $limit = 1, $end = '.')}} <span>{{$p->employee->position->name}}</span></a>
                                            </h2>
                                        </td>

                                        <td>₦{{number_format($p->basic, 2)}}</td>
                                        <td>₦{{number_format($p->housing, 2)}}</td>
                                        <td>₦{{number_format($p->transport, 2)}}</td>
                                        <td>₦{{number_format($p->entertainment, 2)}}</td>
                                        <td>₦{{number_format($p->meal_allowance, 2)}}</td>
                                        <td>₦{{number_format($p->utility_allowance, 2)}}</td>
                                        <td>₦{{number_format($p->net_salary, 2)}}</td>
                                        <td>₦{{number_format($p->net_pay, 2)}}</td>
                                        
                                        <td><a class="btn btn-sm btn-primary" href="{{route('hr.payslip', ['id' => $p->id] )}}">Generate Payslip</a></td>
                                        
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            
            <!-- Add Salary Modal -->
            <div id="add_salary" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Staff Salary</h5>
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
                                        <input class="form-control" type="text">
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-sm-6"> 
                                        <h4 class="text-primary">Earnings</h4>
                                        <div class="form-group">
                                            <label>Basic</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>DA(40%)</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>HRA(15%)</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Conveyance</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Allowance</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Medical  Allowance</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Others</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="add-more">
                                            <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">  
                                        <h4 class="text-primary">Deductions</h4>
                                        <div class="form-group">
                                            <label>TDS</label>
                                            <input class="form-control" type="text">
                                        </div> 
                                        <div class="form-group">
                                            <label>ESI</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>PF</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Leave</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Prof. Tax</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Labour Welfare</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Others</label>
                                            <input class="form-control" type="text">
                                        </div>
                                        <div class="add-more">
                                            <a href="#"><i class="fa fa-plus-circle"></i> Add More</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Salary Modal -->
            
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
            <!-- /Edit Salary Modal -->
            
            <!-- Delete Salary Modal -->
            <div class="modal custom-modal fade" id="delete_salary" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Salary</h3>
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
            <!-- /Delete Salary Modal -->
            
        </div>
        <!-- /Page Wrapper -->
    @endsection