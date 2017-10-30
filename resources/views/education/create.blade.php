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

                @component('layouts/input', [
                                    'name' => 'name',
                                    'label' => 'Naam'
                                ])
                @endcomponent

                {{--TODO: dropdown fixen--}}
                {{--@component('layouts/dropdown', [--}}
                                   {{--'name' => 'category',--}}
                                   {{--'label' => 'Categorie',--}}
                                   {{--'array' => $categories,--}}
                                   {{--'value' => 'id',--}}
                                   {{--'option' => 'name',--}}
                                   {{--'selected' => 1--}}
                               {{--])--}}
                {{--@endcomponent--}}

                @component('layouts/input', [
                                    'name' => 'duration',
                                    'label' => 'Duur in dagen',
                                    'type' => 'number'
                                ])
                @endcomponent

                @component('layouts/input', [
                                    'name' => 'required_students',
                                    'label' => 'Aantal studenten',
                                    'type' => 'number'
                                ])
                @endcomponent

                @component('layouts/input', [
                                    'name' => 'required_instructors',
                                    'label' => 'Aantal instructeurs',
                                    'type' => 'number'
                                ])
                @endcomponent

                <div class="control">
                    <button type="submit" class="button is-primary is-outlined">
                        Maak opleiding aan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection