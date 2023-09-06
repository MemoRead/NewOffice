@extends('dashboard.layouts.main')
@section('title', 'Publications')

@section('container')
    <div class="pagetitle">
        <h1>Publications</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Archive</li>
                <li class="breadcrumb-item active">Publications</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List File Publications</h5>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <a href="/dashboard/archive/publications/create" class="btn btn-primary mb-3">Add Archive</a>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Archive Type</th>
                                        <th scope="col">Another Archive Type</th>
                                        <th scope="col">Descriptions</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($publications as $pub)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $pub->title }}</td>
                                            <td>{{ $pub->type }}</td>
                                            <td>{{ $pub->another_type }}</td>
                                            <td>{{ $pub->description }}</td>

                                            <td class="text-center">
                                                <a href="/dashboard/archive/publications/{{ $pub->id }}"
                                                    class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                                <a href="/dashboard/archive/publications/{{ $pub->id }}/edit"
                                                    class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="/dashboard/archive/publications/{{ $pub->id }}"
                                                    method="post" class="d-inline">
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
