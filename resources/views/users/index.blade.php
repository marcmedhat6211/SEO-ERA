@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{ route('users.create') }}" class="btn btn-success btn-lg" style="float: right;">Add User</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $users as $user )
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->is_admin }}</td>
                <td>
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    <!-- <a href="" class="btn btn-danger btn-sm">Delete</a> -->
                    {{ !!Form::open(['action' => [UserController::class, 'destroy'], $user->id], method => 'POST', 'class' => 'pull-right'])!!}}
                        {{ Form::hidden('__method', 'DELETE') }}
                        <a href="" type="submit" class="btn btn-danger btn-sm">Delete</a>
                    {{ !!Form::close()!! }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection