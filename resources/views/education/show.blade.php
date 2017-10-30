@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        OPLEIDING
    @endcomponent

    <div class="container">
        <div class="section">
            @if(!$education == null)
            <h2 class="title is-2">{{ $education->name }}</h2>
            <hr>
            <p><strong>Categorie:</strong> {{ $education->category->name }}</p>
            <p><strong>Duur in dagen:</strong> {{ $education->duration }}</p>
            <p><strong>Aantal studenten:</strong> {{ $education->required_students }}</p>
            <p><strong>Aantal instructeurs:</strong> {{ $education->required_instructors }}</p>
            <p><strong>Aangemaakt:</strong> {{ $education->created_at }}</p>
            <p><strong>Laasts bijgewerkt:</strong> {{ $education->updated_at }}</p>
            <hr>
            <a href="{{ route('education.edit', ['id' => $education->id]) }}" class="button is-primary is-outlined">Bewerk opleiding</a>
            @else
                <p>De opleiding kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection