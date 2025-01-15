@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title text-primary">Categories</h3>
                                <form action="{{ route('admin.categories.index') }}" method="GET" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2" placeholder="Search categories..." value="{{ request()->query('search') }}">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Add New</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body " style="margin-top: 10px">
                                @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                                <table class="table table-hover table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary  ">Edit</a>
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination links -->
                                <div class="d-flex justify-content-center">
                                    {{ $categories->appends(['search' => request()->query('search')])->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
