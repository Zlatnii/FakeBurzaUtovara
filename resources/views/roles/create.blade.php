<x-header/>
<h1>Create new Role</h1>
<div class="m-5 ">
    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="m-5" style="width: 300px;">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Type new role name...">
        </div>
        <div class="m-5">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<x-footer/>
