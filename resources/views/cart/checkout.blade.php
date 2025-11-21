@extends('layout.index')

@section('content')

<section class="manage-plan-section pb-120 mt-4 cart-main">
    <div class="container">
        <div class="manage-table-pricing-wrapper bg-white rounded">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-5">
                        <h2>Checkout</h2>
                        <p>User: {{ $user->name }} | Balance: ${{ number_format($user->balance, 2) }}</p>
                    </div>
                </div>
            </div>
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <div class="col-l2">
                    <div class="managed-plan table-responsive bg-white rounded">
                        <table class="table w-100">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>${{ $item['price'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>${{ $item['price'] * $item['quantity'] }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"><strong>Total</strong></td>
                                    <td><strong>${{ $total }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><a href="{{ url('/') }}" class="btn btn-primary mt-3">Back to Cart</a></td>
                                    <td><form action="{{ route('checkout.process') }}" method="POST">
                                        @csrf
                                        <!-- <button type="submit" class="btn btn-success">Confirm & Pay</button> -->
                                        <button type="button" id="btn-confirm" class="btn btn-success">
                                            Confirm & Pay
                                        </button>
                                    </form></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('btn-confirm').addEventListener('click', function () {
    Swal.fire({
        title: 'Confirm Payment?',
        text: "Your account balance will be deducted to complete this payment.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, pay now!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.querySelector('form').submit();
        }
    });
});
</script>

@endsection
