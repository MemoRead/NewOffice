@extends('dashboard.layouts.main')
@section('title', 'Experiences')

@section('container')
    <div class="pagetitle">
        <h1>Comunity Experiences</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Experiences</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Comunity Experience List</h5>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <a href="/dashboard/experiences/create" class="btn btn-primary mb-3">Add New Experience</a>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Activity Name</th>
                                        <th scope="col">Type of Activity</th>
                                        <th scope="col">Locations</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Condition</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($experiences as $experience)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $experience->name }}</td>
                                            <td>{{ $experience->type }}</td>
                                            <td>{{ $experience->locations }}</td>
                                            <td>{{ $experience->date }}</td>
                                            <td>{{ $experience->results }}</td>
                                            <td class="text-center">
                                                <a href="/dashboard/experiences/{{ $experience->id }}"
                                                    class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                                <a href="/dashboard/experiences/{{ $experience->id }}/edit"
                                                    class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="/dashboard/experiences/{{ $experience->id }}" method="post"
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
