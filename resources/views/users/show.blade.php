@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-secondary" href="{{ route('users.index') }}">
                <i class="fa fa-users">&nbsp;</i> All
            </a>

            <hr>

            <div class="card card-default">
                <div class="card-body">

                    @include('users._partials.user-details', $user)
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
