<x-backend-layout>
    <x-slot name='title'> Admin Area </x-slot>

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
                        <div class="card-body row">
                            <div class="chart-point col-md-4">
                                {{-- {{ $chart->options['chart_title'] }} --}}
                                {!! $chart->renderHtml() !!}
                             
                                
                            </div>
                            <div class="col-md-8"> 
                            <ul class="chart-point-list">
                                <li>Total Registered Users: </li>
                                <li>Active Users: </li>
                                <hr> 
                                <a href="/users"> View Users </a></li>
                                </ul>
                            </div>
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
                            <h4 class="card-title">Pending Withdrawals</h4>
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