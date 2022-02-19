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

                    <li>
						<a class="has-arrow ai-icon" href="javascript:void()"
						 aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="true">
							<li><a href="/dashboard">Dashboard</a></li>

							<li><a href="#" data-toggle="modal" data-target="#addOrderModalside">New Contract</a></li>
							
							<li><a href="/wallet">Wallet</a></li>

                            {{-- <li><a href="/exchange">Exchange</a></li> --}}
							<li><a href="/transactions">Transactions</a></li>
							<li><a href="/referrals">Referrals</a></li>
							<li><a href="/settings">Settings</a></li>
							
						</ul>
						<li>
							<form method="POST" action="{{ route('logout') }}" style="padding:0; margin:0;">
								@csrf
								<a class="ai-icon" href="{{ route('logout') }}" aria-expanded="false" onclick="event.preventDefault();this.closest('form').submit();">
									<i class="flaticon-381-exit"></i>
									<span class="nav-text">Log Out</span>
								</a>
							</form> 
						</li>
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