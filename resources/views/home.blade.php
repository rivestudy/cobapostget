<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <!-- resources/views/home.blade.php -->
    <div class="container">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
    
        @if($customizations)
        <div class="customization-preview">
            <h2>{{ $customizations->titlePreview }}</h2>
            <p>{{ $customizations->aboutPreview }}</p>
            @if($customizations->banner)
            <img src="{{ asset('storage/' . $customizations->banner) }}" alt="Banner">
            @endif
            @if($customizations->profile)
            <img src="{{ asset('storage/' . $customizations->profile) }}" alt="Profile">
            @endif
            <div class="{{ $customizations->displayPreviewClass }}">
                <!-- Custom display preview -->
            </div>
        </div>
        @else
        <p>No customizations found.</p>
        @endif
    
        <a href="{{ route('customization.edit') }}">Create Customization</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

</body>
</html>