<x-backend-layout>
    <x-slot name='title'> Exchange </x-slot>
    <div class="container-fluid">


        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title"> Trade </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6" style="padding-bottom: 20px;">
                             <label for="currency">Currency</label>
                             <select name="currency" id="currency" class="filter-option form-control">
                                 <option value="btc" class="filter-option-inner-inner"> BTC </option>
                                 <option value="eth" class="filter-option-inner-inner"> ETH </option>
                             </select>
     
                            </div> 
                            <div class="col-md-6" style="padding-bottom: 20px;">
                                <label for="amount">Purchase Amount USD</label>
                                <input type="text" placeholder="Amount to Buy" id="amount" class="form-control">   
                            </div>
                            <div class="col-md-6" style="padding-bottom: 20px;">
                                <label for="receive">
                                    Receive 
                                </label>
                                <input type="text" class="form-control" placeholder="Amount You Receive" id="receive">
                            </div>

                            <div class="col-md-6" style="padding-bottom: 20px;">
                                <a href="{{route('pay', 1)}}" class="btn btn-primary" style="margin-top:30px"> Buy Crypto</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0 pb-0 d-sm-flex d-block">
                <h4 class="card-title mb-1">Recent Purchases</h4>
                
            </div>
            
            @livewire('transactions')
                {{-- <div class="align-items-center row mx-0 border-bottom p-4">
                    <span class="number col-2 col-sm-1 px-0 align-self-center">ID</span>
                    <div class="border border-primary rounded-circle p-3 mr-3">
                       BTC
                    </div>
                    <div class="col-sm-4 col-12 col-xxl-5 my-3 my-sm-0 px-0">
                        <h5 class="mt-0 mb-0"><a class="text-black" href="event.html">[LIVE] Football Charity Event 2020</a></h5>
                    </div>
                    <div class="ml-sm-auto col-2 col-sm-2 px-0 d-flex align-self-center align-items-center">
                        <div class="text-center">
                            <h4 class="mb-0 text-black">Status</h4>
                            <span class="fs-14">Success</span>
                        </div>
                    </div>
                    <div class="mr-3 col-2 col-sm-1">
                        <span class="peity-success" data-style="width:100%;" style="display: none;">0,2,1,4</span>
                        <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="3.71426" height="27" rx="1.85713" transform="matrix(-1 0 0 1 26 0)" fill="#FE634E"></rect>
                            <rect width="3.71426" height="19.6364" rx="1.85713" transform="matrix(-1 0 0 1 18.5723 7.36365)" fill="#FE634E"></rect>
                            <rect width="3.71426" height="8.59091" rx="1.85713" transform="matrix(-1 0 0 1 11.1436 18.4091)" fill="#FE634E"></rect>
                            <rect width="4.19045" height="16.6154" rx="2.09522" transform="matrix(-1 0 0 1 4.19043 10.3846)" fill="#FE634E"></rect>
                        </svg>
                    </div>
                    <svg width="22" height="11" class="col-sm-1 col-2" viewBox="0 0 22 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 11L11 -4.72849e-07L22 11" fill="#21B830"></path>
                    </svg>
                </div> --}}

            </div>
        </div>
    </div>
</div> 
   
</x-backend-layout>