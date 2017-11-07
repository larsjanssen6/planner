@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        PELETON
    @endcomponent

    <div class="container">
        <div class="section">
            <p class="control">
                <a href="{{ route('peleton.index') }}" class="button is-default is-outlined pull-left">
                <span class="icon">
                    <i aria-hidden="true" class="fa fa-angle-left"></i>
                </span>
                    <span>Terug</span>
                </a>
            </p>

            @if(isset($peleton))

                {!! Form::open(['route' => ['peleton.destroy', $peleton->id], 'method' => 'post']) !!}
                    {{ csrf_field() }}
                    {{Form::hidden('_method', 'DELETE')}}

                    <p class="control">
                        <button type="submit" class="button is-danger is-outlined pull-right">
                                            <span class="icon">
                                                <i aria-hidden="true" class="fa fa-trash"></i>
                                            </span>
                            <span>Verwijder peleton</span>
                        </button>
                    </p>
                {!! Form::close() !!}

                <div class="is-clearfix"></div>
                <hr>

                <h2 class="title is-2">{{ $peleton->name }}</h2>
                <p>
                    <strong>Groepen:</strong>
                    @forelse($peleton->groups as $group)
                        <br>
                        <a href="{{route('group.show', $group->id)}}"><span class="tag is-success">
                            {{ $group->name }}
                        </span></a>
                    @empty
                        Dit peleton heeft nog geen toegewezen groepen.
                    @endforelse
                </p>
                <p><strong>Aangemaakt:</strong> {{ $peleton->created_at }}</p>
                <p><strong>Laasts bijgewerkt:</strong> {{ $peleton->updated_at }}</p>
                <hr>
                <a href="{{ route('peleton.edit', ['id' => $peleton->id]) }}" class="button is-primary is-outlined">Bewerk peleton</a>
            @else
                <div class="is-clearfix"></div>
                <hr>
                <p>Het peleton kon niet worden geladen.</p>
            @endif
        </div>
    </div>
@endsection