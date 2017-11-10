@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        BEWERK VOERTUIG
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

            @if(isset($vehicle))

                {!! Form::open(['route' => ['vehicle.destroy', $vehicle->id], 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::hidden('id', $vehicle->id)}}

                    <p class="control">
                        <button type="submit" class="button is-danger is-outlined pull-right">
                                            <span class="icon">
                                                <i aria-hidden="true" class="fa fa-trash"></i>
                                            </span>
                            <span>Verwijder voertuig</span>
                        </button>
                    </p>
                {!! Form::close() !!}

                <div class="is-clearfix"></div>
                <hr>

                <h2 class="title is-3">Bewerk voertuig</h2>

                {{-- EDIT --}}
                {!! Form::open(['route' => ['vehicle.update', $vehicle->id], 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    {{Form::hidden('_method', 'PUT')}}

                    <div class="field">
                        {{Form::label('name', 'Naam', ['class' => 'label'])}}
                        {{Form::text('name', $vehicle->name, ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
                        @if ($errors->has('name'))
                            <p class="help is-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                    <div class="field">
                        {{Form::label('category_id', 'Categorie', ['class' => 'label'])}}
                        <div class="select">
                            {{Form::select('category_id', $categories, $vehicle->category_id, ['class' => 'input', 'placeholder' => 'Kies een categorie...', 'required' => 'required'])}}
                        </div>
                    </div>
                    <div class="field">
                        {{Form::label('maintenance_interval', 'Onderhoudsinterval in dagen', ['class' => 'label'])}}
                        {{Form::number('maintenance_interval', $vehicle->maintenance_interval, ['class' => 'input', 'placeholder' => 'Onderhoudsinterval in dagen', 'required' => 'required', 'min' => '1'])}}
                    </div>
                    <div class="field">
                        {{Form::label('maintenance_duration', 'Onderhoudsduur in dagen', ['class' => 'label'])}}
                        {{Form::number('maintenance_duration', $vehicle->maintenance_duration, ['class' => 'input', 'placeholder' => 'Onderhoudsduur in dagen', 'required' => 'required', 'min' => '1'])}}
                    </div>
                    {{ Form::submit('Opslaan', ['class' => 'button is-primary is-outlined']) }}
                {!! Form::close() !!}
            @else
                <div class="is-clearfix"></div>
                <hr>
                <p>Het voertuig kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection