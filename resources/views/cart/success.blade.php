@extends('layout.index')

@section('content')

<section class="manage-plan-section pb-120 mt-4 cart-main">
    <div class="container">
        <div class="manage-table-pricing-wrapper bg-white rounded">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-5">
                        <h2>Payment successful !</h2>
                        <p>Mã đơn hàng: <strong>{{ $order->order_code }}</strong></p>
                        <p>Tổng tiền: <strong>${{ number_format($order->total_price, 0, ',', '.') }}</strong></p>
                        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
