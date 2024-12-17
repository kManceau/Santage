@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3>Liste des utilisateurs</h3>
                        
                        <!-- Tableau -->
                        <ul>
                            @foreach ($users as $u)
                            <li>{{ $u->name }} (ID: {{ $u->id }})</li>
                            <a href="{{ route('users.edit', $u->id)}}" class="btn btn-primary btn-sm">Editer</a>
                            @endforeach
                        </ul>

                        @if ($errors->any())
                        <div style="color: red;">
                            @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif
                        <!-- Fin du Tableau -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection