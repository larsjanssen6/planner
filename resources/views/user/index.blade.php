@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        GEBRUIKERS
    @endcomponent

    <div class="container">
        <div class="section">
            @if(!$users->isEmpty())
                @can('create-user')
                    <div class="column">
                        <a href="{{ route('user.create') }}" class="button is-primary is-outlined">
                            Nieuwe gebruiker
                        </a>
                    </div>
                @endcan
            @endif

            @if(!$users->isEmpty())
                <div class="column">
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
                                    <tr>
                                        <td>
                                            {{ $user->name }} {{ $user->last_name }}
                                        </td>

                                        <td>
                                            {{ $user->email }}
                                        </td>

                                        <td>
                                            {{ $user->created_at->diffForHumans() }}
                                        </td>

                                        <td>
                                            {{ $user->updated_at->diffForHumans() }}
                                        </td>

                                        <td>
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="notification is-info">
                    <p>
                        Er zijn momenteel geen gebruikers.

                        @can('create-user')
                            Maak deze <a href="{{ route('user.create') }}">hier</a> aan.
                        @endcan
                    </p>
                </div>
            @endif
        </div>

        <div class="column is-4 is-offset-4">
            {{ $users->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection