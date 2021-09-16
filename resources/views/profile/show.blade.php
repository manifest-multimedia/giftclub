<x-b-head />
<x-b-preloader />
<x-b-header> 
    @section('pagetitle', 'Profile') 
</x-b-header>


<div class="content-body"> 
    <div class="container-fluid"> 
            
            <div>
                <div class="col-md-12">
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    <div class="col-md-8"> 
                        @livewire('profile.update-profile-information-form')
                    </div>
                       
        
                    @endif
        
                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="col-md-8">
                            @livewire('profile.update-password-form')
                        </div>
        
                    @endif
        
                    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="col-md-8">
                            @livewire('profile.two-factor-authentication-form')
                        </div>
        
                        
                    @endif
        
                    <div class="col-md-8">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div>
        
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                       
        
                        <div class="col-md-8">
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif
                </div>
            </div>
      
        
        
    </div> 
</div>



<x-b-sidebar />
<x-b-footer /> 