@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        VOERTUIG
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

                <h2 class="title is-2">{{ $vehicle->name }}</h2>
                <p><strong>Categorie:</strong> {{ $vehicle->category->name }}</p>
                <p><strong>Onderhoudsinterval:</strong> {{$vehicle->maintenance_interval}} dagen</p>
                <p><strong>Onderhoudsduur:</strong> {{ $vehicle->maintenance_duration }} dagen</p>
                <p><strong>Aangemaakt:</strong> {{ $vehicle->created_at }}</p>
                <p><strong>Laasts bijgewerkt:</strong> {{ $vehicle->updated_at }}</p>
                <hr>
                <a href="{{ route('vehicle.edit', ['id' => $vehicle->id]) }}" class="button is-primary is-outlined">Bewerk voertuig</a>
            @else
                <div class="is-clearfix"></div>
                <hr>
                <p>Het voertuig kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection