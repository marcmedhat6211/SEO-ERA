@extends('layouts.app')
@section('content')
<style>
    .button {
        margin-left: 40px;
    }
</style>
<div class="container">
<br>
<h3>Product data</h3>
<br>
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
    <a href="{{ route('products.create') }}" class="btn btn-success btn-lg" style="float: right;">Add Product</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $products as $product )
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td><img style="height: 40px; width: 40px" src="{{ asset('images/' . $product->image) }}" alt=""></td>
                <td>
                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                </td>
                <td>
                    <form method="POST" class="delete_form" action="{{ route('products.destroy', $product->id) }}">
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
            if(confirm("Are you sure you want to delete this product?")) {
                return true;
            } else {    
                return false;
            }
        });
    });
</script>
@endsection