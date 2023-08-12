<x-header/>
<div class="m-4">
  <form action="{{ route('dashboard') }}" method="GET">
    <button type="submit" class="btn btn-secondary">Back</button>
  </form>
</div>
<div class="d-flex m-4 justify-content-center">
  <h1>Uloge</h1>&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="d-inline mt-2">
      <form action="{{ route('roles.create') }}" method="GET">
        <button type="submit" class="btn btn-primary">Dodaj ulogu</button>
      </form>
    </div>
</div>
<div class="container" style="width: 600px;">
  <table class="table table-striped table-hover text-center">
        <tr>
          <th><h4>Naziv</h4></th>
          <th><h4>Uređivanje</h4></th>
        </tr>
       @foreach($roles as $role)
        <tr>
          <td>{{ $role->name }}</td>
          <td>
            <form action="{{ route('roles.destroy', [$role->id]) }}" method="POST" style="display: inline-block;">
              @method('DELETE')    
              @csrf 
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
                &nbsp;
            <form action="{{ route('roles.edit', [$role->id]) }}" method="GET" style="display: inline-block;">
              <button type="submit" class="btn btn-success">Edit</button>
            </form>         
          </td>
        </tr>
      </div>
    @endforeach
  </table>
</div>
<x-footer/>
