<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">
            @if($user->id === auth()->user()->id)
                {{ __('You') }}
            @else
                {{ __('Show') }}
            @endif
        </li>
    </ol>
</nav>