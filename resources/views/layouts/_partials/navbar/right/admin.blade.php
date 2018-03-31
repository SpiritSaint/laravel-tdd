@if(auth()->user()->is_admin)
<div class="dropdown-divider"></div>
<h6 class="dropdown-header">{{ __('Administrator') }}</h6>
<a class="dropdown-item" href="{{ route('admin') }}">
	{{ __('Dashboard') }}
</a>
<div class="dropdown-divider"></div>
<h6 class="dropdown-header">{{ __('Resources') }}</h6>

<a class="dropdown-item" href="{{ route('admin.users.index') }}">
	{{ __('Users') }}
</a>
@endif