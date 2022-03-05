<x-backend-layout>
    
    <x-slot name='title'> Settings </x-slot>
  

    <div class="container-fluid">
<div class="row">
    @livewire('location-information')
    <div class="col-xl-6"><div class="card">
        <div class="card-body"><h1>Finance</h1><hr />
            @livewire('linkedwallets')
        </div>  
</div></div>
    {{-- <div class="col-xl-6"><div class="card"><div class="card-body"><h1>Preferences</h1><hr />
    
    <h5> Color Preference </h5> 
    
    <div class="radio">
        <label><input type="radio" name="optradio"> Light</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="optradio"> Dark </label>
    </div>
    <div class="radio">
        <label><input type="radio" name="optradio"> System/Auto </label>
    </div>
    
    </div></div></div> --}}

</div>
    
    </div>

</x-backend-layout>