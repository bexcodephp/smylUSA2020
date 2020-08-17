@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.faq.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="question">Question <span class="text-danger">*</span></label>
                        <input type="text" name="question" id="question" placeholder="question" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="answer">Answer <span class="text-danger">*</span></label>
                        <textarea type="text" name="answer" id="answer" placeholder="answer" class="form-control">{{ old('name') }}</textarea>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.faq.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
