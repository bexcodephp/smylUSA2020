@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <h2>Customer</h2>
                <table class="table table-striped table-bordered">
                    <tbody>
                    <tr>
                        <td class="col-md-4">ID</td>
                        <td class="col-md-4">Name</td>
                        <td class="col-md-4">Email</td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="box-body">
                <h2>Addresses</h2>
                <table class="table table-striped table-bordered">
                    <tbody>
                    <tr>
                        <td class="col-md-2">Alias</td>
                        <td class="col-md-2">Address 1</td>
                        <td class="col-md-2">Country</td>
                        <td class="col-md-2">Status</td>
                        <td class="col-md-4">Actions</td>
                    </tr>
                </tbody>
                    <tbody>
                        <tr>
                            <td>@if(isset($address)){{ $address->alias }}@endif</td>
                            <td>@if(isset($address)){{ $address->address_1 }}@endif</td>
                            <td>@if(isset($address)){{ $address->country->name }}@endif</td>
                            <td>@if(isset($address)){{ $address->status }}@endif</td>
                            <td>
                            @if(isset($address))
                                <form action="{{ route('admin.addresses.destroy', $address->id) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.customers.addresses.show', [$customer->id, $address->id]) }}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i> Show</a>
                                        <a href="{{ route('admin.customers.addresses.edit', [$customer->id, $address->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    </div>
                                </form>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.customers.index') }}" class="btn btn-default btn-sm">Back</a>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
