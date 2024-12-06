@extends('layouts.app')  

@section('content')  
    <h2 class="text-2xl font-bold mb-4">Daftar Tag</h2>  
    <a href="{{ route('tags.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Buat Tag Baru</a>  
    <ul class="mt-4">  
        @foreach($tags as $tag)  
            <li class="border-b py-2">  
                {{ $tag->name }}  
                <a href="{{ route('tags.edit', $tag) }}" class="text-blue-600 ml-4">Edit</a>  
                <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="inline">  
                    @csrf  
                    @method('DELETE')  
                    <button type="submit" class="text-red-600 ml-2">Hapus</button>  
                </form>  
            </li>  
        @endforeach  
    </ul>  
@endsection