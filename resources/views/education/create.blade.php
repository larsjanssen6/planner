@extends('layouts.app')
@section('content')

    @component('layouts/hero')
    NIEUWE OPLEIDING
    @endcomponent

    <div class="container">
        <div class="section">
            <form method="POST">
                {{ csrf_field() }}

                <input name="_method" type="hidden" value="PUT">

                <div class="control">
                    <button type="submit" class="button is-primary is-outlined">
                        Maak opleiding aan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection