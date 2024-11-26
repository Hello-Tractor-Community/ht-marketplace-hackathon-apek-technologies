@extends('layouts.app', ['title' => 'Wish List'])
@section('content')
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Brand</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wishes as $wish)
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">
                                        <img src="{{asset('storage/products/'.$wish->product->path)}}" alt="">
                                    </div>
                                    <div class="media-body">
                                        <p>{{$wish->product->description}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>{{$wish->product->price}}</td>
                            <td>{{$wish->product->brand->name}}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

@endsection