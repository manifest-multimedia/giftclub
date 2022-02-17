<x-backend-layout>
    <x-slot name='title'> Dashboard </x-slot>

    <!--**********************************
            Content body start
        ***********************************-->
        
			<div class="container-fluid">
                
                <div class="col-12">
                    <div class="row">	

                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-end">
                                        <div>
                                            <p class="fs-14 mb-1"><a href="/referrals">Referrals</a></p>
                                            <span class="fs-35 text-black font-w600">{{referrals('count')}}
                                                <div class="hidden" id="referrals">{{referrals('count')}}</div>
                                                <svg class="ml-1" width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.00401 11.1924C0.222201 11.1924 -0.670134 9.0381 0.589795 7.77817L7.78218 0.585786C8.56323 -0.195262 9.82956 -0.195262 10.6106 0.585786L17.803 7.77817C19.0629 9.0381 18.1706 11.1924 16.3888 11.1924H2.00401Z" fill="#33C25B"/>
                                                </svg>
                                            </span>
                                        </div>
                                        <canvas class="lineChart" id="chart_widget_2" height="85"></canvas>
                                    </div>
                                </div>
                            </div>										
                        </div>

                        {{-- <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="fs-14 mb-1">Position</p>
                                            <span class="fs-35 text-black font-w600">0
                                                <svg class="ml-1" width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.00401 11.1924C0.222201 11.1924 -0.670134 9.0381 0.589795 7.77817L7.78218 0.585786C8.56323 -0.195262 9.82956 -0.195262 10.6106 0.585786L17.803 7.77817C19.0629 9.0381 18.1706 11.1924 16.3888 11.1924H2.00401Z" fill="#33C25B"/>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="d-inline-block ml-auto position-relative donut-chart-sale">
                                            <span class="donut" data-peity='{ "fill": ["rgb(254, 99, 78)", "rgba(244, 244, 244, 1)"],   "innerRadius": 31, "radius": 10}'>0/8</span>
                                            <small class="text-secondary">0%</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="fs-14 mb-1">Referrals Earnings</p>
                                            <span class="fs-35 text-black font-w600">{{points()}}
                                                <svg class="ml-1" width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.00401 11.1924C0.222201 11.1924 -0.670134 9.0381 0.589795 7.77817L7.78218 0.585786C8.56323 -0.195262 9.82956 -0.195262 10.6106 0.585786L17.803 7.77817C19.0629 9.0381 18.1706 11.1924 16.3888 11.1924H2.00401Z" fill="#33C25B"/>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="d-inline-block ml-auto position-relative donut-chart-sale">
                                            <span class="donut" data-peity='{ "fill": ["rgb(254, 99, 78)", "rgba(244, 244, 244, 1)"],   "innerRadius": 31, "radius": 10}'>{{points()}}/100</span>
                                            <small class="text-secondary">${{points()}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span class="mr-4">
                                            <svg width="50" height="53" viewBox="0 0 50 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="7.11688" height="52.1905" rx="3.55844" transform="matrix(-1 0 0 1 49.8184 0)" fill="#FE634E"></rect>
                                                <rect width="7.11688" height="37.9567" rx="3.55844" transform="matrix(-1 0 0 1 35.585 14.2338)" fill="#FE634E"></rect>
                                                <rect width="7.11688" height="16.6061" rx="3.55844" transform="matrix(-1 0 0 1 21.3516 35.5844)" fill="#FE634E"></rect>
                                                <rect width="8.0293" height="32.1172" rx="4.01465" transform="matrix(-1 0 0 1 8.0293 20.0732)" fill="#FE634E"></rect>
                                            </svg>
                                        </span>
                                        <div class="media-body ml-1">
                                            <p class="mb-2">Referral Earnings</p>
                                            <h3 class="mb-0 text-black font-w600" >${{referrals('earnings')}}</h3>
                                            <div class="hidden" id="referallearnings"> </div>
                                            <div style="float:right;">
                                                <a class="btn btn-primary" href="/bonus-withdrawal"> Withdraw </a>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span class="mr-4">
                                            <svg width="50" height="53" viewBox="0 0 50 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="7.11688" height="52.1905" rx="3.55844" transform="matrix(-1 0 0 1 49.8184 0)" fill="#FE634E"></rect>
                                                <rect width="7.11688" height="37.9567" rx="3.55844" transform="matrix(-1 0 0 1 35.585 14.2338)" fill="#FE634E"></rect>
                                                <rect width="7.11688" height="16.6061" rx="3.55844" transform="matrix(-1 0 0 1 21.3516 35.5844)" fill="#FE634E"></rect>
                                                <rect width="8.0293" height="32.1172" rx="4.01465" transform="matrix(-1 0 0 1 8.0293 20.0732)" fill="#FE634E"></rect>
                                            </svg>
                                        </span>
                                        <div class="media-body ml-1">
                                            <p class="mb-2">USD Earnings</p>
                                            <h3 class="mb-0 text-black font-w600" >${{earnings(Auth::user()->id)}}</h3>
                                            <div class="hidden" id="earnings">{{earnings(Auth::user()->id)}} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span class="mr-4">
                                            <svg width="50" height="53" viewBox="0 0 50 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="7.11688" height="52.1905" rx="3.55844" transform="matrix(-1 0 0 1 49.8184 0)" fill="#FE634E"></rect>
                                                <rect width="7.11688" height="37.9567" rx="3.55844" transform="matrix(-1 0 0 1 35.585 14.2338)" fill="#FE634E"></rect>
                                                <rect width="7.11688" height="16.6061" rx="3.55844" transform="matrix(-1 0 0 1 21.3516 35.5844)" fill="#FE634E"></rect>
                                                <rect width="8.0293" height="32.1172" rx="4.01465" transform="matrix(-1 0 0 1 8.0293 20.0732)" fill="#FE634E"></rect>
                                            </svg>
                                        </span>
                                        <div class="media-body ml-1">
                                            <p class="mb-2">BTC Earnings</p>
                                            <h3 class="mb-0 text-black font-w600">$0</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span class="mr-4">
                                            <svg width="50" height="53" viewBox="0 0 50 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="7.11688" height="52.1905" rx="3.55844" transform="matrix(-1 0 0 1 49.8184 0)" fill="#FE634E"></rect>
                                                <rect width="7.11688" height="37.9567" rx="3.55844" transform="matrix(-1 0 0 1 35.585 14.2338)" fill="#FE634E"></rect>
                                                <rect width="7.11688" height="16.6061" rx="3.55844" transform="matrix(-1 0 0 1 21.3516 35.5844)" fill="#FE634E"></rect>
                                                <rect width="8.0293" height="32.1172" rx="4.01465" transform="matrix(-1 0 0 1 8.0293 20.0732)" fill="#FE634E"></rect>
                                            </svg>
                                        </span>
                                        <div class="media-body ml-1">
                                            <p class="mb-2"><a href="/transactions">Total Invested</a></p>
                                            <h3 class="mb-0 text-black font-w600">${{totalinvested(Auth::user()->id)}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
                            <div class="card">
                                <div class="card-body text-center ai-icon  text-primary">
                                    <svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                    </svg>
                                    <h4 class="my-2">You haven't earned any points yet</h4>
                                    <a href="javascript:void(0);" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> How to Earn Points</a>
                                </div>
                            </div>
                        </div> --}}
                                        
                        
                    </div>
                </div>

        </div>

        


<!--**********************************
Content body end
***********************************-->

</x-backend-layout>