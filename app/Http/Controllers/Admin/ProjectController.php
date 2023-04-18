<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validation($request->all());

        $project = new Project;
        $project->fill($data);
        $project->save();

        return to_route('admin.projects.show', $project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    //   Validazione 

    private function validation($data)
    {
        $validator = Validator::make(

            $data,
            [
                'title'  => 'required|string|max:100',
                'pic' => 'nullable|string',
                'description' => 'required|string',
                'languages' => 'required',
                'link' => 'nullable|string'
            ],
            [
                'title.required' => 'il campo è richiesto',
                'description.required' => 'il campo è richiesto',
                'languages.required' => 'il campo è richiesto',

                'title.string' => 'il campo deve essere una stringa',
                'pic.string' => 'il campo deve essere una stringa',
                'description.string' => 'il campo deve essere una stringa',
                'link.string' => 'il campo deve essere una stringa',

                'title.max' => 'il campo deve avere massimo 100 caratteri',
            ]
        )->validate();
        return $validator;
    }
}
