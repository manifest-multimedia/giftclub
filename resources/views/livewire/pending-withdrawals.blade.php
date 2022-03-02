<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    
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

                        @foreach ($withdrawals as $item)
                      
                        <td>{{$item->created_at}}</td>
                        <td>${{$item->amount}} USD</td>
                        <td>{{getWallet($item->user_id)}}</td>

                        <td>{{ucfirst($item->status)}}</td>
                        
                       <input type="hidden" name="withdrawal_id" value="withdrawal_id">
                        
                        <td>
                            <div class="dropdown custom-dropdown mb-0">
                                <div class="btn sharp btn-primary tp-btn" data-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    {{-- <a class="dropdown-item" href="{{url()->current()}}" target="_self">Refresh</a> --}}
                                    <form action="/processwithdrawal/{{$item->id}}" method="post">
                                    @csrf
                                    @method('post')
                                        <button class="dropdown-item text-danger">Mark As Paid</button>
                                    </form>

                                </div>
                            </div>
                        </td>
                    </tr>
                        @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        {{$withdrawals->links()}}
    </div>

</div>
