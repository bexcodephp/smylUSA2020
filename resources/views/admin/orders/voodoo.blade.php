@extends('layouts.admin.app')

@section('content')
    <style>
        button.btn.btn-danger.btn-sm {
            width: 100%!important;
        }
        a.btn.btn-primary.btn-sm {
            width: 100%!important;
        }
    </style>
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($voodoo)
            <div class="box">
                <div class="box-body">
                    <h2>Order on Voodoo</h2>
                    @if(isset($dentist))
                    <h3 style="margin-bottom: 30px;">Dentist: {{ $dentist->name }}</h3>
                    @endif
                    {{-- @include('layouts.search', ['route' => route('admin.orders.index')]) --}}
                    <table  class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th> #</th>
                            <th> Order #</th>
                            <th> Notes</th>
                            <th>Order Status</th>
                            <th>Shipment Status</th>
                            <th>Shipment Service</th>
                            <th>Shipment Carrier</th>
                            <th>Shipment Tracking</th>
                            <th>Shipped On</th>
                            @if(!isset($dentist))
                            <th>Dentist</th>
                            @endif
                            <th>Created at</th>
                            <th> View Case</th>
                            <th> Case Token</th>
                            <th> History</th>
                            @if(!isset($dentist))
                            <th> Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($voodoo as $key => $case)
                            <tr>
                                <td> {{ ++$key }} </td>
                                <td>{{ $case->order->order_no }}</td>
                                <td>{{ $case->notes }}</td>
                                <td>{{ $case->order_status }}</td>
                                <td>{{ $case->shipment_status }}</td>
                                <td>{{ $case->shipment_service }}</td>
                                <td>{{ $case->shipment_carrier }}</td>
                                <td>{{ $case->shipment_tracking_code }}</td>
                                <td>{{ $case->shipment_delivered_at }}</td>
                                @if(!isset($dentist))
                                <td>{{ optional(optional($case->order)->dentist)->name }}</td>
                                @endif
                                <td>{{ date('d-m-Y H:i:s', strtotime($case->created_at)) }}</td>
                                <td>
                                    @if($case->doctor_approval_url)
                                        <a href="{{ $case->doctor_approval_url }}" target="_blank"><i
                                                class="fa fa-eye"></i></a>
                                    @endif
                                </td>
                                <td>
                                    @if($case->doctor_approval_token)
                                        {{ $case->doctor_approval_token }}
                                    @endif
                                </td>
                                <td>
                                    @if(sizeof($case->order->orderHistory)>0)
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="GetRecords" data-id="{{$case->order_id}}"><i
                                                class="fa fa-eye"></i></a>
                                    @endif
                                </td>
                                @if(!isset($dentist))
                                <td>
                                  <a class="btn btn-primary btn-sm DataId" href="#" data-target="#exampleModal1" data-toggle="modal" data-id="{{$case->order_id}}"><i class="fa fa-check"></i> Assign Dentist</a>
                                    {{-- <form action="" method="post"
                                          class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href=""
                                               class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <button onclick="return confirm('Are you sure?')" type="submit"
                                                    class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>
                                        </div>
                                    </form> --}}
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order History</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body dataShow">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Dentist</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.orders.assignedTo')}}" enctype="multipart/form-data" method="post">
                    @csrf
                <div class="modal-body">
                    <label>Select State</label>
                    <select name="state" class="form-control StateDentist">
                        <option value="">Select State</option>
                        @foreach($states as $key=>$state)
                            <option value="{{$key}}">{{$state}}</option>
                        @endforeach
                    </select>
                    <div class="stateData">
                        <label>Select Dentist</label>
                        <select name="dentist" class="form-control Dentist">
                            <option value="">Select State First</option>
                        </select>
                    </div>
                    <input type="hidden" name="order_id" class="orderId">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.GetRecords').click(function (e) {
            e.preventDefault();
            var id=$(this).data('id');
            $.ajax({
                url:'{{route('admin.orders.ajax')}}',
                type:'get',
                data:{
                    id:id
                },
                success: function (data) {
                    $('.dataShow').html(data);
                }
            })
        })
        $(document).on('change','.assignDoctor',function () {
            var id=$(this).val();
            var order_id=$(this).data('id');
            alert(id+' '+order_id);
            {{--$.ajax({--}}
            {{--    url:'',--}}
            {{--    type:'post',--}}
            {{--    data:{--}}
            {{--        '_token':'{{csrf_token()}}',--}}
            {{--        id:id--}}
            {{--    },--}}
            {{--    success:function (data) {--}}
            {{--    console.log(data);--}}
            {{--    }--}}
            {{--})--}}
        })
        var order_id
        $('.DataId').click(function () {
            order_id=$(this).data('id');
            $('.orderId').val(order_id);
        });

        $(document).on('change','.StateDentist',function () {
            var state=$(this).val();
            // alert(id+' '+order_id);
            $.ajax({
                url:"{{route('admin.orders.StateDentist')}}",
                type:'post',
                data:{
                    '_token':'{{csrf_token()}}',
                    state:state,
                    order_id:order_id,
                },
                success:function (data) {
                    $('.stateData').html(data);
                }
            })
        })
    </script>
@endsection
