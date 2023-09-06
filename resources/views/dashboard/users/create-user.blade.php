@extends('dashboard.layouts.main')
@section('title', 'User Create')

@section('container')
    <div class="pagetitle">
        <h1>Add New User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Fulfill Form To Create New User</h5>

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
            <form class="row g-3" method="post" action="/dashboard/users">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating mb-3">
                        <select class="form-select @error('employee_id') is-invalid @enderror" id="employee"
                            aria-label="employee" name="employee_id">
                            <option selected>Choose</option>
                            @foreach ($employees as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        <label for="employee_id">Select Employee</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="floatingUsername" placeholder="Username" name="username" value="{{ old('username') }}"
                                required>
                            <label for="floatingUsername">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                            name="password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select @error('role') is-invalid @enderror" id="floatingSelect"
                            aria-label="Role" name="role">
                            <option selected>Choose</option>
                            <option value="user">User</option>
                        </select>
                        <label for="floatingSelect">Role</label>
                    </div>
                </div>
                <div class="text-center">
                    <a href="/dashboard/users" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
