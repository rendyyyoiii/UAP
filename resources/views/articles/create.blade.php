@extends('layouts.app')  

@section('content')  
    <h2 class="text-2xl font-bold mb-4">Buat Artikel Baru</h2>  
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">  
        @csrf  
        <div class="mb-4">  
            <label for="title" class="block">Judul</label>  
            <input type="text" name="title" id="title" class="border p-2 w-full" required>  
        </div>  
        <div class="mb-4">  
            <label for="full_text" class="block">Konten</label>  
            <textarea name="full_text" id="full_text" class="border p-2 w-full" required></textarea>  
        </div>  
        <div class="mb-4">  
            <label for="image" class="block">Gambar</label>  
            <input type="file" name="image" id="image" class="border p-2 w-full">  
        </div>  
        <div class="mb-4">  
            <label for="category_id" class="block">Kategori</label>  
            <select name="category_id" id="category_id" class="border p-2 w-full" required>  
                @foreach($categories as $category)  
                    <option value="{{ $category->id }}">{{ $category->name }}</option>  
                @endforeach  
            </select>  
        </div>  
        <div class="mb-4">  
            <label for="tags" class="block">Tag</label>  
            <select name="tags[]" id="tags" class="border p-2 w-full" multiple>  
                @foreach($tags as $tag)  
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>  
                @endforeach  
            </select>  
        </div>  
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Artikel</button>  
    </form>  
@endsection