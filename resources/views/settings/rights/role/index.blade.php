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

                    <div class="column is-faded is-9">
                        <h2 class="title is-3">
                            Rollen
                        </h2>

                        @forelse($roles as $role)
                            <div class="notification is-danger">
                                <button class="delete"></button>
                                {{ $role->name }}
                            </div>
                        @empty
                            <p>Er zijn nog geen rollen.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection