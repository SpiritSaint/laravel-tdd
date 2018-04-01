<h1 class="display-5 mt-5 mb-2">{{ $user->name }}</h1>

<h4>{{ $user->email }}</h4>

<p class="lead mb-5">
	@if(auth()->user() == $user)
		{{ __('You') }}
	@elseif($user->is_admin) 
		{{ __('Administrator') }}
	@else
		{{ __('User') }}
	@endif
	─ Created {{ $user->created_at->diffForHumans() }}
</p>
