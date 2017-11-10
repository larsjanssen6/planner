@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        GROEP
    @endcomponent

    <div class="container">
        <div class="section">

            <p class="control">
                <a href="{{ route('group.index') }}" class="button is-default is-outlined pull-left">
                <span class="icon">
                    <i aria-hidden="true" class="fa fa-angle-left"></i>
                </span>
                    <span>Terug</span>
                </a>
            </p>

            @if(isset($group))

                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    {{Form::hidden('_method', 'DELETE')}}

                    <p class="control">
                        <button type="submit" class="button is-danger is-outlined pull-right">
                                        <span class="icon">
                                            <i aria-hidden="true" class="fa fa-trash"></i>
                                        </span>
                            <span>Verwijder groep</span>
                        </button>
                    </p>
                {!! Form::close() !!}

                <div class="is-clearfix"></div>
                <hr>

                <h2 class="title is-2">{{ $group->name }}</h2>

                <p>
                    <strong>Peleton:</strong>

                    @if(isset($group->peleton))
                        <br>
                        <a href="{{ route('peleton.show', $group->peleton->id) }}"><span class="tag is-success">
                            {{ $group->peleton->name }}
                        </span></a>
                    @else
                        Deze groep heeft nog geen toegewezen peleton.
                    @endif
                </p>

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