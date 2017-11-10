@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        NIEUWE GROEP
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

            <div class="is-clearfix"></div>
            <hr>

            <h2 class="title is-3">Nieuwe groep</h2>
            {!! Form::open(['route' => 'group.store', 'method' => 'post']) !!}
            {{ csrf_field() }}

            <div class="field">
                {{Form::label('name', 'Naam', ['class' => 'label'])}}
                {{Form::text('name', '', ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
                @if ($errors->has('name'))
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                @endif
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