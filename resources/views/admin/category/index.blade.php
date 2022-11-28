<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

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
                        <div class="card-header"> All Category</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>SN.</td>
                                        <td>Created by</td>
                                        <td>Category Name</td>
                                        <td>Created At</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($categories as $item)
                                        <tr>
                                            <td> {{ $categories->firstItem() + $loop->index }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>
                                                @if ($item->created_at == null)
                                                    <span>No Date is Updated</span>
                                                @else
                                                    {{ $item->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('category/edit/' . $item->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{ url('softdelete/category/' . $item->id) }}"
                                                    class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Category
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" class="form-control" name="category_name">
                                    @error('category_name')
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
        {{-- trash part --}}
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
                        <div class="card-header"> Trash List</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>SN.</td>
                                        <td>Created by</td>
                                        <td>Category Name</td>
                                        <td>Created At</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($trashCat as $item)
                                        <tr>
                                            <td> {{ $trashCat->firstItem() + $loop->index }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>
                                                @if ($item->created_at == null)
                                                    <span>No Date is Updated</span>
                                                @else
                                                    {{ $item->created_at->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('restore/category/ '. $item->id) }}"
                                                    class="btn btn-info">Restore</a>
                                                <a href="{{ url('pdelete/category/' . $item->id) }}" class="btn btn-danger">P Delete</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $trashCat->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
