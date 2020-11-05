@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<a class="btn btn-success" href="{{ route('products.create')}}">Add</a>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Description</td>
          <td>Total</td>
          <td>Price (RM)</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->count}}</td>
            <td>{{$product->price}}</td>
            <td><img srs="{{url('images/'.$product->image }}" class="img-thumbs"></td>
            <td><a href="{{ route ('products.edit' , $product->image) }}" class="btn btn-primary">Edit</a></td>

          <td>
            <form action="{{route('products.destroy',$product->id)}}"
              method="post">
              @csrf 
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection