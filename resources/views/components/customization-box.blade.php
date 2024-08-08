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

    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .button {
    --fill0-color: white; /* Default color for .fill0 */
    --fill1-color: black; /* Default color for .fill1 */
}
</style>
<div class="flex-grow max-w-full p-8 shadow-2xl customizations">
    {{-- Link Profil --}}
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
    {{-- Gambar --}}
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
    {{-- Judul --}}
    <div class="flex-grow mb-3">
        <h3 class="font-bold">Title</h3>
        <div class="p-3 bg-white rounded-lg shadow-lg">
            <div class="flex mb-0 space-x-2 h-11">
                <textarea maxlength="100" class="flex-grow w-full h-full max-h-full min-h-full p-2 border border-gray-300 rounded-lg"
                    id="titleInput" placeholder="Masukkan Teks" oninput="updateTitle()">{{ $customizations->title }}</textarea>
            </div>
        </div>
    </div>
    {{-- Tentang --}}
    <div class="flex-grow mb-3">
        <h3 class="font-bold">About</h3>
        <div class="p-3 bg-white rounded-lg shadow-lg">
            <div class="flex mb-0 space-x-2 rounded-lg h-28">
                <textarea class="flex-grow w-full h-full max-h-full min-h-full p-2 bg-transparent border border-gray-300 rounded-lg"
                    id="aboutInput" placeholder="Masukkan Teks" oninput="updateAbout()">{{ $customizations->about }}</textarea>
            </div>
        </div>
    </div>
    {{-- Link Medsos --}}
    <div class="flex-grow mb-3">
        <h3 class="font-bold">Social Media</h3>
        <div class="p-3 bg-white rounded-lg shadow-lg">
            <div class="grid grid-cols-6 mb-2 space-x-2 sm:grid-cols-10 lg:grid-cols-cb">
                <input type="text" id="newLinkInput"
                    class="flex-grow h-full col-span-3 p-2 bg-transparent border border-gray-300 rounded-lg sm:col-span-5 lg:col-span-10"
                    placeholder="Enter Link">
                <select id="newIconSelect"
                    class="flex-grow h-full col-span-2 p-2 bg-transparent border border-gray-300 rounded-lg sm:col-span-4 lg:col-span-5">
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
                <button onclick="generateLinkInput()">
                    <i class="block py-2 text-white bg-green-500 rounded-lg bi bi-plus-lg"></i>
                </button>
            </div>
            <div id="linkInputs" class="mt-2 space-y-2">
                @foreach ($socialButtons as $index => $socialButton)
                    <div class="grid grid-cols-6 mb-2 space-x-2 sm:grid-cols-10 lg:grid-cols-cb link-input-item"
                        data-id="{{ $index }}">
                        <input type="text"
                            class="flex-grow h-full col-span-3 p-2 bg-transparent border border-gray-300 rounded-lg sm:col-span-5 lg:col-span-10"
                            value="{{ $socialButton->url }}" data-icon="{{ $socialButton->icon }}"
                            oninput="updateLink({{ $index }})">
                        <?php
                        // Extract data icon
                        $iconClass = '';
                        if (preg_match('/bi-[\w-]+/', $socialButton->icon, $matches)) {
                            $iconClass = $matches[0];
                        }
                        ?>
                        <select id="iconDropdown"
                            class="flex-grow h-full col-span-2 p-2 bg-transparent border border-gray-300 rounded-lg sm:col-span-4 lg:col-span-5 icon-select"
                            onchange="updateLink({{ $index }})">
                            <option value="bi-envelope-fill" {{ $iconClass === 'bi-envelope-fill' ? 'selected' : '' }}>
                                Email</option>
                            <option value="bi-whatsapp" {{ $iconClass === 'bi-whatsapp' ? 'selected' : '' }}>WhatsApp
                            </option>
                            <option value="bi-linkedin" {{ $iconClass === 'bi-linkedin' ? 'selected' : '' }}>LinkedIn
                            </option>
                            <option value="bi-instagram" {{ $iconClass === 'bi-instagram' ? 'selected' : '' }}>
                                Instagram</option>
                            <option value="bi-twitter-x" {{ $iconClass === 'bi-twitter-x' ? 'selected' : '' }}>Twitter
                            </option>
                            <option value="bi-youtube" {{ $iconClass === 'bi-youtube' ? 'selected' : '' }}>YouTube
                            </option>
                            <option value="bi-telegram" {{ $iconClass === 'bi-telegram' ? 'selected' : '' }}>Telegram
                            </option>
                            <option value="bi-facebook" {{ $iconClass === 'bi-facebook' ? 'selected' : '' }}>Facebook
                            </option>
                            <option value="bi-discord" {{ $iconClass === 'bi-discord' ? 'selected' : '' }}>Discord
                            </option>
                            <option value="bi-link-45deg" {{ $iconClass === 'bi-link-45deg' ? 'selected' : '' }}>Link
                            </option>
                        </select>
                        <button onclick="removeLink(this, {{ $index }})">
                            <i class="block py-2 text-white bg-red-500 rounded-lg bi bi-trash"></i>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Tombol Link  --}}
    <div class="flex-grow mb-3">
        <h3 class="font-bold">Button Links</h3>
        <div class="flex-1 p-3 bg-white rounded-lg shadow-lg">
            <div class="grid grid-cols-6 mb-2 space-x-2 sm:grid-cols-10 lg:grid-cols-cb">
                <input type="text"
                    class="flex-grow h-full col-span-2 p-2 bg-transparent border border-gray-300 rounded-lg sm:col-span-4 lg:col-span-7"
                    placeholder="Enter text" id="textInput">
                <input type="text"
                    class="flex-grow h-full col-span-3 p-2 bg-transparent border border-gray-300 rounded-lg sm:col-span-5 lg:col-span-8"
                    placeholder="Enter link" id="urlInput">
                <button class="items-center justify-center flex-grow col-span-1" onclick="addLinkButton()">
                    <i class="block py-2 text-white bg-green-500 rounded-lg bi bi-plus-lg"></i>
                </button>
            </div>
            <div id="linkContainers" class="space-y-2">
                @foreach ($linkButtons as $index => $linkButton)
                    <div class="grid grid-cols-6 space-x-2 sm:grid-cols-10 lg:grid-cols-cb link-input-item"
                        data-id="{{ $index }}">
                        <input type="text"
                            class="flex-grow col-span-2 p-2 border border-gray-300 rounded-lg sm:col-span-4 lg:col-span-7"
                            value="{{ $linkButton->text }}" data-url="{{ $linkButton->url }}"
                            oninput="updateLinkButton({{ $index }})">
                        <input type="text"
                            class="flex-grow col-span-3 p-2 border border-gray-300 rounded-lg sm:col-span-5 lg:col-span-8"
                            value="{{ $linkButton->url }}" oninput="updateLinkButton({{ $index }})">
                        <button class="items-center justify-center flex-grow col-span-1 "
                            onclick="removeLinkButton(this, {{ $index }})">
                            <i class="block py-2 text-white bg-red-500 rounded-lg bi bi-trash"></i>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- Background --}}
    <div class="mx-auto mb-3">
        <h3 class="font-bold">Background</h3>
        <div class="p-3 bg-white rounded-lg shadow-lg">
            <div class="grid w-full grid-cols-3 mx-auto gap-x-2 md:grid-cols-6">
                <x-button class="w-full py-2 bg-gradient-to-tr from-red-700 to-rose-500"
                    onclick="changeBackground('linear-gradient(to top right, #b91c1c, #f43f5e)'), changeFontBlack()">
                    Red-Rose </x-button>
                <x-button class="w-full py-2 bg-gradient-to-tr from-green-700 to-lime-500"
                    onclick="changeBackground('linear-gradient(to top right, #1D4E1F, #84CC16'), changeFontBlack()">
                    Green-Lime </x-button>
                <x-button class="w-full py-2 bg-gradient-to-tr from-blue-700 to-sky-500"
                    onclick="changeBackground('linear-gradient(to top right, #1C3D5A, #6FB1FC'), changeFontBlack()">
                    Blue-Sky </x-button>
                <x-button class="w-full py-2 bg-gradient-to-tr from-gray-300 to-white"
                    onclick="changeBackground('linear-gradient(to top right, #CBD5E0, #FFFFFF'), changeFontBlack()">
                    Gray-White </x-button>
                <x-button class="w-full py-2 text-white bg-gradient-to-tr from-gray-900 to-slate-700"
                    onclick="changeBackground('linear-gradient(to top right, #1F2937, #6B7280'), changeFontWhite()">
                    Black-Gray </x-button>
                <x-button class="w-full py-2 bg-gray-300" onclick="openWarna()"> Custom </x-button>
            </div>
            <div id="modalWarna" class="fixed inset-0 items-center justify-center hidden bg-gray-800 bg-opacity-75">
                <div class="w-1/3 p-6 mx-auto mt-[30vh] bg-white rounded-lg shadow-lg">
                    <span class="text-2xl text-gray-700 cursor-pointer float-end close"
                        onclick="closeWarna()">&times;</span>
                    <div>
                        <label for="grad-1">Custom Gradient</label>
                        <div class="flex mt-2 space-x-2">
                            <input class="w-1/6 h-12 rounded" type="color" id="grad-1"
                                oninput="applyCustomBackground()">
                            <p id="color1" class="w-1/6">#color1</p>
                        </div>
                        <div class="flex mt-2 space-x-2">
                            <input class="w-1/6 h-12 rounded" type="color" id="grad-2"
                                oninput="applyCustomBackground()">
                            <p id="color2" class="w-1/6">#color2</p>
                        </div>
                        <div class="mt-4">
                            <label for="gradient-direction">Gradient Direction</label>
                            <select id="gradient-direction" class="w-1/3 p-2 border rounded"
                                onchange="applyCustomBackground()">
                                <option value="to top right">To Top Right</option>
                                <option value="to bottom right">To Bottom Right</option>
                                <option value="to bottom left">To Bottom Left</option>
                                <option value="to top left">To Top Left</option>
                                <option value="to top">To Top</option>
                                <option value="to bottom">To Bottom</option>
                                <option value="to left">To Left</option>
                                <option value="to right">To Right</option>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="font-c">Font Color</label>
                        <div class="flex mt-2 space-x-2">
                            <input type="color" id="font-c" class="w-1/6 h-10 p-0 rounded">
                            <p id="font-color-hex" class="w-1/6">#color</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Font --}}
    <div class="flex-grow mb-3">
        <h3 class="font-bold">Font</h3>
        <div class="p-3 bg-white rounded-lg shadow">
            <div class="grid w-full grid-cols-2 mx-auto gap-x-2 sm:grid-cols-4 lg:grid-cols-5">
                <x-button class="w-full font-montserrat" onclick="changeFont('montserrat')">Montserrat</x-button>
                <x-button class="w-full font-roboto" onclick="changeFont('roboto')">Roboto</x-button>
                <x-button class="w-full font-baskervville" onclick="changeFont('baskervville')">Baskervville</x-button>
                <x-button class="w-full font-opensans" onclick="changeFont('opensans')">Open Sans</x-button>
                <x-button class="w-full font-lato" onclick="changeFont('lato')">Lato</x-button>
                <x-button class="w-full font-lora" onclick="changeFont('lora')">Lora</x-button>
                <x-button class="w-full font-inter" onclick="changeFont('inter')">Inter</x-button>
                <x-button class="w-full font-ubuntu" onclick="changeFont('ubuntu')">Ubuntu</x-button>
                <x-button class="w-full font-bebasneue" onclick="changeFont('bebasneue')">Bebas Neue</x-button>
                <x-button class="w-full font-rowdies" onclick="changeFont('rowdies')">Rowdies</x-button>
                <x-button class="w-full font-abrilfatface" onclick="changeFont('abrilfatface')">Abril Fatface</x-button>
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
    {{-- Button --}}
    <div class="mx-auto mb-3">
        <h3 class="font-bold">Button Properties</h3>
        <div class="bg-white rounded-lg shadow-lg">
            <div class="grid items-center grid-cols-1 p-4 mx-auto -gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <button class="w-full scale-75" onclick="changebtnstyle('box')">
                    <div class="w-full box" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('boxb')">
                    <div class="w-full boxb" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('boxc')">
                    <div class="w-full boxc" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('boxcb')">
                    <div class="w-full boxcb" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('box40')">
                    <div class="w-full box40" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('box40b')">
                    <div class="w-full box40b" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('box60')">
                    <div class="w-full box60" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('box60b')">
                    <div class="w-full box60b" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('box90')">
                    <div class="w-full box90" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('box90b')">
                    <div class="w-full box90b" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('box150')">
                    <div class="w-full box150" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('box120b')">
                    <div class="w-full box120b" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('box180')">
                    <div class="w-full box180" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('box180b')">
                    <div class="w-full box180b" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('boxri')">
                    <div class="w-full boxri" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('boxro')">
                    <div class="w-full boxro" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                <button class="w-full scale-75" onclick="changebtnstyle('boxrb')">
                    <div class="w-full boxrb" style="background: linear-gradient(90deg, #ababab, #dddddd)"></div>
                </button>
                
            </div>  
            <div class="form-container">
                <label for="grad-dir-btn">Button Type:</label>
                <select id="grad-dir-btn" class="w-1/3 p-2 border rounded"
                                onchange="changebtnclr()">
                                <option value="45deg">To Top Right</option>
                                <option value="135deg">To Bottom Right</option>
                                <option value="225deg">To Bottom Left</option>
                                <option value="315deg">To Top Left</option>
                                <option value="0deg">To Top</option>
                                <option value="180deg">To Bottom</option>
                                <option value="90deg">To Left</option>
                                <option value="270deg">To Right</option>
        
                <label for="btnf1">Fill Color 1:</label>
                <input type="color" id="btnf1" value="#ffffff" oninput="changebtnclr()">
        
                <label for="btnf2">Fill Color 0:</label>
                <input type="color" id="btnf2" value="#ffffff" oninput="changebtnclr()">
        
                <button id="updateButton">Update Button</button>
            </div>
        </div>
    </div>
    <div class="mx-auto mb-3">
        {{ $slot }}
    </div>
</div>
