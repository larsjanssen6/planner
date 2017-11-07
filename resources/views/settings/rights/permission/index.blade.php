@extends('layouts.app')
@section('content')

    @component('layouts/partials/hero')
        INSTELLINGEN
    @endcomponent

    <div class="container">
        <div class="section">
            <div class="container">
                <div class="columns">
                    <div class="column is-3">
                        @component('layouts/menu/settings') @endcomponent
                    </div>

                    <div class="column is-faded is-9">
                        <h2 class="title is-3">
                            Permissies
                        </h2>

                        <table class="table is-fullwidth">
                            <thead>
                            <tr>
                                <th>Permissie</th>

                                @foreach($roles as $role)
                                    <th>{{ $role->name }}</th>
                                @endforeach
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                <tr style="background: #34495e;">
                                    <td>
                                        <strong style="color: white;">{{ $category->name }}</strong>
                                    </td>
                                </tr>

                                @foreach($category->permissions as $permission)
                                    <tr>
                                        <td>
                                            {{ $permission->description }}
                                        </td>

                                        @foreach($roles as $role)
                                            <td>
                                                <input id="{{ $role->name }}"
                                                       name="{{ $role->name }}"
                                                       type="checkbox"
                                                       {{ $role->hasPermissionTo($permission) ? 'checked="checked"' : '' }}
                                                       onclick='window.location.assign("/instellingen/permissies/update?role={{ $role->id }}&permission={{ $permission->name }}")'>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection