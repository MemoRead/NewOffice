@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Account Monitoring</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Instagram</li>
                <li class="breadcrumb-item active">Account Monitoring</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section account-monitoring">
        <div class="row">
            <div class="col-lg-6">
                <div class="card p-4">
                    <h5 class="card-title text-center">Make Instagram Story</h5>
                    <a href="{{ route('instagram.uploadStory') }}" class="btn btn-primary">Upload Story</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card p-4">
                    <h5 class="card-title text-center">Make New Instagram Feed</h5>
                    <a href="{{ route('instagram.uploadFeed') }}" class="btn btn-primary">Upload Feed</a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="card p-4 text-center">
                    <h5 class="card-title">Post Count:</h5>
                    <p>Post Uploaded until Today :
                    <h5>50</h5>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card p-4 text-center">
                    <h5 class="card-title">Follower Count: </h5>
                    <p>User Follow until Today :
                    <h5>50</h5>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
