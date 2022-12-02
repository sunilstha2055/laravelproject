@extends('admin.admin_master')

@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Create About</h2>
            </div>

            <div class="card-body">
                <form action="{{ url('update/homeabout/'. $homeabout->id) }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Slider Title</label>
                        <input type="text" name="title" value="{{ $homeabout->title }}" class="form-control" id="exampleFormControlInput1"
                            placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Short Description</label>
                        <textarea name="short_description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $homeabout->short_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $homeabout->description }}</textarea>
                    </div>

                    <div class="form-footer pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
