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
        @livewire('referrals-table')
    </div>
</div>

    </div></div>
<x-b-sidebar />
<x-b-footer /> 