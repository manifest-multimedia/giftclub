<x-auth-layout> 
    <x-slot name='pagetitle'>
       Ooops Session Timedout? Login again!
    </x-slot>

    
    <p class="text-white text-center"> Your Session either Timed Out Due to Inactivity or You do not have authorization to perform this action. Please login again!</p>
        {{-- <div class="form-group">
            <label class="text-white"><strong>Password</strong></label>
            <input type="password" class="form-control" value="Password">
        </div> --}}
        <div class="text-center">
            <a class="btn bg-white text-primary btn-block" href="/login">Login</a>
        </div>
    

    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Email</strong></label>
            <input type="email" class="form-control" placeholder="johnson@example.com" value="" name="email" :value="old('email')" required autofocus >
        </div>
        <div class="form-group">
            <label class="mb-1 text-white"><strong>Password</strong></label>
            <input type="password" class="form-control" type="password" name="password" required autocomplete="current-password" >
        </div>
        <div class="form-row d-flex justify-content-between mt-4 mb-2"> --}}
            {{-- <div class="form-group">
               <div class="custom-control custom-checkbox ml-1 text-white">
                    <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                    <label class="custom-control-label" for="basic_checkbox_1">Remember me</label>
                </div>
            </div> --}}
            {{-- <div class="form-group">

                @if (Route::has('password.request'))
                <a class="text-white" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
                
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
        </div>
    </form>

    <div class="new-account mt-3">
        <p class="text-white">Don't have an account? <a class="text-white" href="/register">Sign up</a></p>
    </div> --}}

</x-auth-layout>
{{-- <x-error-layout>
    <x-slot name="title"> 419 - No Active Session </x-slot>
    <x-slot name="page_title"> 419</x-slot>
    <h4>
        <i class="fa fa-exclamation-triangle text-warning"></i> 
        Authorization Error. Unable to access resource. 
    </h4>
    <p>Your session may have expired or you are not authorized to peform this action.</p>
</x-error-layout> --}}