@extends('layouts.admin')
@section('content')


<style>
    .address-container {
    position: relative; 
}

.short-address {
    cursor: pointer;
}

.full-address {
    display: none;
    position: absolute;
    background-color: white;
    border: 1px solid #ccc; 
    padding: 5px; 
    z-index: 1;
}

.address-container:hover .full-address {
    display: block;
}

.handle-style {
    background-color: #0F172A;
    border-radius: 15px;
    padding-block: 20px;
}

</style>

    <main class="nxl-container">
        <div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center ">
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


                 <div class="card">
                     <div class="card-header">
                         <h5>Product Details</h5>
                     </div>
                     <div class="card-body">
                         <p class="card-text"><strong>Description:</strong> <span class="text-secondary">{{$order['orders']['data']['product']['description']}}</span></p>
                         <p class="card-text"><strong>Set of Classes:</strong> <span class="badge bg-soft-success text-success">{{$order['orders']['data']['product']['setOfClasses']}}</span></p>
                         <p class="card-text"><strong>Creation Date:</strong> <span class="badge bg-soft-success text-success">{{ substr($order['orders']['data']['product']['creationDate'], 0, 10) }}</span>
                     </p>
                         <p class="card-text"><strong>Last Modified Date:</strong> <span class="badge bg-soft-success text-success">{{ substr($order['orders']['data']['product']['lastModifiedDate'], 0, 10) }}</span</p>
                     </div>
                 </div>

            <!-- * * * * ================ -->
                                   <div class="col-lg-12 mt-3">
                                       <div class="card-body custom-card-action p-0 d-flex align-items-center gap-5">
           
                                           <div style="flex: 0 0 50%; max-width: 48%">
                                               <div class="ps-3">
                                                   <h2>Clients</h2>
                                               </div>
                                           <div class="table-responsive handle-style">
                                               <table class="table table-hover mb-0">
                                                   <thead>
                                                       <tr>
                                                           <th scope="col">Foydalanuvchi</th>
                                                           <th scope="col">Telefon</th>
                                                           <th scope="col">Manzil</th>
                                                           <th scope="col">Status</th>
                                                           <th scope="col">Miqdori</th>
                                                           <th scope="col">To'lov</th> <!--To'lov holati-->
                                                           <th scope="col">Buyurtma</th> <!--Buyurtma holati-->
                                                           <th scope="col">Harakat</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                       <tr>
                                                           <td class="ps-4">
                                                               <div class="d-flex align-items-center gap-3">
                                                                   <div class="avatar-image">
                                                                       <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="img-fluid" alt="Customer">
                                                                   </div>
                                                                   <div>
                                                                       <a href="javascript:void(0);">{{$order['orders']['data']['client']['organizationName'] ?? "N/A"}}
                                                                           @if(isset($order['orders']['data']['client']['email']))
                                                                           <span class="d-block">{{$order['orders']['data']['client']['email'] ?? "N/A"}}</span>
                                                                           @else
                                                                           <span class="d-block">{{"No emile"}}</span>
                                                                           @endif
                                                                       </a>
                                                                   </div>
                                                               </div>
                                                           </td>
                                                           <td><span>{{$order['orders']['data']['client']['phone'] ?? "N/A"}}</span></td>
           
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
           
                                                           <td>{{$order['orders']['product_ids'] ?? 'N/A'}}</td>
                                                           <td><span class="badge bg-soft-success text-success">{{$order['orders']['amount'] ?? 'N/A' }} </span></td>
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
                                                           <td>
                                                               <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto"><i class="feather-arrow-right"></i></a>
                                                           </td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                               
                                           </div>
                                           </div>
           
                                           <div style="flex: 0 0 50%; max-width: 48%">
                                                <div class="ps-3">
                                                    <h2>Owner</h2>
                                                </div>
                                            <div class="table-responsive handle-style">
                                               <table class="table table-hover mb-0">
                                                   <thead>
                                                       <tr>
                                                           <th scope="col">Foydalanuvchi</th>
                                                           <th scope="col">Rezidentmi</th> <!--Foydalanuvchi-->
                                                           <th scope="col">Phone</th>
                                                           <th scope="col">Manzil</th>
                                                           <th scope="col">Tug'ulgansana</th>
                                                           <th scope="col">Harakat</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                       <tr>
                                                           <td class="ps-4">
                                                               <div class="d-flex align-items-center gap-3">
                                                                   <div class="avatar-image">
                                                                       <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="img-fluid" alt="Customer">
                                                                   </div>
                                                                   <div>
                                                                       <a href="javascript:void(0);">{{$order['orders']['data']['owner']['organizationName'] ?? N/A}}
                                                                       </a>
                                                                   </div>
                                                               </div>
                                                           </td>
                                                           <td>
                                                               <span class="d-block">{{$order['orders']['data']['owner']['isResident'] ?? N/A}}</span>
                                                           </td>
                                                           <td>
                                                               <span class="d-block">{{$order['orders']['data']['owner']['phone'] ?? "N/A"}}</span>
                                                           </td>
                                                           <td>
                                                               <span class="d-inline-block align-middle">
                                                                       <?php
                                                                       $address = $order['orders']['data']['owner']['address'];
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
                                                           <td>
                                                               <span>{{ substr($order['orders']['data']['owner']['birthDate'], 0, 10) ?? 'N/A' }}</span>
           
                                                           </td>
                                                           <td>
                                                               <a href="javascript:void(0);" class="avatar-text avatar-md ms-auto"><i class="feather-arrow-right"></i></a>
                                                           </td>
                                                       </tr>
                                                   </tbody>
                                               </table>
                                               
                                           </div>
                                           </div>
           
           
                                       </div>
                                   </div>


    <div class="mt-3 px-3">    
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
