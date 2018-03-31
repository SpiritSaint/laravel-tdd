@extends('layouts.app')

@section('content')
<admin-user-management :auth="{{ auth()->user() }}" :user="{{ $user }}" inline-template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">{{ __('Administration') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ __('Users') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show</li>
                </ol>
            </nav>

            <h1 class="display-4 mt-5 mb-2">
                {{ __('User') }}
            </h1>

            <p class="lead mb-5">
                View user details.
            </p>

            <h1 class="display-5 mt-5 mb-2">{{ __('Details') }}</h1>

                <table class="table table-responsive-sm mt-3" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email Address') }}</th>
                            <th class="text-center">{{ __('Administrator') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{ $user->name }} &boxh;
                                @if(auth()->user() == $user)
                                <small>
                                    {{ __('You') }}
                                </small>
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <div>
                                    <div v-show="admin === false">
                                        <i class="fa fa-times text-danger">&nbsp;</i>
                                    </div>
                                    <div v-show="admin === true">
                                        <i class="fa fa-check text-success">&nbsp;</i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            <div v-if="user.id !== auth.id" v-cloak>
                <h1 class="display-5 mt-5 mb-2">
                    {{ __('Administrator') }}
                    <small v-show="admin_updating"><i class="fas fa-spinner fa-pulse"></i></small>
                </h1>


                <p class="lead mb-3" v-show="admin">
                    Remove administrator permissions to this user.
                </p>
                <p class="lead mb-3" v-show="!admin">
                    Grant administrator permissions to this user.
                </p>

                <a class="btn btn-primary" v-if="!admin" href="#" @click="upgradeToAdmin">Upgrade</a>
                <a class="btn btn-secondary" v-if="admin" href="#" @click="degradeToUser">Downgrade</a>
            </div>
        </div>
    </div>
</div>
</admin-user-management>
@endsection