@extends('layouts.admin')

@section('content')
    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Orders</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/" class="nxl-link">Home</a>
                        </li>
                        <li class="breadcrumb-item">Orders</li>
                    </ul>
                </div>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
{{--            @dd($order['orders']);--}}

            <form action="{{ route('order.update', $order['orders']['id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="yangi" {{ $order['orders']['status'] == 'yangi' ? 'selected' : '' }}>Yangi</option>
                        <option value="kutilmoqda" {{ $order['orders']['status'] == 'kutilmoqda' ? 'selected' : '' }}>Kutilmoqda</option>
                        <option value="bekor_qilingan" {{ $order['orders']['status'] == 'bekor_qilingan' ? 'selected' : '' }}>Bekor qilingan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Order Status</button>
            </form>
        </div>
    </main>
@endsection
