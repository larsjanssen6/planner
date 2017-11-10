@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        OPLEIDING
    @endcomponent

    <div class="container">
        <div class="section">

            <p class="control">
                <a href="{{ route('education.index') }}" class="button is-default is-outlined pull-left">
                <span class="icon">
                    <i aria-hidden="true" class="fa fa-angle-left"></i>
                </span>
                    <span>Terug</span>
                </a>
            </p>

            @if(isset($education))

                @can('delete-education')
                {!! Form::open(['route' => ['education.destroy', $education->id], 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    {{Form::hidden('_method', 'DELETE')}}

                    <p class="control">
                        <button type="submit" class="button is-danger is-outlined pull-right">
                                    <span class="icon">
                                        <i aria-hidden="true" class="fa fa-trash"></i>
                                    </span>
                            <span>Verwijder opleiding</span>
                        </button>
                    </p>
                {!! Form::close() !!}
                @endcan

                <div class="is-clearfix"></div>
                <hr>

                <h2 class="title is-2">{{ $education->name }}</h2>

                <p>
                    <strong>Categorie:</strong>
                    {{ $education->category->name }}
                </p>

                <p>
                    <strong>Voertuigen:</strong> <br>

                    @forelse($education->vehicles as $vehicle)
                        <a href="{{ route('vehicle.show', $vehicle->id) }}"><span class="tag is-success">
                            {{ $vehicle->name }}
                        </span></a>
                    @empty
                        Deze opleiding heeft nog geen toegewezen voertuigen.
                    @endforelse
                </p>

                <p>
                    <strong>Duur in dagen:</strong>
                    {{ $education->duration }}
                </p>

                <p>
                    <strong>Aantal studenten:</strong>
                    {{ $education->required_students }}
                </p>

                <p>
                    <strong>Aantal instructeurs:</strong>
                    {{ $education->required_instructors }}
                </p>

                <p>
                    <strong>Aangemaakt:</strong>
                    {{ $education->created_at->diffForHumans() }}
                </p>

                <p>
                    <strong>Laasts bijgewerkt:</strong>
                    {{ $education->updated_at->diffForHumans() }}
                </p>

                <hr>

                @can('edit-education')
                <a href="{{ route('education.edit', ['id' => $education->id]) }}" class="button is-primary is-outlined">
                    Bewerk opleiding
                </a>
                @endcan
            @else
                <div class="is-clearfix"></div> <hr>
                <p>De opleiding kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection