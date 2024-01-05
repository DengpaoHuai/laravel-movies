@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le Film</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('movies.update', $movie->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $movie->title }}">
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea class="form-control" id="description" name="description">{{ $movie->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="release_date">Date de sortie :</label>
            <input type="date" class="form-control" id="release_date" name="release_date" value="{{ $movie->release_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
