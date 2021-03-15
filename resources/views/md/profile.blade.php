@extends('layouts/md')

    @section('title')
		<title>{{$employee->f_name}} {{$employee->l_name}} - N.U.E Offshore Staff Portal</title>
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
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">My Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('staff.home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">My Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#!"><img alt="" src="{{$employee->profile->avatar}}"></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="profile-info-left">
                                                    <h3 class="user-name m-t-0 mb-0">{{$employee->f_name}} {{$employee->o_name}} {{$employee->l_name}}</h3>
                                                    <h6 class="text-muted">{{$employee->department->name}}</h6>
                                                    <small class="text-muted">{{$employee->position->name}}</small>
                                                    <div class="staff-id">Employee ID : {{$employee->profile->emp_id}}</div>
                                                    <div class="small doj text-muted">Employed: {{$employee->profile->start_date->diffForHumans()}}</div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Phone:</div>
                                                        <div class="text">@if($employee->profile->phone)<a href="tel:{{$employee->profile->phone}}" target="_blank">{{$employee->profile->phone}}</a>@else Not Provided @endif</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Email:</div>
                                                        <div class="text"><a href="mailto:{{$employee->email}}">{{$employee->email}}</a></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Birthday:</div>
                                                        <div class="text">@if($employee->profile->d_o_b) {{$employee->profile->d_o_b->format("jS \of F")}} @else Not Provided @endif</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Address:</div>
                                                        <div class="text">@if($employee->profile->r_address){{$employee->profile->r_address}} @else Not Provided @endif</div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Gender:</div>
                                                        <div class="text">@if($employee->profile->gender == "m") Male
                                                            @else Female
                                                            @endif
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Reports to:</div>
                                                        <div class="text">
                                                           <div class="avatar-box">
                                                              <div class="avatar avatar-xs">
                                                                 <img src="" alt="">
                                                              </div>
                                                           </div>
                                                           <a href="profile.html">
                                                           {{$employee->reportsto}}
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card tab-box">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                                {{--<li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>--}}
                                <li class="nav-item"><a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory {{--<small class="text-danger">(Admin Only)</small>--}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content">
                
                    <!-- Profile Info Tab -->
                    <div id="emp_profile" class="pro-overview tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Personal Information <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">NHF No.</div>
                                                <div class="text">@if($employee->profile->nhf_no){{$employee->profile->nhf_no}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">RSA Pin No.</div>
                                                <div class="text">@if($employee->profile->rsa_pin_no){{$employee->profile->rsa_pin_no}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Pension Funds Administrator</div>
                                                <div class="text"><a href="#!">@if($employee->profile->pfa){{$employee->profile->pfa->name}} @else Not Provided @endif</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Grade</div>
                                                <div class="text">@if($employee->profile->grade){{$employee->profile->grade}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Permanent Home Address</div>
                                                <div class="text">@if($employee->profile->p_address){{$employee->profile->p_address}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Residential Address</div>
                                                <div class="text">@if($employee->profile->r_address){{$employee->profile->r_address}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Title</div>
                                                <div class="text">@if($employee->profile->title){{$employee->profile->title}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Date of Birth</div>
                                                <div class="text">@if($employee->profile->d_o_b) {{$employee->profile->d_o_b->format("jS \of F")}} @else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Place of Birth</div>
                                                <div class="text">@if($employee->profile->p_o_b){{$employee->profile->p_o_b}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Nationality</div>
                                                <div class="text">@if($employee->profile->nationality){{$employee->profile->nationality}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">State of Origin</div>
                                                <div class="text">@if($employee->profile->state_of_origin){{$employee->profile->state_of_origin}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Home Town</div>
                                                <div class="text">@if($employee->profile->home_toen){{$employee->profile->home_town}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Local Government</div>
                                                <div class="text">@if($employee->profile->local_govt){{$employee->profile->local_govt}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Marital Status</div>
                                                <div class="text">@if($employee->profile->marital_status){{$employee->profile->marital_status}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Religion</div>
                                                <div class="text">@if($employee->profile->religion){{$employee->profile->religion}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Disability</div>
                                                <div class="text">@if($employee->profile->disability){{$employee->profile->disability}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Height</div>
                                                <div class="text">@if($employee->profile->height){{$employee->profile->height}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Weight</div>
                                                <div class="text">@if($employee->profile->weight){{$employee->profile->weight}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Blood Group</div>
                                                <div class="text">@if($employee->profile->blood_group){{$employee->profile->blood_group}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Genotype</div>
                                                <div class="text">@if($employee->profile->genotype){{$employee->profile->genotype}}@else Not Provided @endif</div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <h5 class="section-title">Spouse</h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text">@if($employee->profile->name_of_spouse){{$employee->profile->name_of_spouse}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Maiden Name</div>
                                                <div class="text">@if($employee->profile->maiden_name){{$employee->profile->maiden_name}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone </div>
                                                <div class="text">@if($employee->profile->spouse_phone){{$employee->profile->spouse_phone}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Address </div>
                                                <div class="text">@if($employee->profile->address_of_spouse){{$employee->profile->address_of_spouse}}@else Not Provided @endif</div>
                                            </li>
                                        </ul>
                                        <hr>
                                        <h5 class="section-title">Next of Kin (Beneficiary)</h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text">@if($employee->profile->next_of_kin_ben){{$employee->profile->next_of_kin_ben}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Relationship</div>
                                                <div class="text">@if($employee->profile->relationship_ben){{$employee->profile->relationship_ben}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Address </div>
                                                <div class="text">@if($employee->profile->address_ben){{$employee->profile->address_ben}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone </div>
                                                <div class="text">@if($employee->profile->tel_ben){{$employee->profile->tel_ben}}@else Not Provided @endif</div>
                                            </li>
                                        </ul>
                                        <hr>
                                        <h5 class="section-title">Next of Kin (Emmergency)</h5>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Name</div>
                                                <div class="text">@if($employee->profile->next_of_kin_em){{$employee->profile->next_of_kin_em}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Relationship</div>
                                                <div class="text">@if($employee->profile->relationship_em){{$employee->profile->relationship_em}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Address </div>
                                                <div class="text">@if($employee->profile->address_em){{$employee->profile->address_em}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">phone </div>
                                                <div class="text">@if($employee->profile->tel_em){{$employee->profile->tel_em}}@else Not Provided @endif</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Crime Conviction <a href="#" class="edit-icon" data-toggle="modal" data-target="#crime_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Have you ever been convicted?</div>
                                                <div class="text">@if($employee->profile->convicted == 0) No @else Yes @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Crime details</div>
                                                <div class="text">@if($employee->profile->crime_details){{$employee->profile->crime_details}}@else Not Provided @endif</div>
                                            </li>
                                                                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Debt Details <a href="#" class="edit-icon" data-toggle="modal" data-target="#debt_modal"><i class="fa fa-pencil"></i></a></h3>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Are you indebted to your former company?</div>
                                                <div class="text">@if($employee->profile->indebted == 0) No @else Yes @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">Debt details</div>
                                                <div class="text">@if($employee->profile->debt_details){{$employee->profile->debt_details}}@else Not Provided @endif</div>
                                            </li>
                                            <li>
                                                <div class="title">What are your intentions?</div>
                                                <div class="text">@if($employee->profile->intention){{$employee->profile->intention}}@else Not Provided @endif</div>
                                            </li>
                                                                                        
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Credentials and Certifications Downloads </h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                            @if($employee->profile->cv)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#!" class="name"><a href="#!" class="name">Cv</a>
                                                            <div class="time"><a class="btn btn-sm btn-primary" href="{{asset($employee->profile->cv)}}">Download</a></div></a>

                                                        </div>
                                                    </div>
                                                </li>
                                                @else Not provided
                                            @endif
                                            @if($employee->profile->contract_letter)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#!" class="name">Offer Letter</a>
                                                            <div class="time"><a class="btn btn-sm btn-primary" href="{{asset($employee->profile->contract_letter)}}">Download</a></div></a>                                                            
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($employee->profile->mid)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#!" class="name"><a href="#!" class="name">Means of Identification</a>
                                                            <div class="time"><a class="btn btn-sm btn-primary" href="{{asset($employee->profile->mid)}}">Download</a></div></a>

                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($employee->profile->aca_cert)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#!" class="name">Academic Certificate</a>
                                                            <div class="time"><a class="btn btn-sm btn-primary" href="{{asset($employee->profile->aca_cert)}}">Download</a></div></a>                                                            
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($employee->profile->sa)
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#!" class="name">Academic Certificate</a>
                                                            <div class="time"><a class="btn btn-sm btn-primary" href="{{asset($employee->profile->sa)}}">Download</a></div></a>                                                            
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Credentials and Certifications Uploads <a href="#" class="edit-icon" data-toggle="modal" data-target="#certifications"><i class="fa fa-pencil"></i></a></h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Cv</a>
                                                            <span class="time"><a class="btn btn-sm btn-dark" href="#" data-toggle="modal" data-target="#certifications">Upload</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Means of Identification</a>
                                                            <span class="time"><a class="btn btn-sm btn-dark" href="#" data-toggle="modal" data-target="#certifications">Upload</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Academic Certificate</a>
                                                            <span class="time"><a class="btn btn-sm btn-dark" href="#" data-toggle="modal" data-target="#certifications">Upload</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Skill Aquisition</a>
                                                            <span class="time"><a class="btn btn-sm btn-dark" href="#" data-toggle="modal" data-target="#certifications">Upload</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Profile Info Tab -->
                    
                    <!-- Bank Statutory Tab -->
                    <div class="tab-pane fade" id="bank_statutory">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{route('myprofile.update') }}" enctype="multipart/form-data">
                                @csrf
                                    
                                    <h3 class="card-title"> Bank Account Information</h3>
                                    
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Bank Name</label>
                                                <input type="text" class="form-control" placeholder="{{$employee->profile->bank_name}}" name="bank_name">

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Bank Account No. <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{$employee->profile->account_no}}" name="account_no">

                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label">Sort Code</label>
                                                <input type="text" class="form-control" placeholder="{{$employee->profile->sort_code}}" name="sort_code">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr>
                                    
                                    
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Bank Statutory Tab -->
                    
                </div>
            </div>
            <!-- /Page Content -->
            
            <!-- Profile Modal -->
            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('myprofile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="profile-img-wrap edit-img">
                                            <img class="inline-block" src="{{$employee->profile->avatar}}" alt="user">
                                            <div class="fileupload btn">
                                                <span class="btn-text">edit</span>
                                                <input class="upload" type="file" name="dp">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="f_name" placeholder="{{$employee->f_name}}">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Other Name</label>
                                                    <input class="form-control" type="text" name="o_name" placeholder="{{$employee->o_name}}">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Last Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="l_name" placeholder="{{$employee->l_name}}">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">  
                                                <div class="form-group">
                                                    <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" disabled name="emp_id" placeholder="{{$employee->profile->emp_id}}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group mb-0 col-sm-4">
                                                <label class="col-form-label col-md-12">Phone Number</label>
                                                <div class="col-md-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">+234</span>
                                                        </div>
                                                        <input class="form-control" type="text" name="phone" placeholder="{{$employee->profile->phone}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                                    <input id="email" placeholder="{{$employee->email}}" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" autofocus>
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
                                                    <input id="password"  placeholder="Enter employee new password " type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                            
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
                                                    <input id="password-confirm" placeholder="Re-Enter employee new password" autocomplete="new-password" class="form-control" type="password" name="password_confirmation">
                                                </div>
                                            </div>                                      

                                            <div class="col-sm-4">  
                                                <div class="form-group">
                                                    <label class="col-form-label">Birthday <span class="text-danger">*</span></label>
                                                    <div class=""><input class="form-control" name="d_o_b" type="date" placeholder="{{$employee->profile->d_o_b}}"></div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="col-form-label col-md-2">Gender</label>
                                                <div class="col-md-6">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="gender" value="m"
                                                                @if($employee->profile->gender == "m")
                                                                checked
                                                                @endif> Male
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="gender" value="f"
                                                                @if($employee->profile->gender == "f")
                                                                checked
                                                                @endif> Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Residential Address</label>
                                            <input type="text" class="form-control" name="r_address" placeholder="{{$employee->profile->r_address}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Reports To <span class="text-danger">*</span></label>
                                            <select class="select" disabled>
                                                <option>-</option>
                                                <option>Wilmer Deluna</option>
                                                <option>Lesley Grauer</option>
                                                <option>Jeffery Lalor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Profile Modal -->
            
            <!-- Personal Info Modal -->
            <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('myprofile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>NHF No.</label>
                                            <input type="text" class="form-control" name="nhf_no" placeholder="{{$employee->profile->nhf_no}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>RSA Pin No</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="rsa_pin_no" placeholder="{{$employee->profile->rsa_pin_no}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="title" placeholder="{{$employee->profile->title}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pension Fund Administrator</label>
                                            <select class="select" name="pfa">
                                                <option class="text-muted" disabled selected style="display: none">Choose a PFA...</option>
                                                @foreach($pfas as $pfa)
                                                <option class="text-muted" value="{{$pfa->id}}">{{$pfa->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Place of Birth</label>
                                            <div class="">
                                                <input class="form-control" type="text" name="p_o_b" placeholder="{{$employee->profile->p_o_b}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Permanent Home Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="p_address" placeholder="{{$employee->profile->p_address}}"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Residential Address <span class="text-danger">*</span></label>
                                            <textarea class="form-control" placeholder="{{$employee->profile->r_address}}"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nationality</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="nationality" placeholder="{{$employee->profile->nationality}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>State of Origin</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="state_of_origin" placeholder="{{$employee->profile->state_of_origin}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Hometown</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="home_town" placeholder="{{$employee->profile->home_town}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Local Government</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="local_govt" placeholder="{{$employee->profile->local_govt}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Religion</label>
                                            <div class="">
                                                <input class="form-control" type="text" name="religion" placeholder="{{$employee->profile->religion}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Marital status <span class="text-danger">*</span></label>
                                            <select class="select form-control" name="marital_status" placeholder="{{$employee->profile->marital_status}}">
                                                <option>-</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Disability</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="disability" placeholder="{{$employee->profile->disability}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Height</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="height" placeholder="{{$employee->profile->height}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Weight</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="weight" placeholder="{{$employee->profile->weight}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Blood Group</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="blood_group" placeholder="{{$employee->profile->blood_group}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Genotype</label>
                                            <div class="">
                                                <input type="text" class="form-control" name="genotype" placeholder="{{$employee->profile->genotype}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Personal Info Modal -->

            <!-- Crime Info Modal -->
            <div id="crime_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crime Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('myprofile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Have you ever been convicted?</label>
                                            <select class="select" name="convict">
                                                <option class="text-muted" disabled selected style="display: none">Choose an answer...</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Crime details</label>
                                            <textarea class="form-control" name="crime_details" placeholder="{{$employee->profile->crime_details}}"></textarea>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Crime Info Modal -->

            <!-- Debt Info Modal -->
            <div id="debt_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Debt Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('myprofile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Are you indebted to your formar company?</label>
                                            <select class="select" name="indebted">
                                                <option class="text-muted" disabled selected style="display: none">Choose an answer...</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Debt details</label>
                                            <textarea class="form-control" name="debt_details" placeholder="{{$employee->profile->debt_details}}"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>What are your intentions?</label>
                                            <textarea class="form-control" name="intention" placeholder="{{$employee->profile->intention}}"></textarea>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Debt Info Modal -->

            <!-- Certifications Modal -->
            <div id="certifications" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Certifications</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('myprofile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">CV</label>
                                            <input class="form-control" type="file" name="cv">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Means of Identification</label>
                                            <input class="form-control" type="file" name="mid">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Academic Certificate</label>
                                            <input class="form-control" type="file" name="aca_cert">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Skill Aquisition</label>
                                            <input class="form-control" type="file" name="sa">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Certifications Modal-->
            
            <!-- Family Info Modal -->
            <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Family Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Family Member <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                            </div>
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
            <!-- /Family Info Modal -->
            
            <!-- Emergency Contact Modal -->
            <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Emmergency Contacts</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('myprofile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Spouse</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="name_of_spouse" placeholder="{{$employee->profile->name_of_spouse}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Maiden Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="maiden_name" placeholder="{{$employee->profile->maiden_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="spouse_phone" placeholder="{{$employee->profile->spouse_phone}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input class="form-control" type="text" name="address_of_spouse" placeholder="{{$employee->profile->address_of_spouse}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Next of Kin (Beneficiary)</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="next_of_kin_ben" placeholder="{{$employee->profile->next_of_kin_ben}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="relationship_ben" placeholder="{{$employee->profile->relationship_ben}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="address_ben" placeholder="{{$employee->profile->address_ben}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" name="tel_ben" placeholder="{{$employee->profile->tel_ben}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Next of Kin (Emmergency)</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="next_of_kin_em" placeholder="{{$employee->profile->next_of_kin_em}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="relationship_em" placeholder="{{$employee->profile->relationship_em}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Address <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="address_em" placeholder="{{$employee->profile->address_em}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control" name="tel_em" placeholder="{{$employee->profile->tel_em}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Update Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Emergency Contact Modal -->
 
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
 