@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        NIEUWE GROEP
    @endcomponent

    <div class="container">
        <div class="section">
            @component('layouts/buttons/back', [
                 'route' => 'group.index',
                 'class' => 'pull-left'
             ])
            @endcomponent

            <div class="is-clearfix"></div>
            <hr>

            <h2 class="title is-3">Nieuwe groep</h2>
            {!! Form::open(['route' => 'group.store', 'method' => 'post']) !!}
            {{ csrf_field() }}

            <div class="field">
                {{Form::label('name', 'Naam', ['class' => 'label'])}}
                {{Form::text('name', '', ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
            </div>

            <div class="field">
                {{Form::label('peleton_id', 'Kies een peleton', ['class' => 'label'])}}
                <div class="select">
                    {{Form::select('peleton_id', $peletons, null, ['class' => 'input', 'placeholder' => 'Kies een peleton...'])}}
                </div>
            </div>

            {{ Form::submit('Maak groep aan', ['class' => 'button is-primary is-outlined']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection