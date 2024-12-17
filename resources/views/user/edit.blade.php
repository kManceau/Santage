@extends ('layouts.app')

@section('title')
SANTAGE - Mon compte
@endsection

@section('content')
<div class="container">

    <h1>Mon compte</h1>

    <h3 class="pb-3">Modifier mes informations </h3>

    <div class="row">

        <form class="col-4 mx-auto" action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nouveau Nom</label>
                <input required type="text" class="form-control" placeholder="modifier" name="name"
                    value="{{ $user->name }}" id="name">
                @if(Auth::user() && Auth::user()->role === 'santa')
                <label for="name">Nouvelle rôle</label>
                <input required type="text" class="form-control" placeholder="modifier" name="role "
                    value="{{ $user->role }}" id="role ">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
        <form action="{{ route('users.destroy', $user) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer le compte</button>
        </form>
    </div>
</div>
@endsection