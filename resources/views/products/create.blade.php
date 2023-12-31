@extends('layouts.dashboard')
@section('dashboardlayout')
<div class="container mt-5">
   <div class="row">
 

    @if($message=Session::get('success')) <!--Session enbathu oru helper, atha use panni temparary data store panni katalam, e.g.form sumbited suffully-->
      <div class="alert alert-success alert-dismissible fade show"> <strong>Success</strong>{{$message}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

  
<h5><i class="bi bi-pencil-square"></i> Add New Products</h5>
<hr/>
<nav class="my-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active"> Add New Product</li>
    </ol>
</nav>

<div class="col-md-6">
    <form action="/products/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="name" class="form-label"> Name</label>
                <input type="text" name="name" id="name" class="form-control @if($errors->has('name')) {{'is-invalid'}} @endif " placeholder="Enter Product Name" value="{{old('name')}}">
               
                @if($errors->has('name'))
                <div class="invalid-feedback">{{$errors->first("name")}}</div>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="mrp" class="form-label">M.P.R</label>
                <input type="text" name="mrp" id="mrp" class="form-control @if($errors->has('mrp')) {{'is-invalid'}} @endif " placeholder="Enter M.R.P" value="{{old('mrp')}}">

                @if($errors->has('mrp'))
                <div class="invalid-feedback">{{$errors->first("mrp")}}</div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="price" class="form-label">Selling Price</label>
                <input type="text" name="price" id="price" class="form-control @if($errors->has('price')) {{'is-invalid'}} @endif " placeholder="Enter Selling Price" value="{{old('price')}}">

                @if($errors->has('price'))
                <div class="invalid-feedback">{{$errors->first("price")}}</div>
                @endif
            </div>
        </div>
        

        <div class="row mb-3">
            <div class="col-md-12">
                <label for="description" class="form-label"> Description </label>
                <textarea name="description" id="description" style="resize: none; height: 150px;" class="form-control @if($errors->has('description')) {{'is-invalid'}} @endif " placeholder="Enter Description">{{old('description')}}</textarea>

                @if($errors->has('description'))
                <div class="invalid-feedback">{{$errors->first("description")}}</div>
                @endif
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="image" class="form-label">Products Image</label>
                <input type="file" name="image" id="image" class="form-control @if($errors->has('image')) {{'is-invalid'}} @endif ">

                @if($errors->has('image'))
                <div class="invalid-feedback">{{$errors->first("image")}}</div>
                @endif
            </div>
        </div>
      
        <div class="mb-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-dark">Save Product</button>
                <button type="reset" class="btn btn-danger">Clear All</button>
            </div>
        </div>


    </form>
</div>
</div></div>
@endsection 