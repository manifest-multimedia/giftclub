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
                                            <p class="fs-14 mb-1">Referrals</p>
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

                        <div class="col-xl-4 col-xxl-6 col-lg-4 col-sm-6">
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
                        </div>
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
                                            <h3 class="mb-0 text-black font-w600" >$</h3>
                                            <div class="hidden" id="referallearnings"> </div>
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
                                            <p class="mb-2">Total Invested</p>
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
                                        
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header border-0 pb-sm-0 pb-5">
                                    <h4 class="fs-20">Announcements </h4> <br /> 
                                    {{-- <div class="dropdown custom-dropdown mb-0">
                                        

                                        <div data-toggle="dropdown">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 12.9999C12.5523 12.9999 13 12.5522 13 11.9999C13 11.4477 12.5523 10.9999 12 10.9999C11.4477 10.9999 11 11.4477 11 11.9999C11 12.5522 11.4477 12.9999 12 12.9999Z" stroke="#7E7E7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 5.99994C12.5523 5.99994 13 5.55222 13 4.99994C13 4.44765 12.5523 3.99994 12 3.99994C11.4477 3.99994 11 4.44765 11 4.99994C11 5.55222 11.4477 5.99994 12 5.99994Z" stroke="#7E7E7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M12 19.9999C12.5523 19.9999 13 19.5522 13 18.9999C13 18.4477 12.5523 17.9999 12 17.9999C11.4477 17.9999 11 18.4477 11 18.9999C11 19.5522 11.4477 19.9999 12 19.9999Z" stroke="#7E7E7E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                        </div>
                                        
                                    </div> --}}
                                </div>
                                <div class="card-body">

                                    {{-- BTC Rate: {{btcRates()}} <br />
                                    {{ bitpay() }}
                                     --}}

                                    <div class="event-bx owl-carousel">
                                        <div class="items">
                                            <div class="image-bx">
                                                <img src="images/events/1.png" alt="">
                                                <div class="info">
                                                    <p class="fs-18 font-w600"><a href="event-detail.html" class="text-black">International Live Choice Festivals (2020)</a></p>
                                                    <span class="fs-14 text-black d-block mb-3">Manchester, London</span>
                                                    <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
                                                    <ul>
                                                        <li><i class="las la-dollar-sign"></i>$124,00</li>
                                                        <li><i class="las la-calendar"></i>June 20, 2020</li>
                                                        <li><i class="fa fa-ticket"></i>561 pcs</li>
                                                        <li><i class="las la-clock"></i>08:35 AM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="items">
                                            <div class="image-bx">
                                                <img src="images/events/3.png" alt="">
                                                <div class="info">
                                                    <p class="fs-18 font-w600"><a href="event-detail.html" class="text-black">Envato Atuhor Community Fun Hiking at Sibayak Mt.</a></p>
                                                    <span class="fs-14 text-black d-block mb-3">London, United Kingdom</span>
                                                    <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
                                                    <ul>
                                                        <li><i class="las la-dollar-sign"></i>$124,00</li>
                                                        <li><i class="las la-calendar"></i>June 20, 2020</li>
                                                        <li><i class="fa fa-ticket"></i>561 pcs</li>
                                                        <li><i class="las la-clock"></i>08:35 AM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="items">
                                            <div class="image-bx">
                                                <img src="images/events/1.png" alt="">
                                                <div class="info">
                                                    <p class="fs-18 font-w600"><a href="event-detail.html" class="text-black">International Live Choice Festivals (2020)</a></p>
                                                    <span class="fs-14 text-black d-block mb-3">Manchester, London</span>
                                                    <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
                                                    <ul>
                                                        <li><i class="las la-dollar-sign"></i>$124,00</li>
                                                        <li><i class="las la-calendar"></i>June 20, 2020</li>
                                                        <li><i class="fa fa-ticket"></i>561 pcs</li>
                                                        <li><i class="las la-clock"></i>08:35 AM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="items">
                                            <div class="image-bx">
                                                <img src="images/events/2.png" alt="">
                                                <div class="info">
                                                    <p class="fs-18 font-w600"><a href="event-detail.html" class="text-black">Envato Indonesian Authors Meetup 2020</a></p>
                                                    <span class="fs-14 text-black d-block mb-3">Medan, Indonesia</span>
                                                    <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
                                                    <ul>
                                                        <li><i class="las la-dollar-sign"></i>$124,00</li>
                                                        <li><i class="las la-calendar"></i>June 20, 2020</li>
                                                        <li><i class="fa fa-ticket"></i>561 pcs</li>
                                                        <li><i class="las la-clock"></i>08:35 AM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="items">
                                            <div class="image-bx">
                                                <img src="images/events/3.png" alt="">
                                                <div class="info">
                                                    <p class="fs-18 font-w600"><a href="event-detail.html" class="text-black">Envato Atuhor Community Fun Hiking at Sibayak Mt.</a></p>
                                                    <span class="fs-14 text-black d-block mb-3">London, United Kingdom</span>
                                                    <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini</p>
                                                    <ul>
                                                        <li><i class="las la-dollar-sign"></i>$124,00</li>
                                                        <li><i class="las la-calendar"></i>June 20, 2020</li>
                                                        <li><i class="fa fa-ticket"></i>561 pcs</li>
                                                        <li><i class="las la-clock"></i>08:35 AM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>

        


<!--**********************************
Content body end
***********************************-->

</x-backend-layout>