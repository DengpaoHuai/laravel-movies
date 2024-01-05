<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Movie;


class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('list', compact('movies'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_date' => 'required|date',
        ]);

        // Exclure le champ _token
        $data = $request->except('_token');

        Movie::create($data);

        return redirect()->route('movies.index')
            ->with('success', 'Movie created successfully');
    }


    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_date' => 'required|date',
        ]);

        $movie = Movie::find($id);

        $movie->update($request->all());

        return redirect()->route('movies.index')
            ->with('success', 'Movie updated successfully');
    }

    public function destroy($id)
    {
        Movie::find($id)->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Movie deleted successfully');
    }
}
