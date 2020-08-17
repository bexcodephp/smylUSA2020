<table class="table table-responsive table-bordered">
    <thead>
    <th>Order Number</th>
    <th>Order Status</th>
    <th>Order Date</th>
    </thead>
    <tbody>
    <tr>
            <td>{{$detail->order_id}}</td>
            <td>{{$detail->status}}</td>
            <td>{{\Carbon\Carbon::parse($detail->created_at)->format('m/d/Y H:i')}}</td>
        </tr>
    </tbody>
</table>
