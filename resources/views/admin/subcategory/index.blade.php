@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sub category lists</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                    </div>

                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        @include('admin.layouts._message')
                        <div class="card">

                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category name</th>
                                            <th>Sub category name</th>
                                            <th>Slug</th>
                                            <th>Meta title</th>
                                            <th>Meta descriptions</th>
                                            <th>Meta keywords</th>
                                            <th>Created by</th>
                                            <th>Status</th>
                                            <th>Created date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->category_name }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->slug }}</td>
                                                <td>{{ $value->meta_title }}</td>
                                                <td>{{ $value->meta_descriptions }}</td>
                                                <td>{{ $value->meta_keywords }}</td>
                                                <td>{{ $value->created_by_name }}</td>
                                                <td>{{ $value->status == 0 ? 'Active' : 'Inactive' }}</td>
                                                <td>{{date('d-m-y', strtotime($value->created_at))}}</td>


                                                <td>
                                                    <a href="{{ route('admin.subcategory.edit', $value->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.subcategory.delete', $value->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                </td>


                                            </tr>
                                        @endforeach

                                      


                                    </tbody>
                                   
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>

        </section>
        <!-- /.content -->

    </div>
@endsection
