@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <h1>Category Details</h1>
        <p><strong>Name:</strong> {{ $category->name }}</p>
        <p><strong>Description:</strong> {{ $category->description }}</p>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Back to Categories</a>
    </div>
@endsection
