@extends('layouts.app')  

@section('content')  
    <h2 class="text-2xl font-bold mb-4">Edit Tag</h2>  
    <form action="{{ route('tags.update', $tag) }}" method="POST">  
        @csrf  
        @method('PUT')  
        <div class="mb-4">  
            <label for="name" class="block">Nama Tag</label>  
            <input type="text" name="name" id="name" class="border p-2 w-full" value="{{ $tag->name }}" required>  
        </div>  
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Tag</button>  
    </form>  
@endsection