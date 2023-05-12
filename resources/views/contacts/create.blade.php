@extends('layouts.main')
@section('content')
<main class="py-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title bg-danger">
                        <strong>Add New Tasks</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="due_date" class="col-md-3 col-form-label">Due Date</label>
                                    <div class="col-md-9">
                                        <input type="date" name="due_date" id="due_date" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="title" class="col-md-3 col-form-label">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" name="title" id="title" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-3 col-form-label">Body</label>
                                    <div class="col-md-9">
                                        <textarea name="address" id="address" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="company_id" class="col-md-3 col-form-label">Action By</label>
                                    <div class="col-md-9">
                                        <select name="company_id" id="company_id" class="form-control">
                                            <option value=""> ----- </option>
                                            <option value="1">officer 1</option>
                                            <option value="2">officer Two</option>
                                            <option value="3">officer Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <label for="company_id" class="col-md-3 col-form-label">Upload File</label>
                                    <div class="col-md-9">
                                        <input type="file" name="" id="">
                                    </div>

                                    <div>

                                    </div>
                                    <hr>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-primary btn-sm mb-2">Save</button>
                                            <a href="{{ route('contacts.index')}}" class="btn btn-outline-secondary btn-sm">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection
@section('title', 'Contact App | Create Contact')