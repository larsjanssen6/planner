@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        BEWERK GROEP
    @endcomponent

    <div class="container">
        <div class="section">

            @component('layouts/buttons/back', [
                 'route' => 'group.index',
                 'class' => 'pull-left'
             ])
            @endcomponent

            @if(isset($group))

                @component('layouts/buttons/delete', [
                     'route' => 'group.destroy',
                     'id' => $group->id,
                     'text' => 'Verwijder groep'
                 ])
                @endcomponent

                <div class="is-clearfix"></div>
                <hr>

                <h2 class="title is-3">Bewerk groep</h2>

                {{-- EDIT --}}
                {!! Form::open(['route' => ['group.update', $group->id], 'method' => 'post']) !!}
                {{ csrf_field() }}
                {{Form::hidden('_method', 'PUT')}}

                <div class="field">
                    {{Form::label('name', 'Naam', ['class' => 'label'])}}
                    {{Form::text('name', $group->name, ['class' => 'input', 'placeholder' => 'Naam', 'required' => 'required'])}}
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