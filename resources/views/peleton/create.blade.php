@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        NIEUW PELETON
    @endcomponent

    <div class="container">
        <div class="section">

            @component('layouts/buttons/back', [
                 'route' => 'peleton.index',
                 'class' => 'pull-left'
             ])
            @endcomponent

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

                </div>

                <multi-select prp-name="groups"
                              :prp-options="{{ json_encode($groups) }}"
                              prp-placeholder="Kies groep(en)">
                </multi-select>

                {{ Form::submit('Maak peleton aan', ['class' => 'button is-primary is-outlined']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection