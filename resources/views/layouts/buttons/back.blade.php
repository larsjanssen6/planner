@if(isset($route))

    @if (!isset($class))
        @php
            $class = ''
        @endphp
    @endif

<p class="control">
    <a href="{{ route($route) }}" class="button is-default is-outlined {{$class}}">
        <span class="icon">
            <i aria-hidden="true" class="fa fa-angle-left"></i>
        </span>
        <span>Terug</span>
    </a>
</p>
@endif