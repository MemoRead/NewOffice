@extends('dashboard.layouts.main')
@section('title', 'Outgoing Mail Details')

@section('container')
    <div class="pagetitle">
        <h1>Letter Details</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Mails</li>
                <li class="breadcrumb-item">Outbox</li>
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
                                    disabled>{{ $mail->number }}</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Subject</div>
                                    <div class="col-lg-9 col-md-8">{{ $mail->subject }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Date</div>
                                    <div class="col-lg-9 col-md-8">{{ $mail->date }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Receiver</div>
                                    <div class="col-lg-9 col-md-8">
                                        {{ $mail->receiver }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Type</div>
                                    <div class="col-lg-9 col-md-8">{{ $mail->type }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Content / Summary</div>
                                    <div class="col-lg-9 col-md-8">{{ $mail->content }}</div>
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
                        @if ($mail->file)
                            <p>Archive File : {{ $fileName }}</p>

                            <iframe src="{{ $fileUrl }}" type="application/pdf"
                                style="width: 100%; height: 600px;"></iframe>
                        @else
                            <p>No preview available.</p>
                        @endif
                    </div>

                    <div class="card-body pt-3 text-center">
                        <a href="/dashboard/mails/outgoing-mails" class="btn btn-secondary">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
