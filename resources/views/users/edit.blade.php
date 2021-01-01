@extends('layouts.app')
@section('content')

<div class="container">
    <h3>Edit User</h3>
    @if( $errors->any() )
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="{{ $user->password }}">
        </div>
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="phone_number" class="form-control" id="phone_number" placeholder="Enter Phone Number" name="phone_number" value="{{ $user->phone_number }}">
        </div>
        <div class="form-group">
            <select name="is_admin" id="is_admin">
                <option value="0" {{ $user->is_admin ? 'selected' : '' }}>Not Admin</option>
                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
            </select>
        </div>
        <div class="form-group">
            <select name="is_banned" id="is_banned">
                <option value="0" {{ $user->is_banned ? 'selected' : '' }}>Activated</option>
                <option value="1" {{ $user->is_banned ? 'selected' : '' }}>Deactivated</option>
            </select>
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection