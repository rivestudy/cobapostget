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
    <title>Kustomisasi</title>
</head>

<body class="flex w-full">
    <div class="w-2/3">
        <x-customization-box></x-customization-box>
    </div>
    <div class="w-1/3 text-xl font-bold bg-gray-300">
        <div class="">
            <h1>Edit Customization</h1>
            <form id="previewForm" class="space-y-4" action="{{ route('customization.update') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                <label for="displayPreviewInput">Input display class</label>
                <input type="text" name="display_preview_class" id="displayPreviewInput"
                    value="{{ $customization->display_preview_class }}">
                <br>

                <label for="displayPreviewInput">Input display Bg</label>
                <input type="text" name="display_preview_bg" id="displayPreviewBg"
                    value="{{ $customization->display_preview_bg }}">
                <br>

                <label for="titlePreviewInput">Input title text</label>
                <input type="text" name="title_input" id="titlePreviewInput" value="{{ $customization->title }}">
                <br>

                <label for="aboutPreviewInput">Input about text</label>
                <input type="text" name="about_input" id="aboutPreviewInput" value="{{ $customization->about }}">
                <br>

                <input type="file" name="banner" id="bannerFileInput" class="" accept="image/*"
                    oninput="previewImage('bannerFileInput', 'bannerPreview')">
                <input type="file" name="profile" id="profileFileInput" class="" accept="image/*"
                    oninput="previewImage('profileFileInput', 'profilePreview')">

                <div class="linkButtonsContainer" id="linkButtonsContainer">

                </div>
                <div class="socialButtonsContainer" id="socialButtonsContainer">

                </div>
                <button class="p-2 bg-white" type="submit" onclick="setProps()">Save Previews</button>
                <div
                    class="mx-auto overflow-hidden rounded-3xl border-8 border-black bg-black w-[420px] xl:w-[420px] h-[900px] mt-6 xl:mt-0">
                    <h1 class="w-full px-3 text-right text-white bg-gray-400 rounded-t-2xl">5G ᯤ | 50%</h1>
                    <div class="bg-gray-200">
                        @if ($customization->banner)
                            <img class="object-cover h-[190px] w-full"
                                src="{{ asset('storage/' . $customization->banner) }}" id="bannerPreview"
                                alt="Banner">
                        @endif
                    </div>
                    <div class="{{ $customization->display_preview_class }} displayPreview"
                        style="{{ $customization->display_preview_bg }} {{ $customization->display_preview_fc }}"
                        id="displayPreview">
                        <div class="w-24 mx-auto bg-gray-600 rounded-full">
                            @if ($customization->profile)
                                <img class="object-cover w-24 h-24 -mt-12 rounded-full"
                                    src="{{ asset('storage/' . $customization->profile) }}" id="profilePreview"
                                    alt="Profile">
                            @endif
                        </div>
                        <h1 class="mb-2 text-xl font-bold text-center break-words whitespace-normal Title"
                            id="titlePreview">
                            {{ $customization->title }}</h1>
                        <p class="mb-4 text-center break-words whitespace-normal About" id="aboutPreview">
                            {{ $customization->about }}</p>
                        <div id="linkContainer" class="flex justify-center mx-auto space-x-2 previewButtons"></div>
                        <div id="buttonContainer" class="justify-center w-full mt-4 space-y-2"></div>
                    </div>
                </div>
            </form>
        </div>

        <button class="p-2 bg-white" onclick="setProps()">test</button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        const dataset = {
            font: '',
            background: '',
            fontcolor: ''
        };

        function changeFont(font) {
            dataset.font = font;
            updateDisplay();
        }

        function changeBackground(background) {
            dataset.background = background;
            updateDisplay();
        }

        function applyCustomBackground() {
            const grad1 = document.getElementById('grad-1').value;
            const grad2 = document.getElementById('grad-2').value;
            const direction = document.getElementById('gradient-direction').value;
            const customGradient = `linear-gradient(${direction}, ${grad1}, ${grad2})`;
            dataset.background = customGradient;
            document.getElementById('color1').textContent = grad1;
            document.getElementById('color2').textContent = grad2;
            updateDisplay();
        }

        function changeFontColor(fontcolor) {
            dataset.fontcolor = fontcolor;
            updateDisplay();
        }

        function updateDisplay() {

            //get from database
            const databg = @json($customization->display_preview_bg);
            const datafont = @json($customization->display_preview_font);
            const datafc = @json($customization->display_preview_fc);
            const displayElement = document.querySelector('.displayPreview');


            if (dataset.background === '') {
                displayElement.className =
                    `displayPreview px-3 pt-2 my-auto h-full max-h-[670px] mb-0 w-full flex-grow-1 rounded-b-2xl font-${dataset.font}`;
                displayElement.style.backgroundImage = databg;
            } else if (dataset.font === '') {
                displayElement.className =
                    `displayPreview px-3 pt-2 my-auto h-full max-h-[670px] mb-0 w-full ${datafont} flex-grow-1 rounded-b-2xl`;
                displayElement.style.backgroundImage = dataset.background;
            } else {
                displayElement.className =
                    `displayPreview px-3 pt-2 my-auto h-full max-h-[670px] mb-0 w-full flex-grow-1 rounded-b-2xl font-${dataset.font}`;
                displayElement.style.backgroundImage = dataset.background;
            }

            if (dataset.fontcolor !== '') {
                displayElement.style.color = dataset.fontcolor;
            }
        }

        function changeFontWhite() {
            changeFontColor('white');
        }

        function changeFontBlack() {
            changeFontColor('black');
        }

        function openWarna() {
            document.getElementById('modalWarna').classList.remove('hidden');
        }

        function closeWarna() {
            document.getElementById('modalWarna').classList.add('hidden');
        }

        document.getElementById('font-c').addEventListener('input', function() {
            const fontColor = this.value;
            document.getElementById('font-color-hex').textContent = fontColor;
            changeFontColor(fontColor);
        });

        $(document).ready(function() {
            $("#bannerFileInput, #profileFileInput").change(function() {
                var file = this.files[0];
                var fileSize = (file.size / 1024 / 1024).toFixed(2); // in MB

                if (fileSize > 2) {
                    alert("File size must be less than 2 MB.");
                    $(this).val('');
                    return false;
                }
            });
        });

        function setProps() {
            // Check if the elements exist before accessing them
            const displayPreviewInput = document.getElementById('displayPreviewInput');
            const displayPreview = document.querySelector('.displayPreview');
            const titlePreviewInput = document.getElementById('titlePreviewInput');
            const aboutPreviewInput = document.getElementById('aboutPreviewInput');
            const socialButtonsContainer = document.getElementById('socialButtonsContainer');
            const linkButtonsContainer = document.getElementById('linkButtonsContainer');

            if (!displayPreviewInput || !displayPreview || !titlePreviewInput || !aboutPreviewInput ||
        !socialButtonsContainer || !linkButtonsContainer) {
        console.error('One or more elements not found.');
        return false;
    }

            // Set values for display preview
            displayPreviewInput.value = displayPreview.className;
            document.getElementById('displayPreviewBg').value =
                `background-image: ${displayPreview.style.backgroundImage}; color: ${displayPreview.style.color}`;
            titlePreviewInput.value = document.getElementById('titlePreview').innerText;
            aboutPreviewInput.value = document.getElementById('aboutPreview').innerText;

            // Clear existing content in containers
            socialButtonsContainer.innerHTML = '-';
            linkButtonsContainer.innerHTML = '-';

            // Set values for social buttons
            const socialButtons = document.querySelectorAll('.social-button');
            socialButtons.forEach((button, index) => {
                let inputUrl = document.createElement('input');
                inputUrl.type = 'text';
                inputUrl.name = `socialButtons[${index}][url]`;
                inputUrl.value = button.href;
                socialButtonsContainer.appendChild(inputUrl);

                let inputIcon = document.createElement('input');
                inputIcon.type = 'text';
                inputIcon.name = `socialButtons[${index}][icon]`;
                inputIcon.value = button.innerHTML;
                socialButtonsContainer.appendChild(inputIcon);
            });

            // Set values for link buttons
            const linkButtons = document.querySelectorAll('.link-button');
            linkButtons.forEach((button, index) => {
                let textInput = document.createElement('input');
                textInput.type = 'text';
                textInput.name = `linkButtons[${index}][text]`;
                textInput.value = button.textContent;
                linkButtonsContainer.appendChild(textInput);

                let urlInput = document.createElement('input');
                urlInput.type = 'text';
                urlInput.name = `linkButtons[${index}][url]`;
                urlInput.value = button.href;
                linkButtonsContainer.appendChild(urlInput);
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
        document.getElementById('profile-icon').addEventListener('click', event => {
            event.stopPropagation();
            document.getElementById('dropdown-menu').classList.toggle('hidden');
        });

        document.addEventListener('click', event => {
            if (!event.target.closest('#dropdown-menu')) {
                document.getElementById('dropdown-menu').classList.add('hidden');
            }
        });

        function updateTitle() {
            const titletext = document.getElementById('titleInput').value;
            document.querySelector(`.Title`).innerText = titletext;
        }

        function updateAbout() {
            const abouttext = document.getElementById('aboutInput').value;
            document.querySelector(`.About`).innerText = abouttext;
        }

        function generateLinkInput(iconClass) {
            const linkInputValue = document.getElementById('linkInput').value;
            if (!linkInputValue) return alert('Please enter a link first.');

            const createElement = (type, classes, value = '') => {
                const el = document.createElement(type);
                el.className = classes;
                el.value = value;
                return el;
            };

            const linkInputs = document.getElementById('linkInputs');
            const linkContainer = document.getElementById('linkContainer');
            const linkInputItem = createElement('div', 'flex items-center space-x-2 link-input-item');
            const inputElement = createElement('input', 'flex-grow p-2 border border-gray-300 rounded-lg', linkInputValue);
            const deleteButton = createElement('button',
                'h-full p-2 px-4 text-white bg-red-500 border border-red-500 rounded-lg', 'X');

            const linkButton = createElement('a', 'flex items-center social-button', '');
            linkButton.href = linkInputValue;
            const iconElement = createElement('i', `${iconClass} text-xl`);

            deleteButton.onclick = () => {
                linkInputs.removeChild(linkInputItem);
                linkContainer.removeChild(linkButton);
            };

            linkInputItem.append(inputElement, deleteButton);
            linkInputs.appendChild(linkInputItem);

            linkButton.appendChild(iconElement);
            linkContainer.appendChild(linkButton);

            document.getElementById('linkInput').value = '';
        }

        function addLinkButton() {
            const [textInput, urlInput] = ['textInput', 'urlInput'].map(id => document.getElementById(id).value.trim());
            if (!textInput || !urlInput) return;

            const createElement = (type, classes, value = '') => {
                const el = document.createElement(type);
                el.className = classes;
                el.value = value;
                return el;
            };

            const linkContainer = document.getElementById('linkContainers');
            const buttonContainer = document.getElementById('buttonContainer');
            const linkWrapper = createElement('div', 'flex items-center w-full space-x-2');
            const buttonWrapper = createElement('div', 'flex space-x-2 items-center w-full');
            const newLink = createElement('input', 'flex-grow p-2 border border-gray-300 rounded-lg btnEx', urlInput);
            const newBtnLink = createElement('input', 'flex-grow p-2 border border-gray-300 rounded-lg btnEx', textInput);
            const newButton = createElement('a',
                'block flex-grow p-2 text-center rounded shadow-xl btnEx border border-gray-300 link-button', textInput);

            newLink.oninput = () => newButton.href = newLink.value;
            newBtnLink.oninput = () => newButton.textContent = newBtnLink.value;

            const removeLinkButton = createElement('button',
                'px-4 py-2 bg-red-500 text-white border border-red-500 rounded-lg', 'X');
            removeLinkButton.onclick = () => {
                linkContainer.removeChild(linkWrapper);
                buttonContainer.removeChild(buttonWrapper);
            };

            linkWrapper.append(newBtnLink, newLink, removeLinkButton);
            linkContainer.appendChild(linkWrapper);

            newButton.href = urlInput;
            newButton.textContent = textInput;
            buttonWrapper.appendChild(newButton);
            buttonContainer.appendChild(buttonWrapper);

            ['textInput', 'urlInput'].forEach(id => document.getElementById(id).value = '');
        }
    </script>
</body>

</html>
