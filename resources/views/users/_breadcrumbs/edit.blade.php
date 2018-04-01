<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
        <li class="breadcrumb-item">
            <a href="{{ route('users.show', $user) }}">
                @if($user->id === auth()->user()->id)
                    You
                @else
                    {{ $user->name }}
                @endif
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ __('Edit') }}</li>
    </ol>
</nav>