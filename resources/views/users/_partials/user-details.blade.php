<h1>{{ $user->name }}</h1>
<h5>{{ $user->email }}</h5>
<h6>{{ $user->created_at->diffForHumans() }}</h6>