@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <h2>Home About</h2>
                <a href="{{ route('add.about') }}" class="btn btn-success float-right">Add About</a>
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header"> About</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td width="5%">SN.</td>
                                        <td width="15%">Title</td>
                                        <td width="15%">Short description</td>
                                        <td width="50%">Description</td>
                                        <td width="15%">Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @foreach ($homeabouts as $homeabout)
                                        <tr>
                                            <td> {{ $i++}}</td>
                                            <td>{{ $homeabout->title}}</td>
                                            <td>{{ $homeabout->short_description }}</td>
                                            <td>
                                               {{ $homeabout->description }}
                                            </td>
                                            <td>
                                                <a href="{{ url('edit/about/' . $homeabout->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ url('about/delete/' . $homeabout->id) }}" onclick="return confirm('Are you sure to delete')"
                                                    class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $sliders->links() }} --}}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
       
    </div>
@endsection
