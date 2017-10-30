@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        BEWERK OPLEIDING
    @endcomponent

    <div class="container">
        <div class="section">
            @if(!$education == null)
                <h2 class="title is-3 pull-left">Bewerk opleiding</h2>

                {{-- DESTROY --}}
                {!! Form::open(['route' => ['education.destroy', $education->id], 'method' => 'post']) !!}
                {{ csrf_field() }}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Verwijder opleiding', ['class' =>  'button is-danger is-outlined pull-right'])}}
                {!! Form::close() !!}

                <div class="is-clearfix"></div>

                {{-- EDIT --}}
                {!! Form::open(['route' => ['education.update', $education->id], 'method' => 'post']) !!}
                {{ csrf_field() }}
                {{Form::hidden('_method', 'PUT')}}

                <div class="field">
                    {{Form::label('name', 'Naam', ['class' => 'label'])}}
                    {{Form::text('name', $education->name, ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
                </div>
                <div class="field">
                    {{Form::label('category_id', 'Categorie', ['class' => 'label'])}}
                    <div class="select">
                        {{Form::select('category_id', $categories, $education->category_id, ['class' => 'input', 'placeholder' => 'Kies een categorie...', 'required' => 'required'])}}
                    </div>
                </div>
                <div class="field">
                    {{Form::label('vehicle_id', 'Voertuig', ['class' => 'label'])}}
                    <div class="select">
                        {{Form::select('vehicle_id', $vehicles, $education->vehicle_id, ['class' => 'input', 'placeholder' => 'Kies een voertuig...', 'required' => 'required'])}}
                    </div>
                </div>
                <div class="field">
                    {{Form::label('duration', 'Duur in dagen', ['class' => 'label'])}}
                    {{Form::number('duration', $education->duration, ['class' => 'input', 'placeholder' => 'Duur in dagen', 'required' => 'required', 'min' => '1'])}}
                </div>
                <div class="field">
                    {{Form::label('required_students', 'Aantal studenten', ['class' => 'label'])}}
                    {{Form::number('required_students', $education->required_students, ['class' => 'input', 'placeholder' => 'Aantal studenten', 'required' => 'required', 'min' => '1'])}}
                </div>
                <div class="field">
                    {{Form::label('required_instructors', 'Aantal instructeurs', ['class' => 'label'])}}
                    {{Form::number('required_instructors', $education->required_instructors, ['class' => 'input', 'placeholder' => 'Aantal instructeurs', 'required' => 'required', 'min' => '1'])}}
                </div>
                {{ Form::submit('Opslaan', ['class' => 'button is-primary is-outlined']) }}
                {!! Form::close() !!}
            @else
                <p>De opleiding kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection