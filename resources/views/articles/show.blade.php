@extends('layouts.app')  

@section('content')  
    <h2 class="text-2xl font-bold mb-4">{{ $article->title }}</h2>  
    <p class="mb-4">{{ $article->full_text }}</p>  
    <p class="text-gray-500">Kategori: {{ $article->category->name }}</p>  
    <p class="text-gray-500">Tags:   
        @foreach($article->tags as $tag)  
            <span class="bg-gray-200 rounded px-2 py-1">{{ $tag->name }}</span>  
        @endforeach  
    </p>  
    <a href="{{ route('articles.index') }}" class="text-blue-500">Kembali ke Daftar Artikel</a>  
@endsection