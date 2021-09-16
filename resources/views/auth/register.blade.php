<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gift Club</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo.png')}}">
    <link href="{{asset('css/bstyle.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
					
					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="/register"><img src="{{asset('images/logo-icon.png')}}" width="100px" height="100px" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                                  
                                    <x-jet-validation-errors class="mb-4 alert alert-primary alert-dismissible fade show" />
                                   
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

                                        <div class="form-group"> 
                                            <label class="mb-1 text-white" for="wallet"> <strong> Do you have a Bitcoin Wallet? A new wallet would be created for you if you do not have an existing wallet. Read more <a href="#"> here </a> </strong></label>
                                            <select class="form-control"> 
                                                <option> Yes </option> 
                                                <option> No </option> 
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
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="/login">Sign in</a></p>
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
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/deznav-init.js')}}"></script>

</body>

</html>