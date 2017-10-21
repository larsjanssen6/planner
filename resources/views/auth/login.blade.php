@extends('layouts.app')
@section('content')
    @component('layouts/hero') LOGIN @endcomponent

    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                @component('layouts/card',
                    [
                        'header' => 'Login',
                        'meta' => 'card-meta-primary'
                    ])

                    <form method="POST" class="form-horizontal" role="form" action="/">
                        {{ csrf_field() }}

                        <div class="field">
                            <label for="email" class="label">Email</label>

                            <p class="control has-icons-left {{ $errors->has('email') ? ' has-icons-right' : '' }}">
                                <input id="email"
                                       name="email"
                                       type="email"
                                       value="{{ old('email') }}"
                                       class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
                                       required
                                       autofocus>

                                <span class="icon is-small is-left">
                                    <i class="fa fa-envelope"></i>
                                </span>

                                @if ($errors->has('email'))
                                    <span class="icon is-small is-right">
                                        <i class="fa fa-warning"></i>
                                    </span>
                                @endif
                            </p>

                            @if ($errors->has('email'))
                                <p class="help is-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="password" class="label">Wachtwoord</label>

                            <p class="control has-icons-left {{ $errors->has('password') ? ' has-icons-right' : '' }}">
                                <input id="password"
                                       name="password"
                                       type="password"
                                       class="input {{ $errors->has('password') ? ' is-danger' : '' }}"
                                       required>

                                <span class="icon is-small is-left">
                                    <i class="fa fa-lock"></i>
                                </span>

                                @if ($errors->has('password'))
                                    <span class="icon is-small is-right">
                                        <i class="fa fa-warning"></i>
                                    </span>
                                @endif
                            </p>

                            @if ($errors->has('password'))
                                <p class="help is-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>

                        <div class="field is-grouped is-centered">
                            <div class="control">
                                <button id="submit" class="button is-primary">
                                    Login
                                </button>
                            </div>

                            <div class="control">
                                <a>Wachtwoord vergeten?</a>
                            </div>
                        </div>
                    </form>
                @endcomponent
            </div>
        </div>
    </div>
@endsection
