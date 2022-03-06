<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="card-body">
        <h3 class="card-title"> Referral Link: </h3>
  
        <a href="{{ $user->getReferralLink() }}" class="text-gray-700 hover:text-gray-400"> {{ $user->getReferralLink() }} </a> 

        <h3 class="card-title mt-3"> Referral Code:</h3>
       
       <div 
       x-data="{show:false}"
       x-show.transition.opacity.out.duration.1500ms="show"
       x-init="@this.on('copied', ()=>{show=true; setTimeout(()=>{show=false}, 2000) })"
       style="display:none; text-align:center"
       class="alert alert-success"
       > 
            Copied Referral Code  </div> 

       <div class="d-flex">
       <input type="text" value="{{$user->affiliate_id}}" id="code" class="form-control" readonly />
       <button class="btn btn-primary ml-3" value="copy" onclick="copyToClipboard('code')" wire:click="copy"> Copy </button> 
       </div>
       <h3 class="card-title mt-3"> Referred By:</h3>
       {{ $user->referred_by }}
       
    </div>
</div>
