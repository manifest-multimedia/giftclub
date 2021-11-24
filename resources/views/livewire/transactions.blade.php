<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="card-body">
        <div class="table-responsive recentOrderTable">
            <table class="table verticle-middle table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Amount (BTC)</th>
                        <th scope="col">Amount (USD)</th>
                        
                        <th scope="col"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($transactions as $item)
                        
                        <td>2021-06-25 16:12
                        </td>
                        <td>0.08715595 BTC</td>
                        <td>
                            $2,849.56</td>
                        
                        <td>
                            <div class="dropdown custom-dropdown mb-0">
                                <div class="btn sharp btn-primary tp-btn" data-toggle="dropdown">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="12" cy="5" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="19" r="2"></circle></g></svg>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="https://www.blockchain.com/btc/tx/c2396c27a104c4d11325314d66adf0ecc0fc70e8786adde5696b75abb0104ff6" target="_blank">Details</a>
                                    {{-- <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a> --}}
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
