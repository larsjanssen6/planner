@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        BEWERK PELETON
    @endcomponent

    <div class="container">
        <div class="section">

            <p class="control">
                <a href="{{ route('peleton.index') }}" class="button is-default is-outlined pull-left">
                <span class="icon">
                    <i aria-hidden="true" class="fa fa-angle-left"></i>
                </span>
                    <span>Terug</span>
                </a>
            </p>

            @if(isset($peleton))

                {!! Form::open(['route' => ['peleton.destroy', $peleton->id], 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    {{Form::hidden('_method', 'DELETE')}}

                    <p class="control">
                        <button type="submit" class="button is-danger is-outlined pull-right">
                                        <span class="icon">
                                            <i aria-hidden="true" class="fa fa-trash"></i>
                                        </span>
                            <span>Verwijder peleton</span>
                        </button>
                    </p>
                {!! Form::close() !!}

                <div class="is-clearfix"></div>
                <hr>

                <h2 class="title is-3">Bewerk peleton</h2>

                {{-- EDIT --}}
                {!! Form::open(['route' => ['peleton.update', $peleton->id], 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    {{Form::hidden('_method', 'PUT')}}

                    <div class="field">
                        {{Form::label('name', 'Naam', ['class' => 'label'])}}
                        {{Form::text('name', $peleton->name, ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
                    </div>

                    <div class="field">

                        {{Form::label('group_id', 'Groep(en)', ['class' => 'label'])}}
                        @if(count($groups) == 0 && count($peleton->groups) == 0)
                            <p>Er zijn nog geen groepen. Maak deze <a href="{{ route('group.create') }}">hier</a> eerst aan.</p>
                        @else
                            <multi-select prp-name="groups"
                                          :prp-selected="{{ json_encode($peleton->groups) }}"
                                          :prp-options="{{ json_encode($groups) }}"
                                          prp-placeholder="Kies groep(en)">
                            </multi-select>
                        @endif
                    </div>
                    {{ Form::submit('Opslaan', ['class' => 'button is-primary is-outlined']) }}
                {!! Form::close() !!}
            @else
                <div class="is-clearfix"></div>
                <hr>
                <p>Het peleton kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection