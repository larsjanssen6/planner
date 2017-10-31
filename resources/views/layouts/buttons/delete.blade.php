{{--Submits the passed id to the given route--}}

@if(isset($route) && isset($id) && isset($text))
    {!! Form::open(['route' => [$route, $id], 'method' => 'post']) !!}
    {{ csrf_field() }}
    {{Form::hidden('_method', 'DELETE')}}

    <p class="control">
        <button type="submit" class="button is-danger is-outlined pull-right">
                        <span class="icon">
                            <i aria-hidden="true" class="fa fa-trash"></i>
                        </span>
            <span>{{$text}}</span>
        </button>
    </p>
    {!! Form::close() !!}
@endif