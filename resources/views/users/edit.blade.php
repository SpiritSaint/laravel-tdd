@extends('layouts.app')

@section('content')
<user-management :auth="{{ auth()->user() }}" :user="{{ $user }}" inline-template>
<div class="container">
    <form class="form">
        <div class="row justify-content-center">
            <div class="col-md-8">

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

            <h1 class="display-4 mt-5 mb-2">{{ $user->name }}</h1>
            <h4>{{ $user->email }}</h4>

            <p class="lead mb-5">
                @if(auth()->user() == $user)
                {{ __('You') }}
                @elseif($user->is_admin) 
                    {{ __('Administrator') }}
                @else
                {{ __('User') }}
                @endif
                ─ {{ $user->created_at->diffForHumans() }}
            </p>

            <h2 class="display-5 mt-5 mb-2">Details</h1>


            <p class="lead mb-5">
                @if($user->id === auth()->user()->id)
                    Change your details.
                @else
                    Change this user details.
                @endif
            </p>

            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" 
                id="name" 
                type="text" 
                name="name" 
                v-model="name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" 
                id="password" 
                type="password" 
                name="password"
                v-model="password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input class="form-control" 
                id="password_confirmation" 
                type="password" 
                name="password_confirmation"
                v-model="password_confirmation">
            </div>

            <button class="btn btn-primary" type="button" @click="updateDetails()">
                <i class="fa fa-save">&nbsp;</i> Update
            </button>
        </div>
        
    </div>
</form>
</div>
</user-management>
@endsection
