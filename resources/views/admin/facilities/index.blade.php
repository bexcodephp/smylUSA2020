@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($facilities)
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">All Facilities</h3>

                    <div class="box-tools pull-right">
                    <a href="{{ route('admin.facilities.create') }}" class="btn btn-primary">Add New</a>
                    </div>
                </div>

                <div class="box-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Zipcode</th>
                                <th>Parking</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($facilities as $facility)
                            <tr>
                            <td><a href="{{ route('admin.facilities.show', $facility) }}">{{ $facility->name }}</a></td>
                            <td>{{ $facility->phone }}</td>
                            <td>{{ $facility->state . ", " . $facility->address }}</td>
                            <td>{{ $facility->zipcode }}</td>
                            <td>{{ $facility->parking_available == 1 ? "Yes" : "No" }}</td>
                            <td>{{ $facility->is_active == 1 ? "Active" : "Inactive" }}</td>
                            <td>
                                <form action="{{ route('admin.facilities.destroy', $facility) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.facilities.edit', $facility) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                    </div>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
