@extends('admin.layout')

@section('css')

@endsection

@section('main')

        <div class="row padding_body">
           <div class="col-md-12">
              <div class="box box-primary">
                 <div class="box-body container">
                    <div class="row">
                      <div class="col-lg-3 border font-weight-bold p-2">Name</div>  
                      <div class="col-lg-3 border font-weight-bold p-2">Login(Email)</div>
                      <div class="col-lg-3 border font-weight-bold p-2">Date Create</div>
                      <div class="col-lg-3 border font-weight-bold p-2">Role</div>
                    </div>
                    <div class="user_item_list">
                    @foreach($users as $user)
                    <div class="row">
                      <div class="col-lg-3 border p-2">{{$user->name}}</div>  
                      <div class="col-lg-3 border p-2">{{$user->email}}</div>
                      <div class="col-lg-3 border p-2">{{$user->created_at}}</div>
                      <div class="col-lg-3 border p-2">{{$user->role}}</div>
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
