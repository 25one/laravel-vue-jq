@extends('product.layout')

@section('main')

<div class="super_container_inner">
    <div class="super_overlay"></div>
    <div class="products">
        <div class="container">
            <div class="row products_row">
               
              @php
              //print_r($products);
              @endphp

              @include('product.brick-standard')                     

            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('js/mainIndex.js') }}"></script>
<script>
$(document).ready(function(){
   //header_search_button
   $('.header_search_button').click(function() {
      BaseRecord.search = $('.search_input').val();
      BaseRecord.showSearch();
   });
});
</script>    
@endsection