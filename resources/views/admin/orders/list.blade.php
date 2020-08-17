@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($orders)
            <div class="box">
                <div class="box-body">
                    <h2>Orders</h2>
                    {{-- @include('layouts.search', ['route' => route('admin.orders.index')]) --}}
                    <table class="table table-bordered table-stripped table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-3" style="width: 30px;">Order#</th>
                                <th class="col-md-3" style="width: 150px;">Customer</th>
                                <th class="col-md-3" style="width: 80px;">Date</th>
                                <th class="col-md-2" style="width: 50px;">Total</th>
                                <th class="col-md-2" style="width: 50px;">Status</th>
                                <th class="col-md-2" style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($total = 0)
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->order_no}}</td>
                                <td>{{$order->customer->name}}</td>
                                <td>{{ date('d-m-y H:i:s', strtotime($order->created_at)) }}</td>
                                <td>
                                    <span class="label @if($order->total != $order->total_paid) label-danger @else label-success @endif">{{ config('cart.currency_symbol') }} {{ $order->total }}</span>
                                </td>
                                <td><p class="text-center" style="color: #ffffff; background-color: {{ $order->status->color }}">{{ $order->status->name }}</p></td>
                                <td>
                                    <a title="Show order" class="btn btn-info btn-xs" href="{{ route('admin.orders.show', $order->id) }}">View</a>
                                <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}" style="display: inline-block">
                                    @csrf 
                                    @method('DELETE')
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-xs btn-danger btn-flat deleteOrder" value="Delete">
                                    </div>
                                </form>
                                </td>
                            </tr>
                            @php($total += $order->total)
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="col-md-3" style="width: 30px;"></th>
                                <th class="col-md-3" style="width: 150px;"></th>
                                <th class="col-md-3" style="width: 80px;"></th>
                                <th class="col-md-2" style="width: 50px;">{{ config('cart.currency_symbol') }}{{ $total }}</th>
                                <th class="col-md-2" style="width: 50px;"></th>
                                <th class="col-md-2" style="width: 150px;"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{ $orders->links() }}
                </div>
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection

@section('js')
<script>
    $(document).on('click', '.deleteOrder', function(e){
    e.preventDefault() // Don't post the form, unless confirmed
    if (confirm('Are you sure?')) {
    // Post the form
    $(e.target).closest('form').submit() // Post the surrounding form
    }
    });
</script>
    
@endsection