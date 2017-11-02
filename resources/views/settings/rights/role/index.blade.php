@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        INSTELLINGEN
    @endcomponent

    <div class="container">
        <div class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-3">
                        @component('layouts/menu/settings') @endcomponent
                    </div>

                    <roles :roles="{{ $roles }}"></roles>
                </div>
            </div>
        </div>
    </div>
@endsection