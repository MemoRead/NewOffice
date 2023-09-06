@extends('dashboard.layouts.main')
@section('title', 'User Edit')

@section('container')
    <div class="pagetitle">
        <h1>Edit User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Edit Existing User</h5>

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
            <form class="row g-3" method="post" action="/dashboard/users/{{ $user->username }}">
                @csrf
                @method('put')
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="floatingUsername" placeholder="Username" name="username"
                                value="{{ old('username', $user->username) }}" required>
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
                            name="password">
                        <label for="floatingPassword">Password</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-3">
                        <select class="form-select @error('role') is-invalid @enderror" id="floatingSelect"
                            aria-label="Role" name="role">
                            <option value="" {{ old('role', $user->role) === null ? 'selected' : '' }}>Choose</option>
                            <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User
                            </option>
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
