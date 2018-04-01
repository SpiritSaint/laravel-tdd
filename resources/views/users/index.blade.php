@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    @include('users._breadcrumbs.index')
                    @include('users._headers.index')
                </div>
                @foreach($users as $user)
                    @include('users._partials.each')
                    @if(! $loop->last)
                    <div class="col-md-12 mb-2 mt-2">
                        <hr>
                    </div>
                    @endif
                @endforeach
                <div class="col-md-12">
                    <div class="text-xs-center">
                        {{ $users->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
