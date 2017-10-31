@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        VOERTUIG
    @endcomponent

    <div class="container">
        <div class="section">

            @component('layouts/buttons/back', [
                 'route' => 'vehicle.index',
                 'class' => 'pull-left'
             ])
            @endcomponent

            @if(isset($vehicle))

                @component('layouts/buttons/delete', [
                     'route' => 'vehicle.destroy',
                     'id' => $vehicle->id,
                     'text' => 'Verwijder voertuig'
                 ])
                @endcomponent

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