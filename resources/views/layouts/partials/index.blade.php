@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Houses</h1>
        <a href="{{ route('houses.create') }}" class="btn btn-primary">Add House</a>
    </div>
    <div class="row">
        @foreach($houses as $house)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('images/' . $house->image) }}" class="card-img-top" alt="{{ $house->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $house->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($house->description, 100) }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ $house->price }}</p>
                        <p class="card-text"><strong>Address:</strong> {{ $house->address }}</p>
                        <a href="{{ route('houses.edit', $house) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('houses.destroy', $house) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection