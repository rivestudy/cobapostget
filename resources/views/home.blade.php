<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

<body>
    <!-- resources/views/home.blade.php -->
    <div class=""
    style="{{ $customizations->display_preview_bg }}">
        <h1>Welcome, {{ Auth::user()->name }}</h1>

        @if ($customizations)
            <div class="mx-auto overflow-hidden w-[420px] xl:w-[420px] h-[900px] mt-6 xl:mt-0"
                style="z-index: -10 ; ">
                {{-- Container Utama --}}
                <div class="{{ $customizations->display_preview_class }} overflow-y-auto "
                    style="z-index: -4; {{ $customizations->display_preview_fc }}"
                    id="displayPreview">
                    <div class="bg-gray-200">
                        @if ($customizations->banner)
                            <img class="object-cover h-[190px] w-full"
                                src="{{ asset('storage/' . $customizations->banner) }}" id="bannerPreview"
                                alt="Banner">
                        @endif
                    </div>
                    <div>
                        <div class="w-24 mx-auto bg-gray-600 rounded-full">
                            @if ($customizations->profile)
                                <img class="object-cover w-24 h-24 -mt-12 rounded-full text-bold"
                                    src="{{ asset('storage/' . $customizations->profile) }}" id="profilePreview"
                                    alt="Profile">
                            @endif
                        </div>
                        <h1 class="mb-2 text-xl font-bold text-center break-words whitespace-normal Title"
                            id="titlePreview">{{ $customizations->title }}</h1>
                        <p class="mb-4 text-center break-words whitespace-normal About" id="aboutPreview">
                            {{ $customizations->about }}</p>
                        <div id="linkContainer"
                            class="flex flex-wrap justify-center p-2 mx-auto space-x-2 previewButtons">
                            @foreach ($socialButtons as $index => $socialButton)
                                <div class="mb-2 social-button-wrapper" data-id="{{ $index }}">
                                    <a class="{{ $socialButton->icon }}" href="{{ $socialButton->url }}"></a>
                                </div>
                            @endforeach
                        </div>
                        <div id="buttonContainer" class="justify-center w-full px-2 mt-4 text-center">
                            @foreach ($linkButtons as $index => $linkButton)
                                <div class="mb-2 link-button-wrapper" data-id="{{ $index }}">
                                    <div class="z-20 mx-auto w-[390px] h-[70px] flex items-center justify-center">
                                        <a class="z-20 text-center link-buttons"
                                            href="{{ $linkButton->url }}">{{ $linkButton->text }}</a>
                                    </div>
                                    <div class="{{ $customizations->display_btn_prop }}"
                                        style="background: {{ $customizations->display_btn_style }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>No customizations found.</p>
        @endif

        <a href="{{ route('customization.edit') }}">Edit</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

</body>

</html>
