@if(auth()->user()->is_admin)
<div class="dropdown-divider"></div>
<h6 class="dropdown-header">{{ __('Administrator') }}</h6>
<a class="dropdown-item" href="{{ route('admin') }}">
	{{ __('Dashboard') }}
</a>
@endif