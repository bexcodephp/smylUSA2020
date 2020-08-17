@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.faq.update', $faq->id) }}" method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="question">question <span class="text-danger">*</span></label>
                        <input type="text" name="question" id="question" placeholder="question" class="form-control" value="{{ $faq->question }}">
                    </div>
                    <div class="form-group">
                        <label for="answer">Answer <span class="text-danger">*</span></label>
                        <textarea type="text" name="answer" id="answer" placeholder="answer" class="form-control">{{ $faq->answer }}</textarea>
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
