@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        NIEUWE GEBRUIKER
    @endcomponent

    <div class="container">
        <div class="section">
            <p class="control">
                <a href="#" class="button is-default is-outlined pull-left">
                    <span class="icon">
                        <i aria-hidden="true" class="fa fa-angle-left"></i>
                    </span>

                    <span>Terug</span>
                </a>
            </p>

            <div class="is-clearfix"></div>
            <hr>

            <h2 class="title is-3">Nieuwe gebruiker</h2>

            {!! Form::open(['route' => 'user.store', 'method' => 'post']) !!}
            {{ csrf_field() }}

            <div class="field">
                {{Form::label('name', 'Naam', ['class' => 'label'])}}
                {{Form::text('name', '', ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
                @if ($errors->has('name'))
                    <p class="help is-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="field">
                {{Form::label('name', 'Achternaam', ['class' => 'label'])}}
                {{Form::text('last_name', '', ['class' => 'input', 'placeholder' => 'Achternaam', 'required' => 'required'])}}
                @if ($errors->has('last_name'))
                    <p class="help is-danger">{{ $errors->first('last_name') }}</p>
                @endif
            </div>

            <div class="field">
                {{Form::label('name', 'Email', ['class' => 'label'])}}
                {{Form::email('email', '', ['class' => 'input', 'placeholder' => 'Email', 'required' => 'required'])}}
                @if ($errors->has('email'))
                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="field">
                {{Form::label('name', 'Wachtwoord', ['class' => 'label'])}}
                {{Form::password('password', ['class' => 'input', 'placeholder' => 'Wachtwoord', 'required' => 'required'])}}
                @if ($errors->has('password'))
                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <div class="field">
                {{Form::label('name', 'Bevestig wachtwoord', ['class' => 'label'])}}
                {{Form::password('password_confirmation', ['class' => 'input', 'placeholder' => 'Bevestig wachtwoord', 'required' => 'required'])}}
                @if ($errors->has('password_confirmation'))
                    <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                @endif
            </div>

            {{ Form::submit('Maak gebruiker aan', ['class' => 'button is-primary is-outlined']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection