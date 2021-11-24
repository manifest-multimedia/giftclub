<x-backend-layout>
    <x-slot name='title'> Wallet </x-slot>

    <div class="container-fluid"> 
<div class="row"> 
        <div class="col-xl-12">
            <div class="">
                <div class="card">
                    
                    @livewire('linkedwallets')
                 
                   
                </div>
            </div>
        </div>

<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h1>Safety Information</h1>
            <p><span> Keep Your Account Safe by Observing the Following Safety Recommendations</span></p>
        </div>
    </div>

</div>

    </div>
    </div> 
    
</x-backend-layout>