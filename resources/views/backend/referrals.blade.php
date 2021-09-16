<x-b-head />
<x-b-preloader />
<x-b-header> 
    @section('pagetitle', 'Referrals') 
    @section('titlelink', '/referrals')
</x-b-header>


<div class="content-body"> 
    <div class="container-fluid"> 
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Referrals</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           
                            <td>Abanga Nsobilla</td>
                         
                            <td>26th June 2020</td>
                            <td><span class="badge light badge-success">Active</span></td>
                            
                        </tr>
                        <tr>
                           
                            <td>Gabriel Abiah</td>
                            <td>30th June 2020</td>
                            <td><span class="badge light badge-danger">Canceled</span></td>
                            
                            
                        </tr>
                        <tr>
                         
                            <td>Mr. Bobby</td>
                            <td>01 August 2020</td>
                            <td><span class="badge light badge-warning">Pending</span></td>
                            
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    </div></div>
<x-b-sidebar />
<x-b-footer /> 