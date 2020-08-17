@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if(!$faqs->isEmpty())
            <div class="box">
                <div class="box-body">
                    <h2>Faqs</h2>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td>Question </td>
                                <td>Answer </td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $faq->question }}</td>
                                <td>{{ $faq->answer }}</td>
                                <td>
                                    <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $faqs->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            @else
            <p class="alert alert-warning">No faq created yet. <a href="{{ route('admin.faq.create') }}">Create one!</a></p>
        @endif
    </section>
    <!-- /.content -->
@endsection
