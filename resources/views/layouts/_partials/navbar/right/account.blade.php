<h6 class="dropdown-header">{{ __('Account') }}</h6>
<a class="dropdown-item" href="{{ route('users.show', auth()->user()) }}">
	{{ __('Profile') }}
</a>