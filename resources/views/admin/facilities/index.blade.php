@extends('layouts.admin.app')

@section('content')
<!-- <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/> -->
<style>
    thead input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
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
                    <table class="table table-striped table-bordered display">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($facilities as $facility)
                            <tr>
                            <td>{{ $facility->name }}</td>
                            <td>{{ $facility->phone }}</td>
                            <td>{{ $facility->state . ", " . $facility->address }}</td>
                            <td>{{ $facility->city }}</td>
                            <td>{{ $facility->is_active == 1 ? "Active" : "Inactive" }}</td>
                            <td>
                                <form action="{{ route('admin.facilities.destroy', $facility) }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="delete">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.facilities.edit', $facility) }}" class="btn mx-2 w-auto btn-edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn mx-2 w-auto btn-eye text-blue"><i class="fa fa-eye fa-lg"></i></a>
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-link mx-2 w-auto btn-trash text-red"><i class="fa fa-trash fa-lg"></i></button>
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

@section('js')
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->

<!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> -->

<script>
    // $('.table').DataTable({
    //     'info' : true,
    //     'paging' : true,
    //     'searching' : true,
    //     'bSort' : false,
    //     'columnDefs' : [
    //         {
    //             'orderable': false, 'targets' : -1
    //         }
    //     ],
    //     'sorting' : []
    // });

    
</script>
