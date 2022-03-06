 <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav" style="display:block;">
            <div class="deznav-scroll">

				{{-- <a href="javascript:void(0)" class="add-menu-sidebar" 
				data-toggle="modal" data-target="#addOrderModalside" >+ New Contract </a> --}}

				<ul class="metismenu" id="menu">
					
					<li>
						<a class="ai-icon" href="https://www.giftclubglobal.com" aria-expanded="false">
							<i class="flaticon-381-home"></i>
							<span class="nav-text">Homepage</span>
						</a>
					</li>					
				
				
					@can('isAdmin')
					<li>
						<a class="ai-icon" href="/admin"> 
							<i class="flaticon-381-settings"></i>
							<span class="nav-text">Admin Area</span></a> 
					</li>
					@endcan

                    <li>
						<a class="has-arrow ai-icon" href="javascript:void()"
						 aria-expanded="true">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="true">
							<li><a href="/dashboard">Dashboard</a></li>

							<li><a href="#" data-toggle="modal" data-target="#addOrderModalside">New Contract</a></li>
							
							<li><a href="/wallet">Wallet</a></li>
						
                            <li><a href="/payouts">Payouts</a></li>
							<li><a href="/transactions">Transactions</a></li>
							<li><a href="/referrals">Referrals</a></li>
							{{-- <li><a href="/settings">Settings</a></li> --}}
							
						</ul>
					<li>
						<a class="ai-icon" href="/settings" aria-expanded="false">
							<i class="flaticon-381-settings"></i>
							<span class="nav-text">Settings</span>
						</a>
					</li>					
	
					<li>
						<a class="ai-icon" href="{{ route('logout') }}" aria-expanded="false" onclick="event.preventDefault();logout()">
							<i class="flaticon-381-exit"></i>
							<span class="nav-text">Log Out</span>
						</a>
							<form method="POST" action="{{ route('logout') }}" id="logout">
								@csrf
							</form> 
					</li>
                    
					
					
					
					
                   
                </ul>

				

				<div class="copyright">
					<p><strong>The Gift Club</strong> © 2021 All Rights Reserved</p>
					{{-- <p>Made with <span class="heart"></span> by Manifest Multimedia</p> --}}
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->