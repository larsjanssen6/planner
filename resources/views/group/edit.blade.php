@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        BEWERK GROEP
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

            @if(isset($group))

                {!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    {{Form::hidden('_method', 'DELETE')}}

                    <p class="control">
                        <button type="submit" class="button is-danger is-outlined pull-right">
                                    <span class="icon">
                                        <i aria-hidden="true" class="fa fa-trash"></i>
                                    </span>
                            <span>Verwijder groep</span>
                        </button>
                    </p>
                {!! Form::close() !!}

                <div class="is-clearfix"></div>
                <hr>

                <h2 class="title is-3">Bewerk groep</h2>

                {{-- EDIT --}}
                {!! Form::open(['route' => ['group.update', $group->id], 'method' => 'post']) !!}
                {{ csrf_field() }}
                {{Form::hidden('_method', 'PUT')}}
                {{Form::hidden('id', $group->id)}}

                <div class="field">
                    {{Form::label('name', 'Naam', ['class' => 'label'])}}
                    {{Form::text('name', $group->name, ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
                    @if ($errors->has('name'))
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="field">
                    {{Form::label('peleton_id', 'Peleton', ['class' => 'label'])}}
                    <div class="select">
                        {{Form::select('peleton_id', $peletons, $group->peleton_id, ['class' => 'input', 'placeholder' => 'Kies een peleton...'])}}
                    </div>
                </div>

                {{ Form::submit('Opslaan', ['class' => 'button is-primary is-outlined']) }}
                {!! Form::close() !!}
            @else
                <div class="is-clearfix"></div>
                <hr>
                <p>De groep kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection