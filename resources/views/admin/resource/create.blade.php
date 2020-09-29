@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="/admin/resources/create" method="POST" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title<span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description<span class="text-danger">*</span></label>
                        <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="uploadedfile">Select video <span class="text-danger">*</span></label>
                        <input type="file" name="uploadedfile" id="uploadedfile" class="form-control">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="/admin/resources" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
