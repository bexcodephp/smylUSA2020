@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="/admin/resources/edit/{{$resource->id}}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title<span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{ $resource->title }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description<span class="text-danger">*</span></label>
                        <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description">{{ $resource->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <video id='video{{ $resource->id }}'
                               class='video-js vjs-default-skin'
                               width='150'
                               height='150'>
                                <source src="{{ url('storage/resource/'.$resource->url) }}"/>
                        </video>
                        <input type="file" name="uploadedfile" id="uploadedfile" class="form-control">
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
