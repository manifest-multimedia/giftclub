  <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/dashboard" class="brand-logo">
                {{-- <img class="logo-abbr" src="{{asset('images/logo.png')}}" alt="">
                <img class="logo-compact" src="{{asset('images/logo-text.png')}}" alt="">
                <img class="brand-title" src="{{asset('images/logo-text.png')}}" alt=""> --}}
				
				<img class="logo-compact" src="{{asset('images/logo.png')}}" alt="">
				<img class="brand-title" src="{{asset('images/logo.png')}}" alt="">

            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                              <a href="{{Route::current()->uri() }}"
                             style="color:022D4D;" class="text-gray-700 hover:text-gray-700">  {{$pagetitle}} </a> <span> Welcome back {{ auth()->user()->name}} </span> 
                               </div>
                            
                        
                        </div>
                        <ul class="navbar-nav header-right">

							{{-- <li class="nav-item">
								<div class="input-group search-area d-xl-inline-flex d-none">
									<input type="text" class="form-control" placeholder="Search here...">
									<div class="input-group-append">
										<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
									</div>
								</div>
							</li> --}}
							



                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="{{auth()->user()->profile_photo_url }}" class="rounded-full h-30 w-30 object-cover" alt="{{auth()->user()->name}}"/>
									 <div class="header-info">
										<span class="text-black"><strong>{{auth()->user()->name}}</strong></span>
										{{-- <p class="fs-12 mb-0">Admin</p> --}}
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('profile') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="/wallet" class="dropdown-item ai-icon">
                                        {{-- <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
										 --}}
										<img id="icon-wallet" src="{{asset('images/wallet.svg')}}" width="18" height="18"/>
										<span class="ml-2">Wallet </span>
                                    </a>


									 <!-- Authentication -->
									 <form method="POST" action="{{ route('logout') }}">
										@csrf
								
                                    <a href="{{ route('logout') }}" class="dropdown-item ai-icon" onclick="event.preventDefault();this.closest('form').submit();">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">{{ __('Log Out') }} </span>
                                    </a>

								</form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->