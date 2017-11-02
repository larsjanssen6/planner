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

                                <th><!-- show --></th>

                                <th><!-- edit --></th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($educations as $education)
                                <tr>
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
                                        {{ $education->created_at->diffForHumans() }}
                                    </td>

                                    <td>
                                        {{ $education->updated_at->diffForHumans() }}
                                    </td>

                                    <td>
                                        <a href="{{ route('education.show', ['id' => $education->id]) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>

                                    <td>
                                        <a href="{{ route('education.edit', ['id' => $education->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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