<x-b-head />
<x-b-preloader />
<x-b-header> 
    @section('pagetitle', 'Profile') 
    @section('titlelink', '/profile')
        
   
</x-b-header>



<div class="content-body"> 
    <div class="container-fluid"> 
         
        <!-- Row --> 

        <div class="row">
            <div class="col-xl-4">
                <div class="">
                    <div class="card">
                        
                        <div class="card-body">
                            <h3 class="card-title"> Referral Link: </h3>
                           @php
                               $user = auth()->user();
                           @endphp 

                           <a href="{{ $user->getReferralLink() }}" class="text-gray-700 hover:text-gray-400"> {{ $user->getReferralLink() }} </a> 

                           <h3 class="card-title mt-3"> Referral Code:</h3>
                           
                           <div class="d-flex">
                           <input type="text" value="{{$user->affiliate_id}}" id="code" class="form-control" readonly />
                           <button class="btn btn-primary ml-3" value="copy" onclick="copyToClipboard('code')"> Copy </button> 
                           </div>
                           <h3 class="card-title mt-3"> Referred By:</h3>
                           {{ $user->referred_by }}

                            {{-- <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link active show">Account</a>
                                    </li>
                                    <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">Security</a>
                                    </li>
                                   
                                </ul>
                            </div> --}}
                        </div>
                     
                       
                    </div>
                </div>
            </div>


            <div class="col-xl-8">
                
                           
                                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                <div class="col-md-12"> 
                                    @livewire('profile.update-profile-information-form')
                                </div>
                                   
                    
                                @endif
                    
                                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                    <div class="col-md-12">
                                        @livewire('profile.update-password-form')
                                    </div>
                    
                                @endif
                    
                                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                                    <div class="col-md-12">
                                        @livewire('profile.two-factor-authentication-form')
                                    </div>
                    
                                    
                                @endif
                    
                                <div class="col-md-12">
                                    @livewire('profile.logout-other-browser-sessions-form')
                                </div>
                    
                                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                   
                    
                                    <div class="col-md-12">
                                        @livewire('profile.delete-user-form')
                                    </div>
                                @endif
      
                      
                    
                </div>
            </div>



        </div>
            
</div>
</div>



<x-b-sidebar />

<script>
    function copyToClipboard(id) {
        document.getElementById(id).select();
        document.execCommand('copy');
    }

    // function copyToClipboard(id) {
    //     document.getElementById(id).execCommand('copy');
    // }

</script>

<x-b-footer /> 