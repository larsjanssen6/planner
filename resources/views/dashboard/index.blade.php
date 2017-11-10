@extends('layouts.app')
@section('content')
    @component('layouts/partials/hero') DASHBOARD @endcomponent

    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <div class="column is-one-quarter">
                    {{--@component('layout/card',--}}
                        {{--[--}}
                            {{--'labels' => [sprintf('Totaal, %s', $relations_total)],--}}
                            {{--'header' => isset($relations_latest) ? $relations_latest->created_at->diffForHumans() : 'nvt',--}}
                            {{--'footer' => 'Hier ziet u alle relaties.',--}}
                            {{--'meta'   => 'card-meta-blue'--}}
                        {{--])--}}

                        {{--<a href="{{ route('relations') }}">Relaties</a>--}}

                        {{--@can('see-graphs')--}}
                            {{--<pie-chart  :data="{{ json_encode([--}}
                                        {{--$relations_total_last_month,--}}
                                        {{--$relations_total_current_month--}}
                                    {{--]) }}"--}}
                                        {{--:labels="{{ json_encode([--}}
                                            {{--Date::now()->subMonth()->format('F'),--}}
                                            {{--Date::now()->format('F')--}}
                                        {{--]) }}"--}}
                                        {{--:label="'Nieuwe relaties'"--}}
                                        {{--:background="'rgba(253, 228, 40, 0.6)'"--}}
                                        {{--:border="'rgba(253, 228, 40, 1)'">--}}
                            {{--</pie-chart>--}}
                        {{--@endcan--}}
                    {{--@endcomponent--}}
                </div>
            </div>
        </div>
    </div>
@endsection
