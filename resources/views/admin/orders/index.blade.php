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
            <!-- [ page-header ] end -->
{{--            <pre>{{ print_r($orders) }}</pre>--}}

            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-top-0">
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Amount</th>
                                        <th>State</th>
                                        <th>Payment Type</th>
                                        <th>Policy ID</th>
                                        <th>Data</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders['orders']['data'] as $data)
                                            <tr>
                                                <td>{{ $data['product_ids'] ?? 'N/A' }}</td>
                                                <td>{{ $data['amount'] ?? 'N/A' }}</td>
                                                <td>{{ $data['state'] ?? 'N/A' }}</td>
                                                <td>{{ $data['payment_type'] ?? 'N/A' }}</td>
                                                <td>{{ $data['policy_id'] ?? 'N/A' }}</td>
                                                <td>
                                                    @if(isset($data['data']['client']))
                                                        {{ $data['data']['client']['firstName'] ?? 'N/A' }} {{ $data['data']['client']['lastName'] ?? 'N/A' }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- Sahifalash linklari --}}
                                        <div class="card-footer">
                                            <ul class="list-unstyled d-flex align-items-center gap-2 mb-0 pagination-common-style">
                                                {{-- Oldingi sahifaga o'tish tugmasi --}}
                                                @if ($orders['orders']['current_page'] == 1)
                                                    <li class="disabled"><i class="bi bi-arrow-left"></i></li>
                                                @else
                                                    <li>
                                                        <a href="{{ route('orders.index', ['page' => $orders['orders']['current_page'] - 1]) }}"><i class="bi bi-arrow-left"></i></a>
                                                    </li>
                                                @endif

                                                {{-- Sahifalar orasida navigatsiya --}}
                                                @php
                                                    $currentPage = $orders['orders']['current_page'];
                                                    $lastPage = $orders['orders']['last_page'];
                                                    $start = max(1, $currentPage - 2); // Boshlang'ich nuqtani aniqlash
                                                    $end = min($lastPage, $currentPage + 2); // Tugatish nuqtasi
                                                @endphp

                                                {{-- Birinchi sahifa har doim ko'rsatiladi --}}
                                                @if($start > 1)
                                                    <li><a href="{{ route('orders.index', ['page' => 1]) }}">1</a></li>
                                                    @if($start > 2)
                                                        <li>...</li> {{-- Orada "..." belgisini qo'yish --}}
                                                    @endif
                                                @endif

                                                {{-- Aktiv bo'lgan sahifa va unga yaqin sahifalarni chiqarish --}}
                                                @for ($i = $start; $i <= $end; $i++)
                                                    <li>
                                                        <a href="{{ route('orders.index', ['page' => $i]) }}" class="{{ $i == $currentPage ? 'active' : '' }}">{{ $i }}</a>
                                                    </li>
                                                @endfor

                                                {{-- Oxirgi sahifa har doim ko'rsatiladi --}}
                                                @if($end < $lastPage)
                                                    @if($end < $lastPage - 1)
                                                        <li>...</li> {{-- Orada "..." belgisini qo'yish --}}
                                                    @endif
                                                    <li><a href="{{ route('orders.index', ['page' => $lastPage]) }}">{{ $lastPage }}</a></li>
                                                @endif

                                                {{-- Keyingi sahifaga o'tish tugmasi --}}
                                                @if ($currentPage < $lastPage)
                                                    <li>
                                                        <a href="{{ route('orders.index', ['page' => $currentPage + 1]) }}"><i class="bi bi-arrow-right"></i></a>
                                                    </li>
                                                @else
                                                    <li class="disabled"><i class="bi bi-arrow-right"></i></li>
                                                @endif
                                            </ul>

                                        </div>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>

@endsection
