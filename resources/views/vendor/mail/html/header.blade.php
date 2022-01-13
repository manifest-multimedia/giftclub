<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="{{asset('images/logo-icon.png')}}" class="Logo" alt="Logo" style="width:100px !important; height:100px !important">
{{-- {{ $slot }} --}}
@endif
</a>
</td>
</tr>
