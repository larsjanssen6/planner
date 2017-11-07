@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        PELETONS
    @endcomponent

    <div class="container">
        <div class="section">
            @if(!$peletons->isEmpty())
{{--                @can('create-education')--}}
                    <div class="column">
                        <a href="{{ route('peleton.create') }}" class="button is-primary is-outlined">
                            Nieuw peleton
                        </a>
                    </div>
                {{--@endcan--}}
            @endif

            @if(!$peletons->isEmpty())
                <div class="column">
                    {{--<modal-wrapper name="product" inline-template v-cloak>--}}
                        <div>
                            <table class="table is-fullwidth">
                                <thead class="thead-is-blue">
                                <tr>
                                    <th>
                                        <abbr>Peleton</abbr>
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
                                @foreach($peletons as $peleton)
                                    <tr @click="show({{json_encode($peleton->id)}})">
                                        <td>
                                            {{ $peleton->name }}
                                        </td>

                                        <td>
                                            {{ $peleton->created_at }}
                                        </td>

                                        <td>
                                            {{ $peleton->updated_at }}
                                        </td>

                                        <td>
                                            <a href="{{ route('peleton.show', ['id' => $peleton->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>

                                        <td>
                                            <a href="{{ route('peleton.edit', ['id' => $peleton->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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
                        Er zijn momenteel geen peletons.

                        {{--@can('create-education')--}}
                            Maak deze <a href="{{ route('peleton.create') }}">hier</a> aan.
                        {{--@endcan--}}
                    </p>
                </div>
            @endif
        </div>

        <div class="column is-4 is-offset-4">
            {{ $peletons->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection