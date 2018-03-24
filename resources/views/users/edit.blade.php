@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form" method="POST" action="{{ route('users.update', $user) }}">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-body">
                        
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" 
                                    id="name" 
                                    type="text" 
                                    name="name" 
                                    value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" 
                                    id="password" 
                                    type="password" 
                                    name="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input class="form-control" 
                                    id="password_confirmation" 
                                    type="password" 
                                    name="password_confirmation">
                        </div>

                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-save">&nbsp;</i> Save
                        </button>

                        <a class="btn btn-secondary" href="{{ route('users.show', $user) }}">
                            <i class="fa fa-chevron-left">&nbsp;</i> Back
                        </a>

                    </div>
                </div>
            </div>
        
        </div>
    </form>
</div>
@endsection
