<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-lg mb-0 table-striped">
                        <thead>
                            <tr>
                                <th class="">
                                    <div class="custom-control custom-checkbox mx-2">
                                        <input type="checkbox" class="custom-control-input" id="checkAll">
                                        <label class="custom-control-label" for="checkAll"></label>
                                    </div>
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="pl-5 width200">Linked Wallet
                                </th>
                                <th>Date Registered</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="customers">
                            <tr class="btn-reveal-trigger">
                                <td>
                                    <div class="custom-control custom-checkbox mx-2">
                                        <input type="checkbox" class="custom-control-input" id="checkbox1">
                                        <label class="custom-control-label" for="checkbox1"></label>
                                    </div>
                                </td>
                                <td class="py-3">
                                    <a href="#">
                                        <div class="media d-flex align-items-center">
                                            <div class="avatar avatar-xl mr-2">
                                                <div class=""><img class="rounded-circle img-fluid" src="./images/avatar/5.png" width="30" alt="">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h5 class="mb-0 fs--1">Ricky Antony</h5>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td class="py-2"><a href="mailto:ricky@example.com">info@example.com</a></td>
                                <td class="py-2"> <a href="tel:2012001851">(201) 200-1851</a></td>
                                <td class="py-2 pl-5 wspace-no">2392 Main Avenue, Penasauka</td>
                                <td class="py-2">30/03/2018</td>
                                <td class="py-2 text-right">
                                    <div class="dropdown"><button class="btn btn-primary tp-btn-light sharp" type="button" data-toggle="dropdown"><span class="fs--1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                        <div class="dropdown-menu dropdown-menu-right border py-0">
                                            <div class="py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="btn-reveal-trigger">
                                <td class="py-2">
                                    <div class="custom-control custom-checkbox mx-2">
                                        <input type="checkbox" class="custom-control-input" id="checkbox2">
                                        <label class="custom-control-label" for="checkbox2"></label>
                                    </div>
                                </td>
                               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




    <div class="card-body">
        <div class="table-responsive recentOrderTable">
            <table class="table verticle-middle table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Amount (USD)</th>
                        
                        <th scope="col"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        

                        @foreach ($users as $item)
                      
                        <td>{{$item->created_at}}</td>

                        @php
                        
                        $payment_status=getPaymentStatus($item->payment_id); 
                        $payment_status=json_decode($payment_status); 
                        $pay_status='';
                        if(isset($payment_status->payment_status)){

                            $pay_status=$payment_status->payment_status; 
                        }
                        else {
                            
                                $pay_status=$payment_status->message;  
                        }

                        @endphp

                        <td>{{ucfirst($pay_status)}}</td>
                        <td>${{$item->amount}} USD</td>
                        
                        <td>
                            <div class="dropdown custom-dropdown mb-0">
                                <div class="btn sharp btn-primary tp-btn" data-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{url()->current()}}" target="_self">Refresh</a>
                                    {{-- <a class="dropdown-item text-danger" href="">Remove</a> --}}
                                </div>
                            </div>
                        </td>
                    </tr>
                        @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>


</div>
