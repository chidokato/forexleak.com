@extends('layout.index')


@section('content')

<!-- <h1>Giỏ hàng của bạn</h1>

@if(!empty($items))
    <ul>
        @foreach($items as $item)
            <li>
                {{ $item['name'] }} - {{ number_format($item['price'], 0, ',', '.') }}đ 
                x {{ $item['quantity'] }} =
                {{ number_format($item['subtotal'], 0, ',', '.') }}đ
                <a href="{{ route('cart.remove', $item['id']) }}">Xóa</a>
            </li>
        @endforeach
    </ul>

    <p><strong>Tổng tiền:</strong> {{ number_format($total, 0, ',', '.') }}đ</p>
    <a href="{{ route('checkout.show') }}">Tiến hành đặt hàng</a>
@else
    <p>Giỏ hàng trống.</p>
@endif -->


<section class="manage-plan-section pb-120 mt-4">
            <div class="container">
                <div class="manage-table-pricing-wrapper bg-white rounded">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center mb-5">
                                <h2>Your shopping cart</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-l2">
                            @if(!empty($items))
                            <div class="managed-plan table-responsive bg-white rounded">
                                <table class="table w-100">
                                    <tbody>
                                        <tr>
                                            <th>Name</th>
                                            
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                        @foreach($items as $item)
                                        <tr>
                                            <td class="item-name">
                                                <strong>{{ $item['name'] }}</strong>
                                            </td>
                                            <td class="price-amount">
                                                <span>${{ number_format($item['price'], 0, ',', '.') }}</span>
                                            </td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>${{ $item['quantity']*$item['price'] }}</td>
                                            <td>
                                                <form action="{{ route('cart.remove') }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                                    <button type="submit" class="template-btn secondary-btn">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>${{ number_format($total, 0, ',', '.') }}</td>
                                            <td><a href="{{ route('checkout.show') }}" class="template-btn primary-btn rounded-2 btn-small">Checkout</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                           @else
                                <p style="text-align: center;">Cart is empty</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>



@endsection
