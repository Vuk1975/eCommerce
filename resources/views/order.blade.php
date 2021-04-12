@extends('layouts.app')

@section('content')

 <div class="container">
 	
 	<div class="row justify-content-center">
 		<div class="col-md-8 pt-10">
 			@foreach($carts as $cart)
 			<div class="card mb-3">
 				
 					@foreach($cart->items as $item)
 					<div class="card-body">
                     <span class="float-right">
 						<img src="{{Storage::url($item['image'])}}" width="100"><br>
 					</span>

 					<p>Name:{{$item['name']}}</p>
 					<p>Price:{{$item['price']}}</p>
 					<p>Qty:{{$item['qty']}}</p>
                    </div>

 					@endforeach
 					
 				

 			</div>
 			<p>
 				<button type="button" class="btm btn-info">
 					<span class="">
 						Total price:${{$cart->totalPrice}}
 					</span>
 				</button>

 			</p>
 			<hr class="p-3">
            
 			@endforeach
 		</div>
 	</div>
 	


 </div>

 @endsection