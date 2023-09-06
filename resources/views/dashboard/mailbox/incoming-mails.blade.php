@extends('dashboard.layouts.main')
@section('title', 'Incoming Mails')

@section('container')
    <div class="pagetitle">
        <h1>MailsBox | Inbox</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item">Mails</li>
                <li class="breadcrumb-item active">inbox</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Inbox Mails</h5>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <a href="/dashboard/mails/incoming-mails/create" class="btn btn-primary mb-3">Add New Mails</a>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Mails Number</th>
                                        <th scope="col">Employee</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Sender</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Mails Type</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mails as $mail)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $mail->number }}</td>
                                            <td>{{ $mail->employee->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($mail->date)->format('F j, Y') }}</td>
                                            <td>{{ $mail->sender }}</td>
                                            <td>{{ $mail->subject }}</td>
                                            <td>
                                                {{ $mail->type }}
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('incoming-mails.show', ['number' => urlencode($mail->number)]) }}"
                                                    class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                                <a href="/dashboard/mails/incoming-mails/{{ $mail->number }}/edit"
                                                    class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="/dashboard/mails/incoming-mails/{{ $mail->number }}"
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
