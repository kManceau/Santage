@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <div class="tab-content">
                    <div id="nav-tab-card" class="tab-pane fade show active">
                        <h3> Ajouter un cadeau</h3>
                        <!-- Message d'information -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <!-- Formulaire -->
                        <form method="POST" action="{{ route('gifts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group my-3">
                                <label>Nom du cadeau</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group my-3">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control">
                            </div>
                            <div class="form-group my-3">
                                <label for="category_id" class="form-label my-0">Categorie du cadeau : </label>
                                <select name="category_id" class="form-control custom-select">
                                    <option value="" disabled> --Catégorie-- </option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="good" value="0">
                                <label for="good" class="form-label">
                                    <input type="checkbox" name="good" id="good" value="1" class="form-check-input">
                                    Good
                                </label>
                            </div>

                            <div class="row mb-3">
                        <div class="form-group my-2">
                                <label for="image" class="mb-2">Image (Optional)</label><br>
                                <input type="file" class="form-control" id="image" name="image" >
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary  rounded-pill shadow-sm">
                                Ajouter un cadeau </button>
                        </form>
                        <!-- Fin du formulaire -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
