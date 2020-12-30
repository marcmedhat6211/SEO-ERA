@extends('layouts.app')

@section('content')
<!-- <div class="container">
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
</div> -->
		
		
	


		<!--new-arrivals start -->
		<section id="new-arrivals" class="new-arrivals">
			<div class="container">
				<div class="section-header">
					<h2>Our Products</h2>
				</div><!--/.section-header-->
				<div class="new-arrivals-content">
					<div class="row">
                        @foreach($products as $product)
						<div class="col-md-3 col-sm-4">
							<div class="single-new-arrival">
								<div class="single-new-arrival-bg">
									<img src="{{ asset('images/collection/arrivals1.png') }}" alt="new-arrivals images">
									<div class="single-new-arrival-bg-overlay"></div>
									<div class="sale bg-1">
										<p>sale</p>
									</div>
								</div>
								<h4><a href="#">{{ $product->name }}</a></h4>
                                <p class="arrival-product-price">${{ $product->price }}</p>
                                <p>{{ $product->description }}</p>
							</div>
                        </div>
                        @endforeach
					</div>
				</div>
			</div><!--/.container-->
		
		</section><!--/.new-arrivals-->
		<!--new-arrivals end -->

		

		

@endsection
