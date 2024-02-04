@extends('layouts.common')
@section('main')
<div class="container">

  <div class="text-right">
    <a href="products/create" class="btn btn-dark">New product</a>
  </div>
  <h2>Products</h2>
 
  <table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Sl No.</th>
        <th>Name</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$loop->index+1}}</td>
        <td><a href="/products/view/{{$product->id}}" class="text-dark">{{$product->name}}</a></td>
        <td>
          <img src="products/{{$product->image}}" class="rounded-circle" width="30px" height="30px"></td>
        <td>
          <a href="/products/edit/{{$product->id}}" class="btn btn-dark btn-sm">Edit</a>
          {{-- <a href="/products/delete/{{$product->id}}" class="btn btn-danger btn-sm">Delete</a> --}}
          <form method="POST" action="/products/delete/{{$product->id}}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$products->links()}}
</div>
@endsection

