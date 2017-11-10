@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
    GEBRUIKERS
    @endcomponent

    <div class="container">
        <div class="section">
            @if(!$users->isEmpty())
                {{--                @can('create-education')--}}
                {{--<div class="column">--}}
                    {{--<a href="{{ route('education.create') }}" class="button is-primary is-outlined">--}}
                        {{--Nieuwe gebruiker--}}
                    {{--</a>--}}
                {{--</div>--}}
                {{--@endcan--}}
            @endif

            @if(!$users->isEmpty())
                <div class="column">
                    {{--<modal-wrapper name="product" inline-template v-cloak>--}}
                        <div>
                            <table class="table is-fullwidth">
                                <thead class="thead-is-blue">
                                <tr>
                                    <th>
                                        <abbr>Gebruiker</abbr>
                                    </th>

                                    <th>
                                        <abbr>Email</abbr>
                                    </th>

                                    <th>
                                        <abbr>Geboortedatum</abbr>
                                    </th>

                                    <th>
                                        <abbr>Geslacht</abbr>
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
                                @foreach($users as $user)
                                    <tr @click="show({{json_encode($user->id)}})">
                                    <td>
                                        {{ $user->name }} {{ $user->last_name }}
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        {{ $user-> birthday }}
                                    </td>

                                    <td>
                                        {{ $user->gender }}
                                    </td>

                                    <td>
                                        {{ $user->created_at }}
                                    </td>

                                    <td>
                                        {{ $user->updated_at }}
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
                    {{--</modal-wrapper>--}}
                </div>
            @else
                <div class="notification is-info">
                    <p>
                        Er zijn momenteel geen gebruikers.

                        {{--@can('create-education')--}}
                        {{--Maak deze <a href="{{ route('education.create') }}">hier</a> aan.--}}
                        {{--@endcan--}}
                    </p>
                </div>
            @endif
        </div>

        <div class="column is-4 is-offset-4">
            {{ $users->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection