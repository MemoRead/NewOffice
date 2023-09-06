@extends('dashboard.layouts.main')

@section('container')
    <div class="pagetitle">
        <h1>Upload Story</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Instagram</li>
                <li class="breadcrumb-item"><a href="{{ route('instagram.index') }}">Account Monitoring</a></li>
                <li class="breadcrumb-item active">Upload Story</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section upload-section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upload Story</h5>
                <!-- Form untuk meng-upload story -->
                <form action="{{ route('instagram.storeStory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="story_image">Story Image</label>
                        <input type="file" class="form-control" id="story_image" name="story_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </section>
@endsection
