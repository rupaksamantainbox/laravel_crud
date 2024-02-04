
@extends('layouts.common')
@section('main')
<div class="container">
 
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-8">
        <div class="card p-4">
          <p>Name : <b>{{$product->name}}</b></p>
          <p>Description : <b>{{$product->description}}</b></p>
          <img src="/products/{{$product->image}}" width="400px">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
