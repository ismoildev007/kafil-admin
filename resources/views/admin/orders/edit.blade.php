@extends('layouts.admin')
@section('content')


<style>
    .address-container {
    position: relative; /* Konteynerni pozitsiya qilish */
}

.short-address {
    cursor: pointer; /* Kursor ko'rsatilishi uchun */
}

.full-address {
    display: none; /* Dastlab to'liq manzil yashirinadi */
    position: absolute; /* Absolute pozitsiya berish */
    background-color: white; /* Orqa fon rangini o'rnatish */
    border: 1px solid #ccc; /* Ramka berish */
    padding: 5px; /* Ichki joy */
    z-index: 1; /* Boshqa elementlar ustida ko'rinishi uchun */
}

.address-container:hover .full-address {
    display: block; /* Hover bo'lganda to'liq manzil ko'rsatiladi */
}

</style>

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
 <!-- * * * * ================ -->
                        <div class="col-lg-12">
                            <div class="card-body custom-card-action p-0">
                                <div class="table-responsive">
                                    <div class="ps-3">
                                        <h2>Clients</h2>
                                    </div>
                                    <table class="table table-hover mb-0">
                                        <tbody>
                                            <tr>
                                                <td class="ps-3">
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="avatar-image">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="img-fluid" alt="Customer">
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0);">{{$order['orders']['data']['client']['organizationName']}}
                                                                <span class="d-block">{{$order['orders']['data']['client']['email']}}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span>{{$order['orders']['data']['client']['phone']}}</span></td>

                                                <td>
                                                    <span class="d-inline-block align-middle">
                                                            <?php
                                                            $address = $order['orders']['data']['client']['address'];
                                                            $shortAddress = mb_substr($address, 0, 10) . '<span id="readMore">...</span>';
                                                            ?>
                                                            
                                                            <span 
                                                                class="short-address" 
                                                                onmouseover="showFullAddress(this)" 
                                                                onmouseout="hideFullAddress(this)">
                                                                <?php echo $shortAddress; ?>
                                                            </span>
                                                            
                                                            <span class="full-addres" style="display:none;">
                                                                <?php echo $address; ?>
                                                            </span>
                                                        </span>
                                                </td>

                                                <td>{{$order['orders']['product_ids']}}</td>
                                                <td><span class="badge bg-soft-success text-success">{{$order['orders']['amount']}} </span></td>
                                                 <td class="align-middle">
                                                                    @if(isset($data['state']) && $data['state'] > 1)
                                                                        <span class="badge bg-soft-success text-success">To'landi</span>
                                                                    @else
                                                                        <span class="badge bg-soft-danger text-danger">To'lanmadi</span>
                                                                    @endif
                                                                </td>
                                                <td class="align-middle">
                                                    @if($order['orders']['policy_id'] !== "none")
                                                    <span class="badge bg-soft-success text-success">Muvaffaqiyatli yaratildi</span>
                                                    @else
                                                    <span class="badge bg-soft-danger text-danger">Bekor qilindi</span>
                                                    @endif
                                                </td>
                                                <td class="text-end">
                                                    <p class="m-0">Edit</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    </main>

            <script>
                function showFullAddress(element) {
                const fullAddress = element.nextElementSibling;
                fullAddress.style.display = 'inline';
                readMore.style.display = "none";
            }
            function hideFullAddress(element) {
                const fullAddress = element.nextElementSibling;
                fullAddress.style.display = 'none';
                readMore.style.display = "inline";
            }
            </script>

@endsection
