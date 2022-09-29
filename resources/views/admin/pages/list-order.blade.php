@php($i = 0)
@foreach($orderDetails as $orderDetail)
    <tr class="text-center product_{{ $orderDetail->order_id }}">
        <th scope="row">{{ ++$i }}</th>
        <td class="order-id" data-id="{{ $orderDetail->order_id }}">{{ $orderDetail->order_id }}</td>
        <td>{{ $orderDetail->users->name }}</td>
        <td>
            <button type="button" class="btn btn-primary show-order" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-th-list"></i></button>
        </td>
        <td class="status">
            <button class="btn btn-{{ ($orderDetail->status == 0) ? 'danger' : 'success'  }} w-35 update-status">{{ ($orderDetail->status == 0) ? 'unconfimred' : 'successful confirmation' }}</button>
        </td>
    </tr>
@endforeach
