@extends('layouts.app')

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

                <div class="row my-2">
                    <p class="h2 mt-2">Voici tous les enfants qui n'ont pas encore de lutin :</p>
                </div>

                <label for="search-all" class="form-label my-0">Choisis un enfant :</label>
                <div class="row mb-3 g-3 align-items-center">
                    <form class="col" action="{{ route('gifts.index') }}" method="GET">
                        <div class="form-group">
                            <select name="search-all" id="search-all-select" class="form-select">
                                <option value="" disabled>Choisis un enfant</option>
                                @foreach($children as $child)
                                    <option value="{{ $child->id }}">{{ $child->first_name . ' ' . $child->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <div class="col-auto">
                        <button type="button" id="search-add-button" class="btn btn-primary">Attribuer un lutin</button>
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
                                    <p class="my-0"><strong>Code Postal : </strong>{{ $child->postal_code }}</p>
                                    <p class="my-0"><strong>Ville : </strong>{{$child->city}}</p>
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
                                                <p class="my-0 {{$gift->good ? 'text-success' : 'text-danger'}}">
                                                    - {{$gift->name}}
                                                </p>

                                        @endforeach
                                    @endif
                                    <div class="mt-3">
                                        <a href="{{ route('elf_child_add', $child->id) }}"
                                           class="text-decoration-none text-dark">🎅 Attribuer un lutin</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
@endsection
