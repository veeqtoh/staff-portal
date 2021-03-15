@extends('layouts/hr')

    @section('title')
		<title>Employees - N.U.E Offshore Staff Portal</title>
    @endsection
    
    @section('style')
    	<!-- Select2 CSS -->
        <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
        
        <!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('css/bootstrap-datetimepicker.min.css')}}">
		
		<!-- Calendar CSS -->
		<link rel="stylesheet" href="{{asset('css/fullcalendar.min.css')}}">

        <!-- Tagsinput CSS -->
		<link rel="stylesheet" href="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

		<!-- Datatable CSS -->
		<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
        
		<!-- Summernote CSS -->
		<link rel="stylesheet" href="{{asset('plugins/summernote/dist/summernote-bs4.css')}}">
    @endsection

    @section('body')
        <div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Employees</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('hr.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Employees</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                            <div class="view-icons">
                                <a href="{{route('hr.employees')}}" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
                                <a href="{{route('hr.employees.list')}}" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <li> <strong>{{ $error }}</strong> </li>
                    </div>
                    
                @endforeach
                
                <!-- Search Filter -->
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee ID</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3"> 
                        <div class="form-group form-focus select-focus">
                            <select class="select floating"> 
                                <option>Select Designation</option>
                                <option>Web Developer</option>
                                <option>Web Designer</option>
                                <option>Android Developer</option>
                                <option>Ios Developer</option>
                            </select>
                            <label class="focus-label">Designation</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <a href="#" class="btn btn-success btn-block"> Search </a>  
                    </div>     
                </div>
                <!-- /Search Filter -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table datatable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Employee ID</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th class="text-nowrap">Join Date</th>
                                        <th>Department</th>
                                        <th class="text-right no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="profile.html" class="avatar"><img alt="" src="{{$user->profile->avatar}}"></a>
                                                <a href="profile.html">{{$user->f_name}} {{$user->l_name}} <span>{{$user->position->name}}</span></a>
                                            </h2>
                                        </td>
                                        <td>{{$user->profile->emp_id}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->profile->phone}}</td>
                                        <td>{{$user->profile->start_date->diffForHumans()}}</td>
                                        <td>{{$user->department->name}}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
            
            <!-- Add Employee Modal -->
            <div id="add_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('hr.employee.store')}}" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="f_name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Other Name</label>
                                            <input class="form-control" type="text" name="o_name">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label">Last Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="l_name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="emp_id" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                            <input id="email" placeholder="Enter employee email address here" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Password</label>
                                            <input id="password"  placeholder="Enter employee password " type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Confirm Password</label>
                                            <input id="password-confirm" placeholder="Re-Enter employee password " autocomplete="new-password" class="form-control" type="password" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                            <div class="cal-icon"><input class="form-control datetimepicker" name="start_date" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 col-sm-6">
                                        <label class="col-form-label col-md-12">Phone Number</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">+234</span>
                                                </div>
                                                <input class="form-control" type="text" name="phone" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Contract Letter</label>
                                            <input class="form-control" type="file" name="contract_letter">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Avatar</label>
                                            <input class="form-control" type="file" name="dp">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category <span class="text-danger">*</span></label>
                                            <select class="select" name="category" id="category" required>
                                                <option selected disabled>Choose...</option>

                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{ucfirst($category->name)}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                            <select class="select" name="department" id="department" required>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation <span class="text-danger">*</span></label>
                                            <select class="select" name="pos" id="pos" required>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label class="col-form-label col-md-2">Gender</label>
                                    <div class="col-md-6">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" value="m"> Male
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="gender" value="f"> Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <div class="table-responsive m-t-15">
										<table class="table table-striped custom-table">
											<thead>
												<tr>
													<th>Module Permission</th>
													<th class="text-center">Grant</th>
													
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Crew</td>
													<td class="text-center">
														<input type="radio" name="role" value="5">
													</td>
													
												</tr>
												<tr>
													<td>Staff</td>
													<td class="text-center">
														<input type="radio" name="role" value="0">
													</td>
													
												</tr>
												<tr>
													<td>Human Resources</td>
													<td class="text-center">
														<input type="radio" name="role" value="1">
													</td>
													
												</tr>
												<tr>
													<td>IT Support</td>
													<td class="text-center">
														<input type="radio" name="role" value="3">
													</td>
													
												</tr>
												<tr>
													<td>MD</td>
													<td class="text-center">
														<input type="radio" name="role" value="4">
													</td>
													
												</tr>
												
											</tbody>
										</table>
									</div>
                                
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Create Employee Account</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Employee Modal -->
            
            <!-- Edit Employee Modal -->
            <div id="edit_employee" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" value="John" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Last Name</label>
                                            <input class="form-control" value="Doe" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Username <span class="text-danger">*</span></label>
                                            <input class="form-control" value="johndoe" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" value="johndoe@example.com" type="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Password</label>
                                            <input class="form-control" value="johndoe" type="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Confirm Password</label>
                                            <input class="form-control" value="johndoe" type="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                            <input type="text" value="FT-0001" readonly="" class="form-control floating">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">  
                                        <div class="form-group">
                                            <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                                            <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Phone </label>
                                            <input class="form-control" value="9876543210" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Company</label>
                                            <select class="select">
                                                <option>Global Technologies</option>
                                                <option>Delta Infotech</option>
                                                <option selected="">International Software Inc</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Department <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select Department</option>
                                                <option>Web Development</option>
                                                <option>IT Management</option>
                                                <option>Marketing</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation <span class="text-danger">*</span></label>
                                            <select class="select">
                                                <option>Select Designation</option>
                                                <option>Web Designer</option>
                                                <option>Web Developer</option>
                                                <option>Android Developer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive m-t-15">
                                    <table class="table table-striped custom-table">
                                        <thead>
                                            <tr>
                                                <th>Module Permission</th>
                                                <th class="text-center">Read</th>
                                                <th class="text-center">Write</th>
                                                <th class="text-center">Create</th>
                                                <th class="text-center">Delete</th>
                                                <th class="text-center">Import</th>
                                                <th class="text-center">Export</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Holidays</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Leaves</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Clients</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Projects</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tasks</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Chats</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Assets</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Timing Sheets</td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input checked="" type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="text-center">
                                                    <input type="checkbox">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Employee Modal -->
            
            <!-- Delete Employee Modal -->
            <div class="modal custom-modal fade" id="delete_employee" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Employee</h3>
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
            <!-- /Delete Employee Modal -->
            
        </div>
    @endsection

    @section('js')
		
		<!-- Select2 JS -->
		<script src="{{asset('js/select2.min.js')}}"></script>

		<script src="{{asset('js/jquery-ui.min.js')}}"></script>
		<script src="{{asset('js/jquery.ui.touch-punch.min.js')}}"></script>
		
		<!-- Datetimepicker JS -->
		<script src="{{asset('js/moment.min.js')}}"></script>
		<script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
		
		<!-- Calendar JS -->
		<script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/fullcalendar.min.js')}}"></script>
        <script src="{{asset('js/jquery.fullcalendar.js')}}"></script>

		<!-- Multiselect JS -->
		<script src="{{asset('js/multiselect.min.js')}}"></script>

		<!-- Datatable JS -->
		<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>

		<!-- Summernote JS -->
		<script src="{{asset('plugins/summernote/dist/summernote-bs4.min.js')}}"></script>
		
			
		<script src="{{asset('plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>

		<!-- Task JS -->
		<script src="{{asset('js/task.js')}}"></script>

		<!-- Dropfiles JS
		<script src="js/dropfiles.js"></script> -->

		<!-- Custom JS -->
        <script>
            $(document).ready(function(){

            



            // Read value on page load
            $("#result b").html($("#customRange").val());

            // Read value on change
            $("#customRange").change(function(){
                $("#result b").html($(this).val());
            });
        });        
            $(".header").stick_in_parent({
                
            });
            // This is for the sticky sidebar    
            $(".stickyside").stick_in_parent({
                offset_top: 60
            });
            $('.stickyside a').click(function() {
                $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top - 60
                }, 500);
                return false;
            });
            // This is auto select left sidebar
            // Cache selectors
            // Cache selectors
            var lastId,
                topMenu = $(".stickyside"),
                topMenuHeight = topMenu.outerHeight(),
                // All list items
                menuItems = topMenu.find("a"),
                // Anchors corresponding to menu items
                scrollItems = menuItems.map(function() {
                    var item = $($(this).attr("href"));
                    if (item.length) {
                        return item;
                    }
                });

            // Bind click handler to menu items


            // Bind to scroll
            $(window).scroll(function() {
                // Get container scroll position
                var fromTop = $(this).scrollTop() + topMenuHeight - 250;

                // Get id of current scroll item
                var cur = scrollItems.map(function() {
                    if ($(this).offset().top < fromTop)
                        return this;
                });
                // Get the id of the current element
                cur = cur[cur.length - 1];
                var id = cur && cur.length ? cur[0].id : "";

                if (lastId !== id) {
                    lastId = id;
                    // Set/remove active class
                    menuItems
                        .removeClass("active")
                        .filter("[href='#" + id + "']").addClass("active");
                }
            });
            $(function () {
                $(document).on("click", '.btn-add-row', function () {
                    var id = $(this).closest("table.table-review").attr('id');  // Id of particular table
                    console.log(id);
                    var div = $("<tr />");
                    div.html(GetDynamicTextBox(id));
                    $("#"+id+"_tbody").append(div);
                });
                $(document).on("click", "#comments_remove", function () {
                    $(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button>');
                    $(this).closest("tr").remove();
                });
                function GetDynamicTextBox(table_id) {
                    $('#comments_remove').remove();
                    var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length+1;
                    return '<td>'+rowsLength+'</td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button></td>'
                }
            });
		</script>
    @endsection