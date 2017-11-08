@extends('settings.layout')
@section('settings')
    <h2 class="title is-3">
        Update profiel

        @foreach($user->roles as $role)
            <span class="tag is-success">{{ $role->name }}</span>
        @endforeach
    </h2>

    <form method="POST">
        {{ csrf_field() }}

        <input name="_method" type="hidden" value="PUT">
        <input name="id" type="hidden" value="{{ Auth::user()->id }}">

        @component('layouts/partials/input', [
                'name' => 'name',
                'label' => 'Naam',
                'value' => $user->name
            ])
        @endcomponent

        @component('layouts/partials/input', [
                'name' => 'last_name',
                'label' => 'Achternaam',
                'value' => $user->last_name
            ])
        @endcomponent

        @component('layouts/partials/input', [
               'name' => 'email',
               'label' => 'Email',
               'value' => $user->email,
               'type' => 'email'
           ])
        @endcomponent

        @component('layouts/partials/input', [
               'name' => 'password',
               'label' => 'Wachtwoord',
               'placeholder' => '**********',
               'required' => false,
               'type' => 'password'
           ])
        @endcomponent

        @component('layouts/partials/input', [
                'name' => 'password_confirmation',
                'label' => 'Bevestig wachtwoord',
                'placeholder' => '**********',
                'required' => false,
                'type' => 'password'
            ])
        @endcomponent

        @component('layouts/partials/dropdown', [
               'name' => 'gender',
               'label' => 'Geslacht',
               'array' => [
                   ["id" => 0, "name" => "Vrouw"],
                   ["id" => 1, "name" => "Man"]
               ],
               'value' => 'id',
               'option' => 'name',
               'selected' => $user->gender
           ])
        @endcomponent

        <div class="control">
            <button type="submit" class="button is-primary is-outlined">
                Update profiel
            </button>
        </div>
    </form>
@endsection