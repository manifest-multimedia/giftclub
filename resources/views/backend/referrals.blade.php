<x-backend-layout>
    <x-slot name='title'> Referrals </x-slot>

    <div class="container-fluid"> 
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Referrals</h4>
        </div>
        @livewire('referrals-table')
    </div>
</div>

    </div>
</x-backend-layout>