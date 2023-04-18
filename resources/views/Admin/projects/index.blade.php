@extends('layouts.app')

@section('content')
    <div class="d-flex mt-3 justify-content-end">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Create new project</a>
    </div>
    <table class="table table-primary table-striped mt-2">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Languages</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->languages }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.projects.show', $project) }}"><i class="bi bi-eye-fill"></i></a>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="action-icon"><i
                                class="bi bi-pencil mx-2"></i>
                        </a>
                        <a type="button" class="text-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-modal-{{ $project->id }}">
                            <i class="bi bi-trash mx-2"></i>
                        </a>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    {{ $projects->links() }}

    <!-- Modal -->
    @foreach ($projects as $project)
        <div class="modal fade" id="delete-modal-{{ $project->id }}" tabindex="-1"
            aria-labelledby="delete-modal-{{ $project->id }}-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="delete-modal-{{ $project->id }}-label">
                            <i class="bi bi-exclamation-triangle-fill me-3 text-danger"></i>Delete Project ID -
                            {{ $project->id }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
                        Are you sure you want to delete the project <strong>{{ $project->title }}</strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
