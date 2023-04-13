@extends('layouts.app')

@section('content')
    <h3 class="my-3 text-center">Create new project</h3>
    <div class="card my-3">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="{{ route('admin.projects.store') }}" method="post">
                        @csrf

                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" />

                        <select class="form-select my-3" aria-label="Default select example" name="languages">
                            <option selected>Select languages used</option>
                            <option value="php">PHP</option>
                            <option value="html">HTML</option>
                            <option value="javascript">Javascript</option>
                        </select>

                        <label for="pic" class="form-label">Image</label>
                        <input type="text" name="pic" id="pic" class="form-control" />

                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control" />

                        <label for="link" class="form-label">Link</label>
                        <input type="text" name="link" id="link" class="form-control" />

                        <input type="submit" value="Save" class="btn btn-primary mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Return to projects</a>
@endsection
