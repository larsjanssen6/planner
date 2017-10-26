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
                            Update profiel

                            {{--@foreach($user->roles as $role)--}}
                                {{--<span class="tag is-success">{{ $role->name }}</span>--}}
                            {{--@endforeach--}}
                        </h2>

                        <form method="POST" action="">
                            {{ csrf_field() }}

                            @component('layouts/input', [
                                    'name' => 'name',
                                    'label' => 'Naam',
                                    'value' => $user->name
                                ])
                            @endcomponent

                            @component('layouts/input', [
                                    'name' => 'last_name',
                                    'label' => 'Achternaam',
                                    'value' => $user->last_name
                                ])
                            @endcomponent

                            @component('layouts/input', [
                                   'name' => 'email',
                                   'label' => 'Email',
                                   'value' => $user->email,
                                   'type' => 'email'
                               ])
                            @endcomponent

                            @component('layouts/input', [
                                   'name' => 'password',
                                   'label' => 'Wachtwoord',
                                   'placeholder' => '**********',
                                   'required' => false,
                                   'type' => 'password'
                               ])
                            @endcomponent

                            @component('layouts/input', [
                                    'name' => 'password_confirmation',
                                    'label' => 'Bevestig wachtwoord',
                                    'placeholder' => '**********',
                                    'required' => false,
                                    'type' => 'password'
                                ])
                            @endcomponent

                            {{--@component('layouts/dropdown', [--}}
                                   {{--'name' => 'gender',--}}
                                   {{--'label' => 'Geslacht',--}}
                                   {{--'array' => [0 => "Vrouw", 1 => "Man"],--}}
                                   {{--'value' => 'id',--}}
                                   {{--'option' => 'name',--}}
                                   {{--'selected' => $user->gender--}}
                               {{--])--}}
                            {{--@endcomponent--}}

                            <div class="control">
                                <button type="submit" class="button is-primary is-outlined">
                                    Update profiel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection