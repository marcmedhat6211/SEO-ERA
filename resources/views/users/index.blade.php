@extends('layouts.app')
@section('content')
<style>
    .button {
        margin-left: 40px;
    }
</style>
<div class="container">
<br>
<h3>User data</h3>
<br>
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    <a href="{{ route('users.create') }}" class="btn btn-success btn-lg" style="float: right;">Add User</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Admin</th>
                <th>Edit</th>
                <th>Delete</th>
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
                </td>
                <td>
                    <form method="POST" class="delete_form" action="{{ route('users.destroy', $user->id) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" id="" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm button">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('.delete_form').on('submit', function() {
            if(confirm("Are you sure you want to delete this user?")) {
                return true;
            } else {    
                return false;
            }
        });
    });
</script>
@endsection