@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('Users') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
              </ol>
            </nav>

            <h1 class="display-4 mt-5 mb-2">{{ $user->name }}</h1>

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

            <a class="btn btn-secondary" href="{{ route('users.index') }}">
                <i class="fa fa-chevron-left">&nbsp;</i> Back
            </a>

            @if($user->id === auth()->user()->id)
            <a class="btn btn-warning" href="{{ route('users.edit', $user) }}">
                <i class="fa fa-edit">&nbsp;</i> Update
            </a>
            @endif 
        </div>
    </div>
</div>
@endsection
