@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit new category</h1>
                    </div>


                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">


                            <form action="{{ route('admin.category.update', $getRecord->id) }}" method="POST">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                     <label>Category name</label>
                                     <input type="text" name="name" value="{{ old('name', $getRecord->name) }}" required
                                         class="form-control" placeholder="Enter category name">
                                    </div>
                                    <div class="form-group">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <input type="text" name="slug" value="{{old('slug', $getRecord->slug)}}" class="form-control" placeholder="Enter slug name">
                                        <div class="text-danger">
                                         {{$errors->first('slug')}}
                                     </div>
                                    </div>
                                   
                                  
                                    <div class="form-group">
                                        <label>Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="status">
                                            <option {{old('status', $getRecord->status) == 0 ? 'selected' : ''}} value="0">Active</option>
                                            <option {{old('status', $getRecord->status) == 1 ? 'selected' : ''}} value="1">Inactive</option>
                                        </select>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                     <label>Meta title <span class="text-danger">*</span></label>
                                     <input type="text" name="meta_title" value="{{old('meta_title', $getRecord->meta_title)}}" class="form-control" placeholder="Enter meta title">
                                    </div>

                                    <div class="form-group">
                                        <label>Meta descriptions</label>
                                        <textarea type="text" name="meta_descriptions" class="form-control" placeholder="Enter meta descriptions">{{$getRecord->meta_descriptions}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Meta keywords</label>
                                        <input type="text" name="meta_keywords" value="{{old('meta_keywords', $getRecord->meta_keywords)}}" class="form-control" placeholder="Enter meta keywords">
                                    </div>

                                    


                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>






                    </div>
                </div>

        </section>
    </div>
@endsection
