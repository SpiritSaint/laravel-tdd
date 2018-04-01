<div class="col-md-12">
    <div class="row">
        <div class="col-9">    
            @include('users._partials.user-details', $user)
        </div>
        <div class="col-3 text-right">
            <a class="btn btn-secondary" href="{{ route('users.show', $user) }}">
                View
            </a>
        </div>
    </div>
</div>