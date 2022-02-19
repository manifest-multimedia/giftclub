<x-auth-layout> 
<x-slot name='pagetitle'> Sign Up for Your Account</x-slot>
<form method="POST" action="{{ route('register') }}">
                                        
    @csrf

    <div class="form-group">
        <label class="mb-1 text-white" for="name"><strong>Name</strong></label>
        <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="" required autofocus autocomplete="name">
    </div>

    <div class="form-group">
        <label class="mb-1 text-white" for="email"><strong>Email</strong></label>
        <input type="email" id="email" class="form-control" placeholder="hello@example.com" value="" name="email" required >
    </div>
    
    <!-- Referral --> 
    <div class="form-group">
        <label class="mb-1 text-white" for="referred_by"><strong>Referred By</strong></label>
        <input id="referred_by" type="text" class="form-control" placeholder="Referral Code" 
        value="{{validateReferralCode($ref=request()->get('ref'))}}" 
        name="referred_by" 
        required />
    </div>
    <!-- Wallet --> 
    <div class="form-group"> 
        <label class="mb-1 text-white" for="wallet"> 
             Do you have a Bitcoin Wallet? A new wallet would be created for you if you do not have an existing wallet. 
                Read more <a href="https://giftclubglobal.com/terms-and-conditions/"> here.</a> </label>
        <select class="form-control" name="wallet"> 
            <option value="yes"> Yes </option> 
            <option value="no"> No </option> 
        </select>
    </div>
    
    <div class="form-group">
        <label class="mb-1 text-white" for="password"><strong>Password</strong></label>
        <input type="password" class="form-control" placeholder="Password" value="" name="password" required autocomplete="new-password">
    </div>

    <div class="form-group">
        <label class="mb-1 text-white" for="password_confirmation"><strong>Confirm Password</strong></label>
        <input type="password" class="form-control" placeholder="Confirm Password" value="" name="password_confirmation" required autocomplete="new-password">
    </div>
    
    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
    <div class="mt-4">
        <x-jet-label for="terms">
            <div class="flex items-center">
                <x-jet-checkbox name="terms" id="terms"/>

                <div class="ml-2">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                    ]) !!}
                </div>
            </div>
        </x-jet-label>
    </div>
@endif

    <div class="text-center mt-4">
        <button type="submit" class="btn bg-white text-primary btn-block">Register</button>
    </div>
</form>
</x-auth-layout>
