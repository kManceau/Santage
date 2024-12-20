@extends('layouts.app')

@section('scss')
    @vite(['resources/js/elf/index.js'])
@endsection

@section('content')
    <div class="container pt-5">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row">
            <p class="h1">Bonjour, {{Auth::user()->name}}</p>
        </div>

        @if($childrenWG->count() !== 0)
            <div class="row my-2">
                <p class="h2 mt-2">Il est temps de bosser, ces pauvres enfants n'ont pas de cadeaux !</p>
            </div>
                <label for="search" class="form-label my-0">Choisis un enfant :</label>
                <div class="row mb-3 g-3 align-items-center">
                    <form class="col" action="{{ route('gifts.index') }}" method="GET">
                        <div class="form-group">
                            <select name="search" id="search-select" class="form-select">
                                @foreach($childrenWG as $child)
                                    <option value="{{ $child->id }}">{{ $child->first_name . ' ' . $child->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <div class="col-auto">
                        <button type="button" id="search-add-button" class="btn btn-primary">Ajouter un cadeau</button>
                    </div>
            <div class="row my-3">
                @foreach ($childrenWG as $child)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="card-title">{{ $child->first_name }} {{ $child->last_name }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="my-0"><strong>Sexe
                                        : </strong>{{ $child->gender == "male" ? 'Garçon' : 'Fille' }}
                                </p>
                                <p class="my-0"><strong>Age
                                        : </strong>{{ \Carbon\Carbon::parse($child->birthdate)->age }}
                                    ans</p>
                                <p class="my-0 mt-3"><strong>Adresse : </strong>{{ $child->address }}</p>
                                <p class="my-0"><strong>Code Postal
                                        : </strong>{{ $child->postal_code }} {{$child->city}}
                                </p>
                                <p class="my-0"><strong>Pays : </strong>{{ $child->country }}</p>
                                <p class="my-0 mt-3"><strong>Note Scolaire : </strong>{{ $child->scolar_note }}</p>
                                <p class="my-0"><strong>Note de Comportement : </strong>{{ $child->behavior_note }}</p>
                                @php
                                    $average = round((($child->behavior_note + $child->scolar_note) / 2), 2);
                                @endphp
                                <p class="my-0 {{ $average > 10 ? 'text-success' : 'text-danger' }}"><strong>Moyenne des
                                        notes : </strong>{{ $average }}</p>
                                <p class="my-0 mt-3"><strong>Cadeaux attribués :</strong></p>
                                @if ($child->gift->isEmpty())
                                    <p class="my-0">{{ $child->first_name }} n'a pas encore de cadeau. Au boulot !</p>
                                @else
                                    @foreach ($child->gift as $gift)
                                        <form action="{{ route('delete_gift_child', [$child->id, $gift->id]) }}"
                                              method="POST" class="mt-1">
                                            @csrf
                                            @method('DELETE')
                                            <p class="my-0 {{$gift->good ? 'text-success' : 'text-danger'}}">
                                                - {{$gift->name}}
                                                <button type="submit" style="background:none;border:none;"
                                                        title="Delete">
                                                    ❌️
                                                </button>
                                            </p>
                                        </form>
                                    @endforeach
                                @endif
                                <div class="mt-3">
                                    <a href="{{ route('child_gift_add', $child->id) }}"
                                       class="text-decoration-none text-dark">🎁 Ajouter un cadeau</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif



        <div class="row my-2">
            <p class="h2 mt-2">Voici tous les enfants dont tu as la charge :</p>
        </div>

            <label for="search-all" class="form-label my-0">Choisis un enfant :</label>
            <div class="row mb-3 g-3 align-items-center">
                <form class="col" action="{{ route('gifts.index') }}" method="GET">
                    <div class="form-group">
                        <select name="search-all" id="search-all-select" class="form-select">
                            @foreach($children as $child)
                                <option value="{{ $child->id }}">{{ $child->first_name . ' ' . $child->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
                <div class="col-auto">
                    <button type="button" id="search-all-add-button" class="btn btn-primary">Ajouter un cadeau</button>
                </div>

            </div>

        <div class="row">
            @foreach ($children as $child)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-header">
                            <h5 class="card-title">{{ $child->first_name }} {{ $child->last_name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="my-0"><strong>Sexe : </strong>{{ $child->gender == "male" ? 'Garçon' : 'Fille' }}
                            </p>
                            <p class="my-0"><strong>Age : </strong>{{ \Carbon\Carbon::parse($child->birthdate)->age }}
                                ans</p>
                            <p class="my-0 mt-3"><strong>Adresse : </strong>{{ $child->address }}</p>
                            <p class="my-0"><strong>Code Postal : </strong>{{ $child->postal_code }} {{$child->city}}
                            </p>
                            <p class="my-0"><strong>Pays : </strong>{{ $child->country }}</p>
                            <p class="my-0 mt-3"><strong>Note Scolaire : </strong>{{ $child->scolar_note }}</p>
                            <p class="my-0"><strong>Note de Comportement : </strong>{{ $child->behavior_note }}</p>
                            @php
                                $average = round((($child->behavior_note + $child->scolar_note) / 2), 2);
                            @endphp
                            <p class="my-0 {{ $average > 10 ? 'text-success' : 'text-danger' }}"><strong>Moyenne des
                                    notes : </strong>{{ $average }}</p>
                            <p class="my-0 mt-3"><strong>Cadeaux attribués :</strong></p>
                            @if ($child->gift->isEmpty())
                                <p class="my-0">{{ $child->first_name }} n'a pas encore de cadeau. Au boulot !</p>
                            @else
                                @foreach ($child->gift as $gift)
                                    <form action="{{ route('delete_gift_child', [$child->id, $gift->id]) }}"
                                          method="POST" class="mt-1">
                                        @csrf
                                        @method('DELETE')
                                        <p class="my-0 {{$gift->good ? 'text-success' : 'text-danger'}}">
                                            - {{$gift->name}}
                                            <button type="submit" style="background:none;border:none;" title="Delete">
                                                ❌️
                                            </button>
                                        </p>
                                    </form>
                                @endforeach
                            @endif
                            <div class="mt-3">
                                <a href="{{ route('child_gift_add', $child->id) }}"
                                   class="text-decoration-none text-dark">🎁 Ajouter un cadeau</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center my-4">
            <div class="col-md-5">
                {{ $children->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection
