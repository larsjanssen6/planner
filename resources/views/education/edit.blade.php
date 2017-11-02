@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        BEWERK OPLEIDING
    @endcomponent

    <div class="container">
        <div class="section">

            @component('layouts/buttons/back', [
                 'route' => 'education.index',
                 'class' => 'pull-left'
             ])
            @endcomponent

            @if(isset($education))

                @component('layouts/buttons/delete', [
                     'route' => 'education.destroy',
                     'id' => $education->id,
                     'text' => 'Verwijder opleiding'
                 ])
                @endcomponent

                <div class="is-clearfix"></div>
                <hr>

                <h2 class="title is-3">Bewerk opleiding</h2>

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
                    {{Form::label('vehicle_id', 'Voertuig(en)', ['class' => 'label'])}}

                    @if($vehicles->isEmpty())
                        <p>Er zijn nog geen voertuigen. Maak deze <a href="{{ route('vehicle.create') }}">hier</a> eerst aan.</p>
                    @else
                        <multi-select prp-name="vehicles"
                                      :prp-selected="{{ json_encode($education->vehicles) }}"
                                      :prp-options="{{ json_encode($vehicles) }}"
                                      prp-placeholder="Kies voertuig(en)">
                        </multi-select>
                    @endif
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

                {{ Form::submit('Opslaan', ['class' => 'button is-primary is-outlined', 'id' => 'submit']) }}

                {!! Form::close() !!}
            @else
                <div class="is-clearfix"></div>
                <hr>
                <p>De opleiding kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection