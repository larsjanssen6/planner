@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        NIEUW VOERTUIG
    @endcomponent

    <div class="container">
        <div class="section">

            <p class="control">
                <a href="{{ route('vehicle.index') }}" class="button is-default is-outlined pull-left">
                <span class="icon">
                    <i aria-hidden="true" class="fa fa-angle-left"></i>
                </span>
                    <span>Terug</span>
                </a>
            </p>

            <div class="is-clearfix"></div>
            <hr>

            <h2 class="title is-3">Nieuw voertuig</h2>
            {!! Form::open(['route' => 'vehicle.store', 'method' => 'post']) !!}
                {{ csrf_field() }}

                <div class="field">
                    {{Form::label('name', 'Naam', ['class' => 'label'])}}
                    {{Form::text('name', '', ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
                    @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="field">
                    {{Form::label('category_id', 'Categorie', ['class' => 'label'])}}
                    <div class="select">
                        {{Form::select('category_id', $categories, null, ['class' => 'input', 'placeholder' => 'Kies een categorie...', 'required' => 'required'])}}
                    </div>
                </div>
                <div class="field">
                    {{Form::label('maintenance_interval', 'Onderhoudsinterval in dagen', ['class' => 'label'])}}
                    {{Form::number('maintenance_interval', '', ['class' => 'input', 'placeholder' => 'Onderhoudsinterval in dagen', 'required' => 'required', 'min' => '1'])}}
                </div>
                <div class="field">
                    {{Form::label('maintenance_duration', 'Onderhoudsduur in dagen', ['class' => 'label'])}}
                    {{Form::number('maintenance_duration', '', ['class' => 'input', 'placeholder' => 'Onderhoudsduur in dagen', 'required' => 'required', 'min' => '1'])}}
                </div>
                {{ Form::submit('Maak voertuig aan', ['class' => 'button is-primary is-outlined']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection