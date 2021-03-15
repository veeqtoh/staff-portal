@extends('layouts/staff')

    @section('title')
		<title>Dashboard - N.U.E Offshore Staff Portal</title>
	@endsection

    @section('body')
    <!-- Page Wrapper -->
        <div class="page-wrapper">
			
            <!-- Page Content -->
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="welcome-box">
                            <div class="welcome-img">
                                <img alt="" src="{{Auth::user()->profile->avatar}}">
                            </div>
                            <div class="welcome-det">
                                <h3>Welcome, {{Auth::user()->f_name}}!</h3>
                                <p>{{  now()->format("l, d F Y") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <section class="dash-section">
                            <h1 class="dash-sec-title">Today</h1>
                            <div class="dash-sec-content">
                                <div class="dash-info-list">
                                    <a href="#" class="dash-card text-danger">
                                        <div class="dash-card-container">
                                            <div class="dash-card-icon">
                                                <i class="fa fa-hourglass-o"></i>
                                            </div>
                                            <div class="dash-card-content">
                                                <p>No pending tasks for today</p>
                                            </div>
                                            <div class="dash-card-avatars">
                                                <div class="e-avatar"><img src="{{Auth::user()->profile->avatar}}" alt=""></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </section>

                        <section class="dash-section">
                            <h1 class="dash-sec-title">Tomorrow</h1>
                            <div class="dash-sec-content">
                                <div class="dash-info-list">
                                    <div class="dash-card">
                                        <div class="dash-card-container">
                                            <div class="dash-card-icon">
                                                <i class="fa fa-suitcase"></i>
                                            </div>
                                            <div class="dash-card-content">
                                                <p>No tasks set for tomorrow yet!</p>
                                            </div>
                                            {{--<div class="dash-card-avatars">
                                                <a href="#" class="e-avatar"><img src="img\profiles\avatar-04.jpg" alt=""></a>
                                                <a href="#" class="e-avatar"><img src="img\profiles\avatar-08.jpg" alt=""></a>
                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        {{--<section class="dash-section">
                            <h1 class="dash-sec-title">Next seven days</h1>
                            <div class="dash-sec-content">
                                <div class="dash-info-list">
                                    <div class="dash-card">
                                        <div class="dash-card-container">
                                            <div class="dash-card-icon">
                                                <i class="fa fa-suitcase"></i>
                                            </div>
                                            <div class="dash-card-content">
                                                <p>2 people are going to be away</p>
                                            </div>
                                            <div class="dash-card-avatars">
                                                <a href="#" class="e-avatar"><img src="img\profiles\avatar-05.jpg" alt=""></a>
                                                <a href="#" class="e-avatar"><img src="img\profiles\avatar-07.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dash-info-list">
                                    <div class="dash-card">
                                        <div class="dash-card-container">
                                            <div class="dash-card-icon">
                                                <i class="fa fa-user-plus"></i>
                                            </div>
                                            <div class="dash-card-content">
                                                <p>Your first day is going to be  on Thursday</p>
                                            </div>
                                            <div class="dash-card-avatars">
                                                <div class="e-avatar"><img src="img\profiles\avatar-02.jpg" alt=""></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dash-info-list">
                                    <a href="" class="dash-card">
                                        <div class="dash-card-container">
                                            <div class="dash-card-icon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="dash-card-content">
                                                <p>It's Spring Bank Holiday  on Monday</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </section>--}}
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="dash-sidebar">
                            <section>
                                <h5 class="dash-title">Requisitions</h5>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="time-list">
                                            <div class="dash-stats-list">
                                                <h4>0</h4>
                                                <p>Raised Today</p>
                                            </div>
                                            <div class="dash-stats-list">
                                                <h4>0</h4>
                                                <p>Total Approved</p>
                                            </div>
                                        </div>
                                        <div class="request-btn">
                                            <div class="dash-stats-list">
                                                <h4>0</h4>
                                                <p>Pending Requisitions</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section>
                                <h5 class="dash-title">Your Leave</h5>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="time-list">
                                            <div class="dash-stats-list">
                                                <h4>0</h4>
                                                <p>Leave Taken</p>
                                            </div>
                                            <div class="dash-stats-list">
                                                <h4>1</h4>
                                                <p>Remaining</p>
                                            </div>
                                        </div>
                                        <div class="request-btn">
                                            <a class="btn btn-primary" href="#">Apply for Leave</a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            {{--<section>
                                <h5 class="dash-title">Your time off allowance</h5>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="time-list">
                                            <div class="dash-stats-list">
                                                <h4>5.0 Hours</h4>
                                                <p>Approved</p>
                                            </div>
                                            <div class="dash-stats-list">
                                                <h4>15 Hours</h4>
                                                <p>Remaining</p>
                                            </div>
                                        </div>
                                        <div class="request-btn">
                                            <a class="btn btn-primary" href="#">Apply Time Off</a>
                                        </div>
                                    </div>
                                </div>
                            </section>--}}
                            <section>
                                <h5 class="dash-title">Upcoming Holiday</h5>
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h4 class="holiday-title mb-0">No holidays in the month of {{now()->format(" F ")}}</h4>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Content -->

        </div>
    <!-- /Page Wrapper -->
    @endsection