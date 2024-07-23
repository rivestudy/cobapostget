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
        <div
                    class="mx-auto overflow-hidden rounded-3xl border-8 border-black bg-black w-[420px] xl:w-[420px] h-[900px] mt-6 xl:mt-0">
                    <h1 class="w-full px-3 text-right text-white bg-gray-400 rounded-t-2xl">5G ᯤ | 50%</h1>
                    <div class="bg-gray-200">
                        @if ($customizations->banner)
                            <img class="object-cover h-[190px] w-full" src="{{ asset('storage/' . $customizations->banner) }}" id="bannerPreview"
                                alt="Banner">
                        @endif
                    </div>
                    <div class="{{ $customizations->display_preview_class }} displayPreview" style="{{ $customizations->display_preview_bg }} {{ $customizations->display_preview_fc }}" id="displayPreview">
                        <div class="w-24 mx-auto bg-gray-600 rounded-full">
                            @if ($customizations->profile)
                                <img class="object-cover w-24 h-24 -mt-12 rounded-full" src="{{ asset('storage/' . $customizations->profile) }}" id="profilePreview"
                                    alt="Profile">
                            @endif
                        </div>
                        <h1 class="mb-2 text-xl font-bold text-center break-words whitespace-normal Title"
                            id="titlePreview">
                            {{ $customizations->title }}</h1>
                        <p class="mb-4 text-center break-words whitespace-normal About" id="aboutPreview">
                            {{ $customizations->about }}</p>
                        <div id="linkContainer" class="flex justify-center mx-auto space-x-2 previewButtons"></div>
                        <div id="buttonContainer" class="justify-center w-full mt-4 space-y-2"></div>
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