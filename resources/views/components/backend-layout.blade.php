<x-b-head />
<x-b-preloader />
<x-b-header> 
    <x-slot name="pagetitle"> 
        {{$title}}
    </x-slot> 
</x-b-header>
<x-b-sidebar />

{{-- New Contract Modal --}}
@livewire('new-contract')
{{-- <x-b-new-contract-modal /> --}}

{{--  If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius --}}

<div class="content-body">
    {{$slot}}
</div>
<x-b-footer />
