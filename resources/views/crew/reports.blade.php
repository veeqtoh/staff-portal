@extends('layouts/crew')

    @section('title')
		<title>Daily Reports - N.U.E Offshore Staff Portal</title>
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
                          <h3 class="page-title">Daily Reports</h3>
                          <ul class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{route('crew.home')}}">Dashboard</a></li>
                              <li class="breadcrumb-item active">Daily Reports</li>
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

              <div class="row staff-grid-row">
                @foreach($months as $num => $month)
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                        <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{route('crew.reports.details', ['cat'=>AUTH::user()->category_id, 'month'=>$month] )}}">{{str_replace('-', ', ', $month)}}</a></h4>
                            
                        </div>
                    </div>

                @endforeach
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

  @endsection