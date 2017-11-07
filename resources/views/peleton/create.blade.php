@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        NIEUW PELETON
    @endcomponent

    <div class="container">
        <div class="section">

            <p class="control">
                <a href="{{ route('peleton.index') }}" class="button is-default is-outlined pull-left">
                <span class="icon">
                    <i aria-hidden="true" class="fa fa-angle-left"></i>
                </span>
                    <span>Terug</span>
                </a>
            </p>

            <div class="is-clearfix"></div>
            <hr>

            <h2 class="title is-3">Nieuw peleton</h2>
            {!! Form::open(['route' => 'peleton.store', 'method' => 'post']) !!}
                {{ csrf_field() }}

                <div class="field">
                    {{Form::label('name', 'Naam', ['class' => 'label'])}}
                    {{Form::text('name', '', ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
                </div>

                <div class="field">
                    {{Form::label('groups', 'Groepen', ['class' => 'label'])}}
                    <multi-select prp-name="groups"
                                  :prp-options="{{ json_encode($groups) }}"
                                  prp-placeholder="Kies groep(en)">
                    </multi-select>
                </div>

                {{ Form::submit('Maak peleton aan', ['class' => 'button is-primary is-outlined']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection