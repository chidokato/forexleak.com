@extends('admin.layout.main')

@section('content')
@include('admin.layout.header')
<?php use App\Models\menuTranslation; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-3 flex">
    <h2 class="h3 mb-0 text-gray-800 line-1 size-1-3-rem">Menu</h2>
    <a class="add-iteam" href="{{route('deposits.create')}}"><button class="btn-success form-control" type="button"><i class="fa fa-plus" aria-hidden="true"></i> {{__('lang.add')}}</button></a>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <ul class="nav nav-pills">
                    <li><a data-toggle="tab" class="nav-link active" href="#tab1">{{__('lang.all')}}</a></li>
                    <!-- <li><a data-toggle="tab" class="nav-link " href="#tab2">Hiển thị</a></li> -->
                    <!-- <li><a data-toggle="tab" class="nav-link" href="#tab3">Ẩn</a></li> -->
                </ul>
            </div>
            <div class="tab-content overflow">
                <div class="tab-pane active" id="tab2">
                    <table class="table">
                            <thead>
            <tr>
                <th>#</th>
                <th>Order Code</th>
                <th>Method</th>
                <th>Amount</th>
                <th>User</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($deposits as $deposit)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $deposit->order_code }}</td>
                <td>{{ $deposit->method }}</td>
                <td>{{ $deposit->amount }}</td>
                <td>{{ $deposit->user->name ?? 'N/A' }}</td>
                <td>
                    @if($deposit->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($deposit->status == 'approved')
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-danger">Rejected</span>
                    @endif
                </td>
                <td>{{ $deposit->created_at->format('d/m/Y H:i') }}</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('deposits.show', $deposit->id) }}" class="btn btn-info btn-sm">View</a>

                    @if($deposit->status == 'pending')
                    <form action="{{ route('deposits.approve', $deposit->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-success btn-sm">Approve</button>
                    </form>
                    <form action="{{ route('deposits.reject', $deposit->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">Reject</button>
                    </form>
                    @endif

                    <form action="{{ route('deposits.destroy', $deposit->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-secondary btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No deposit transactions found.</td>
            </tr>
            @endforelse
        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection