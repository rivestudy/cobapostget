<style>
    .size-8 {
        width: 32px;
        height: 32px;
    }

    #filbanner {
        display: none;
    }

    #filprofile {
        display: none;
    }
</style>
<div class="flex-grow max-w-full p-8 shadow-2xl customizations">
    <div class="flex-grow mb-3">
        <h3 class="font-bold">Custom Link</h3>
        <div class="p-3 bg-white rounded-lg shadow-lg">
            <div class="flex items-center my-auto mb-0 space-x-2 rounded-lg h-11">
                 <p class="font-bold">cdlink.id/</p>
                <textarea class="flex-grow w-full h-full max-h-full min-h-full p-2 border border-gray-300 rounded-lg" id="slugInput"
                    placeholder="linksaya">{{ $customizations->slug }}</textarea>
            </div>
        </div>
    </div>
    <div class="flex space-x-6">
        <div class="w-1/2">
            <h3 class="font-bold">Banner</h3>
            <div class="p-3 bg-white rounded-lg shadow-lg mb-">
                <div class="flex flex-col justify-between mb-0 overflow-hidden border border-gray-300 rounded-lg h-14">
                    <div class="flex flex-col justify-end h-full p-2 space-y-2 mb" action="">
                        <div class="flex justify-center md:space-x-2 md:justify-end">
                            <h1 class="hidden mx-auto my-auto font-light text-center text-gray-400 md:block">Ukuran
                                optimal 800 x 400px, 1:2</h1>
                            <label for="bannerFileInput"
                                class="w-full p-2 text-center text-white bg-green-500 rounded cursor-pointer md:w-auto">Upload</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/2">
            <h3 class="font-bold">Profile</h3>
            <div class="p-3 mb-3 bg-white rounded-lg shadow-lg">
                <div class="flex flex-col justify-between mb-0 overflow-hidden border border-gray-300 rounded-lg h-14">
                    <div class="flex flex-col justify-end h-full p-2 space-y-2 mb" action="">
                        <div class="flex justify-center md:space-x-2 md:justify-end">
                            <h1 class="hidden mx-auto my-auto font-light text-center text-gray-400 md:block">Ukuran
                                optimal 400 x 400px, 1:1</h1>
                            <label for="profileFileInput"
                                class="w-full p-2 text-center text-white bg-green-500 rounded cursor-pointer md:w-auto">Upload</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-grow mb-3">
        <h3 class="font-bold">Title</h3>
        <div class="p-3 bg-white rounded-lg shadow-lg">
            <div class="flex mb-0 space-x-2 h-11">
                <textarea maxlength="100" class="flex-grow w-full h-full max-h-full min-h-full p-2 border border-gray-300 rounded-lg"
                    id="titleInput" placeholder="Masukkan Teks" oninput="updateTitle()">{{ $customizations->title }}</textarea>
            </div>
        </div>
    </div>
    <div class="flex-grow mb-3">
        <h3 class="font-bold">About</h3>
        <div class="p-3 bg-white rounded-lg shadow-lg">
            <div class="flex mb-0 space-x-2 rounded-lg h-28">
                <textarea class="flex-grow w-full h-full max-h-full min-h-full p-2 bg-transparent border border-gray-300 rounded-lg"
                    id="aboutInput" placeholder="Masukkan Teks" oninput="updateAbout()">{{ $customizations->about }}</textarea>
            </div>
        </div>
    </div>
    <div class="flex-grow mb-3">
        <h3 class="font-bold">Social Media</h3>
        <div class="p-3 bg-white rounded-lg shadow-lg">
            <div class="flex items-center mt-4 space-x-2">
                <input type="text" id="newLinkInput" class="flex-grow p-2 border border-gray-300 rounded-lg"
                    placeholder="Enter Link">
                <select id="newIconSelect" class="flex w-[22.5%] p-2 border border-gray-300 rounded-lg">
                    <option value="" disabled selected>Select Icon</option>
                    <option value="bi-envelope-fill">Envelope</option>
                    <option value="bi-whatsapp">WhatsApp</option>
                    <option value="bi-linkedin">LinkedIn</option>
                    <option value="bi-instagram">Instagram</option>
                    <option value="bi-twitter-x">Twitter</option>
                    <option value="bi-youtube">YouTube</option>
                    <option value="bi-telegram">Telegram</option>
                    <option value="bi-facebook">Facebook</option>
                    <option value="bi-discord">Discord</option>
                    <option value="bi-link-45deg">Link</option>
                </select>
                <button class="px-4 py-2 text-white bg-blue-500 rounded-lg " onclick="generateLinkInput()">+</button>
            </div>
            <div id="linkInputs" class="mt-2 space-y-2">
                @foreach ($socialButtons as $index => $socialButton)
                    <div class="flex items-center space-x-2 link-input-item" data-id="{{ $index }}">
                        <input type="text" class="flex-grow p-2 border border-gray-300 rounded-lg"
                            value="{{ $socialButton->url }}" data-icon="{{ $socialButton->icon }}">
                        <select class="flex w-1/6 p-2 border border-gray-300 rounded-lg icon-select">
                            <option value="bi-envelope-fill"
                                {{ $socialButton->icon === 'bi-envelope-fill' ? 'selected' : '' }}>Envelope</option>
                            <option value="bi-whatsapp" {{ $socialButton->icon === 'bi-whatsapp' ? 'selected' : '' }}>
                                WhatsApp</option>
                            <option value="bi-linkedin" {{ $socialButton->icon === 'bi-linkedin' ? 'selected' : '' }}>
                                LinkedIn</option>
                            <option value="bi-instagram" {{ $socialButton->icon === 'bi-instagram' ? 'selected' : '' }}>
                                Instagram</option>
                            <option value="bi-twitter-x" {{ $socialButton->icon === 'bi-twitter-x' ? 'selected' : '' }}>
                                Twitter</option>
                            <option value="bi-youtube" {{ $socialButton->icon === 'bi-youtube' ? 'selected' : '' }}>
                                YouTube</option>
                            <option value="bi-telegram" {{ $socialButton->icon === 'bi-telegram' ? 'selected' : '' }}>
                                Telegram</option>
                            <option value="bi-facebook" {{ $socialButton->icon === 'bi-facebook' ? 'selected' : '' }}>
                                Facebook</option>
                            <option value="bi-discord" {{ $socialButton->icon === 'bi-discord' ? 'selected' : '' }}>
                                Discord</option>
                            <option value="bi-link-45deg"
                                {{ $socialButton->icon === 'bi-link-45deg' ? 'selected' : '' }}>Link</option>
                        </select>
                        <button class="px-4 py-2 text-white bg-blue-500 rounded-lg "
                            onclick="updateLink({{ $index }})">Update</button>
                        <button class="px-4 py-2 text-white bg-red-500 rounded-lg"
                            onclick="removeLink(this, {{ $index }})">X</button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="flex-grow mb-3">
        <h3 class="font-bold">Button Links</h3>
        <div class="p-3 bg-white rounded-lg shadow-lg">
            <div class="flex mb-4 space-x-2">
                <input type="text"
                    class="flex-grow w-full h-full p-2 bg-transparent border border-gray-300 rounded-lg"
                    placeholder="Enter text" id="textInput">
                <input type="text"
                    class="flex-grow w-full h-full p-2 bg-transparent border border-gray-300 rounded-lg"
                    placeholder="Enter link" id="urlInput">
                <button class="px-4 py-2 text-white bg-green-500 rounded-lg" onclick="addLinkButton()">
                    <i class="bi bi-plus-lg"></i>
                </button>
            </div>
            <div id="linkContainers" class="space-y-2">
                @foreach ($linkButtons as $index => $linkButton)
                    <div class="flex items-center space-x-2 link-input-item" data-id="{{ $index }}">
                        <input type="text" class="flex-grow p-2 border border-gray-300 rounded-lg"
                            value="{{ $linkButton->text }}" data-url="{{ $linkButton->url }}">
                        <input type="text" class="flex-grow p-2 border border-gray-300 rounded-lg"
                            value="{{ $linkButton->url }}">
                        <button class="px-4 py-2 text-white bg-blue-500 rounded-lg"
                            onclick="updateLinkButton({{ $index }})">
                            Update
                        </button>
                        <button class="px-4 py-2 text-white bg-red-500 rounded-lg"
                            onclick="removeLinkButton(this, {{ $index }})">
                            X
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    

    <div class="flex-grow mb-3">
        <h3 class="font-bold">Font</h3>
        <div class="p-3 bg-white rounded-lg shadow">
            <div class="grid w-full grid-cols-2 mx-auto gap-x-2 sm:grid-cols-4 lg:grid-cols-5">
                <x-button class="w-full font-montserrat" onclick="changeFont('montserrat')">Montserrat</x-button>
                <x-button class="w-full font-roboto" onclick="changeFont('roboto')">Roboto</x-button>
                <x-button class="w-full font-baskervville"
                    onclick="changeFont('baskervville')">Baskervville</x-button>
                <x-button class="w-full font-opensans" onclick="changeFont('opensans')">Open Sans</x-button>
                <x-button class="w-full font-lato" onclick="changeFont('lato')">Lato</x-button>
                <x-button class="w-full font-lora" onclick="changeFont('lora')">Lora</x-button>
                <x-button class="w-full font-inter" onclick="changeFont('inter')">Inter</x-button>
                <x-button class="w-full font-ubuntu" onclick="changeFont('ubuntu')">Ubuntu</x-button>
                <x-button class="w-full font-bebasneue" onclick="changeFont('bebasneue')">Bebas Neue</x-button>
                <x-button class="w-full font-rowdies" onclick="changeFont('rowdies')">Rowdies</x-button>
                <x-button class="w-full font-abrilfatface" onclick="changeFont('abrilfatface')">Abril
                    Fatface</x-button>
                <x-button class="w-full font-orbitron" onclick="changeFont('orbitron')">Orbitron</x-button>
                <x-button class="w-full font-poppins" onclick="changeFont('poppins')">Poppins</x-button>
                <x-button class="w-full font-sourcecodepro" onclick="changeFont('sourcecodepro')">Source
                    Code</x-button>
                <x-button class="w-full font-plusjakartasans" onclick="changeFont('plusjakartasans')">Plus Jakarta
                    Sans</x-button>
                <x-button class="w-full font-merriweather"
                    onclick="changeFont('merriweather')">Merriweather</x-button>
                <x-button class="w-full font-blackopsone" onclick="changeFont('blackopsone')">Black Ops One</x-button>
                <x-button class="w-full font-rubikmonoone" onclick="changeFont('rubikmonoone')">Rubik Mono</x-button>
                <x-button class="w-full font-merienda" onclick="changeFont('merienda')">Merienda</x-button>
                <x-button class="w-full font-kalam" onclick="changeFont('kalam')">Kalam</x-button>
            </div>
        </div>
    </div>
</div>
