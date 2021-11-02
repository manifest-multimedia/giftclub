<x-b-head />
<x-b-preloader />
<x-b-header> 
    @section('pagetitle', 'Settings') 
    @section('titlelink', '/settings')
</x-b-header>
<div class="content-body">
    <div class="container-fluid">
<div class="row">
    <div class="col-xl-4"><div class="card"><div class="card-body"><h1>Bio</h1> <hr /> 
    
        <form>
            <span>Address</span>
            <div class="form-row pt-3">
                
                <div class="form-group col-md-6">
                    
                    <input type="text" class="form-control" placeholder="Address Line 1", value="{{$address->Address_Line_One}}">
                </div>
                <div class="form-group col-md-6">
                   
                    <input type="text" class="form-control" placeholder="Address Line 2" value="{{$address->Address_Line_Two}}">
                </div>
                <div class="form-group col-md-6">
                    
                    <input type="text" class="form-control" placeholder="City" value="{{$address->city}}">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Country" value="{{$address->country}}">
                </div>
            </div>
            <div class="form-row">
                
                <div class="form-group col-md-4">
                    
                    <input type="text" class="form-control" placeholder="ZIP/Postal" value="">
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
</div>

<x-b-sidebar />
<x-b-footer /> 