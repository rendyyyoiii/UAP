@extends('layouts.app')  

@section('content')  
    <h2 class="text-2xl font-bold mb-4">Buat Kategori Baru</h2>  
    <form action="{{ route('categories.store') }}" method="POST">  
        @csrf  
        <div class="mb-4">  
            <label for="name" class="block">Nama Kategori</label>  
            <input type="text" name="name" id="name" class="border p-2 w-full" required>  
        </div>  
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Kategori</button>  
    </form>  
@endsection