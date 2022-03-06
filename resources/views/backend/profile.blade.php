<x-backend-layout>
    <x-slot name='title'> Profile </x-slot>
    <div class="container-fluid"> 
         
        <!-- Row --> 

        <div class="row">
            <div class="col-xl-4">
                <div class="">
                    <div class="card">
                        
                       @livewire('affiliate-details')
                       
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



</x-backend-layout>