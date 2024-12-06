<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Blog Pemula</title>  
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">  
</head>  
<body class="bg-gray-100">  
    <div class="container mx-auto p-4">  
        <header class="mb-4">  
            <h1 class="text-3xl font-bold">Blog Pemula</h1>  
            <nav class="mt-2">  
                <a href="{{ route('articles.index') }}" class="text-blue-500">Articles</a>  
                <a href="{{ route('categories.index') }}" class="ml-4 text-blue-500">Categories</a>  
                <a href="{{ route('tags.index') }}" class="ml-4 text-blue-500">Tags</a>  
            </nav>  
        </header>  

        @if(session('success'))  
            <div class="bg-green-500 text-white p-2 rounded mb-4">  
                {{ session('success') }}  
            </div>  
        @endif  

        @yield('content')  
    </div>  
</body>  
</html>