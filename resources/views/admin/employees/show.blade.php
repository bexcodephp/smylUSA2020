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
                        <td class="col-md-1">State</td>
                        <td class="col-md-3">Name</td>
                        <td class="col-md-3">Email</td>
                        <td class="col-md-3">Phone</td>
                        <td class="col-md-1">Status</td>
                        <td class="col-md-4" style="width: 250px;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($role->users as $employee)
                    <?php 

                        $locationsArray = json_decode($employee->location_associated, true);
                        //echo is_array($locationsArray);
                        //print_r($employee->location_associated);
                        
                    ?>

                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>
                            <ul>
                            @foreach ($facilities as $location) 
                            <?php 
                                if ($locationsArray != 0 || $locationsArray != null || $locationsArray != '') {
                                    if(in_array($location->facility_id,$locationsArray)){
                            ?>
                                <li>{{ $location->address }}</li>
                            <?php

                                    }
                                }
                            ?>                                
                            @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                            @foreach ($facilities as $location) 
                            <?php 
                                if ($locationsArray != 0 || $locationsArray != null || $locationsArray != '') {
                                    if(in_array($location->facility_id,$locationsArray)){
                            ?>
                                <li>{{ $location->state }}</li>
                            <?php

                                    }
                                }
                            ?>                                
                            @endforeach
                            </ul>
                        </td>
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
                                       class="btn mx-2 w-auto btn-edit"><i class="fa fa-edit fa-lg"></i></a>
                                    <a href="{{ route('admin.employee.dentist_orders', $employee->id) }}"
                                       class="btn mx-2 w-auto btn-eye text-blue"><i class="fa fa-eye fa-lg"></i></a>
                                    <button onclick="deleteOperator('{{$employee->id}}')" type="button"
                                            class="btn btn-link mx-2 w-auto btn-trash text-red"><i class="fa fa-trash fa-lg"></i></button>
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
        var _opId = '';
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

        function deleteOperator(opId){
            _opId = opId;
            const swalWithBootstrapButtons = swal.mixin({
            confirmButtonClass: 'btn btn-info',
            cancelButtonClass: 'btn btn-info',
            buttonsStyling: true,
        })
    
        swalWithBootstrapButtons({
            title: '',
            text: "Are you sure you want to Delete this operator?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: false
        }).then((result) => {
            if (result.value) {
                //alert("hi"); 
                $.ajax({
                    url:'/status',
                    type:'post',
                    data:{
                        '_token':'{{csrf_token()}}',
                        id:_opId,
                        status:0
                    },
                    success:function (data) {
                        //location.reload();
                        console.log(data);
                    }
                })
            }
            else if(result.dismiss === swal.DismissReason.cancel)
                {
                    
                }
            })
        }

    </script>
@endsection
