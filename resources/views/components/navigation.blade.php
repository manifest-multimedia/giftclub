<div class="wrapper navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/"><img src="{{ asset('images/logo-whitegreen-full.png') }}" alt="logo"
                    width="231px" height="60px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="ml-auto navbar-nav">
                    <x-nav-link url="/"> Home </x-nav-link>
                    <x-nav-link url="/services"> Services </x-nav-link>
                    <x-nav-link url=""> Packages </x-nav-link>
                    <x-nav-link url="/about"> About Us </x-nav-link>
                    <x-nav-button url="login"> Get Started </x-nav-button>
                </ul>
            </div>
        </nav>
    </div>
</div>
