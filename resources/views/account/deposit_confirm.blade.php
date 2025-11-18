@extends('layout.index')

@section('content')
<div class="container text-center text-white mt-5 mb-5">
  <h3 class="mb-4">Deposit Confirmation</h3>

  <div class="card bg-dark p-4 rounded-4 mx-auto" style="max-width: 500px;">
      <h5>Order Code: <strong>{{ $transaction->order_code }}</strong></h5>
      <p>Amount: <strong>${{ number_format($transaction->amount, 0) }}</strong></p>
      <p>Method: <strong>{{ strtoupper($transaction->method) }}</strong></p>
      <p>Status: <span id="status-text">{{ ucfirst($transaction->status) }}</span></p>

      <hr class="bg-secondary">

      <h5>⏳ Time remaining: <span id="countdown"></span></h5>

      <p class="mt-3">Please complete your payment within 1 minute.</p>
      <p>After the time runs out, this order will be automatically cancelled.</p>

      {{-- Nút hành động --}}
      <div class="mt-4 d-flex gap-2 justify-content-center">
          {{-- Nút Hủy --}}
          <button type="button" class="btn btn-outline-danger btn-sm" onclick="confirmCancel()">
              Cancel order
          </button>

          {{-- Upload ảnh + Xác nhận --}}
          <form action="{{ route('account.deposits.confirm', $transaction->id) }}"
                method="POST" enctype="multipart/form-data" class="d-flex gap-2 align-items-center">
              @csrf
              <input type="file" name="proof" accept="image/*" required class="form-control form-control-sm" style="max-width:230px">
              <button type="submit" class="btn btn-success btn-sm">I’ve transferred — Confirm</button>
          </form>
      </div>

      {{-- form hủy ẩn --}}
      <form id="cancel-form" action="{{ route('account.deposits.cancel', $transaction->id) }}" method="POST" class="d-none">
          @csrf
      </form>
  </div>
</div>

<script>
  // Countdown (remainingSeconds server-side)
  let remaining = {{ $remainingSeconds ?? 0 }};
  const countdownEl = document.getElementById('countdown');
  const statusEl = document.getElementById('status-text');

  function tick() {
    if (remaining <= 0) { countdownEl.textContent = '00:00'; return; }
    let m = Math.floor(remaining / 60).toString().padStart(2,'0');
    let s = (remaining % 60).toString().padStart(2,'0');
    countdownEl.textContent = `${m}:${s}`;
    remaining--; setTimeout(tick, 1000);
  }
  tick();

  function confirmCancel() {
    if (confirm('Bạn xác nhận hủy lệnh nạp tiền?')) {
      document.getElementById('cancel-form').submit();
    }
  }
</script>

@endsection
