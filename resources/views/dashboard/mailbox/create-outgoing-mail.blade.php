@extends('dashboard.layouts.main')
@section('title', 'Outgoing Mail Create')

@section('container')
    <div class="pagetitle">
        <h1>Create New Outgoing Mails</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Mails</li>
                <li class="breadcrumb-item">Outbox</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show col-lg-8" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Floating Labels Form -->
    <form class="col g-3" method="post" action="/dashboard/mails/outgoing-mails" enctype="multipart/form-data">
        @csrf
        <div class="card col-lg-8">
            <div class="card-body">
                <h5 class="card-title">Create New Outgoing Mails</h5>
                <div class="row mb-3">
                    <label for="number" class="col-sm-2 col-form-label">Mails Number</label>
                    <div class="col-sm-10">
                        <input id="number" name="number" type="text"
                            class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}" required>
                    </div>
                    @error('number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('date') is-invalid @enderror"
                            value="{{ old('date') }}" id="date" name="date" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="type" class="col-sm-2 col-form-label">Letter Type</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('type') is-invalid @enderror"
                            value="{{ old('type') }}" id="type" name="type" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="receiver" class="col-sm-2 col-form-label">Receiver</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('receiver') is-invalid @enderror"
                            value="{{ old('receiver') }}" id="receiver" name="receiver" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('subject') is-invalid @enderror"
                            value="{{ old('subject') }}" id="subject" name="subject" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Concerned employee (PIC)</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="employee" name="employee_id">
                            <option value="" selected>Choose PIC</option>
                            @foreach ($employees as $employee)
                                @if (old('employee') == $employee->id)
                                    <option value="{{ $employee->id }}" selected>{{ $employee->name }}</option>
                                @else
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-lg-8">
            <div class="card-body">
                <h5 class="card-title">Contents of the letter / Summary</h5>
                <input id="content" type="hidden" name="content">
                <trix-editor input="content"></trix-editor>
            </div>
        </div>
        <div class="card col-lg-8">
            <div class="card-body">
                <h5 class="card-title">Files</h5>
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <input class="form-control @error('file') is-invalid @enderror" type="file" id="file"
                            name="file">
                    </div>
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-center">
                    <a href="/dashboard/mails/outgoing-mails" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </div>
    </form><!-- End floating Labels Form -->
@endsection
