@extends('layouts.app')

@section('content')
<user-management :auth="{{ auth()->user() }}" :user="{{ $user }}" inline-template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('users._breadcrumbs.edit')
                @include('users._partials.user-details')
                @include('users._forms.update-details')
            </div>
        </div>
    </div>
</user-management>
@endsection
