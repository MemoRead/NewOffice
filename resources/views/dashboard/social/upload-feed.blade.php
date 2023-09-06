@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Upload Feed</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Instagram</li>
                <li class="breadcrumb-item"><a href="{{ route('instagram.index') }}">Account Monitoring</a></li>
                <li class="breadcrumb-item active">Upload Feed</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section upload-section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upload Feed</h5>
                <!-- Form untuk meng-upload feed -->
                <form action="{{ route('instagram.storeFeed') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="feed_image">Feed Image</label>
                        <input type="file" class="form-control" id="feed_image" name="feed_image">
                    </div>
                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <textarea class="form-control" id="caption" name="caption" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </section>
@endsection
