<div class="modal-header d-flex  justify-content-center">
    <img src="{{ asset('assets/user/img/logo.png') }}" alt="">
</div>
<div class="modal-body w-auto">
    <ul style="list-style: none" class="p-0">
        <li>Ma don hang : {{ $orders[0]->order_id }}</li>
        <li>Ten khach hang : </li>
        <li>So dien thoai khach hang : </li>
        <li>Dia chi khach hang : </li>
        <li>Trang thai don hang : </li>
    </ul>
    <table class="table table-bordered">
        <thead>
        <tr class="text-uppercase">
            <th scope="col">stt</th>
            <th scope="col">ten sp</th>
            <th scope="col">don gia</th>
            <th scope="col">so luong</th>
            <th scope="col">giam gia</th>
            <th scope="col">thanh tien</th>
        </tr>
        </thead>
        <tbody>
        @php
            $t = 0;
            $sum = 0;
            $sumAll = 0;
        @endphp
        @foreach($orders as $order)
        <tr>
            <th scope="row">{{ ++$t }}</th>
            <td>{{ $order->products->name }}</td>
            <td>{{ '$'.$order->products->price }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->products->discount->percentage_discount.'%' }}</td>
                <?php
                    $priceProduct = $order->products->price;
                    $discount = $order->products->discount->percentage_discount;
                    $quantity = $order->quantity;
                    if (!$discount) {
                        $sumAll += $sum = $priceProduct * $quantity;
                    } else {
                        $sumAll += $sum = ($priceProduct-($priceProduct*($discount/100)))*$quantity;
                    }
                ?>
            <td>{{ $sum }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2" style="border-right: none">Tong tien :</td>
            <td colspan="4" style="border-left: none" class="text-right">{{ $sumAll }}</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

