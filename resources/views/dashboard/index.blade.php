@extends('layouts.dashboard', ['title' => 'Dashboard'])
@section('dashboard')
<!-- Sale & Revenue Start -->
<!-- <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="mb-2">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Sales</p>
                        <h6 class="mb-0">Ksh. </h6>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Paid PAYE</p>
                        <h6 class="mb-0">
                        </h6>
                    </div>
                </div>
            </div>
            <div class="mb-2">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Unpaid PAYE</p>
                        <h6 class="mb-0">Ksh.
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="h-100 bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">Calender</h6>
                </div>
                <div id="calender"></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="h-100 bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">To Do List</h6>
                    <a href="">Show All</a>
                </div>
                <div class="d-flex mb-2">
                    <input class="form-control bg-dark border-0" type="text" placeholder="Enter task">
                    <button type="button" class="btn btn-primary ms-2">Add</button>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Authentication</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Salary record</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center border-bottom py-2">
                    <input class="form-check-input m-0" type="checkbox">
                    <div class="w-100 ms-3">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                            <span>Payment Intergration</span>
                            <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div> -->

@if (Auth()->user()->role == 'Admin')
    <!-- Users Approvals -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Seller Approvals</h6>
            </div>
            @if ($users->count() > 0)
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead class="text-white" style="white-space: nowrap;">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Role</th>
                            <th scope="col">Joined</th>
                            <th scope="col" colspan="2" class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr style="white-space: nowrap;">
                                    <td>{{$key + 1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->code . '-' . $user->contact}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <form action="{{route('user.update', $user->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="isApproved" value="{{$user->isApproved ? '0' : '1'}}">
                                            <button
                                                class="btn {{$user->isApproved ? 'btn-warning' : 'btn-success'}}">{{$user->isApproved ? 'Suspend' : 'Approve'}}</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{route('user.destroy', $user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="" value="">
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-success"><i class="fa fa-check"></i> All sellers are approved.</div>
            @endif
        </div>
    </div>

    <!-- Product Approvals -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Product Approvals</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead style="white-space:nowrap;">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Engine Hours</th>
                        <th scope="col">Year of Purchase</th>
                        <th scope="col">Implement</th>
                        <th scope="col">Posted</th>
                        <th scope="col" colspan="3">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $id => $product)
                            <tr style="white-space:nowrap;">
                                <td>{{$id + 1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->qty}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->engine_hours}}</td>
                                <td>{{$product->yop}}</td>
                                <td>{{$product->implement}}</td>
                                <td>{{$product->created_at->diffForHumans()}}</td>
                                <td>
                                    <form action="{{route('product.update', $product->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="isApproved" value="{{$product->isApproved ? '0' : '1'}}">
                                        <button
                                            class="btn {{$product->isApproved ? 'btn-warning' : 'btn-success'}}">{{$product->isApproved ? 'Suspend' : 'Approve'}}</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('product.destroy', $product->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="" value="">
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
@if (Auth()->user()->role == 'seller')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Product Approvals</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead style="white-space:nowrap;">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Engine Hours</th>
                        <th scope="col">Year of Purchase</th>
                        <th scope="col">Implement</th>
                        <th scope="col">Posted</th>
                        <th scope="col">Wishes</th>
                        <th scope="col">Status</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $id => $product)
                            <tr style="white-space:nowrap;">
                                <td>{{$id + 1}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->qty}}</td>
                                <td>{{$product->brand->name}}</td>
                                <td>{{$product->engine_hours}}</td>
                                <td>{{$product->yop}}</td>
                                <td>{{$product->implement}}</td>
                                <td>{{$product->created_at->diffForHumans()}}</td>
                                <td>{{$product->wishes->count()}}</td>
                                <td>{{$product->isApproved?'Approved':'Pending'}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif
@endsection