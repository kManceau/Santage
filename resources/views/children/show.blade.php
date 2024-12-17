@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de l'enfant</h1>

        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $child->id }}</td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td>{{ $child->first_name }}</td>
            </tr>
            <tr>
                <th>Nom</th>
                <td>{{ $child->last_name }}</td>
            </tr>
            <tr>
                <th>Date de naissance</th>
                <td>{{ $child->birthdate }}</td>
            </tr>
            <tr>
                <th>Pays</th>
                <td>{{ $child->country }}</td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td>{{ $child->address }}</td>
            </tr>
            <tr>
                <th>Ville</th>
                <td>{{ $child->city }}</td>
            </tr>
            <tr>
                <th>Code postal</th>
                <td>{{ $child->postal_code }}</td>
            </tr>
            <tr>
                <th>Note scolaire</th>
                <td>{{ $child->scolar_note }}</td>
            </tr>
            <tr>
                <th>Note de comportement</th>
                <td>{{ $child->behavior_note }}</td>
            </tr>
            <tr>
                <th>Utilisateur associé</th>
                <td>{{ $child->user->name }}</td>
            </tr>
        </table>

        <a href="{{ route('children.edit', $child->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('children.destroy', $child->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('children.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
