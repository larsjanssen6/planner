@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        VOERTUIGEN
    @endcomponent

    <div class="container">
        <div class="section">
            @if(!$vehicles->isEmpty())
{{--                @can('create-education')--}}
                    <div class="column">
                        <a href="{{ route('vehicle.create') }}" class="button is-primary is-outlined">
                            Nieuw voertuig
                        </a>
                    </div>
                {{--@endcan--}}
            @endif

            @if(!$vehicles->isEmpty())
                <div class="column">
                    {{--<modal-wrapper name="product" inline-template v-cloak>--}}
                        <div>
                            <table class="table is-fullwidth">
                                <thead class="thead-is-blue">
                                <tr>
                                    <th>
                                        <abbr>Voertuig</abbr>
                                    </th>

                                    <th>
                                        <abbr>Categorie</abbr>
                                    </th>

                                    <th>
                                        <abbr>Onderhoudsinterval in dagen</abbr>
                                    </th>

                                    <th>
                                        <abbr>Onderhoudsduur in dagen</abbr>
                                    </th>

                                    <th>
                                        <abbr>Aangemaakt</abbr>
                                    </th>

                                    <th>
                                        <abbr>Laatst bijgewerkt</abbr>
                                    </th>

                                    <th><!-- show --></th>

                                    <th><!-- edit --></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($vehicles as $vehicle)
                                    <tr>
                                        <td>
                                            {{ $vehicle->name }}
                                        </td>

                                        <td>
                                            {{ $vehicle->category->name }}
                                        </td>

                                        <td>
                                            {{ $vehicle->maintenance_interval }}
                                        </td>

                                        <td>
                                            {{ $vehicle->maintenance_duration }}
                                        </td>

                                        <td>
                                            {{ $vehicle->created_at }}
                                        </td>

                                        <td>
                                            {{ $vehicle->updated_at }}
                                        </td>

                                        <td>
                                            <a href="{{ route('vehicle.show', ['id' => $vehicle->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>

                                        <td>
                                            <a href="{{ route('vehicle.edit', ['id' => $vehicle->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                    {{--<div>--}}
                                        {{--@can('edit-products')--}}
                                            {{--<update-product :prp-product="{{json_encode($product)}}"></update-product>--}}
                                        {{--@else--}}
                                            {{--<product :prp-product="{{json_encode($product)}}"></product>--}}
                                        {{--@endcan--}}
                                    {{--</div>--}}
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    {{--</modal-wrapper>--}}
                </div>
            @else
                <div class="notification is-info">
                    <p>
                        Er zijn momenteel geen voertuigen.

                        {{--@can('create-education')--}}
                            Maak deze <a href="{{ route('vehicle.create') }}">hier</a> aan.
                        {{--@endcan--}}
                    </p>
                </div>
            @endif
        </div>

        <div class="column is-4 is-offset-4">
            {{ $vehicles->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection