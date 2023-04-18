@extends('layouts.app')

@section('content')
    <h3 class="my-3 text-center">Edit project {{ $project->title }}</h3>
    <div class="card my-3">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                        @method('put')
                        @csrf

                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title') ?? $project->title }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="languages" class="form-label">Languages</label>
                        <select class="form-select" aria-label="Default select example" name="languages" id="languages">

                            <option value="php"@if (old('languages') == 'php') {{ 'selected' }} @endif>PHP
                            </option>
                            <option value="html"@if (old('languages') == 'html') {{ 'selected' }} @endif>HTML
                            </option>
                            <option value="javascript"@if (old('languages') == 'javascript') {{ 'selected' }} @endif>
                                Javascript
                            </option>
                        </select>

                        <label for="pic" class="form-label">Image</label>
                        <input type="text" name="pic" id="pic"
                            class="form-control @error('pic') is-invalid @enderror"
                            value="{{ old('pic') ?? $project->pic }}">
                        @error('pic')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description"
                            class="form-control @error('description') is-invalid @enderror"
                            value="{{ old('description') ?? $project->description }}">
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="link" class="form-label">Link</label>
                        <input type="text" name="link" id="link"
                            class="form-control @error('link') is-invalid @enderror"
                            value="{{ old('link') ?? $project->link }}">
                        @error('link')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <input type="submit" value="Save" class="btn btn-primary mt-3">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary mt-3">Discard change</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
