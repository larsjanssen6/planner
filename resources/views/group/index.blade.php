@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        GROEPEN
    @endcomponent

    <div class="container">
        <div class="section">
            @if(!$groups->isEmpty())
                @can('create-group')
                    <div class="column">
                        <a href="{{ route('group.create') }}" class="button is-primary is-outlined">
                            Nieuwe groep
                        </a>
                    </div>
                @endcan
            @endif

            @if(!$groups->isEmpty())
                <div class="column">
                    {{--<modal-wrapper name="product" inline-template v-cloak>--}}
                        <div>
                            <table class="table is-fullwidth">
                                <thead class="thead-is-blue">
                                <tr>
                                    <th>
                                        <abbr>Groep</abbr>
                                    </th>

                                    <th>
                                        <abbr>Aangemaakt</abbr>
                                    </th>

                                    <th>
                                        <abbr>Laatst bijgewerkt</abbr>
                                    </th>

                                    <th></th>

                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($groups as $group)
                                    <tr>
                                        <td>
                                            {{ $group->name }}
                                        </td>

                                        <td>
                                            {{ $group->created_at->diffForHumans() }}
                                        </td>

                                        <td>
                                            {{ $group->updated_at->diffForHumans() }}
                                        </td>

                                        <td>
                                            <a href="{{ route('group.show', ['id' => $group->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </td>

                                        <td>
                                            <a href="{{ route('group.edit', ['id' => $group->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    {{--</modal-wrapper>--}}
                </div>
            @else
                <div class="notification is-info">
                    <p>
                        Er zijn momenteel geen groepen.

                        @can('create-group')
                            Maak deze <a href="{{ route('group.create') }}">hier</a> aan.
                        @endcan
                    </p>
                </div>
            @endif
        </div>

        <div class="column is-4 is-offset-4">
            {{ $groups->links('vendor.pagination.default') }}
        </div>
    </div>
@endsection