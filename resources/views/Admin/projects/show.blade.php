@extends('layouts.app')

@section('content')
    <h3 class="my-3 text-center">{{ $project->title }}</h3>
    <div class="card my-3">
        <div class="row g-0">
            <div class="col-md-12">
                <div class="card-body">
                    <p class="card-text"><strong>ID - </strong> {{ $project->id }} </p>
                    <p class="card-text"><strong>Title - </strong> {{ $project->title }} </p>
                    <p class="card-text"><strong>Description - </strong> {{ $project->description }}</p>
                    <p class="card-text"><strong>Languages - </strong> {{ $project->languages }}</p>
                    <p class="card-text"><strong>Project link - </strong> {{ $project->link }}</p>
                    <p class="card-text"><strong>Image url - </strong><a href="{{ $project->pic }}">{{ $project->pic }}</a>
                    </p>
                    <p class="card-text"><strong>Create - </strong> {{ $project->created_at }}</p>
                    <p class="card-text"><strong>Last update - </strong> {{ $project->updated_at }}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Return to projects</a>
@endsection
