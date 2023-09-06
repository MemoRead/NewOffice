@extends('dashboard.layouts.main')
@section('title', 'Experience Details')

@section('container')
    <div class="pagetitle">
        <h1>Experience Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Experiences</li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section contact">

        <div class="row gy-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-xl-5">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="info-box card text-center">
                            <i class="bi bi-clipboard"></i>
                            <h3>{{ $exp->name }}</h3>
                            <p>Activity/Experience Title</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-box card">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Locations</h3>
                            <p>{{ $exp->locations }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-box card text-end">
                            <i class="bi bi-clipboard-check"></i>
                            <h3>Status</h3>
                            <p>{{ $exp->results }} <br> {{ $exp->date }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-6">
                <section class="section profile">
                    <div class="card p-4">
                        <div class="row gy-4 profile-overview">
                            <h5 class="card-title text-center">Details Data</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Type of Activity</div>
                                <div class="col-lg-9 col-md-8">{{ $exp->type }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Coordinator</div>
                                <div class="col-lg-9 col-md-8">{{ $exp->employee->name }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Target</div>
                                <div class="col-lg-9 col-md-8">{{ $exp->target }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Descriptions</div>
                                <div class="col-lg-9 col-md-8">{{ $exp->descriptions }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Actions Notes</div>
                                <div class="col-lg-9 col-md-8">{{ $exp->notes }}</div>
                            </div>

                            <div class="text-center">
                                <a href="/dashboard/experiences" class="btn btn-secondary">Back</a>
                            </div>

                        </div>
                    </div>
                </section>

            </div>

        </div>

    </section>
@endsection
