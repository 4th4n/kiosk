@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order History</h1>
    <table>
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Total Price</th>
            <th>Items</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>${{ number_format($order->total_price, 2) }}</td>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                            <li>{{ $item->name }} ({{ $item->pivot->quantity }} pcs)</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $order->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

    </table>
</div>
@endsection
