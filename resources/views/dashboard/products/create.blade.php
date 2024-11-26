@extends('layouts.dashboard', ['title' => 'Create Product'])
@section('dashboard')
<div class="container h-100 card p-3">
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 form-floating mb-2 p-2">
                <input type="text" class="form-control" placeholder=" " name="name">
                <label for="">Product Name</label>
            </div>
            <div class="col-md-6 form-floating mb-2 p-2">
                <input type="text" class="form-control" placeholder=" " name="price">
                <label for="">Product Price</label>
            </div>
            <div class="col-md-6 form-floating mb-2 p-2">
                <select name="category" id="" class="form-select">
                    <option value="Tractor">Tractor</option>
                    <option value="Implement">Implement</option>
                </select>
                <label for="">Product Category</label>
            </div>
            <div class="col-md-6 form-floating mb-2 p-2">
                 <select name="brand_id" id="" class="form-select">
                    @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                 </select>
                <label for="">Product Brand</label>
            </div>
            
            <div class="col-md-6 form-floating mb-2 p-2">
                <input type="number" class="form-control" placeholder=" " minlength="1" name="engine_hours">
                <label for="">Engine Hours</label>
            </div>
            <div class="col-md-6 form-floating mb-2 p-2">
                <input type="number" class="form-control" placeholder=" " name="yop" maxlength="{{date('Y')}}" minlength="2000">
                <label for="">Year of Purchase</label>
            </div>
            <div class="col-md-6 form-floating mb-2 p-2">
                <input type="text" class="form-control" placeholder=" " name="implement">
                <label for="">Primary Implement</label>
            </div>
        </div>
        <div class="form-floating mb-2 p-2">
            <textarea name="description" class="form-control" placeholder=" "></textarea>
            <label for="">Product Description</label>
        </div>
        <div class="mb-3 d-flex justify-content-center">
            <div class="col-md-6">
                <label for="">Cover Photo</label>
                <div class="m-3 card p-3 border-dark bg-transparent" style="border-style:dashed;">
                    <img id="out" src="" style="width: 100%; object-fit:contain;" />
                    <input type="file" accept="image/*" name="cover" id="cover" style="display: none;" class="form-control" onchange="loadCoverFile(event)">
                    <div class="pt-2" id="desc">
                        <div class="text-center" style="font-size: xxx-large; font-weight:bolder;">
                            <i class="bi bi-upload"></i>
                        </div>
                        <div class="text-center">
                            <label for="cover" class="btn btn-success text-white"
                                title="Upload new profile image">Browse</label>
                        </div>
                        <div class="text-center prim">*File supported .png .jpg .webp</div>
                    </div>
                    <script>
                        var loadCoverFile = function (event) {
                            var image = document.getElementById('out');
                            image.src = URL.createObjectURL(event.target.files[0]);
                            document.getElementById('cover').value == image.src;

                        };
                    </script>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary w-50">Post</button>
        </div>
    </form>
</div>
@endsection