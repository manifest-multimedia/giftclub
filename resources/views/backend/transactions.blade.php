<x-backend-layout>
    <x-slot name='title'> Transactions </x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transactions</h4>
                    </div>
                    @livewire('transactions')
                </div>
            </div>
        </div>
    </div>

</x-backend-layout>
