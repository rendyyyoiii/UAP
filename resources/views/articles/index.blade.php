@extends('layouts.app')  

@section('content')  
    <h2 class="text-2xl font-bold mb-4">Daftar Artikel</h2>  
    <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Buat Artikel Baru</a>  
    <ul class="mt-4">  
        @foreach($articles as $article)  
            <li class="border-b py-2">  
                <a href="{{ route('articles.show', $article) }}" class="text-blue-600">{{ $article->title }}</a>  
                <span class="text-gray-500"> - {{ $article->category->name }}</span>  
            </li>  
        @endforeach  
    </ul>  
@endsection