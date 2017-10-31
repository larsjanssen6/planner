@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        BEWERK PELETON
    @endcomponent

    <div class="container">
        <div class="section">

            @component('layouts/buttons/back', [
                 'route' => 'peleton.index',
                 'class' => 'pull-left'
             ])
            @endcomponent

            @if(isset($peleton))

                @component('layouts/buttons/delete', [
                     'route' => 'peleton.destroy',
                     'id' => $peleton->id,
                     'text' => 'Verwijder peleton'
                 ])
                @endcomponent

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