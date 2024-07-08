@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Houses</h1>
    <a href="{{ route('houses.create') }}" class="btn btn-primary">Add House</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Address</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($houses as $house)
                <tr>
                    <td>{{ $house->title }}</td>
                    <td>{{ $house->description }}</td>
                    <td>{{ $house->price }}</td>
                    <td>{{ $house->address }}</td>
                    <td><img src="{{ asset('images/'.$house->image) }}" width="100" /></td>
                    <td>
                        <a href="{{ route('houses.edit', $house) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('houses.destroy', $house) }}" method="POST" style="display:inline;">
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