@extends('layouts.app')

@section('content')
<div class="container">
    <div class="my-4">
        <h1>{{ $house->title }}</h1>
        <a href="{{ route('houses.edit', $house) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('houses.destroy', $house) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    <div class="row">
        <div class="col-md-8">
            <img src="{{ asset('images/' . $house->image) }}" class="img-fluid" alt="{{ $house->title }}">
        </div>
        <div class="col-md-4">
            <h3>Description</h3>
            <p>{{ $house->description }}</p>
            <h3>Details</h3>
            <p><strong>Price:</strong> ${{ $house->price }}</p>
            <p><strong>Address:</strong> {{ $house->address }}</p>
        </div>
    </div>
    <div class="mt-4">
        <a href="{{ route('houses.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection