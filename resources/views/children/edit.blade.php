@extends('layouts.app')

@section('content')
<div>
    <h1>Edit Child</h1>
    <form action="{{ route('children.update', $child->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $child->first_name }}" required>
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $child->last_name }}" required>
        </div>

        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ $child->birthdate }}" required>
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <select name="country" id="country" class="form-control">
                @foreach ($countries as $country)
                <option value="{{ $country['name']['common'] }}" {{ $child->country == $country['name']['common'] ? 'selected' : '' }}>{{ $country['name']['common'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $child->address }}" required>
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ $child->city }}" required>
        </div>

        <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ $child->postal_code }}" required>
        </div>

        <div class="form-group">
            <label for="scolar_note">Scholar Note</label>
            <input type="number" step="0.01" name="scolar_note" id="scolar_note" class="form-control" value="{{ $child->scolar_note }}" required>
        </div>

        <div class="form-group">
            <select class="form-select" id="gender" name="gender" required>
                <option value="Male" {{ old( $child->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old( $child->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <div class="form-group">
            <label for="behavior_note">Behavior Note</label>
            <input type="number" step="0.01" name="behavior_note" id="behavior_note" class="form-control" value="{{ $child->behavior_note }}" required>
        </div>
        <div class="form-group">
            <label for="user_id">Elf</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $id => $name)
                <option value="{{ $id }}" {{ $child->user_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection