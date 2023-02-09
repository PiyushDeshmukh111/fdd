 
@extends('main_templates')
<div class="page-wrapper">
      <!--page-content-wrapper-->
      <div class="page-content-wrapper">
        <div class="page-content">
<div class="card">
  <div class="card-header">Product Add Page</div>
  <div class="card-body">
      
 <form action="{{url('/saveProduct')}}" method="post" id="registrationForm">{!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"  required></br>
        <required>
       <label>Price</label></br> 
       <input type="number" name="price" id="price" class="form-control"  required></br>
        <required>
        <label>Color</label></br>
        <input type="text" name="color" id="color" class="form-control"  required></br>
        <label>image</label></br>
        <input type="file" name="image" id="image" class="form-control" required></br>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
  </div></div></div>
    </section>
  </div>