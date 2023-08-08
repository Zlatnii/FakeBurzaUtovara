<x-header/>
<div class="m-2">
  <form action="{{ route('dashboard') }}" method="GET">
    <button type="submit" class="btn btn-secondary">Back</button>
  </form>
</div>
<div class="d-flex m-2 justify-content-center">
  <h1>Korisnici</h1>&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="d-inline mt-2">
    <form action="{{ route('users.create') }}" method="GET">
      <button type="submit" class="btn btn-primary">Add New User</button>
    </form>
  </div>
</div>
  <div class="m-5">
    <table class="table table-hover">
      <tr>
        <td><h4>Ime</h4></td>
        <td><h4>Prezime</h4></td>
        <td><h4>Email</h4h4></td>
        <td><h4>Uloga</h4></td>
        <td><h4>Pošiljka</h4></td>
        <td><h4>Aktivnost</h4></td>
        <td><h4>Uređivanje</h4></td>
      </tr>
      @foreach($usersRoles as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->surname }}</td>
        <td>{{ $user->email }}</td>  
        <td>{{ $user->role_name }}</td>
        <td>{{ $user->user_package }}</td>
        @if($user->last_login === null)
        <td>Welcome, you are new here!</td>
        @else
        <td>{{ \Carbon\Carbon::parse($user->last_login)->diffForHumans() }}</td>
        @endif
        <td>
        <form action="{{ route('users.destroy', [$user->id]) }}" method="POST" style="display: inline-block;">
        @method('DELETE')    
        @csrf 
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          &nbsp;
          <form action="{{ route('users.edit', [$user->id]) }}" method="GET" style="display: inline-block;">
                <button type="submit" class="btn btn-success">Edit</button>
          </form>         
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<x-footer/>
