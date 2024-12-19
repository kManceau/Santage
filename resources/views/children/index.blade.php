@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Children</h1>
        <a href="{{ route('children.create') }}" class="btn btn-primary">Add a child</a>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Country</th>
                <th>Elf</th>
                <th>Actions</th>      
            </tr>
            </thead>
            <tbody>
            @foreach ($children as $child)
                <tr>
                    <td>{{ $child->id }}</td>
                    <td>{{ $child->last_name }}</td>
                    <td>{{ $child->first_name }}</td>
                    <td>{{ $child->country }}</td>
                    <td>{{ $child->user->name }}</td>
                    <td>
                        <a href="{{ route('children.show', $child->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('children.edit', $child->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('children.destroy', $child->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
