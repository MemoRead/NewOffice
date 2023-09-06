@extends('dashboard.layouts.main')
@section('title', 'Publication Details')

@section('container')
    <div class="pagetitle">
        <h1>Letter Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Mails</li>
                <li class="breadcrumb-item">Inbox</li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered justify-content-center">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview"
                                    disabled>{{ $pub->title }}</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Publication Type</div>
                                    @if ($pub->type === 'lain lain')
                                        <div class="col-lg-9 col-md-8">{{ $pub->another_type }}</div>
                                    @else
                                        <div class="col-lg-9 col-md-8">{{ $pub->type }}</div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Uploaded at</div>
                                    <div class="col-lg-9 col-md-8">{{ $pub->created_at }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Updated at</div>
                                    <div class="col-lg-9 col-md-8">{{ $pub->updated_at }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Descriptions</div>
                                    <div class="col-lg-9 col-md-8">{{ $pub->description }}</div>
                                </div>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>
            </div>

            <div class="col-lg-8 mb-5">

                <div class="card">
                    <div class="card-body pt-3 text-center">
                        {{-- taruh preview pdf disini --}}
                        @if ($pub->file)
                            <p>Archive File : {{ $fileName }}</p>

                            <iframe src="{{ $fileUrl }}" type="application/pdf"
                                style="width: 100%; height: 600px;"></iframe>
                        @else
                            <p>No preview available.</p>
                        @endif
                    </div>

                    <div class="card-body pt-3 text-center">
                        <a href="/dashboard/archive/publications" class="btn btn-secondary">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
