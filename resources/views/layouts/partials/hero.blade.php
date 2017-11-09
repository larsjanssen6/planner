<section class="hero has-text-centered">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                @if($slot == '')
                    PLANNER
                    <i class="fa fa-handshake-o" aria-hidden="true"></i>
                @else
                    {{ $slot }}
                @endif
            </h1>
        </div>
    </div>
</section>