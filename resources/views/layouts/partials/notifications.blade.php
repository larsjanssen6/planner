@if(Session::has('status'))
    <div id="is-popUp" class="notification is-popUp slideUp {!! Session::has('class') ? session('class') : '' !!}">
        <p>
            {!! session('status')  !!}
        </p>
    </div>
@endif