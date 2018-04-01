@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('users._breadcrumbs.show')
            @include('users._partials.user-details')
            @if($user->id === auth()->user()->id)
                <a class="btn btn-warning" href="{{ route('users.edit', $user) }}">
                    Edit
                </a>
            @endif 
        </div>
    </div>
</div>
@endsection
