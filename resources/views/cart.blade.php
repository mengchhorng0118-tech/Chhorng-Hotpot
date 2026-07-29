@extends('layouts.app')

@section('content')
<h2>Your Cart</h2>

@foreach(session('cart',[]) as $item)
<div class="card">
  <img src="{{ asset('storage/'.$item['image']) }}">
  <h3>{{ $item['name'] }}</h3>
  <p>${{ $item['price'] }} x {{ $item['qty'] }}</p>
</div>
@endforeach
@endsection
