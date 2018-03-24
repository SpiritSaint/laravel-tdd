@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                @foreach($users as $user)
                <div class="card-body">

                    @include('users._partials.user-details', $user)
                </div>

                <div class="card-footer">
                    <a class="btn btn-secondary" href="{{ route('users.show', $user) }}">
                        <i class="fa fa-search">&nbsp;</i> View
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
