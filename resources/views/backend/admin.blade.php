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
                                <div class="check-point-area">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand"><div class=""></div></div>
                                        <div class="chartjs-size-monitor-shrink"><div class=""></div></div>
                                    </div>
                                    <canvas id="doughnut_chart" width="100" height="100" style="display: block; width: 100px; height: 100px;" 
                                    class="chartjs-render-monitor">
                                </canvas>
                                </div>
                                <ul class="chart-point-list">
                                    <li><i class="fa fa-circle text-primary mr-1"></i> Registered | <a href="#"> View Users </a></li>
                                    <li><i class="fa fa-circle text-success mr-1"></i> Active Plans</li>
                                    {{-- <li><i class="fa fa-circle text-warning mr-1"></i> Total</li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    @livewire('pending-payouts')                   
                    {{-- @livewire('pending-withdrawals')                    --}}
                        
                    </div>
                </div>

        </div>

        


<!--**********************************
Content body end
***********************************-->

</x-backend-layout>