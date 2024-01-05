@extends('layouts.app')



@section('content')
<div class="container">
    <h2>Liste des Films</h2>
    <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Ajouter un Film</a>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date de sortie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>
                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce film?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection