@extends('admin.layout')

@section('css')

@endsection

@section('main')

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body container">
                    <div class="row">
                      <div class="col-lg-1 border font-weight-bold p-2">Update</div>
                      <div class="col-lg-4 border font-weight-bold p-2">Name</div>
                      <div class="col-lg-2 border font-weight-bold p-2">Price</div>
                      <div class="col-lg-3 border font-weight-bold p-2">Photo</div>
                      <div class="col-lg-2 border font-weight-bold p-2">Created_At</div>
                    </div>
                    <div class="user_item_list">
                    @foreach($products as $product)
                    <div class="row">
                      <div class="col-lg-1 border p-2 text-center">
                        <a class="btn btn-primary listbuttonupdate" href="{{ route('products.edit', $product->id) }}">
                           <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>                          
                      </div>
                      <div class="col-lg-4 border p-2">{{$product->name}}</div>
                      <div class="col-lg-2 border p-2">{{$product->price}}</div>
                      <div class="col-lg-3 border p-2 text-center"><img class="img_little" src="{{ asset('images/' . $product->image) }}" /></div>
                      <div class="col-lg-2 border p-2">{{$product->created_at}}</div>
                    </div>
                    @endforeach 
                    </div>
                    <hr>                       
                   </div>  
                 </div>
              </div> 
           </div>         
@endsection

@section('js')
 
@endsection
