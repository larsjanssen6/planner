@extends('layouts.app')
@section('content')

    @component('layouts/hero')
    NIEUWE OPLEIDING
    @endcomponent

    <div class="container">
        <div class="section">
            {!! Form::open(['route' => 'education.store', 'method' => 'post']) !!}
                {{ csrf_field() }}

                <div class="field">
                    {{Form::label('name', 'Naam', ['class' => 'label'])}}
                    {{Form::text('name', '', ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
                </div>
                <div class="field">
                    {{Form::label('category_id', 'Categorie', ['class' => 'label'])}}
                    <div class="select">
                        {{Form::select('category_id', $categories, null, ['class' => 'input', 'placeholder' => 'Kies een categorie...', 'required' => 'required'])}}
                    </div>
                </div>
                <div class="field">
                    {{Form::label('vehicle_id', 'Voertuig', ['class' => 'label'])}}
                    <div class="select">
                        {{Form::select('vehicle_id', $vehicles, null, ['class' => 'input', 'placeholder' => 'Kies een voertuig...', 'required' => 'required'])}}
                    </div>
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


            {{--<form method="POST">--}}
                {{--{{ csrf_field() }}--}}

                {{--<input name="_method" type="hidden" value="PUT">--}}



                {{--@component('layouts/input', [--}}
                                    {{--'name' => 'name',--}}
                                    {{--'label' => 'Naam'--}}
                                {{--])--}}
                {{--@endcomponent--}}

                {{--TODO: dropdown fixen--}}
                {{--@component('layouts/dropdown', [--}}
                                   {{--'name' => 'category',--}}
                                   {{--'label' => 'Categorie',--}}
                                   {{--'array' => $categories,--}}
                                   {{--'value' => 'id',--}}
                                   {{--'option' => 'name',--}}
                                   {{--'selected' => 1--}}
                               {{--])--}}
                {{--@endcomponent--}}

                {{--@component('layouts/input', [--}}
                                    {{--'name' => 'duration',--}}
                                    {{--'label' => 'Duur in dagen',--}}
                                    {{--'type' => 'number'--}}
                                {{--])--}}
                {{--@endcomponent--}}

                {{--@component('layouts/input', [--}}
                                    {{--'name' => 'required_students',--}}
                                    {{--'label' => 'Aantal studenten',--}}
                                    {{--'type' => 'number'--}}
                                {{--])--}}
                {{--@endcomponent--}}

                {{--@component('layouts/input', [--}}
                                    {{--'name' => 'required_instructors',--}}
                                    {{--'label' => 'Aantal instructeurs',--}}
                                    {{--'type' => 'number'--}}
                                {{--])--}}
                {{--@endcomponent--}}

                {{--<div class="control">--}}
                    {{--<button type="submit" class="button is-primary is-outlined">--}}
                        {{--Maak opleiding aan--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</form>--}}
        </div>
    </div>
@endsection