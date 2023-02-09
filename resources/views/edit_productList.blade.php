 
@extends('main_templates')
<div class="page-wrapper">
      <!--page-content-wrapper-->
      <div class="page-content-wrapper">
        <div class="page-content">

 <form action="{{url('updateproductList/'.$product_list->product_id)}}" method="post" id="updateForm">{!! csrf_field() !!}
  @method('PUT')
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{$product_list->name}}" required ></br>
        <required>
       <label>Price</label></br> 
       <input type= "number" name="price" id="price" class="form-control" value="{{$product_list->price}}" required></br>
        <required>
        <label>Color</label></br>
        <input type="text" name="color" id="color" class="form-control" value="{{$product_list->color}}" required></br>
        <label>image</label></br>
        <input type="file" name="image" id="image" class="form-control" value="{{$product_list->image}}" required></br>


      <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
         
        <input type="submit"  class="btn btn-success"></br>
    </form>
   
  </div>
</div>
  </div></div></div>
    </section>
  </div>