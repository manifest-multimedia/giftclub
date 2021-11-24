<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    @if (session()->has('message'))
    <div class="alert alert-success" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)">
        {{ session('message') }}
    </div>
    @endif
</div>