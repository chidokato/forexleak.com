@extends('admin.layout.main')

@section('content')
<div class="container">
    <h1>Deposit Transaction Details</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Order Code:</strong> {{ $deposit->order_code }}</li>
        <li class="list-group-item"><strong>User:</strong> {{ $deposit->user->name ?? 'N/A' }}</li>
        <li class="list-group-item"><strong>Method:</strong> {{ $deposit->method }}</li>
        <li class="list-group-item"><strong>Amount:</strong> {{ $deposit->amount }}</li>
        <li class="list-group-item"><strong>Status:</strong> 
            @if($deposit->status == 'pending')
                <span class="badge bg-warning">Pending</span>
            @elseif($deposit->status == 'approved')
                <span class="badge bg-success">Approved</span>
            @else
                <span class="badge bg-danger">Rejected</span>
            @endif
        </li>
        <li class="list-group-item"><strong>IP Address:</strong> {{ $deposit->ip_address }}</li>
        <li class="list-group-item"><strong>Date:</strong> {{ $deposit->created_at->format('d/m/Y H:i') }}</li>
    </ul>

    <h5>Update Status</h5>
    <div class="d-flex gap-2">
        @foreach(['pending','approved','rejected'] as $status)
            @if($deposit->status != $status)
            <form action="{{ route('deposits.updateStatus', $deposit->id) }}" method="POST">
                @csrf
                <input type="hidden" name="status" value="{{ $status }}">
                <button type="submit" class="btn 
                    @if($status == 'pending') btn-warning 
                    @elseif($status == 'approved') btn-success 
                    @else btn-danger @endif btn-sm">
                    Mark as {{ ucfirst($status) }}
                </button>
            </form>
            @endif
        @endforeach
    </div>

    <a href="{{ route('deposits.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
