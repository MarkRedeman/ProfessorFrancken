@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <h1 class="section-header">
                        Roles
                    </h1>
                </div>

                <table class="table table-hover table-small">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Nr. accounts</th>
                            <th>Nr. permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr class="position-relative">
                                <td>
                                    <a href="{{ action([\Francken\Auth\Http\Controllers\Admin\RolesController::class, 'show'], $role->id)}}"
                                       class="stretched-link"
                                    >
                                        {{ $role->name }}
                                    </a>
                                </td>
                                <td>
                                    {{ $role->users->count() }}
                                </td>
                                <td>
                                    {{ $role->permissions->count() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $roles->links() }}
            </div>
        </div>
    </div>
@endsection