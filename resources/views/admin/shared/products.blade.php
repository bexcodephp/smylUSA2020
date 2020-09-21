@if(!$products->isEmpty())
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Quantity</td>
            <td>Price</td>
            <td>Status</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    @if($admin->hasPermission('view-product'))
                        <a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a>
                    @else
                        {{ $product->name }}
                    @endif
                </td>
                <td>{{ $product->quantity }}</td>
                <td>{{ config('cart.currency_symbol') }} {{ $product->price }}</td>
                {{-- <td>@include('layouts.status', ['status' => $product->status])</td> --}}
                <td>
                    @if(isset($product->status))
                        @if($product->status == 1)
                            <span style="display: none; visibility: hidden">1</span>
                            <button type="button" class="btn btn-link mx-2 w-auto btn-true text-green deactivate" data-id="{{$product->id}}"><i class="fa fa-check fa-lg"></i></button>
                            @else
                            <span style="display: none; visibility: hidden">0</span>
                            <button type="button" class="btn btn-link mx-2 w-auto btn-false text-red activate " data-id="{{$product->id}}"><i class="fa fa-times fa-lg"></i></button>
                        @endif
                    @endif
                </td>
                <td>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">
                            @if($admin->hasPermission('update-product'))<a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>@endif
                            @if($admin->hasPermission('delete-product'))<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Delete</button>@endif
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif