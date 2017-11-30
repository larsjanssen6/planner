@extends('layouts.app')
@section('content')
    @component('layouts/partials/hero') DASHBOARD @endcomponent

    <div class="container">
        @component('layouts/partials/header')
            Persoonlijk dashboard voor {{ Auth::user()->name }}
        @endcomponent

        <div class="columns">
            <div class="column is-one-quarter">
                 @component('layouts/partials/card',
                    [
                        'labels' => [sprintf('Totaal, %s', $total_educations)],
                        'header' => isset($educations_latest) ? $educations_latest->created_at->diffForHumans() : 'nvt',
                        'footer' => 'Hier ziet u alle opleidingen.',
                        'meta'   => 'card-meta-blue'
                    ])

                    <a href="{{ route('education.index') }}">Opleidingen</a>

                    @can('see-graphs')

                        <pie-chart :data="{{ json_encode([
                                    $educations_total_last_month,
                                    $educations_total_current_month
                                ]) }}"
                                   :labels="{{ json_encode([
                                    Date::now()->subMonth()->format('F'),
                                    Date::now()->format('F')
                                ]) }}"
                                   :label="'Nieuwe opleidingen'"
                                   :background="'rgba(253, 228, 40, 0.6)'"
                                   :border="'rgba(253, 228, 40, 1)'">
                        </pie-chart>
                    @endcan
                @endcomponent
            </div>

            <div class="column is-one-quarter">
                @component('layouts/partials/card',
                   [
                       'labels' => [sprintf('Totaal, %s', $total_groups)],
                       'header' => isset($groups_latest) ? $groups_latest->created_at->diffForHumans() : 'nvt',
                       'footer' => 'Hier ziet u alle groepen.',
                       'meta'   => 'card-meta-blue'
                   ])

                    <a href="{{ route('group.index') }}">Groepen</a>

                    @can('see-graphs')

                        <pie-chart :data="{{ json_encode([
                                    $groups_total_last_month,
                                    $groups_total_current_month
                                ]) }}"
                                   :labels="{{ json_encode([
                                    Date::now()->subMonth()->format('F'),
                                    Date::now()->format('F')
                                ]) }}"
                                   :label="'Nieuwe groepen'"
                                   :background="'rgba(253, 228, 40, 0.6)'"
                                   :border="'rgba(253, 228, 40, 1)'">
                        </pie-chart>
                    @endcan
                @endcomponent
            </div>

            <div class="column is-one-quarter">
                @component('layouts/partials/card',
                   [
                       'labels' => [sprintf('Totaal, %s', $total_peletons)],
                       'header' => isset($groups_latest) ? $peletons_latest->created_at->diffForHumans() : 'nvt',
                       'footer' => 'Hier ziet u alle peletons.',
                       'meta'   => 'card-meta-blue'
                   ])

                    <a href="{{ route('peleton.index') }}">Peletons</a>
                    @can('see-graphs')
                        <pie-chart :data="{{ json_encode([
                                    $peletons_total_last_month,
                                    $peletons_total_current_month
                                ]) }}"
                                   :labels="{{ json_encode([
                                    Date::now()->subMonth()->format('F'),
                                    Date::now()->format('F')
                                ]) }}"
                                   :label="'Nieuwe peletons'"
                                   :background="'rgba(253, 228, 40, 0.6)'"
                                   :border="'rgba(253, 228, 40, 1)'">
                        </pie-chart>
                    @endcan
                @endcomponent
            </div>

            <div class="column is-one-quarter">
                @component('layouts/partials/card',
                   [
                       'labels' => [sprintf('Totaal, %s', $total_vehicles)],
                       'header' => isset($groups_latest) ? $vehicles_latest->created_at->diffForHumans() : 'nvt',
                       'footer' => 'Hier ziet u alle voertuigen.',
                       'meta'   => 'card-meta-blue'
                   ])

                    <a href="{{ route('vehicle.index') }}">Voertuigen</a>

                    @can('see-graphs')
                        <pie-chart :data="{{ json_encode([
                                    $vehicles_total_last_month,
                                    $vehicles_total_current_month
                                ]) }}"
                                   :labels="{{ json_encode([
                                    Date::now()->subMonth()->format('F'),
                                    Date::now()->format('F')
                                ]) }}"
                                   :label="'Nieuwe voertuigen'"
                                   :background="'rgba(253, 228, 40, 0.6)'"
                                   :border="'rgba(253, 228, 40, 1)'">
                        </pie-chart>
                    @endcan
                @endcomponent
            </div>
        </div>
        @component('layouts/partials/header')
            Besturing Dealcloser
        @endcomponent

        <div class="columns">
            <div class="column is-half">
                @component('layouts/partials/card',
                    [
                        'labels' => [sprintf('Totaal, %s', $users_total)],
                        'header' => $users_latest->created_at->diffForHumans(),
                        'footer' => 'Hier ziet u alle gebruikers van Dealcloser.',
                        'meta'   => 'card-meta-yellow'
                    ])

                    <a href="{{ route('user.index') }}">Gebruikers</a>
                @endcomponent
            </div>

            <div class="column is-half">
                @component('layouts/partials/card',
                    [
                        'labels' => ['Voor ' . Auth::user()->name],
                        'header' => 'November 17, 2016',
                        'footer' => 'Bekijk hier uw instellingen.',
                        'meta'   => 'card-meta-yellow'
                    ])

                    <a href="{{ route('settings.profile', Auth::user()->id) }}">Instellingen</a>
                @endcomponent
            </div>
        </div>
    </div>
@endsection
