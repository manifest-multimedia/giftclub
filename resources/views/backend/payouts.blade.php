<x-backend-layout>
    <x-slot name='title'> Payouts </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payouts</h4>
                    </div>
                    @livewire('payouts')
                </div>
            </div>
        </div>
    </div>

</x-backend-layout>
