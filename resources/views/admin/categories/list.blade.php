@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($categories)
            <div class="box">
                <div class="box-body">
                    <h2>Categories</h2>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td class="col-md-3">Name</td>
                                <td class="col-md-3">Cover</td>
                                <td class="col-md-3">Status</td>
                                <td class="col-md-3">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a></td>
                                <td>
                                    @if(isset($category->cover))
                                        <img src="{{ asset("storage/$category->cover") }}" alt="" class="img-responsive">
                                    @endif
                                </td>
                                <td>@if($category->status == 1)
        <span style="display: none; visibility: hidden">1</span>
        <button type="button" class="btn btn-link mx-2 w-auto btn-true text-green deactivate" data-id="{{$category->id}}"><i class="fa fa-check fa-lg"></i></button>
        @else
        <span style="display: none; visibility: hidden">0</span>
        <button type="button" class="btn btn-link mx-2 w-auto btn-false text-red activate " data-id="{{$category->id}}"><i class="fa fa-times fa-lg"></i></button>
    @endif</td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
