@extends('layouts.app')

@section('scss')
@endsection

@section('content')
    <div class="container pt-5">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row">
            <p><strong>Enfant : </strong>{{$child->first_name . ' ' . $child->last_name}}</p>
            <form method="POST" action="{{ route('elf_child_store') }}">
                @csrf
                <label for="elf" class="form-label"><strong>Lutin  :</strong></label>
                <select name="elf" id="elf-select" class="form-control">
                    <option value="" disabled selected>Choisir un lutin</option>
                    @foreach($elves as $elf)
                        <option value="{{ $elf->id }}">{{ $elf->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="child_id" value="{{ $child->id }}">
                <button type="submit" class="btn btn-primary my-3">Attribuer le lutin</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger my-3 ms-3">Retour</a>
            </form>
        </div>
    </div>
@endsection
