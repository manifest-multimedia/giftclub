<x-backend-layout>
    <x-slot name='title'> Dashboard </x-slot>

    <!--**********************************
            Content body start
        ***********************************-->
        
			<div class="container-fluid">
                
                <div class="col-12">
                    <div class="card" style="background:#022D4D">
                        <div class="card-body">
                            <div class="media align-items-center">
                                
                                <div class="media-body ml-1 align-items-center">
                                    <p class="mb-2 text-center text-white">Howdy, {{getFirstName(Auth::user()->name)}}!</p>
                                    <h3 class="mb-0 text-white font-w600 text-center"> 
                                        <span style="font-size:40px"> 
                                        Welcome to the Admin Area
                                        </span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Users</h4>
                        </div>
                        <div class="card-body">
                            <div class="chart-point">
                                {{ $chart->options['chart_title'] }}
                                {!! $chart->renderHtml() !!}
                             
                                
                            </div>
                            <ul class="chart-point-list">
                                <a href="#"> View Users </a></li>
                                </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pending Payouts</h4>
                        </div>
                        <div class="card-body">
                            @livewire('pending-payouts')  
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pending Payouts</h4>
                        </div>          
                        <div class="card-body">      
                            @livewire('pending-withdrawals')                   
                        </div>
                    </div>
                    </div>
                </div>

        </div>

        
   {!! $chart->renderChartJsLibrary() !!}
{!! $chart->renderJs() !!}

<!--**********************************
Content body end
***********************************-->

</x-backend-layout>