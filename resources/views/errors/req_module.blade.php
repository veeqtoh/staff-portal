 @extends('layouts.hr')

@section('title')
		<title>Dashboard - N.U.E Offshore Staff Portal</title>
	@endsection

    @section('body')
           <style type="text/css">
               .chosen-container { width: 90% !important }
           </style>
           <link rel="stylesheet" href="{{asset('css\chosen.css')}}">
            
            <!-- Page Wrapper -->
            <div class="page-wrapper" style="min-height: 372px;">
            
            <!-- Page Content -->
            <div class="content container-fluid">
                
                
                @if(Session::has('msg'))
                    <div class="alert alert-error" style="clear:both">
                        <em> {!! session('msg') !!}</em>
                    </div>
                @endif

                <div class="row staff-grid-row">
                    <div class="col-md-12" style="height: 70px"></div>
                    <div style="width: 75%; margin: 10px auto">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <p><i class="fa fa-exclamation-triangle fa-5x"></i><br/>Status Code: 403</p>
                            </div>
                            <div class="col-md-10">
                                <h3>OPPSSS!!!! Sorry...</h3>
                                <p>Sorry, your access is refused because your account has not been configured on the requisition module. Kindly contact service desk to enable configuration of your account on the requisition module.<br/>Please go back to the previous page to continue browsing.</p>
                                <a class="btn btn-danger" href="javascript:history.back()">Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Wrapper -->
            
 @endsection