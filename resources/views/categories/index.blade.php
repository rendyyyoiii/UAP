@extends('layouts.app')  

@section('content')  
    <h2 class="text-2xl font-bold mb-4">Daftar Kategori</h2>  
    <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Buat Kategori Baru</a>  
    <ul class="mt-4">  
        @foreach($categories as $category)  
            <li class="border-b py-2">  
                {{ $category->name }}  
                <a href="{{ route('categories.edit', $category) }}" class="text-blue-600 ml-4">Edit</a>  
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">  
                    @csrf  
                    @method('DELETE')  
                    <button type="submit" class="text-red-600 ml-2">Hapus</button>  
                </form>  
            </li>  
        @endforeach  
    </ul>  
@endsection