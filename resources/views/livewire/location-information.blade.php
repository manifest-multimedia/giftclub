   {{-- The best athlete wants his opponent at his best. --}}
<div class="card-body">
    <h1>Bio </h1> 
    <hr /> 
    <x-success-messages />             
        @if ($update===1)
            <span>Address</span>
            <input type="hidden" wire:model="address_line_one">
        <div class="form-row pt-3">
            <div class="form-group col-md-6">
                <input type="text" wire:model="address_line_one" placeholder="Address Line 1" name="address_line_one" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" placeholder="Address Line 2" wire:model="address_line_two">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" placeholder="City" wire:model="address_city">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" placeholder="Country" wire:model="address_country">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <input type="text" class="form-control" placeholder="ZIP/Postal" wire:model="address_zip">
            </div>
        </div>
        
        <button class="btn btn-primary" wire:click="save">Save Changes</button>
        
        @else
        
        <span>Address</span>
    <div class="form-row pt-3">
        <div class="form-group col-md-6">
            <input type="text" class="form-control" placeholder="Address Line 1" value="@if(!is_null($address)){{$address->Address_Line_One}}@endif">
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" placeholder="Address Line 2" value="@if(!is_null($address)){{$address->Address_Line_Two}}@endif">
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" placeholder="City" value="@if(!is_null($address)){{$address->city}}@endif">
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" placeholder="Country" value="@if(!is_null($address)){{$address->country}}@endif">
        </div>
    </div>
<div class="form-row">
    <div class="form-group col-md-4">
        <input type="text" class="form-control" placeholder="ZIP/Postal" value="@if(!is_null($address)){{$address->zip}}@endif">
    </div>
</div>

<button class="btn btn-primary" wire:click="update">Update</button>

@endif

</div> 