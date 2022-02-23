<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="card-body">
        <div class="table-responsive recentOrderTable">
            <table class="table verticle-middle table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Amount (USD)</th>
                        <th scope="col">Wallet</th>
                        <th scope="col">Status</th>
                        
                        <th scope="col"> Action</th>
                    </tr>
                </thead>
                <tbody>
                   

                    <tr>

                        @foreach ($payouts as $item)
                      
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
