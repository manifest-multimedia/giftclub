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
                    
                    <input type="text" class="form-control" placeholder="Address Line 1">
                </div>
                <div class="form-group col-md-6">
                   
                    <input type="text" class="form-control" placeholder="Address Line 2">
                </div>
                <div class="form-group col-md-6">
                    
                    <input type="text" class="form-control" placeholder="City">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Country">
                </div>
            </div>
            <div class="form-row">
                
                <div class="form-group col-md-4">
                    
                    <input type="text" class="form-control" placeholder="ZIP/Postal">
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