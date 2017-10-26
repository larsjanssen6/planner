@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        OPLEIDINGEN
    @endcomponent

    <div class="container">
        <div class="section">
            @if(!$educations->isEmpty())
{{--                @can('create-education')--}}
                    <div class="column">
                        <a href="{{ route('education.create') }}" class="button is-primary is-outlined">
                            Nieuwe opleiding
                        </a>
                    </div>
                {{--@endcan--}}
            @endif

            @if(!$educations->isEmpty())
                <div class="column">
                    <modal-wrapper name="product" inline-template v-cloak>
                        <div>
                            <table class="table is-fullwidth">
                                <thead class="thead-is-blue">
                                <tr>
                                    <th>
                                        <abbr>Opleiding</abbr>
                                    </th>

                                    <th>
                                        <abbr>Categorie</abbr>
                                    </th>

                                    <th>
                                        <abbr>Duur in dagen</abbr>
                                    </th>

                                    <th>
                                        <abbr>Aantal studenten</abbr>
                                    </th>

                                    <th>
                                        <abbr>Aantal instructeurs</abbr>
                                    </th>

                                    <th>
                                        <abbr>Aangemaakt</abbr>
                                    </th>

                                    <th>
                                        <abbr>Laatst bijgewerkt</abbr>
                                    </th>

                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($educations as $education)
                                    <tr @click="show({{json_encode($education->id)}})">
                                        <td>
                                            {{ $education->name }}
                                        </td>

                                        <td>
                                            {{ $education->category->name }}
                                        </td>

                                        <td>
                                            {{ $education->duration }}
                                        </td>

                                        <td>
                                            {{ $education->required_students }}
                                        </td>

                                        <td>
                                            {{ $education->required_instructors }}
                                        </td>

                                        <td>
                                            {{ $education->created_at }}
                                        </td>

                                        <td>
                                            {{ $education->updated_at }}
                                        </td>

                                        <td>
                                            <i class="fa fa-eye" aria-hidden="true"></i>
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
                    </modal-wrapper>
                </div>
            @else
                <div class="notification is-info">
                    <p>
                        Er zijn momenteel geen opleidingen.

                        {{--@can('create-education')--}}
                            Maak deze <a href="{{ route('education.create') }}">hier</a> aan.
                        {{--@endcan--}}
                    </p>
                </div>
            @endif
        </div>

        <div class="column is-4 is-offset-4">
            {{ $educations->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection