@extends('layouts.app')
@section('content')

    @component('layouts/hero')
    NIEUWE OPLEIDING
    @endcomponent

    <div class="container">
        <div class="section">

            @component('layouts/buttons/back', [
                 'route' => 'education.index',
                 'class' => 'pull-left'
             ])
            @endcomponent

            <div class="is-clearfix"></div>
            <hr>

            <h2 class="title is-3">Nieuwe opleiding</h2>
            {!! Form::open(['route' => 'education.store', 'method' => 'post']) !!}
                {{ csrf_field() }}

                <div class="field">
                    {{Form::label('name', 'Naam', ['class' => 'label'])}}
                    {{Form::text('name', '', ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
                </div>
                <div class="field">
                    <multiselect
                            v-model="category_id"
                            :options="options"
                            :multiple="true"
                            track-by="library"
                            :custom-label="customLabel"
                    >
                    </multiselect>
                </div>

                <div class="field">
                {{Form::label('category_id', 'Categorie', ['class' => 'label'])}}
                <div class="select">
                    {{Form::select('category_id', $categories, null, ['class' => 'input', 'placeholder' => 'Kies een categorie...', 'required' => 'required'])}}
                </div>

                <div class="field">
                    {{Form::label('vehicle_id', 'Voertuig', ['class' => 'label'])}}

                    @if($vehicles->isEmpty())
                        <p>Er zijn nog geen voertuigen. Maak deze <a href="{{ route('vehicle.create') }}">hier</a> eerst aan.</p>
                    @else
                        <multi-select prp-name="vehicles"
                                      :prp-options="{{ json_encode($vehicles) }}"
                                      prp-placeholder="Kies voertuig(en)">
                        </multi-select>
                    @endif
                </div>
                <div class="field">
                    {{Form::label('duration', 'Duur in dagen', ['class' => 'label'])}}
                    {{Form::number('duration', '', ['class' => 'input', 'placeholder' => 'Duur in dagen', 'required' => 'required', 'min' => '1'])}}
                </div>
                <div class="field">
                    {{Form::label('required_students', 'Aantal studenten', ['class' => 'label'])}}
                    {{Form::number('required_students', '', ['class' => 'input', 'placeholder' => 'Aantal studenten', 'required' => 'required', 'min' => '1'])}}
                </div>
                <div class="field">
                    {{Form::label('required_instructors', 'Aantal instructeurs', ['class' => 'label'])}}
                    {{Form::number('required_instructors', '', ['class' => 'input', 'placeholder' => 'Aantal instructeurs', 'required' => 'required', 'min' => '1'])}}
                </div>
                {{ Form::submit('Maak opleiding aan', ['class' => 'button is-primary is-outlined']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection