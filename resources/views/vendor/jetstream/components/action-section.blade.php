<div class="card" {{ $attributes }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div>
        <div class="card-body">
            {{ $content }}
        </div>
    </div>
</div>
