@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>you are a normal user</h1>
                    {{ __('You are logged in!') }}
                    @foreach($products as $product)
                        <h3>{{ $product->name }}</h3>
                        <h3><img src="{{ URL::asset('../public/images/ $product->image ') }}" alt=""></h3>
                        <h3>{{ $product->description }}</h3>
                        <h3>{{ $product->price }}$</h3>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
