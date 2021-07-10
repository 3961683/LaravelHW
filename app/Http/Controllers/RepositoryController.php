<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class RepositoryController extends Controller
{
    function index() {
        $repositories = Repository::query()
            ->latest()
            ->get();
        return view('models.repositories.index', [
            'repositories' => $repositories
        ]);
    }

    function create() {
        return view('models.repositories.form');
    }

    function store() {
        $data = request()->validate($this->rules());
        $repository = Repository::query()
            ->create($data);

        return redirect()->route('repositories.show', $repository);
    }

    function show(Repository $repository) {
        return view('models.repositories.show', [
            'repository' => $repository
        ]);
    }

    function edit(Repository $repository) {

        return view('models.repositories.form', [
            'repository' => $repository
        ]);
    }

    function update(Repository $repository) {
        $data = request()->validate($this->rules($repository));

        $repository->update($data);
        return redirect()->route('repositories.show', $repository);
    }

    function destroy(Repository $repository) {
        $repository->delete();
        return redirect()->route('repositories.index');
    }

    protected function rules(Repository $repository = null): array {
        $uniqueTitle = Rule::unique('repositories', 'title');

        if($repository) $uniqueTitle->ignoreModel($repository);

        return [
            'title' => [
                'required',
                'string',
                'max:255',
                $uniqueTitle,
            ],
            'description' => [
                'max:255'
            ],
            'password' => [
                'required',
                'string',
                'min:10'
            ]
        ];
    }


}
