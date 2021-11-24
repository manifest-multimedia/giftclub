<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card-body">
        <h3 class="card-title"> Linked Wallets: </h3>  
        <x-validation-errors />
        <x-success-messages />   
       <div> <span> BTC </span> 
        @if ($updateAddress===false)
            
        <a href="#" class="text-gray-700 hover:text-gray-400"> 
            {{$walletAddress}} 
        </a> 
        <hr /> 
        <a class="btn btn-primary" wire:click="update"> Update Wallet </a></div> 

        @else 
            <input type="text" wire:model="walletAddress" name="wallet" class="form-control">
            <hr /> 
            <a class="btn btn-primary" wire:click="save"> Save Changes</a></div> 
        @endif
       
        
        
    </div>

</div>
