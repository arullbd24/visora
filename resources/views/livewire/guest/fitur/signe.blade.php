<div>
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto">
                <a href="#" class="flex items-center">
                    <img src="assets/img/logo/favicon.png" class="h-6 mr-3 sm:h-9" alt="AST Logo" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">AST</span>
                </a>
                <div class="flex items-center lg:order-2">
                    <a href="{{ route('auth.login') }}"
                        class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log
                        in</a>
                    <a href="{{ route('auth.register') }}"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Daftar
                        Sekarang</a>
                    <button data-collapse-toggle="mobile-menu-2" type="button"
                        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="mobile-menu-2" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="{{ route('guest.main') }}"
                                class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded lg:bg-transparent lg:text-blue-700 lg:p-0 dark:text-white"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('guest.about') }}"
                                class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">About
                                Us</a>
                        </li>
                        <li>
                            <div class="relative">
                                <button id="dropdownFiturButton" data-dropdown-toggle="dropdownFitur"
                                    class="block py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                                    Fitur
                                    <svg class="w-2.5 h-2.5 ms-3 inline" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <div id="dropdownFitur"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownFiturButton">
                                        <li>
                                            <a href="{{ route('guest.fitur.signe') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">E-Certificate</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('guest.signv.ecs') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">E-Signature</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="relative">
                                <button id="dropdownContactButton" data-dropdown-toggle="dropdownContact"
                                    class="block py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">
                                    Contact
                                    <svg class="w-2.5 h-2.5 ms-3 inline" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <div id="dropdownContact"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="dropdownContactButton">
                                        <li>
                                            <a href="{{ route('guest.support') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Support</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('guest.contact.main') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">FAQs</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div>
            <section
                class="flex md:flex-row flex-col items-center justify-center w-full min-h-screen pt-20 lg:px-10 bg-slate-900 from-xignature_yellow/10 to-white">
                <div class=" md:col-span-6 md:ml-0 ml-3">
                    <h4
                        class="max-w-2xl mt-3 mb-3 text-5xl leading-relaxed text-xignature md:pr-10 font-adobeBold lg:text-6xl text-yellow-400">
                        Certificate Electronic</h4>
                    <div class="max-w-xl text-slate-300 md:text-xl">
                        <div>Sertifikat digital adalah file elektronik yang berisi informasi identitas untuk
                            memverifikasi keaslian dan keabsahan suatu entitas di dunia digital.</div>
                    </div>
                    <div class="flex flex-row mt-6 space-x-3"><a target="blank"
                            class="justify-start flex border-xignature rounded-md btn mt-2 min-w-[120px] bg-transparent"
                            href="{{ route('auth.register') }}">
                            <div
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                <i class="uil uil-envelope"></i>Coba Sekarang</div>
                        </a></div>
                </div>
                <div class="md:col-span-6 xl:w-[800px] lg:w-[650px] md:w-[500px] w-[350px] mt-10">
                    <div class="relative z-10 flex justify-end">
                        <div id="box2" class="relative md:w-10/12 lg:h-[530px] md:h-[400px] h-[380px] z-10"><img
                                alt="box1" loading="lazy" width="450" height="0" decoding="async"
                                data-nimg="1" class="object-contain w-full h-full  rounded-2xl lg:object-left"
                                srcset="/assets/img/digitalcert.jpeg"
                                src="/_next/image?url=%2Fassets%2FIndex%2Fdigitalcert.jpg&amp;w=1080&amp;q=75"
                                style="color: transparent;"></div>
                    </div>
                </div>
            </section>
            <section
                class="flex flex-col lg:flex-row w-full justify-center items-center py-16 space-x-10 bg-zinc-300 lg:px-28">
                <div class="md:w-1/2 w-10/12 mt-10">
                    <div class="relative z-10 flex justify-end">
                        <div id="box2" class="relative md:w-full md:h-[350px] z-10">
                            <img src="assets/img/landing1.jpg" alt="box1"
                                class="object-cover w-full h-full shadow-md rounded-2xl">
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 w-10/12 mt-10">
                    <h1 class="mb-5 text-4xl text-sky-600">Kenapa Harus Punya Sertifikat Digital?</h1>
                    <div class="mt-2 text-xl text-left text-gray-600">
                        <ul class="space-y-10">
                            <li class="flex items-center">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                    viewBox="0 0 256 256" class="text-blue-500 md:block hidden" height="60"
                                    width="60" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M152.41,88.56l-89.6,88a12,12,0,0,1-16.82,0L7.59,138.85a12,12,0,0,1,16.82-17.13l30,29.46,81.19-79.74a12,12,0,0,1,16.82,17.12Zm96.15-17a12,12,0,0,0-17-.15L150.4,151.18l-7.88-7.74a12,12,0,0,0-16.82,17.12l16.29,16a12,12,0,0,0,16.82,0l89.6-88A12,12,0,0,0,248.56,71.59Z">
                                    </path>
                                </svg>
                                <p class="max-w-xl md:ml-5 leading-8">Dengan adanya Sertifikat Digital itu berarti
                                    tanda tangan tersebut benar-benar pemilik sertifikat Anda! Sertifikat tersebut
                                    berisi subjek yang merupakan identitas, serta tanda tangan digital. </p>
                            </li>
                            <li class="flex items-center">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                    viewBox="0 0 256 256" class="text-blue-500 md:block hidden" height="50"
                                    width="50" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M152.41,88.56l-89.6,88a12,12,0,0,1-16.82,0L7.59,138.85a12,12,0,0,1,16.82-17.13l30,29.46,81.19-79.74a12,12,0,0,1,16.82,17.12Zm96.15-17a12,12,0,0,0-17-.15L150.4,151.18l-7.88-7.74a12,12,0,0,0-16.82,17.12l16.29,16a12,12,0,0,0,16.82,0l89.6-88A12,12,0,0,0,248.56,71.59Z">
                                    </path>
                                </svg>
                                <p class="max-w-xl md:ml-5 leading-8">Dengan adanya Sertifikat Digital, dapat
                                    memastikan identitas dan keamanan enkripsi situs web, individu, organisasi,
                                    perangkat, pengguna, atau server. </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <footer class="p-6 bg-white sm:p-8 dark:bg-gray-800">
        <div class="max-w-screen-xl mx-auto">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="" class="flex items-center">
                        <img src="assets/img/logo/favicon.png" class="h-8 mr-3"
                            alt="Authentic Signature Technology Logo" />
                        <span
                            class="self-center text-2xl font-semibold leading-tight truncate dark:text-white">Authentic
                            Guards Technology</span>
                    </a>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Jl. Tamblong No.46, Kb. Pisang</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Kec. Sumur Bandung, Kota Bandung</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Jawa Barat 40112</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-gray-900  dark:text-white">AST
                            Features</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-2"><a href="{{ route('guest.fitur.signe') }}" class="">Electronic
                                    Certificate</a>
                            </li>
                            <li class="mb-2"><a href="{{ route('guest.signv.ecs') }}" class="">Electronic
                                    Signature</a></li>
                    </div>
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">Support</h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-2"><a href="{{ route('guest.support') }}" class="hover:underline">Help
                                    Center</a></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-4 text-sm font-semibold text-gray-900 uppercase dark:text-white">Tentang Perusahaan
                        </h2>
                        <ul class="text-gray-600 dark:text-gray-400">
                            <li class="mb-2"><a href="{{ route('guest.about') }}" class="hover:underline">About
                                    Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a
                        href="https://authentic-signature.com" class="hover:underline">Authentic Guards
                        Technology™</a>. All Rights Reserved.</span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm4.989-.327a1.2 1.2 0 11-2.4 0 1.2 1.2 0 012.4 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M16.048 0c3.315 0 4.736.685 5.84 1.272a8.89 8.89 0 012.708 2.69A9.465 9.465 0 0124 6.707v10.59a9.465 9.465 0 01-.405 2.745 8.89 8.89 0 01-2.707 2.69c-1.105.588-2.525 1.273-5.841 1.273H7.952c-3.316 0-4.736-.685-5.84-1.272a8.89 8.89 0 01-2.708-2.69A9.465 9.465 0 010 17.297V6.707a9.465 9.465 0 01.405-2.745A8.89 8.89 0 013.12 1.273C4.225.685 5.644 0 7.952 0h8.096zm-3.175 7.71H11.09V5.753c0-.527.014-.923.04-1.188.029-.33.09-.619.185-.869a1.917 1.917 0 01.438-.692 1.67 1.67 0 01.652-.406 2.76 2.76 0 01.987-.162h1.469V5.25H13.37c-.344 0-.584.108-.719.323-.135.215-.203.586-.203 1.114v1.024z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</div>
