@extends('admin.layouts.app')

@section('title', "Pen It - Categories")

@section('main-content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Actions</th>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div> <!-- END OF COL -->
            </div><!-- END OF ROW -->
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    {{ $categories->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
