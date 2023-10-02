@extends('admin.layout')

@section('css')

@endsection

@section('main')

    <div class="row">
        <!-- left column -->
       <div class="col-md-3">
       </div>
        <!-- center column -->       
        <div class="col-md-6 margin">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                    <div class="box-body">
                        @yield('form-open')  
                        <!-- 'bg-img/' . - custom -->
                        <input type="hidden" id="image" name="image" value="@if(isset($image)){{'bg-img/' . $image}}@elseif(old('image')){{old('image')}}@elseif(isset($product)){{$product->image}}@else{{'bg-img/nophoto.jpg'}}@endif">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">@lang('Name')</label>
                            <input type="text" class="form-control" id="name" name="name" value="@if(isset($product)){{$product->name}}@elseif(old('name')){{old('name')}}@endif" placeholder="Big Table"> 
                            {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                            <label for="name">@lang('Price')</label>
                            <input type="text" class="form-control" id="price" name="price" value="@if(isset($product)){{$product->price}}@elseif(old('price')){{old('price')}}@endif" placeholder="177.77"> 
                            {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
                        </div>                      
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
        <!-- right column -->
       <div class="col-md-3">
       </div> 
    </div>
    <!-- /.row -->
@endsection

@section('js')
<script>
$(document).ready(function(){
  $("body").on("change", ".upload_field", function(){
    //alert('hi');
    $(".upload_submit").click();
  });
});       
</script>
@endsection  


