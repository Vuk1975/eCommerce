@extends('layouts.app')

@section('content')
<main role="main">

    
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            @if(count($sliders)>0)
            @foreach($sliders as $key=> $slider)

            <div class="carousel-item {{$key == 0 ? 'active' : ''}} ">
                <img class="d-block w-100" src="{{Storage::url($slider->image)}}" >
            
            </div>
            @endforeach
            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
   
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Category</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
        @foreach(App\Models\Category::all() as $cat)
            <li class="nav-item active">
            <a class="nav-link" href="{{route('product.list', [$cat->slug])}}">{{$cat->name}} <span class="sr-only">(current)</span></a>
            </li>
        @endforeach
    </ul>
    <span class="navbar-text">
      Choose category
    </span>
  </div>
</nav>
  <div class="container">
        <div class="album py-5 bg-light">
            <div class="container">
            <h3>Products</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            
                @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{Storage::url($product->image)}}" height="200" style="width: 100%">
                        <div class="card-body">
                            <p><b>{{$product->name}}</b></p>
                            <p class="card-text">
                                {!!(Str::limit($product->description,120))!!}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('product.view', [$product->id])}}"> <button type="button" class="btn btn-sm btn-outline-success">View</button>
                                    </a>
                
                                    <a href="{{route('add.cart',[$product->id])}}">

                                        <button type="button" class="btn btn-sm btn-outline-primary">Add to cart
                                        </button>

                                    </a>
                
                                </div>
                                <small class="text-muted">${{$product->price}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <center>
            <a href="{{route('more.product')}}" ><button class="btn btn-success m-3">More Product</button>
            </a>
            </center>
        </div>
        <div class="jumbotron">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            @foreach($randomActiveProducts as $product)
                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img src="{{Storage::url($product->image)}}" height="200" style="width: 100%">
                                    <div class="card-body">
                                        <p><b>{{$product->name}}</b></p>
                                        <p class="card-text">
                                            {!!(Str::limit($product->description,120))!!}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{route('product.view',[$product->id])}}">  <button type="button" class="btn btn-sm btn-outline-success">View</button></a>
                                            <a href="{{route('add.cart',[$product->id])}}"> 
                                            <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button></a>
                                            </div>
                                            <small class="text-muted">${{$product->price}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
        
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="row">
                        @foreach($randomItemProducts as $product)

                            <div class="col-md-4">
                                <div class="card mb-4 shadow-sm">
                                    <img src="{{Storage::url($product->image)}}" height="200" style="width: 100%">
                                    <div class="card-body">
                                        <p><b>{{$product->name}}</b></p>
                                        <p class="card-text">
                                        {!!(Str::limit($product->description,120))!!}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{route('product.view',[$product->id])}}">  <button type="button" class="btn btn-sm btn-outline-success">View</button></a>
                                            <a href="{{route('add.cart',[$product->id])}}">
                                            <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button></a>
                                            </div>
                                            <small class="text-muted">${{$product->price}}</small>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
       
                    </div>
                </div>
    
   
            </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                 </a>
            </div>
        </div>
</main>
 


@endsection