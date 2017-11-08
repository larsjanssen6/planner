@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
    INFO
    @endcomponent

    <div class="container">
        <div class="section">
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-8">
                    <div class="tile">
                        <div class="tile is-parent is-vertical">
                            <article class="tile is-child notification is-primary">
                                <p class="title">Version</p>
                                <p class="subtitle">1.0</p>
                            </article>
                            <article class="tile is-child notification is-warning">
                                <p class="title">Github</p>
                                <p class="subtitle"><a target="_blank" href="https://github.com/larsjanssen6/planner">Repository</a></p>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child notification is-info">
                                <p class="title">Het project</p>
                                <div class="content">
                                    <!-- Content -->
                                    Planner is een web applicatie dat het plannen voor de militaire rijschool in Oirschot makkelijker, beter en sneller maakt.
                                </div>
                                {{--<p class="title">Middle tile</p>--}}
                                {{--<p class="subtitle">With an image</p>--}}
                                {{--<figure class="image is-4by3">--}}
                                    {{--<img src="https://bulma.io/images/placeholders/640x480.png">--}}
                                {{--</figure>--}}
                            </article>
                        </div>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child notification is-danger">

                            <p class="title">Ontwikkelaars</p>
                            <p class="subtitle"><a target="_blank" href="https://github.com/larsjanssen6/">Lars Janssen</a> en <a target="_blank" href="https://github.com/SVH1997/">Sander van Hooff</a></p>
                            <div class="content">
                                <!-- Content -->
                            </div>
                        </article>
                    </div>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child notification is-success">
                        <div class="content">
                            <p class="title">De opdracht</p>
                            <p class="subtitle">Uitgevoerd binnen <a target="_blank" href="https://fontys.nl/">Fontys</a></p>
                            <div class="content">
                                <!-- Content -->
                                De opdracht is uitgevoerd binnen de Open Innovation specialisatie route van Fontys.<br><br>
                                Hierbij werken studenten samen, in opdracht van de militaire rijschool in Oirschot, aan een web applicatie die er voor zorgt dat het plannen van de rijlessen beter verloopt.<br><br>
                                De applicatie wordt ontwikkeld met de nieuwste web technieken wat zorgt voor stabiliteit en een goede werking.
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection