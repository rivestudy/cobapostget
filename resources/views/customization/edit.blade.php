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

<body class="w-full xl:flex">
    {{-- Area Kustomisasi --}}
    <div class="w-full xl:w-2/3">
        <x-customization-box :customizations="$customization" :social-buttons="$socialButtons" :link-buttons="$linkButtons">
            {{-- Hidden POST Form  --}}
            <div class="justify-end w-full">
                <form method="POST" class="flex justify-end space-y-4" id="previewForm"
                    action="{{ route('customization.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    {{-- Tampilan --}}
                    <input type="text" name="display_preview_class" class="hidden" id="displayPreviewInput"
                        value="{{ $customization->display_preview_class }}">
                    {{-- Background --}}
                    <input type="text" name="display_preview_bg" class="hidden" id="displayPreviewBg"
                        value="{{ $customization->display_preview_bg }}">
                    {{-- Slug / Custom Link --}}
                    <input type="text" name="slug_input" id="slug_input" class="hidden"
                        value="{{ $customization->slug }}">
                    {{-- Title --}}
                    <input type="text" name="title_input" id="titlePreviewInput" class="hidden"
                        value="{{ $customization->title }}">
                    {{-- About --}}
                    <input type="text" name="about_input" id="aboutPreviewInput" class="hidden"
                        value="{{ $customization->about }}">
                    {{-- Banner --}}
                    <input type="file" name="banner" id="bannerFileInput" class="hidden" accept="image/*"
                        oninput="previewImage('bannerFileInput', 'bannerPreview')">
                    {{-- PP --}}
                    <input type="file" name="profile" id="profileFileInput" class="hidden" accept="image/*"
                        oninput="previewImage('profileFileInput', 'profilePreview')">
                    {{-- Link Sosmed --}}
                    <div class="hidden" id="socialButtonsContainer"></div>
                    {{-- Link Tombol --}}
                    <div class="hidden" id="linkButtonsContainer"></div>
                    <button class="p-2 px-4 font-bold text-white bg-green-500 rounded-lg" type="submit"
                        onclick="setProps()">Save Previews</button>
                </form>
            </div>
        </x-customization-box>
    </div>
    {{-- Area Preview --}}
    <div class="sticky top-0 w-full p-4 text-xl font-bold bg-gray-300 xl:w-1/3" style="max-height:100vh">
        <div
            class="mx-auto overflow-hidden rounded-3xl border-8 border-black bg-black w-[420px] xl:w-[420px] h-[900px] mt-6 xl:mt-0">
            {{-- Header Notif Bar --}}
            <h1 class="sticky top-0 w-full px-3 text-right text-white bg-gray-400 rounded-t-2xl">5G ᯤ | 50%</h1>
            {{-- Container Utama --}}
            <div class="{{ $customization->display_preview_class }}"
                style="{{ $customization->display_preview_bg }} {{ $customization->display_preview_fc }}"
                id="displayPreview">
                <div class="bg-gray-200">
                    @if ($customization->banner)
                        <img class="object-cover h-[190px] w-full"
                            src="{{ asset('storage/' . $customization->banner) }}" id="bannerPreview" alt="Banner">
                    @endif
                </div>
                <div>
                    <div class="w-24 mx-auto bg-gray-600 rounded-full">
                        @if ($customization->profile)
                            <img class="object-cover w-24 h-24 -mt-12 rounded-full"
                                src="{{ asset('storage/' . $customization->profile) }}" id="profilePreview"
                                alt="Profile">
                        @endif
                    </div>
                    <h1 class="mb-2 text-xl font-bold text-center break-words whitespace-normal Title"
                        id="titlePreview">{{ $customization->title }}</h1>
                    <p class="mb-4 text-center break-words whitespace-normal About" id="aboutPreview">
                        {{ $customization->about }}</p>
                    <div id="linkContainer" class="flex flex-wrap justify-center p-2 mx-auto space-x-2 previewButtons">
                        @foreach ($socialButtons as $index => $socialButton)
                            <div class="mb-2 social-button-wrapper" data-id="{{ $index }}">
                                <a class="{{ $socialButton->icon }}" href="{{ $socialButton->url }}"></a>
                            </div>
                        @endforeach
                    </div>
                    <div id="buttonContainer" class="justify-center w-full px-2 mt-4 space-y-2">
                        @foreach ($linkButtons as $index => $linkButton)
                            <div class="link-button-wrapper" data-id="{{ $index }}">
                                <a class="flex-grow block p-2 text-center border border-gray-300 rounded shadow-xl link-button"
                                    href="{{ $linkButton->url }}">{{ $linkButton->text }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        // Kustomisasi Font & BG
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
            // Ambil dri Database
            const databg = @json($customization->display_preview_bg);
            const datafont = @json($customization->display_preview_font);
            const datafc = @json($customization->display_preview_fc);
            const displayElement = document.querySelector('.displayPreview');

            if (dataset.background === '') {
                displayElement.className =
                    `no-scrollbar overflow-y-auto displayPreview  my-auto h-full mb-0 w-full flex-grow-1 rounded-b-2xl font-${dataset.font}`;
                displayElement.style.backgroundImage = databg;
            } else if (dataset.font === '') {
                displayElement.className =
                    `no-scrollbar overflow-y-auto displayPreview my-auto h-full mb-0 w-full ${datafont} flex-grow-1 rounded-b-2xl`;
                displayElement.style.backgroundImage = dataset.background;
            } else {
                displayElement.className =
                    `no-scrollbar overflow-y-auto displayPreview my-auto h-full mb-0 w-full flex-grow-1 rounded-b-2xl font-${dataset.font}`;
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

        //Popup Custom Warna
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

        //Input Gambar Banner & PP
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

        //Kirim data kustomisasi ke hidden Form
        function setProps() {
            const slugInput = document.getElementById('slug_input');
            const displayPreviewInput = document.getElementById('displayPreviewInput');
            const displayPreview = document.querySelector('.displayPreview');
            const titlePreviewInput = document.getElementById('titlePreviewInput');
            const aboutPreviewInput = document.getElementById('aboutPreviewInput');
            const socialButtonsContainer = document.getElementById('socialButtonsContainer');
            const linkButtonsContainer = document.getElementById('linkButtonsContainer');

            displayPreviewInput.value = displayPreview.className;
            document.getElementById('displayPreviewBg').value =
                `background-image: ${displayPreview.style.backgroundImage}; color: ${displayPreview.style.color}`;
            titlePreviewInput.value = document.getElementById('titlePreview').innerText;
            aboutPreviewInput.value = document.getElementById('aboutPreview').innerText;
            slugInput.value = document.getElementById('slugInput').value;

            // Clear containers
            socialButtonsContainer.innerHTML = '';
            linkButtonsContainer.innerHTML = '';

            //Ambil data Tombol
            const socialButtons = document.querySelectorAll('.social-button');
            socialButtons.forEach((button, index) => {
                console.log('Adding social button input', index);
                let inputUrl = document.createElement('input');
                inputUrl.type = 'text';
                inputUrl.name = `socialButtons[${index}][url]`;
                inputUrl.value = button.href;
                socialButtonsContainer.appendChild(inputUrl);

                let inputIcon = document.createElement('input');
                inputIcon.type = 'text';
                inputIcon.name = `socialButtons[${index}][icon]`;
                inputIcon.value = button.className;
                socialButtonsContainer.appendChild(inputIcon);
            });
            const linkButtons = document.querySelectorAll('.link-button');
            linkButtons.forEach((button, index) => {
                console.log('Adding link button input', index);
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
        // Preview image
        function previewImage(inputId, imgId) {
            const input = document.getElementById(inputId);
            const img = document.getElementById(imgId);
            const reader = new FileReader();

            // Cek ukuran
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const fileSize = file.size; // in bytes
                const maxSize = 2 * 1024 * 1024; // 2 MB

                if (fileSize > maxSize) {
                    alert('File size exceeds 2 MB. Please choose a smaller file.');
                    input.value = '';
                    return;
                }
                reader.onload = function(e) {
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        // Load data dri database
        window.addEventListener('DOMContentLoaded', function() {
            const profileImg = document.getElementById('profilePreview');
            const bannerImg = document.getElementById('bannerPreview');
            @if ($customization->profile)
                profileImg.src = "{{ asset('storage/' . $customization->profile) }}";
            @endif
            @if ($customization->banner)
                bannerImg.src = "{{ asset('storage/' . $customization->banner) }}";
            @endif
        });

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

        // Update teks ketika input
        function updateTitle() {
            const titletext = document.getElementById('titleInput').value;
            document.querySelector(`.Title`).innerText = titletext;
        }

        function updateAbout() {
            const abouttext = document.getElementById('aboutInput').value;
            document.querySelector(`.About`).innerText = abouttext;
        }

        //Load tombol sosmed
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($socialButtons as $index => $socialButton)
                createExistingLink('{{ $socialButton->icon }}', '{{ $socialButton->url }}',
                    '{{ $index }}');
            @endforeach
        });

        function createExistingLink(iconClass, url, id) {
            const createElement = (type, classes, value = '') => {
                const el = document.createElement(type);
                el.className = classes;
                el.value = value;
                return el;
            };

            const linkContainer = document.getElementById('linkContainer');
            const linkWrapper = createElement('div', 'social-button-wrapper', '');
            linkWrapper.setAttribute('data-id', id);

            const linkButton = createElement('a', `flex items-center social-button ${iconClass} text-xl`, '');
            linkButton.href = url;

            linkWrapper.appendChild(linkButton);
            linkContainer.appendChild(linkWrapper);
        }

        function generateLinkInput() {
            const linkInputValue = document.getElementById('newLinkInput').value.trim();
            const iconSelect = document.getElementById('newIconSelect');
            const iconClass = iconSelect.value;

            if (!linkInputValue) return alert('Please enter a link first.');
            if (!iconClass) return alert('Please select an icon.');

            const newId = Date.now(); // Use a unique ID for new elements
            createNewLink(iconClass, linkInputValue, newId);
            document.getElementById('newLinkInput').value = '';
            iconSelect.selectedIndex = 0;
        }

        function createNewLink(iconClass, url, id) {
            const createElement = (type, classes, value = '') => {
                const el = document.createElement(type);
                el.className = classes;
                el.value = value;
                return el;
            };

            const linkContainer = document.getElementById('linkContainer');
            const linkWrapper = createElement('div', 'social-button-wrapper', '');
            linkWrapper.setAttribute('data-id', id);

            const linkButton = createElement('a', `flex items-center social-button ${iconClass} text-xl`, '');
            linkButton.href = url;

            linkWrapper.appendChild(linkButton);
            linkContainer.appendChild(linkWrapper);

            const linkInputs = document.getElementById('linkInputs');
            const linkInputItem = createElement('div',
                'grid grid-cols-6 mb-2 space-x-2 sm:grid-cols-10 lg:grid-cols-cb link-input-item');
            linkInputItem.setAttribute('data-id', id);

            const inputElement = createElement('input',
                'flex-grow h-full col-span-3 p-2 bg-transparent border border-gray-300 rounded-lg sm:col-span-5 lg:col-span-10',
                url);
            inputElement.setAttribute('data-icon', iconClass);
            inputElement.addEventListener('input', function() {
                updateLink(id);
            });

            const iconDropdown = createElement('select',
                'flex-grow h-full col-span-2 p-2 bg-transparent border border-gray-300 rounded-lg sm:col-span-4 lg:col-span-5 icon-select'
            );
            iconDropdown.innerHTML = document.getElementById('newIconSelect').innerHTML;
            iconDropdown.value = iconClass;
            iconDropdown.addEventListener('change', function() {
                updateLink(id);
            });

            const deleteButton = createElement('button', '', '');
            deleteButton.innerHTML = '<i class="block py-2 text-white bg-red-500 rounded-lg bi bi-trash"></i>'
            deleteButton.onclick = () => removeLink(deleteButton, id);

            linkInputItem.append(inputElement, iconDropdown, deleteButton);
            linkInputs.appendChild(linkInputItem);
        }

        function removeLink(button, id) {
            const linkInputItem = document.querySelector(`#linkInputs .link-input-item[data-id="${id}"]`);
            if (linkInputItem) linkInputItem.remove();

            const linkWrapper = document.querySelector(`#linkContainer .social-button-wrapper[data-id="${id}"]`);
            if (linkWrapper) linkWrapper.remove();

            console.log(`Link with ID ${id} removed.`);
        }

        function updateLink(id) {
            const linkInputItem = document.querySelector(`#linkInputs .link-input-item[data-id="${id}"]`);
            if (!linkInputItem) return;

            const inputElement = linkInputItem.querySelector('input');
            const iconDropdown = linkInputItem.querySelector('.icon-select');
            const newUrl = inputElement.value.trim();
            const newIconClass = iconDropdown.value;

            if (!newUrl || !newIconClass) {
                alert('Both URL and icon must be set.');
                return;
            }

            const linkWrapper = document.querySelector(`#linkContainer .social-button-wrapper[data-id="${id}"]`);
            if (linkWrapper) {
                const linkButton = linkWrapper.querySelector('a');
                linkButton.href = newUrl;
                linkButton.className = `flex items-center social-button ${newIconClass} text-xl`;
            }

            console.log(`Link with ID ${id} updated. URL: ${newUrl}, Icon: ${newIconClass}`);
        }

        //Load tombol link
        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($linkButtons as $index => $linkButton)
                createExistingLinkButton('{{ $linkButton->text }}', '{{ $linkButton->url }}',
                    '{{ $index }}');
            @endforeach
        });

        function createExistingLinkButton(text, url, id) {
            const linkContainer = document.getElementById('buttonContainer');
            const buttonWrapper = document.createElement('div');
            buttonWrapper.className = 'link-button-wrapper';
            buttonWrapper.setAttribute('data-id', id);

            const linkButton = document.createElement('a');
            linkButton.className = 'flex-grow block p-2 text-center border border-gray-300 rounded shadow-xl link-button';
            linkButton.href = url;
            linkButton.textContent = text;

            buttonWrapper.appendChild(linkButton);
            linkContainer.appendChild(buttonWrapper);
        }

        function addLinkButton() {
            const textInput = document.getElementById('textInput').value.trim();
            const urlInput = document.getElementById('urlInput').value.trim();
            if (!textInput || !urlInput) return;

            const newId = Date.now();
            createNewLinkButton(textInput, urlInput, newId);

            document.getElementById('textInput').value = '';
            document.getElementById('urlInput').value = '';
        }

        function createNewLinkButton(text, url, id) {
            const linkContainer = document.getElementById('linkContainers');
            const buttonContainer = document.getElementById('buttonContainer');

            const linkInputItem = document.createElement('div');
            linkInputItem.className = 'grid grid-cols-6 mb-2 space-x-2 sm:grid-cols-10 lg:grid-cols-cb link-input-item';
            linkInputItem.setAttribute('data-id', id);

            const textElement = document.createElement('input');
            textElement.className =
                'flex-grow h-full col-span-2 p-2 bg-transparent border border-gray-300 rounded-lg sm:col-span-4 lg:col-span-7';
            textElement.value = text;
            textElement.dataset.url = url;
            textElement.addEventListener('input', function() {
                updateLinkButton(id);
            });

            const urlElement = document.createElement('input');
            urlElement.className =
                'flex-grow h-full col-span-3 p-2 bg-transparent border border-gray-300 rounded-lg sm:col-span-5 lg:col-span-8';
            urlElement.value = url;
            urlElement.addEventListener('input', function() {
                updateLinkButton(id);
            });

            const deleteButton = document.createElement('button');
            deleteButton.className = 'items-center justify-center flex-grow col-span-1';
            deleteButton.innerHTML = '<i class="block py-2 text-white bg-red-500 rounded-lg bi bi-trash"></i>';
            deleteButton.onclick = () => removeLinkButton(deleteButton, id);

            linkInputItem.append(textElement, urlElement, deleteButton);
            linkContainer.appendChild(linkInputItem);

            const buttonWrapper = document.createElement('div');
            buttonWrapper.className = 'link-button-wrapper';
            buttonWrapper.setAttribute('data-id', id);

            const newButton = document.createElement('a');
            newButton.className = 'flex-grow block p-2 text-center border border-gray-300 rounded shadow-xl link-button';
            newButton.href = url;
            newButton.textContent = text;

            buttonWrapper.appendChild(newButton);
            buttonContainer.appendChild(buttonWrapper);
        }

        function updateLinkButton(id) {
            const linkInputItem = document.querySelector(`#linkContainers .link-input-item[data-id="${id}"]`);
            if (!linkInputItem) return;

            const textElement = linkInputItem.querySelector('input:nth-child(1)');
            const urlElement = linkInputItem.querySelector('input:nth-child(2)');
            const newText = textElement.value.trim();
            const newUrl = urlElement.value.trim();

            if (!newText || !newUrl) {
                alert('Text and URL fields cannot be empty.');
                return;
            }

            const buttonWrapper = document.querySelector(`#buttonContainer .link-button-wrapper[data-id="${id}"]`);
            if (buttonWrapper) {
                const linkButton = buttonWrapper.querySelector('a');
                linkButton.href = newUrl;
                linkButton.textContent = newText;
            }
        }

        function removeLinkButton(button, id) {
            const linkInputItem = document.querySelector(`#linkContainers .link-input-item[data-id="${id}"]`);
            if (linkInputItem) linkInputItem.remove();

            const buttonWrapper = document.querySelector(`#buttonContainer .link-button-wrapper[data-id="${id}"]`);
            if (buttonWrapper) buttonWrapper.remove();
        }
    </script>
</body>

</html>
