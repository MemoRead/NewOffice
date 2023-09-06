@extends('dashboard.layouts.main')
@section('title', 'Dashboard')

@section('container')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/dashboard">Home</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card info-card sales-card text-center">
                    <div class="card-body ">
                        <h5 class="card-title">Welcome <span>| {{ auth()->user()->name }}</span></h5>
                        <div>
                            <form class="d-flex align-items-center justify-content-center" action="/logout" method="post">
                                @csrf
                                <button class="btn btn-warning small pt-1 fw-bold text-white" type="submit">
                                    <i class="bi box-arrow-right text-white"></i> Logout
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Employees <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $numberOfEmployees }}</h6>
                                        <span class="text-success small pt-1 fw-bold">People</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Sales Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Users <span>| Registered</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $numberOfUsers }}</h6>
                                        <span class="text-success small pt-1 fw-bold">Users</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Mails <span>| Incoming</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-mailbox"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $numberOfIncomingMails }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Mails</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Mails <span>| Outgoing</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-mailbox"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $numberOfOutgoingMails }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Mails</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-3 col-md-3">
                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Archive <span>| Publications</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-archive"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $numberOfPublications }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Files</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Experience <span>| Finished</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-clipboard-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $numberOfExperience }}</h6>
                                        <span class="text-muted small pt-2 ps-1">Recorded</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                </div>
            </div>

            <div class="col-lg-4">
                <div class="row">
                    <!-- Google Calendar -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Agenda Calendar</h5>
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div><!-- End Google Calendar -->
                </div>
            </div>

        </div>
    </section>
@endsection
