@extends('dashboard.layouts.app')

@section('title', __('models.contact_msgs'))

@section('content')

    @foreach ($order->products as $product)
    <div class="card" style="width: 18rem;">
        <h4>product name : {{$product->name}}</h4>
        <img class="card-img-top" src="{{asset('storage/'.$product->image)}}" alt="Card image cap">
        <div class="card-body">
          <p class="card-text"> {{$product->price}}</p>
        </div>
      </div>
    @endforeach
@endsection
