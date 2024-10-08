@extends('layouts.admin')
@section('content')

<!-- Style Start -->
 <style>
    .img-container:hover .hover-text {
        display: block !important;
        opacity: 1;
    }

    .hover-text {
        display: none;
        opacity: 0;
    }

    .img-container:hover .hover-text {
        display: block;
        opacity: 1;
    }
    .fs-13 {
        font-size: 13px;
    }
</style>
<!-- Style End -->

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
            <!-- <pre>{{ print_r($orders) }}</pre> -->

            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-top-0">
                            <div class="card-body">
                                    <div class="mb-3">
                                        <form class="d-flex align-items-center" id="searchForm" autocomplete="off">
                                        <div class="me-3" style="width: 100px;">
                                        <label for="InvoiceProduct" class="form-label">Search Type</label>
                                        <select class="rounded form-select" id="searchBy">
                                            <option value="name">Ism</option>
                                            <option value="phone">Phone</option>
                                        </select>
                                        </div>
                                        <!-- <input class="form-control" > -->
                                        <div class="form-group" style="width: 100%;">
                                            <label for="InvoiceProduct" class="form-label">Data Search</label>
                                            <input type="text" class="form-control" id="searchInput" placeholder="Search..." onkeyup="filterOrders()">
                                        </div>
                                        </form>
                                    </div>
                                <div class="col-xxl-8 w-auto">
                                    <div class="card stretch stretch-full">
                                        <div class="card-header">
                                            <h5 class="card-title">Latest Data</h5>
                                            <div class="card-header-action">
                                                <div class="card-header-btn">
                                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Delete">
                                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger" data-bs-toggle="remove"> </a>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Refresh">
                                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                                    </div>
                                                    <div data-bs-toggle="tooltip" title="" data-bs-original-title="Maximize/Minimize">
                                                        <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success" data-bs-toggle="expand"> </a>
                                                    </div>
                                                </div>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                                        <div data-bs-toggle="tooltip" title="" data-bs-original-title="Options">
                                                            <i class="feather-more-vertical"></i>
                                                        </div>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-at-sign"></i>New</a>
                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-calendar"></i>Event</a>
                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-bell"></i>Snoozed</a>
                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-trash-2"></i>Deleted</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-settings"></i>Settings</a>
                                                        <a href="javascript:void(0);" class="dropdown-item"><i class="feather-life-buoy"></i>Tips &amp; Tricks</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body custom-card-action p-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead>
                                                        <tr class="border-b">
                                                            <th class="fs-6" scope="row">Users</th>
                                                            <th class="fs-6">Phone</th>
                                                            <th class="fs-6">product</th>
                                                            <th class="fs-6">Amount</th>
                                                            <th class="fs-6">State</th>
                                                            <th class="fs-6">Status</th>
                                                            <th class="fs-6 text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($orders['orders']['data'] as $data)
                                                            <tr>
                                                                <td class="align-middle">
                                                                    @if(isset($data['data']['client']))
                                                                    <div class="d-flex align-items-center gap-3">
                                                                        <div class="avatar-image">
                                                                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" class="img-fluid">
                                                                        </div>
                                                                        <a href="javascript:void(0);">
                                                                            <span class="d-block">{{ $data['data']['client']['firstName'] ?? 'N/A' }}
                                                                                {{ $data['data']['client']['lastName'] ?? 'N/A' }}
                                                                            </span>
                                                                            <span class="fs-12 d-block fw-normal text-muted">{{ $data['data']['client']['email'] ?? 'no email' }}</span>
                                                                        </a>
                                                                    </div>
                                                                    @else
                                                                        <span class="badge bg-soft-danger text-danger">No Data</span>
                                                                    @endif
                                                                </td>
                                                                <td class="align-middle">
                                                                    <span class="badge text-dark fs-13">{{ $data['data']['client']['phone'] ?? 'No Phone' }}</span>
                                                                </td>
                                                                <td class="align-middle">
                                                                    @if($data['product_ids'] === "osago")
                                                                    <span class="badge bg-soft-warning text-warning fs-13">{{ $data['product_ids'] ?? 'No Product' }}</span>
                                                                    @elseif($data['product_ids'] === "accident-family")
                                                                    <span class="badge bg-soft-warning text-warning fs-13">{{ $data['product_ids'] ?? 'No Product' }}</span>
                                                                    @elseif($data['product_ids'] === "accident-travelers")
                                                                    <span class="badge bg-soft-warning text-warning fs-13">{{ $data['product_ids'] ?? 'No Product' }}</span>
                                                                    @elseif($data['product_ids'] === "accident-comprehensive")
                                                                    <span class="badge bg-soft-warning text-warning fs-13">{{ $data['product_ids'] ?? 'No Product' }}</span>
                                                                    @else
                                                                    @endif
                                                                </td>
                                                                <td class="align-middle">
                                                                    @if(isset($data['state']) && $data['state'] > 1)
                                                                        <span class="badge bg-soft-success text-success">To'landi</span>
                                                                    @else
                                                                        <span class="badge bg-soft-danger text-danger">To'lanmadi</span>
                                                                    @endif
                                                                </td>
                                                                <td class="align-middle">
                                                                    @if($data['policy_id'] !== "none")
                                                                    <span class="badge bg-soft-success text-success">Muvaffaqiyatli yaratildi</span>
                                                                    @else
                                                                    <span class="badge bg-soft-danger text-danger">Bekor qilindi</span>
                                                                    @endif
                                                                </td>
                                                                <td class="align-middle">
                                                                    @if(isset($data['payment_type']) && $data['payment_type'] == "click")
                                                                    <!-- <span>{{ $data['payment_type'] ?? 'N/A' }}</span> -->
                                                                    <div title="click orqali to'lov qilingan!" class="img-container" style="position: relative; display: inline-block;">
                                                                        <img src="https://api.uznews.uz/storage/uploads/posts/images/75489/inner/JbhfoSczvY.jpg" width="60px" height="40px" style="object-fit: cover;">
                                                                    </div>
                                                                    @elseif(isset($data['payment_type']) && $data['payment_type'] == "payme")
                                                                    <!-- <span>{{ $data['payment_type'] ?? 'N/A' }}</span> -->
                                                                    <div title="payme orqali to'lov qilingan!" class="img-container" style="position: relative; display: inline-block;">
                                                                        <img src="https://www.gazeta.uz/media/img/2023/08/IyiSHW16913516816386_b.jpg" width="60px" height="40px" style="object-fit: cover;">
                                                                    </div>
                                                                    @elseif(isset($data['payment_type']) && $data['payment_type'] == "oson")
                                                                    <!-- <span>{{ $data['payment_type'] ?? 'N/A' }}</span> -->
                                                                    <div title="oson orqali to'lov qilingan!" class="img-container" style="position: relative; display: inline-block;">
                                                                        <img src="https://www.gazeta.uz/media/img/2023/08/g3e61v16934799940984_b.jpg" width="60px" height="40px" style="object-fit: cover;">
                                                                    </div>

                                                                    @elseif(isset($data['payment_type']) && $data['payment_type'] == "none")
                                                                    <div title="to'lov qilinmagan!" class="img-container" style="position: relative; display: inline-block;">
                                                                        <img src="https://www.shutterstock.com/image-vector/line-art-no-credit-card-260nw-1166998309.jpg" width="60px" height="40px" style="object-fit: cover;">
                                                                    </div>
                                                                    @else

                                                                    @endif

                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="{{ route('order.edit', $data['id']) }}">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer border-0">
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
                                    </div>
                                </div>


                                <!-- @foreach($orders['orders']['data'] as $order)
                                    <p>
                                         @if(isset($data['data']['client']))
                                            {{ $data['data']['client']['firstName'] ?? 'N/A' }}
                                            {{ $data['data']['client']['lastName'] ?? 'NA'}}
                                            {{ $data['data']['client']['surName'] ?? 'N/A'}}
                                            {{ $data['data']['client']['legalTypeId'] ?? 'N/A'}}
                                            {{ $data['data']['client']['firstNameEn'] ?? 'N/A'}}
                                            {{ $data['data']['client']['lastNameEn'] ?? 'N/A'}}
                                            {{ $data['data']['client']['gender'] ?? 'N/A'}}
                                            {{ $data['data']['client']['birthday'] ?? 'N/A'}}
                                            {{ $data['data']['client']['passportSeries'] ?? 'N/A'}}
                                            {{ $data['data']['client']['passportNumber'] ?? 'N/A'}}
                                            {{ $data['data']['client']['passportIssueDate'] ?? 'N/A'}}
                                            {{ $data['data']['client']['passportExpirationDate'] ?? 'N/A'}}
                                            {{ $data['data']['client']['passportAuthority'] ?? 'N/A'}}
                                            {{ $data['data']['client']['phone'] ?? 'N/A'}}
                                            {{ $data['data']['client']['pinfl'] ?? 'N/A'}}
                                            {{ $data['data']['client']['address'] ?? 'N/A'}}
                                            {{ $data['data']['client']['districtIdForEosgoUz'] ?? 'N/A'}}
                                            {{ $data['data']['client']['countryId'] ?? 'N/A'}}
                                            {{ $data['data']['client']['age'] ?? 'N/A'}}
                                            {{ $data['data']['client']['specialConditions'] ?? 'N/A'}}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                @endforeach -->


                              <!-- @foreach($orders['orders']['data'] as $order)
                                <p>
                                    @if(isset($data['data']['insuredPersons']))
                                        {{ $data['data']['insuredPersons']['firstName'] ?? 'N/A' }}
                                        {{ $data['data']['insuredPersons']['lastName'] ?? 'NA'}}
                                        {{ $data['data']['insuredPersons']['surName'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['legalTypeId'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['firstNameEn'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['lastNameEn'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['gender'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['birthday'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['passportSeries'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['passportNumber'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['passportIssueDate'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['passportExpirationDate'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['passportAuthority'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['phone'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['pinfl'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['address'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['districtIdForEosgoUz'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['countryId'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['age'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['specialConditions'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['premiumAmount'] ?? 'N/A'}}
                                        {{ $data['data']['insuredPersons']['coefficient'] ?? 'N/A'}}
                                    @else
                                       N/A
                                    @endif

                                </p>
                                @endforeach -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </main>
<script>
    function filterOrders() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const searchBy = document.getElementById('searchBy').value;
        const rows = document.querySelectorAll('tr');

        rows.forEach(row => {
            const nameCell = row.querySelector('td:nth-child(1)');
            const phoneCell = row.querySelector('td:nth-child(2)');

            let textToSearch = '';

            if (searchBy === 'name' && nameCell) {
                textToSearch = nameCell.innerText.toLowerCase();
            } else if (searchBy === 'phone' && phoneCell) {
                textToSearch = phoneCell.innerText.toLowerCase();
            }

            if (textToSearch.includes(input)) {
                row.style.display = '';
            } else {
                row.style.display = 'none'
            }
        });
    }

    document.getElementById('searchForm').onsubmit = function(event) {
        event.preventDefault(); // Formani yuborishni to‘xtatadi
        filterOrders(); // Qidiruvni amalga oshiradi
    };
</script>
@endsection

