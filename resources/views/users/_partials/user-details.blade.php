<h4>
    {{ $user->name }} 
</h4>
<h5>{{ $user->email }}</h5>
<p>
    @if(auth()->user() == $user)
        {{ __('You') }}
    @elseif($user->is_admin) 
        {{ __('Administrator') }}
    @else
        {{ __('User') }}
    @endif
    ─ {{ $user->created_at->diffForHumans() }}
</p>