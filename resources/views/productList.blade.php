@extends('main_templates')
<div class="page-wrapper">
      <!--page-content-wrapper-->
      <div class="page-content-wrapper">
        <div class="page-content">
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                    
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            
              <div class="card-body">
          <a href="{{ url('/createProduct') }}" class="btn btn-primary btn-sm float-end" title="Add New Product">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Products </a>
          <br />
          <br />
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Product.No</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Color</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody> @foreach($product_list as $item) 
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->color }}</td>
                  <td><img src="{{asset($item->image)}}" width="70px" height="70px" alt="image">
                  </td>
                  <td>
                    <a href="{{url('editProduct/'.$item->product_id)}}" class="btn btn-dark btn-sm mb-2">Edit</a>
                    <a href="{{url('deleteproducts/'.$item->product_id)}}" class="btn btn-danger">delete</a>
                  </td>
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      
                    </form>
                  </td>
                </tr> @endforeach 
              </tbody>
            </table>
    {{$product_list->links()}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   </div></div></div>

  </div>
 