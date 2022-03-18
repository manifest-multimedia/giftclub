<x-backend-layout>
    <x-slot name='title'> Active Plans </x-slot>

   <div class="container-fluid">
                
    <div class="col-12">
        <div class="card" style="background:#022D4D">
            <div class="card-body">
                <div class="media align-items-center">
                    
                    <div class="media-body ml-1 align-items-center">
                        <p class="mb-2 text-center text-white">Howdy, {{getFirstName(Auth::user()->name)}}!</p>
                        <h5 class="mb-0 text-white font-w600 text-center"> 
                            <span style="font-size:30px"> 
                            Your Active Plans
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

    </div> 

    

</div>
</x-backend-layout>