@extends('layouts/md')
    @section('title')
		<title>Trashed Employees - N.U.E Offshore Staff Portal</title>
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
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">          
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Trashed Employees</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('md.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Trashed Employees</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                            {{--<div class="view-icons">
                                <a href="{{route('md.employees')}}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                                <a href="{{route('md.employees.list')}}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                            </div>--}}
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
                <!-- Search Filter -->             

                <div class="row staff-grid-row">
                @if($users->count() > 0)
                    @foreach($users as $user)
                        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                            <div class="profile-widget">
                                <div class="profile-img">
                                    <a href="{{route('md.employee.profile', ['slug'=>$user->slug]) }}" class="avatar"><img src="{{$user->profile->avatar}}" alt=""></a>
                                </div>
                                <div class="dropdown profile-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#recover_employee{{$user->id}}"><i class="fa fa-recycle m-r-5"></i>Recover Account</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_employee{{$user->id}}"><i class="fa fa-trash-o m-r-5"></i> Permanently Delete</a>
                                    </div>
                                </div>
                                <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{route('md.employee.profile', ['slug'=>$user->slug]) }}">{{$user->f_name}} {{$user->l_name}}</a></h4>
                                <div class="small text-muted">{{$user->position->name}}</div>
                            </div>
                        </div>

                        <!-- Recover Employee Modal -->
                        <div class="modal custom-modal fade" id="recover_employee{{$user->id}}" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="form-header">
                                            <h3>Recover {{$user->f_name}} {{$user->l_name}}</h3>
                                            <p>Are you sure want to restore this employee's account?</p>
                                        </div>
                                        <div class="modal-btn delete-action">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{route('md.employee.restore', ['id'=>$user->id])}}" class="btn btn-primary continue-btn">Restore</a>
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
                        <!-- /Edit Employee Modal -->

                        <!-- Delete Employee Modal -->
                        <div class="modal custom-modal fade" id="delete_employee{{$user->id}}" role="dialog">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="form-header">
                                            <h3>Permanently Delete {{$user->f_name}} {{$user->l_name}}</h3>
                                            <p>Are you sure want to permanently delete this employee's account?</p>
                                        </div>
                                        <div class="modal-btn delete-action">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{route('md.employee.kill', ['id'=>$user->id])}}" class="btn btn-primary continue-btn">Disable</a>
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
                <hr/>
                    <div class="col-md-6">
                        <h3>OPPSSS!!!! </h3>
                        <p>Sorry! there are no disabled accounts at the moment.</p>
                        <a class="btn btn-danger" href="javascript:history.back()">Go Back</a>

                    </div>
                @endif
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
                            <form method="POST" action="{{route('employee.store')}}" enctype="multipart/form-data">
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
        </div>
        <!-- /Page Wrapper -->
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