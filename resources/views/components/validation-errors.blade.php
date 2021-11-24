<div>
    <!-- Well begun is half done. - Aristotle -->
   
        <!-- When there is no desire, all things are at peace. - Laozi -->
        @if ($errors->any())
                                
        <div class="alert alert-info" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 6000)">
            <div class="font-medium text-red-600"><h4 class="alert-heading"> {{ __('Whoops! Action Failed') }} </h4></div>
            <ul class="alert alert-danger mt-3 text-sm text-red-600" style="list-style-type: ' - '">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
</div>