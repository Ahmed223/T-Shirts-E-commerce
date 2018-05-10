@extends('admin.layout.admin')
@section('content')
  <h3>Products</h3>

<div class="container">
    @forelse($products as $product)
    <li class="row">


       <div class="col-md-8">
        <h4>Name of product:    {{$product->name}}</h4>
            <h4>Name of Category:    {{$product->category->name}}</h4>
         <div  style="border-radius: 122px;">
        <h4 ><img src="{{url('images',$product->image)}}" style="border-radius: 19px; width: 250px;"/></h4>
        </div>
      <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm ">Edit Product</a>
      <br>

        <form action="{{route('product.destroy',$product->id)}}"  method="POST">
           {{csrf_field()}}
           {{method_field('DELETE')}}
           <input class="btn btn-sm btn-danger" type="submit" value="Delete">
         </form>

         <div class="col-md-4">
            
            <form action="/admin/product/image-upload/{{$product->id}}" method="POST" class="dropzone" id="my-awesome-dropzone-{{$product->id}}">
              {{csrf_field()}}

             </form>

        </div>

    </li>

        @empty

        <h3>No products</h3>

    @endforelse
</div>


@endsection