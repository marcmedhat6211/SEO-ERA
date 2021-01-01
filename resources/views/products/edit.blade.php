@extends('layouts.app')
@section('content')

<div class="container">
    <h3>Edit Product</h3>
    @if( $errors->any() )
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form enctype="multipart/form-data" method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $product->name }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea type="description" class="form-control" id="description" placeholder="Enter description" name="description">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <img src="{{ asset('images/' . $product->image) }}" alt="">
            <input type="file" class="form-control" id="image" name="image" value="{{ $product->image }}">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="price" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{ $product->price }}">
        </div>
        {{ Form::hidden('_method', 'PUT') }}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection