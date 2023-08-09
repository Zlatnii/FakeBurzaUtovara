<x-header/>
<h1>Create new User</h1>
<div class="m-5 ">
<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-2">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Type your name here">
    </div>
    <div class="mb-2">
      <label for="surname" class="form-label">Surname</label>
      <input type="text" name="surname" class="form-control" id="surname" aria-describedby="surname" placeholder="Type your surname here">
    </div>
    <div class="mb-2">
      <label for="oib" class="form-label">OIB (Osobni identifikacijski broj)</label>
      <input type="text" maxlength="11" name="oib" class="form-control" id="oib" aria-describedby="oib" placeholder="Type OIB here">
    </div>
    <div class="mb-2">
      <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Type your email here">
    </div>
    <div class="mb-2">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1"  placeholder="Type Password">
    </div>
    <div class="mb-2">
      <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
      <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2"  placeholder="Confirm Password">
    </div>
    <div class="mb-2">
      <label for="exampleInputRole">Roles</label>
        <select class="form-control" id="exampleInputRole" name="role_id">
            <option value="">Select Role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
      <small id="roleHelp" class="form-text text-muted">Please select a role for the user.</small>
    <div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<x-footer/>
