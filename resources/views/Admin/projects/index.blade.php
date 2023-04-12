@extends('layouts.app')

@section('content')
    <table class="table table-primary table-striped mt-5">
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
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    {{ $projects->links() }}
@endsection