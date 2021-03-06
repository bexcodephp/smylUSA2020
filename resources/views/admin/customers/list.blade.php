@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($customers)
            <div class="box">
                <div class="box-body">
                    <h2>Customers</h2>
                    <div class="box-tools pull-right mb-2">
                        <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">Add New</a>
                    </div>
                    {{-- @include('layouts.search', ['route' => route('admin.operators.index')]) --}}
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <td class="col-md-2">ID</td>
                                <td class="col-md-2">Name</td>
                                <td class="col-md-2">Email</td>
                                <td class="col-md-2">Status</td>
                                <td class="col-md-4">Actions</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer['id'] }}</td>
                                <td>{{ $customer['name'] }}</td>
                                <td>{{ $customer['email'] }}</td>
                                <td>{{-- @include('layouts.status', ['status' => ])--}} 
                                @if($customer['status'] == 1)
                                    <span style="display: none; visibility: hidden">1</span>
                                    <button type="button" class="btn btn-link mx-2 w-auto btn-true text-green deactivate" data-id="{{$customer['status']}}"><i class="fa fa-check fa-lg"></i></button>
                                    @else
                                    <span style="display: none; visibility: hidden">0</span>
                                    <button type="button" class="btn btn-link mx-2 w-auto btn-false text-red activate " data-id="{{$customer['status']}}"><i class="fa fa-times fa-lg"></i></button>
                                @endif
                                </td>
                                <td>
                                    <form action="{{ route('admin.customers.destroy', $customer['id']) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.customers.show', $customer['id']) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                            <a href="{{ route('admin.customers.edit', $customer['id']) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- $customers->links() --}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection