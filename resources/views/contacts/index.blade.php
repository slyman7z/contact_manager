@extends('layouts.main')
@section('title', 'Contact App | Contacts Status')
@section('content')
<main class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-title bg-danger">
                        <div class="d-flex align-items-center">
                            <h2 class="mb-0">All Tasks</h2>
                            <div class="ml-auto">
                                <a href="{{ route('contacts.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i> Add
                                    Task</a>
                                <button type="button" class="btn btn-secondary btn-sm">
                                    Notifications <span class="badge bg-warning mt-0">4</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @includeif('contacts._filter')

                        <table class="table table-striped table-hover">
                            <thead>

                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($contacts))
                                @foreach ($contacts as $id => $contact)
                                @include('contacts._contact', ['contact' => $contact])
                                @endforeach
                                @else

                                <p class="text-primary"> No contacts found </p>
                                @endif

                            </tbody>
                        </table>


                        <nav class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection