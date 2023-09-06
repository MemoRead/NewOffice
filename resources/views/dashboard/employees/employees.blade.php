@extends('dashboard.layouts.main')
@section('title', 'Members')

@section('container')
    <div class="pagetitle">
        <h1>Members</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Members</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Members List</h5>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <a href="/dashboard/members/create" class="btn btn-primary mb-3">Add New Member</a>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Expertise</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->expertise }}</td>
                                            <td>{{ $employee->address }}</td>
                                            <td>{{ $employee->phone }}</td>
                                            @if ($employee->photo)
                                                <td><img class="img-fluid" src="/storage/{{ $employee->photo }}"
                                                        alt="profile" style="max-width: 5rem">
                                                </td>
                                            @else
                                                <td><img class="img-fluid" src="/storage/photos/blank.jpg" alt="profile"
                                                        style="max-width: 5rem">
                                                </td>
                                            @endif

                                            <td class="text-center">
                                                <a href="/dashboard/members/{{ $employee->name }}"
                                                    class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                                <a href="/dashboard/members/{{ $employee->name }}/edit"
                                                    class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="/dashboard/members/{{ $employee->name }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
