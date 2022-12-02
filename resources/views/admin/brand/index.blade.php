@extends('admin.admin_master')
@section('admin')


    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header"> All Brand</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>SN.</td>
                                        <td>Brand Name</td>
                                        <td>Brand Image</td>
                                        <td>Created At</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td> {{ $brands->firstItem() + $loop->index }}</td>
                                            <td>{{ $brand->brand_name}}</td>
                                            <td><img src="{{ asset($brand->brand_image) }}" alt="" style="height: 100px; width:100px;"></td>
                                            <td>
                                                @if ($brand->created_at == null)
                                                    <span>No Date is Updated</span>
                                                @else
                                                    {{ $brand->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('brand/edit/' . $brand->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ url('brand/delete/' . $brand->id) }}" onclick="return confirm('Are you sure to delete')"
                                                    class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add brand
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="brand">Brand</label>
                                    <input type="text" class="form-control" name="brand_name">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="brand_image"> Image</label>
                                    <input type="file" name="brand_image" id="brand_image">
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                                <button class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection
