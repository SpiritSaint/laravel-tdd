@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">

                <div class="col-md-12">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb" class="text-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Users') }}</li>
                      </ol>
                    </nav>

                    <h1 class="display-4 mt-5 mb-2">{{ __('Users') }}</h1>

                    <p class="lead mb-5">
                      There's the place where you can search users.
                    </p>
                </div>

                @foreach($users as $user)
                <div class="col-md-12 mb-3 mt-3">
                    @include('users._partials.user-details', $user)
                    <a class="btn btn-secondary" href="{{ route('users.show', $user) }}">
                        <i class="fa fa-search">&nbsp;</i> View
                    </a>
                </div>
                @if(! $loop->last)
                <div class="col-md-12 mb-2 mt-2">
                    <hr>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
