@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        GROEP
    @endcomponent

    <div class="container">
        <div class="section">

            @component('layouts/buttons/back', [
                 'route' => 'group.index',
                 'class' => 'pull-left'
             ])
            @endcomponent

            @if(isset($group))

                @component('layouts/buttons/delete', [
                     'route' => 'group.destroy',
                     'id' => $group->id,
                     'text' => 'Verwijder group'
                 ])
                @endcomponent

                <div class="is-clearfix"></div>
                <hr>

                <h2 class="title is-2">{{ $group->name }}</h2>
                @if(isset($group->peleton))
                <p>
                    <strong>Peleton:</strong>
                    <a href="{{ route('peleton.show', $group->peleton->id) }}"><span class="tag is-success">
                        {{ $group->peleton->name }}
                    </span></a>
                </p>
                @endisset()

                <p><strong>Aangemaakt:</strong> {{ $group->created_at }}</p>
                <p><strong>Laasts bijgewerkt:</strong> {{ $group->updated_at }}</p>
                <hr>
                <a href="{{ route('group.edit', ['id' => $group->id]) }}" class="button is-primary is-outlined">Bewerk groep</a>
            @else
                <div class="is-clearfix"></div>
                <hr>
                <p>De groep kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection