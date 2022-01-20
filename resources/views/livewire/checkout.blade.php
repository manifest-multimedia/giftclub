<div>
    <x-backend-layout> 
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
        <x-slot name='title'> Checkout </x-slot>
        <div class="container-fluid" wire:ignore.self>
        <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Order Information</span>
                                {{-- <span class="badgephp badge-primary badge-pill text-white">3</span> --}}
                            </h4>
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">
                                            {{$selectedProduct->name}}
                                        </h6>
                                        <small class="text-muted">
                                            {{$selectedProduct->description}}
                                        </small>
                                    </div>
                                    <span class="text-muted">
                                        ${{$selectedProduct->cost}}USD
                                    </span>
                                </li>
                               
                              
                                {{-- <li class="list-group-item d-flex justify-content-between active">
                                    <div class="text-white">
                                        <h6 class="my-0 text-white">Promo code</h6>
                                        <small>EXAMPLECODE</small>
                                    </div>
                                    <span class="text-white">-$5</span>
                                </li> --}}
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (USD)</span>
                                    <strong>
                                        ${{$selectedProduct->cost}}USD
                                    </strong>
                                </li>
                            </ul>
        
                            {{-- <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Coupon">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Apply Discount</button>
                                    </div>
                                </div>
                            </form> --}}
                        </div>
                        <div class="col-lg-8 col-md-7 order-md-1">
                            <h4 class="mb-3">Make Payment</h4>
                            <form class="needs-validation" novalidate=""
                            
                            action="{{url('payment-complete')}}" method="post">
                                @csrf
                                @method('post')
                                <hr class="mb-4">
        
                                {{-- Card Payments  --}}
                                {{-- <div x-data="{{($paymentMethod==='card') ? "{method:1}":"{card:crypto}"}}">  --}}
                                    {{-- <div x-data="{{($paymentMethod==='card') ? "{method:1}":"" }}">  --}}
                                        
                            <div x-data="{{checkmethod($paymentMethod)}}"> 

                                <h4 class="mb-3">Payment Method</h4>
                                
                                <div class="d-block my-3" >
                                    {{-- <div class="custom-control custom-radio mb-2" wire:ignore.self >
                                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" required="" value='card' {{($paymentMethod==='card') ? 'checked=""':''}}
                                        @click="method=1">
                                        <label class="custom-control-label" for="credit">Pay with Card</label>
                                    </div> --}}
                                    {{-- <div class="custom-control custom-radio mb-2">
                                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                        <label class="custom-control-label" for="debit">Debit card</label>
                                    </div> --}}
                                    {{-- <div class="custom-control custom-radio mb-2">
                                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                                        <label class="custom-control-label" for="paypal">Paypal</label>
                                    </div> --}}
                                    <div class="custom-control custom-radio mb-2">
                                        <input id="crypto" name="paymentMethod" type="radio" class="custom-control-input" required="" value="crypto" {{($paymentMethod==='crypto') ? 'checked=""':''}}
                                        
                                        @click="method=2">
                                        <label class="custom-control-label" for="crypto">Pay with Crypto</label>
                                    </div>
                                    <hr />
                                </div>

                                
                                    <div class="row" x-show="method===1">
                                       <div class="col-md-12">
                                           <h4> Card Details </h4>
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="cc-name">Name on card</label>
                                            <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                            <small class="text-muted">Full name as displayed on card</small>
                                            <div class="invalid-feedback">
                                                Name on card is required
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="cc-number">Credit card number</label>
                                            <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                            <div class="invalid-feedback">
                                                Credit card number is required
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Card --}}
                                    <div class="row" x-show="method===1">
                                        <div class="col-md-4 mb-3">
                                            <label for="cc-expiration">Expiration Month</label>
                                            {{-- <input type="text" class="form-control" id="cc-expiration" placeholder="" required=""> --}}
                                            <select name="expiration" id="expiration" class="form-control">
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Expiration month required
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="cc-expiration">Expiration Year</label>
                                            {{-- <input type="text" class="form-control" id="cc-expiration" placeholder="" required=""> --}}
                                            <select name="expiration" id="expiration" class="form-control">
                                                <option value="2021">2021</option>
                                                <option value="2021">2022</option>
                                                <option value="2021">2023</option>
                                                <option value="2021">2024</option>
                                                <option value="2021">2025</option>
                                                <option value="2021">2026</option>
                                                <option value="2021">2027</option>
                                                <option value="2021">2028</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Expiration year required
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="cc-expiration">CVV</label>
                                            <input type="password" class="form-control" id="cc-cvv" placeholder="" required="">
                                            <div class="invalid-feedback">
                                                Security code required
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Crypto --}}
                                    <div x-show="method===2" class="row">
                                   <div class="col-md-12">
                                       <h4> Crypto </h4>
                                       <p> Do not Refresh Page Until Payment you have successfully sent the payment to the address below: </p>
                                    </div>
                                    
                                    @php 
                                       $response=json_decode($paymentResponse);
                                       if(isset($response->purchase_id))
                                       {
                                           $purchase_id=$response->purchase_id;

                                           $payment_id=$response->payment_id; 
    
                                           $order_id=$response->order_id;
                                       }
               
                                       @endphp

                                    <div class="col-md-12" style="text-align:center !important">
                                          <label for="payment_address"><strong> Send Payment to </strong></label> 
                                          <input type="text" value="{{$response->pay_address}}" class="form-control" style="text-align:center">
                                   </div>
                                    <div class="col-md-12" style="text-align:center !important; padding-top:30px" >
                                          <label for="payment_address"><strong> Amount to Send </strong></label> <input type="text" 
                                          value=" {{$response->pay_amount}}" class="form-control" style="text-align:center">
                                   </div>
                                   
                                   
                                                <div class="col-md-12" style="padding-top:30px; text-align:center">
                                                    Payment Status:
                                                   {{ucfirst($response->payment_status)}}
                                                </div>

                                                <input type="hidden" name="product_id" value="{{$selectedProductID}}">
                                                <input type="hidden" name="payment_id" value="{{$payment_id}}">
                                                <input type="hidden" name="purchase_id" value="{{$purchase_id}}">
                                                <input type="hidden" name="product_name" value="{{$selectedProduct->name}}">
                                                <input type="hidden" name="product_description" value="{{$selectedProduct->description}}">
                                                <input type="hidden" name="amount" value="{{$selectedProduct->cost}}">

                                                
                                    </div>
                                    {{-- Other--}}
                                    <div x-show="method===3">
                                        Other
                                    </div>

                            </div>

                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Complete Payment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    
    </x-backend-layout>
    
</div>
