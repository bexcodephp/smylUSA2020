@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($role->users)
    <div class="box">
        <div class="box-body">
            <!-- {{ $role }} -->
            <h2>{{ ucfirst($role->name) }}</h2>
            <h2 style="text-align: right;">
            <a href="{{ route('admin.employees.create') }}">ADD</a>
            </h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td class="col-md-1">ID</td>
                        <td class="col-md-1">Location</td>
                        <td class="col-md-1">City</td>
                        <td class="col-md-1">State</td>
                        <td class="col-md-3">Name</td>
                        <td class="col-md-3">Email</td>
                        <td class="col-md-3">Phone</td>
                        <td class="col-md-1">Status</td>
                        <td class="col-md-4" style="width: 250px;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 0; //dd($facilities);?>
                    @foreach ($role->users as $employee)
                    <?php 
                    
                        $n++; 
                        //echo "<pre>";print_r($facilities[$n]);
                        $locations = json_decode($employee->location_associated);
                        //print_r($locations);

                       

                    ?>

                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->location_associated }}</td>
                        <td>{{ $employee->state }}</td>
                        <td>{{ $employee->state }}</td>
                        <td>{{ $employee->fname."  ".$employee->lname }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>                        
                        <td>@include('layouts.status', ['status' => $employee->status])</td>
                        <td style="width: 250px;">
                            <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="post"
                                  class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <a href="{{ route('admin.employees.edit', $employee->id) }}"
                                       class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{ route('admin.employee.dentist_orders', $employee->id) }}"
                                       class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Orders</a>
                                    <button onclick="return confirm('Are you sure?')" type="submit"
                                            class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
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
    <script>
        $('.deactivate').click(function (e) {
        e.preventDefault();
        var id=$(this).data('id');
        
        $.ajax({
            url:'{{route('admin.status')}}',
            type:'post',
            data:{
                '_token':'{{csrf_token()}}',
                id:id,
                status:0
            },
            success:function (data) {
            location.reload();
            }
        })
        })
        $('.activate').click(function (e) {
            e.preventDefault();
            var id=$(this).data('id');
            $.ajax({
                url:'{{route('admin.status')}}',
                type:'post',
                data:{
                    '_token':'{{csrf_token()}}',
                    id:id,
                    status:1
                },
                success:function (data) {
                    location.reload();
                }
            })
        })

    </script>
@endsection
