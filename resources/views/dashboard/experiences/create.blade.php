@extends('dashboard.layouts.main')
@section('title', 'Add Experience')

@section('container')
    <div class="pagetitle">
        <h1>Add New Experience</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Experiences</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card col-lg-8">
        <div class="card-body">
            <h5 class="card-title">Form To Add New Experience</h5>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Floating Labels Form -->
            <form class="row g-3" method="post" action="/dashboard/experiences">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            placeholder="Activity Name" name="name" value="{{ old('name') }}" required>
                        <label for="floatingName">Activity Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('type') is-invalid @enderror" id="floatingtype"
                            placeholder="type" name="type" value="{{ old('type') }}" required>
                        <label for="floatingtype">Type of Activity</label>
                        @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('locations') is-invalid @enderror"
                            id="floatinglocations" placeholder="locations" name="locations" value="{{ old('locations') }}"
                            required>
                        <label for="floatinglocations">Locations</label>
                        @error('locations')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="floatingDate"
                            name="date" value="{{ old('date') }}">
                        <label for="floatingDate">Date</label>
                        @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('target') is-invalid @enderror" id="floatingtarget"
                            placeholder="target" name="target" value="{{ old('target') }}" required>
                        <label for="floatingtarget">Target</label>
                        @error('target')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select @error('employee_id') is-invalid @enderror" id="employee"
                            aria-label="employee" name="employee_id">
                            <option selected>Choose</option>
                            @foreach ($employees as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        <label for="employee_id">Coordinator</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select @error('results') is-invalid @enderror" id="floatingResults"
                            aria-label="Results" name="results">
                            <option selected>Choose</option>
                            <option value="1">Realized</option>
                            <option value="2">Not Yet Realized</option>
                            <option value="3">On Going</option>
                            <option value="4">Not Realization </option>
                        </select>
                        <label for="floatingResults">Results</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('descriptions') is-invalid @enderror"
                            id="floatingDescriptions" placeholder="Descriptions" name="descriptions"
                            value="{{ old('descriptions') }}" required>
                        <label for="floatingDescriptions">Descriptions</label>
                        @error('descriptions')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('notes') is-invalid @enderror" id="floatingNotes"
                            placeholder="Notes" name="notes" value="{{ old('notes') }}" required>
                        <label for="floatingNotes">Notes</label>
                        @error('notes')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="text-center">
                    <a href="/dashboard/experiences" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
