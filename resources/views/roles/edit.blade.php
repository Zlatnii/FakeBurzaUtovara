<x-header />
<h1> Edit Role </h1>
    <div class="content">
        <div style="width: 450px; margin-left: 10px;">
            <form action="{{ route('roles.update', $role->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="name" class="form-control" id="ImputName" aria-describedby="NameHelp" placeholder="Enter Name" name="name" value="{{ $role->name }}" required>
                    <small id="NameHelp" class="form-text text-muted">Please, enter role name.</small>
                </div>
                <div class="btn btn-submit">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
<x-footer />