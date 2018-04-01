@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('Administration') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                </ol>
            </nav>

            <h1 class="display-4 mt-5 mb-2">{{ __('Dashboard') }}</h1>

            <p class="lead mb-5">
                Navigate in the following resource management options.
            </p>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.users.index') }}" 
                                class="btn btn-primary btn-lg btn-block">
                                {{ __('Users') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
