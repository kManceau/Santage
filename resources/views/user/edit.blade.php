@extends ('layouts.app')

@section('title')
SANTAGE - Mon compte
@endsection

@section('content')
<div class="container pt-5">

    <h1>Mon compte</h1>

    <h3 class="pb-3">Modifier mes informations </h3>

    <div class="row">

        <picture>
            <source srcset="/storage/users/{{$user->id}}.avif" type="image/avif">
            <source srcset="/storage/users/{{$user->id}}.webp" type="image/webp">
            <img src="/storage/users/{{$user->id}}.jpg" alt="Picture of {{$user->name}}"
                class="card-img-top img-fluid" style="max-height: 600px; object-fit: cover; object-position: center;" loading="lazy" />
        </picture>

        <form class="col-4 mx-auto" action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
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

            <div class="row mb-3">
                <div class="form-group my-3">
                    <label for="avatar" class="mb-2">Avatar (Optional)</label><br>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>
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