@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
    INSTELLINGEN
    @endcomponent

    <div class="container">
        <div class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-3">
                        @component('layouts/menu/settings') @endcomponent
                    </div>

                    <div class="column is-faded is-9">
                        @yield('settings')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection