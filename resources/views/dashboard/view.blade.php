@extends('layouts.dashboard')
@section('dashboardlayout')

<div class="d-flex justify-content-between p-5">
            <h5><i class="bi bi-basket-fill"></i> Product Details</h5>
            <a href="products/create" class="btn btn-primary"><i class="bi bi-plus-circle-dotted"></i> New Products</a>
        </div>
        <div class="col-md-12 table-responsive mt-3">
            <table class="table table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>M.R.P</th>
                    <th>Selling Price</th>
                    <th>Action</th>

                </tr>
                <tbody>
                    @foreach ($products as $demo)
                    @php 
                        $index = ($products->currentPage() - 1) * $products->perPage() + $loop->iteration;
                    @endphp
                    <tr>
                        <td>{{$index}}</td>
                        <td><img src="products/{{$demo->image}}" style="width: 50px; height: 50px; object-fit: contain ;" alt="Product" /></td>
                        <td><a href="products/{{$demo->id}}/show">{{$demo->name}}</a></td>
                        <td>Rs. {{$demo->mrp}}</td>
                        <td>Rs. {{$demo->price}}</td>
                        <td>
                            <a href="products/{{$demo->id}}/edit" class="btn btn-dark btn-sm"> <i class="bi bi-pencil-square"></i></a>
                             <a href="products/{{$demo->id}}/delete" onclick="return confirm('Are you sure')" class="btn btn-danger btn-sm"> <i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

                {{$products->links()}}

        </div>
@endsection