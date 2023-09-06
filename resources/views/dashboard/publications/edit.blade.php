@extends('dashboard.layouts.main')
@section('title', 'Publication Edit')

@section('container')
    <div class="pagetitle">
        <h1>Add New Archive</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Archive</li>
                <li class="breadcrumb-item">Publications</li>
                <li class="breadcrumb-item active">Edit</li>
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
    <form class="col g-3" method="post" action="/dashboard/archive/publications/{{ $pub->id }}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card col-lg-8">
            <div class="card-body">
                <h5 class="card-title">Edit Archive</h5>
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Archive Title</label>
                    <div class="col-sm-10">
                        <input id="title" name="title" type="text"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $pub->title) }}" required>
                    </div>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Archive Type</label>
                    <div class="col-sm-10">
                        <select class="form-select @error('type') is-invalid @enderror" aria-label="type" name="type">
                            <option value="" {{ old('type', $pub->type) === null ? 'selected' : '' }}>Choose Type
                            </option>
                            <option value="1" {{ old('type', $pub->type) == 'Modul' ? 'selected' : '' }}>Modul</option>
                            <option value="2" {{ old('type', $pub->type) == 'Buku' ? 'selected' : '' }}>Book</option>
                            <option value="3" {{ old('type', $pub->type) == 'Jurnal' ? 'selected' : '' }}>Journal
                            </option>
                            <option value="4" {{ old('type', $pub->type) == 'Buku Panduan' ? 'selected' : '' }}>
                                Guidebook
                            </option>
                            <option value="5" {{ old('type', $pub->type) == 'lain lain' ? 'selected' : '' }}>Another
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="another_type" class="col-sm-2 col-form-label">Another Type</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('another_type') is-invalid @enderror"
                            value="{{ old('another_type', $pub->another_type) }}" id="another_type" name="another_type">
                        <small>Fill this form if you choose another on achive type</small>
                    </div>
                    @error('another_type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card col-lg-8">
            <div class="card-body">
                <h5 class="card-title">Descriptions / Summary</h5>
                <input id="description" type="hidden" name="description"
                    value="{{ old('description', $pub->description) }}" required>
                <trix-editor input="description"></trix-editor>
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
                    <a href="/dashboard/archive/publications" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
        </div>
    </form><!-- End floating Labels Form -->
@endsection
