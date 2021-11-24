<x-backend-layout>
    <x-slot name='title'> Settings </x-slot>

    <div class="container-fluid">
<div class="row">
    <div class="col-xl-4"><div class="card"><div class="card-body"><h1>Bio</h1> <hr /> 
    
        <form>
            <span>Address</span>
            <div class="form-row pt-3">
                
                <div class="form-group col-md-6">
                    
                    <input type="text" class="form-control" placeholder="Address Line 1", value="@if(!is_null($address)){{$address->Address_Line_One}}@endif">
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
                    
                    <input type="text" class="form-control" placeholder="ZIP/Postal" value="@if(!is_null($address)) {{__("$address->postal")}}@endif">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

    </div></div></div>
    <div class="col-xl-4"><div class="card"><div class="card-body"><h1>Finance</h1><hr />
    
    </div></div></div>
    <div class="col-xl-4"><div class="card"><div class="card-body"><h1>Preferences</h1><hr />
    
    
    
    </div></div></div>

</div>
    
    </div>

</x-backend-layout>