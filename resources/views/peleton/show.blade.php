@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        PELETON
    @endcomponent

    <div class="container">
        <div class="section">
            @component('layouts/buttons/back', [
                             'route' => 'peleton.index',
                             'class' => 'pull-left'
                         ])
            @endcomponent

            @if(isset($peleton))

                @component('layouts/buttons/delete', [
                     'route' => 'peleton.destroy',
                     'id' => $peleton->id,
                     'text' => 'Verwijder peleton'
                 ])
                @endcomponent

                <div class="is-clearfix"></div>
                <hr>

                <h2 class="title is-2">{{ $peleton->name }}</h2>
                <p><strong>Aangemaakt:</strong> {{ $peleton->created_at }}</p>
                <p><strong>Laasts bijgewerkt:</strong> {{ $peleton->updated_at }}</p>
                <hr>
                <a href="{{ route('peleton.edit', ['id' => $peleton->id]) }}" class="button is-primary is-outlined">Bewerk peleton</a>
            @else
                <div class="is-clearfix"></div>
                <hr>
                <p>Het peleton kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection