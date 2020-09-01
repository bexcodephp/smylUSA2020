@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
    @if($role->users)
    <div class="box">
        <div class="box-body">
            <!-- {{ $role->name }} -->
            
            <div class="wrapper-title">
                <h2>{{ ucfirst($role->name) }}</h2>    
                <!-- <button name="filter" data-toggle="collapse" data-target="#filter" class="btn btn-primary">Filter</button> -->
            </div>

            <form action="{{ route('admin.filter') }}" id="filter" class="collapse" method="post">
                    {{ csrf_field() }}
                <div class="form-row px-2">
                    <div class="input-group col-auto mr-2">
                        <label>Location:</label>
                        <input type="text" name="filter_location" class="form-control">
                    </div>
                    <div class="input-group col-auto mr-2">
                        <label>Name :</label>
                        <input type="text" name="filter_name" class="form-control">
                    </div>
                    <div class="input-group col-auto mr-2">
                        <label>Email :</label>
                        <input type="email" name="filter_email" class="form-control">
                    </div>
                    <div class="input-group col-auto mr-2">
                        <label>Status :</label>
                        <input type="text" name="filter_status" class="form-control">
                    </div>
                    <div class="col btn-filter">
                        <button type="submit" name="submit" class="btn btn-primary" >submit</button>
                    </div>
                </div>
            </form>
            
            <div class="box-tools pull-right mb-2">
                <a href="{{ route('admin.employees.create') }}" class="btn btn-primary" role="{{$role->name}}">Add New</a>
            </div>
            
            <table class="table table-striped table-bordered display">
                <thead>
                    <tr>
                        <td class="col-md-auto">Operator ID</td>
                        <td class="col-md-auto">Location</td>
                        <td class="col-md-auto">State</td>
                        <td class="col-md-auto">City</td>
                        <td class="col-md-auto">Name</td>
                        <td class="col-md-auto">Email</td>
                        <td class="col-md-auto">Phone</td>
                        <td class="col-md-auto">Status</td>
                        <td class="col-md-auto" style="width: 250px;">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role->users as $employee)
                    <?php
                        $locationsArray = json_decode($employee->location_associated, true);
                    ?>

                    <tr>
                        <td>{{ $employee->op_id }}</td>
                        <td class="facility_down">
                            <ul>
                            @php
                            $no = 0
                            @endphp
                            @foreach ($facilities as $location) 
                            <?php 
                                if ($locationsArray != 0 || $locationsArray != null || $locationsArray != '') {
                                    if(in_array($location->facility_id,$locationsArray)){
                                        $no++;
                            ?>
                                <li>{{ $no.". ".$location->address }}</li>
                            <?php

                                    }
                                }
                            ?>                                
                            @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                            @php
                            $no = 0
                            @endphp
                            @foreach ($facilities as $location) 
                            <?php 
                                if ($locationsArray != 0 || $locationsArray != null || $locationsArray != '') {
                                    if(in_array($location->facility_id,$locationsArray)){
                                        $no++;
                            ?>
                                <li>{{ $no.". ".$location->state }}</li>
                            <?php

                                    }
                                }
                            ?>                                
                            @endforeach
                            </ul>
                        </td>

                        <td>
                            <ul>
                            @php
                            $no = 0
                            @endphp
                            @foreach ($facilities as $location) 
                            <?php 
                                if ($locationsArray != 0 || $locationsArray != null || $locationsArray != '') {
                                    if(in_array($location->facility_id,$locationsArray)){
                                        $no++;
                            ?>
                                <li>{{ $no.". ".$location->city }}</li>
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
                        <td onclick="showStatusDropDown('{{$employee->id}}');" id="op_status_{{$employee->id}}">{{ Config::get('constants.STATUS.'.$employee->status) }}</td> 
                        <td class="status-td hidden" id="op_status_dropdown_{{$employee->id}}" >
                            <select name="status" id="status_{{$employee->id}}" class="form-control select2" onchange="selectStatus(this,'{{$employee->id}}')" >
                                <option value="0" @if($employee->status == 0 || old('status') == 0) selected="selected" @endif>Inactive</option>
                                <option value="1" @if($employee->status == 1 || old('status') == 1) selected="selected" @endif>Active</option>
                                <option value="2" @if($employee->status == 2 || old('status') == 2) selected="selected" @endif>Pending</option>
                            </select>
                        </td>
                                
                        <td style="width: 250px;">
                            <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="post"
                                  class="form-horizontal">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <div class="btn-group">
                                    <a href="{{ route('admin.employees.edit', $employee->id) }}"
                                       class="btn mx-2 w-auto btn-edit"><i class="fa fa-edit fa-lg"></i></a>
                                    <a href="{{ route('admin.employee.profile', $employee->id) }}"
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
    <script src="https://momentjs.com/downloads/moment.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".aaaa").change({
                //alert('hi');
            });
            var _opId = '';
            
            // $('.table thead th').each( function () {
            //     var title = $(this).text();
            //     $(this).html( '<input class="cls_search" type="text" placeholder="Search '+title+'" />' );
            // } );
            
            // var table = $('.table').DataTable({
            //     initComplete: function () {
            //         // Apply the search
            //         this.api().columns().every( function () {
            //             var that = this;
                        
            //             $( '.cls_search', this.header() ).on( 'keyup change clear', function () {
            //                 alert("fdf");

            //                 if ( that.search() !== this.value ) {
            //                     that
            //                         .search( this.value )
            //                         .draw();
            //                 }
            //             } );
            //         } );
            //     }
            // });
        });

        
    </script>

    <script>        

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
                
                var date = moment();
                var newDate = date.format("YYYY-MM-DD hh:mm:ss");
                console.log(newDate);
                $.ajax({
                    url:'delete/'+_opId,
                    type:'post',
                    // type: 'DELETE',
                    data:{
                        '_token':'{{csrf_token()}}',
                        id:_opId,
                        status:0,
                        deleted_at:newDate
                    },
                    success:function (data) {
                        location.reload();
                        // console.log(data);
                    }
                })
            }
            else if(result.dismiss === swal.DismissReason.cancel)
                {
                
                }
            })
        }

        function showStatusDropDown(id){
            //alert(id);
            $('#op_status_dropdown_'+id).removeClass('hidden');
            $('#op_status_'+id).addClass('hidden');
        }

        function selectStatus(status,id){
            $.ajax({
                    url:'status',
                    type:'post',
                    data:{
                        '_token':'{{csrf_token()}}',
                        id:id,
                        status:status.value
                    },
                    success:function (data) {
                        location.reload();
                        // console.log(data);
                        // $('#op_status_dropdown_'+id).addClass('hidden');
                        // $('#op_status_'+id).removeClass('hidden');
                    }
                })
        }

    </script>
@endsection
