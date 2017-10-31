@extends('layouts.app')
@section('content')

    @component('layouts/hero')
        NIEUWE GROEP
    @endcomponent

    <div class="container">
        <div class="section">
            @component('layouts/buttons/back', [
                 'route' => 'group.index',
                 'class' => 'pull-left'
             ])
            @endcomponent

            <div class="is-clearfix"></div>
            <hr>
        </div>
    </div>
@endsection