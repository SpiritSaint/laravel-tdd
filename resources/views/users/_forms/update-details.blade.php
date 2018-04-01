<h2 class="display-5 mt-5 mb-2">Details</h2>

<p class="lead mb-5">
    @if($user->id === auth()->user()->id)
    Change your details.
    @else
    Change this user details.
    @endif
</p>

<div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" 
    id="name" 
    type="text" 
    name="name" 
    v-model="name">
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input class="form-control" 
    id="password" 
    type="password" 
    name="password"
    v-model="password">
</div>
<div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input class="form-control" 
    id="password_confirmation" 
    type="password" 
    name="password_confirmation"
    v-model="password_confirmation">
</div>

<button class="btn btn-primary" type="button" @click="updateDetails()">
    Update
</button>