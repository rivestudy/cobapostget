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
    <div class="w-full bg-gray-300 text-xl font-bold">
        <!-- resources/views/customization/create.blade.php -->

        <div class="container">
            <h1>Create Customization</h1>
            <form id="previewForm" class="space-y-4" action="{{ route('customization.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <label for="displayPreviewInput">Input display class</label>
                <input type="text" name="display_preview_class" id="displayPreviewInput" value="">
                <br>

                <label for="titlePreviewInput">Input title text</label>
                <input type="text" name="title" id="titlePreviewInput" value="Title">
                <br>

                <label for="aboutPreviewInput">Input about text</label>
                <input type="text" name="about" id="aboutPreviewInput" value="About goes here">
                <br>

                <input type="file" name="banner" id="bannerFileInput" class="" accept="image/*"
                    onchange="previewImage('bannerFileInput', 'bannerPreview')">
                <input type="file" name="profile" id="profileFileInput" class="" accept="image/*"
                    onchange="previewImage('profileFileInput', 'profilePreview')">

                <button class="p-2 bg-white" type="submit">Save Previews</button>
            </form>
        </div>

        <div
            class="mx-auto overflow-hidden rounded-3xl border-8 border-black bg-black w-[380px] xl:w-[380px] h-[800px] mt-6 xl:mt-0">
            <h1 class="w-full px-3 text-right text-white bg-gray-400 rounded-t-2xl">5G ᯤ | 50%</h1>
            <div class="h-[170px] w-full bg-gray-300">
                <img class="max-h-[170px] w-full object-cover" src="" id="bannerPreview" alt="Banner">
            </div>
            <div class="display px-3 pt-2 my-auto h-full max-h-[670px] mb-0 w-full bg-white flex-grow-1 rounded-b-2xl"
                id="displayPreview">
                <div class="">
                    <img src="{{ asset('asset/pp.png') }}"
                        class="size-[90px] object-cover rounded-full mx-auto bg-gray-400 border border-black -mt-12 mb-2 "
                        id="profilePreview" alt="Profile">
                </div>
                <h1 class="mb-2 text-xl font-bold text-center break-words whitespace-normal Title" id="titlePreview">
                    Title</h1>
                <p class="mb-4 text-center break-words whitespace-normal About" id="aboutPreview">About goes
                    here.</p>

                <div id="linkContainer" class="flex justify-center mx-auto space-x-2 previewButtons"></div>
                <!-- generated social media buttons here, example <a href=""></a> -->
                <div id="buttonContainer" class="justify-center w-full mt-4 space-y-2"></div>
                <!-- generated link buttons here, example <a href=""></a> -->
            </div>
        </div>
        <button class="p-2 bg-white" onclick="setProps()">test</button>
    </div>

    <script>
        function setProps() {
            document.getElementById('displayPreviewInput').value = document.getElementById('displayPreview').className;
            document.getElementById('titlePreviewInput').value = document.getElementById('titlePreview').innerText;
            document.getElementById('aboutPreviewInput').value = document.getElementById('aboutPreview').innerText;

            // Clear previous hidden inputs
            document.getElementById('socialButtonsContainer').innerHTML = '';
            document.getElementById('linkButtonsContainer').innerHTML = '';

            // Set values for social buttons
            const socialButtons = document.querySelectorAll('.social-button');
            socialButtons.forEach((button, index) => {
                let inputUrl = document.createElement('input');
                inputUrl.type = 'hidden';
                inputUrl.name = `socialButtons[${index}][url]`;
                inputUrl.value = button.href;
                document.getElementById('socialButtonsContainer').appendChild(inputUrl);

                let inputIcon = document.createElement('input');
                inputIcon.type = 'hidden';
                inputIcon.name = `socialButtons[${index}][icon]`;
                inputIcon.value = button.innerHTML;
                document.getElementById('socialButtonsContainer').appendChild(inputIcon);
            });

            // Set values for link buttons
            const linkButtons = document.querySelectorAll('.link-button');
            linkButtons.forEach((button, index) => {
                let inputText = document.createElement('input');
                inputText.type = 'hidden';
                inputText.name = `linkButtons[${index}][text]`;
                inputText.value = button.textContent;
                document.getElementById('linkButtonsContainer').appendChild(inputText);

                let inputUrl = document.createElement('input');
                inputUrl.type = 'hidden';
                inputUrl.name = `linkButtons[${index}][url]`;
                inputUrl.value = button.href;
                document.getElementById('linkButtonsContainer').appendChild(inputUrl);
            });

            return true;
        }

        function previewImage(inputId, imgId) {
            const input = document.getElementById(inputId);
            const img = document.getElementById(imgId);
            const reader = new FileReader();

            reader.onload = function(e) {
                img.src = e.target.result;
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('profile-icon').addEventListener('click', function(event) {
            event.stopPropagation();
            var dropdown = document.getElementById('dropdown-menu');
            dropdown.classList.toggle('hidden');
        });
        document.addEventListener('click', function(event) {
            var dropdown = document.getElementById('dropdown-menu');
            if (!dropdown.classList.contains('hidden') && !event.target.closest('#dropdown-menu')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>

</html>
