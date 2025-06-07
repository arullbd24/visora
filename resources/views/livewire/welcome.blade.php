<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body x-data="{ page: 'analytics', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value = & gt; localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">
        <!-- ===== Preloader Start ===== -->
        <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () = & gt; { setTimeout(() = & gt; loaded = false, 500) })"
            class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white dark:bg-black"
            style="display: none;">
            <div
                class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-brand-500 border-t-transparent">
            </div>
        </div>

        <!-- ===== Preloader End ===== -->

        <!-- ===== Page Wrapper Start ===== -->
        <div class="flex h-screen overflow-hidden">
            <!-- ===== Sidebar Start ===== -->
            <aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
                class="sidebar fixed top-0 left-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-auto border-r border-gray-200 bg-white px-5 transition-all duration-300 lg:static lg:translate-x-0 dark:border-gray-800 dark:bg-black -translate-x-full"
                @click.outside="sidebarToggle = false">
                <!-- SIDEBAR HEADER -->
                <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
                    class="sidebar-header flex items-center gap-2 pt-8 pb-7 justify-between">
                    <a href="index.html">
                        <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                            <img class="dark:hidden" src="src/images/logo/logo.svg" alt="Logo">
                            <img class="hidden dark:block" src="src/images/logo/logo-dark.svg" alt="Logo">
                        </span>

                        <img class="logo-icon hidden" :class="sidebarToggle ? 'lg:block' : 'hidden'"
                            src="src/images/logo/logo-icon.svg" alt="Logo">
                    </a>
                </div>
                <!-- SIDEBAR HEADER -->

                <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
                    <!-- Sidebar Menu -->
                    <nav x-data="{ selected: $persist('Dashboard') }">
                        <!-- Menu Group -->
                        <div>
                            <h3 class="mb-4 text-xs leading-[20px] text-gray-400 uppercase">
                                <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    MENU
                                </span>

                                <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                                    class="menu-group-icon mx-auto fill-current hidden" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                                        fill=""></path>
                                </svg>
                            </h3>

                            <ul class="mb-6 flex flex-col gap-4">
                                <!-- Menu Item Dashboard -->
                                <li>
                                    <a href="#"
                                        @click.prevent="selected = (selected === 'Dashboard' ? '':'Dashboard')"
                                        class="menu-item group menu-item-active"
                                        :class="(selected === 'Dashboard') || (page === 'ecommerce' || page === 'analytics' ||
                                            page === 'marketing' || page === 'crm' || page === 'stocks' ||
                                            page === 'saas') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Dashboard') || (page === 'ecommerce' || page === 'analytics' ||
                                            page === 'marketing' || page === 'crm' || page === 'stocks') ?
                                        'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-active">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Dashboard
                                        </span>

                                        <svg class="menu-item-arrow menu-item-arrow-active"
                                            :class="[(selected === 'Dashboard') ? 'menu-item-arrow-active' :
                                                'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : ''
                                            ]"
                                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Dropdown Menu Start -->
                                    <div class="translate transform overflow-hidden block"
                                        :class="(selected === 'Dashboard') ? 'block' : 'hidden'">
                                        <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                            class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                            <li>
                                                <a href="index.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'ecommerce' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    eCommerce
                                                </a>
                                            </li>
                                            <li>
                                                <a href="analytics.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-active"
                                                    :class="page === 'analytics' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Analytics
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-active"
                                                            :class="page === 'analytics' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    href="marketing.html"
                                                    :class="page === 'marketing' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Marketing
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'marketing' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="crm.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'crm' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    CRM
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'crm' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="stocks.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'stocks' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Stocks
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'stocks' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            New
                                                        </span>
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'stocks' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="saas.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'saas' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    SaaS
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'saas' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            New
                                                        </span>
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'saas' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown Menu End -->
                                </li>

                                <!-- Menu Item Dashboard -->

                                <!-- Menu Item Calendar -->
                                <li>
                                    <a href="calendar.html"
                                        @click="selected = (selected === 'Calendar' ? '':'Calendar')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Calendar') & amp; & amp;
                                        (page === 'calendar') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Calendar') & amp; & amp;
                                        (page === 'calendar') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8 2C8.41421 2 8.75 2.33579 8.75 2.75V3.75H15.25V2.75C15.25 2.33579 15.5858 2 16 2C16.4142 2 16.75 2.33579 16.75 2.75V3.75H18.5C19.7426 3.75 20.75 4.75736 20.75 6V9V19C20.75 20.2426 19.7426 21.25 18.5 21.25H5.5C4.25736 21.25 3.25 20.2426 3.25 19V9V6C3.25 4.75736 4.25736 3.75 5.5 3.75H7.25V2.75C7.25 2.33579 7.58579 2 8 2ZM8 5.25H5.5C5.08579 5.25 4.75 5.58579 4.75 6V8.25H19.25V6C19.25 5.58579 18.9142 5.25 18.5 5.25H16H8ZM19.25 9.75H4.75V19C4.75 19.4142 5.08579 19.75 5.5 19.75H18.5C18.9142 19.75 19.25 19.4142 19.25 19V9.75Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Calendar
                                        </span>
                                    </a>
                                </li>
                                <!-- Menu Item Calendar -->

                                <!-- Menu Item Profile -->
                                <li>
                                    <a href="profile.html" @click="selected = (selected === 'Profile' ? '':'Profile')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Profile') & amp; & amp;
                                        (page === 'profile') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Profile') & amp; & amp;
                                        (page === 'profile') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            User Profile
                                        </span>
                                    </a>
                                </li>
                                <!-- Menu Item Profile -->

                                <!-- Menu Item Task -->
                                <li>
                                    <a href="#" @click.prevent="selected = (selected === 'Task' ? '':'Task')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Task') || (page === 'taskList' || page === 'taskKanban') ?
                                        'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Task') || (page === 'taskList' || page === 'taskKanban') ?
                                        'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.75586 5.50098C7.75586 5.08676 8.09165 4.75098 8.50586 4.75098H18.4985C18.9127 4.75098 19.2485 5.08676 19.2485 5.50098L19.2485 15.4956C19.2485 15.9098 18.9127 16.2456 18.4985 16.2456H8.50586C8.09165 16.2456 7.75586 15.9098 7.75586 15.4956V5.50098ZM8.50586 3.25098C7.26322 3.25098 6.25586 4.25834 6.25586 5.50098V6.26318H5.50195C4.25931 6.26318 3.25195 7.27054 3.25195 8.51318V18.4995C3.25195 19.7422 4.25931 20.7495 5.50195 20.7495H15.4883C16.7309 20.7495 17.7383 19.7421 17.7383 18.4995L17.7383 17.7456H18.4985C19.7411 17.7456 20.7485 16.7382 20.7485 15.4956L20.7485 5.50097C20.7485 4.25833 19.7411 3.25098 18.4985 3.25098H8.50586ZM16.2383 17.7456H8.50586C7.26322 17.7456 6.25586 16.7382 6.25586 15.4956V7.76318H5.50195C5.08774 7.76318 4.75195 8.09897 4.75195 8.51318V18.4995C4.75195 18.9137 5.08774 19.2495 5.50195 19.2495H15.4883C15.9025 19.2495 16.2383 18.9137 16.2383 18.4995L16.2383 17.7456Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Task
                                        </span>

                                        <svg class="menu-item-arrow menu-item-arrow-inactive"
                                            :class="[(selected === 'Task') ? 'menu-item-arrow-active' :
                                                'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : ''
                                            ]"
                                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Dropdown Menu Start -->
                                    <div class="translate transform overflow-hidden hidden"
                                        :class="(selected === 'Task') ? 'block' : 'hidden'">
                                        <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                            class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                            <li>
                                                <a href="task-list.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'taskList' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    List
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'taskList' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="task-kanban.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'taskKanban' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Kanban
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'taskKanban' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown Menu End -->
                                </li>
                                <!-- Menu Item Task -->

                                <!-- Menu Item Forms -->
                                <li>
                                    <a href="#" @click.prevent="selected = (selected === 'Forms' ? '':'Forms')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Forms') || (page === 'formElements' ||
                                            page === 'formLayout' || page === 'proFormElements' ||
                                            page === 'proFormLayout') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Forms') || (page === 'formElements' ||
                                            page === 'formLayout' || page === 'proFormElements' ||
                                            page === 'proFormLayout') ? 'menu-item-icon-active' :
                                        'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5001C19.7427 20.75 20.7501 19.7426 20.7501 18.5V5.5C20.7501 4.25736 19.7427 3.25 18.5001 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H18.5001C18.9143 4.75 19.2501 5.08579 19.2501 5.5V18.5C19.2501 18.9142 18.9143 19.25 18.5001 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V5.5ZM6.25005 9.7143C6.25005 9.30008 6.58583 8.9643 7.00005 8.9643L17 8.96429C17.4143 8.96429 17.75 9.30008 17.75 9.71429C17.75 10.1285 17.4143 10.4643 17 10.4643L7.00005 10.4643C6.58583 10.4643 6.25005 10.1285 6.25005 9.7143ZM6.25005 14.2857C6.25005 13.8715 6.58583 13.5357 7.00005 13.5357H17C17.4143 13.5357 17.75 13.8715 17.75 14.2857C17.75 14.6999 17.4143 15.0357 17 15.0357H7.00005C6.58583 15.0357 6.25005 14.6999 6.25005 14.2857Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Forms
                                        </span>

                                        <svg class="menu-item-arrow absolute top-1/2 right-2.5 -translate-y-1/2 stroke-current menu-item-arrow-inactive"
                                            :class="[(selected === 'Forms') ? 'menu-item-arrow-active' :
                                                'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : ''
                                            ]"
                                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Dropdown Menu Start -->
                                    <div class="translate transform overflow-hidden hidden"
                                        :class="(selected === 'Forms') ? 'block' : 'hidden'">
                                        <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                            class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                            <li>
                                                <a href="form-elements.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'formElements' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Form Elements
                                                </a>
                                            </li>
                                            <li>
                                                <a href="form-layout.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'formLayout' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Form Layout
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown Menu End -->
                                </li>
                                <!-- Menu Item Forms -->

                                <!-- Menu Item Tables -->
                                <li>
                                    <a href="#"
                                        @click.prevent="selected = (selected === 'Tables' ? '':'Tables')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Tables') || (page === 'basicTables' ||
                                            page === 'dataTables') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Tables') || (page === 'basicTables' ||
                                            page === 'dataTables') ? 'menu-item-icon-active' :
                                        'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.25 5.5C3.25 4.25736 4.25736 3.25 5.5 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V18.5C20.75 19.7426 19.7426 20.75 18.5 20.75H5.5C4.25736 20.75 3.25 19.7426 3.25 18.5V5.5ZM5.5 4.75C5.08579 4.75 4.75 5.08579 4.75 5.5V8.58325L19.25 8.58325V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H5.5ZM19.25 10.0833H15.416V13.9165H19.25V10.0833ZM13.916 10.0833L10.083 10.0833V13.9165L13.916 13.9165V10.0833ZM8.58301 10.0833H4.75V13.9165H8.58301V10.0833ZM4.75 18.5V15.4165H8.58301V19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5ZM10.083 19.25V15.4165L13.916 15.4165V19.25H10.083ZM15.416 19.25V15.4165H19.25V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15.416Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Tables
                                        </span>

                                        <svg class="menu-item-arrow absolute top-1/2 right-2.5 -translate-y-1/2 stroke-current menu-item-arrow-inactive"
                                            :class="[(selected === 'Tables') ? 'menu-item-arrow-active' :
                                                'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : ''
                                            ]"
                                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Dropdown Menu Start -->
                                    <div class="translate transform overflow-hidden hidden"
                                        :class="(selected === 'Tables') ? 'block' : 'hidden'">
                                        <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                            class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                            <li>
                                                <a href="basic-tables.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'basicTables' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Basic Tables
                                                </a>
                                            </li>
                                            <li>
                                                <a href="data-tables.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'dataTables' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Data Tables
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'dataTables' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown Menu End -->
                                </li>
                                <!-- Menu Item Tables -->

                                <!-- Menu Item Pages -->
                                <li>
                                    <a href="#" @click.prevent="selected = (selected === 'Pages' ? '':'Pages')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Pages') || (page === 'fileManager' ||
                                            page === 'pricingTables' || page === 'blank' || page === 'page404' ||
                                            page === 'page500' || page === 'page503' || page === 'success' ||
                                            page === 'faq' || page === 'comingSoon' || page === 'maintenance') ?
                                        'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Pages') || (page === 'fileManager' ||
                                            page === 'pricingTables' || page === 'blank' || page === 'page404' ||
                                            page === 'page500' || page === 'page503' || page === 'success' ||
                                            page === 'faq' || page === 'comingSoon' || page === 'maintenance') ?
                                        'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.50391 4.25C8.50391 3.83579 8.83969 3.5 9.25391 3.5H15.2777C15.4766 3.5 15.6674 3.57902 15.8081 3.71967L18.2807 6.19234C18.4214 6.333 18.5004 6.52376 18.5004 6.72268V16.75C18.5004 17.1642 18.1646 17.5 17.7504 17.5H16.248V17.4993H14.748V17.5H9.25391C8.83969 17.5 8.50391 17.1642 8.50391 16.75V4.25ZM14.748 19H9.25391C8.01126 19 7.00391 17.9926 7.00391 16.75V6.49854H6.24805C5.83383 6.49854 5.49805 6.83432 5.49805 7.24854V19.75C5.49805 20.1642 5.83383 20.5 6.24805 20.5H13.998C14.4123 20.5 14.748 20.1642 14.748 19.75L14.748 19ZM7.00391 4.99854V4.25C7.00391 3.00736 8.01127 2 9.25391 2H15.2777C15.8745 2 16.4468 2.23705 16.8687 2.659L19.3414 5.13168C19.7634 5.55364 20.0004 6.12594 20.0004 6.72268V16.75C20.0004 17.9926 18.9931 19 17.7504 19H16.248L16.248 19.75C16.248 20.9926 15.2407 22 13.998 22H6.24805C5.00541 22 3.99805 20.9926 3.99805 19.75V7.24854C3.99805 6.00589 5.00541 4.99854 6.24805 4.99854H7.00391Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Pages
                                        </span>

                                        <svg class="menu-item-arrow absolute top-1/2 right-2.5 -translate-y-1/2 stroke-current menu-item-arrow-inactive"
                                            :class="[(selected === 'Pages') ? 'menu-item-arrow-active' :
                                                'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : ''
                                            ]"
                                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Dropdown Menu Start -->
                                    <div class="translate transform overflow-hidden hidden"
                                        :class="(selected === 'Pages') ? 'block' : 'hidden'">
                                        <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                            class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                            <li>
                                                <a href="file-manager.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'fileManager' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    File Manager
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'fileManager' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="pricing-tables.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'pricingTables' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Pricing Tables
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'pricingTables' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="faq.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'faq' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Faq
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'faq' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="blank.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'blank' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Blank Page
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'blank' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="404.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'page404' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    404 Error
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'page404' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="500.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'page500' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    500 Error
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'page500' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="503.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'page503' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    503 Error
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'page503' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="coming-soon.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'comingSoon' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Coming Soon
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'comingSoon' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="maintenance.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'termsCondition' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Maintenance
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'termsCondition' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="success.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'success' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Success
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'success' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown Menu End -->
                                </li>
                                <!-- Menu Item Pages -->
                            </ul>
                        </div>

                        <!-- Support Group -->
                        <div>
                            <h3 class="mb-4 text-xs leading-[20px] text-gray-400 uppercase">
                                <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Support
                                </span>

                                <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                                    class="menu-group-icon mx-auto fill-current hidden" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                                        fill=""></path>
                                </svg>
                            </h3>

                            <ul class="mb-6 flex flex-col gap-4">
                                <!-- Menu Item Chat -->
                                <li>
                                    <a href="chat.html" @click="selected = (selected === 'Chat' ? '':'Chat')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Chat') & amp; & amp;
                                        (page === 'chat') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Chat') & amp; & amp;
                                        (page === 'chat') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4.00002 12.0957C4.00002 7.67742 7.58174 4.0957 12 4.0957C16.4183 4.0957 20 7.67742 20 12.0957C20 16.514 16.4183 20.0957 12 20.0957H5.06068L6.34317 18.8132C6.48382 18.6726 6.56284 18.4818 6.56284 18.2829C6.56284 18.084 6.48382 17.8932 6.34317 17.7526C4.89463 16.304 4.00002 14.305 4.00002 12.0957ZM12 2.5957C6.75332 2.5957 2.50002 6.849 2.50002 12.0957C2.50002 14.4488 3.35633 16.603 4.77303 18.262L2.71969 20.3154C2.50519 20.5299 2.44103 20.8525 2.55711 21.1327C2.6732 21.413 2.94668 21.5957 3.25002 21.5957H12C17.2467 21.5957 21.5 17.3424 21.5 12.0957C21.5 6.849 17.2467 2.5957 12 2.5957ZM7.62502 10.8467C6.93467 10.8467 6.37502 11.4063 6.37502 12.0967C6.37502 12.787 6.93467 13.3467 7.62502 13.3467H7.62512C8.31548 13.3467 8.87512 12.787 8.87512 12.0967C8.87512 11.4063 8.31548 10.8467 7.62512 10.8467H7.62502ZM10.75 12.0967C10.75 11.4063 11.3097 10.8467 12 10.8467H12.0001C12.6905 10.8467 13.2501 11.4063 13.2501 12.0967C13.2501 12.787 12.6905 13.3467 12.0001 13.3467H12C11.3097 13.3467 10.75 12.787 10.75 12.0967ZM16.375 10.8467C15.6847 10.8467 15.125 11.4063 15.125 12.0967C15.125 12.787 15.6847 13.3467 16.375 13.3467H16.3751C17.0655 13.3467 17.6251 12.787 17.6251 12.0967C17.6251 11.4063 17.0655 10.8467 16.3751 10.8467H16.375Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Chat
                                        </span>
                                    </a>
                                </li>
                                <!-- Menu Item Chat -->

                                <!-- Menu Item Inbox -->
                                <li>
                                    <a href="#" @click.prevent="selected = (selected === 'Email' ? '':'Email')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Email') || (page === 'inbox' ||
                                        page === 'inboxDetails') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Email') || (page === 'inbox' ||
                                        page === 'inboxDetails') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.5 8.187V17.25C3.5 17.6642 3.83579 18 4.25 18H19.75C20.1642 18 20.5 17.6642 20.5 17.25V8.18747L13.2873 13.2171C12.5141 13.7563 11.4866 13.7563 10.7134 13.2171L3.5 8.187ZM20.5 6.2286C20.5 6.23039 20.5 6.23218 20.5 6.23398V6.24336C20.4976 6.31753 20.4604 6.38643 20.3992 6.42905L12.4293 11.9867C12.1716 12.1664 11.8291 12.1664 11.5713 11.9867L3.60116 6.42885C3.538 6.38481 3.50035 6.31268 3.50032 6.23568C3.50028 6.10553 3.60577 6 3.73592 6H20.2644C20.3922 6 20.4963 6.10171 20.5 6.2286ZM22 6.25648V17.25C22 18.4926 20.9926 19.5 19.75 19.5H4.25C3.00736 19.5 2 18.4926 2 17.25V6.23398C2 6.22371 2.00021 6.2135 2.00061 6.20333C2.01781 5.25971 2.78812 4.5 3.73592 4.5H20.2644C21.2229 4.5 22 5.27697 22.0001 6.23549C22.0001 6.24249 22.0001 6.24949 22 6.25648Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Email
                                        </span>

                                        <svg class="menu-item-arrow absolute top-1/2 right-2.5 -translate-y-1/2 stroke-current menu-item-arrow-inactive"
                                            :class="[(selected === 'Email') ? 'menu-item-arrow-active' :
                                                'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : ''
                                            ]"
                                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Dropdown Menu Start -->
                                    <div class="translate transform overflow-hidden hidden"
                                        :class="(selected === 'Email') ? 'block' : 'hidden'">
                                        <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                            class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                            <li>
                                                <a href="inbox.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'inbox' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Inbox
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'inbox' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="inbox-details.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'inboxDetails' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Details
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'inboxDetails' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown Menu End -->
                                </li>
                                <!-- Menu Item Inbox -->

                                <!-- Menu Item Invoice -->
                                <li>
                                    <a href="invoice.html" @click="selected = (selected === 'Invoice' ? '':'Invoice')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Invoice') & amp; & amp;
                                        (page === 'invoice') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Invoice') & amp; & amp;
                                        (page === 'invoice') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M19.5 19.75C19.5 20.9926 18.4926 22 17.25 22H6.75C5.50736 22 4.5 20.9926 4.5 19.75V9.62105C4.5 9.02455 4.73686 8.45247 5.15851 8.03055L10.5262 2.65951C10.9482 2.23725 11.5207 2 12.1177 2H17.25C18.4926 2 19.5 3.00736 19.5 4.25V19.75ZM17.25 20.5C17.6642 20.5 18 20.1642 18 19.75V4.25C18 3.83579 17.6642 3.5 17.25 3.5H12.248L12.2509 7.49913C12.2518 8.7424 11.2442 9.75073 10.0009 9.75073H6V19.75C6 20.1642 6.33579 20.5 6.75 20.5H17.25ZM7.05913 8.25073L10.7488 4.55876L10.7509 7.5002C10.7512 7.91462 10.4153 8.25073 10.0009 8.25073H7.05913ZM8.25 14.5C8.25 14.0858 8.58579 13.75 9 13.75H15C15.4142 13.75 15.75 14.0858 15.75 14.5C15.75 14.9142 15.4142 15.25 15 15.25H9C8.58579 15.25 8.25 14.9142 8.25 14.5ZM8.25 17.5C8.25 17.0858 8.58579 16.75 9 16.75H12C12.4142 16.75 12.75 17.0858 12.75 17.5C12.75 17.9142 12.4142 18.25 12 18.25H9C8.58579 18.25 8.25 17.9142 8.25 17.5Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Invoice
                                        </span>
                                    </a>
                                </li>
                                <!-- Menu Item Invoice -->
                            </ul>
                        </div>

                        <!-- Others Group -->
                        <div>
                            <h3 class="mb-4 text-xs leading-[20px] text-gray-400 uppercase">
                                <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    others
                                </span>

                                <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                                    class="menu-group-icon mx-auto fill-current hidden" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                                        fill=""></path>
                                </svg>
                            </h3>

                            <ul class="mb-6 flex flex-col gap-4">
                                <!-- Menu Item Charts -->
                                <li>
                                    <a href="#"
                                        @click.prevent="selected = (selected === 'Charts' ? '':'Charts')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Charts') || (page === 'lineChart' || page === 'barChart' ||
                                            page === 'pieChart') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Charts') || (page === 'lineChart' || page === 'barChart' ||
                                            page === 'pieChart') ? 'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12 2C11.5858 2 11.25 2.33579 11.25 2.75V12C11.25 12.4142 11.5858 12.75 12 12.75H21.25C21.6642 12.75 22 12.4142 22 12C22 6.47715 17.5228 2 12 2ZM12.75 11.25V3.53263C13.2645 3.57761 13.7659 3.66843 14.25 3.80098V3.80099C15.6929 4.19606 16.9827 4.96184 18.0104 5.98959C19.0382 7.01734 19.8039 8.30707 20.199 9.75C20.3316 10.2341 20.4224 10.7355 20.4674 11.25H12.75ZM2 12C2 7.25083 5.31065 3.27489 9.75 2.25415V3.80099C6.14748 4.78734 3.5 8.0845 3.5 12C3.5 16.6944 7.30558 20.5 12 20.5C15.9155 20.5 19.2127 17.8525 20.199 14.25H21.7459C20.7251 18.6894 16.7492 22 12 22C6.47715 22 2 17.5229 2 12Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Charts
                                        </span>

                                        <svg class="menu-item-arrow absolute top-1/2 right-2.5 -translate-y-1/2 stroke-current menu-item-arrow-inactive"
                                            :class="[(selected === 'Charts') ? 'menu-item-arrow-active' :
                                                'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : ''
                                            ]"
                                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Dropdown Menu Start -->
                                    <div class="translate transform overflow-hidden hidden"
                                        :class="(selected === 'Charts') ? 'block' : 'hidden'">
                                        <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                            class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                            <li>
                                                <a href="line-chart.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'lineChart' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Line Chart
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'lineChart' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="bar-chart.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'barChart' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Bar Chart
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'barChart' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="pie-chart.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'pieChart' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Pie Chart
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'pieChart' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown Menu End -->
                                </li>
                                <!-- Menu Item Charts -->

                                <!-- Menu Item Ui Elements -->
                                <li>
                                    <a href="#"
                                        @click.prevent="selected = (selected === 'UiElements' ? '':'UiElements')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'UiElements') || (page === 'alerts' || page === 'avatars' ||
                                            page === 'badge' || page === 'breadcrumb' || page === 'buttons' ||
                                            page === 'buttonsGroup' || page === 'cards' || page === 'carousel' ||
                                            page === 'dropdowns' || page === 'images' || page === 'list' ||
                                            page === 'modals' || page === 'notifications' ||
                                            page === 'pagination' || page === 'popovers' || page === 'progress' ||
                                            page === 'spinners' || page === 'tooltips' || page === 'videos') ?
                                        'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'UiElements') || (page === 'alerts' || page === 'avatars' ||
                                            page === 'badge' || page === 'breadcrumb' || page === 'buttons' ||
                                            page === 'buttonsGroup' || page === 'cards' || page === 'carousel' ||
                                            page === 'dropdowns' || page === 'images' || page === 'list' ||
                                            page === 'modals' || page === 'notifications' ||
                                            page === 'pagination' || page === 'popovers' || page === 'progress' ||
                                            page === 'spinners' || page === 'tooltips' || page === 'videos') ?
                                        'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.665 3.75618C11.8762 3.65061 12.1247 3.65061 12.3358 3.75618L18.7807 6.97853L12.3358 10.2009C12.1247 10.3064 11.8762 10.3064 11.665 10.2009L5.22014 6.97853L11.665 3.75618ZM4.29297 8.19199V16.0946C4.29297 16.3787 4.45347 16.6384 4.70757 16.7654L11.25 20.0365V11.6512C11.1631 11.6205 11.0777 11.5843 10.9942 11.5425L4.29297 8.19199ZM12.75 20.037L19.2933 16.7654C19.5474 16.6384 19.7079 16.3787 19.7079 16.0946V8.19199L13.0066 11.5425C12.9229 11.5844 12.8372 11.6207 12.75 11.6515V20.037ZM13.0066 2.41453C12.3732 2.09783 11.6277 2.09783 10.9942 2.41453L4.03676 5.89316C3.27449 6.27429 2.79297 7.05339 2.79297 7.90563V16.0946C2.79297 16.9468 3.27448 17.7259 4.03676 18.1071L10.9942 21.5857L11.3296 20.9149L10.9942 21.5857C11.6277 21.9024 12.3732 21.9024 13.0066 21.5857L19.9641 18.1071C20.7264 17.7259 21.2079 16.9468 21.2079 16.0946V7.90563C21.2079 7.05339 20.7264 6.27429 19.9641 5.89316L13.0066 2.41453Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            UI Elements
                                        </span>

                                        <svg class="menu-item-arrow absolute top-1/2 right-2.5 -translate-y-1/2 stroke-current menu-item-arrow-inactive"
                                            :class="[(selected === 'UiElements') ? 'menu-item-arrow-active' :
                                                'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : ''
                                            ]"
                                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Dropdown Menu Start -->
                                    <div class="translate transform overflow-hidden hidden"
                                        :class="(selected === 'UiElements') ? 'block' : 'hidden'">
                                        <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                            class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                            <li>
                                                <a href="alerts.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'alerts' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Alerts
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'alerts' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="avatars.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'avatars' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Avatars
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'avatars' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="badge.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'badge' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Badge
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'badge' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="breadcrumb.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'breadcrumb' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Breadcrumb
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'breadcrumb' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="buttons.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'buttons' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Buttons
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'buttons' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="buttons-group.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'buttonsGroup' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Buttons Group
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'buttonsGroup' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cards.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'cards' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Cards
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'cards' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="carousel.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'carousel' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Carousel
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'carousel' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="dropdowns.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'dropdowns' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Dropdowns
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'dropdowns' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="images.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'images' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Images
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'images' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="links.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'links' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Links
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'links' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="list.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'list' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    List
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'list' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="modals.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'modals' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Modals
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'modals' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="notifications.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'notifications' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Notifications
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'notifications' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="pagination.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'pagination' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Pagination
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'pagination' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="popovers.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'popovers' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Popovers
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'popovers' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="progress-bar.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'progress' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Progress Bars
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'progress' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="ribbons.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'ribbons' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Ribbons
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'ribbons' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="spinners.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'spinners' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Spinners
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'spinners' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="tabs.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'tabs' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Tabs
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'tabs' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="tooltips.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'tooltips' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Tooltips
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'tooltips' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="videos.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'videos' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Videos
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'videos' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown Menu End -->
                                </li>
                                <!-- Menu Item Ui Elements -->

                                <!-- Menu Item Authentication -->
                                <li>
                                    <a href="#"
                                        @click.prevent="selected = (selected === 'Authentication' ? '':'Authentication')"
                                        class="menu-item group menu-item-inactive"
                                        :class="(selected === 'Authentication') || (page === 'basicChart' ||
                                            page === 'advancedChart') ? 'menu-item-active' : 'menu-item-inactive'">
                                        <svg :class="(selected === 'Authentication') || (page === 'basicChart' ||
                                            page === 'advancedChart') ? 'menu-item-icon-active' :
                                        'menu-item-icon-inactive'"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="menu-item-icon-inactive">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M14 2.75C14 2.33579 14.3358 2 14.75 2C15.1642 2 15.5 2.33579 15.5 2.75V5.73291L17.75 5.73291H19C19.4142 5.73291 19.75 6.0687 19.75 6.48291C19.75 6.89712 19.4142 7.23291 19 7.23291H18.5L18.5 12.2329C18.5 15.5691 15.9866 18.3183 12.75 18.6901V21.25C12.75 21.6642 12.4142 22 12 22C11.5858 22 11.25 21.6642 11.25 21.25V18.6901C8.01342 18.3183 5.5 15.5691 5.5 12.2329L5.5 7.23291H5C4.58579 7.23291 4.25 6.89712 4.25 6.48291C4.25 6.0687 4.58579 5.73291 5 5.73291L6.25 5.73291L8.5 5.73291L8.5 2.75C8.5 2.33579 8.83579 2 9.25 2C9.66421 2 10 2.33579 10 2.75L10 5.73291L14 5.73291V2.75ZM7 7.23291L7 12.2329C7 14.9943 9.23858 17.2329 12 17.2329C14.7614 17.2329 17 14.9943 17 12.2329L17 7.23291L7 7.23291Z"
                                                fill=""></path>
                                        </svg>

                                        <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                            Authentication
                                        </span>

                                        <svg class="menu-item-arrow absolute top-1/2 right-2.5 -translate-y-1/2 stroke-current menu-item-arrow-inactive"
                                            :class="[(selected === 'Authentication') ? 'menu-item-arrow-active' :
                                                'menu-item-arrow-inactive', sidebarToggle ? 'lg:hidden' : ''
                                            ]"
                                            width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.79175 7.39584L10.0001 12.6042L15.2084 7.39585" stroke=""
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </a>

                                    <!-- Dropdown Menu Start -->
                                    <div class="translate transform overflow-hidden hidden"
                                        :class="(selected === 'Authentication') ? 'block' : 'hidden'">
                                        <ul :class="sidebarToggle ? 'lg:hidden' : 'flex'"
                                            class="menu-dropdown mt-2 flex flex-col gap-1 pl-9">
                                            <li>
                                                <a href="signin.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'signin' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Sign In
                                                </a>
                                            </li>
                                            <li>
                                                <a href="signup.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'signup' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Sign Up
                                                </a>
                                            </li>
                                            <li>
                                                <a href="reset-password.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'resetPassword' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Reset Password
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'resetPassword' ? 'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="two-step-verification.html"
                                                    class="menu-dropdown-item group menu-dropdown-item-inactive"
                                                    :class="page === 'twoStepVerification' ? 'menu-dropdown-item-active' :
                                                        'menu-dropdown-item-inactive'">
                                                    Two Step Verification
                                                    <span class="absolute right-3 flex items-center gap-1">
                                                        <span class="menu-dropdown-badge menu-dropdown-badge-inactive"
                                                            :class="page === 'twoStepVerification' ?
                                                                'menu-dropdown-badge-active' :
                                                                'menu-dropdown-badge-inactive'">
                                                            Pro
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- Dropdown Menu End -->
                                </li>
                                <!-- Menu Item Authentication -->
                            </ul>
                        </div>
                    </nav>
                    <!-- Sidebar Menu -->

                    <!-- Promo Box -->
                    <div :class="sidebarToggle ? 'lg:hidden' : ''"
                        class="mx-auto mb-10 w-full max-w-60 rounded-2xl bg-gray-50 px-4 py-5 text-center dark:bg-white/[0.03]">
                        <h3 class="mb-2 font-semibold text-gray-900 dark:text-white">
                            #1 Tailwind CSS Dashboard
                        </h3>
                        <p class="text-theme-sm mb-4 text-gray-500 dark:text-gray-400">
                            Leading Tailwind CSS Admin Template with 400+ UI Component and Pages.
                        </p>
                        <a href="https://tailadmin.com/pricing" target="_blank" rel="nofollow"
                            class="bg-brand-500 text-theme-sm hover:bg-brand-600 flex items-center justify-center rounded-lg p-3 font-medium text-white">
                            Purchase Plan
                        </a>
                    </div>
                    <!-- Promo Box -->
                </div>
            </aside>

            <!-- ===== Sidebar End ===== -->

            <!-- ===== Content Area Start ===== -->
            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                <!-- Small Device Overlay Start -->
                <div :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
                    class="fixed z-9 h-screen w-full bg-gray-900/50 hidden"></div>
                <!-- Small Device Overlay End -->

                <!-- ===== Header Start ===== -->
                <header x-data="{ menuToggle: false }"
                    class="sticky top-0 z-99999 flex w-full border-gray-200 bg-white lg:border-b dark:border-gray-800 dark:bg-gray-900">
                    <div class="flex grow flex-col items-center justify-between lg:flex-row lg:px-6">
                        <div
                            class="flex w-full items-center justify-between gap-2 border-b border-gray-200 px-3 py-3 sm:gap-4 lg:justify-normal lg:border-b-0 lg:px-0 lg:py-4 dark:border-gray-800">
                            <!-- Hamburger Toggle BTN -->
                            <button
                                :class="sidebarToggle ?
                                    'lg:bg-transparent dark:lg:bg-transparent bg-gray-100 dark:bg-gray-800' : ''"
                                class="z-99999 flex h-10 w-10 items-center justify-center rounded-lg border-gray-200 text-gray-500 lg:h-11 lg:w-11 lg:border dark:border-gray-800 dark:text-gray-400"
                                @click.stop="sidebarToggle = !sidebarToggle">
                                <svg class="hidden fill-current lg:block" width="16" height="12"
                                    viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.583252 1C0.583252 0.585788 0.919038 0.25 1.33325 0.25H14.6666C15.0808 0.25 15.4166 0.585786 15.4166 1C15.4166 1.41421 15.0808 1.75 14.6666 1.75L1.33325 1.75C0.919038 1.75 0.583252 1.41422 0.583252 1ZM0.583252 11C0.583252 10.5858 0.919038 10.25 1.33325 10.25L14.6666 10.25C15.0808 10.25 15.4166 10.5858 15.4166 11C15.4166 11.4142 15.0808 11.75 14.6666 11.75L1.33325 11.75C0.919038 11.75 0.583252 11.4142 0.583252 11ZM1.33325 5.25C0.919038 5.25 0.583252 5.58579 0.583252 6C0.583252 6.41421 0.919038 6.75 1.33325 6.75L7.99992 6.75C8.41413 6.75 8.74992 6.41421 8.74992 6C8.74992 5.58579 8.41413 5.25 7.99992 5.25L1.33325 5.25Z"
                                        fill=""></path>
                                </svg>

                                <svg :class="sidebarToggle ? 'hidden' : 'block lg:hidden'"
                                    class="fill-current lg:hidden block" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M3.25 6C3.25 5.58579 3.58579 5.25 4 5.25L20 5.25C20.4142 5.25 20.75 5.58579 20.75 6C20.75 6.41421 20.4142 6.75 20 6.75L4 6.75C3.58579 6.75 3.25 6.41422 3.25 6ZM3.25 18C3.25 17.5858 3.58579 17.25 4 17.25L20 17.25C20.4142 17.25 20.75 17.5858 20.75 18C20.75 18.4142 20.4142 18.75 20 18.75L4 18.75C3.58579 18.75 3.25 18.4142 3.25 18ZM4 11.25C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75L12 12.75C12.4142 12.75 12.75 12.4142 12.75 12C12.75 11.5858 12.4142 11.25 12 11.25L4 11.25Z"
                                        fill=""></path>
                                </svg>

                                <!-- cross icon -->
                                <svg :class="sidebarToggle ? 'block lg:hidden' : 'hidden'"
                                    class="fill-current hidden" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z"
                                        fill=""></path>
                                </svg>
                            </button>
                            <!-- Hamburger Toggle BTN -->

                            <a href="index.html" class="lg:hidden">
                                <img class="dark:hidden" src="src/images/logo/logo.svg" alt="Logo">
                                <img class="hidden dark:block" src="src/images/logo/logo-dark.svg" alt="Logo">
                            </a>

                            <!-- Application nav menu button -->
                            <button
                                class="z-99999 flex h-10 w-10 items-center justify-center rounded-lg text-gray-700 hover:bg-gray-100 lg:hidden dark:text-gray-400 dark:hover:bg-gray-800"
                                :class="menuToggle ? 'bg-gray-100 dark:bg-gray-800' : ''"
                                @click.stop="menuToggle = !menuToggle">
                                <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.99902 10.4951C6.82745 10.4951 7.49902 11.1667 7.49902 11.9951V12.0051C7.49902 12.8335 6.82745 13.5051 5.99902 13.5051C5.1706 13.5051 4.49902 12.8335 4.49902 12.0051V11.9951C4.49902 11.1667 5.1706 10.4951 5.99902 10.4951ZM17.999 10.4951C18.8275 10.4951 19.499 11.1667 19.499 11.9951V12.0051C19.499 12.8335 18.8275 13.5051 17.999 13.5051C17.1706 13.5051 16.499 12.8335 16.499 12.0051V11.9951C16.499 11.1667 17.1706 10.4951 17.999 10.4951ZM13.499 11.9951C13.499 11.1667 12.8275 10.4951 11.999 10.4951C11.1706 10.4951 10.499 11.1667 10.499 11.9951V12.0051C10.499 12.8335 11.1706 13.5051 11.999 13.5051C12.8275 13.5051 13.499 12.8335 13.499 12.0051V11.9951Z"
                                        fill=""></path>
                                </svg>
                            </button>
                            <!-- Application nav menu button -->

                            <div class="hidden lg:block">
                                <form>
                                    <div class="relative">
                                        <span class="pointer-events-none absolute top-1/2 left-4 -translate-y-1/2">
                                            <svg class="fill-gray-500 dark:fill-gray-400" width="20"
                                                height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M3.04175 9.37363C3.04175 5.87693 5.87711 3.04199 9.37508 3.04199C12.8731 3.04199 15.7084 5.87693 15.7084 9.37363C15.7084 12.8703 12.8731 15.7053 9.37508 15.7053C5.87711 15.7053 3.04175 12.8703 3.04175 9.37363ZM9.37508 1.54199C5.04902 1.54199 1.54175 5.04817 1.54175 9.37363C1.54175 13.6991 5.04902 17.2053 9.37508 17.2053C11.2674 17.2053 13.003 16.5344 14.357 15.4176L17.177 18.238C17.4699 18.5309 17.9448 18.5309 18.2377 18.238C18.5306 17.9451 18.5306 17.4703 18.2377 17.1774L15.418 14.3573C16.5365 13.0033 17.2084 11.2669 17.2084 9.37363C17.2084 5.04817 13.7011 1.54199 9.37508 1.54199Z"
                                                    fill=""></path>
                                            </svg>
                                        </span>
                                        <input id="search-input" type="text"
                                            placeholder="Search or type command..."
                                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-200 bg-transparent py-2.5 pr-14 pl-12 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden xl:w-[430px] dark:border-gray-800 dark:bg-gray-900 dark:bg-white/[0.03] dark:text-white/90 dark:placeholder:text-white/30">

                                        <button id="search-button"
                                            class="absolute top-1/2 right-2.5 inline-flex -translate-y-1/2 items-center gap-0.5 rounded-lg border border-gray-200 bg-gray-50 px-[7px] py-[4.5px] text-xs -tracking-[0.2px] text-gray-500 dark:border-gray-800 dark:bg-white/[0.03] dark:text-gray-400">
                                            <span> ⌘ </span>
                                            <span> K </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div :class="menuToggle ? 'flex' : 'hidden'"
                            class="shadow-theme-md w-full items-center justify-between gap-4 px-5 py-4 lg:flex lg:justify-end lg:px-0 lg:shadow-none hidden">
                            <div class="2xsm:gap-3 flex items-center gap-2">
                                <!-- Dark Mode Toggler -->
                                <button
                                    class="hover:text-dark-900 relative flex h-11 w-11 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 transition-colors hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
                                    @click.prevent="darkMode = !darkMode">
                                    <svg class="hidden dark:block" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.99998 1.5415C10.4142 1.5415 10.75 1.87729 10.75 2.2915V3.5415C10.75 3.95572 10.4142 4.2915 9.99998 4.2915C9.58577 4.2915 9.24998 3.95572 9.24998 3.5415V2.2915C9.24998 1.87729 9.58577 1.5415 9.99998 1.5415ZM10.0009 6.79327C8.22978 6.79327 6.79402 8.22904 6.79402 10.0001C6.79402 11.7712 8.22978 13.207 10.0009 13.207C11.772 13.207 13.2078 11.7712 13.2078 10.0001C13.2078 8.22904 11.772 6.79327 10.0009 6.79327ZM5.29402 10.0001C5.29402 7.40061 7.40135 5.29327 10.0009 5.29327C12.6004 5.29327 14.7078 7.40061 14.7078 10.0001C14.7078 12.5997 12.6004 14.707 10.0009 14.707C7.40135 14.707 5.29402 12.5997 5.29402 10.0001ZM15.9813 5.08035C16.2742 4.78746 16.2742 4.31258 15.9813 4.01969C15.6884 3.7268 15.2135 3.7268 14.9207 4.01969L14.0368 4.90357C13.7439 5.19647 13.7439 5.67134 14.0368 5.96423C14.3297 6.25713 14.8045 6.25713 15.0974 5.96423L15.9813 5.08035ZM18.4577 10.0001C18.4577 10.4143 18.1219 10.7501 17.7077 10.7501H16.4577C16.0435 10.7501 15.7077 10.4143 15.7077 10.0001C15.7077 9.58592 16.0435 9.25013 16.4577 9.25013H17.7077C18.1219 9.25013 18.4577 9.58592 18.4577 10.0001ZM14.9207 15.9806C15.2135 16.2735 15.6884 16.2735 15.9813 15.9806C16.2742 15.6877 16.2742 15.2128 15.9813 14.9199L15.0974 14.036C14.8045 13.7431 14.3297 13.7431 14.0368 14.036C13.7439 14.3289 13.7439 14.8038 14.0368 15.0967L14.9207 15.9806ZM9.99998 15.7088C10.4142 15.7088 10.75 16.0445 10.75 16.4588V17.7088C10.75 18.123 10.4142 18.4588 9.99998 18.4588C9.58577 18.4588 9.24998 18.123 9.24998 17.7088V16.4588C9.24998 16.0445 9.58577 15.7088 9.99998 15.7088ZM5.96356 15.0972C6.25646 14.8043 6.25646 14.3295 5.96356 14.0366C5.67067 13.7437 5.1958 13.7437 4.9029 14.0366L4.01902 14.9204C3.72613 15.2133 3.72613 15.6882 4.01902 15.9811C4.31191 16.274 4.78679 16.274 5.07968 15.9811L5.96356 15.0972ZM4.29224 10.0001C4.29224 10.4143 3.95645 10.7501 3.54224 10.7501H2.29224C1.87802 10.7501 1.54224 10.4143 1.54224 10.0001C1.54224 9.58592 1.87802 9.25013 2.29224 9.25013H3.54224C3.95645 9.25013 4.29224 9.58592 4.29224 10.0001ZM4.9029 5.9637C5.1958 6.25659 5.67067 6.25659 5.96356 5.9637C6.25646 5.6708 6.25646 5.19593 5.96356 4.90303L5.07968 4.01915C4.78679 3.72626 4.31191 3.72626 4.01902 4.01915C3.72613 4.31204 3.72613 4.78692 4.01902 5.07981L4.9029 5.9637Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <svg class="dark:hidden" width="20" height="20" viewBox="0 0 20 20"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.4547 11.97L18.1799 12.1611C18.265 11.8383 18.1265 11.4982 17.8401 11.3266C17.5538 11.1551 17.1885 11.1934 16.944 11.4207L17.4547 11.97ZM8.0306 2.5459L8.57989 3.05657C8.80718 2.81209 8.84554 2.44682 8.67398 2.16046C8.50243 1.8741 8.16227 1.73559 7.83948 1.82066L8.0306 2.5459ZM12.9154 13.0035C9.64678 13.0035 6.99707 10.3538 6.99707 7.08524H5.49707C5.49707 11.1823 8.81835 14.5035 12.9154 14.5035V13.0035ZM16.944 11.4207C15.8869 12.4035 14.4721 13.0035 12.9154 13.0035V14.5035C14.8657 14.5035 16.6418 13.7499 17.9654 12.5193L16.944 11.4207ZM16.7295 11.7789C15.9437 14.7607 13.2277 16.9586 10.0003 16.9586V18.4586C13.9257 18.4586 17.2249 15.7853 18.1799 12.1611L16.7295 11.7789ZM10.0003 16.9586C6.15734 16.9586 3.04199 13.8433 3.04199 10.0003H1.54199C1.54199 14.6717 5.32892 18.4586 10.0003 18.4586V16.9586ZM3.04199 10.0003C3.04199 6.77289 5.23988 4.05695 8.22173 3.27114L7.83948 1.82066C4.21532 2.77574 1.54199 6.07486 1.54199 10.0003H3.04199ZM6.99707 7.08524C6.99707 5.52854 7.5971 4.11366 8.57989 3.05657L7.48132 2.03522C6.25073 3.35885 5.49707 5.13487 5.49707 7.08524H6.99707Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </button>
                                <!-- Dark Mode Toggler -->

                                <!-- Notification Menu Area -->
                                <div class="relative" x-data="{ dropdownOpen: false, notifying: true }" @click.outside="dropdownOpen = false">
                                    <button
                                        class="hover:text-dark-900 relative flex h-11 w-11 items-center justify-center rounded-full border border-gray-200 bg-white text-gray-500 transition-colors hover:bg-gray-100 hover:text-gray-700 dark:border-gray-800 dark:bg-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
                                        @click.prevent="dropdownOpen = ! dropdownOpen; notifying = false">
                                        <span :class="!notifying ? 'hidden' : 'flex'"
                                            class="absolute top-0.5 right-0 z-1 h-2 w-2 rounded-full bg-orange-400 flex">
                                            <span
                                                class="absolute -z-1 inline-flex h-full w-full animate-ping rounded-full bg-orange-400 opacity-75"></span>
                                        </span>
                                        <svg class="fill-current" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.75 2.29248C10.75 1.87827 10.4143 1.54248 10 1.54248C9.58583 1.54248 9.25004 1.87827 9.25004 2.29248V2.83613C6.08266 3.20733 3.62504 5.9004 3.62504 9.16748V14.4591H3.33337C2.91916 14.4591 2.58337 14.7949 2.58337 15.2091C2.58337 15.6234 2.91916 15.9591 3.33337 15.9591H4.37504H15.625H16.6667C17.0809 15.9591 17.4167 15.6234 17.4167 15.2091C17.4167 14.7949 17.0809 14.4591 16.6667 14.4591H16.375V9.16748C16.375 5.9004 13.9174 3.20733 10.75 2.83613V2.29248ZM14.875 14.4591V9.16748C14.875 6.47509 12.6924 4.29248 10 4.29248C7.30765 4.29248 5.12504 6.47509 5.12504 9.16748V14.4591H14.875ZM8.00004 17.7085C8.00004 18.1228 8.33583 18.4585 8.75004 18.4585H11.25C11.6643 18.4585 12 18.1228 12 17.7085C12 17.2943 11.6643 16.9585 11.25 16.9585H8.75004C8.33583 16.9585 8.00004 17.2943 8.00004 17.7085Z"
                                                fill=""></path>
                                        </svg>
                                    </button>

                                    <!-- Dropdown Start -->
                                    <div x-show="dropdownOpen"
                                        class="shadow-theme-lg dark:bg-gray-dark absolute -right-[240px] mt-[17px] flex h-[480px] w-[350px] flex-col rounded-2xl border border-gray-200 bg-white p-3 sm:w-[361px] lg:right-0 dark:border-gray-800"
                                        style="display: none;">
                                        <div
                                            class="mb-3 flex items-center justify-between border-b border-gray-100 pb-3 dark:border-gray-800">
                                            <h5 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                                Notification
                                            </h5>

                                            <button @click="dropdownOpen = false"
                                                class="text-gray-500 dark:text-gray-400">
                                                <svg class="fill-current" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M6.21967 7.28131C5.92678 6.98841 5.92678 6.51354 6.21967 6.22065C6.51256 5.92775 6.98744 5.92775 7.28033 6.22065L11.999 10.9393L16.7176 6.22078C17.0105 5.92789 17.4854 5.92788 17.7782 6.22078C18.0711 6.51367 18.0711 6.98855 17.7782 7.28144L13.0597 12L17.7782 16.7186C18.0711 17.0115 18.0711 17.4863 17.7782 17.7792C17.4854 18.0721 17.0105 18.0721 16.7176 17.7792L11.999 13.0607L7.28033 17.7794C6.98744 18.0722 6.51256 18.0722 6.21967 17.7794C5.92678 17.4865 5.92678 17.0116 6.21967 16.7187L10.9384 12L6.21967 7.28131Z"
                                                        fill=""></path>
                                                </svg>
                                            </button>
                                        </div>

                                        <ul class="custom-scrollbar flex h-auto flex-col overflow-y-auto">
                                            <li>
                                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5"
                                                    href="#">
                                                    <span class="relative z-1 block h-10 w-full max-w-10 rounded-full">
                                                        <img src="src/images/user/user-02.jpg" alt="User"
                                                            class="overflow-hidden rounded-full">
                                                        <span
                                                            class="bg-success-500 absolute right-0 bottom-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white dark:border-gray-900"></span>
                                                    </span>

                                                    <span class="block">
                                                        <span
                                                            class="text-theme-sm mb-1.5 block text-gray-500 dark:text-gray-400">
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Terry
                                                                Franci</span>
                                                            requests permission to change
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Project
                                                                - Nganter App</span>
                                                        </span>

                                                        <span
                                                            class="text-theme-xs flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                                            <span>Project</span>
                                                            <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                                                            <span>5 min ago</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5"
                                                    href="#">
                                                    <span class="relative z-1 block h-10 w-full max-w-10 rounded-full">
                                                        <img src="src/images/user/user-03.jpg" alt="User"
                                                            class="overflow-hidden rounded-full">
                                                        <span
                                                            class="bg-success-500 absolute right-0 bottom-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white dark:border-gray-900"></span>
                                                    </span>

                                                    <span class="block">
                                                        <span
                                                            class="text-theme-sm mb-1.5 block text-gray-500 dark:text-gray-400">
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Alena
                                                                Franci</span>
                                                            requests permission to change
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Project
                                                                - Nganter App</span>
                                                        </span>

                                                        <span
                                                            class="text-theme-xs flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                                            <span>Project</span>
                                                            <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                                                            <span>8 min ago</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5"
                                                    href="#">
                                                    <span class="relative z-1 block h-10 w-full max-w-10 rounded-full">
                                                        <img src="src/images/user/user-04.jpg" alt="User"
                                                            class="overflow-hidden rounded-full">
                                                        <span
                                                            class="bg-success-500 absolute right-0 bottom-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white dark:border-gray-900"></span>
                                                    </span>

                                                    <span class="block">
                                                        <span
                                                            class="text-theme-sm mb-1.5 block text-gray-500 dark:text-gray-400">
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Jocelyn
                                                                Kenter</span>
                                                            requests permission to change
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Project
                                                                - Nganter App</span>
                                                        </span>

                                                        <span
                                                            class="text-theme-xs flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                                            <span>Project</span>
                                                            <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                                                            <span>15 min ago</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5"
                                                    href="#">
                                                    <span class="relative z-1 block h-10 w-full max-w-10 rounded-full">
                                                        <img src="src/images/user/user-05.jpg" alt="User"
                                                            class="overflow-hidden rounded-full">
                                                        <span
                                                            class="bg-error-500 absolute right-0 bottom-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white dark:border-gray-900"></span>
                                                    </span>

                                                    <span class="block">
                                                        <span
                                                            class="text-theme-sm mb-1.5 block text-gray-500 dark:text-gray-400">
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Brandon
                                                                Philips</span>
                                                            requests permission to change
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Project
                                                                - Nganter App</span>
                                                        </span>

                                                        <span
                                                            class="text-theme-xs flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                                            <span>Project</span>
                                                            <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                                                            <span>1 hr ago</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5"
                                                    href="#">
                                                    <span class="relative z-1 block h-10 w-full max-w-10 rounded-full">
                                                        <img src="src/images/user/user-02.jpg" alt="User"
                                                            class="overflow-hidden rounded-full">
                                                        <span
                                                            class="bg-success-500 absolute right-0 bottom-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white dark:border-gray-900"></span>
                                                    </span>

                                                    <span class="block">
                                                        <span
                                                            class="text-theme-sm mb-1.5 block text-gray-500 dark:text-gray-400">
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Terry
                                                                Franci</span>
                                                            requests permission to change
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Project
                                                                - Nganter App</span>
                                                        </span>

                                                        <span
                                                            class="text-theme-xs flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                                            <span>Project</span>
                                                            <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                                                            <span>5 min ago</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5"
                                                    href="#">
                                                    <span class="relative z-1 block h-10 w-full max-w-10 rounded-full">
                                                        <img src="src/images/user/user-03.jpg" alt="User"
                                                            class="overflow-hidden rounded-full">
                                                        <span
                                                            class="bg-success-500 absolute right-0 bottom-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white dark:border-gray-900"></span>
                                                    </span>

                                                    <span class="block">
                                                        <span
                                                            class="text-theme-sm mb-1.5 block text-gray-500 dark:text-gray-400">
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Alena
                                                                Franci</span>
                                                            requests permission to change
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Project
                                                                - Nganter App</span>
                                                        </span>

                                                        <span
                                                            class="text-theme-xs flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                                            <span>Project</span>
                                                            <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                                                            <span>8 min ago</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5"
                                                    href="#">
                                                    <span
                                                        class="relative z-1 block h-10 w-full max-w-10 rounded-full">
                                                        <img src="src/images/user/user-04.jpg" alt="User"
                                                            class="overflow-hidden rounded-full">
                                                        <span
                                                            class="bg-success-500 absolute right-0 bottom-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white dark:border-gray-900"></span>
                                                    </span>

                                                    <span class="block">
                                                        <span
                                                            class="text-theme-sm mb-1.5 block text-gray-500 dark:text-gray-400">
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Jocelyn
                                                                Kenter</span>
                                                            requests permission to change
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Project
                                                                - Nganter App</span>
                                                        </span>

                                                        <span
                                                            class="text-theme-xs flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                                            <span>Project</span>
                                                            <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                                                            <span>15 min ago</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a class="flex gap-3 rounded-lg border-b border-gray-100 p-3 px-4.5 py-3 hover:bg-gray-100 dark:border-gray-800 dark:hover:bg-white/5"
                                                    href="#">
                                                    <span
                                                        class="relative z-1 block h-10 w-full max-w-10 rounded-full">
                                                        <img src="src/images/user/user-05.jpg" alt="User"
                                                            class="overflow-hidden rounded-full">
                                                        <span
                                                            class="bg-error-500 absolute right-0 bottom-0 z-10 h-2.5 w-full max-w-2.5 rounded-full border-[1.5px] border-white dark:border-gray-900"></span>
                                                    </span>

                                                    <span class="block">
                                                        <span
                                                            class="text-theme-sm mb-1.5 block text-gray-500 dark:text-gray-400">
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Brandon
                                                                Philips</span>
                                                            requests permission to change
                                                            <span
                                                                class="font-medium text-gray-800 dark:text-white/90">Project
                                                                - Nganter App</span>
                                                        </span>

                                                        <span
                                                            class="text-theme-xs flex items-center gap-2 text-gray-500 dark:text-gray-400">
                                                            <span>Project</span>
                                                            <span class="h-1 w-1 rounded-full bg-gray-400"></span>
                                                            <span>1 hr ago</span>
                                                        </span>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>

                                        <a href="#"
                                            class="text-theme-sm shadow-theme-xs mt-3 flex justify-center rounded-lg border border-gray-300 bg-white p-3 font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                                            View All Notification
                                        </a>
                                    </div>
                                    <!-- Dropdown End -->
                                </div>
                                <!-- Notification Menu Area -->
                            </div>

                            <!-- User Area -->
                            <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                                <a class="flex items-center text-gray-700 dark:text-gray-400" href="#"
                                    @click.prevent="dropdownOpen = ! dropdownOpen">
                                    <span class="mr-3 h-11 w-11 overflow-hidden rounded-full">
                                        <img src="src/images/user/owner.jpg" alt="User">
                                    </span>

                                    <span class="text-theme-sm mr-1 block font-medium"> Musharof </span>

                                    <svg :class="dropdownOpen & amp; & amp;
                                    'rotate-180'"
                                        class="stroke-gray-500 dark:stroke-gray-400" width="18" height="20"
                                        viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.3125 8.65625L9 13.3437L13.6875 8.65625" stroke=""
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                </a>

                                <!-- Dropdown Start -->
                                <div x-show="dropdownOpen"
                                    class="shadow-theme-lg dark:bg-gray-dark absolute right-0 mt-[17px] flex w-[260px] flex-col rounded-2xl border border-gray-200 bg-white p-3 dark:border-gray-800"
                                    style="display: none;">
                                    <div>
                                        <span
                                            class="text-theme-sm block font-medium text-gray-700 dark:text-gray-400">
                                            Musharof Chowdhury
                                        </span>
                                        <span class="text-theme-xs mt-0.5 block text-gray-500 dark:text-gray-400">
                                            randomuser@pimjo.com
                                        </span>
                                    </div>

                                    <ul
                                        class="flex flex-col gap-1 border-b border-gray-200 pt-4 pb-3 dark:border-gray-800">
                                        <li>
                                            <a href="profile.html"
                                                class="group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                <svg class="fill-gray-500 group-hover:fill-gray-700 dark:fill-gray-400 dark:group-hover:fill-gray-300"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12 3.5C7.30558 3.5 3.5 7.30558 3.5 12C3.5 14.1526 4.3002 16.1184 5.61936 17.616C6.17279 15.3096 8.24852 13.5955 10.7246 13.5955H13.2746C15.7509 13.5955 17.8268 15.31 18.38 17.6167C19.6996 16.119 20.5 14.153 20.5 12C20.5 7.30558 16.6944 3.5 12 3.5ZM17.0246 18.8566V18.8455C17.0246 16.7744 15.3457 15.0955 13.2746 15.0955H10.7246C8.65354 15.0955 6.97461 16.7744 6.97461 18.8455V18.856C8.38223 19.8895 10.1198 20.5 12 20.5C13.8798 20.5 15.6171 19.8898 17.0246 18.8566ZM2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM11.9991 7.25C10.8847 7.25 9.98126 8.15342 9.98126 9.26784C9.98126 10.3823 10.8847 11.2857 11.9991 11.2857C13.1135 11.2857 14.0169 10.3823 14.0169 9.26784C14.0169 8.15342 13.1135 7.25 11.9991 7.25ZM8.48126 9.26784C8.48126 7.32499 10.0563 5.75 11.9991 5.75C13.9419 5.75 15.5169 7.32499 15.5169 9.26784C15.5169 11.2107 13.9419 12.7857 11.9991 12.7857C10.0563 12.7857 8.48126 11.2107 8.48126 9.26784Z"
                                                        fill=""></path>
                                                </svg>
                                                Edit profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="chat.html"
                                                class="group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                <svg class="fill-gray-500 group-hover:fill-gray-700 dark:fill-gray-400 dark:group-hover:fill-gray-300"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.4858 3.5L13.5182 3.5C13.9233 3.5 14.2518 3.82851 14.2518 4.23377C14.2518 5.9529 16.1129 7.02795 17.602 6.1682C17.9528 5.96567 18.4014 6.08586 18.6039 6.43667L20.1203 9.0631C20.3229 9.41407 20.2027 9.86286 19.8517 10.0655C18.3625 10.9253 18.3625 13.0747 19.8517 13.9345C20.2026 14.1372 20.3229 14.5859 20.1203 14.9369L18.6039 17.5634C18.4013 17.9142 17.9528 18.0344 17.602 17.8318C16.1129 16.9721 14.2518 18.0471 14.2518 19.7663C14.2518 20.1715 13.9233 20.5 13.5182 20.5H10.4858C10.0804 20.5 9.75182 20.1714 9.75182 19.766C9.75182 18.0461 7.88983 16.9717 6.40067 17.8314C6.04945 18.0342 5.60037 17.9139 5.39767 17.5628L3.88167 14.937C3.67903 14.586 3.79928 14.1372 4.15026 13.9346C5.63949 13.0748 5.63946 10.9253 4.15025 10.0655C3.79926 9.86282 3.67901 9.41401 3.88165 9.06303L5.39764 6.43725C5.60034 6.08617 6.04943 5.96581 6.40065 6.16858C7.88982 7.02836 9.75182 5.9539 9.75182 4.23399C9.75182 3.82862 10.0804 3.5 10.4858 3.5ZM13.5182 2L10.4858 2C9.25201 2 8.25182 3.00019 8.25182 4.23399C8.25182 4.79884 7.64013 5.15215 7.15065 4.86955C6.08213 4.25263 4.71559 4.61859 4.0986 5.68725L2.58261 8.31303C1.96575 9.38146 2.33183 10.7477 3.40025 11.3645C3.88948 11.647 3.88947 12.3531 3.40026 12.6355C2.33184 13.2524 1.96578 14.6186 2.58263 15.687L4.09863 18.3128C4.71562 19.3814 6.08215 19.7474 7.15067 19.1305C7.64015 18.8479 8.25182 19.2012 8.25182 19.766C8.25182 20.9998 9.25201 22 10.4858 22H13.5182C14.7519 22 15.7518 20.9998 15.7518 19.7663C15.7518 19.2015 16.3632 18.8487 16.852 19.1309C17.9202 19.7476 19.2862 19.3816 19.9029 18.3134L21.4193 15.6869C22.0361 14.6185 21.6701 13.2523 20.6017 12.6355C20.1125 12.3531 20.1125 11.647 20.6017 11.3645C21.6701 10.7477 22.0362 9.38152 21.4193 8.3131L19.903 5.68667C19.2862 4.61842 17.9202 4.25241 16.852 4.86917C16.3632 5.15138 15.7518 4.79856 15.7518 4.23377C15.7518 3.00024 14.7519 2 13.5182 2ZM9.6659 11.9999C9.6659 10.7103 10.7113 9.66493 12.0009 9.66493C13.2905 9.66493 14.3359 10.7103 14.3359 11.9999C14.3359 13.2895 13.2905 14.3349 12.0009 14.3349C10.7113 14.3349 9.6659 13.2895 9.6659 11.9999ZM12.0009 8.16493C9.88289 8.16493 8.1659 9.88191 8.1659 11.9999C8.1659 14.1179 9.88289 15.8349 12.0009 15.8349C14.1189 15.8349 15.8359 14.1179 15.8359 11.9999C15.8359 9.88191 14.1189 8.16493 12.0009 8.16493Z"
                                                        fill=""></path>
                                                </svg>
                                                Account settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="profile.html"
                                                class="group text-theme-sm flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                <svg class="fill-gray-500 group-hover:fill-gray-700 dark:fill-gray-400 dark:group-hover:fill-gray-300"
                                                    width="24" height="24" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3.5 12C3.5 7.30558 7.30558 3.5 12 3.5C16.6944 3.5 20.5 7.30558 20.5 12C20.5 16.6944 16.6944 20.5 12 20.5C7.30558 20.5 3.5 16.6944 3.5 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM11.0991 7.52507C11.0991 8.02213 11.5021 8.42507 11.9991 8.42507H12.0001C12.4972 8.42507 12.9001 8.02213 12.9001 7.52507C12.9001 7.02802 12.4972 6.62507 12.0001 6.62507H11.9991C11.5021 6.62507 11.0991 7.02802 11.0991 7.52507ZM12.0001 17.3714C11.5859 17.3714 11.2501 17.0356 11.2501 16.6214V10.9449C11.2501 10.5307 11.5859 10.1949 12.0001 10.1949C12.4143 10.1949 12.7501 10.5307 12.7501 10.9449V16.6214C12.7501 17.0356 12.4143 17.3714 12.0001 17.3714Z"
                                                        fill=""></path>
                                                </svg>
                                                Support
                                            </a>
                                        </li>
                                    </ul>
                                    <button
                                        class="group text-theme-sm mt-3 flex items-center gap-3 rounded-lg px-3 py-2 font-medium text-gray-700 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                        <svg class="fill-gray-500 group-hover:fill-gray-700 dark:group-hover:fill-gray-300"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.1007 19.247C14.6865 19.247 14.3507 18.9112 14.3507 18.497L14.3507 14.245H12.8507V18.497C12.8507 19.7396 13.8581 20.747 15.1007 20.747H18.5007C19.7434 20.747 20.7507 19.7396 20.7507 18.497L20.7507 5.49609C20.7507 4.25345 19.7433 3.24609 18.5007 3.24609H15.1007C13.8581 3.24609 12.8507 4.25345 12.8507 5.49609V9.74501L14.3507 9.74501V5.49609C14.3507 5.08188 14.6865 4.74609 15.1007 4.74609L18.5007 4.74609C18.9149 4.74609 19.2507 5.08188 19.2507 5.49609L19.2507 18.497C19.2507 18.9112 18.9149 19.247 18.5007 19.247H15.1007ZM3.25073 11.9984C3.25073 12.2144 3.34204 12.4091 3.48817 12.546L8.09483 17.1556C8.38763 17.4485 8.86251 17.4487 9.15549 17.1559C9.44848 16.8631 9.44863 16.3882 9.15583 16.0952L5.81116 12.7484L16.0007 12.7484C16.4149 12.7484 16.7507 12.4127 16.7507 11.9984C16.7507 11.5842 16.4149 11.2484 16.0007 11.2484L5.81528 11.2484L9.15585 7.90554C9.44864 7.61255 9.44847 7.13767 9.15547 6.84488C8.86248 6.55209 8.3876 6.55226 8.09481 6.84525L3.52309 11.4202C3.35673 11.5577 3.25073 11.7657 3.25073 11.9984Z"
                                                fill=""></path>
                                        </svg>

                                        Sign out
                                    </button>
                                </div>
                                <!-- Dropdown End -->
                            </div>
                            <!-- User Area -->
                        </div>
                    </div>
                </header>
                <!-- ===== Header End ===== -->

                <!-- ===== Main Content Start ===== -->
                <main>
                    <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                        <div class="grid grid-cols-12 gap-4 md:gap-6">
                            <div class="col-span-12">
                                <!-- Metric Group Two -->
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6 xl:grid-cols-4">
                                    <!-- Metric Item Start -->
                                    <div
                                        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">
                                            Unique Visitors
                                        </p>

                                        <div class="mt-3 flex items-end justify-between">
                                            <div>
                                                <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">
                                                    24.7K
                                                </h4>
                                            </div>

                                            <div class="flex items-center gap-1">
                                                <span
                                                    class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                                                    +20%
                                                </span>

                                                <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                                                    Vs last month
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Metric Item End -->

                                    <!-- Metric Item Start -->
                                    <div
                                        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">
                                            Total Pageviews
                                        </p>

                                        <div class="mt-3 flex items-end justify-between">
                                            <div>
                                                <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">
                                                    55.9K
                                                </h4>
                                            </div>

                                            <div class="flex items-center gap-1">
                                                <span
                                                    class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                                                    +4%
                                                </span>

                                                <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                                                    Vs last month
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Metric Item End -->

                                    <!-- Metric Item Start -->
                                    <div
                                        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">Bounce Rate</p>

                                        <div class="mt-3 flex items-end justify-between">
                                            <div>
                                                <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">54%
                                                </h4>
                                            </div>

                                            <div class="flex items-center gap-1">
                                                <span
                                                    class="flex items-center gap-1 rounded-full bg-error-50 px-2 py-0.5 text-theme-xs font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
                                                    -1.59%
                                                </span>

                                                <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                                                    Vs last month
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Metric Item End -->

                                    <!-- Metric Item Start -->
                                    <div
                                        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">
                                        <p class="text-theme-sm text-gray-500 dark:text-gray-400">Visit Duration</p>

                                        <div class="mt-3 flex items-end justify-between">
                                            <div>
                                                <h4 class="text-2xl font-bold text-gray-800 dark:text-white/90">
                                                    2m 56s
                                                </h4>
                                            </div>

                                            <div class="flex items-center gap-1">
                                                <span
                                                    class="flex items-center gap-1 rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                                                    +7%
                                                </span>

                                                <span class="text-theme-xs text-gray-500 dark:text-gray-400">
                                                    Vs last month
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Metric Item End -->
                                </div>
                                <!-- Metric Group Two -->
                            </div>

                            <div class="col-span-12">
                                <!-- ====== Chart Four Start -->
                                <div
                                    class="rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
                                    <div class="flex flex-wrap items-start justify-between gap-5">
                                        <div>
                                            <h3 class="mb-1 text-lg font-semibold text-gray-800 dark:text-white/90">
                                                Analytics
                                            </h3>
                                            <span class="block text-theme-sm text-gray-500 dark:text-gray-400">
                                                Visitor analytics of last 30 days
                                            </span>
                                        </div>

                                        <div x-data="{ selected: 'optionOne' }"
                                            class="flex items-center gap-0.5 rounded-lg bg-gray-100 p-0.5 dark:bg-gray-900">
                                            <button @click="selected = 'optionOne'"
                                                :class="selected === 'optionOne' ?
                                                    'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800' :
                                                    'text-gray-500 dark:text-gray-400'"
                                                class=":hover:text-white rounded-md px-3 py-2 text-theme-sm font-medium hover:text-gray-900 shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800">
                                                12 months
                                            </button>

                                            <button @click="selected = 'optionTwo'"
                                                :class="selected === 'optionTwo' ?
                                                    'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800' :
                                                    'text-gray-500 dark:text-gray-400'"
                                                class="hover:text-gray-900dark:hover:text-white rounded-md px-3 py-2 text-theme-sm font-medium text-gray-500 dark:text-gray-400">
                                                30 days
                                            </button>

                                            <button @click="selected = 'optionThree'"
                                                :class="selected === 'optionThree' ?
                                                    'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800' :
                                                    'text-gray-500 dark:text-gray-400'"
                                                class="rounded-md px-3 py-2 text-theme-sm font-medium hover:text-gray-900 dark:hover:text-white text-gray-500 dark:text-gray-400">
                                                7 days
                                            </button>

                                            <button @click="selected = 'optionFour'"
                                                :class="selected === 'optionFour' ?
                                                    'shadow-theme-xs text-gray-900 dark:text-white bg-white dark:bg-gray-800' :
                                                    'text-gray-500 dark:text-gray-400'"
                                                class="rounded-md px-3 py-2 text-theme-sm font-medium hover:text-gray-900 dark:hover:text-white text-gray-500 dark:text-gray-400">
                                                24 hours
                                            </button>
                                        </div>
                                    </div>
                                    <div class="custom-scrollbar max-w-full overflow-x-auto">
                                        <div id="chartFour" class="-ml-5 min-w-[1300px] pl-2"
                                            style="min-height: 365px;">
                                            <div id="apexchartswjvwuxqs"
                                                class="apexcharts-canvas apexchartswjvwuxqs apexcharts-theme-"
                                                style="width: 1292px; height: 350px;"><svg id="SvgjsSvg3440"
                                                    width="1292" height="350"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                    xmlns:data="ApexChartsNS" transform="translate(0, 0)">
                                                    <foreignObject x="0" y="0" width="1292" height="350">
                                                        <div xmlns="http://www.w3.org/1999/xhtml"
                                                            style="position: relative; height: 100%; width: 100%;">
                                                            <div class="apexcharts-legend"
                                                                style="max-height: 175px;"></div>
                                                        </div>
                                                    </foreignObject>
                                                    <g id="SvgjsG3453" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                    <g id="SvgjsG3454" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                    <g id="SvgjsG3625" class="apexcharts-yaxis" rel="0"
                                                        transform="translate(18.012500762939453, 0)">
                                                        <g id="SvgjsG3626" class="apexcharts-yaxis-texts-g"><text
                                                                id="SvgjsText3628" font-family="Outfit, sans-serif"
                                                                x="20" y="33.666666666666664" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3629">400</tspan>
                                                                <title>400</title>
                                                            </text><text id="SvgjsText3631"
                                                                font-family="Outfit, sans-serif" x="20"
                                                                y="103.76826674381891" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3632">300</tspan>
                                                                <title>300</title>
                                                            </text><text id="SvgjsText3634"
                                                                font-family="Outfit, sans-serif" x="20"
                                                                y="173.86986682097117" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3635">200</tspan>
                                                                <title>200</title>
                                                            </text><text id="SvgjsText3637"
                                                                font-family="Outfit, sans-serif" x="20"
                                                                y="243.97146689812342" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3638">100</tspan>
                                                                <title>100</title>
                                                            </text><text id="SvgjsText3640"
                                                                font-family="Outfit, sans-serif" x="20"
                                                                y="314.07306697527565" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3641">0</tspan>
                                                                <title>0</title>
                                                            </text></g>
                                                    </g>
                                                    <g id="SvgjsG3442" class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(48.01250076293945, 30)">
                                                        <defs id="SvgjsDefs3441">
                                                            <linearGradient id="SvgjsLinearGradient3445"
                                                                x1="0" y1="0" x2="0"
                                                                y2="1">
                                                                <stop id="SvgjsStop3446" stop-opacity="0.4"
                                                                    stop-color="rgba(216,227,240,0.4)"
                                                                    offset="0"></stop>
                                                                <stop id="SvgjsStop3447" stop-opacity="0.5"
                                                                    stop-color="rgba(190,209,230,0.5)"
                                                                    offset="1"></stop>
                                                                <stop id="SvgjsStop3448" stop-opacity="0.5"
                                                                    stop-color="rgba(190,209,230,0.5)"
                                                                    offset="1"></stop>
                                                            </linearGradient>
                                                            <clipPath id="gridRectMaskwjvwuxqs">
                                                                <rect id="SvgjsRect3450" width="1233.9874992370605"
                                                                    height="280.406400308609" x="0" y="0"
                                                                    rx="0" ry="0" opacity="1"
                                                                    stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="gridRectBarMaskwjvwuxqs">
                                                                <rect id="SvgjsRect3451" width="1241.9874992370605"
                                                                    height="288.406400308609" x="-4" y="-4"
                                                                    rx="0" ry="0" opacity="1"
                                                                    stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="gridRectMarkerMaskwjvwuxqs">
                                                                <rect id="SvgjsRect3452" width="1233.9874992370605"
                                                                    height="280.406400308609" x="0" y="0"
                                                                    rx="0" ry="0" opacity="1"
                                                                    stroke-width="0" stroke="none"
                                                                    stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="forecastMaskwjvwuxqs"></clipPath>
                                                            <clipPath id="nonForecastMaskwjvwuxqs"></clipPath>
                                                        </defs>
                                                        <rect id="SvgjsRect3449" width="18.50981248855591"
                                                            height="280.406400308609" x="0" y="0" rx="0"
                                                            ry="0" opacity="1" stroke-width="0"
                                                            stroke-dasharray="3"
                                                            fill="url(#SvgjsLinearGradient3445)"
                                                            class="apexcharts-xcrosshairs" y2="280.406400308609"
                                                            filter="none" fill-opacity="0.9"></rect>
                                                        <g id="SvgjsG3520" class="apexcharts-grid">
                                                            <g id="SvgjsG3521"
                                                                class="apexcharts-gridlines-horizontal">
                                                                <line id="SvgjsLine3525" x1="0"
                                                                    y1="70.10160007715226" x2="1233.9874992370605"
                                                                    y2="70.10160007715226" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine3526" x1="0"
                                                                    y1="140.2032001543045" x2="1233.9874992370605"
                                                                    y2="140.2032001543045" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine3527" x1="0"
                                                                    y1="210.30480023145677" x2="1233.9874992370605"
                                                                    y2="210.30480023145677" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                            </g>
                                                            <g id="SvgjsG3522"
                                                                class="apexcharts-gridlines-vertical"></g>
                                                            <line id="SvgjsLine3530" x1="0"
                                                                y1="280.406400308609" x2="1233.9874992370605"
                                                                y2="280.406400308609" stroke="transparent"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line id="SvgjsLine3529" x1="0" y1="1"
                                                                x2="0" y2="280.406400308609"
                                                                stroke="transparent" stroke-dasharray="0"
                                                                stroke-linecap="butt"></line>
                                                        </g>
                                                        <g id="SvgjsG3523" class="apexcharts-grid-borders">
                                                            <line id="SvgjsLine3524" x1="0" y1="0"
                                                                x2="1233.9874992370605" y2="0"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                            </line>
                                                            <line id="SvgjsLine3528" x1="0"
                                                                y1="280.406400308609" x2="1233.9874992370605"
                                                                y2="280.406400308609" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG3455"
                                                            class="apexcharts-bar-series apexcharts-plot-series">
                                                            <g id="SvgjsG3456" class="apexcharts-series"
                                                                rel="1" seriesName="Sales"
                                                                data:realIndex="0">
                                                                <path id="SvgjsPath3461"
                                                                    d="M 13.311552076339723 278.407400308609 L 13.311552076339723 169.63671217899324 C 13.311552076339723 167.13671217899324 15.811552076339723 164.63671217899324 18.311552076339723 164.63671217899324 L 22.82136456489563 164.63671217899324 C 25.32136456489563 164.63671217899324 27.82136456489563 167.13671217899324 27.82136456489563 169.63671217899324 L 27.82136456489563 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 13.311552076339723 278.407400308609 L 13.311552076339723 169.63671217899324 C 13.311552076339723 167.13671217899324 15.811552076339723 164.63671217899324 18.311552076339723 164.63671217899324 L 22.82136456489563 164.63671217899324 C 25.32136456489563 164.63671217899324 27.82136456489563 167.13671217899324 27.82136456489563 169.63671217899324 L 27.82136456489563 278.407400308609 z "
                                                                    pathFrom="M 13.311552076339723 278.407400308609 L 13.311552076339723 278.407400308609 L 27.82136456489563 278.407400308609 L 27.82136456489563 278.407400308609 L 27.82136456489563 278.407400308609 L 27.82136456489563 278.407400308609 L 27.82136456489563 278.407400308609 L 13.311552076339723 278.407400308609 z"
                                                                    cy="162.63571217899323" cx="50.44446871757508"
                                                                    j="0" val="168"
                                                                    barHeight="117.77068812961579"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3463"
                                                                    d="M 54.44446871757508 278.407400308609 L 54.44446871757508 17.516240011572812 C 54.44446871757508 15.016240011572812 56.94446871757508 12.516240011572814 59.44446871757508 12.516240011572814 L 63.954281206130986 12.516240011572814 C 66.45428120613099 12.516240011572814 68.95428120613099 15.016240011572812 68.95428120613099 17.516240011572812 L 68.95428120613099 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 54.44446871757508 278.407400308609 L 54.44446871757508 17.516240011572812 C 54.44446871757508 15.016240011572812 56.94446871757508 12.516240011572814 59.44446871757508 12.516240011572814 L 63.954281206130986 12.516240011572814 C 66.45428120613099 12.516240011572814 68.95428120613099 15.016240011572812 68.95428120613099 17.516240011572812 L 68.95428120613099 278.407400308609 z "
                                                                    pathFrom="M 54.44446871757508 278.407400308609 L 54.44446871757508 278.407400308609 L 68.95428120613099 278.407400308609 L 68.95428120613099 278.407400308609 L 68.95428120613099 278.407400308609 L 68.95428120613099 278.407400308609 L 68.95428120613099 278.407400308609 L 54.44446871757508 278.407400308609 z"
                                                                    cy="10.515240011572814" cx="91.57738535881043"
                                                                    j="1" val="385"
                                                                    barHeight="269.8911602970362"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3465"
                                                                    d="M 95.57738535881043 278.407400308609 L 95.57738535881043 146.503184153533 C 95.57738535881043 144.003184153533 98.07738535881043 141.503184153533 100.57738535881043 141.503184153533 L 105.08719784736634 141.503184153533 C 107.58719784736634 141.503184153533 110.08719784736634 144.003184153533 110.08719784736634 146.503184153533 L 110.08719784736634 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 95.57738535881043 278.407400308609 L 95.57738535881043 146.503184153533 C 95.57738535881043 144.003184153533 98.07738535881043 141.503184153533 100.57738535881043 141.503184153533 L 105.08719784736634 141.503184153533 C 107.58719784736634 141.503184153533 110.08719784736634 144.003184153533 110.08719784736634 146.503184153533 L 110.08719784736634 278.407400308609 z "
                                                                    pathFrom="M 95.57738535881043 278.407400308609 L 95.57738535881043 278.407400308609 L 110.08719784736634 278.407400308609 L 110.08719784736634 278.407400308609 L 110.08719784736634 278.407400308609 L 110.08719784736634 278.407400308609 L 110.08719784736634 278.407400308609 L 95.57738535881043 278.407400308609 z"
                                                                    cy="139.502184153533" cx="132.71030200004577"
                                                                    j="2" val="201"
                                                                    barHeight="140.90421615507603"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3467"
                                                                    d="M 136.71030200004577 278.407400308609 L 136.71030200004577 78.5046320786953 C 136.71030200004577 76.0046320786953 139.21030200004577 73.5046320786953 141.71030200004577 73.5046320786953 L 146.22011448860167 73.5046320786953 C 148.72011448860167 73.5046320786953 151.22011448860167 76.0046320786953 151.22011448860167 78.5046320786953 L 151.22011448860167 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 136.71030200004577 278.407400308609 L 136.71030200004577 78.5046320786953 C 136.71030200004577 76.0046320786953 139.21030200004577 73.5046320786953 141.71030200004577 73.5046320786953 L 146.22011448860167 73.5046320786953 C 148.72011448860167 73.5046320786953 151.22011448860167 76.0046320786953 151.22011448860167 78.5046320786953 L 151.22011448860167 278.407400308609 z "
                                                                    pathFrom="M 136.71030200004577 278.407400308609 L 136.71030200004577 278.407400308609 L 151.22011448860167 278.407400308609 L 151.22011448860167 278.407400308609 L 151.22011448860167 278.407400308609 L 151.22011448860167 278.407400308609 L 151.22011448860167 278.407400308609 L 136.71030200004577 278.407400308609 z"
                                                                    cy="71.50363207869529" cx="173.8432186412811"
                                                                    j="3" val="298"
                                                                    barHeight="208.90276822991373"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3469"
                                                                    d="M 177.8432186412811 278.407400308609 L 177.8432186412811 156.3174081643343 C 177.8432186412811 153.8174081643343 180.3432186412811 151.3174081643343 182.8432186412811 151.3174081643343 L 187.353031129837 151.3174081643343 C 189.853031129837 151.3174081643343 192.353031129837 153.8174081643343 192.353031129837 156.3174081643343 L 192.353031129837 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 177.8432186412811 278.407400308609 L 177.8432186412811 156.3174081643343 C 177.8432186412811 153.8174081643343 180.3432186412811 151.3174081643343 182.8432186412811 151.3174081643343 L 187.353031129837 151.3174081643343 C 189.853031129837 151.3174081643343 192.353031129837 153.8174081643343 192.353031129837 156.3174081643343 L 192.353031129837 278.407400308609 z "
                                                                    pathFrom="M 177.8432186412811 278.407400308609 L 177.8432186412811 278.407400308609 L 192.353031129837 278.407400308609 L 192.353031129837 278.407400308609 L 192.353031129837 278.407400308609 L 192.353031129837 278.407400308609 L 192.353031129837 278.407400308609 L 177.8432186412811 278.407400308609 z"
                                                                    cy="149.3164081643343" cx="214.97613528251645"
                                                                    j="4" val="187"
                                                                    barHeight="131.08999214427473"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3471"
                                                                    d="M 218.97613528251645 278.407400308609 L 218.97613528251645 150.70928015816213 C 218.97613528251645 148.20928015816213 221.47613528251645 145.70928015816213 223.97613528251645 145.70928015816213 L 228.48594777107235 145.70928015816213 C 230.98594777107235 145.70928015816213 233.48594777107235 148.20928015816213 233.48594777107235 150.70928015816213 L 233.48594777107235 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 218.97613528251645 278.407400308609 L 218.97613528251645 150.70928015816213 C 218.97613528251645 148.20928015816213 221.47613528251645 145.70928015816213 223.97613528251645 145.70928015816213 L 228.48594777107235 145.70928015816213 C 230.98594777107235 145.70928015816213 233.48594777107235 148.20928015816213 233.48594777107235 150.70928015816213 L 233.48594777107235 278.407400308609 z "
                                                                    pathFrom="M 218.97613528251645 278.407400308609 L 218.97613528251645 278.407400308609 L 233.48594777107235 278.407400308609 L 233.48594777107235 278.407400308609 L 233.48594777107235 278.407400308609 L 233.48594777107235 278.407400308609 L 233.48594777107235 278.407400308609 L 218.97613528251645 278.407400308609 z"
                                                                    cy="143.70828015816213" cx="256.1090519237518"
                                                                    j="5" val="195"
                                                                    barHeight="136.6981201504469"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3473"
                                                                    d="M 260.1090519237518 278.407400308609 L 260.1090519237518 83.41174408409597 C 260.1090519237518 80.91174408409597 262.6090519237518 78.41174408409597 265.1090519237518 78.41174408409597 L 269.6188644123077 78.41174408409597 C 272.1188644123077 78.41174408409597 274.6188644123077 80.91174408409597 274.6188644123077 83.41174408409597 L 274.6188644123077 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 260.1090519237518 278.407400308609 L 260.1090519237518 83.41174408409597 C 260.1090519237518 80.91174408409597 262.6090519237518 78.41174408409597 265.1090519237518 78.41174408409597 L 269.6188644123077 78.41174408409597 C 272.1188644123077 78.41174408409597 274.6188644123077 80.91174408409597 274.6188644123077 83.41174408409597 L 274.6188644123077 278.407400308609 z "
                                                                    pathFrom="M 260.1090519237518 278.407400308609 L 260.1090519237518 278.407400308609 L 274.6188644123077 278.407400308609 L 274.6188644123077 278.407400308609 L 274.6188644123077 278.407400308609 L 274.6188644123077 278.407400308609 L 274.6188644123077 278.407400308609 L 260.1090519237518 278.407400308609 z"
                                                                    cy="76.41074408409597" cx="297.24196856498713"
                                                                    j="6" val="291"
                                                                    barHeight="203.99565622451306"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3475"
                                                                    d="M 301.24196856498713 278.407400308609 L 301.24196856498713 210.29564022374154 C 301.24196856498713 207.79564022374154 303.74196856498713 205.29564022374154 306.24196856498713 205.29564022374154 L 310.751781053543 205.29564022374154 C 313.251781053543 205.29564022374154 315.751781053543 207.79564022374154 315.751781053543 210.29564022374154 L 315.751781053543 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 301.24196856498713 278.407400308609 L 301.24196856498713 210.29564022374154 C 301.24196856498713 207.79564022374154 303.74196856498713 205.29564022374154 306.24196856498713 205.29564022374154 L 310.751781053543 205.29564022374154 C 313.251781053543 205.29564022374154 315.751781053543 207.79564022374154 315.751781053543 210.29564022374154 L 315.751781053543 278.407400308609 z "
                                                                    pathFrom="M 301.24196856498713 278.407400308609 L 301.24196856498713 278.407400308609 L 315.751781053543 278.407400308609 L 315.751781053543 278.407400308609 L 315.751781053543 278.407400308609 L 315.751781053543 278.407400308609 L 315.751781053543 278.407400308609 L 301.24196856498713 278.407400308609 z"
                                                                    cy="203.29464022374154" cx="338.3748852062225"
                                                                    j="7" val="110"
                                                                    barHeight="77.11176008486748"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3477"
                                                                    d="M 342.3748852062225 278.407400308609 L 342.3748852062225 136.68896014273167 C 342.3748852062225 134.18896014273167 344.8748852062225 131.68896014273167 347.3748852062225 131.68896014273167 L 351.88469769477837 131.68896014273167 C 354.38469769477837 131.68896014273167 356.88469769477837 134.18896014273167 356.88469769477837 136.68896014273167 L 356.88469769477837 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 342.3748852062225 278.407400308609 L 342.3748852062225 136.68896014273167 C 342.3748852062225 134.18896014273167 344.8748852062225 131.68896014273167 347.3748852062225 131.68896014273167 L 351.88469769477837 131.68896014273167 C 354.38469769477837 131.68896014273167 356.88469769477837 134.18896014273167 356.88469769477837 136.68896014273167 L 356.88469769477837 278.407400308609 z "
                                                                    pathFrom="M 342.3748852062225 278.407400308609 L 342.3748852062225 278.407400308609 L 356.88469769477837 278.407400308609 L 356.88469769477837 278.407400308609 L 356.88469769477837 278.407400308609 L 356.88469769477837 278.407400308609 L 356.88469769477837 278.407400308609 L 342.3748852062225 278.407400308609 z"
                                                                    cy="129.68796014273167" cx="379.5078018474578"
                                                                    j="8" val="215"
                                                                    barHeight="150.71844016587735"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3479"
                                                                    d="M 383.5078018474578 278.407400308609 L 383.5078018474578 14.011160007715228 C 383.5078018474578 11.511160007715228 386.0078018474578 9.011160007715228 388.5078018474578 9.011160007715228 L 393.0176143360137 9.011160007715228 C 395.5176143360137 9.011160007715228 398.0176143360137 11.511160007715228 398.0176143360137 14.011160007715228 L 398.0176143360137 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 383.5078018474578 278.407400308609 L 383.5078018474578 14.011160007715228 C 383.5078018474578 11.511160007715228 386.0078018474578 9.011160007715228 388.5078018474578 9.011160007715228 L 393.0176143360137 9.011160007715228 C 395.5176143360137 9.011160007715228 398.0176143360137 11.511160007715228 398.0176143360137 14.011160007715228 L 398.0176143360137 278.407400308609 z "
                                                                    pathFrom="M 383.5078018474578 278.407400308609 L 383.5078018474578 278.407400308609 L 398.0176143360137 278.407400308609 L 398.0176143360137 278.407400308609 L 398.0176143360137 278.407400308609 L 398.0176143360137 278.407400308609 L 398.0176143360137 278.407400308609 L 383.5078018474578 278.407400308609 z"
                                                                    cy="7.010160007715228" cx="420.64071848869315"
                                                                    j="9" val="390"
                                                                    barHeight="273.3962403008938"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3481"
                                                                    d="M 424.64071848869315 278.407400308609 L 424.64071848869315 91.12292009258272 C 424.64071848869315 88.62292009258272 427.14071848869315 86.12292009258272 429.64071848869315 86.12292009258272 L 434.15053097724905 86.12292009258272 C 436.65053097724905 86.12292009258272 439.15053097724905 88.62292009258272 439.15053097724905 91.12292009258272 L 439.15053097724905 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 424.64071848869315 278.407400308609 L 424.64071848869315 91.12292009258272 C 424.64071848869315 88.62292009258272 427.14071848869315 86.12292009258272 429.64071848869315 86.12292009258272 L 434.15053097724905 86.12292009258272 C 436.65053097724905 86.12292009258272 439.15053097724905 88.62292009258272 439.15053097724905 91.12292009258272 L 439.15053097724905 278.407400308609 z "
                                                                    pathFrom="M 424.64071848869315 278.407400308609 L 424.64071848869315 278.407400308609 L 439.15053097724905 278.407400308609 L 439.15053097724905 278.407400308609 L 439.15053097724905 278.407400308609 L 439.15053097724905 278.407400308609 L 439.15053097724905 278.407400308609 L 424.64071848869315 278.407400308609 z"
                                                                    cy="84.12192009258271" cx="461.7736351299285"
                                                                    j="10" val="280"
                                                                    barHeight="196.2844802160263"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3483"
                                                                    d="M 465.7736351299285 278.407400308609 L 465.7736351299285 208.89360822219848 C 465.7736351299285 206.39360822219848 468.2736351299285 203.89360822219848 470.7736351299285 203.89360822219848 L 475.2834476184844 203.89360822219848 C 477.7834476184844 203.89360822219848 480.2834476184844 206.39360822219848 480.2834476184844 208.89360822219848 L 480.2834476184844 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 465.7736351299285 278.407400308609 L 465.7736351299285 208.89360822219848 C 465.7736351299285 206.39360822219848 468.2736351299285 203.89360822219848 470.7736351299285 203.89360822219848 L 475.2834476184844 203.89360822219848 C 477.7834476184844 203.89360822219848 480.2834476184844 206.39360822219848 480.2834476184844 208.89360822219848 L 480.2834476184844 278.407400308609 z "
                                                                    pathFrom="M 465.7736351299285 278.407400308609 L 465.7736351299285 278.407400308609 L 480.2834476184844 278.407400308609 L 480.2834476184844 278.407400308609 L 480.2834476184844 278.407400308609 L 480.2834476184844 278.407400308609 L 480.2834476184844 278.407400308609 L 465.7736351299285 278.407400308609 z"
                                                                    cy="201.89260822219848" cx="502.90655177116383"
                                                                    j="11" val="112"
                                                                    barHeight="78.51379208641053"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3485"
                                                                    d="M 506.90655177116383 278.407400308609 L 506.90655177116383 201.18243221371173 C 506.90655177116383 198.68243221371173 509.40655177116383 196.18243221371173 511.90655177116383 196.18243221371173 L 516.4163642597198 196.18243221371173 C 518.9163642597198 196.18243221371173 521.4163642597198 198.68243221371173 521.4163642597198 201.18243221371173 L 521.4163642597198 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 506.90655177116383 278.407400308609 L 506.90655177116383 201.18243221371173 C 506.90655177116383 198.68243221371173 509.40655177116383 196.18243221371173 511.90655177116383 196.18243221371173 L 516.4163642597198 196.18243221371173 C 518.9163642597198 196.18243221371173 521.4163642597198 198.68243221371173 521.4163642597198 201.18243221371173 L 521.4163642597198 278.407400308609 z "
                                                                    pathFrom="M 506.90655177116383 278.407400308609 L 506.90655177116383 278.407400308609 L 521.4163642597198 278.407400308609 L 521.4163642597198 278.407400308609 L 521.4163642597198 278.407400308609 L 521.4163642597198 278.407400308609 L 521.4163642597198 278.407400308609 L 506.90655177116383 278.407400308609 z"
                                                                    cy="194.18143221371173" cx="544.0394684123992"
                                                                    j="12" val="123"
                                                                    barHeight="86.22496809489728"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3487"
                                                                    d="M 548.0394684123992 278.407400308609 L 548.0394684123992 138.79200814504625 C 548.0394684123992 136.29200814504625 550.5394684123992 133.79200814504625 553.0394684123992 133.79200814504625 L 557.5492809009551 133.79200814504625 C 560.0492809009551 133.79200814504625 562.5492809009551 136.29200814504625 562.5492809009551 138.79200814504625 L 562.5492809009551 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 548.0394684123992 278.407400308609 L 548.0394684123992 138.79200814504625 C 548.0394684123992 136.29200814504625 550.5394684123992 133.79200814504625 553.0394684123992 133.79200814504625 L 557.5492809009551 133.79200814504625 C 560.0492809009551 133.79200814504625 562.5492809009551 136.29200814504625 562.5492809009551 138.79200814504625 L 562.5492809009551 278.407400308609 z "
                                                                    pathFrom="M 548.0394684123992 278.407400308609 L 548.0394684123992 278.407400308609 L 562.5492809009551 278.407400308609 L 562.5492809009551 278.407400308609 L 562.5492809009551 278.407400308609 L 562.5492809009551 278.407400308609 L 562.5492809009551 278.407400308609 L 548.0394684123992 278.407400308609 z"
                                                                    cy="131.79100814504625" cx="585.1723850536346"
                                                                    j="13" val="212"
                                                                    barHeight="148.61539216356277"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3489"
                                                                    d="M 589.1723850536346 278.407400308609 L 589.1723850536346 98.13308010029795 C 589.1723850536346 95.63308010029795 591.6723850536346 93.13308010029795 594.1723850536346 93.13308010029795 L 598.6821975421905 93.13308010029795 C 601.1821975421905 93.13308010029795 603.6821975421905 95.63308010029795 603.6821975421905 98.13308010029795 L 603.6821975421905 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 589.1723850536346 278.407400308609 L 589.1723850536346 98.13308010029795 C 589.1723850536346 95.63308010029795 591.6723850536346 93.13308010029795 594.1723850536346 93.13308010029795 L 598.6821975421905 93.13308010029795 C 601.1821975421905 93.13308010029795 603.6821975421905 95.63308010029795 603.6821975421905 98.13308010029795 L 603.6821975421905 278.407400308609 z "
                                                                    pathFrom="M 589.1723850536346 278.407400308609 L 589.1723850536346 278.407400308609 L 603.6821975421905 278.407400308609 L 603.6821975421905 278.407400308609 L 603.6821975421905 278.407400308609 L 603.6821975421905 278.407400308609 L 603.6821975421905 278.407400308609 L 589.1723850536346 278.407400308609 z"
                                                                    cy="91.13208010029794" cx="626.30530169487"
                                                                    j="14" val="270"
                                                                    barHeight="189.27432020831108"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3491"
                                                                    d="M 630.30530169487 278.407400308609 L 630.30530169487 154.21436016201974 C 630.30530169487 151.71436016201974 632.80530169487 149.21436016201974 635.30530169487 149.21436016201974 L 639.8151141834259 149.21436016201974 C 642.3151141834259 149.21436016201974 644.8151141834259 151.71436016201974 644.8151141834259 154.21436016201974 L 644.8151141834259 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 630.30530169487 278.407400308609 L 630.30530169487 154.21436016201974 C 630.30530169487 151.71436016201974 632.80530169487 149.21436016201974 635.30530169487 149.21436016201974 L 639.8151141834259 149.21436016201974 C 642.3151141834259 149.21436016201974 644.8151141834259 151.71436016201974 644.8151141834259 154.21436016201974 L 644.8151141834259 278.407400308609 z "
                                                                    pathFrom="M 630.30530169487 278.407400308609 L 630.30530169487 278.407400308609 L 644.8151141834259 278.407400308609 L 644.8151141834259 278.407400308609 L 644.8151141834259 278.407400308609 L 644.8151141834259 278.407400308609 L 644.8151141834259 278.407400308609 L 630.30530169487 278.407400308609 z"
                                                                    cy="147.21336016201974" cx="667.4382183361054"
                                                                    j="15" val="190"
                                                                    barHeight="133.19304014658928"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3493"
                                                                    d="M 671.4382183361054 278.407400308609 L 671.4382183361054 70.09244006943703 C 671.4382183361054 67.59244006943703 673.9382183361054 65.09244006943703 676.4382183361054 65.09244006943703 L 680.9480308246613 65.09244006943703 C 683.4480308246613 65.09244006943703 685.9480308246613 67.59244006943703 685.9480308246613 70.09244006943703 L 685.9480308246613 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 671.4382183361054 278.407400308609 L 671.4382183361054 70.09244006943703 C 671.4382183361054 67.59244006943703 673.9382183361054 65.09244006943703 676.4382183361054 65.09244006943703 L 680.9480308246613 65.09244006943703 C 683.4480308246613 65.09244006943703 685.9480308246613 67.59244006943703 685.9480308246613 70.09244006943703 L 685.9480308246613 278.407400308609 z "
                                                                    pathFrom="M 671.4382183361054 278.407400308609 L 671.4382183361054 278.407400308609 L 685.9480308246613 278.407400308609 L 685.9480308246613 278.407400308609 L 685.9480308246613 278.407400308609 L 685.9480308246613 278.407400308609 L 685.9480308246613 278.407400308609 L 671.4382183361054 278.407400308609 z"
                                                                    cy="63.09144006943703" cx="708.5711349773408"
                                                                    j="16" val="310"
                                                                    barHeight="217.314960239172"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3495"
                                                                    d="M 712.5711349773408 278.407400308609 L 712.5711349773408 206.79056021988393 C 712.5711349773408 204.29056021988393 715.0711349773408 201.79056021988393 717.5711349773408 201.79056021988393 L 722.0809474658967 201.79056021988393 C 724.5809474658967 201.79056021988393 727.0809474658967 204.29056021988393 727.0809474658967 206.79056021988393 L 727.0809474658967 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 712.5711349773408 278.407400308609 L 712.5711349773408 206.79056021988393 C 712.5711349773408 204.29056021988393 715.0711349773408 201.79056021988393 717.5711349773408 201.79056021988393 L 722.0809474658967 201.79056021988393 C 724.5809474658967 201.79056021988393 727.0809474658967 204.29056021988393 727.0809474658967 206.79056021988393 L 727.0809474658967 278.407400308609 z "
                                                                    pathFrom="M 712.5711349773408 278.407400308609 L 712.5711349773408 278.407400308609 L 727.0809474658967 278.407400308609 L 727.0809474658967 278.407400308609 L 727.0809474658967 278.407400308609 L 727.0809474658967 278.407400308609 L 727.0809474658967 278.407400308609 L 712.5711349773408 278.407400308609 z"
                                                                    cy="199.78956021988392" cx="749.7040516185762"
                                                                    j="17" val="115"
                                                                    barHeight="80.6168400887251"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3497"
                                                                    d="M 753.7040516185762 278.407400308609 L 753.7040516185762 224.315960239172 C 753.7040516185762 221.815960239172 756.2040516185762 219.315960239172 758.7040516185762 219.315960239172 L 763.213864107132 219.315960239172 C 765.713864107132 219.315960239172 768.213864107132 221.815960239172 768.213864107132 224.315960239172 L 768.213864107132 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 753.7040516185762 278.407400308609 L 753.7040516185762 224.315960239172 C 753.7040516185762 221.815960239172 756.2040516185762 219.315960239172 758.7040516185762 219.315960239172 L 763.213864107132 219.315960239172 C 765.713864107132 219.315960239172 768.213864107132 221.815960239172 768.213864107132 224.315960239172 L 768.213864107132 278.407400308609 z "
                                                                    pathFrom="M 753.7040516185762 278.407400308609 L 753.7040516185762 278.407400308609 L 768.213864107132 278.407400308609 L 768.213864107132 278.407400308609 L 768.213864107132 278.407400308609 L 768.213864107132 278.407400308609 L 768.213864107132 278.407400308609 L 753.7040516185762 278.407400308609 z"
                                                                    cy="217.314960239172" cx="790.8369682598116"
                                                                    j="18" val="90"
                                                                    barHeight="63.091440069437034"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3499"
                                                                    d="M 794.8369682598116 278.407400308609 L 794.8369682598116 21.021320015430458 C 794.8369682598116 18.521320015430458 797.3369682598116 16.021320015430458 799.8369682598116 16.021320015430458 L 804.3467807483675 16.021320015430458 C 806.8467807483675 16.021320015430458 809.3467807483675 18.521320015430458 809.3467807483675 21.021320015430458 L 809.3467807483675 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 794.8369682598116 278.407400308609 L 794.8369682598116 21.021320015430458 C 794.8369682598116 18.521320015430458 797.3369682598116 16.021320015430458 799.8369682598116 16.021320015430458 L 804.3467807483675 16.021320015430458 C 806.8467807483675 16.021320015430458 809.3467807483675 18.521320015430458 809.3467807483675 21.021320015430458 L 809.3467807483675 278.407400308609 z "
                                                                    pathFrom="M 794.8369682598116 278.407400308609 L 794.8369682598116 278.407400308609 L 809.3467807483675 278.407400308609 L 809.3467807483675 278.407400308609 L 809.3467807483675 278.407400308609 L 809.3467807483675 278.407400308609 L 809.3467807483675 278.407400308609 L 794.8369682598116 278.407400308609 z"
                                                                    cy="14.020320015430457" cx="831.969884901047"
                                                                    j="19" val="380"
                                                                    barHeight="266.38608029317857"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3501"
                                                                    d="M 835.969884901047 278.407400308609 L 835.969884901047 208.89360822219848 C 835.969884901047 206.39360822219848 838.469884901047 203.89360822219848 840.969884901047 203.89360822219848 L 845.4796973896028 203.89360822219848 C 847.9796973896028 203.89360822219848 850.4796973896028 206.39360822219848 850.4796973896028 208.89360822219848 L 850.4796973896028 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 835.969884901047 278.407400308609 L 835.969884901047 208.89360822219848 C 835.969884901047 206.39360822219848 838.469884901047 203.89360822219848 840.969884901047 203.89360822219848 L 845.4796973896028 203.89360822219848 C 847.9796973896028 203.89360822219848 850.4796973896028 206.39360822219848 850.4796973896028 208.89360822219848 L 850.4796973896028 278.407400308609 z "
                                                                    pathFrom="M 835.969884901047 278.407400308609 L 835.969884901047 278.407400308609 L 850.4796973896028 278.407400308609 L 850.4796973896028 278.407400308609 L 850.4796973896028 278.407400308609 L 850.4796973896028 278.407400308609 L 850.4796973896028 278.407400308609 L 835.969884901047 278.407400308609 z"
                                                                    cy="201.89260822219848" cx="873.1028015422824"
                                                                    j="20" val="112"
                                                                    barHeight="78.51379208641053"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3503"
                                                                    d="M 877.1028015422824 278.407400308609 L 877.1028015422824 131.0808321365595 C 877.1028015422824 128.5808321365595 879.6028015422824 126.08083213655951 882.1028015422824 126.08083213655951 L 886.6126140308382 126.08083213655951 C 889.1126140308382 126.08083213655951 891.6126140308382 128.5808321365595 891.6126140308382 131.0808321365595 L 891.6126140308382 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 877.1028015422824 278.407400308609 L 877.1028015422824 131.0808321365595 C 877.1028015422824 128.5808321365595 879.6028015422824 126.08083213655951 882.1028015422824 126.08083213655951 L 886.6126140308382 126.08083213655951 C 889.1126140308382 126.08083213655951 891.6126140308382 128.5808321365595 891.6126140308382 131.0808321365595 L 891.6126140308382 278.407400308609 z "
                                                                    pathFrom="M 877.1028015422824 278.407400308609 L 877.1028015422824 278.407400308609 L 891.6126140308382 278.407400308609 L 891.6126140308382 278.407400308609 L 891.6126140308382 278.407400308609 L 891.6126140308382 278.407400308609 L 891.6126140308382 278.407400308609 L 877.1028015422824 278.407400308609 z"
                                                                    cy="124.0798321365595" cx="914.2357181835177"
                                                                    j="21" val="223"
                                                                    barHeight="156.32656817204952"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3505"
                                                                    d="M 918.2357181835177 278.407400308609 L 918.2357181835177 82.71072808332443 C 918.2357181835177 80.21072808332443 920.7357181835177 77.71072808332443 923.2357181835177 77.71072808332443 L 927.7455306720736 77.71072808332443 C 930.2455306720736 77.71072808332443 932.7455306720736 80.21072808332443 932.7455306720736 82.71072808332443 L 932.7455306720736 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 918.2357181835177 278.407400308609 L 918.2357181835177 82.71072808332443 C 918.2357181835177 80.21072808332443 920.7357181835177 77.71072808332443 923.2357181835177 77.71072808332443 L 927.7455306720736 77.71072808332443 C 930.2455306720736 77.71072808332443 932.7455306720736 80.21072808332443 932.7455306720736 82.71072808332443 L 932.7455306720736 278.407400308609 z "
                                                                    pathFrom="M 918.2357181835177 278.407400308609 L 918.2357181835177 278.407400308609 L 932.7455306720736 278.407400308609 L 932.7455306720736 278.407400308609 L 932.7455306720736 278.407400308609 L 932.7455306720736 278.407400308609 L 932.7455306720736 278.407400308609 L 918.2357181835177 278.407400308609 z"
                                                                    cy="75.70972808332442" cx="955.3686348247531"
                                                                    j="22" val="292"
                                                                    barHeight="204.6966722252846"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3507"
                                                                    d="M 959.3686348247531 278.407400308609 L 959.3686348247531 168.2346801774502 C 959.3686348247531 165.7346801774502 961.8686348247531 163.2346801774502 964.3686348247531 163.2346801774502 L 968.878447313309 163.2346801774502 C 971.378447313309 163.2346801774502 973.878447313309 165.7346801774502 973.878447313309 168.2346801774502 L 973.878447313309 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 959.3686348247531 278.407400308609 L 959.3686348247531 168.2346801774502 C 959.3686348247531 165.7346801774502 961.8686348247531 163.2346801774502 964.3686348247531 163.2346801774502 L 968.878447313309 163.2346801774502 C 971.378447313309 163.2346801774502 973.878447313309 165.7346801774502 973.878447313309 168.2346801774502 L 973.878447313309 278.407400308609 z "
                                                                    pathFrom="M 959.3686348247531 278.407400308609 L 959.3686348247531 278.407400308609 L 973.878447313309 278.407400308609 L 973.878447313309 278.407400308609 L 973.878447313309 278.407400308609 L 973.878447313309 278.407400308609 L 973.878447313309 278.407400308609 L 959.3686348247531 278.407400308609 z"
                                                                    cy="161.2336801774502" cx="996.5015514659885"
                                                                    j="23" val="170"
                                                                    barHeight="119.17272013115884"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3509"
                                                                    d="M 1000.5015514659885 278.407400308609 L 1000.5015514659885 84.11276008486749 C 1000.5015514659885 81.61276008486749 1003.0015514659885 79.11276008486749 1005.5015514659885 79.11276008486749 L 1010.0113639545444 79.11276008486749 C 1012.5113639545444 79.11276008486749 1015.0113639545444 81.61276008486749 1015.0113639545444 84.11276008486749 L 1015.0113639545444 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 1000.5015514659885 278.407400308609 L 1000.5015514659885 84.11276008486749 C 1000.5015514659885 81.61276008486749 1003.0015514659885 79.11276008486749 1005.5015514659885 79.11276008486749 L 1010.0113639545444 79.11276008486749 C 1012.5113639545444 79.11276008486749 1015.0113639545444 81.61276008486749 1015.0113639545444 84.11276008486749 L 1015.0113639545444 278.407400308609 z "
                                                                    pathFrom="M 1000.5015514659885 278.407400308609 L 1000.5015514659885 278.407400308609 L 1015.0113639545444 278.407400308609 L 1015.0113639545444 278.407400308609 L 1015.0113639545444 278.407400308609 L 1015.0113639545444 278.407400308609 L 1015.0113639545444 278.407400308609 L 1000.5015514659885 278.407400308609 z"
                                                                    cy="77.11176008486748" cx="1037.634468107224"
                                                                    j="24" val="290"
                                                                    barHeight="203.29464022374154"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3511"
                                                                    d="M 1041.634468107224 278.407400308609 L 1041.634468107224 210.29564022374154 C 1041.634468107224 207.79564022374154 1044.134468107224 205.29564022374154 1046.634468107224 205.29564022374154 L 1051.14428059578 205.29564022374154 C 1053.64428059578 205.29564022374154 1056.14428059578 207.79564022374154 1056.14428059578 210.29564022374154 L 1056.14428059578 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 1041.634468107224 278.407400308609 L 1041.634468107224 210.29564022374154 C 1041.634468107224 207.79564022374154 1044.134468107224 205.29564022374154 1046.634468107224 205.29564022374154 L 1051.14428059578 205.29564022374154 C 1053.64428059578 205.29564022374154 1056.14428059578 207.79564022374154 1056.14428059578 210.29564022374154 L 1056.14428059578 278.407400308609 z "
                                                                    pathFrom="M 1041.634468107224 278.407400308609 L 1041.634468107224 278.407400308609 L 1056.14428059578 278.407400308609 L 1056.14428059578 278.407400308609 L 1056.14428059578 278.407400308609 L 1056.14428059578 278.407400308609 L 1056.14428059578 278.407400308609 L 1041.634468107224 278.407400308609 z"
                                                                    cy="203.29464022374154" cx="1078.7673847484593"
                                                                    j="25" val="110"
                                                                    barHeight="77.11176008486748"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3513"
                                                                    d="M 1082.7673847484593 278.407400308609 L 1082.7673847484593 206.79056021988393 C 1082.7673847484593 204.29056021988393 1085.2673847484593 201.79056021988393 1087.7673847484593 201.79056021988393 L 1092.2771972370153 201.79056021988393 C 1094.7771972370153 201.79056021988393 1097.2771972370153 204.29056021988393 1097.2771972370153 206.79056021988393 L 1097.2771972370153 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 1082.7673847484593 278.407400308609 L 1082.7673847484593 206.79056021988393 C 1082.7673847484593 204.29056021988393 1085.2673847484593 201.79056021988393 1087.7673847484593 201.79056021988393 L 1092.2771972370153 201.79056021988393 C 1094.7771972370153 201.79056021988393 1097.2771972370153 204.29056021988393 1097.2771972370153 206.79056021988393 L 1097.2771972370153 278.407400308609 z "
                                                                    pathFrom="M 1082.7673847484593 278.407400308609 L 1082.7673847484593 278.407400308609 L 1097.2771972370153 278.407400308609 L 1097.2771972370153 278.407400308609 L 1097.2771972370153 278.407400308609 L 1097.2771972370153 278.407400308609 L 1097.2771972370153 278.407400308609 L 1082.7673847484593 278.407400308609 z"
                                                                    cy="199.78956021988392" cx="1119.9003013896947"
                                                                    j="26" val="115"
                                                                    barHeight="80.6168400887251"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3515"
                                                                    d="M 1123.9003013896947 278.407400308609 L 1123.9003013896947 84.11276008486749 C 1123.9003013896947 81.61276008486749 1126.4003013896947 79.11276008486749 1128.9003013896947 79.11276008486749 L 1133.4101138782507 79.11276008486749 C 1135.9101138782507 79.11276008486749 1138.4101138782507 81.61276008486749 1138.4101138782507 84.11276008486749 L 1138.4101138782507 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 1123.9003013896947 278.407400308609 L 1123.9003013896947 84.11276008486749 C 1123.9003013896947 81.61276008486749 1126.4003013896947 79.11276008486749 1128.9003013896947 79.11276008486749 L 1133.4101138782507 79.11276008486749 C 1135.9101138782507 79.11276008486749 1138.4101138782507 81.61276008486749 1138.4101138782507 84.11276008486749 L 1138.4101138782507 278.407400308609 z "
                                                                    pathFrom="M 1123.9003013896947 278.407400308609 L 1123.9003013896947 278.407400308609 L 1138.4101138782507 278.407400308609 L 1138.4101138782507 278.407400308609 L 1138.4101138782507 278.407400308609 L 1138.4101138782507 278.407400308609 L 1138.4101138782507 278.407400308609 L 1123.9003013896947 278.407400308609 z"
                                                                    cy="77.11176008486748" cx="1161.0332180309301"
                                                                    j="27" val="290"
                                                                    barHeight="203.29464022374154"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3517"
                                                                    d="M 1165.0332180309301 278.407400308609 L 1165.0332180309301 21.021320015430458 C 1165.0332180309301 18.521320015430458 1167.5332180309301 16.021320015430458 1170.0332180309301 16.021320015430458 L 1174.5430305194861 16.021320015430458 C 1177.0430305194861 16.021320015430458 1179.5430305194861 18.521320015430458 1179.5430305194861 21.021320015430458 L 1179.5430305194861 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 1165.0332180309301 278.407400308609 L 1165.0332180309301 21.021320015430458 C 1165.0332180309301 18.521320015430458 1167.5332180309301 16.021320015430458 1170.0332180309301 16.021320015430458 L 1174.5430305194861 16.021320015430458 C 1177.0430305194861 16.021320015430458 1179.5430305194861 18.521320015430458 1179.5430305194861 21.021320015430458 L 1179.5430305194861 278.407400308609 z "
                                                                    pathFrom="M 1165.0332180309301 278.407400308609 L 1165.0332180309301 278.407400308609 L 1179.5430305194861 278.407400308609 L 1179.5430305194861 278.407400308609 L 1179.5430305194861 278.407400308609 L 1179.5430305194861 278.407400308609 L 1179.5430305194861 278.407400308609 L 1165.0332180309301 278.407400308609 z"
                                                                    cy="14.020320015430457" cx="1202.1661346721655"
                                                                    j="28" val="380"
                                                                    barHeight="266.38608029317857"
                                                                    barWidth="18.50981248855591"></path>
                                                                <path id="SvgjsPath3519"
                                                                    d="M 1206.1661346721655 278.407400308609 L 1206.1661346721655 68.690408067894 C 1206.1661346721655 66.190408067894 1208.6661346721655 63.69040806789399 1211.1661346721655 63.69040806789399 L 1215.6759471607215 63.69040806789399 C 1218.1759471607215 63.69040806789399 1220.6759471607215 66.190408067894 1220.6759471607215 68.690408067894 L 1220.6759471607215 278.407400308609 z "
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="4"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectBarMaskwjvwuxqs)"
                                                                    pathTo="M 1206.1661346721655 278.407400308609 L 1206.1661346721655 68.690408067894 C 1206.1661346721655 66.190408067894 1208.6661346721655 63.69040806789399 1211.1661346721655 63.69040806789399 L 1215.6759471607215 63.69040806789399 C 1218.1759471607215 63.69040806789399 1220.6759471607215 66.190408067894 1220.6759471607215 68.690408067894 L 1220.6759471607215 278.407400308609 z "
                                                                    pathFrom="M 1206.1661346721655 278.407400308609 L 1206.1661346721655 278.407400308609 L 1220.6759471607215 278.407400308609 L 1220.6759471607215 278.407400308609 L 1220.6759471607215 278.407400308609 L 1220.6759471607215 278.407400308609 L 1220.6759471607215 278.407400308609 L 1206.1661346721655 278.407400308609 z"
                                                                    cy="61.68940806789399" cx="1243.299051313401"
                                                                    j="29" val="312"
                                                                    barHeight="218.71699224071503"
                                                                    barWidth="18.50981248855591"></path>
                                                                <g id="SvgjsG3458"
                                                                    class="apexcharts-bar-goals-markers">
                                                                    <g id="SvgjsG3460"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3462"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3464"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3466"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3468"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3470"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3472"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3474"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3476"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3478"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3480"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3482"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3484"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3486"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3488"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3490"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3492"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3494"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3496"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3498"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3500"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3502"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3504"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3506"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3508"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3510"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3512"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3514"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3516"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                    <g id="SvgjsG3518"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskwjvwuxqs)">
                                                                    </g>
                                                                </g>
                                                                <g id="SvgjsG3459"
                                                                    class="apexcharts-bar-shadows apexcharts-hidden-element-shown">
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG3457"
                                                                class="apexcharts-datalabels apexcharts-hidden-element-shown"
                                                                data:realIndex="0"></g>
                                                        </g>
                                                        <line id="SvgjsLine3531" x1="0" y1="0"
                                                            x2="1233.9874992370605" y2="0"
                                                            stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                                            stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                        </line>
                                                        <line id="SvgjsLine3532" x1="0" y1="0"
                                                            x2="1233.9874992370605" y2="0"
                                                            stroke-dasharray="0" stroke-width="0"
                                                            stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                        <g id="SvgjsG3533" class="apexcharts-xaxis"
                                                            transform="translate(0, 0)">
                                                            <g id="SvgjsG3534" class="apexcharts-xaxis-texts-g"
                                                                transform="translate(0, -4)"><text
                                                                    id="SvgjsText3536"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="20.566458320617677" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3537">1</tspan>
                                                                    <title>1</title>
                                                                </text><text id="SvgjsText3539"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="61.69937496185303" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3540">2</tspan>
                                                                    <title>2</title>
                                                                </text><text id="SvgjsText3542"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="102.83229160308838" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3543">3</tspan>
                                                                    <title>3</title>
                                                                </text><text id="SvgjsText3545"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="143.96520824432375" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3546">4</tspan>
                                                                    <title>4</title>
                                                                </text><text id="SvgjsText3548"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="185.0981248855591" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3549">5</tspan>
                                                                    <title>5</title>
                                                                </text><text id="SvgjsText3551"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="226.23104152679443" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3552">6</tspan>
                                                                    <title>6</title>
                                                                </text><text id="SvgjsText3554"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="267.36395816802974" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3555">7</tspan>
                                                                    <title>7</title>
                                                                </text><text id="SvgjsText3557"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="308.4968748092651" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3558">8</tspan>
                                                                    <title>8</title>
                                                                </text><text id="SvgjsText3560"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="349.6297914505004" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3561">9</tspan>
                                                                    <title>9</title>
                                                                </text><text id="SvgjsText3563"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="390.76270809173576" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3564">10</tspan>
                                                                    <title>10</title>
                                                                </text><text id="SvgjsText3566"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="431.8956247329711" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3567">11</tspan>
                                                                    <title>11</title>
                                                                </text><text id="SvgjsText3569"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="473.02854137420644" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3570">12</tspan>
                                                                    <title>12</title>
                                                                </text><text id="SvgjsText3572"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="514.1614580154418" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3573">13</tspan>
                                                                    <title>13</title>
                                                                </text><text id="SvgjsText3575"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="555.2943746566772" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3576">14</tspan>
                                                                    <title>14</title>
                                                                </text><text id="SvgjsText3578"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="596.4272912979126" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3579">15</tspan>
                                                                    <title>15</title>
                                                                </text><text id="SvgjsText3581"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="637.560207939148" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3582">16</tspan>
                                                                    <title>16</title>
                                                                </text><text id="SvgjsText3584"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="678.6931245803834" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3585">17</tspan>
                                                                    <title>17</title>
                                                                </text><text id="SvgjsText3587"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="719.8260412216188" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3588">18</tspan>
                                                                    <title>18</title>
                                                                </text><text id="SvgjsText3590"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="760.9589578628542" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3591">19</tspan>
                                                                    <title>19</title>
                                                                </text><text id="SvgjsText3593"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="802.0918745040896" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3594">20</tspan>
                                                                    <title>20</title>
                                                                </text><text id="SvgjsText3596"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="843.224791145325" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3597">21</tspan>
                                                                    <title>21</title>
                                                                </text><text id="SvgjsText3599"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="884.3577077865604" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3600">22</tspan>
                                                                    <title>22</title>
                                                                </text><text id="SvgjsText3602"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="925.4906244277958" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3603">23</tspan>
                                                                    <title>23</title>
                                                                </text><text id="SvgjsText3605"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="966.6235410690311" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3606">24</tspan>
                                                                    <title>24</title>
                                                                </text><text id="SvgjsText3608"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="1007.7564577102665" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3609">25</tspan>
                                                                    <title>25</title>
                                                                </text><text id="SvgjsText3611"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="1048.889374351502" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3612">26</tspan>
                                                                    <title>26</title>
                                                                </text><text id="SvgjsText3614"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="1090.0222909927375" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3615">27</tspan>
                                                                    <title>27</title>
                                                                </text><text id="SvgjsText3617"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="1131.1552076339729" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3618">28</tspan>
                                                                    <title>28</title>
                                                                </text><text id="SvgjsText3620"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="1172.2881242752082" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3621">29</tspan>
                                                                    <title>29</title>
                                                                </text><text id="SvgjsText3623"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="1213.4210409164436" y="308.406400308609"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3624">30</tspan>
                                                                    <title>30</title>
                                                                </text></g>
                                                        </g>
                                                        <g id="SvgjsG3642" class="apexcharts-yaxis-annotations"></g>
                                                        <g id="SvgjsG3643" class="apexcharts-xaxis-annotations"></g>
                                                        <g id="SvgjsG3644" class="apexcharts-point-annotations"></g>
                                                    </g>
                                                </svg>
                                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                                    <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                        style="order: 1;"><span class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(70, 95, 255);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Outfit, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                    <div class="apexcharts-yaxistooltip-text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====== Chart Four End -->
                            </div>

                            <div class="col-span-12 xl:col-span-7">
                                <!-- ====== Top Card Group Start -->
                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <!-- Card item -->
                                    <div
                                        class="rounded-2xl border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                                        <div class="flex items-start justify-between">
                                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                                Top Channels
                                            </h3>

                                            <div x-data="{ openDropDown: false }" class="relative">
                                                <button @click="openDropDown = !openDropDown"
                                                    :class="openDropDown ? 'text-gray-700 dark:text-white' :
                                                        'text-gray-400 hover:text-gray-700 dark:hover:text-white'"
                                                    class="text-gray-400 hover:text-gray-700 dark:hover:text-white">
                                                    <svg class="fill-current" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                                            fill=""></path>
                                                    </svg>
                                                </button>
                                                <div x-show="openDropDown" @click.outside="openDropDown = false"
                                                    class="absolute right-0 top-full z-40 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark"
                                                    style="display: none;">
                                                    <button
                                                        class="flex w-full rounded-lg px-3 py-2 text-left text-theme-xs font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                        View More
                                                    </button>
                                                    <button
                                                        class="flex w-full rounded-lg px-3 py-2 text-left text-theme-xs font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="my-6">
                                            <div
                                                class="flex items-center justify-between border-b border-gray-100 pb-4 dark:border-gray-800">
                                                <span class="text-theme-xs text-gray-400"> Source </span>
                                                <span class="text-right text-theme-xs text-gray-400"> Visitors </span>
                                            </div>

                                            <div
                                                class="flex items-center justify-between border-b border-gray-100 py-3 dark:border-gray-800">
                                                <span class="text-theme-sm text-gray-500 dark:text-gray-400">
                                                    Google
                                                </span>
                                                <span
                                                    class="text-right text-theme-sm text-gray-500 dark:text-gray-400">
                                                    4.7K
                                                </span>
                                            </div>

                                            <div
                                                class="flex items-center justify-between border-b border-gray-100 py-3 dark:border-gray-800">
                                                <span class="text-theme-sm text-gray-500 dark:text-gray-400">
                                                    Facebook
                                                </span>
                                                <span
                                                    class="text-right text-theme-sm text-gray-500 dark:text-gray-400">
                                                    3.4K
                                                </span>
                                            </div>

                                            <div
                                                class="flex items-center justify-between border-b border-gray-100 py-3 dark:border-gray-800">
                                                <span class="text-theme-sm text-gray-500 dark:text-gray-400">
                                                    Threads
                                                </span>
                                                <span
                                                    class="text-right text-theme-sm text-gray-500 dark:text-gray-400">
                                                    2.9K
                                                </span>
                                            </div>

                                            <div
                                                class="flex items-center justify-between border-b border-gray-100 py-3 dark:border-gray-800">
                                                <span class="text-theme-sm text-gray-500 dark:text-gray-400">
                                                    Google
                                                </span>
                                                <span
                                                    class="text-right text-theme-sm text-gray-500 dark:text-gray-400">
                                                    1.5K
                                                </span>
                                            </div>
                                        </div>

                                        <a href="#"
                                            class="flex justify-center gap-2 rounded-lg border border-gray-300 bg-white p-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
                                            Channels Report
                                            <svg class="fill-current" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M17.4175 9.9986C17.4178 10.1909 17.3446 10.3832 17.198 10.53L12.2013 15.5301C11.9085 15.8231 11.4337 15.8233 11.1407 15.5305C10.8477 15.2377 10.8475 14.7629 11.1403 14.4699L14.8604 10.7472L3.33301 10.7472C2.91879 10.7472 2.58301 10.4114 2.58301 9.99715C2.58301 9.58294 2.91879 9.24715 3.33301 9.24715L14.8549 9.24715L11.1403 5.53016C10.8475 5.23717 10.8477 4.7623 11.1407 4.4695C11.4336 4.1767 11.9085 4.17685 12.2013 4.46984L17.1588 9.43049C17.3173 9.568 17.4175 9.77087 17.4175 9.99715C17.4175 9.99763 17.4175 9.99812 17.4175 9.9986Z"
                                                    fill=""></path>
                                            </svg>
                                        </a>
                                    </div>

                                    <!-- Card item -->
                                    <div
                                        class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
                                        <div class="flex items-start justify-between">
                                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                                Top Pages
                                            </h3>

                                            <div x-data="{ openDropDown: false }" class="relative">
                                                <button @click="openDropDown = !openDropDown"
                                                    :class="openDropDown ? 'text-gray-700 dark:text-white' :
                                                        'text-gray-400 hover:text-gray-700 dark:hover:text-white'"
                                                    class="text-gray-400 hover:text-gray-700 dark:hover:text-white">
                                                    <svg class="fill-current" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                                            fill=""></path>
                                                    </svg>
                                                </button>
                                                <div x-show="openDropDown" @click.outside="openDropDown = false"
                                                    class="absolute right-0 top-full z-40 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark"
                                                    style="display: none;">
                                                    <button
                                                        class="flex w-full rounded-lg px-3 py-2 text-left text-theme-xs font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                        View More
                                                    </button>
                                                    <button
                                                        class="flex w-full rounded-lg px-3 py-2 text-left text-theme-xs font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="my-6">
                                            <div
                                                class="flex items-center justify-between border-b border-gray-100 pb-4 dark:border-gray-800">
                                                <span class="text-theme-xs text-gray-400"> Source </span>
                                                <span class="text-right text-theme-xs text-gray-400"> Pageview </span>
                                            </div>

                                            <div
                                                class="flex items-center justify-between border-b border-gray-100 py-3 dark:border-gray-800">
                                                <span class="text-theme-sm text-gray-500 dark:text-gray-400">
                                                    tailadmin.com
                                                </span>
                                                <span
                                                    class="text-right text-theme-sm text-gray-500 dark:text-gray-400">
                                                    4.7K
                                                </span>
                                            </div>

                                            <div
                                                class="flex items-center justify-between border-b border-gray-100 py-3 dark:border-gray-800">
                                                <span class="text-theme-sm text-gray-500 dark:text-gray-400">
                                                    preview.tailadmin.com
                                                </span>
                                                <span
                                                    class="text-right text-theme-sm text-gray-500 dark:text-gray-400">
                                                    3.4K
                                                </span>
                                            </div>

                                            <div
                                                class="flex items-center justify-between border-b border-gray-100 py-3 dark:border-gray-800">
                                                <span class="text-theme-sm text-gray-500 dark:text-gray-400">
                                                    docs.tailadmin.com
                                                </span>
                                                <span
                                                    class="text-right text-theme-sm text-gray-500 dark:text-gray-400">
                                                    2.9K
                                                </span>
                                            </div>

                                            <div
                                                class="flex items-center justify-between border-b border-gray-100 py-3 dark:border-gray-800">
                                                <span class="text-theme-sm text-gray-500 dark:text-gray-400">
                                                    tailadmin.com/componetns
                                                </span>
                                                <span
                                                    class="text-right text-theme-sm text-gray-500 dark:text-gray-400">
                                                    1.5K
                                                </span>
                                            </div>
                                        </div>

                                        <a href="#"
                                            class="flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white p-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]">
                                            Channels Report
                                            <svg class="fill-current" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M17.4175 9.9986C17.4178 10.1909 17.3446 10.3832 17.198 10.53L12.2013 15.5301C11.9085 15.8231 11.4337 15.8233 11.1407 15.5305C10.8477 15.2377 10.8475 14.7629 11.1403 14.4699L14.8604 10.7472L3.33301 10.7472C2.91879 10.7472 2.58301 10.4114 2.58301 9.99715C2.58301 9.58294 2.91879 9.24715 3.33301 9.24715L14.8549 9.24715L11.1403 5.53016C10.8475 5.23717 10.8477 4.7623 11.1407 4.4695C11.4336 4.1767 11.9085 4.17685 12.2013 4.46984L17.1588 9.43049C17.3173 9.568 17.4175 9.77087 17.4175 9.99715C17.4175 9.99763 17.4175 9.99812 17.4175 9.9986Z"
                                                    fill=""></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <!-- ====== Top Card Group End -->
                            </div>

                            <div class="col-span-12 xl:col-span-5">
                                <!-- ====== Chart Five Start -->
                                <div
                                    class="rounded-2xl border border-gray-200 bg-white p-5 md:p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                                    <div class="flex items-start justify-between">
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                            Active Users
                                        </h3>

                                        <div x-data="{ openDropDown: false }" class="relative">
                                            <button @click="openDropDown = !openDropDown"
                                                :class="openDropDown ? 'text-gray-700 dark:text-white' :
                                                    'text-gray-400 hover:text-gray-700 dark:hover:text-white'"
                                                class="text-gray-400 hover:text-gray-700 dark:hover:text-white">
                                                <svg class="fill-current" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                                        fill=""></path>
                                                </svg>
                                            </button>
                                            <div x-show="openDropDown" @click.outside="openDropDown = false"
                                                class="absolute right-0 z-40 w-40 p-2 space-y-1 bg-white border border-gray-200 shadow-theme-lg dark:bg-gray-dark top-full rounded-2xl dark:border-gray-800"
                                                style="display: none;">
                                                <button
                                                    class="flex w-full px-3 py-2 font-medium text-left text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                    View More
                                                </button>
                                                <button
                                                    class="flex w-full px-3 py-2 font-medium text-left text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex items-end gap-1.5">
                                        <div class="flex items-center gap-2.5">
                                            <span class="relative inline-block w-5 h-5">
                                                <span
                                                    class="absolute w-2 h-2 transform -translate-x-1/2 -translate-y-1/2 rounded-full bg-error-500 top-1/2 left-1/2">
                                                    <span
                                                        class="absolute inline-flex w-4 h-4 rounded-full opacity-75 bg-error-400 -top-1 -left-1 animate-ping">
                                                    </span> </span></span>
                                            <span
                                                class="font-semibold text-gray-800 activeUsers text-title-sm dark:text-white/90">303</span>
                                        </div>
                                        <span class="block mb-1 text-gray-500 text-theme-sm dark:text-gray-400">
                                            Live visitors
                                        </span>
                                    </div>

                                    <div class="my-5 min-h-[155px] rounded-xl bg-gray-50 dark:bg-gray-900">
                                        <div id="chartFive" class="-mr-2.5 -ml-[22px] h-full"
                                            style="min-height: 315px;">
                                            <div id="apexchartsbbgfzdas"
                                                class="apexcharts-canvas apexchartsbbgfzdas apexcharts-theme-"
                                                style="width: 334px; height: 300px;"><svg id="SvgjsSvg4888"
                                                    width="334" height="300"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.dev"
                                                    class="apexcharts-svg apexcharts-zoomable"
                                                    xmlns:data="ApexChartsNS" transform="translate(0, 0)">
                                                    <foreignObject x="0" y="0" width="334" height="300">
                                                        <div xmlns="http://www.w3.org/1999/xhtml"
                                                            style="position: relative; height: 100%; width: 100%;">
                                                            <div class="apexcharts-legend"
                                                                style="max-height: 150px;"></div>
                                                        </div>
                                                    </foreignObject>
                                                    <rect id="SvgjsRect4892" width="0" height="0" x="0"
                                                        y="0" rx="0" ry="0" opacity="1"
                                                        stroke-width="0" stroke="none" stroke-dasharray="0"
                                                        fill="#fefefe"></rect>
                                                    <g id="SvgjsG4897" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                    <g id="SvgjsG4898" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                    <g id="SvgjsG4931" class="apexcharts-yaxis" rel="0"
                                                        transform="translate(-8, 0)">
                                                        <g id="SvgjsG4932" class="apexcharts-yaxis-texts-g"></g>
                                                    </g>
                                                    <g id="SvgjsG4890" class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(22, 30)">
                                                        <defs id="SvgjsDefs4889">
                                                            <clipPath id="gridRectMaskbbgfzdas">
                                                                <rect id="SvgjsRect4894" width="302"
                                                                    height="255" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="gridRectBarMaskbbgfzdas">
                                                                <rect id="SvgjsRect4895" width="308"
                                                                    height="261" x="-3" y="-3" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="gridRectMarkerMaskbbgfzdas">
                                                                <rect id="SvgjsRect4896" width="302"
                                                                    height="255" x="0" y="0" rx="0"
                                                                    ry="0" opacity="1" stroke-width="0"
                                                                    stroke="none" stroke-dasharray="0"
                                                                    fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="forecastMaskbbgfzdas"></clipPath>
                                                            <clipPath id="nonForecastMaskbbgfzdas"></clipPath>
                                                            <linearGradient id="SvgjsLinearGradient4903"
                                                                x1="0" y1="0" x2="0"
                                                                y2="1">
                                                                <stop id="SvgjsStop4904" stop-opacity="0.55"
                                                                    stop-color="rgba(70,95,255,0.55)"
                                                                    offset="0"></stop>
                                                                <stop id="SvgjsStop4905" stop-opacity="0"
                                                                    stop-color="rgba(163,175,255,0)" offset="1">
                                                                </stop>
                                                                <stop id="SvgjsStop4906" stop-opacity="0"
                                                                    stop-color="rgba(163,175,255,0)" offset="1">
                                                                </stop>
                                                            </linearGradient>
                                                        </defs>
                                                        <line id="SvgjsLine4893" x1="0" y1="0"
                                                            x2="0" y2="255" stroke="#b6b6b6"
                                                            stroke-dasharray="3" stroke-linecap="butt"
                                                            class="apexcharts-xcrosshairs" x="0" y="0"
                                                            width="1" height="255" fill="#b1b9c4"
                                                            filter="none" fill-opacity="0.9" stroke-width="1">
                                                        </line>
                                                        <g id="SvgjsG4909" class="apexcharts-grid">
                                                            <g id="SvgjsG4910"
                                                                class="apexcharts-gridlines-horizontal"></g>
                                                            <g id="SvgjsG4911"
                                                                class="apexcharts-gridlines-vertical"></g>
                                                            <line id="SvgjsLine4914" x1="0" y1="255"
                                                                x2="302" y2="255" stroke="transparent"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line id="SvgjsLine4913" x1="0" y1="1"
                                                                x2="0" y2="255" stroke="transparent"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                        </g>
                                                        <g id="SvgjsG4912" class="apexcharts-grid-borders"></g>
                                                        <g id="SvgjsG4899"
                                                            class="apexcharts-area-series apexcharts-plot-series">
                                                            <g id="SvgjsG4900" class="apexcharts-series"
                                                                zIndex="0" seriesName="Sales"
                                                                data:longestSeries="true" rel="1"
                                                                data:realIndex="0">
                                                                <path id="SvgjsPath4907"
                                                                    d="M0 238.8871760934593C9.60909090909091 238.8871760934593 17.845454545454547 35.16769434392443 27.454545454545457 35.16769434392443C37.06363636363636 35.16769434392443 45.300000000000004 24.967694343924386 54.909090909090914 24.967694343924386C64.51818181818182 24.967694343924386 72.75454545454545 45.89999999999998 82.36363636363636 45.89999999999998C91.97272727272727 45.89999999999998 100.20909090909092 106.31590693831393 109.81818181818183 106.31590693831393C119.42727272727274 106.31590693831393 127.66363636363637 112.21436542242736 137.27272727272728 112.21436542242736C146.88181818181818 112.21436542242736 155.11818181818182 229.76615282803778 164.72727272727272 229.76615282803778C174.33636363636364 229.76615282803778 182.57272727272726 233.78717609345927 192.1818181818182 233.78717609345927C201.7909090909091 233.78717609345927 210.02727272727273 133.39845848411335 219.63636363636365 133.39845848411335C229.24545454545455 133.39845848411335 237.4818181818182 201.32410629719482 247.0909090909091 201.32410629719482C256.7 201.32410629719482 264.93636363636364 152.71948174953485 274.54545454545456 152.71948174953485C284.1545454545455 152.71948174953485 292.3909090909091 214.71794023364822 302 214.71794023364822C302 214.71794023364822 302 214.71794023364822 302 255L0 255L0 238.8871760934593C0 238.8871760934593 0 238.8871760934593 0 238.8871760934593 "
                                                                    fill="url(#SvgjsLinearGradient4903)"
                                                                    fill-opacity="1" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="0"
                                                                    stroke-dasharray="0" class="apexcharts-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectMaskbbgfzdas)"
                                                                    pathTo="M 0 204C 9.60909090909091 204 17.845454545454547 56.10000000000002 27.454545454545457 56.10000000000002C 37.06363636363636 56.10000000000002 45.300000000000004 45.89999999999998 54.909090909090914 45.89999999999998C 64.51818181818182 45.89999999999998 72.75454545454545 45.89999999999998 82.36363636363636 45.89999999999998C 91.97272727272727 45.89999999999998 100.20909090909092 204 109.81818181818183 204C 119.42727272727274 204 127.66363636363637 178.5 137.27272727272728 178.5C 146.88181818181818 178.5 155.11818181818182 219.29999999999995 164.72727272727272 219.29999999999995C 174.33636363636364 219.29999999999995 182.57272727272726 198.89999999999998 192.1818181818182 198.89999999999998C 201.7909090909091 198.89999999999998 210.02727272727273 102 219.63636363636365 102C 229.24545454545455 102 237.4818181818182 239.70000000000005 247.0909090909091 239.70000000000005C 256.7 239.70000000000005 264.93636363636364 96.89999999999998 274.54545454545456 96.89999999999998C 284.1545454545455 96.89999999999998 292.3909090909091 127.5 302 127.5C 302 127.5 302 127.5 302 255 L 0 255z"
                                                                    pathFrom="M 0 255C 9.60909090909091 255 17.845454545454547 25.5 27.454545454545457 25.5C 37.06363636363636 25.5 45.300000000000004 15.299999999999955 54.909090909090914 15.299999999999955C 64.51818181818182 15.299999999999955 72.75454545454545 45.89999999999998 82.36363636363636 45.89999999999998C 91.97272727272727 45.89999999999998 100.20909090909092 61.19999999999993 109.81818181818183 61.19999999999993C 119.42727272727274 61.19999999999993 127.66363636363637 81.60000000000002 137.27272727272728 81.60000000000002C 146.88181818181818 81.60000000000002 155.11818181818182 234.60000000000002 164.72727272727272 234.60000000000002C 174.33636363636364 234.60000000000002 182.57272727272726 249.89999999999998 192.1818181818182 249.89999999999998C 201.7909090909091 249.89999999999998 210.02727272727273 147.89999999999998 219.63636363636365 147.89999999999998C 229.24545454545455 147.89999999999998 237.4818181818182 183.60000000000002 247.0909090909091 183.60000000000002C 256.7 183.60000000000002 264.93636363636364 178.5 274.54545454545456 178.5C 284.1545454545455 178.5 292.3909090909091 255 302 255C 302 255 302 255 302 255 L 0 255zz">
                                                                </path>
                                                                <path id="SvgjsPath4908"
                                                                    d="M0 238.8871760934593C9.60909090909091 238.8871760934593 17.845454545454547 35.16769434392443 27.454545454545457 35.16769434392443C37.06363636363636 35.16769434392443 45.300000000000004 24.967694343924386 54.909090909090914 24.967694343924386C64.51818181818182 24.967694343924386 72.75454545454545 45.89999999999998 82.36363636363636 45.89999999999998C91.97272727272727 45.89999999999998 100.20909090909092 106.31590693831393 109.81818181818183 106.31590693831393C119.42727272727274 106.31590693831393 127.66363636363637 112.21436542242736 137.27272727272728 112.21436542242736C146.88181818181818 112.21436542242736 155.11818181818182 229.76615282803778 164.72727272727272 229.76615282803778C174.33636363636364 229.76615282803778 182.57272727272726 233.78717609345927 192.1818181818182 233.78717609345927C201.7909090909091 233.78717609345927 210.02727272727273 133.39845848411335 219.63636363636365 133.39845848411335C229.24545454545455 133.39845848411335 237.4818181818182 201.32410629719482 247.0909090909091 201.32410629719482C256.7 201.32410629719482 264.93636363636364 152.71948174953485 274.54545454545456 152.71948174953485C284.1545454545455 152.71948174953485 292.3909090909091 214.71794023364822 302 214.71794023364822 "
                                                                    fill="none" fill-opacity="1"
                                                                    stroke="#465fff" stroke-opacity="1"
                                                                    stroke-linecap="butt" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-area"
                                                                    index="0"
                                                                    clip-path="url(#gridRectMaskbbgfzdas)"
                                                                    pathTo="M 0 204C 9.60909090909091 204 17.845454545454547 56.10000000000002 27.454545454545457 56.10000000000002C 37.06363636363636 56.10000000000002 45.300000000000004 45.89999999999998 54.909090909090914 45.89999999999998C 64.51818181818182 45.89999999999998 72.75454545454545 45.89999999999998 82.36363636363636 45.89999999999998C 91.97272727272727 45.89999999999998 100.20909090909092 204 109.81818181818183 204C 119.42727272727274 204 127.66363636363637 178.5 137.27272727272728 178.5C 146.88181818181818 178.5 155.11818181818182 219.29999999999995 164.72727272727272 219.29999999999995C 174.33636363636364 219.29999999999995 182.57272727272726 198.89999999999998 192.1818181818182 198.89999999999998C 201.7909090909091 198.89999999999998 210.02727272727273 102 219.63636363636365 102C 229.24545454545455 102 237.4818181818182 239.70000000000005 247.0909090909091 239.70000000000005C 256.7 239.70000000000005 264.93636363636364 96.89999999999998 274.54545454545456 96.89999999999998C 284.1545454545455 96.89999999999998 292.3909090909091 127.5 302 127.5"
                                                                    pathFrom="M 0 255C 9.60909090909091 255 17.845454545454547 25.5 27.454545454545457 25.5C 37.06363636363636 25.5 45.300000000000004 15.299999999999955 54.909090909090914 15.299999999999955C 64.51818181818182 15.299999999999955 72.75454545454545 45.89999999999998 82.36363636363636 45.89999999999998C 91.97272727272727 45.89999999999998 100.20909090909092 61.19999999999993 109.81818181818183 61.19999999999993C 119.42727272727274 61.19999999999993 127.66363636363637 81.60000000000002 137.27272727272728 81.60000000000002C 146.88181818181818 81.60000000000002 155.11818181818182 234.60000000000002 164.72727272727272 234.60000000000002C 174.33636363636364 234.60000000000002 182.57272727272726 249.89999999999998 192.1818181818182 249.89999999999998C 201.7909090909091 249.89999999999998 210.02727272727273 147.89999999999998 219.63636363636365 147.89999999999998C 229.24545454545455 147.89999999999998 237.4818181818182 183.60000000000002 247.0909090909091 183.60000000000002C 256.7 183.60000000000002 264.93636363636364 178.5 274.54545454545456 178.5C 284.1545454545455 178.5 292.3909090909091 255 302 255"
                                                                    fill-rule="evenodd"></path>
                                                                <g id="SvgjsG4901"
                                                                    class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                                    data:realIndex="0">
                                                                    <g class="apexcharts-series-markers">
                                                                        <path id="SvgjsPath4936" d="M 0, 0
           m -0, 0
           a 0,0 0 1,0 0,0
           a 0,0 0 1,0 -0,0" fill="#465fff" fill-opacity="1" stroke="#ffffff" stroke-opacity="0.9"
                                                                            stroke-linecap="butt" stroke-width="2"
                                                                            stroke-dasharray="0" cx="0"
                                                                            cy="0" shape="circle"
                                                                            class="apexcharts-marker whvip49lt no-pointer-events"
                                                                            default-marker-size="0"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG4902" class="apexcharts-datalabels"
                                                                data:realIndex="0"></g>
                                                        </g>
                                                        <line id="SvgjsLine4915" x1="0" y1="0"
                                                            x2="302" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="1"
                                                            stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                        </line>
                                                        <line id="SvgjsLine4916" x1="0" y1="0"
                                                            x2="302" y2="0" stroke-dasharray="0"
                                                            stroke-width="0" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                        <g id="SvgjsG4917" class="apexcharts-xaxis"
                                                            transform="translate(0, 0)">
                                                            <g id="SvgjsG4918" class="apexcharts-xaxis-texts-g"
                                                                transform="translate(0, -4)"></g>
                                                        </g>
                                                        <g id="SvgjsG4933" class="apexcharts-yaxis-annotations"></g>
                                                        <g id="SvgjsG4934" class="apexcharts-xaxis-annotations"></g>
                                                        <g id="SvgjsG4935" class="apexcharts-point-annotations"></g>
                                                        <rect id="SvgjsRect4937" width="0" height="0"
                                                            x="0" y="0" rx="0" ry="0"
                                                            opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fefefe"
                                                            class="apexcharts-zoom-rect"></rect>
                                                        <rect id="SvgjsRect4938" width="0" height="0"
                                                            x="0" y="0" rx="0" ry="0"
                                                            opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fefefe"
                                                            class="apexcharts-selection-rect"></rect>
                                                    </g>
                                                </svg>
                                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                                    <div class="apexcharts-tooltip-title"
                                                        style="font-family: Outfit, sans-serif; font-size: 12px;">
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                        style="order: 1;"><span class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(70, 95, 255);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Outfit, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                    <div class="apexcharts-yaxistooltip-text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-center gap-6">
                                        <div>
                                            <p
                                                class="text-lg font-semibold text-center text-gray-800 dark:text-white/90">
                                                224
                                            </p>
                                            <p
                                                class="text-theme-xs mt-0.5 text-center text-gray-500 dark:text-gray-400">
                                                Avg, Daily
                                            </p>
                                        </div>

                                        <div class="w-px bg-gray-200 h-11 dark:bg-gray-800"></div>

                                        <div>
                                            <p
                                                class="text-lg font-semibold text-center text-gray-800 dark:text-white/90">
                                                1.4K
                                            </p>
                                            <p
                                                class="text-theme-xs mt-0.5 text-center text-gray-500 dark:text-gray-400">
                                                Avg, Weekly
                                            </p>
                                        </div>

                                        <div class="w-px bg-gray-200 h-11 dark:bg-gray-800"></div>

                                        <div>
                                            <p
                                                class="text-lg font-semibold text-center text-gray-800 dark:text-white/90">
                                                22.1K
                                            </p>
                                            <p
                                                class="text-theme-xs mt-0.5 text-center text-gray-500 dark:text-gray-400">
                                                Avg, Monthly
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====== Chart Five End -->
                            </div>

                            <div class="col-span-12 xl:col-span-7">
                                <!-- ====== Chart Six Start -->
                                <div
                                    class="rounded-2xl border border-gray-200 bg-white px-5 pt-5 dark:border-gray-800 dark:bg-white/[0.03] sm:px-6 sm:pt-6">
                                    <div class="mb-4 flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                            Acquisition Channels
                                        </h3>

                                        <div x-data="{ openDropDown: false }" class="relative">
                                            <button @click="openDropDown = !openDropDown"
                                                :class="openDropDown ? 'text-gray-700 dark:text-white' :
                                                    'text-gray-400 hover:text-gray-700 dark:hover:text-white'"
                                                class="text-gray-400 hover:text-gray-700 dark:hover:text-white">
                                                <svg class="fill-current" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                                        fill=""></path>
                                                </svg>
                                            </button>
                                            <div x-show="openDropDown" @click.outside="openDropDown = false"
                                                class="absolute right-0 top-full z-40 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark"
                                                style="display: none;">
                                                <button
                                                    class="flex w-full rounded-lg px-3 py-2 text-left text-theme-xs font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                    View More
                                                </button>
                                                <button
                                                    class="flex w-full rounded-lg px-3 py-2 text-left text-theme-xs font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-scrollbar max-w-full overflow-x-auto">
                                        <div id="chartSix" class="-ml-5 min-w-[700px] pl-2"
                                            style="min-height: 330px;">
                                            <div id="apexchartsqjaz66lj"
                                                class="apexcharts-canvas apexchartsqjaz66lj apexcharts-theme-"
                                                style="width: 692px; height: 315px;"><svg id="SvgjsSvg3697"
                                                    width="692" height="315"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                    xmlns:data="ApexChartsNS" transform="translate(0, 0)">
                                                    <foreignObject x="0" y="0" width="692" height="315">
                                                        <div xmlns="http://www.w3.org/1999/xhtml"
                                                            style="position: relative; height: 100%; width: 100%;">
                                                            <div class="apexcharts-legend apexcharts-align-left apx-legend-position-top"
                                                                style="right: 0px; position: absolute; left: 0px; top: 4px; max-height: 157.5px;">
                                                                <div class="apexcharts-legend-series" rel="1"
                                                                    seriesname="Direct" data:collapsed="false"
                                                                    style="margin: 0px 10px;"><span
                                                                        class="apexcharts-legend-marker"
                                                                        rel="1" data:collapsed="false"
                                                                        style="height: 10px; width: 10px; left: 0px; top: 0px;"><svg
                                                                            id="SvgjsSvg3700" width="100%"
                                                                            height="100%"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev">
                                                                            <defs id="SvgjsDefs3701">
                                                                                <clipPath id="gridRectMaskqjaz66lj">
                                                                                    <rect id="SvgjsRect3719"
                                                                                        width="626.368748664856"
                                                                                        height="227.40640030860902"
                                                                                        x="0" y="0" rx="0"
                                                                                        ry="0"
                                                                                        opacity="1"
                                                                                        stroke-width="0"
                                                                                        stroke="none"
                                                                                        stroke-dasharray="0"
                                                                                        fill="#fff"></rect>
                                                                                </clipPath>
                                                                                <clipPath
                                                                                    id="gridRectBarMaskqjaz66lj">
                                                                                    <rect id="SvgjsRect3720"
                                                                                        width="630.368748664856"
                                                                                        height="231.40640030860902"
                                                                                        x="-2" y="-2" rx="0"
                                                                                        ry="0"
                                                                                        opacity="1"
                                                                                        stroke-width="0"
                                                                                        stroke="none"
                                                                                        stroke-dasharray="0"
                                                                                        fill="#fff"></rect>
                                                                                </clipPath>
                                                                                <clipPath
                                                                                    id="gridRectMarkerMaskqjaz66lj">
                                                                                    <rect id="SvgjsRect3721"
                                                                                        width="626.368748664856"
                                                                                        height="227.40640030860902"
                                                                                        x="0" y="0" rx="0"
                                                                                        ry="0"
                                                                                        opacity="1"
                                                                                        stroke-width="0"
                                                                                        stroke="none"
                                                                                        stroke-dasharray="0"
                                                                                        fill="#fff"></rect>
                                                                                </clipPath>
                                                                                <clipPath id="forecastMaskqjaz66lj">
                                                                                </clipPath>
                                                                                <clipPath
                                                                                    id="nonForecastMaskqjaz66lj">
                                                                                </clipPath>
                                                                            </defs>
                                                                            <path id="SvgjsPath3702" d="M 0, 0
           m -5, 0
           a 5,5 0 1,0 10,0
           a 5,5 0 1,0 -10,0" fill="#2a31d8" fill-opacity="1" stroke-opacity="0.9" stroke-linecap="round"
                                                                                stroke-width="0"
                                                                                stroke-dasharray="0" cx="0"
                                                                                cy="0" shape="circle"
                                                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                                                style="transform: translate(50%, 50%);">
                                                                            </path>
                                                                        </svg></span><span
                                                                        class="apexcharts-legend-text"
                                                                        rel="1" i="0"
                                                                        data:default-text="Direct"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(55, 61, 63); font-size: 14px; font-weight: 400; font-family: Outfit;">Direct</span>
                                                                </div>
                                                                <div class="apexcharts-legend-series" rel="2"
                                                                    seriesname="Referral" data:collapsed="false"
                                                                    style="margin: 0px 10px;"><span
                                                                        class="apexcharts-legend-marker"
                                                                        rel="2" data:collapsed="false"
                                                                        style="height: 10px; width: 10px; left: 0px; top: 0px;"><svg
                                                                            id="SvgjsSvg3703" width="100%"
                                                                            height="100%"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev">
                                                                            <defs id="SvgjsDefs3704"></defs>
                                                                            <path id="SvgjsPath3705" d="M 0, 0
           m -5, 0
           a 5,5 0 1,0 10,0
           a 5,5 0 1,0 -10,0" fill="#465fff" fill-opacity="1" stroke-opacity="0.9" stroke-linecap="round"
                                                                                stroke-width="0"
                                                                                stroke-dasharray="0" cx="0"
                                                                                cy="0" shape="circle"
                                                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                                                style="transform: translate(50%, 50%);">
                                                                            </path>
                                                                        </svg></span><span
                                                                        class="apexcharts-legend-text"
                                                                        rel="2" i="1"
                                                                        data:default-text="Referral"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(55, 61, 63); font-size: 14px; font-weight: 400; font-family: Outfit;">Referral</span>
                                                                </div>
                                                                <div class="apexcharts-legend-series" rel="3"
                                                                    seriesname="OrganicxSearch"
                                                                    data:collapsed="false"
                                                                    style="margin: 0px 10px;"><span
                                                                        class="apexcharts-legend-marker"
                                                                        rel="3" data:collapsed="false"
                                                                        style="height: 10px; width: 10px; left: 0px; top: 0px;"><svg
                                                                            id="SvgjsSvg3706" width="100%"
                                                                            height="100%"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev">
                                                                            <defs id="SvgjsDefs3707"></defs>
                                                                            <path id="SvgjsPath3708" d="M 0, 0
           m -5, 0
           a 5,5 0 1,0 10,0
           a 5,5 0 1,0 -10,0" fill="#7592ff" fill-opacity="1" stroke-opacity="0.9" stroke-linecap="round"
                                                                                stroke-width="0"
                                                                                stroke-dasharray="0" cx="0"
                                                                                cy="0" shape="circle"
                                                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                                                style="transform: translate(50%, 50%);">
                                                                            </path>
                                                                        </svg></span><span
                                                                        class="apexcharts-legend-text"
                                                                        rel="3" i="2"
                                                                        data:default-text="Organic%20Search"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(55, 61, 63); font-size: 14px; font-weight: 400; font-family: Outfit;">Organic
                                                                        Search</span></div>
                                                                <div class="apexcharts-legend-series" rel="4"
                                                                    seriesname="Social" data:collapsed="false"
                                                                    style="margin: 0px 10px;"><span
                                                                        class="apexcharts-legend-marker"
                                                                        rel="4" data:collapsed="false"
                                                                        style="height: 10px; width: 10px; left: 0px; top: 0px;"><svg
                                                                            id="SvgjsSvg3709" width="100%"
                                                                            height="100%"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev">
                                                                            <defs id="SvgjsDefs3710"></defs>
                                                                            <path id="SvgjsPath3711" d="M 0, 0
           m -5, 0
           a 5,5 0 1,0 10,0
           a 5,5 0 1,0 -10,0" fill="#c2d6ff" fill-opacity="1" stroke-opacity="0.9" stroke-linecap="round"
                                                                                stroke-width="0"
                                                                                stroke-dasharray="0" cx="0"
                                                                                cy="0" shape="circle"
                                                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                                                style="transform: translate(50%, 50%);">
                                                                            </path>
                                                                        </svg></span><span
                                                                        class="apexcharts-legend-text"
                                                                        rel="4" i="3"
                                                                        data:default-text="Social"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(55, 61, 63); font-size: 14px; font-weight: 400; font-family: Outfit;">Social</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <style type="text/css">
                                                            .apexcharts-legend {
                                                                display: flex;
                                                                overflow: auto;
                                                                padding: 0 10px;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom,
                                                            .apexcharts-legend.apx-legend-position-top {
                                                                flex-wrap: wrap
                                                            }

                                                            .apexcharts-legend.apx-legend-position-right,
                                                            .apexcharts-legend.apx-legend-position-left {
                                                                flex-direction: column;
                                                                bottom: 0;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                            .apexcharts-legend.apx-legend-position-right,
                                                            .apexcharts-legend.apx-legend-position-left {
                                                                justify-content: flex-start;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                justify-content: center;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                justify-content: flex-end;
                                                            }

                                                            .apexcharts-legend-series {
                                                                cursor: pointer;
                                                                line-height: normal;
                                                                display: flex;
                                                                align-items: center;
                                                            }

                                                            .apexcharts-legend-text {
                                                                position: relative;
                                                                font-size: 14px;
                                                            }

                                                            .apexcharts-legend-text *,
                                                            .apexcharts-legend-marker * {
                                                                pointer-events: none;
                                                            }

                                                            .apexcharts-legend-marker {
                                                                position: relative;
                                                                display: flex;
                                                                align-items: center;
                                                                justify-content: center;
                                                                cursor: pointer;
                                                                margin-right: 1px;
                                                            }

                                                            .apexcharts-legend-series.apexcharts-no-click {
                                                                cursor: auto;
                                                            }

                                                            .apexcharts-legend .apexcharts-hidden-zero-series,
                                                            .apexcharts-legend .apexcharts-hidden-null-series {
                                                                display: none !important;
                                                            }

                                                            .apexcharts-inactive-legend {
                                                                opacity: 0.45;
                                                            }
                                                        </style>
                                                    </foreignObject>
                                                    <g id="SvgjsG3722" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                    <g id="SvgjsG3723" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                    <g id="SvgjsG3842" class="apexcharts-yaxis" rel="0"
                                                        transform="translate(13.98750114440918, 0)">
                                                        <g id="SvgjsG3843" class="apexcharts-yaxis-texts-g"><text
                                                                id="SvgjsText3845" font-family="Outfit, sans-serif"
                                                                x="20" y="51.666666666666664" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3846">120</tspan>
                                                                <title>120</title>
                                                            </text><text id="SvgjsText3848"
                                                                font-family="Outfit, sans-serif" x="20"
                                                                y="89.56773338476816" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3849">100</tspan>
                                                                <title>100</title>
                                                            </text><text id="SvgjsText3851"
                                                                font-family="Outfit, sans-serif" x="20"
                                                                y="127.46880010286966" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3852">80</tspan>
                                                                <title>80</title>
                                                            </text><text id="SvgjsText3854"
                                                                font-family="Outfit, sans-serif" x="20"
                                                                y="165.36986682097117" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3855">60</tspan>
                                                                <title>60</title>
                                                            </text><text id="SvgjsText3857"
                                                                font-family="Outfit, sans-serif" x="20"
                                                                y="203.27093353907267" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3858">40</tspan>
                                                                <title>40</title>
                                                            </text><text id="SvgjsText3860"
                                                                font-family="Outfit, sans-serif" x="20"
                                                                y="241.17200025717418" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3861">20</tspan>
                                                                <title>20</title>
                                                            </text><text id="SvgjsText3863"
                                                                font-family="Outfit, sans-serif" x="20"
                                                                y="279.07306697527565" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Outfit, sans-serif;">
                                                                <tspan id="SvgjsTspan3864">0</tspan>
                                                                <title>0</title>
                                                            </text></g>
                                                    </g>
                                                    <g id="SvgjsG3699" class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(43.98750114440918, 48)">
                                                        <defs id="SvgjsDefs3698">
                                                            <linearGradient id="SvgjsLinearGradient3714"
                                                                x1="0" y1="0" x2="0"
                                                                y2="1">
                                                                <stop id="SvgjsStop3715" stop-opacity="0.4"
                                                                    stop-color="rgba(216,227,240,0.4)"
                                                                    offset="0"></stop>
                                                                <stop id="SvgjsStop3716" stop-opacity="0.5"
                                                                    stop-color="rgba(190,209,230,0.5)"
                                                                    offset="1"></stop>
                                                                <stop id="SvgjsStop3717" stop-opacity="0.5"
                                                                    stop-color="rgba(190,209,230,0.5)"
                                                                    offset="1"></stop>
                                                            </linearGradient>
                                                        </defs>
                                                        <rect id="SvgjsRect3718" width="30.53547649741173"
                                                            height="227.40640030860902" x="0" y="0" rx="0"
                                                            ry="0" opacity="1" stroke-width="0"
                                                            stroke-dasharray="3"
                                                            fill="url(#SvgjsLinearGradient3714)"
                                                            class="apexcharts-xcrosshairs" y2="227.40640030860902"
                                                            filter="none" fill-opacity="0.9"></rect>
                                                        <g id="SvgjsG3801" class="apexcharts-grid">
                                                            <g id="SvgjsG3802"
                                                                class="apexcharts-gridlines-horizontal">
                                                                <line id="SvgjsLine3806" x1="0"
                                                                    y1="37.901066718101504" x2="626.368748664856"
                                                                    y2="37.901066718101504" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine3807" x1="0"
                                                                    y1="75.80213343620301" x2="626.368748664856"
                                                                    y2="75.80213343620301" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine3808" x1="0"
                                                                    y1="113.70320015430451" x2="626.368748664856"
                                                                    y2="113.70320015430451" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine3809" x1="0"
                                                                    y1="151.60426687240601" x2="626.368748664856"
                                                                    y2="151.60426687240601" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine3810" x1="0"
                                                                    y1="189.50533359050752" x2="626.368748664856"
                                                                    y2="189.50533359050752" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                            </g>
                                                            <g id="SvgjsG3803"
                                                                class="apexcharts-gridlines-vertical"></g>
                                                            <line id="SvgjsLine3813" x1="0"
                                                                y1="227.40640030860902" x2="626.368748664856"
                                                                y2="227.40640030860902" stroke="transparent"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line id="SvgjsLine3812" x1="0" y1="1"
                                                                x2="0" y2="227.40640030860902"
                                                                stroke="transparent" stroke-dasharray="0"
                                                                stroke-linecap="butt"></line>
                                                        </g>
                                                        <g id="SvgjsG3804" class="apexcharts-grid-borders">
                                                            <line id="SvgjsLine3805" x1="0" y1="0"
                                                                x2="626.368748664856" y2="0"
                                                                stroke="#e0e0e0" stroke-dasharray="0"
                                                                stroke-linecap="butt" class="apexcharts-gridline">
                                                            </line>
                                                            <line id="SvgjsLine3811" x1="0"
                                                                y1="227.40640030860902" x2="626.368748664856"
                                                                y2="227.40640030860902" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-gridline"></line>
                                                        </g>
                                                        <g id="SvgjsG3724"
                                                            class="apexcharts-bar-series apexcharts-plot-series">
                                                            <g id="SvgjsG3725" class="apexcharts-series"
                                                                seriesName="Direct" rel="1"
                                                                data:realIndex="0">
                                                                <path id="SvgjsPath3729"
                                                                    d="M 23.880308542847633 227.40740030860903 L 23.880308542847633 144.02505352878572 L 54.415785040259365 144.02505352878572 L 54.415785040259365 227.40740030860903 z"
                                                                    fill="rgba(42,49,216,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 23.880308542847633 227.40740030860903 L 23.880308542847633 144.02505352878572 L 54.415785040259365 144.02505352878572 L 54.415785040259365 227.40740030860903 z"
                                                                    pathFrom="M 23.880308542847633 227.40740030860903 L 23.880308542847633 227.40740030860903 L 54.415785040259365 227.40740030860903 L 54.415785040259365 227.40740030860903 L 54.415785040259365 227.40740030860903 L 54.415785040259365 227.40740030860903 L 54.415785040259365 227.40740030860903 L 23.880308542847633 227.40740030860903 z"
                                                                    cy="144.0240535287857" cx="102.17640212595462"
                                                                    j="0" val="44"
                                                                    barHeight="83.38234677982331"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3731"
                                                                    d="M 102.17640212595462 227.40740030860903 L 102.17640212595462 123.17946683382989 L 132.71187862336635 123.17946683382989 L 132.71187862336635 227.40740030860903 z"
                                                                    fill="rgba(42,49,216,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 102.17640212595462 227.40740030860903 L 102.17640212595462 123.17946683382989 L 132.71187862336635 123.17946683382989 L 132.71187862336635 227.40740030860903 z"
                                                                    pathFrom="M 102.17640212595462 227.40740030860903 L 102.17640212595462 227.40740030860903 L 132.71187862336635 227.40740030860903 L 132.71187862336635 227.40740030860903 L 132.71187862336635 227.40740030860903 L 132.71187862336635 227.40740030860903 L 132.71187862336635 227.40740030860903 L 102.17640212595462 227.40740030860903 z"
                                                                    cy="123.17846683382989" cx="180.4724957090616"
                                                                    j="1" val="55"
                                                                    barHeight="104.22793347477914"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3733"
                                                                    d="M 180.4724957090616 227.40740030860903 L 180.4724957090616 149.71021353650096 L 211.00797220647334 149.71021353650096 L 211.00797220647334 227.40740030860903 z"
                                                                    fill="rgba(42,49,216,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 180.4724957090616 227.40740030860903 L 180.4724957090616 149.71021353650096 L 211.00797220647334 149.71021353650096 L 211.00797220647334 227.40740030860903 z"
                                                                    pathFrom="M 180.4724957090616 227.40740030860903 L 180.4724957090616 227.40740030860903 L 211.00797220647334 227.40740030860903 L 211.00797220647334 227.40740030860903 L 211.00797220647334 227.40740030860903 L 211.00797220647334 227.40740030860903 L 211.00797220647334 227.40740030860903 L 180.4724957090616 227.40740030860903 z"
                                                                    cy="149.70921353650095" cx="258.7685892921686"
                                                                    j="2" val="41"
                                                                    barHeight="77.69718677210808"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3735"
                                                                    d="M 258.7685892921686 227.40740030860903 L 258.7685892921686 100.43882680296898 L 289.3040657895803 100.43882680296898 L 289.3040657895803 227.40740030860903 z"
                                                                    fill="rgba(42,49,216,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 258.7685892921686 227.40740030860903 L 258.7685892921686 100.43882680296898 L 289.3040657895803 100.43882680296898 L 289.3040657895803 227.40740030860903 z"
                                                                    pathFrom="M 258.7685892921686 227.40740030860903 L 258.7685892921686 227.40740030860903 L 289.3040657895803 227.40740030860903 L 289.3040657895803 227.40740030860903 L 289.3040657895803 227.40740030860903 L 289.3040657895803 227.40740030860903 L 289.3040657895803 227.40740030860903 L 258.7685892921686 227.40740030860903 z"
                                                                    cy="100.43782680296897" cx="337.0646828752756"
                                                                    j="3" val="67"
                                                                    barHeight="126.96857350564005"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3737"
                                                                    d="M 337.0646828752756 227.40740030860903 L 337.0646828752756 185.71622691869737 L 367.6001593726873 185.71622691869737 L 367.6001593726873 227.40740030860903 z"
                                                                    fill="rgba(42,49,216,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 337.0646828752756 227.40740030860903 L 337.0646828752756 185.71622691869737 L 367.6001593726873 185.71622691869737 L 367.6001593726873 227.40740030860903 z"
                                                                    pathFrom="M 337.0646828752756 227.40740030860903 L 337.0646828752756 227.40740030860903 L 367.6001593726873 227.40740030860903 L 367.6001593726873 227.40740030860903 L 367.6001593726873 227.40740030860903 L 367.6001593726873 227.40740030860903 L 367.6001593726873 227.40740030860903 L 337.0646828752756 227.40740030860903 z"
                                                                    cy="185.71522691869737" cx="415.3607764583826"
                                                                    j="4" val="22"
                                                                    barHeight="41.691173389911654"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3739"
                                                                    d="M 415.3607764583826 227.40740030860903 L 415.3607764583826 145.92010686469078 L 445.8962529557943 145.92010686469078 L 445.8962529557943 227.40740030860903 z"
                                                                    fill="rgba(42,49,216,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 415.3607764583826 227.40740030860903 L 415.3607764583826 145.92010686469078 L 445.8962529557943 145.92010686469078 L 445.8962529557943 227.40740030860903 z"
                                                                    pathFrom="M 415.3607764583826 227.40740030860903 L 415.3607764583826 227.40740030860903 L 445.8962529557943 227.40740030860903 L 445.8962529557943 227.40740030860903 L 445.8962529557943 227.40740030860903 L 445.8962529557943 227.40740030860903 L 445.8962529557943 227.40740030860903 L 415.3607764583826 227.40740030860903 z"
                                                                    cy="145.91910686469078" cx="493.6568700414896"
                                                                    j="5" val="43"
                                                                    barHeight="81.48729344391823"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3741"
                                                                    d="M 493.6568700414896 227.40740030860903 L 493.6568700414896 123.17946683382989 L 524.1923465389013 123.17946683382989 L 524.1923465389013 227.40740030860903 z"
                                                                    fill="rgba(42,49,216,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 493.6568700414896 227.40740030860903 L 493.6568700414896 123.17946683382989 L 524.1923465389013 123.17946683382989 L 524.1923465389013 227.40740030860903 z"
                                                                    pathFrom="M 493.6568700414896 227.40740030860903 L 493.6568700414896 227.40740030860903 L 524.1923465389013 227.40740030860903 L 524.1923465389013 227.40740030860903 L 524.1923465389013 227.40740030860903 L 524.1923465389013 227.40740030860903 L 524.1923465389013 227.40740030860903 L 493.6568700414896 227.40740030860903 z"
                                                                    cy="123.17846683382989" cx="571.9529636245966"
                                                                    j="6" val="55"
                                                                    barHeight="104.22793347477914"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3743"
                                                                    d="M 571.9529636245966 227.40740030860903 L 571.9529636245966 149.71021353650096 L 602.4884401220083 149.71021353650096 L 602.4884401220083 227.40740030860903 z"
                                                                    fill="rgba(42,49,216,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="0"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 571.9529636245966 227.40740030860903 L 571.9529636245966 149.71021353650096 L 602.4884401220083 149.71021353650096 L 602.4884401220083 227.40740030860903 z"
                                                                    pathFrom="M 571.9529636245966 227.40740030860903 L 571.9529636245966 227.40740030860903 L 602.4884401220083 227.40740030860903 L 602.4884401220083 227.40740030860903 L 602.4884401220083 227.40740030860903 L 602.4884401220083 227.40740030860903 L 602.4884401220083 227.40740030860903 L 571.9529636245966 227.40740030860903 z"
                                                                    cy="149.70921353650095" cx="650.2490572077036"
                                                                    j="7" val="41"
                                                                    barHeight="77.69718677210808"
                                                                    barWidth="30.53547649741173"></path>
                                                                <g id="SvgjsG3727"
                                                                    class="apexcharts-bar-goals-markers">
                                                                    <g id="SvgjsG3728"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3730"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3732"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3734"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3736"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3738"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3740"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3742"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG3744" class="apexcharts-series"
                                                                seriesName="Referral" rel="2"
                                                                data:realIndex="1">
                                                                <path id="SvgjsPath3748"
                                                                    d="M 23.880308542847633 144.02605352878572 L 23.880308542847633 119.39036016201975 L 54.415785040259365 119.39036016201975 L 54.415785040259365 144.02605352878572 z"
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="1"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 23.880308542847633 144.02605352878572 L 23.880308542847633 119.39036016201975 L 54.415785040259365 119.39036016201975 L 54.415785040259365 144.02605352878572 z"
                                                                    pathFrom="M 23.880308542847633 144.02605352878572 L 23.880308542847633 144.02605352878572 L 54.415785040259365 144.02605352878572 L 54.415785040259365 144.02605352878572 L 54.415785040259365 144.02605352878572 L 54.415785040259365 144.02605352878572 L 54.415785040259365 144.02605352878572 L 23.880308542847633 144.02605352878572 z"
                                                                    cy="119.38936016201974" cx="102.17640212595462"
                                                                    j="0" val="13"
                                                                    barHeight="24.635693366765977"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3750"
                                                                    d="M 102.17640212595462 123.1804668338299 L 102.17640212595462 79.59424010801317 L 132.71187862336635 79.59424010801317 L 132.71187862336635 123.1804668338299 z"
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="1"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 102.17640212595462 123.1804668338299 L 102.17640212595462 79.59424010801317 L 132.71187862336635 79.59424010801317 L 132.71187862336635 123.1804668338299 z"
                                                                    pathFrom="M 102.17640212595462 123.1804668338299 L 102.17640212595462 123.1804668338299 L 132.71187862336635 123.1804668338299 L 132.71187862336635 123.1804668338299 L 132.71187862336635 123.1804668338299 L 132.71187862336635 123.1804668338299 L 132.71187862336635 123.1804668338299 L 102.17640212595462 123.1804668338299 z"
                                                                    cy="79.59324010801316" cx="180.4724957090616"
                                                                    j="1" val="23"
                                                                    barHeight="43.58622672581673"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3752"
                                                                    d="M 180.4724957090616 149.71121353650096 L 180.4724957090616 111.81014681839946 L 211.00797220647334 111.81014681839946 L 211.00797220647334 149.71121353650096 z"
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="1"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 180.4724957090616 149.71121353650096 L 180.4724957090616 111.81014681839946 L 211.00797220647334 111.81014681839946 L 211.00797220647334 149.71121353650096 z"
                                                                    pathFrom="M 180.4724957090616 149.71121353650096 L 180.4724957090616 149.71121353650096 L 211.00797220647334 149.71121353650096 L 211.00797220647334 149.71121353650096 L 211.00797220647334 149.71121353650096 L 211.00797220647334 149.71121353650096 L 211.00797220647334 149.71121353650096 L 180.4724957090616 149.71121353650096 z"
                                                                    cy="111.80914681839946" cx="258.7685892921686"
                                                                    j="2" val="20"
                                                                    barHeight="37.901066718101504"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3754"
                                                                    d="M 258.7685892921686 100.43982680296898 L 258.7685892921686 85.27940011572838 L 289.3040657895803 85.27940011572838 L 289.3040657895803 100.43982680296898 z"
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="1"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 258.7685892921686 100.43982680296898 L 258.7685892921686 85.27940011572838 L 289.3040657895803 85.27940011572838 L 289.3040657895803 100.43982680296898 z"
                                                                    pathFrom="M 258.7685892921686 100.43982680296898 L 258.7685892921686 100.43982680296898 L 289.3040657895803 100.43982680296898 L 289.3040657895803 100.43982680296898 L 289.3040657895803 100.43982680296898 L 289.3040657895803 100.43982680296898 L 289.3040657895803 100.43982680296898 L 258.7685892921686 100.43982680296898 z"
                                                                    cy="85.27840011572837" cx="337.0646828752756"
                                                                    j="3" val="8"
                                                                    barHeight="15.160426687240601"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3756"
                                                                    d="M 337.0646828752756 185.71722691869738 L 337.0646828752756 161.08153355193141 L 367.6001593726873 161.08153355193141 L 367.6001593726873 185.71722691869738 z"
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="1"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 337.0646828752756 185.71722691869738 L 337.0646828752756 161.08153355193141 L 367.6001593726873 161.08153355193141 L 367.6001593726873 185.71722691869738 z"
                                                                    pathFrom="M 337.0646828752756 185.71722691869738 L 337.0646828752756 185.71722691869738 L 367.6001593726873 185.71722691869738 L 367.6001593726873 185.71722691869738 L 367.6001593726873 185.71722691869738 L 367.6001593726873 185.71722691869738 L 367.6001593726873 185.71722691869738 L 337.0646828752756 185.71722691869738 z"
                                                                    cy="161.0805335519314" cx="415.3607764583826"
                                                                    j="4" val="13"
                                                                    barHeight="24.635693366765977"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3758"
                                                                    d="M 415.3607764583826 145.92110686469078 L 415.3607764583826 94.75466679525375 L 445.8962529557943 94.75466679525375 L 445.8962529557943 145.92110686469078 z"
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="1"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 415.3607764583826 145.92110686469078 L 415.3607764583826 94.75466679525375 L 445.8962529557943 94.75466679525375 L 445.8962529557943 145.92110686469078 z"
                                                                    pathFrom="M 415.3607764583826 145.92110686469078 L 415.3607764583826 145.92110686469078 L 445.8962529557943 145.92110686469078 L 445.8962529557943 145.92110686469078 L 445.8962529557943 145.92110686469078 L 445.8962529557943 145.92110686469078 L 445.8962529557943 145.92110686469078 L 415.3607764583826 145.92110686469078 z"
                                                                    cy="94.75366679525375" cx="493.6568700414896"
                                                                    j="5" val="27"
                                                                    barHeight="51.16644006943703"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3760"
                                                                    d="M 493.6568700414896 123.1804668338299 L 493.6568700414896 98.54477346706392 L 524.1923465389013 98.54477346706392 L 524.1923465389013 123.1804668338299 z"
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="1"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 493.6568700414896 123.1804668338299 L 493.6568700414896 98.54477346706392 L 524.1923465389013 98.54477346706392 L 524.1923465389013 123.1804668338299 z"
                                                                    pathFrom="M 493.6568700414896 123.1804668338299 L 493.6568700414896 123.1804668338299 L 524.1923465389013 123.1804668338299 L 524.1923465389013 123.1804668338299 L 524.1923465389013 123.1804668338299 L 524.1923465389013 123.1804668338299 L 524.1923465389013 123.1804668338299 L 493.6568700414896 123.1804668338299 z"
                                                                    cy="98.54377346706391" cx="571.9529636245966"
                                                                    j="6" val="13"
                                                                    barHeight="24.635693366765977"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3762"
                                                                    d="M 571.9529636245966 149.71121353650096 L 571.9529636245966 106.12498681068423 L 602.4884401220083 106.12498681068423 L 602.4884401220083 149.71121353650096 z"
                                                                    fill="rgba(70,95,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="1"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 571.9529636245966 149.71121353650096 L 571.9529636245966 106.12498681068423 L 602.4884401220083 106.12498681068423 L 602.4884401220083 149.71121353650096 z"
                                                                    pathFrom="M 571.9529636245966 149.71121353650096 L 571.9529636245966 149.71121353650096 L 602.4884401220083 149.71121353650096 L 602.4884401220083 149.71121353650096 L 602.4884401220083 149.71121353650096 L 602.4884401220083 149.71121353650096 L 602.4884401220083 149.71121353650096 L 571.9529636245966 149.71121353650096 z"
                                                                    cy="106.12398681068423" cx="650.2490572077036"
                                                                    j="7" val="23"
                                                                    barHeight="43.58622672581673"
                                                                    barWidth="30.53547649741173"></path>
                                                                <g id="SvgjsG3746"
                                                                    class="apexcharts-bar-goals-markers">
                                                                    <g id="SvgjsG3747"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3749"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3751"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3753"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3755"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3757"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3759"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3761"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG3763" class="apexcharts-series"
                                                                seriesName="OrganicxSearch" rel="3"
                                                                data:realIndex="2">
                                                                <path id="SvgjsPath3767"
                                                                    d="M 23.880308542847633 119.39136016201975 L 23.880308542847633 98.54577346706392 L 54.415785040259365 98.54577346706392 L 54.415785040259365 119.39136016201975 z"
                                                                    fill="rgba(117,146,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="2"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 23.880308542847633 119.39136016201975 L 23.880308542847633 98.54577346706392 L 54.415785040259365 98.54577346706392 L 54.415785040259365 119.39136016201975 z"
                                                                    pathFrom="M 23.880308542847633 119.39136016201975 L 23.880308542847633 119.39136016201975 L 54.415785040259365 119.39136016201975 L 54.415785040259365 119.39136016201975 L 54.415785040259365 119.39136016201975 L 54.415785040259365 119.39136016201975 L 54.415785040259365 119.39136016201975 L 23.880308542847633 119.39136016201975 z"
                                                                    cy="98.54477346706392" cx="102.17640212595462"
                                                                    j="0" val="11"
                                                                    barHeight="20.845586694955827"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3769"
                                                                    d="M 102.17640212595462 79.59524010801317 L 102.17640212595462 47.37933339762689 L 132.71187862336635 47.37933339762689 L 132.71187862336635 79.59524010801317 z"
                                                                    fill="rgba(117,146,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="2"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 102.17640212595462 79.59524010801317 L 102.17640212595462 47.37933339762689 L 132.71187862336635 47.37933339762689 L 132.71187862336635 79.59524010801317 z"
                                                                    pathFrom="M 102.17640212595462 79.59524010801317 L 102.17640212595462 79.59524010801317 L 132.71187862336635 79.59524010801317 L 132.71187862336635 79.59524010801317 L 132.71187862336635 79.59524010801317 L 132.71187862336635 79.59524010801317 L 132.71187862336635 79.59524010801317 L 102.17640212595462 79.59524010801317 z"
                                                                    cy="47.37833339762689" cx="180.4724957090616"
                                                                    j="1" val="17"
                                                                    barHeight="32.21590671038628"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3771"
                                                                    d="M 180.4724957090616 111.81114681839946 L 180.4724957090616 83.38534677982334 L 211.00797220647334 83.38534677982334 L 211.00797220647334 111.81114681839946 z"
                                                                    fill="rgba(117,146,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="2"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 180.4724957090616 111.81114681839946 L 180.4724957090616 83.38534677982334 L 211.00797220647334 83.38534677982334 L 211.00797220647334 111.81114681839946 z"
                                                                    pathFrom="M 180.4724957090616 111.81114681839946 L 180.4724957090616 111.81114681839946 L 211.00797220647334 111.81114681839946 L 211.00797220647334 111.81114681839946 L 211.00797220647334 111.81114681839946 L 211.00797220647334 111.81114681839946 L 211.00797220647334 111.81114681839946 L 180.4724957090616 111.81114681839946 z"
                                                                    cy="83.38434677982333" cx="258.7685892921686"
                                                                    j="2" val="15"
                                                                    barHeight="28.425800038576128"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3773"
                                                                    d="M 258.7685892921686 85.28040011572838 L 258.7685892921686 56.85460007715225 L 289.3040657895803 56.85460007715225 L 289.3040657895803 85.28040011572838 z"
                                                                    fill="rgba(117,146,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="2"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 258.7685892921686 85.28040011572838 L 258.7685892921686 56.85460007715225 L 289.3040657895803 56.85460007715225 L 289.3040657895803 85.28040011572838 z"
                                                                    pathFrom="M 258.7685892921686 85.28040011572838 L 258.7685892921686 85.28040011572838 L 289.3040657895803 85.28040011572838 L 289.3040657895803 85.28040011572838 L 289.3040657895803 85.28040011572838 L 289.3040657895803 85.28040011572838 L 289.3040657895803 85.28040011572838 L 258.7685892921686 85.28040011572838 z"
                                                                    cy="56.85360007715225" cx="337.0646828752756"
                                                                    j="3" val="15"
                                                                    barHeight="28.425800038576128"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3775"
                                                                    d="M 337.0646828752756 161.08253355193142 L 337.0646828752756 121.28641349792484 L 367.6001593726873 121.28641349792484 L 367.6001593726873 161.08253355193142 z"
                                                                    fill="rgba(117,146,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="2"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 337.0646828752756 161.08253355193142 L 337.0646828752756 121.28641349792484 L 367.6001593726873 121.28641349792484 L 367.6001593726873 161.08253355193142 z"
                                                                    pathFrom="M 337.0646828752756 161.08253355193142 L 337.0646828752756 161.08253355193142 L 367.6001593726873 161.08253355193142 L 367.6001593726873 161.08253355193142 L 367.6001593726873 161.08253355193142 L 367.6001593726873 161.08253355193142 L 367.6001593726873 161.08253355193142 L 337.0646828752756 161.08253355193142 z"
                                                                    cy="121.28541349792484" cx="415.3607764583826"
                                                                    j="4" val="21"
                                                                    barHeight="39.79612005400658"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3777"
                                                                    d="M 415.3607764583826 94.75566679525376 L 415.3607764583826 68.2249200925827 L 445.8962529557943 68.2249200925827 L 445.8962529557943 94.75566679525376 z"
                                                                    fill="rgba(117,146,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="2"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 415.3607764583826 94.75566679525376 L 415.3607764583826 68.2249200925827 L 445.8962529557943 68.2249200925827 L 445.8962529557943 94.75566679525376 z"
                                                                    pathFrom="M 415.3607764583826 94.75566679525376 L 415.3607764583826 94.75566679525376 L 445.8962529557943 94.75566679525376 L 445.8962529557943 94.75566679525376 L 445.8962529557943 94.75566679525376 L 445.8962529557943 94.75566679525376 L 445.8962529557943 94.75566679525376 L 415.3607764583826 94.75566679525376 z"
                                                                    cy="68.2239200925827" cx="493.6568700414896"
                                                                    j="5" val="14"
                                                                    barHeight="26.530746702671053"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3779"
                                                                    d="M 493.6568700414896 98.54577346706392 L 493.6568700414896 64.43481342077257 L 524.1923465389013 64.43481342077257 L 524.1923465389013 98.54577346706392 z"
                                                                    fill="rgba(117,146,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="2"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 493.6568700414896 98.54577346706392 L 493.6568700414896 64.43481342077257 L 524.1923465389013 64.43481342077257 L 524.1923465389013 98.54577346706392 z"
                                                                    pathFrom="M 493.6568700414896 98.54577346706392 L 493.6568700414896 98.54577346706392 L 524.1923465389013 98.54577346706392 L 524.1923465389013 98.54577346706392 L 524.1923465389013 98.54577346706392 L 524.1923465389013 98.54577346706392 L 524.1923465389013 98.54577346706392 L 493.6568700414896 98.54577346706392 z"
                                                                    cy="64.43381342077257" cx="571.9529636245966"
                                                                    j="6" val="18"
                                                                    barHeight="34.11096004629135"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3781"
                                                                    d="M 571.9529636245966 106.12598681068424 L 571.9529636245966 68.22492009258274 L 602.4884401220083 68.22492009258274 L 602.4884401220083 106.12598681068424 z"
                                                                    fill="rgba(117,146,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="2"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 571.9529636245966 106.12598681068424 L 571.9529636245966 68.22492009258274 L 602.4884401220083 68.22492009258274 L 602.4884401220083 106.12598681068424 z"
                                                                    pathFrom="M 571.9529636245966 106.12598681068424 L 571.9529636245966 106.12598681068424 L 602.4884401220083 106.12598681068424 L 602.4884401220083 106.12598681068424 L 602.4884401220083 106.12598681068424 L 602.4884401220083 106.12598681068424 L 602.4884401220083 106.12598681068424 L 571.9529636245966 106.12598681068424 z"
                                                                    cy="68.22392009258273" cx="650.2490572077036"
                                                                    j="7" val="20"
                                                                    barHeight="37.901066718101504"
                                                                    barWidth="30.53547649741173"></path>
                                                                <g id="SvgjsG3765"
                                                                    class="apexcharts-bar-goals-markers">
                                                                    <g id="SvgjsG3766"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3768"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3770"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3772"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3774"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3776"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3778"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3780"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG3782" class="apexcharts-series"
                                                                seriesName="Social" rel="4"
                                                                data:realIndex="3">
                                                                <path id="SvgjsPath3786"
                                                                    d="M 23.880308542847633 98.54677346706393 L 23.880308542847633 68.75065341305734 C 23.880308542847633 63.750653413057336 28.88030854284763 58.75065341305734 33.88030854284763 58.75065341305734 L 44.415785040259365 58.75065341305734 C 49.415785040259365 58.75065341305734 54.415785040259365 63.750653413057336 54.415785040259365 68.75065341305734 L 54.415785040259365 98.54677346706393 z "
                                                                    fill="rgba(194,214,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="3"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 23.880308542847633 98.54677346706393 L 23.880308542847633 68.75065341305734 C 23.880308542847633 63.750653413057336 28.88030854284763 58.75065341305734 33.88030854284763 58.75065341305734 L 44.415785040259365 58.75065341305734 C 49.415785040259365 58.75065341305734 54.415785040259365 63.750653413057336 54.415785040259365 68.75065341305734 L 54.415785040259365 98.54677346706393 z "
                                                                    pathFrom="M 23.880308542847633 98.54677346706393 L 23.880308542847633 98.54677346706393 L 54.415785040259365 98.54677346706393 L 54.415785040259365 98.54677346706393 L 54.415785040259365 98.54677346706393 L 54.415785040259365 98.54677346706393 L 54.415785040259365 98.54677346706393 L 23.880308542847633 98.54677346706393 z"
                                                                    cy="58.749653413057345" cx="102.17640212595462"
                                                                    j="0" val="21"
                                                                    barHeight="39.79612005400658"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3788"
                                                                    d="M 102.17640212595462 47.380333397626885 L 102.17640212595462 44.11496004629136 C 102.17640212595462 39.11496004629136 107.17640212595462 34.11496004629136 112.17640212595462 34.11496004629136 L 122.71187862336635 34.11496004629136 C 127.71187862336635 34.11496004629136 132.71187862336635 39.11496004629136 132.71187862336635 44.11496004629136 L 132.71187862336635 47.380333397626885 z "
                                                                    fill="rgba(194,214,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="3"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 102.17640212595462 47.380333397626885 L 102.17640212595462 44.11496004629136 C 102.17640212595462 39.11496004629136 107.17640212595462 34.11496004629136 112.17640212595462 34.11496004629136 L 122.71187862336635 34.11496004629136 C 127.71187862336635 34.11496004629136 132.71187862336635 39.11496004629136 132.71187862336635 44.11496004629136 L 132.71187862336635 47.380333397626885 z "
                                                                    pathFrom="M 102.17640212595462 47.380333397626885 L 102.17640212595462 47.380333397626885 L 132.71187862336635 47.380333397626885 L 132.71187862336635 47.380333397626885 L 132.71187862336635 47.380333397626885 L 132.71187862336635 47.380333397626885 L 132.71187862336635 47.380333397626885 L 102.17640212595462 47.380333397626885 z"
                                                                    cy="34.11396004629136" cx="180.4724957090616"
                                                                    j="1" val="7"
                                                                    barHeight="13.265373351335526"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3790"
                                                                    d="M 180.4724957090616 83.38634677982334 L 180.4724957090616 46.010013382196455 C 180.4724957090616 41.010013382196455 185.4724957090616 36.010013382196455 190.4724957090616 36.010013382196455 L 201.00797220647334 36.010013382196455 C 206.00797220647334 36.010013382196455 211.00797220647334 41.010013382196455 211.00797220647334 46.010013382196455 L 211.00797220647334 83.38634677982334 z "
                                                                    fill="rgba(194,214,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="3"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 180.4724957090616 83.38634677982334 L 180.4724957090616 46.010013382196455 C 180.4724957090616 41.010013382196455 185.4724957090616 36.010013382196455 190.4724957090616 36.010013382196455 L 201.00797220647334 36.010013382196455 C 206.00797220647334 36.010013382196455 211.00797220647334 41.010013382196455 211.00797220647334 46.010013382196455 L 211.00797220647334 83.38634677982334 z "
                                                                    pathFrom="M 180.4724957090616 83.38634677982334 L 180.4724957090616 83.38634677982334 L 211.00797220647334 83.38634677982334 L 211.00797220647334 83.38634677982334 L 211.00797220647334 83.38634677982334 L 211.00797220647334 83.38634677982334 L 211.00797220647334 83.38634677982334 L 180.4724957090616 83.38634677982334 z"
                                                                    cy="36.00901338219646" cx="258.7685892921686"
                                                                    j="2" val="25"
                                                                    barHeight="47.37633339762688"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3792"
                                                                    d="M 258.7685892921686 56.855600077152246 L 258.7685892921686 42.21990671038627 C 258.7685892921686 37.21990671038627 263.7685892921686 32.21990671038627 268.7685892921686 32.21990671038627 L 279.3040657895803 32.21990671038627 C 284.3040657895803 32.21990671038627 289.3040657895803 37.21990671038627 289.3040657895803 42.21990671038627 L 289.3040657895803 56.855600077152246 z "
                                                                    fill="rgba(194,214,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="3"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 258.7685892921686 56.855600077152246 L 258.7685892921686 42.21990671038627 C 258.7685892921686 37.21990671038627 263.7685892921686 32.21990671038627 268.7685892921686 32.21990671038627 L 279.3040657895803 32.21990671038627 C 284.3040657895803 32.21990671038627 289.3040657895803 37.21990671038627 289.3040657895803 42.21990671038627 L 289.3040657895803 56.855600077152246 z "
                                                                    pathFrom="M 258.7685892921686 56.855600077152246 L 258.7685892921686 56.855600077152246 L 289.3040657895803 56.855600077152246 L 289.3040657895803 56.855600077152246 L 289.3040657895803 56.855600077152246 L 289.3040657895803 56.855600077152246 L 289.3040657895803 56.855600077152246 L 258.7685892921686 56.855600077152246 z"
                                                                    cy="32.21890671038627" cx="337.0646828752756"
                                                                    j="3" val="13"
                                                                    barHeight="24.635693366765977"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3794"
                                                                    d="M 337.0646828752756 121.28741349792485 L 337.0646828752756 89.59624010801319 C 337.0646828752756 84.59624010801319 342.0646828752756 79.59624010801319 347.0646828752756 79.59624010801319 L 357.6001593726873 79.59624010801319 C 362.6001593726873 79.59624010801319 367.6001593726873 84.59624010801319 367.6001593726873 89.59624010801319 L 367.6001593726873 121.28741349792485 z "
                                                                    fill="rgba(194,214,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="3"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 337.0646828752756 121.28741349792485 L 337.0646828752756 89.59624010801319 C 337.0646828752756 84.59624010801319 342.0646828752756 79.59624010801319 347.0646828752756 79.59624010801319 L 357.6001593726873 79.59624010801319 C 362.6001593726873 79.59624010801319 367.6001593726873 84.59624010801319 367.6001593726873 89.59624010801319 L 367.6001593726873 121.28741349792485 z "
                                                                    pathFrom="M 337.0646828752756 121.28741349792485 L 337.0646828752756 121.28741349792485 L 367.6001593726873 121.28741349792485 L 367.6001593726873 121.28741349792485 L 367.6001593726873 121.28741349792485 L 367.6001593726873 121.28741349792485 L 367.6001593726873 121.28741349792485 L 337.0646828752756 121.28741349792485 z"
                                                                    cy="79.59524010801319" cx="415.3607764583826"
                                                                    j="4" val="22"
                                                                    barHeight="41.691173389911654"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3796"
                                                                    d="M 415.3607764583826 68.22592009258271 L 415.3607764583826 63.0654934053421 C 415.3607764583826 58.0654934053421 420.3607764583826 53.0654934053421 425.3607764583826 53.0654934053421 L 435.8962529557943 53.0654934053421 C 440.8962529557943 53.0654934053421 445.8962529557943 58.0654934053421 445.8962529557943 63.0654934053421 L 445.8962529557943 68.22592009258271 z "
                                                                    fill="rgba(194,214,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="3"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 415.3607764583826 68.22592009258271 L 415.3607764583826 63.0654934053421 C 415.3607764583826 58.0654934053421 420.3607764583826 53.0654934053421 425.3607764583826 53.0654934053421 L 435.8962529557943 53.0654934053421 C 440.8962529557943 53.0654934053421 445.8962529557943 58.0654934053421 445.8962529557943 63.0654934053421 L 445.8962529557943 68.22592009258271 z "
                                                                    pathFrom="M 415.3607764583826 68.22592009258271 L 415.3607764583826 68.22592009258271 L 445.8962529557943 68.22592009258271 L 445.8962529557943 68.22592009258271 L 445.8962529557943 68.22592009258271 L 445.8962529557943 68.22592009258271 L 445.8962529557943 68.22592009258271 L 415.3607764583826 68.22592009258271 z"
                                                                    cy="53.064493405342105" cx="493.6568700414896"
                                                                    j="5" val="8"
                                                                    barHeight="15.160426687240601"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3798"
                                                                    d="M 493.6568700414896 64.43581342077258 L 493.6568700414896 40.32485337448122 C 493.6568700414896 35.32485337448122 498.6568700414896 30.32485337448122 503.6568700414896 30.32485337448122 L 514.1923465389013 30.32485337448122 C 519.1923465389013 30.32485337448122 524.1923465389013 35.32485337448122 524.1923465389013 40.32485337448122 L 524.1923465389013 64.43581342077258 z "
                                                                    fill="rgba(194,214,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="3"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 493.6568700414896 64.43581342077258 L 493.6568700414896 40.32485337448122 C 493.6568700414896 35.32485337448122 498.6568700414896 30.32485337448122 503.6568700414896 30.32485337448122 L 514.1923465389013 30.32485337448122 C 519.1923465389013 30.32485337448122 524.1923465389013 35.32485337448122 524.1923465389013 40.32485337448122 L 524.1923465389013 64.43581342077258 z "
                                                                    pathFrom="M 493.6568700414896 64.43581342077258 L 493.6568700414896 64.43581342077258 L 524.1923465389013 64.43581342077258 L 524.1923465389013 64.43581342077258 L 524.1923465389013 64.43581342077258 L 524.1923465389013 64.43581342077258 L 524.1923465389013 64.43581342077258 L 493.6568700414896 64.43581342077258 z"
                                                                    cy="30.323853374481217" cx="571.9529636245966"
                                                                    j="6" val="18"
                                                                    barHeight="34.11096004629135"
                                                                    barWidth="30.53547649741173"></path>
                                                                <path id="SvgjsPath3800"
                                                                    d="M 571.9529636245966 68.22592009258274 L 571.9529636245966 40.324853374481236 C 571.9529636245966 35.324853374481236 576.9529636245966 30.324853374481233 581.9529636245966 30.324853374481233 L 592.4884401220083 30.324853374481233 C 597.4884401220083 30.324853374481233 602.4884401220083 35.324853374481236 602.4884401220083 40.324853374481236 L 602.4884401220083 68.22592009258274 z "
                                                                    fill="rgba(194,214,255,1)" fill-opacity="1"
                                                                    stroke-opacity="1" stroke-linecap="round"
                                                                    stroke-width="0" stroke-dasharray="0"
                                                                    class="apexcharts-bar-area" index="3"
                                                                    clip-path="url(#gridRectBarMaskqjaz66lj)"
                                                                    pathTo="M 571.9529636245966 68.22592009258274 L 571.9529636245966 40.324853374481236 C 571.9529636245966 35.324853374481236 576.9529636245966 30.324853374481233 581.9529636245966 30.324853374481233 L 592.4884401220083 30.324853374481233 C 597.4884401220083 30.324853374481233 602.4884401220083 35.324853374481236 602.4884401220083 40.324853374481236 L 602.4884401220083 68.22592009258274 z "
                                                                    pathFrom="M 571.9529636245966 68.22592009258274 L 571.9529636245966 68.22592009258274 L 602.4884401220083 68.22592009258274 L 602.4884401220083 68.22592009258274 L 602.4884401220083 68.22592009258274 L 602.4884401220083 68.22592009258274 L 602.4884401220083 68.22592009258274 L 571.9529636245966 68.22592009258274 z"
                                                                    cy="30.32385337448123" cx="650.2490572077036"
                                                                    j="7" val="20"
                                                                    barHeight="37.901066718101504"
                                                                    barWidth="30.53547649741173"></path>
                                                                <g id="SvgjsG3784"
                                                                    class="apexcharts-bar-goals-markers">
                                                                    <g id="SvgjsG3785"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3787"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3789"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3791"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3793"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3795"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3797"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                    <g id="SvgjsG3799"
                                                                        className="apexcharts-bar-goals-groups"
                                                                        class="apexcharts-hidden-element-shown"
                                                                        clip-path="url(#gridRectMarkerMaskqjaz66lj)">
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG3726" class="apexcharts-datalabels"
                                                                data:realIndex="0"></g>
                                                            <g id="SvgjsG3745" class="apexcharts-datalabels"
                                                                data:realIndex="1"></g>
                                                            <g id="SvgjsG3764" class="apexcharts-datalabels"
                                                                data:realIndex="2"></g>
                                                            <g id="SvgjsG3783" class="apexcharts-datalabels"
                                                                data:realIndex="3"></g>
                                                        </g>
                                                        <line id="SvgjsLine3814" x1="0" y1="0"
                                                            x2="626.368748664856" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="1"
                                                            stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                        </line>
                                                        <line id="SvgjsLine3815" x1="0" y1="0"
                                                            x2="626.368748664856" y2="0"
                                                            stroke-dasharray="0" stroke-width="0"
                                                            stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                        <g id="SvgjsG3816" class="apexcharts-xaxis"
                                                            transform="translate(0, 0)">
                                                            <g id="SvgjsG3817" class="apexcharts-xaxis-texts-g"
                                                                transform="translate(0, -4)"><text
                                                                    id="SvgjsText3819"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="39.1480467915535" y="255.40640030860902"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3820">Jan</tspan>
                                                                    <title>Jan</title>
                                                                </text><text id="SvgjsText3822"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="117.44414037466049" y="255.40640030860902"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3823">Feb</tspan>
                                                                    <title>Feb</title>
                                                                </text><text id="SvgjsText3825"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="195.7402339577675" y="255.40640030860902"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3826">Mar</tspan>
                                                                    <title>Mar</title>
                                                                </text><text id="SvgjsText3828"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="274.0363275408745" y="255.40640030860902"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3829">Apr</tspan>
                                                                    <title>Apr</title>
                                                                </text><text id="SvgjsText3831"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="352.3324211239815" y="255.40640030860902"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3832">May</tspan>
                                                                    <title>May</title>
                                                                </text><text id="SvgjsText3834"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="430.62851470708847" y="255.40640030860902"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3835">Jun</tspan>
                                                                    <title>Jun</title>
                                                                </text><text id="SvgjsText3837"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="508.92460829019547" y="255.40640030860902"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3838">Jul</tspan>
                                                                    <title>Jul</title>
                                                                </text><text id="SvgjsText3840"
                                                                    font-family="Outfit, sans-serif"
                                                                    x="587.2207018733025" y="255.40640030860902"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Outfit, sans-serif;">
                                                                    <tspan id="SvgjsTspan3841">Aug</tspan>
                                                                    <title>Aug</title>
                                                                </text></g>
                                                        </g>
                                                        <g id="SvgjsG3865" class="apexcharts-yaxis-annotations"></g>
                                                        <g id="SvgjsG3866" class="apexcharts-xaxis-annotations"></g>
                                                        <g id="SvgjsG3867" class="apexcharts-point-annotations"></g>
                                                    </g>
                                                </svg>
                                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                                    <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-0"
                                                        style="order: 1;"><span class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(42, 49, 216);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Outfit, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-1"
                                                        style="order: 2;"><span class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(70, 95, 255);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Outfit, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-2"
                                                        style="order: 3;"><span class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(117, 146, 255);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Outfit, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group apexcharts-tooltip-series-group-3"
                                                        style="order: 4;"><span class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(194, 214, 255);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Outfit, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                    <div class="apexcharts-yaxistooltip-text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====== Chart Six End -->
                            </div>

                            <div class="col-span-12 xl:col-span-5">
                                <!-- ====== Chart Seven Start -->
                                <div
                                    class="rounded-2xl border border-gray-200 bg-white p-5 sm:p-6 dark:border-gray-800 dark:bg-white/[0.03]">
                                    <div class="flex items-center justify-between mb-9">
                                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                            Sessions By Device
                                        </h3>
                                        <div x-data="{ openDropDown: false }" class="relative">
                                            <button @click="openDropDown = !openDropDown"
                                                :class="openDropDown ? 'text-gray-700 dark:text-white' :
                                                    'text-gray-400 hover:text-gray-700 dark:hover:text-white'"
                                                class="text-gray-400 hover:text-gray-700 dark:hover:text-white">
                                                <svg class="fill-current" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                                        fill=""></path>
                                                </svg>
                                            </button>
                                            <div x-show="openDropDown" @click.outside="openDropDown = false"
                                                class="absolute right-0 z-40 w-40 p-2 space-y-1 bg-white border border-gray-200 shadow-theme-lg dark:bg-gray-dark top-full rounded-2xl dark:border-gray-800"
                                                style="display: none;">
                                                <button
                                                    class="flex w-full px-3 py-2 font-medium text-left text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                    View More
                                                </button>
                                                <button
                                                    class="flex w-full px-3 py-2 font-medium text-left text-gray-500 rounded-lg text-theme-xs hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div id="chartSeven" class="flex justify-center mx-auto chartDarkStyle"
                                            style="min-height: 286px;">
                                            <div id="apexcharts6z6jew01"
                                                class="apexcharts-canvas apexcharts6z6jew01 apexcharts-theme-"
                                                style="width: 370px; height: 286px;"><svg id="SvgjsSvg3868"
                                                    width="370" height="286"
                                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg"
                                                    xmlns:data="ApexChartsNS" transform="translate(0, 0)">
                                                    <foreignObject x="0" y="0" width="370" height="286">
                                                        <div xmlns="http://www.w3.org/1999/xhtml"
                                                            style="position: relative; height: 100%; width: 100%;">
                                                            <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom"
                                                                style="right: 0px; position: absolute; left: 0px; top: 270.6px; max-height: 145px;">
                                                                <div class="apexcharts-legend-series" rel="1"
                                                                    seriesname="Desktop" data:collapsed="false"
                                                                    style="margin: 0px 10px;"><span
                                                                        class="apexcharts-legend-marker"
                                                                        rel="1" data:collapsed="false"
                                                                        style="height: 10px; width: 10px; left: 0px; top: 0px;"><svg
                                                                            id="SvgjsSvg3871" width="100%"
                                                                            height="100%"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev">
                                                                            <defs id="SvgjsDefs3872">
                                                                                <clipPath id="gridRectMask6z6jew01">
                                                                                    <rect id="SvgjsRect3880"
                                                                                        width="370"
                                                                                        height="262" x="0" y="0"
                                                                                        rx="0"
                                                                                        ry="0"
                                                                                        opacity="1"
                                                                                        stroke-width="0"
                                                                                        stroke="none"
                                                                                        stroke-dasharray="0"
                                                                                        fill="#fff"></rect>
                                                                                </clipPath>
                                                                                <clipPath
                                                                                    id="gridRectBarMask6z6jew01">
                                                                                    <rect id="SvgjsRect3881"
                                                                                        width="378"
                                                                                        height="270" x="-4" y="-4"
                                                                                        rx="0"
                                                                                        ry="0"
                                                                                        opacity="1"
                                                                                        stroke-width="0"
                                                                                        stroke="none"
                                                                                        stroke-dasharray="0"
                                                                                        fill="#fff"></rect>
                                                                                </clipPath>
                                                                                <clipPath
                                                                                    id="gridRectMarkerMask6z6jew01">
                                                                                    <rect id="SvgjsRect3882"
                                                                                        width="370"
                                                                                        height="262" x="0" y="0"
                                                                                        rx="0"
                                                                                        ry="0"
                                                                                        opacity="1"
                                                                                        stroke-width="0"
                                                                                        stroke="none"
                                                                                        stroke-dasharray="0"
                                                                                        fill="#fff"></rect>
                                                                                </clipPath>
                                                                                <clipPath id="forecastMask6z6jew01">
                                                                                </clipPath>
                                                                                <clipPath
                                                                                    id="nonForecastMask6z6jew01">
                                                                                </clipPath>
                                                                            </defs>
                                                                            <path id="SvgjsPath3873" d="M 0, 0
           m -5, 0
           a 5,5 0 1,0 10,0
           a 5,5 0 1,0 -10,0" fill="#3641f5" fill-opacity="1" stroke-opacity="0.9" stroke-linecap="butt"
                                                                                stroke-width="0"
                                                                                stroke-dasharray="0" cx="0"
                                                                                cy="0" shape="circle"
                                                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                                                style="transform: translate(50%, 50%);">
                                                                            </path>
                                                                        </svg></span><span
                                                                        class="apexcharts-legend-text"
                                                                        rel="1" i="0"
                                                                        data:default-text="Desktop"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(55, 61, 63); font-size: 14px; font-weight: 400; font-family: Outfit;">Desktop</span>
                                                                </div>
                                                                <div class="apexcharts-legend-series" rel="2"
                                                                    seriesname="Mobile" data:collapsed="false"
                                                                    style="margin: 0px 10px;"><span
                                                                        class="apexcharts-legend-marker"
                                                                        rel="2" data:collapsed="false"
                                                                        style="height: 10px; width: 10px; left: 0px; top: 0px;"><svg
                                                                            id="SvgjsSvg3874" width="100%"
                                                                            height="100%"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev">
                                                                            <defs id="SvgjsDefs3875"></defs>
                                                                            <path id="SvgjsPath3876" d="M 0, 0
           m -5, 0
           a 5,5 0 1,0 10,0
           a 5,5 0 1,0 -10,0" fill="#7592ff" fill-opacity="1" stroke-opacity="0.9" stroke-linecap="butt"
                                                                                stroke-width="0"
                                                                                stroke-dasharray="0" cx="0"
                                                                                cy="0" shape="circle"
                                                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                                                style="transform: translate(50%, 50%);">
                                                                            </path>
                                                                        </svg></span><span
                                                                        class="apexcharts-legend-text"
                                                                        rel="2" i="1"
                                                                        data:default-text="Mobile"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(55, 61, 63); font-size: 14px; font-weight: 400; font-family: Outfit;">Mobile</span>
                                                                </div>
                                                                <div class="apexcharts-legend-series" rel="3"
                                                                    seriesname="Tablet" data:collapsed="false"
                                                                    style="margin: 0px 10px;"><span
                                                                        class="apexcharts-legend-marker"
                                                                        rel="3" data:collapsed="false"
                                                                        style="height: 10px; width: 10px; left: 0px; top: 0px;"><svg
                                                                            id="SvgjsSvg3877" width="100%"
                                                                            height="100%"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            version="1.1"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xmlns:svgjs="http://svgjs.dev">
                                                                            <defs id="SvgjsDefs3878"></defs>
                                                                            <path id="SvgjsPath3879" d="M 0, 0
           m -5, 0
           a 5,5 0 1,0 10,0
           a 5,5 0 1,0 -10,0" fill="#dde9ff" fill-opacity="1" stroke-opacity="0.9" stroke-linecap="butt"
                                                                                stroke-width="0"
                                                                                stroke-dasharray="0" cx="0"
                                                                                cy="0" shape="circle"
                                                                                class="apexcharts-legend-marker apexcharts-marker apexcharts-marker-circle"
                                                                                style="transform: translate(50%, 50%);">
                                                                            </path>
                                                                        </svg></span><span
                                                                        class="apexcharts-legend-text"
                                                                        rel="3" i="2"
                                                                        data:default-text="Tablet"
                                                                        data:collapsed="false"
                                                                        style="color: rgb(55, 61, 63); font-size: 14px; font-weight: 400; font-family: Outfit;">Tablet</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <style type="text/css">
                                                            .apexcharts-legend {
                                                                display: flex;
                                                                overflow: auto;
                                                                padding: 0 10px;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom,
                                                            .apexcharts-legend.apx-legend-position-top {
                                                                flex-wrap: wrap
                                                            }

                                                            .apexcharts-legend.apx-legend-position-right,
                                                            .apexcharts-legend.apx-legend-position-left {
                                                                flex-direction: column;
                                                                bottom: 0;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                                            .apexcharts-legend.apx-legend-position-right,
                                                            .apexcharts-legend.apx-legend-position-left {
                                                                justify-content: flex-start;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                                justify-content: center;
                                                            }

                                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                                justify-content: flex-end;
                                                            }

                                                            .apexcharts-legend-series {
                                                                cursor: pointer;
                                                                line-height: normal;
                                                                display: flex;
                                                                align-items: center;
                                                            }

                                                            .apexcharts-legend-text {
                                                                position: relative;
                                                                font-size: 14px;
                                                            }

                                                            .apexcharts-legend-text *,
                                                            .apexcharts-legend-marker * {
                                                                pointer-events: none;
                                                            }

                                                            .apexcharts-legend-marker {
                                                                position: relative;
                                                                display: flex;
                                                                align-items: center;
                                                                justify-content: center;
                                                                cursor: pointer;
                                                                margin-right: 1px;
                                                            }

                                                            .apexcharts-legend-series.apexcharts-no-click {
                                                                cursor: auto;
                                                            }

                                                            .apexcharts-legend .apexcharts-hidden-zero-series,
                                                            .apexcharts-legend .apexcharts-hidden-null-series {
                                                                display: none !important;
                                                            }

                                                            .apexcharts-inactive-legend {
                                                                opacity: 0.45;
                                                            }
                                                        </style>
                                                    </foreignObject>
                                                    <g id="SvgjsG3870" class="apexcharts-inner apexcharts-graphical"
                                                        transform="translate(0, 0)">
                                                        <defs id="SvgjsDefs3869"></defs>
                                                        <g id="SvgjsG3885" class="apexcharts-pie">
                                                            <g id="SvgjsG3886" transform="translate(0, 0) scale(1)">
                                                                <circle id="SvgjsCircle3887" r="77.87317073170732"
                                                                    cx="185" cy="131"
                                                                    fill="transparent"></circle>
                                                                <g id="SvgjsG3888" class="apexcharts-slices">
                                                                    <g id="SvgjsG3889"
                                                                        class="apexcharts-series apexcharts-pie-series"
                                                                        seriesName="Desktop" rel="1"
                                                                        data:realIndex="0">
                                                                        <path id="SvgjsPath3890"
                                                                            d="M 185 11.195121951219505 A 119.8048780487805 119.8048780487805 0 0 1 288.7540678875406 190.90243902439025 L 252.44014412690137 169.93658536585366 A 77.87317073170732 77.87317073170732 0 0 0 185 53.12682926829268 L 185 11.195121951219505 z "
                                                                            fill="rgba(54,65,245,1)"
                                                                            fill-opacity="1" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-pie-area apexcharts-donut-slice-0"
                                                                            index="0" j="0" data:angle="120"
                                                                            data:startAngle="0" data:strokeWidth="0"
                                                                            data:value="45"
                                                                            data:pathOrig="M 185 11.195121951219505 A 119.8048780487805 119.8048780487805 0 0 1 288.7540678875406 190.90243902439025 L 252.44014412690137 169.93658536585366 A 77.87317073170732 77.87317073170732 0 0 0 185 53.12682926829268 L 185 11.195121951219505 z ">
                                                                        </path>
                                                                    </g>
                                                                    <g id="SvgjsG3891"
                                                                        class="apexcharts-series apexcharts-pie-series"
                                                                        seriesName="Mobile" rel="2"
                                                                        data:realIndex="1">
                                                                        <path id="SvgjsPath3892"
                                                                            d="M 288.7540678875406 190.90243902439025 A 119.8048780487805 119.8048780487805 0 0 1 74.99323129278281 83.54771193208924 L 113.49560034030883 100.15601275585801 A 77.87317073170732 77.87317073170732 0 0 0 252.44014412690137 169.93658536585366 L 288.7540678875406 190.90243902439025 z "
                                                                            fill="rgba(117,146,255,1)"
                                                                            fill-opacity="1" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-pie-area apexcharts-donut-slice-1"
                                                                            index="0" j="1"
                                                                            data:angle="173.33333333333337"
                                                                            data:startAngle="120"
                                                                            data:strokeWidth="0" data:value="65"
                                                                            data:pathOrig="M 288.7540678875406 190.90243902439025 A 119.8048780487805 119.8048780487805 0 0 1 74.99323129278281 83.54771193208924 L 113.49560034030883 100.15601275585801 A 77.87317073170732 77.87317073170732 0 0 0 252.44014412690137 169.93658536585366 L 288.7540678875406 190.90243902439025 z ">
                                                                        </path>
                                                                    </g>
                                                                    <g id="SvgjsG3893"
                                                                        class="apexcharts-series apexcharts-pie-series"
                                                                        seriesName="Tablet" rel="3"
                                                                        data:realIndex="2">
                                                                        <path id="SvgjsPath3894"
                                                                            d="M 74.99323129278281 83.54771193208924 A 119.8048780487805 119.8048780487805 0 0 1 184.9790901042871 11.19512377595214 L 184.98640856778664 53.126830454368886 A 77.87317073170732 77.87317073170732 0 0 0 113.49560034030883 100.15601275585801 L 74.99323129278281 83.54771193208924 z "
                                                                            fill="rgba(221,233,255,1)"
                                                                            fill-opacity="1" stroke-opacity="1"
                                                                            stroke-linecap="butt" stroke-width="0"
                                                                            stroke-dasharray="0"
                                                                            class="apexcharts-pie-area apexcharts-donut-slice-2"
                                                                            index="0" j="2"
                                                                            data:angle="66.66666666666669"
                                                                            data:startAngle="293.33333333333337"
                                                                            data:strokeWidth="0" data:value="25"
                                                                            data:pathOrig="M 74.99323129278281 83.54771193208924 A 119.8048780487805 119.8048780487805 0 0 1 184.9790901042871 11.19512377595214 L 184.98640856778664 53.126830454368886 A 77.87317073170732 77.87317073170732 0 0 0 113.49560034030883 100.15601275585801 L 74.99323129278281 83.54771193208924 z ">
                                                                        </path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                            <g id="SvgjsG3883" class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)"><text
                                                                    id="SvgjsText3895"
                                                                    font-family="Outfit, sans-serif" x="185" y="121"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="16px" font-weight="600"
                                                                    fill="#3641f5"
                                                                    class="apexcharts-text apexcharts-datalabel-label"
                                                                    style="font-family: Outfit, sans-serif;"></text><text
                                                                    id="SvgjsText3896"
                                                                    font-family="Outfit, sans-serif" x="185" y="147"
                                                                    text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="20px" font-weight="400"
                                                                    fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                                    style="font-family: Outfit, sans-serif;"></text>
                                                            </g>
                                                        </g>
                                                        <line id="SvgjsLine3897" x1="0" y1="0"
                                                            x2="370" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="1"
                                                            stroke-linecap="butt" class="apexcharts-ycrosshairs">
                                                        </line>
                                                        <line id="SvgjsLine3898" x1="0" y1="0"
                                                            x2="370" y2="0" stroke-dasharray="0"
                                                            stroke-width="0" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                    </g>
                                                    <g id="SvgjsG3884" class="apexcharts-datalabels-group"
                                                        transform="translate(0, 0) scale(1)"></g>
                                                </svg></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====== Chart Seven End -->
                            </div>

                            <div class="col-span-12 xl:col-span-5">
                                <!-- ====== Map One Start -->
                                <div
                                    class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] sm:p-6">
                                    <div class="flex justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                                Customers Demographic
                                            </h3>
                                            <p class="mt-1 text-theme-sm text-gray-500 dark:text-gray-400">
                                                Number of customer based on country
                                            </p>
                                        </div>

                                        <div x-data="{ openDropDown: false }" class="relative h-fit">
                                            <button @click="openDropDown = !openDropDown"
                                                :class="openDropDown ? 'text-gray-700 dark:text-white' :
                                                    'text-gray-400 hover:text-gray-700 dark:hover:text-white'"
                                                class="text-gray-400 hover:text-gray-700 dark:hover:text-white">
                                                <svg class="fill-current" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.2441 6C10.2441 5.0335 11.0276 4.25 11.9941 4.25H12.0041C12.9706 4.25 13.7541 5.0335 13.7541 6C13.7541 6.9665 12.9706 7.75 12.0041 7.75H11.9941C11.0276 7.75 10.2441 6.9665 10.2441 6ZM10.2441 18C10.2441 17.0335 11.0276 16.25 11.9941 16.25H12.0041C12.9706 16.25 13.7541 17.0335 13.7541 18C13.7541 18.9665 12.9706 19.75 12.0041 19.75H11.9941C11.0276 19.75 10.2441 18.9665 10.2441 18ZM11.9941 10.25C11.0276 10.25 10.2441 11.0335 10.2441 12C10.2441 12.9665 11.0276 13.75 11.9941 13.75H12.0041C12.9706 13.75 13.7541 12.9665 13.7541 12C13.7541 11.0335 12.9706 10.25 12.0041 10.25H11.9941Z"
                                                        fill=""></path>
                                                </svg>
                                            </button>
                                            <div x-show="openDropDown" @click.outside="openDropDown = false"
                                                class="absolute right-0 top-full z-40 w-40 space-y-1 rounded-2xl border border-gray-200 bg-white p-2 shadow-theme-lg dark:border-gray-800 dark:bg-gray-dark"
                                                style="display: none;">
                                                <button
                                                    class="flex w-full rounded-lg px-3 py-2 text-left text-theme-xs font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                    View More
                                                </button>
                                                <button
                                                    class="flex w-full rounded-lg px-3 py-2 text-left text-theme-xs font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-300">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="border-gary-200 my-6 overflow-hidden rounded-2xl border bg-gray-50 px-4 py-6 dark:border-gray-800 dark:bg-gray-900 sm:px-6">
                                        <div id="mapOne"
                                            class="mapOne map-btn -mx-4 -my-6 h-[212px] w-[252px] 2xsm:w-[307px] xsm:w-[358px] sm:-mx-6 md:w-[668px] lg:w-[634px] xl:w-[393px] 2xl:w-[554px] jvm-container"
                                            style="background-color: transparent;"><svg width="380"
                                                height="150">
                                                <defs></defs>
                                                <g id="jvm-regions-group"
                                                    transform="scale(0.3403627230722539) translate(108.22799360923504, 0)">
                                                    <path
                                                        d="M651.84,230.21l-0.6,-2.0l-1.36,-1.71l-2.31,-0.11l-0.41,0.48l0.2,0.94l-0.53,0.99l-0.72,-0.36l-0.68,0.35l-1.2,-0.36l-0.37,-2.0l-0.81,-1.86l0.39,-1.46l-0.22,-0.47l-1.14,-0.53l0.29,-0.5l1.48,-0.94l0.03,-0.65l-1.55,-1.22l0.55,-1.14l1.61,0.94l1.04,0.15l0.18,1.54l0.34,0.35l5.64,0.63l-0.84,1.64l-1.22,0.34l-0.77,1.51l0.07,0.47l1.37,1.37l0.67,-0.19l0.42,-1.39l1.21,3.84l-0.03,1.21l-0.33,-0.15l-0.4,0.28Z"
                                                        data-code="BD" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M429.29,144.05l1.91,0.24l2.1,-0.63l2.63,1.99l-0.21,1.66l-0.69,0.4l-0.18,1.2l-1.66,-1.13l-1.39,0.15l-2.73,-2.7l-1.17,-0.18l-0.16,-0.52l1.54,-0.5Z"
                                                        data-code="BE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M421.42,247.64l-0.11,0.95l0.34,1.16l1.4,1.71l0.07,1.1l0.32,0.37l2.55,0.51l-0.04,1.28l-0.38,0.53l-1.07,0.21l-0.72,1.18l-0.63,0.21l-3.22,-0.25l-0.94,0.39l-5.4,-0.05l-0.39,0.38l0.16,2.73l-1.23,-0.43l-1.17,0.1l-0.89,0.57l-2.27,-1.72l-0.13,-1.11l0.61,-0.96l0.02,-0.93l1.87,-1.98l0.44,-1.81l0.43,-0.39l1.28,0.26l1.05,-0.52l0.47,-0.73l1.84,-1.09l0.55,-0.83l2.2,-1.0l1.15,-0.3l0.72,0.45l1.13,-0.01Z"
                                                        data-code="BF" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M491.65,168.18l-0.86,0.88l-0.91,2.17l0.48,1.34l-1.6,-0.24l-2.55,0.95l-0.28,1.51l-1.8,0.22l-2.0,-1.0l-1.92,0.79l-1.42,-0.07l-0.15,-1.63l-1.05,-0.97l0.0,-0.8l1.2,-1.57l0.01,-0.56l-1.14,-1.23l-0.05,-0.94l0.88,0.97l0.88,-0.2l1.91,0.47l3.68,0.16l1.42,-0.81l2.72,-0.66l2.55,1.24Z"
                                                        data-code="BG" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M463.49,163.65l2.1,0.5l1.72,-0.03l1.52,0.68l-0.36,0.78l0.08,0.45l1.04,1.02l-0.25,0.98l-1.81,1.15l-0.38,1.38l-1.67,-0.87l-0.89,-1.2l-2.11,-1.83l-1.63,-2.22l0.23,-0.57l0.48,0.38l0.55,-0.06l0.43,-0.51l0.94,-0.06Z"
                                                        data-code="BA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M707.48,273.58l0.68,-0.65l1.41,-0.91l-0.15,1.63l-0.81,-0.05l-0.61,0.58l-0.53,-0.6Z"
                                                        data-code="BN" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M263.83,340.69l-3.09,-0.23l-0.38,0.23l-0.7,1.52l-1.31,-1.53l-3.28,-0.64l-2.37,2.4l-1.31,0.26l-0.88,-3.26l-1.3,-2.86l0.74,-2.37l-0.13,-0.43l-1.2,-1.01l-0.37,-1.89l-1.08,-1.55l1.45,-2.56l-0.96,-2.33l0.47,-1.06l-0.34,-0.73l0.91,-1.32l0.16,-3.84l0.5,-1.18l-1.81,-3.41l2.46,0.07l0.8,-0.85l3.4,-1.91l2.66,-0.35l-0.19,1.38l0.3,1.07l-0.05,1.97l2.72,2.27l2.88,0.49l0.89,0.86l1.79,0.58l0.98,0.7l1.71,0.05l1.17,0.61l0.6,2.7l-0.7,0.54l0.96,2.99l0.37,0.28l4.3,0.1l-0.25,1.2l0.27,1.02l1.43,0.9l0.5,1.35l-0.41,1.86l-0.65,1.08l0.12,1.35l-2.69,-1.65l-2.4,-0.03l-4.36,0.76l-1.49,2.5l-0.11,1.52l-0.75,2.37Z"
                                                        data-code="BO" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M781.12,166.87l1.81,0.68l1.62,-0.97l0.39,2.42l-3.35,0.75l-2.23,2.88l-3.63,-1.9l-0.56,0.2l-1.26,3.05l-2.16,0.03l-0.29,-2.51l1.08,-2.03l2.45,-0.16l0.37,-0.33l1.25,-5.94l2.47,2.71l2.03,1.12ZM773.56,187.34l-0.91,2.22l0.37,1.52l-1.14,1.75l-3.02,1.26l-4.58,0.27l-3.34,3.01l-1.25,-0.8l-0.09,-1.9l-0.46,-0.38l-4.35,0.62l-3.0,1.32l-2.85,0.05l-0.37,0.27l0.13,0.44l2.32,1.89l-1.54,4.34l-1.26,0.9l-0.79,-0.7l0.56,-2.27l-0.21,-0.45l-1.47,-0.75l-0.74,-1.4l2.12,-0.84l1.26,-1.7l2.45,-1.42l1.83,-1.91l4.78,-0.81l2.6,0.57l0.44,-0.21l2.39,-4.66l1.29,1.06l0.5,0.01l5.1,-4.02l1.69,-3.73l-0.38,-3.4l0.9,-1.61l2.14,-0.44l1.23,3.72l-0.07,2.18l-2.23,2.84l-0.04,3.16ZM757.78,196.26l0.19,0.56l-1.01,1.21l-1.16,-0.68l-1.28,0.65l-0.69,1.45l-1.02,-0.5l0.01,-0.93l1.14,-1.38l1.57,0.14l0.85,-0.98l1.4,0.46Z"
                                                        data-code="JP" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M495.45,295.49l-1.08,-2.99l1.14,-0.11l0.64,-1.19l0.76,0.09l0.65,1.83l-2.1,2.36Z"
                                                        data-code="BI" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M429.57,255.75l-0.05,0.8l0.5,1.34l-0.42,0.86l0.17,0.79l-1.81,2.12l-0.57,1.76l-0.08,5.42l-1.41,0.2l-0.48,-1.36l0.11,-5.71l-0.52,-0.7l-0.2,-1.35l-1.48,-1.48l0.21,-0.9l0.89,-0.43l0.42,-0.92l1.27,-0.36l1.22,-1.34l0.61,-0.0l1.62,1.24Z"
                                                        data-code="BJ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M650.32,213.86l0.84,0.71l-0.12,1.1l-3.76,-0.11l-1.57,0.4l-1.93,-0.87l1.48,-1.96l1.13,-0.57l1.63,0.57l1.33,0.08l0.99,0.65Z"
                                                        data-code="BT" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M228.38,239.28l-0.8,0.4l-2.26,-1.06l0.84,-0.23l2.14,0.3l1.17,0.56l-1.08,0.03Z"
                                                        data-code="JM" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M483.92,330.07l2.27,4.01l2.83,2.86l0.96,0.31l0.78,2.43l2.13,0.61l1.02,0.76l-3.0,1.64l-2.32,2.02l-1.54,2.69l-1.52,0.45l-0.64,1.94l-1.34,0.52l-1.85,-0.12l-1.21,-0.74l-1.35,-0.3l-1.22,0.62l-0.75,1.37l-2.31,1.9l-1.4,0.21l-0.35,-0.59l0.16,-1.75l-1.48,-2.54l-0.62,-0.43l-0.0,-7.1l2.08,-0.08l0.39,-0.4l0.07,-8.9l5.19,-0.93l0.8,0.89l0.51,0.07l1.5,-0.95l2.21,-0.49Z"
                                                        data-code="BW" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M259.98,275.05l3.24,0.7l0.65,-0.53l4.55,-1.32l1.08,-1.06l-0.02,-0.63l0.55,-0.05l0.28,0.28l-0.26,0.87l0.22,0.48l0.73,0.32l0.4,0.81l-0.62,0.86l-0.4,2.13l0.82,2.56l1.69,1.43l1.43,0.2l3.17,-1.68l3.18,0.3l0.65,-0.75l-0.27,-0.92l1.9,-0.09l2.39,0.99l1.06,-0.61l0.84,0.78l1.2,-0.18l1.18,-1.06l0.84,-1.94l1.36,-2.11l0.37,-0.05l1.89,5.45l1.33,0.59l0.05,1.28l-1.77,1.94l0.02,0.56l1.02,0.87l4.07,0.36l0.08,2.16l0.66,0.29l1.74,-1.5l6.97,2.32l1.02,1.22l-0.35,1.18l0.49,0.5l2.81,-0.74l4.77,1.3l3.75,-0.08l3.57,2.0l3.29,2.86l1.93,0.72l2.12,0.12l0.71,0.62l1.21,4.51l-0.95,3.98l-4.72,5.06l-1.64,2.92l-1.72,2.05l-0.8,0.3l-0.72,2.03l0.18,4.75l-0.94,5.53l-0.81,1.13l-0.43,3.36l-2.55,3.5l-0.4,2.51l-1.86,1.04l-0.67,1.53l-2.54,0.01l-3.94,1.01l-1.83,1.2l-2.87,0.82l-3.03,2.19l-2.2,2.83l-0.36,2.0l0.4,1.58l-0.44,2.6l-0.51,1.2l-1.77,1.54l-2.75,4.78l-3.83,3.42l-1.24,2.74l-1.18,1.15l-0.36,-0.83l0.95,-1.14l0.01,-0.5l-1.52,-1.97l-4.56,-3.32l-1.03,-0.0l-2.38,-2.02l-0.81,-0.0l5.34,-5.45l3.77,-2.58l0.22,-2.46l-1.35,-1.81l-0.91,0.07l0.58,-2.33l0.01,-1.54l-1.11,-0.83l-1.75,0.3l-0.44,-3.11l-0.52,-0.95l-1.88,-0.88l-1.24,0.47l-2.17,-0.41l0.15,-3.21l-0.62,-1.34l0.66,-0.73l-0.22,-1.34l0.66,-1.13l0.44,-2.04l-0.61,-1.83l-1.4,-0.86l-0.2,-0.75l0.34,-1.39l-0.38,-0.5l-4.52,-0.1l-0.72,-2.22l0.59,-0.42l-0.03,-1.1l-0.5,-0.87l-0.32,-1.7l-1.45,-0.76l-1.63,-0.02l-1.05,-0.72l-1.6,-0.48l-1.13,-0.99l-2.69,-0.4l-2.47,-2.06l0.13,-4.35l-0.45,-0.45l-3.46,0.5l-3.44,1.94l-0.6,0.74l-2.9,-0.17l-1.47,0.42l-0.72,-0.18l0.15,-3.52l-0.63,-0.34l-1.94,1.41l-1.87,-0.06l-0.83,-1.18l-1.37,-0.26l0.21,-1.01l-1.35,-1.49l-0.88,-1.91l0.56,-0.6l-0.0,-0.81l1.29,-0.62l0.22,-0.43l-0.22,-1.19l0.61,-0.91l0.15,-0.99l2.65,-1.58l1.99,-0.47l0.42,-0.36l2.06,0.11l0.42,-0.33l1.19,-8.0l-0.41,-1.56l-1.1,-1.0l0.01,-1.33l1.91,-0.42l0.08,-0.96l-0.33,-0.43l-1.14,-0.2l-0.02,-0.83l4.47,0.05l0.82,-0.67l0.82,1.81l0.8,0.07l1.15,1.1l2.26,-0.05l0.71,-0.83l2.78,-0.96l0.48,-1.13l1.6,-0.64l0.24,-0.47l-0.48,-0.82l-1.83,-0.19l-0.36,-3.22Z"
                                                        data-code="BR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M226.4,223.87l-0.48,-1.15l-0.84,-0.75l0.36,-1.11l0.95,1.95l0.01,1.06ZM225.56,216.43l-1.87,0.29l-0.04,-0.22l0.74,-0.14l1.17,0.06Z"
                                                        data-code="BS" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M493.84,128.32l0.29,0.7l0.49,0.23l1.19,-0.38l2.09,0.72l0.19,1.26l-0.45,1.24l1.57,2.26l0.89,0.59l0.17,0.81l1.58,0.56l0.4,0.5l-0.53,0.41l-1.87,-0.11l-0.73,0.38l-0.13,0.52l1.04,2.74l-1.91,0.26l-0.89,0.99l-0.11,1.18l-2.73,-0.04l-0.53,-0.62l-0.52,-0.08l-0.75,0.46l-0.91,-0.42l-1.92,-0.07l-2.75,-0.79l-2.6,-0.28l-2.0,0.07l-1.5,0.92l-0.67,0.07l-0.08,-1.22l-0.59,-1.19l1.36,-0.88l0.01,-1.35l-0.7,-1.41l-0.07,-1.0l2.16,-0.02l2.72,-1.3l0.75,-2.04l1.91,-1.04l0.2,-0.41l-0.19,-1.25l3.8,-1.78l2.3,0.77Z"
                                                        data-code="BY" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M198.03,244.38l0.1,-4.49l0.69,-0.06l0.74,-1.3l0.34,0.28l-0.4,1.3l0.17,0.58l-0.34,2.25l-1.3,1.42Z"
                                                        data-code="BZ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M491.55,115.25l2.55,-1.85l-0.01,-0.65l-2.2,-1.5l7.32,-6.76l1.03,-2.11l-0.13,-0.49l-3.46,-2.52l0.86,-2.7l-2.11,-2.81l1.56,-3.67l-2.77,-4.52l2.15,-2.99l-0.08,-0.55l-3.65,-2.73l0.3,-2.54l1.81,-0.37l4.26,-1.77l2.42,-1.45l4.06,2.61l6.79,1.04l9.34,4.85l1.78,1.88l0.14,2.46l-2.55,2.02l-3.9,1.06l-11.07,-3.14l-2.06,0.53l-0.13,0.7l3.94,2.94l0.31,5.86l0.26,0.36l5.14,2.24l0.58,-0.29l0.32,-1.94l-1.35,-1.78l1.13,-1.09l6.13,2.42l2.11,-0.98l0.18,-0.56l-1.51,-2.67l5.41,-3.76l2.07,0.22l2.26,1.41l0.57,-0.16l1.46,-2.87l-0.05,-0.44l-1.92,-2.32l1.12,-2.32l-1.32,-2.27l5.87,1.16l1.04,1.75l-2.59,0.43l-0.33,0.4l0.02,2.36l2.46,1.83l3.87,-0.91l0.86,-2.8l13.69,-5.65l0.99,0.11l-1.92,2.06l0.23,0.67l3.11,0.45l2.0,-1.48l4.56,-0.12l3.64,-1.73l2.65,2.44l0.56,-0.01l2.85,-2.88l-0.01,-0.57l-2.35,-2.29l0.9,-1.01l7.14,1.3l3.41,1.36l9.05,4.97l0.51,-0.11l1.67,-2.27l-0.05,-0.53l-2.43,-2.21l-0.06,-0.78l-0.34,-0.36l-2.52,-0.36l0.64,-1.93l-1.32,-3.46l-0.06,-1.21l4.48,-4.06l1.69,-4.29l1.6,-0.81l6.23,1.18l0.44,2.21l-2.29,3.64l0.06,0.5l1.47,1.39l0.76,3.0l-0.56,6.03l2.69,2.82l-0.96,2.57l-4.86,5.95l0.23,0.64l2.86,0.61l0.42,-0.17l0.93,-1.4l2.64,-1.03l0.87,-2.24l2.09,-1.96l0.07,-0.5l-1.36,-2.28l1.09,-2.69l-0.32,-0.55l-2.47,-0.33l-0.5,-2.06l1.94,-4.38l-0.06,-0.42l-2.96,-3.4l4.12,-2.88l0.16,-0.4l-0.51,-2.93l0.54,-0.05l1.13,2.25l-0.96,4.35l0.27,0.47l2.68,0.84l0.5,-0.51l-1.02,-2.99l3.79,-1.66l5.01,-0.24l4.53,2.61l0.48,-0.06l0.07,-0.48l-2.18,-3.82l-0.23,-4.67l3.98,-0.9l5.97,0.21l5.49,-0.64l0.27,-0.65l-1.83,-2.31l2.56,-2.9l2.87,-0.17l4.8,-2.47l6.54,-0.67l1.03,-1.42l6.25,-0.45l2.32,1.11l5.53,-2.7l4.5,0.08l0.39,-0.28l0.66,-2.15l2.26,-2.12l5.69,-2.11l3.21,1.29l-2.46,0.94l-0.25,0.42l0.34,0.35l5.41,0.77l0.61,2.33l0.58,0.25l2.2,-1.22l7.13,0.07l5.51,2.47l1.79,1.72l-0.53,2.24l-9.16,4.15l-1.97,1.52l0.16,0.71l6.77,1.91l2.16,-0.78l1.13,2.74l0.67,0.11l1.01,-1.15l3.81,-0.73l7.7,0.77l0.54,1.99l0.36,0.29l10.47,0.71l0.43,-0.38l0.13,-3.23l4.87,0.78l3.95,-0.02l3.83,2.4l1.03,2.71l-1.35,1.79l0.02,0.5l3.15,3.64l4.07,1.96l0.53,-0.18l2.23,-4.47l3.95,1.93l4.16,-1.21l4.73,1.39l2.05,-1.26l3.94,0.62l0.43,-0.55l-1.68,-4.02l2.89,-1.8l22.31,3.03l2.16,2.75l6.55,3.51l10.29,-0.81l4.82,0.73l1.85,1.66l-0.29,3.08l0.25,0.41l3.08,1.26l3.56,-0.88l4.35,-0.11l4.8,0.87l4.57,-0.47l4.23,3.79l0.43,0.07l3.1,-1.4l0.16,-0.6l-1.88,-2.62l0.85,-1.52l7.71,1.21l5.22,-0.26l7.09,2.09l9.59,5.22l6.35,4.11l-0.2,2.38l1.88,1.41l0.6,-0.42l-0.48,-2.53l6.15,0.57l4.4,3.51l-1.97,1.43l-4.0,0.41l-0.36,0.39l-0.06,3.79l-0.74,0.62l-2.07,-0.11l-1.91,-1.39l-3.14,-1.11l-0.78,-1.85l-2.72,-0.68l-2.63,0.49l-1.04,-1.1l0.46,-1.31l-0.5,-0.51l-3.0,0.98l-0.22,0.58l0.99,1.7l-1.21,1.48l-3.04,1.68l-3.12,-0.28l-0.4,0.23l0.09,0.46l2.2,2.09l1.46,3.2l1.15,1.1l0.24,1.33l-0.42,0.67l-4.63,-0.77l-6.96,2.9l-2.19,0.44l-7.6,5.06l-0.84,1.45l-3.61,-2.37l-6.24,2.82l-0.94,-1.15l-0.53,-0.08l-2.28,1.52l-3.2,-0.49l-0.44,0.27l-0.78,2.37l-3.05,3.78l0.09,1.47l0.29,0.36l2.54,0.72l-0.29,4.53l-1.97,0.11l-0.35,0.26l-1.07,2.94l0.8,1.45l-3.91,1.58l-1.05,3.95l-3.48,0.77l-0.3,0.3l-0.72,3.29l-3.09,2.65l-0.7,-1.74l-2.44,-12.44l1.16,-4.71l2.04,-2.06l0.22,-1.64l3.8,-0.86l4.46,-4.61l4.28,-3.81l4.48,-3.01l2.17,-5.63l-0.42,-0.54l-3.04,0.33l-1.77,3.31l-5.86,3.86l-1.86,-4.25l-0.45,-0.23l-6.46,1.3l-6.47,6.44l-0.01,0.55l1.58,1.74l-8.24,1.17l0.15,-2.2l-0.34,-0.42l-3.89,-0.56l-3.25,1.81l-7.62,-0.62l-8.45,1.19l-17.71,15.41l0.22,0.7l3.74,0.41l1.36,2.17l2.43,0.76l1.88,-1.68l2.4,0.2l3.4,3.54l0.08,2.6l-1.95,3.42l-0.21,3.9l-1.1,5.06l-3.71,4.54l-0.87,2.21l-8.29,8.89l-3.19,1.7l-1.32,0.03l-1.45,-1.36l-0.49,-0.04l-2.27,1.5l0.41,-3.65l-0.59,-2.47l1.75,-0.89l2.91,0.53l0.42,-0.2l1.68,-3.03l0.87,-3.46l0.97,-1.18l1.32,-2.88l-0.45,-0.56l-4.14,0.95l-2.19,1.25l-3.41,-0.0l-1.06,-2.93l-2.97,-2.3l-4.28,-1.06l-1.75,-5.07l-2.66,-5.01l-2.29,-1.29l-3.75,-1.01l-3.44,0.08l-3.18,0.62l-2.24,1.77l0.05,0.66l1.18,0.69l0.02,1.43l-1.33,1.05l-2.26,3.51l-0.04,1.43l-3.16,1.84l-2.82,-1.16l-3.01,0.23l-1.35,-1.07l-1.5,-0.35l-3.9,2.31l-3.22,0.52l-2.27,0.79l-3.05,-0.51l-2.21,0.03l-1.48,-1.6l-2.6,-1.63l-2.63,-0.43l-5.46,1.01l-3.23,-1.25l-0.72,-2.57l-5.2,-1.24l-2.75,-1.36l-0.5,0.12l-2.59,3.45l0.84,2.1l-2.06,1.93l-3.41,-0.77l-2.42,-0.12l-1.83,-1.54l-2.53,-0.05l-2.42,-0.98l-3.86,1.57l-4.72,2.78l-3.3,0.75l-1.55,-1.92l-3.0,0.41l-1.11,-1.33l-1.62,-0.59l-1.31,-1.94l-1.38,-0.6l-3.7,0.79l-3.31,-1.83l-0.51,0.11l-0.99,1.29l-5.29,-8.05l-2.96,-2.48l0.65,-0.77l0.01,-0.51l-0.5,-0.11l-6.2,3.21l-1.84,0.15l0.15,-1.39l-0.26,-0.42l-3.22,-1.17l-2.46,0.7l-0.69,-3.16l-0.32,-0.31l-4.5,-0.75l-2.47,1.47l-6.19,1.27l-1.29,0.86l-9.51,1.3l-1.15,1.17l-0.03,0.53l1.47,1.9l-1.89,0.69l-0.22,0.56l0.31,0.6l-2.11,1.44l0.03,0.68l3.75,2.12l-0.39,0.98l-3.23,-0.13l-0.86,0.86l-3.09,-1.59l-3.97,0.07l-2.66,1.35l-8.32,-3.56l-4.07,0.06l-5.39,3.68l-0.39,2.0l-2.03,-1.5l-0.59,0.13l-2.0,3.59l0.57,0.93l-1.28,2.16l0.06,0.48l2.13,2.17l1.95,0.04l1.37,1.82l-0.23,1.46l0.25,0.43l0.83,0.33l-0.8,1.31l-2.49,0.62l-2.49,3.2l0.0,0.49l2.17,2.78l-0.15,2.18l2.5,3.24l-1.58,1.59l-0.7,-0.13l-1.63,-1.72l-2.29,-0.84l-0.94,-1.31l-2.34,-0.63l-1.48,0.4l-0.43,-0.47l-3.51,-1.48l-5.76,-1.01l-0.45,0.19l-2.89,-2.34l-2.9,-1.2l-1.53,-1.29l1.29,-0.43l2.08,-2.61l-0.05,-0.55l-0.89,-0.79l3.05,-1.06l0.27,-0.42l-0.07,-0.69l-0.49,-0.35l-1.73,0.39l0.04,-0.68l1.04,-0.72l2.66,-0.48l0.4,-1.32l-0.5,-1.6l0.92,-1.54l0.03,-1.17l-0.29,-0.37l-3.69,-1.06l-1.41,0.02l-1.42,-1.41l-2.19,0.38l-2.77,-1.01l-0.03,-0.59l-0.89,-1.43l-2.0,-0.32l-0.11,-0.54l0.49,-0.53l0.01,-0.53l-1.6,-1.9l-3.58,0.02l-0.88,0.73l-0.46,-0.07l-1.0,-2.79l2.22,-0.02l0.97,-0.74l0.07,-0.57l-0.9,-1.04l-1.35,-0.48l-0.11,-0.7l-0.95,-0.58l-1.38,-1.99l0.46,-0.98l-0.51,-1.96l-2.45,-0.84l-1.21,0.3l-0.46,-0.76l-2.46,-0.83l-0.72,-1.87l-0.21,-1.69l-0.99,-0.85l0.85,-1.17l-0.7,-3.21l1.66,-1.97l-0.16,-0.79ZM749.2,170.72l-0.6,0.4l-0.13,0.16l-0.01,-0.51l0.74,-0.05ZM874.85,67.94l-5.63,0.48l-0.26,-0.84l3.15,-1.89l1.94,0.01l3.19,1.16l-2.39,1.09ZM797.39,48.49l-2.0,1.36l-3.8,-0.42l-4.25,-1.8l0.35,-0.97l9.69,1.83ZM783.67,46.12l-1.63,3.09l-8.98,-0.13l-4.09,1.14l-4.54,-2.97l1.16,-3.01l3.05,-0.89l6.5,0.22l8.54,2.56ZM778.2,134.98l-0.56,-0.9l0.27,-0.12l0.29,1.01ZM778.34,135.48l0.94,3.53l-0.05,3.38l1.05,3.39l2.18,5.0l-2.89,-0.83l-0.49,0.26l-1.54,4.65l2.42,3.5l-0.04,1.13l-1.24,-1.24l-0.61,0.06l-1.09,1.61l-0.28,-1.61l0.27,-3.1l-0.28,-3.4l0.58,-2.47l0.11,-4.39l-1.46,-3.36l0.21,-4.32l2.15,-1.46l0.07,-0.34ZM771.95,56.61l1.76,-1.42l2.89,-0.42l3.28,1.71l0.14,0.6l-3.27,0.03l-4.81,-0.5ZM683.76,31.09l-13.01,1.93l4.03,-6.35l1.82,-0.56l1.73,0.34l5.99,2.98l-0.56,1.66ZM670.85,27.93l-5.08,0.64l-6.86,-1.57l-3.99,-2.05l-2.1,-4.16l-2.6,-0.87l5.72,-3.5l5.2,-1.28l4.69,2.85l5.59,5.4l-0.56,4.53ZM564.15,68.94l-0.64,0.17l-7.85,-0.57l-0.86,-2.04l-4.28,-1.17l-0.28,-1.94l2.27,-0.89l0.25,-0.39l-0.08,-2.38l4.81,-3.97l-0.15,-0.7l-1.47,-0.38l5.3,-3.81l0.15,-0.44l-0.58,-1.94l5.28,-2.51l8.21,-3.27l8.28,-0.96l4.35,-1.94l4.6,-0.64l1.36,1.61l-1.34,1.28l-16.43,4.94l-7.97,4.88l-7.74,9.63l0.66,4.14l4.16,3.27ZM548.81,18.48l-5.5,1.18l-0.58,1.02l-2.59,0.84l-2.13,-1.07l1.12,-1.42l-0.3,-0.65l-2.33,-0.07l1.68,-0.36l3.47,-0.06l0.42,1.29l0.66,0.16l1.38,-1.34l2.15,-0.88l2.94,1.01l-0.39,0.36ZM477.37,133.15l-4.08,0.05l-2.56,-0.32l0.33,-0.87l3.17,-1.03l3.24,0.96l-0.09,1.23Z"
                                                        data-code="RU" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M497.0,288.25l0.71,1.01l-0.11,1.09l-1.63,0.03l-1.04,1.39l-0.83,-0.11l0.51,-1.2l0.08,-1.34l0.42,-0.41l0.7,0.14l1.19,-0.61Z"
                                                        data-code="RW" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M469.4,163.99l0.42,-0.5l-0.01,-0.52l-1.15,-1.63l1.43,-0.62l1.33,0.12l1.17,1.06l0.46,1.13l1.34,0.64l0.35,1.35l1.46,0.9l0.76,-0.29l0.2,0.69l-0.48,0.78l0.22,1.12l1.05,1.22l-0.77,0.8l-0.37,1.52l-1.21,0.08l0.24,-0.64l-0.39,-0.54l-2.08,-1.64l-0.9,0.05l-0.48,0.94l-2.12,-1.37l0.53,-1.6l-1.11,-1.37l0.51,-1.1l-0.41,-0.57Z"
                                                        data-code="RS" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M486.93,129.3l0.17,1.12l-1.81,0.98l-0.72,2.02l-2.47,1.18l-2.1,-0.02l-0.73,-1.05l-1.06,-0.3l-0.09,-1.87l-3.56,-1.13l-0.43,-2.36l2.48,-0.94l4.12,0.22l2.25,-0.31l0.52,0.69l1.24,0.21l2.19,1.56Z"
                                                        data-code="LT" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path d="M436.08,149.45l-0.48,-0.07l0.3,-1.28l0.27,0.4l-0.09,0.96Z"
                                                        data-code="LU" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M399.36,265.97l0.18,1.54l-0.48,0.99l0.08,0.47l2.47,1.8l-0.33,2.8l-2.65,-1.13l-5.78,-4.61l0.58,-1.32l2.1,-2.33l0.86,-0.22l0.77,1.14l-0.14,0.85l0.59,0.87l1.0,0.14l0.76,-0.99Z"
                                                        data-code="LR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M487.53,154.23l0.6,0.24l2.87,3.98l-0.17,2.69l0.45,1.42l1.32,0.81l1.35,-0.42l0.76,0.36l0.02,0.31l-0.83,0.45l-0.59,-0.22l-0.54,0.3l-0.62,3.3l-1.0,-0.22l-2.07,-1.13l-2.95,0.71l-1.25,0.76l-3.51,-0.15l-1.89,-0.47l-0.87,0.16l-0.82,-1.3l0.29,-0.26l-0.06,-0.64l-1.09,-0.34l-0.56,0.5l-1.05,-0.64l-0.39,-1.39l-1.36,-0.65l-0.35,-1.0l-0.83,-0.75l1.54,-0.54l2.66,-4.21l2.4,-1.24l2.96,0.34l1.48,0.73l0.79,-0.45l1.78,-0.3l0.75,-0.74l0.79,0.0Z"
                                                        data-code="RO" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M386.23,253.6l-0.29,0.84l0.15,0.6l-2.21,0.59l-0.86,0.96l-1.04,-0.83l-1.09,-0.23l-0.54,-1.06l-0.66,-0.49l2.41,-0.48l4.13,0.1Z"
                                                        data-code="GW" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M195.08,249.77l-2.48,-0.37l-1.03,-0.45l-1.14,-0.89l0.3,-0.99l-0.24,-0.68l0.96,-1.66l2.98,-0.01l0.4,-0.37l-0.19,-1.28l-1.67,-1.4l0.51,-0.4l0.0,-1.05l3.85,0.02l-0.21,4.53l0.4,0.43l1.46,0.38l-1.48,0.98l-0.35,0.7l0.12,0.57l-2.2,1.96Z"
                                                        data-code="GT" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M487.07,174.59l-0.59,1.43l-0.37,0.21l-2.84,-0.35l-3.03,0.77l-0.18,0.68l1.28,1.23l-0.61,0.23l-1.14,0.0l-1.2,-1.39l-0.63,0.03l-0.53,1.01l0.56,1.76l1.03,1.19l-0.56,0.38l-0.05,0.62l2.52,2.12l0.02,0.87l-1.78,-0.59l-0.48,0.56l0.5,1.0l-1.07,0.2l-0.3,0.53l0.75,2.01l-0.98,0.02l-1.84,-1.12l-1.37,-4.2l-2.21,-2.95l-0.11,-0.56l1.04,-1.28l0.2,-0.95l0.85,-0.66l0.03,-0.46l1.32,-0.21l1.01,-0.64l1.22,0.05l0.65,-0.56l2.26,-0.0l1.82,-0.75l1.85,1.0l2.28,-0.28l0.35,-0.39l0.01,-0.77l0.34,0.22ZM480.49,192.16l0.58,0.4l-0.68,-0.12l0.11,-0.28ZM482.52,192.82l2.51,0.06l0.24,0.32l-1.99,0.13l-0.77,-0.51Z"
                                                        data-code="GR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path d="M448.79,279.62l0.02,2.22l-4.09,0.0l0.69,-2.27l3.38,0.05Z"
                                                        data-code="GQ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M277.42,270.07l-0.32,1.83l-1.32,0.57l-0.23,0.46l-0.28,2.0l1.11,1.82l0.83,0.19l0.32,1.25l1.13,1.62l-1.21,-0.19l-1.08,0.71l-1.77,0.5l-0.44,0.46l-0.86,-0.09l-1.32,-1.01l-0.77,-2.27l0.36,-1.9l0.68,-1.23l-0.57,-1.17l-0.74,-0.43l0.12,-1.16l-0.9,-0.69l-1.1,0.09l-1.31,-1.48l0.53,-0.72l-0.04,-0.84l1.99,-0.86l0.05,-0.59l-0.71,-0.78l0.14,-0.57l1.66,-1.24l1.36,0.77l1.41,1.49l0.06,1.15l0.37,0.38l0.8,0.05l2.06,1.86Z"
                                                        data-code="GY" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M521.71,168.93l5.29,0.89l4.07,2.01l1.41,-0.44l2.07,0.56l0.68,1.1l1.07,0.55l-0.12,0.59l0.98,1.29l-1.01,-0.13l-1.81,-0.83l-0.94,0.47l-3.23,0.43l-2.29,-1.39l-2.33,0.05l0.21,-0.97l-0.76,-2.26l-1.45,-1.12l-1.43,-0.39l-0.41,-0.42Z"
                                                        data-code="GE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M412.61,118.72l-2.19,3.22l-0.0,0.45l5.13,-0.3l-0.53,2.37l-2.2,3.12l0.29,0.63l2.37,0.21l2.33,4.3l1.76,0.69l2.2,5.12l2.94,0.77l-0.23,1.62l-1.15,0.88l-0.1,0.52l0.82,1.42l-1.86,1.43l-3.3,-0.02l-4.12,0.87l-1.04,-0.58l-0.47,0.06l-1.51,1.41l-2.12,-0.34l-1.86,1.18l-0.6,-0.29l3.19,-3.0l2.16,-0.69l0.28,-0.41l-0.34,-0.36l-3.73,-0.53l-0.4,-0.76l2.2,-0.87l0.17,-0.61l-1.26,-1.67l0.36,-1.7l3.38,0.28l0.43,-0.33l0.37,-1.99l-1.79,-2.49l-3.11,-0.72l-0.38,-0.59l0.79,-1.35l-0.04,-0.46l-0.82,-0.97l-0.61,0.01l-0.68,0.84l-0.1,-2.34l-1.23,-1.88l0.85,-3.47l1.77,-2.68l1.85,0.26l2.17,-0.22ZM406.26,132.86l-1.01,1.77l-1.57,-0.59l-1.16,0.01l0.37,-1.54l-0.39,-1.39l1.45,-0.1l2.3,1.84Z"
                                                        data-code="GB" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M453.24,279.52l-0.08,0.98l0.7,1.29l2.36,0.24l-0.98,2.63l1.18,1.79l0.25,1.78l-0.29,1.52l-0.6,0.93l-1.84,-0.09l-1.23,-1.11l-0.66,0.23l-0.15,0.84l-1.42,0.26l-1.02,0.7l-0.11,0.52l0.77,1.35l-1.34,0.97l-3.94,-4.3l-1.44,-2.45l0.06,-0.6l0.54,-0.81l1.05,-3.46l4.17,-0.07l0.4,-0.4l-0.02,-2.66l2.39,0.21l1.25,-0.27Z"
                                                        data-code="GA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M391.8,254.11l0.47,0.8l1.11,-0.32l0.98,0.7l1.07,0.2l2.26,-1.22l0.64,0.44l1.13,1.56l-0.48,1.4l0.8,0.3l-0.08,0.48l0.46,0.68l-0.35,1.36l1.05,2.61l-1.0,0.69l0.03,1.41l-0.72,-0.06l-1.08,1.0l-0.24,-0.27l0.07,-1.11l-1.05,-1.54l-1.79,0.21l-0.35,-2.01l-1.6,-2.18l-2.0,-0.0l-1.31,0.54l-1.95,2.18l-1.86,-2.19l-1.2,-0.78l-0.3,-1.11l-0.8,-0.85l0.65,-0.72l0.81,-0.03l1.64,-0.8l0.23,-1.87l2.67,0.64l0.89,-0.3l1.21,0.15Z"
                                                        data-code="GN" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M379.31,251.39l0.1,-0.35l2.43,-0.07l0.74,-0.61l0.51,-0.03l0.77,0.49l-1.03,-0.3l-1.87,0.9l-1.65,-0.04ZM384.03,250.91l0.91,0.05l0.75,-0.24l-0.59,0.31l-1.08,-0.13Z"
                                                        data-code="GM" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M353.02,1.2l14.69,4.67l-3.68,1.89l-22.97,0.86l-0.36,0.27l0.12,0.43l1.55,1.18l8.79,-0.66l7.48,2.07l4.86,-1.77l1.66,1.73l-2.53,3.19l-0.01,0.48l0.46,0.15l6.35,-2.2l12.06,-2.31l7.24,1.13l1.09,1.99l-9.79,4.01l-1.44,1.32l-7.87,0.98l-0.35,0.41l0.38,0.38l5.07,0.24l-2.53,3.58l-2.07,3.81l0.08,6.05l2.57,3.11l-3.22,0.2l-4.12,1.66l-0.05,0.72l4.45,2.65l0.51,3.75l-2.3,0.4l-0.25,0.64l2.79,3.69l-4.82,0.31l-0.36,0.29l0.16,0.44l2.62,1.8l-0.59,1.22l-3.3,0.7l-3.45,0.01l-0.29,0.68l3.03,3.12l0.02,1.34l-4.4,-1.73l-1.72,1.35l0.15,0.66l3.31,1.15l3.13,2.71l0.81,3.16l-3.85,0.75l-4.89,-4.26l-0.47,-0.03l-0.17,0.44l0.79,2.86l-2.71,2.21l-0.13,0.44l0.37,0.27l8.73,0.34l-12.32,6.64l-7.24,1.48l-2.94,0.08l-2.69,1.75l-3.43,4.41l-5.24,2.84l-1.73,0.18l-7.12,2.1l-2.15,2.52l-0.13,2.99l-1.19,2.45l-4.01,3.09l-0.14,0.44l0.97,2.9l-2.28,6.48l-3.1,0.2l-3.83,-3.07l-4.86,-0.02l-2.25,-1.93l-1.7,-3.79l-4.3,-4.84l-1.21,-2.49l-0.44,-3.8l-3.32,-3.63l0.84,-2.86l-1.56,-1.7l2.28,-4.6l3.83,-1.74l1.03,-1.96l0.52,-3.47l-0.59,-0.41l-4.17,2.21l-2.07,0.58l-2.72,-1.28l-0.15,-2.71l0.85,-2.09l2.01,-0.06l5.06,1.2l0.46,-0.23l-0.14,-0.49l-6.54,-4.47l-2.67,0.55l-1.58,-0.86l2.56,-4.01l-0.03,-0.48l-1.5,-1.74l-4.98,-8.5l-3.13,-1.96l0.03,-1.88l-0.24,-0.37l-6.85,-3.02l-5.36,-0.38l-12.7,0.58l-2.78,-1.57l-3.66,-2.77l5.73,-1.45l5.0,-0.28l0.38,-0.38l-0.35,-0.41l-10.67,-1.38l-5.3,-2.06l0.25,-1.54l18.41,-5.26l1.22,-2.27l-0.25,-0.55l-6.14,-1.86l1.68,-1.77l8.55,-4.03l3.59,-0.63l0.3,-0.54l-0.88,-2.27l5.47,-1.47l7.65,-0.95l7.55,-0.05l3.04,1.85l6.48,-3.27l5.81,2.22l3.56,0.5l5.16,1.94l0.5,-0.21l-0.17,-0.52l-5.71,-3.13l0.28,-2.13l8.12,-3.6l8.7,0.28l3.35,-2.34l8.71,-0.6l19.93,0.8Z"
                                                        data-code="GL" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M540.81,207.91l0.37,0.86l-0.17,0.76l0.6,1.53l-0.95,0.04l-0.82,-1.28l-1.57,-0.18l1.31,-1.88l1.22,0.17Z"
                                                        data-code="KW" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M420.53,257.51l-0.01,0.72l0.96,1.2l0.24,3.73l0.59,0.95l-0.51,2.1l0.19,1.41l1.02,2.21l-6.97,2.84l-1.8,-0.57l0.04,-0.89l-1.02,-2.04l0.61,-2.65l1.07,-2.32l-0.96,-6.47l5.01,0.07l0.94,-0.39l0.61,0.11Z"
                                                        data-code="GH" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M568.09,230.93l-0.91,1.67l-1.22,0.04l-0.6,0.76l-0.41,1.51l0.27,1.58l-1.16,0.05l-1.56,0.97l-0.76,1.74l-1.62,0.05l-0.98,0.65l-0.17,1.15l-0.89,0.52l-1.49,-0.18l-2.4,0.94l-2.47,-5.4l7.35,-2.71l1.67,-5.23l-1.12,-2.09l0.05,-0.83l0.67,-1.0l0.07,-1.05l0.9,-0.42l-0.05,-2.07l0.7,-0.01l1.0,1.62l1.51,1.08l3.3,0.84l1.73,2.29l0.81,0.37l-1.23,2.35l-0.99,0.79Z"
                                                        data-code="OM" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M531.15,258.94l1.51,0.12l5.13,-0.95l5.3,-1.48l-0.01,4.4l-2.67,3.39l-1.85,0.01l-8.04,-2.94l-2.55,-3.17l1.12,-1.71l2.04,2.34Z"
                                                        data-code="_2" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M472.77,172.64l-1.08,-1.29l0.96,-0.77l0.29,-0.83l1.98,1.64l-0.36,0.67l-1.79,0.58Z"
                                                        data-code="_1" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path d="M504.91,192.87l0.34,0.01l0.27,-0.07l-0.29,0.26l-0.31,-0.2Z"
                                                        data-code="_0" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M518.64,201.38l-5.14,1.56l-0.19,0.65l2.16,2.39l-0.89,1.14l-1.71,0.34l-1.71,1.8l-2.34,-0.37l1.21,-4.32l0.56,-4.07l2.8,0.94l4.46,-2.71l0.79,2.66Z"
                                                        data-code="JO" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M455.59,162.84l1.09,0.07l-0.82,0.94l-0.27,-1.01ZM456.96,162.92l0.62,-0.41l1.73,0.45l0.42,-0.4l-0.01,-0.59l0.86,-0.52l0.2,-1.05l1.63,-0.68l2.57,1.68l2.07,0.6l0.87,-0.31l1.05,1.57l-0.52,0.63l-1.05,-0.56l-1.68,0.04l-2.1,-0.5l-1.29,0.06l-0.57,0.49l-0.59,-0.47l-0.62,0.16l-0.46,1.7l1.79,2.42l2.79,2.75l-1.18,-0.87l-2.21,-0.87l-1.67,-1.78l0.13,-0.63l-1.05,-1.19l-0.32,-1.27l-1.42,-0.43Z"
                                                        data-code="HR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M237.05,238.38l-1.16,0.43l-0.91,-0.55l0.05,-0.2l2.02,0.31ZM237.53,238.43l1.06,0.12l-0.05,0.01l-1.01,-0.12ZM239.25,238.45l0.79,-0.51l0.06,-0.62l-1.02,-1.0l0.02,-0.82l-0.3,-0.4l-0.93,-0.32l3.16,0.45l0.02,1.84l-0.48,0.34l-0.08,0.58l0.54,0.72l-1.78,-0.26Z"
                                                        data-code="HT" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M462.08,157.89l0.65,-1.59l-0.09,-0.44l0.64,-0.0l0.39,-0.34l0.1,-0.69l1.75,0.87l2.32,-0.37l0.43,-0.66l3.49,-0.78l0.69,-0.78l0.57,-0.14l2.57,0.93l0.67,-0.23l1.03,0.65l0.08,0.37l-1.42,0.71l-2.59,4.14l-1.8,0.53l-1.68,-0.1l-2.74,1.23l-1.85,-0.54l-2.54,-1.66l-0.66,-1.1Z"
                                                        data-code="HU" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M199.6,249.52l-1.7,-1.21l0.06,-0.94l3.04,-2.14l2.37,0.28l1.27,-0.09l1.1,-0.52l1.3,0.28l1.14,-0.25l1.38,0.37l2.23,1.37l-2.36,0.93l-1.23,-0.39l-0.88,1.3l-1.28,0.99l-0.98,-0.22l-0.42,0.52l-0.96,0.05l-0.36,0.41l0.04,0.88l-0.52,0.6l-0.3,0.04l-0.3,-0.55l-0.66,-0.31l0.11,-0.67l-0.48,-0.65l-0.87,-0.26l-0.73,0.2Z"
                                                        data-code="HN" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M256.17,238.73l-0.26,0.27l-2.83,0.05l-0.07,-0.55l1.95,-0.1l1.22,0.33Z"
                                                        data-code="PR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M509.21,203.07l0.1,-0.06l-0.02,0.03l-0.09,0.03ZM509.36,202.91l-0.02,-0.63l-0.33,-0.16l0.31,-1.09l0.24,0.1l-0.2,1.78Z"
                                                        data-code="PS" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M401.84,187.38l-0.64,0.47l-1.13,-0.35l-0.91,0.17l0.28,-1.78l-0.24,-1.78l-1.25,-0.56l-0.45,-0.84l0.17,-1.66l1.01,-1.18l0.69,-2.92l-0.04,-1.39l-0.59,-1.9l1.3,-0.85l0.84,1.35l3.1,-0.3l0.46,0.99l-1.05,0.94l-0.03,2.16l-0.41,0.57l-0.08,1.1l-0.79,0.18l-0.26,0.59l0.91,1.6l-0.63,1.75l0.76,1.09l-1.1,1.52l0.07,1.05Z"
                                                        data-code="PT" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M274.9,336.12l0.74,1.52l-0.16,3.45l0.32,0.41l2.64,0.5l1.11,-0.47l1.4,0.59l0.36,0.6l0.53,3.42l1.27,0.4l0.98,-0.38l0.51,0.27l-0.0,1.18l-1.21,5.32l-2.09,1.9l-1.8,0.4l-4.71,-0.98l2.2,-3.63l-0.32,-1.5l-2.78,-1.28l-3.03,-1.94l-2.07,-0.44l-4.34,-4.06l0.91,-2.9l0.08,-1.42l1.07,-2.04l4.13,-0.72l2.18,0.03l2.05,1.17l0.03,0.59Z"
                                                        data-code="PY" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M213.8,263.68l0.26,-1.52l-0.36,-0.26l-0.01,-0.49l0.44,-0.1l0.93,1.4l1.26,0.03l0.77,0.49l1.38,-0.23l2.51,-1.11l0.86,-0.72l3.45,0.85l1.4,1.18l0.41,1.74l-0.21,0.34l-0.53,-0.12l-0.47,0.29l-0.16,0.6l-0.68,-1.28l0.45,-0.49l-0.19,-0.66l-0.47,-0.13l-0.54,-0.84l-1.5,-0.75l-1.1,0.16l-0.75,0.99l-1.62,0.84l-0.18,0.96l0.85,0.97l-0.58,0.45l-0.69,0.08l-0.34,-1.18l-1.27,0.03l-0.71,-1.05l-2.59,-0.46Z"
                                                        data-code="PA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M808.58,298.86l2.54,2.56l-0.13,0.26l-0.33,0.12l-0.87,-0.78l-1.22,-2.16ZM801.41,293.04l0.5,0.29l0.26,0.27l-0.49,-0.35l-0.27,-0.21ZM803.17,294.58l0.59,0.5l0.08,1.06l-0.29,-0.91l-0.38,-0.65ZM796.68,298.41l0.52,0.75l1.43,-0.19l2.27,-1.81l-0.01,-1.43l1.12,0.16l-0.04,1.1l-0.7,1.28l-1.12,0.18l-0.62,0.79l-2.46,1.11l-1.17,-0.0l-3.08,-1.25l3.41,0.0l0.45,-0.68ZM789.15,303.55l2.31,1.8l1.59,2.61l1.34,0.13l-0.06,0.66l0.31,0.43l1.06,0.24l0.06,0.65l2.25,1.05l-1.22,0.13l-0.72,-0.63l-4.56,-0.65l-3.22,-2.87l-1.49,-2.34l-3.27,-1.1l-2.38,0.72l-1.59,0.86l-0.2,0.42l0.27,1.55l-1.55,0.68l-1.36,-0.4l-2.21,-0.09l-0.08,-15.41l8.39,2.93l2.95,2.4l0.6,1.64l4.02,1.49l0.31,0.68l-1.76,0.21l-0.33,0.52l0.55,1.68Z"
                                                        data-code="PG" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M244.96,295.21l-1.26,-0.07l-0.57,0.42l-1.93,0.45l-2.98,1.75l-0.36,1.36l-0.58,0.8l0.12,1.37l-1.24,0.59l-0.22,1.22l-0.62,0.84l1.04,2.27l1.28,1.44l-0.41,0.84l0.32,0.57l1.48,0.13l1.16,1.37l2.21,0.07l1.63,-1.08l-0.13,3.02l0.3,0.4l1.14,0.29l1.31,-0.34l1.9,3.59l-0.48,0.85l-0.17,3.85l-0.94,1.59l0.35,0.75l-0.47,1.07l0.98,1.97l-2.1,3.82l-0.98,0.5l-2.17,-1.28l-0.39,-1.16l-4.95,-2.58l-4.46,-2.79l-1.84,-1.51l-0.91,-1.84l0.3,-0.96l-2.11,-3.33l-4.82,-9.68l-1.04,-1.2l-0.87,-1.94l-3.4,-2.48l0.58,-1.18l-1.13,-2.23l0.66,-1.49l1.45,-1.15l-0.6,0.98l0.07,0.92l0.47,0.36l1.74,0.03l0.97,1.17l0.54,0.07l1.42,-1.03l0.6,-1.84l1.42,-2.02l3.04,-1.04l2.73,-2.62l0.86,-1.74l-0.1,-1.87l1.44,1.02l0.9,1.25l1.06,0.59l1.7,2.73l1.86,0.31l1.45,-0.61l0.96,0.39l1.36,-0.19l1.45,0.89l-1.4,2.21l0.31,0.61l0.59,0.05l0.47,0.5Z"
                                                        data-code="PE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M615.09,192.34l-1.83,1.81l-2.6,0.39l-3.73,-0.68l-1.58,1.33l-0.09,0.42l1.77,4.39l1.7,1.23l-1.69,1.27l-0.12,2.14l-2.33,2.64l-1.6,2.8l-2.46,2.67l-3.03,-0.07l-2.76,2.83l0.05,0.6l1.5,1.11l0.26,1.9l1.44,1.5l0.37,1.68l-5.01,-0.01l-1.78,1.7l-1.42,-0.52l-0.76,-1.87l-2.27,-2.15l-11.61,0.86l0.71,-2.34l3.43,-1.32l0.25,-0.44l-0.21,-1.24l-1.2,-0.65l-0.28,-2.46l-2.29,-1.14l-1.28,-1.94l2.82,0.94l2.62,-0.38l1.42,0.33l0.76,-0.56l1.71,0.19l3.25,-1.14l0.27,-0.36l0.08,-2.19l1.18,-1.32l1.68,0.0l0.58,-0.82l1.6,-0.3l1.19,0.16l0.98,-0.78l0.02,-1.88l0.93,-1.47l1.48,-0.66l0.19,-0.55l-0.66,-1.25l2.04,-0.11l0.69,-1.01l-0.02,-1.16l1.11,-1.06l-0.17,-1.78l-0.49,-1.03l1.15,-0.98l5.42,-0.91l2.6,-0.82l1.6,1.16l0.97,2.34l3.45,0.97Z"
                                                        data-code="PK" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M737.01,263.84l0.39,2.97l-0.44,1.18l-0.55,-1.53l-0.67,-0.14l-1.17,1.28l0.65,2.09l-0.42,0.69l-2.48,-1.23l-0.57,-1.49l0.65,-1.03l-0.1,-0.54l-1.59,-1.19l-0.56,0.08l-0.65,0.87l-1.23,0.0l-1.58,0.97l0.83,-1.8l2.56,-1.42l0.65,0.84l0.45,0.13l1.9,-0.69l0.56,-1.11l1.5,-0.06l0.38,-0.43l-0.09,-1.19l1.21,0.71l0.36,2.02ZM733.59,256.58l0.05,0.75l0.08,0.26l-0.8,-0.42l-0.18,-0.71l0.85,0.12ZM734.08,256.1l-0.12,-1.12l-1.0,-1.27l1.36,0.03l0.53,0.73l0.51,2.04l-1.27,-0.4ZM733.76,257.68l0.38,0.98l-0.32,0.15l-0.07,-1.13ZM724.65,238.43l1.46,0.7l0.72,-0.31l-0.32,1.17l0.79,1.71l-0.57,1.84l-1.53,1.04l-0.39,2.25l0.56,2.04l1.63,0.57l1.16,-0.27l2.71,1.23l-0.19,1.08l0.76,0.84l-0.08,0.36l-1.4,-0.9l-0.88,-1.27l-0.66,0.0l-0.38,0.55l-1.6,-1.31l-2.15,0.36l-0.87,-0.39l0.07,-0.61l0.66,-0.55l-0.01,-0.62l-0.75,-0.59l-0.72,0.44l-0.74,-0.87l-0.39,-2.49l0.32,0.27l0.66,-0.28l0.26,-3.97l0.7,-2.02l1.14,0.0ZM731.03,258.87l-0.88,0.85l-1.19,1.94l-1.05,-1.19l0.93,-1.1l0.32,-1.47l0.52,-0.06l-0.27,1.15l0.22,0.45l0.49,-0.12l1.0,-1.32l-0.08,0.85ZM726.83,255.78l0.83,0.38l1.17,-0.0l-0.02,0.48l-2.0,1.4l0.03,-2.26ZM724.81,252.09l-0.38,1.27l-1.42,-1.95l1.2,0.05l0.6,0.63ZM716.55,261.82l1.1,-0.95l0.03,-0.03l-0.28,0.36l-0.85,0.61ZM719.22,259.06l0.04,-0.06l0.8,-1.53l0.16,0.75l-1.0,0.84Z"
                                                        data-code="PH" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M468.44,149.42l-1.11,-1.54l-1.86,-0.33l-0.48,-1.05l-1.72,-0.37l-0.65,0.69l-0.72,-0.36l0.11,-0.61l-0.33,-0.46l-1.75,-0.27l-1.04,-0.93l-0.94,-1.94l0.16,-1.22l-0.62,-1.8l-0.78,-1.07l0.57,-1.04l-0.48,-1.43l1.41,-0.83l6.91,-2.71l2.14,0.5l0.52,0.91l5.51,0.44l4.55,-0.05l1.07,0.31l0.48,0.84l0.15,1.58l0.65,1.2l-0.01,0.99l-1.27,0.58l-0.19,0.54l0.73,1.48l0.08,1.55l1.2,2.76l-0.17,0.58l-1.23,0.44l-2.27,2.72l0.18,0.95l-1.97,-1.03l-1.98,0.4l-1.36,-0.28l-1.24,0.58l-1.07,-0.97l-1.16,0.24Z"
                                                        data-code="PL" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M481.47,313.3l0.39,0.31l2.52,0.14l0.99,1.17l2.01,0.35l1.4,-0.64l0.69,1.17l1.78,0.33l1.84,2.35l2.23,0.18l0.4,-0.43l-0.21,-2.74l-0.62,-0.3l-0.48,0.32l-1.98,-1.17l0.72,-5.29l-0.51,-1.18l0.57,-1.3l3.68,-0.62l0.26,0.63l1.21,0.63l0.9,-0.22l2.16,0.67l1.33,0.71l1.07,1.02l0.56,1.87l-0.88,2.7l0.43,2.09l-0.73,0.87l-0.76,2.37l0.59,0.68l-6.6,1.83l-0.29,0.44l0.19,1.45l-1.68,0.35l-1.43,1.02l-0.38,0.87l-0.87,0.26l-3.48,3.69l-4.16,-0.53l-1.52,-1.0l-1.77,-0.13l-1.83,0.52l-3.04,-3.4l0.11,-7.59l4.82,0.03l0.39,-0.49l-0.18,-0.76l0.33,-0.83l-0.4,-1.36l0.24,-1.05Z"
                                                        data-code="ZM" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M384.42,230.28l0.25,-0.79l1.06,-1.29l0.8,-3.51l3.38,-2.78l0.7,-1.81l0.06,4.84l-1.98,0.2l-0.94,1.59l0.39,3.56l-3.7,-0.01ZM392.01,218.1l0.7,-1.8l1.77,-0.24l2.09,0.34l0.95,-0.62l1.28,-0.07l-0.0,2.51l-6.79,-0.12Z"
                                                        data-code="EH" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M485.71,115.04l2.64,0.6l2.56,0.11l-1.6,1.91l0.61,3.54l-0.81,0.87l-1.78,-0.01l-3.22,-1.76l-1.8,0.45l0.21,-1.53l-0.58,-0.41l-0.69,0.34l-1.26,-1.03l-0.17,-1.63l2.83,-0.92l3.05,-0.52Z"
                                                        data-code="EE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M492.06,205.03l1.46,0.42l2.95,-1.64l2.04,-0.21l1.53,0.3l0.59,1.19l0.69,0.04l0.41,-0.64l1.81,0.58l1.95,0.16l1.04,-0.51l1.42,4.08l-2.03,4.54l-1.66,-1.77l-1.76,-3.85l-0.64,-0.12l-0.36,0.67l1.04,2.88l3.44,6.95l1.78,3.04l2.03,2.65l-0.36,0.53l0.23,2.01l2.7,2.19l-28.41,0.0l0.0,-18.96l-0.73,-2.2l0.59,-1.56l-0.32,-1.26l0.68,-0.99l3.06,-0.04l4.82,1.52Z"
                                                        data-code="EG" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M467.14,373.21l-0.13,-1.96l-0.68,-1.56l0.7,-0.68l-0.13,-2.33l-4.56,-8.19l0.77,-0.86l0.6,0.45l0.69,1.31l2.83,0.72l1.5,-0.26l2.24,-1.39l0.19,-9.55l1.35,2.3l-0.21,1.5l0.61,1.2l0.4,0.19l1.79,-0.27l2.6,-2.07l0.69,-1.32l0.96,-0.48l2.19,1.04l2.04,0.13l1.77,-0.65l0.85,-2.12l1.38,-0.33l1.59,-2.76l2.15,-1.89l3.41,-1.87l2.0,0.45l1.02,-0.28l0.99,0.2l1.75,5.29l-0.38,3.25l-0.81,-0.23l-1.0,0.46l-0.87,1.68l-0.05,1.16l1.97,1.84l1.47,-0.29l0.69,-1.18l1.09,0.01l-0.76,3.69l-0.58,1.09l-2.2,1.79l-3.17,4.76l-2.8,2.83l-3.57,2.88l-2.53,1.05l-1.22,0.14l-0.51,0.7l-1.18,-0.32l-1.39,0.5l-2.59,-0.52l-1.61,0.33l-1.18,-0.11l-2.55,1.1l-2.1,0.44l-1.6,1.07l-0.85,0.05l-0.93,-0.89l-0.93,-0.15l-0.97,-1.13l-0.25,0.05ZM491.45,364.19l0.62,-0.93l1.48,-0.59l1.18,-2.19l-0.07,-0.49l-1.99,-1.69l-1.66,0.56l-1.43,1.14l-1.34,1.73l0.02,0.51l1.88,2.11l1.31,-0.16Z"
                                                        data-code="ZA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M231.86,285.53l0.29,1.59l-0.69,1.45l-2.61,2.51l-3.13,1.11l-1.53,2.18l-0.49,1.68l-1.0,0.73l-1.02,-1.11l-1.78,-0.16l0.67,-1.15l-0.24,-0.86l1.25,-2.13l-0.54,-1.09l-0.67,-0.08l-0.72,0.87l-0.87,-0.64l0.35,-0.69l-0.36,-1.96l0.81,-0.51l0.45,-1.51l0.92,-1.57l-0.07,-0.97l2.65,-1.33l2.75,1.35l0.77,1.05l2.12,0.35l0.76,-0.32l1.96,1.21Z"
                                                        data-code="EC" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M470.32,171.8l0.74,0.03l0.92,0.89l-0.17,1.95l0.36,1.28l1.01,0.82l-1.82,2.83l-0.19,-0.61l-1.25,-0.89l-0.18,-1.2l0.53,-2.82l-0.54,-1.47l0.6,-0.83Z"
                                                        data-code="AL" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M461.55,300.03l1.26,3.15l1.94,2.36l2.47,-0.53l1.25,0.32l0.44,-0.18l0.93,-1.92l1.31,-0.08l0.41,-0.44l0.47,-0.0l-0.1,0.41l0.39,0.49l2.65,-0.02l0.03,1.19l0.48,1.01l-0.34,1.52l0.18,1.55l0.83,1.04l-0.13,2.85l0.54,0.39l3.96,-0.41l-0.1,1.79l0.39,1.05l-0.24,1.43l-4.7,-0.03l-0.4,0.39l-0.12,8.13l2.92,3.49l-3.83,0.88l-5.89,-0.36l-1.88,-1.24l-10.47,0.22l-1.3,-1.01l-1.85,-0.16l-2.4,0.77l-0.15,-1.06l0.33,-2.16l1.0,-3.45l1.35,-3.2l2.24,-2.8l0.33,-2.06l-0.13,-1.53l-0.8,-1.08l-1.21,-2.87l0.87,-1.62l-1.27,-4.12l-1.17,-1.53l2.47,-0.63l7.03,0.03ZM451.71,298.87l-0.47,-1.25l1.25,-1.11l0.32,0.3l-0.99,1.03l-0.12,1.03Z"
                                                        data-code="AO" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M552.8,172.89l0.46,-1.27l-0.48,-1.05l-2.96,-1.19l-1.06,-2.58l-1.37,-0.87l-0.03,-0.3l1.95,0.23l0.45,-0.38l0.08,-1.96l1.75,-0.41l2.1,0.45l0.48,-0.33l0.45,-3.04l-0.45,-2.09l-0.41,-0.31l-2.42,0.15l-2.36,-0.73l-2.87,1.37l-2.17,0.61l-0.85,-0.34l0.13,-1.61l-1.6,-2.12l-2.02,-0.08l-1.78,-1.82l1.29,-2.18l-0.57,-0.95l1.62,-2.91l2.21,1.63l0.63,-0.27l0.29,-2.22l4.92,-3.43l3.71,-0.08l8.4,3.6l2.92,-1.36l3.77,-0.06l3.11,1.66l0.51,-0.11l0.6,-0.81l3.31,0.13l0.39,-0.25l0.63,-1.57l-0.17,-0.5l-3.5,-1.98l1.87,-1.27l-0.13,-1.03l1.98,-0.72l0.18,-0.62l-1.59,-2.06l0.81,-0.82l9.23,-1.18l1.33,-0.88l6.18,-1.26l2.26,-1.42l4.08,0.68l0.73,3.33l0.51,0.3l2.48,-0.8l2.79,1.02l-0.17,1.56l0.43,0.44l2.55,-0.24l4.89,-2.53l0.03,0.32l3.15,2.61l5.56,8.47l0.65,0.02l1.12,-1.46l3.15,1.74l3.76,-0.78l1.15,0.49l1.14,1.8l1.84,0.76l0.99,1.29l3.35,-0.25l1.02,1.52l-1.6,1.81l-1.93,0.28l-0.34,0.38l-0.11,3.05l-1.13,1.16l-4.75,-1.0l-0.46,0.27l-1.76,5.47l-1.1,0.59l-4.91,1.23l-0.27,0.54l2.1,4.97l-1.37,0.63l-0.23,0.41l0.13,1.13l-0.88,-0.25l-1.42,-1.13l-7.89,-0.4l-0.92,0.31l-3.73,-1.22l-1.42,0.63l-0.53,1.66l-3.72,-0.94l-1.85,0.43l-0.76,1.4l-4.65,2.62l-1.13,2.08l-0.44,0.01l-0.92,-1.4l-2.87,-0.09l-0.45,-2.14l-0.38,-0.32l-0.8,-0.01l0.0,-2.96l-3.0,-2.22l-7.31,0.58l-2.35,-2.68l-6.71,-3.69l-6.45,1.83l-0.29,0.39l0.1,10.85l-0.7,0.08l-1.62,-2.17l-1.83,-0.96l-3.11,0.59l-0.64,0.51Z"
                                                        data-code="KZ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M516.04,247.79l1.1,0.84l1.63,-0.45l0.68,0.47l1.63,0.03l2.01,0.94l1.73,1.66l1.64,2.07l-1.52,2.04l0.16,1.72l0.39,0.38l2.05,0.0l-0.36,1.03l2.86,3.58l8.32,3.08l1.31,0.02l-6.32,6.75l-3.1,0.11l-2.36,1.77l-1.47,0.04l-0.86,0.79l-1.38,-0.0l-1.32,-0.81l-2.29,1.05l-0.76,0.98l-3.29,-0.41l-3.07,-2.07l-1.8,-0.07l-0.62,-0.6l0.0,-1.24l-0.28,-0.38l-1.15,-0.37l-1.4,-2.59l-1.19,-0.68l-0.47,-1.0l-1.27,-1.23l-1.16,-0.22l0.43,-0.72l1.45,-0.28l0.41,-0.95l-0.03,-2.21l0.68,-2.44l1.05,-0.63l1.43,-3.06l1.57,-1.37l1.02,-2.51l0.35,-1.88l2.52,0.46l0.44,-0.24l0.58,-1.43Z"
                                                        data-code="ET" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M498.91,341.09l-1.11,-0.22l-0.92,0.28l-2.09,-0.44l-1.5,-1.11l-1.89,-0.43l-0.62,-1.4l-0.01,-0.84l-0.3,-0.38l-0.97,-0.25l-2.71,-2.74l-1.92,-3.32l3.83,0.45l3.73,-3.82l1.08,-0.44l0.26,-0.77l1.25,-0.9l1.41,-0.26l0.5,0.89l1.99,-0.05l1.72,1.17l1.11,0.17l1.05,0.66l0.01,2.99l-0.59,3.76l0.38,0.86l-0.23,1.23l-0.39,0.35l-0.63,1.81l-2.43,2.75Z"
                                                        data-code="ZW" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M416.0,169.21l1.07,1.17l4.61,1.38l1.06,-0.57l2.6,1.26l2.71,-0.3l0.09,1.12l-2.14,1.8l-3.11,0.61l-0.31,0.31l-0.2,0.89l-1.54,1.69l-0.97,2.4l0.84,1.74l-1.32,1.27l-0.48,1.68l-1.88,0.65l-1.66,2.07l-5.36,-0.01l-1.79,1.08l-0.89,0.98l-0.88,-0.17l-0.79,-0.82l-0.68,-1.59l-2.37,-0.63l-0.11,-0.5l1.21,-1.82l-0.77,-1.13l0.61,-1.68l-0.76,-1.62l0.87,-0.49l0.09,-1.25l0.42,-0.6l0.03,-2.11l0.99,-0.69l0.13,-0.5l-1.03,-1.73l-1.46,-0.11l-0.61,0.38l-1.06,0.0l-0.52,-1.23l-0.53,-0.21l-1.32,0.67l-0.01,-1.49l-0.75,-0.96l3.03,-1.88l2.99,0.53l3.32,-0.02l2.63,0.51l6.01,-0.06Z"
                                                        data-code="ES" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M520.38,246.23l3.42,2.43l3.5,3.77l0.84,0.54l-0.95,-0.01l-3.51,-3.89l-2.33,-1.15l-1.73,-0.07l-0.91,-0.51l-1.26,0.51l-1.34,-1.02l-0.61,0.17l-0.66,1.61l-2.35,-0.43l-0.17,-0.67l1.29,-5.29l0.61,-0.61l1.95,-0.53l0.87,-1.01l1.17,2.41l0.68,2.33l1.49,1.43Z"
                                                        data-code="ER" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M468.91,172.53l-1.22,-1.02l0.47,-1.81l0.89,-0.72l2.26,1.51l-0.5,0.57l-0.75,-0.27l-1.14,1.73Z"
                                                        data-code="ME" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M488.41,153.73l1.4,-0.27l1.72,0.93l1.07,0.15l0.85,0.65l-0.14,0.84l0.96,0.85l1.12,2.47l-1.15,-0.07l-0.66,-0.41l-0.52,0.25l-0.09,0.86l-1.08,1.89l-0.27,-0.86l0.25,-1.34l-0.16,-1.6l-3.29,-4.34Z"
                                                        data-code="MD" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M545.91,319.14l0.4,3.03l0.62,1.21l-0.21,1.02l-0.57,-0.8l-0.69,-0.01l-0.47,0.76l0.41,2.12l-0.18,0.87l-0.73,0.78l-0.15,2.14l-4.71,15.2l-1.06,2.88l-3.92,1.64l-3.12,-1.49l-0.6,-1.21l-0.19,-2.4l-0.86,-2.05l-0.21,-1.77l0.38,-1.62l1.21,-0.75l0.01,-0.76l1.19,-2.04l0.23,-1.66l-1.06,-2.99l-0.19,-2.21l0.81,-1.33l0.32,-1.46l4.63,-1.22l3.44,-3.0l0.85,-1.4l-0.08,-0.7l0.78,-0.04l1.38,-1.77l0.13,-1.64l0.45,-0.61l1.16,1.69l0.59,1.6Z"
                                                        data-code="MG" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M378.78,230.02l0.06,-0.59l0.92,-0.73l0.82,-1.37l-0.09,-1.04l0.79,-1.7l1.31,-1.58l0.96,-0.59l0.66,-1.55l0.09,-1.47l0.81,-1.48l1.72,-1.07l1.55,-2.69l1.16,-0.96l2.44,-0.39l1.94,-1.82l1.31,-0.78l2.09,-2.28l-0.51,-3.65l1.24,-3.7l1.5,-1.75l4.46,-2.57l2.37,-4.47l1.44,0.01l1.68,1.21l2.32,-0.19l3.47,0.65l0.8,1.54l0.16,1.71l0.86,2.96l0.56,0.59l-0.26,0.61l-3.05,0.44l-1.26,1.05l-1.33,0.22l-0.33,0.37l-0.09,1.78l-2.68,1.0l-1.07,1.42l-4.47,1.13l-4.04,2.01l-0.54,4.64l-1.15,0.06l-0.92,0.61l-1.96,-0.35l-2.42,0.54l-0.74,1.9l-0.86,0.4l-1.14,3.26l-3.53,3.01l-0.8,3.55l-0.96,1.1l-0.29,0.82l-4.95,0.18Z"
                                                        data-code="MA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M598.64,172.75l-1.63,1.52l0.06,0.64l1.85,1.12l1.97,-0.64l2.21,1.17l-2.52,1.68l-2.59,-0.22l-0.18,-0.41l0.46,-1.23l-0.45,-0.53l-3.35,0.69l-2.1,3.51l-1.87,-0.12l-1.03,1.51l0.22,0.55l1.64,0.62l0.46,1.83l-1.19,2.49l-2.66,-0.53l0.05,-1.36l-0.26,-0.39l-3.3,-1.23l-2.56,-1.4l-4.4,-3.34l-1.34,-3.14l-1.08,-0.6l-2.58,0.13l-0.69,-0.44l-0.47,-2.52l-3.37,-1.6l-0.43,0.05l-2.07,1.72l-2.1,1.01l-0.21,0.47l0.28,1.01l-1.91,0.03l-0.09,-10.5l5.99,-1.7l6.19,3.54l2.71,2.84l7.05,-0.67l2.71,2.01l-0.17,2.81l0.39,0.42l0.9,0.02l0.44,2.14l0.38,0.32l2.94,0.09l0.95,1.42l1.28,-0.24l1.05,-2.04l4.43,-2.5Z"
                                                        data-code="UZ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M673.9,230.21l-1.97,1.57l-0.57,0.96l-1.4,0.6l-1.36,1.05l-1.99,0.36l-1.08,2.66l-0.91,0.4l-0.19,0.55l1.21,2.27l2.52,3.43l-0.79,1.91l-0.74,0.41l-0.17,0.52l0.65,1.37l1.61,1.95l0.25,2.58l0.9,2.13l-1.92,3.57l0.68,-2.25l-0.81,-1.74l0.19,-2.65l-1.05,-1.53l-1.24,-6.17l-1.12,-2.26l-0.6,-0.13l-4.34,3.02l-2.39,-0.65l0.77,-2.84l-0.52,-2.61l-1.91,-2.96l0.25,-0.75l-0.29,-0.51l-1.33,-0.3l-1.61,-1.93l-0.1,-1.3l0.82,-0.24l0.04,-1.64l1.02,-0.52l0.21,-0.45l-0.23,-0.95l0.54,-0.96l0.08,-2.22l1.46,0.45l0.47,-0.2l1.12,-2.19l0.16,-1.35l1.33,-2.16l-0.0,-1.52l2.89,-1.66l1.63,0.44l0.5,-0.44l-0.17,-1.4l0.64,-0.36l0.08,-1.04l0.77,-0.11l0.71,1.35l1.06,0.69l-0.03,3.86l-2.38,2.37l-0.3,3.15l0.46,0.43l2.28,-0.38l0.51,2.08l1.47,0.67l-0.6,1.8l0.19,0.48l2.97,1.48l1.64,-0.55l0.02,0.32Z"
                                                        data-code="MM" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M392.61,254.08l-0.19,-2.37l-0.99,-0.87l-0.44,-1.3l-0.09,-1.28l0.81,-0.58l0.35,-1.24l2.37,0.65l1.31,-0.47l0.86,0.15l0.66,-0.56l9.83,-0.04l0.38,-0.28l0.56,-1.8l-0.44,-0.65l-2.35,-21.95l3.27,-0.04l16.7,11.38l0.74,1.31l2.5,1.09l0.02,1.38l0.44,0.39l2.34,-0.21l0.01,5.38l-1.28,1.61l-0.26,1.49l-5.31,0.57l-1.07,0.92l-2.9,0.1l-0.86,-0.48l-1.38,0.36l-2.4,1.08l-0.6,0.87l-1.85,1.09l-0.43,0.7l-0.79,0.39l-1.44,-0.21l-0.81,0.84l-0.34,1.64l-1.91,2.02l-0.06,1.03l-0.67,1.22l0.13,1.16l-0.97,0.39l-0.23,-0.64l-0.52,-0.24l-1.35,0.4l-0.34,0.55l-2.69,-0.28l-0.37,-0.35l-0.02,-0.9l-0.65,-0.35l0.45,-0.64l-0.03,-0.53l-2.12,-2.44l-0.76,-0.01l-2.0,1.16l-0.78,-0.15l-0.8,-0.67l-1.21,0.23Z"
                                                        data-code="ML" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M676.61,146.48l3.81,1.68l5.67,-1.0l2.37,0.41l2.34,1.5l1.79,1.75l2.29,-0.03l3.12,0.52l2.47,-0.81l3.41,-0.59l3.53,-2.21l1.25,0.29l1.53,1.13l2.27,-0.21l-2.66,5.01l0.64,1.68l0.47,0.21l1.32,-0.38l2.38,0.48l2.02,-1.11l1.76,0.89l2.06,2.02l-0.13,0.53l-1.72,-0.29l-3.77,0.46l-1.88,0.99l-1.76,1.99l-3.71,1.17l-2.45,1.6l-3.83,-0.87l-0.41,0.17l-1.31,1.99l1.04,2.24l-1.52,0.9l-1.74,1.57l-2.79,1.02l-3.78,0.13l-4.05,1.05l-2.77,1.52l-1.16,-0.85l-2.94,0.0l-3.62,-1.79l-2.58,-0.49l-3.4,0.41l-5.12,-0.67l-2.63,0.06l-1.31,-1.6l-1.4,-3.0l-1.48,-0.33l-3.13,-1.94l-6.16,-0.93l-0.71,-1.06l0.86,-3.82l-1.93,-2.71l-3.5,-1.18l-1.95,-1.58l-0.5,-1.72l2.34,-0.52l4.75,-2.8l3.62,-1.47l2.18,0.97l2.46,0.05l1.81,1.53l2.46,0.12l3.95,0.71l2.43,-2.28l0.08,-0.48l-0.9,-1.72l2.24,-2.98l2.62,1.27l4.94,1.17l0.43,2.24Z"
                                                        data-code="MN" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M472.8,173.98l0.49,-0.71l3.57,-0.71l1.0,0.77l0.13,1.45l-0.65,0.53l-1.15,-0.05l-1.12,0.67l-1.39,0.22l-0.79,-0.55l-0.29,-1.03l0.19,-0.6Z"
                                                        data-code="MK" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M505.5,309.31l0.85,1.95l0.15,2.86l-0.69,1.65l0.71,1.8l0.06,1.28l0.49,0.64l0.07,1.06l0.4,0.55l0.8,-0.23l0.55,0.61l0.69,-0.21l0.34,0.6l0.19,2.94l-1.04,0.62l-0.54,1.25l-1.11,-1.08l-0.16,-1.56l0.51,-1.31l-0.32,-1.3l-0.99,-0.65l-0.82,0.12l-2.36,-1.64l0.63,-1.96l0.82,-1.18l-0.46,-2.01l0.9,-2.86l-0.94,-2.51l0.96,0.18l0.29,0.4Z"
                                                        data-code="MW" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M407.36,220.66l-2.58,0.03l-0.39,0.44l2.42,22.56l0.36,0.43l-0.39,1.24l-9.75,0.04l-0.56,0.53l-0.91,-0.11l-1.27,0.45l-1.61,-0.66l-0.97,0.03l-0.36,0.29l-0.38,1.35l-0.42,0.23l-2.93,-3.4l-2.96,-1.52l-1.62,-0.03l-1.27,0.54l-1.12,-0.2l-0.65,0.4l-0.08,-0.49l0.68,-1.29l0.31,-2.43l-0.57,-3.91l0.23,-1.21l-0.69,-1.5l-1.15,-1.02l0.25,-0.39l9.58,0.02l0.4,-0.45l-0.46,-3.68l0.47,-1.04l2.12,-0.21l0.36,-0.4l-0.08,-6.4l7.81,0.13l0.41,-0.4l0.01,-3.31l7.76,5.35Z"
                                                        data-code="MR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M498.55,276.32l0.7,-0.46l1.65,0.5l1.96,-0.57l1.7,0.01l1.45,-0.98l0.91,1.33l1.33,3.95l-2.57,4.03l-1.46,-0.4l-2.54,0.91l-1.37,1.61l-0.01,0.81l-2.42,-0.01l-2.26,1.01l-0.17,-1.59l0.58,-1.04l0.14,-1.94l1.37,-2.28l1.78,-1.58l-0.17,-0.65l-0.72,-0.24l0.13,-2.43Z"
                                                        data-code="UG" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M717.47,273.46l-1.39,0.65l-2.12,-0.41l-2.88,-0.0l-0.38,0.28l-0.84,2.75l-0.99,0.96l-1.21,3.29l-1.73,0.45l-2.45,-0.68l-1.39,0.31l-1.33,1.15l-1.59,-0.14l-1.41,0.44l-1.44,-1.19l-0.18,-0.73l1.34,0.53l1.93,-0.47l0.75,-2.22l4.02,-1.03l2.75,-3.21l0.82,0.94l0.64,-0.05l0.4,-0.65l0.96,0.06l0.42,-0.36l0.24,-2.68l1.81,-1.64l1.21,-1.86l0.63,-0.01l1.07,1.05l0.34,1.28l3.44,1.35l-0.06,0.35l-1.37,0.1l-0.35,0.54l0.32,0.88ZM673.68,269.59l0.17,1.09l0.47,0.33l1.65,-0.3l0.87,-0.94l1.61,1.52l0.98,1.56l-0.12,2.81l0.41,2.29l0.95,0.9l0.88,2.44l-1.27,0.12l-5.1,-3.67l-0.34,-1.29l-1.37,-1.59l-0.33,-1.97l-0.88,-1.4l0.25,-1.68l-0.46,-1.05l1.63,0.84Z"
                                                        data-code="MY" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M133.12,200.41l0.2,0.47l9.63,3.33l6.96,-0.02l0.4,-0.4l0.0,-0.74l3.77,0.0l3.55,2.93l1.39,2.83l1.52,1.04l2.08,0.82l0.47,-0.14l1.46,-2.0l1.73,-0.04l1.59,0.98l2.05,3.35l1.47,1.56l1.26,3.14l2.18,1.02l2.26,0.58l-1.18,3.72l-0.42,5.04l1.79,4.89l1.62,1.89l0.61,1.52l1.2,1.42l2.55,0.66l1.37,1.1l7.54,-1.89l1.86,-1.3l1.14,-4.3l4.1,-1.21l3.57,-0.11l0.32,0.3l-0.06,0.94l-1.26,1.45l-0.67,1.71l0.38,0.7l-0.72,2.27l-0.49,-0.3l-1.0,0.08l-1.0,1.39l-0.47,-0.11l-0.53,0.47l-4.26,-0.02l-0.4,0.4l-0.0,1.06l-1.1,0.26l0.1,0.44l1.82,1.44l0.56,0.91l-3.19,0.21l-1.21,2.09l0.24,0.72l-0.2,0.44l-2.24,-2.18l-1.45,-0.93l-2.22,-0.69l-1.52,0.22l-3.07,1.16l-10.55,-3.85l-2.86,-1.96l-3.78,-0.92l-1.08,-1.19l-2.62,-1.43l-1.18,-1.54l-0.38,-0.81l0.66,-0.63l-0.18,-0.53l0.52,-0.76l0.01,-0.91l-2.0,-3.82l-2.21,-2.63l-2.53,-2.09l-1.19,-1.62l-2.2,-1.17l-0.3,-0.43l0.34,-1.48l-0.21,-0.45l-1.23,-0.6l-1.36,-1.2l-0.59,-1.78l-1.54,-0.47l-2.44,-2.55l-0.16,-0.9l-1.33,-2.03l-0.84,-1.99l-0.16,-1.33l-1.81,-1.1l-0.97,0.05l-1.31,-0.7l-0.57,0.22l-0.4,1.12l0.72,3.77l3.51,3.89l0.28,0.78l0.53,0.26l0.41,1.43l1.33,1.73l1.58,1.41l0.8,2.39l1.43,2.41l0.13,1.32l0.37,0.36l1.04,0.08l1.67,2.28l-0.85,0.76l-0.66,-1.51l-1.68,-1.54l-2.91,-1.87l0.06,-1.82l-0.54,-1.68l-2.91,-2.03l-0.55,0.09l-1.95,-1.1l-0.88,-0.94l0.68,-0.08l0.93,-1.01l0.08,-1.78l-1.93,-1.94l-1.46,-0.77l-3.75,-7.56l4.88,-0.42Z"
                                                        data-code="MX" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path d="M839.04,322.8l0.22,1.14l-0.44,0.03l-0.2,-1.45l0.42,0.27Z"
                                                        data-code="VU" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M444.48,172.62l-0.64,1.78l-0.58,-0.31l-0.49,-1.72l0.4,-0.89l1.0,-0.72l0.3,1.85ZM429.64,147.1l1.78,1.58l1.46,-0.13l2.1,1.42l1.35,0.27l1.23,0.83l3.04,0.5l-1.03,1.85l-0.3,2.12l-0.41,0.32l-0.95,-0.24l-0.5,0.43l0.06,0.61l-1.81,1.92l-0.04,1.42l0.55,0.38l0.88,-0.36l0.61,0.97l-0.03,1.0l0.57,0.91l-0.75,1.09l0.65,2.39l1.27,0.57l-0.18,0.82l-2.01,1.53l-4.77,-0.8l-3.82,1.0l-0.53,1.85l-2.49,0.34l-2.71,-1.31l-1.16,0.57l-4.31,-1.29l-0.72,-0.86l1.19,-1.78l0.39,-6.45l-2.58,-3.3l-1.9,-1.66l-3.72,-1.23l-0.19,-1.72l2.81,-0.61l4.12,0.81l0.47,-0.48l-0.6,-2.77l1.94,0.95l5.83,-2.54l0.92,-2.74l1.6,-0.49l0.24,0.78l1.36,0.33l1.05,1.19ZM289.01,278.39l-0.81,0.8l-0.78,0.12l-0.5,-0.66l-0.56,-0.1l-0.91,0.6l-0.46,-0.22l1.09,-2.96l-0.96,-1.77l-0.17,-1.49l1.07,-1.77l2.32,0.75l2.51,2.01l0.3,0.74l-2.14,3.96Z"
                                                        data-code="FR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M492.17,76.39l-0.23,3.5l3.52,2.63l-2.08,2.88l-0.02,0.44l2.8,4.56l-1.59,3.31l2.16,3.24l-0.94,2.39l0.14,0.47l3.44,2.51l-0.77,1.62l-7.52,6.95l-4.5,0.31l-4.38,1.37l-3.8,0.74l-1.44,-1.96l-2.17,-1.11l0.5,-3.66l-1.16,-3.33l1.09,-2.08l2.21,-2.42l5.67,-4.32l1.64,-0.83l0.21,-0.42l-0.46,-2.02l-3.38,-1.89l-0.75,-1.43l-0.22,-6.74l-6.79,-4.8l0.8,-0.62l2.54,2.12l3.46,-0.12l3.0,0.96l2.51,-2.11l1.17,-3.08l3.55,-1.38l2.76,1.53l-0.95,2.79Z"
                                                        data-code="FI" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M871.53,326.34l-2.8,1.05l-0.08,-0.23l2.97,-1.21l-0.1,0.39ZM867.58,329.25l0.43,0.37l-0.27,0.88l-1.24,0.28l-1.04,-0.24l-0.14,-0.66l0.63,-0.58l0.92,0.26l0.7,-0.31Z"
                                                        data-code="FJ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M274.36,425.85l1.44,1.08l-0.47,0.73l-3.0,0.89l-0.96,-1.0l-0.52,-0.05l-1.83,1.29l-0.73,-0.88l2.46,-1.64l1.93,0.76l1.67,-1.19Z"
                                                        data-code="FK" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M202.33,252.67l0.81,-0.18l1.03,-1.02l-0.04,-0.88l0.68,-0.0l0.63,-0.54l0.97,0.22l1.53,-1.26l0.58,-0.99l1.17,0.34l2.41,-0.94l0.13,1.32l-0.81,1.94l0.1,2.74l-0.36,0.37l-0.11,1.75l-0.47,0.81l0.18,1.14l-1.73,-0.85l-0.71,0.27l-1.47,-0.6l-0.52,0.16l-4.01,-3.81Z"
                                                        data-code="NI" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M430.31,143.39l0.6,-0.5l2.13,-4.8l3.2,-1.33l1.74,0.08l0.33,0.8l-0.59,2.92l-0.5,0.99l-1.26,0.0l-0.4,0.45l0.33,2.7l-2.2,-1.78l-2.62,0.58l-0.75,-0.11Z"
                                                        data-code="NL" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M491.44,67.41l6.8,2.89l-2.29,0.86l-0.15,0.65l2.33,2.38l-4.98,1.79l0.84,-2.45l-0.18,-0.48l-3.55,-1.8l-3.89,1.52l-1.42,3.38l-2.12,1.72l-2.64,-1.0l-3.11,0.21l-2.66,-2.22l-0.5,-0.01l-1.41,1.1l-1.44,0.17l-0.35,0.35l-0.32,2.47l-4.32,-0.64l-0.44,0.29l-0.58,2.11l-2.45,0.2l-4.15,7.68l-3.88,5.76l0.78,1.62l-0.64,1.16l-2.24,-0.06l-0.38,0.24l-1.66,3.89l0.15,5.17l1.57,2.04l-0.78,4.16l-2.02,2.48l-0.85,1.63l-1.3,-1.75l-0.58,-0.07l-4.87,4.19l-3.1,0.79l-3.16,-1.7l-0.85,-3.77l-0.77,-8.55l2.14,-2.31l6.55,-3.27l5.02,-4.17l10.63,-13.84l10.98,-8.7l5.35,-1.91l4.34,0.12l3.69,-3.64l4.49,0.19l4.37,-0.89ZM484.55,20.04l4.26,1.75l-3.1,2.55l-7.1,0.65l-7.08,-0.9l-0.37,-1.31l-0.37,-0.29l-3.44,-0.1l-2.08,-2.0l6.87,-1.44l3.9,1.31l2.39,-1.64l6.13,1.4ZM481.69,33.93l-4.45,1.74l-3.54,-0.99l1.12,-0.9l0.05,-0.58l-1.06,-1.22l4.22,-0.89l1.09,1.97l2.57,0.87ZM466.44,24.04l7.43,3.77l-5.41,1.86l-1.58,4.08l-2.26,1.2l-1.12,4.11l-2.61,0.18l-4.79,-2.86l1.84,-1.54l-0.1,-0.68l-3.69,-1.53l-4.77,-4.51l-1.73,-3.89l6.11,-1.82l1.54,1.92l3.57,-0.08l1.2,-1.96l3.32,-0.18l3.05,1.92Z"
                                                        data-code="NO" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M474.26,330.66l-0.97,0.04l-0.38,0.4l-0.07,8.9l-2.09,0.08l-0.39,0.4l-0.0,17.42l-1.98,1.23l-1.17,0.17l-2.44,-0.66l-0.48,-1.13l-0.99,-0.74l-0.54,0.05l-0.9,1.01l-1.53,-1.68l-0.93,-1.88l-1.99,-8.56l-0.06,-3.12l-0.33,-1.52l-2.3,-3.34l-1.91,-4.83l-1.96,-2.43l-0.12,-1.57l2.33,-0.79l1.43,0.07l1.81,1.13l10.23,-0.25l1.84,1.23l5.87,0.35ZM474.66,330.64l6.51,-1.6l1.9,0.39l-1.69,0.4l-1.31,0.83l-1.12,-0.94l-4.29,0.92Z"
                                                        data-code="NA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M838.78,341.24l-0.33,0.22l-2.9,-1.75l-3.26,-3.37l1.65,0.83l4.85,4.07Z"
                                                        data-code="NC" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M454.75,226.53l1.33,1.37l0.48,0.07l1.27,-0.7l0.53,3.52l0.94,0.83l0.17,0.92l0.81,0.69l-0.44,0.95l-0.96,5.26l-0.13,3.22l-3.04,2.31l-1.22,3.57l1.02,1.24l-0.0,1.46l0.39,0.4l1.13,0.04l-0.9,1.25l-1.47,-2.42l-0.86,-0.29l-2.09,1.37l-1.74,-0.67l-1.45,-0.17l-0.85,0.35l-1.36,-0.07l-1.64,1.09l-1.06,0.05l-2.94,-1.28l-1.44,0.59l-1.01,-0.03l-0.97,-0.94l-2.7,-0.98l-2.69,0.3l-0.87,0.64l-0.47,1.6l-0.75,1.16l-0.12,1.53l-1.57,-1.1l-1.31,0.24l0.03,-0.81l-0.32,-0.41l-2.59,-0.52l-0.15,-1.16l-1.35,-1.6l-0.29,-1.0l0.13,-0.84l1.29,-0.08l1.08,-0.92l3.31,-0.22l2.22,-0.41l0.32,-0.34l0.2,-1.47l1.39,-1.88l-0.01,-5.66l3.36,-1.12l7.24,-5.12l8.42,-4.92l3.69,1.06Z"
                                                        data-code="NE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M456.32,253.89l0.64,0.65l-0.28,1.04l-2.11,2.01l-2.03,5.18l-1.37,1.16l-1.15,3.18l-1.33,0.66l-1.46,-0.97l-1.21,0.16l-1.38,1.36l-0.91,0.24l-1.79,4.06l-2.33,0.81l-1.11,-0.07l-0.86,0.5l-1.71,-0.05l-1.19,-1.39l-0.89,-1.89l-1.77,-1.66l-3.95,-0.08l0.07,-5.21l0.42,-1.43l1.95,-2.3l-0.14,-0.91l0.43,-1.18l-0.53,-1.41l0.25,-2.92l0.72,-1.07l0.32,-1.34l0.46,-0.39l2.47,-0.28l2.34,0.89l1.15,1.02l1.28,0.04l1.22,-0.58l3.03,1.27l1.49,-0.14l1.36,-1.0l1.33,0.07l0.82,-0.35l3.45,0.8l1.82,-1.32l1.84,2.67l0.66,0.16Z"
                                                        data-code="NG" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M857.8,379.65l1.86,3.12l0.44,0.18l0.3,-0.38l0.03,-1.23l0.38,0.27l0.57,2.31l2.02,0.94l1.81,0.27l1.57,-1.06l0.7,0.18l-1.15,3.59l-1.98,0.11l-0.74,1.2l0.2,1.11l-2.42,3.98l-1.49,0.92l-1.04,-0.85l1.21,-2.05l-0.81,-2.01l-2.63,-1.25l0.04,-0.57l1.82,-1.19l0.43,-2.34l-0.16,-2.03l-0.95,-1.82l-0.06,-0.72l-3.11,-3.64l-0.79,-1.52l1.56,1.45l1.76,0.66l0.65,2.34ZM853.83,393.59l0.57,1.24l0.59,0.16l1.42,-0.97l0.46,0.79l0.0,1.03l-2.47,3.48l-1.26,1.2l-0.06,0.5l0.55,0.87l-1.41,0.07l-2.33,1.38l-2.03,5.02l-3.02,2.16l-2.06,-0.06l-1.71,-1.04l-2.47,-0.2l-0.27,-0.73l1.22,-2.1l3.05,-2.94l1.62,-0.59l4.02,-2.82l1.57,-1.67l1.07,-2.16l0.88,-0.7l0.48,-1.75l1.24,-0.97l0.35,0.79Z"
                                                        data-code="NZ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M641.14,213.62l0.01,3.19l-1.74,0.04l-4.8,-0.86l-1.58,-1.39l-3.37,-0.34l-7.65,-3.7l0.8,-2.09l2.33,-1.7l1.77,0.75l2.49,1.76l1.38,0.41l0.99,1.35l1.9,0.52l1.99,1.17l5.49,0.9Z"
                                                        data-code="NP" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M407.4,259.27l0.86,0.42l0.56,0.9l1.13,0.53l1.19,-0.61l0.97,-0.08l1.42,0.54l0.6,3.24l-1.03,2.08l-0.65,2.84l1.06,2.33l-0.06,0.53l-2.54,-0.47l-1.66,0.03l-3.06,0.46l-4.11,1.6l0.32,-3.06l-1.18,-1.31l-1.32,-0.66l0.42,-0.85l-0.2,-1.4l0.5,-0.67l0.01,-1.59l0.84,-0.32l0.26,-0.5l-1.15,-3.01l0.12,-0.5l0.51,-0.25l0.66,0.31l1.93,0.02l0.67,-0.71l0.71,-0.14l0.25,0.69l0.57,0.22l1.4,-0.61Z"
                                                        data-code="CI" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M444.62,156.35l-0.29,0.87l0.18,0.53l1.13,0.58l1.0,0.1l-0.1,0.65l-0.79,0.38l-1.72,-0.37l-0.45,0.23l-0.45,1.04l-0.75,0.06l-0.84,-0.4l-1.32,1.0l-0.96,0.12l-0.88,-0.55l-0.81,-1.3l-0.49,-0.16l-0.63,0.26l0.02,-0.65l1.71,-1.66l0.1,-0.56l0.93,0.08l0.58,-0.46l1.99,0.02l0.66,-0.61l2.19,0.79Z"
                                                        data-code="CH" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M242.07,254.93l-1.7,0.59l-0.59,1.18l-1.7,1.69l-0.38,1.93l-0.67,1.43l0.31,0.57l1.03,0.13l0.25,0.9l0.57,0.64l-0.04,2.34l1.64,1.42l3.16,-0.24l1.26,0.28l1.67,2.06l0.41,0.13l4.09,-0.39l0.45,0.22l-0.92,1.95l-0.2,1.8l0.52,1.83l0.75,1.05l-1.12,1.1l0.07,0.63l0.84,0.51l0.74,1.29l-0.39,-0.45l-0.59,-0.01l-0.71,0.74l-4.71,-0.05l-0.4,0.41l0.03,1.57l0.33,0.39l1.11,0.2l-1.68,0.4l-0.29,0.38l-0.01,1.82l1.16,1.14l0.34,1.25l-1.05,7.05l-1.04,-0.87l1.26,-1.99l-0.13,-0.56l-2.18,-1.23l-1.38,0.2l-1.14,-0.38l-1.27,0.61l-1.55,-0.26l-1.38,-2.46l-1.23,-0.75l-0.85,-1.2l-1.67,-1.19l-0.86,0.13l-2.11,-1.32l-1.01,0.31l-1.8,-0.29l-0.52,-0.91l-3.09,-1.68l0.77,-0.52l-0.1,-1.12l0.41,-0.64l1.34,-0.32l2.0,-2.88l-0.11,-0.57l-0.66,-0.43l0.39,-1.38l-0.52,-2.1l0.49,-0.83l-0.4,-2.13l-0.97,-1.35l0.17,-0.66l0.86,-0.08l0.47,-0.75l-0.46,-1.63l1.41,-0.07l1.8,-1.69l0.93,-0.24l0.3,-0.38l0.45,-2.76l1.22,-1.0l1.44,-0.04l0.45,-0.5l1.91,0.12l2.93,-1.84l1.15,-1.14l0.91,0.46l-0.25,0.45Z"
                                                        data-code="CO" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M740.23,148.97l4.57,1.3l2.8,2.17l0.98,2.9l0.38,0.27l3.8,0.0l2.32,-1.28l3.29,-0.75l-0.96,2.09l-1.02,1.28l-0.85,3.4l-1.52,2.73l-2.76,-0.5l-2.4,1.13l-0.21,0.45l0.64,2.57l-0.32,3.2l-0.94,0.06l-0.37,0.89l-0.91,-1.01l-0.64,0.07l-0.92,1.57l-3.73,1.25l-0.26,0.48l0.26,1.06l-1.5,-0.08l-1.09,-0.86l-0.56,0.06l-1.67,2.06l-2.7,1.56l-2.03,1.88l-3.4,0.83l-1.93,1.4l-1.15,0.34l0.33,-0.7l-0.41,-0.89l1.79,-1.79l0.02,-0.54l-1.32,-1.56l-0.48,-0.1l-2.24,1.09l-2.83,2.06l-1.51,1.83l-2.28,0.13l-1.55,1.49l-0.04,0.5l1.32,1.97l2.0,0.58l0.31,1.35l1.98,0.84l3.0,-1.96l2.0,1.02l1.49,0.11l0.22,0.83l-3.37,0.86l-1.12,1.48l-2.5,1.52l-1.29,1.99l0.14,0.56l2.57,1.48l0.97,2.7l3.17,4.63l-0.03,1.66l-1.35,0.65l-0.2,0.51l0.6,1.47l1.4,0.91l-0.89,3.82l-1.43,0.38l-3.85,6.44l-2.27,3.11l-6.78,4.57l-2.73,0.29l-1.45,1.04l-0.62,-0.61l-0.55,-0.01l-1.36,1.25l-3.39,1.27l-2.61,0.4l-1.1,2.79l-0.81,0.09l-0.49,-1.42l0.5,-0.85l-0.25,-0.59l-3.36,-0.84l-1.3,0.4l-2.31,-0.62l-0.94,-0.84l0.33,-1.28l-0.3,-0.49l-2.19,-0.46l-1.13,-0.93l-0.47,-0.02l-2.06,1.36l-4.29,0.28l-2.76,1.05l-0.28,0.43l0.32,2.53l-0.59,-0.03l-0.19,-1.34l-0.55,-0.34l-1.68,0.7l-2.46,-1.23l0.62,-1.87l-0.26,-0.51l-1.37,-0.44l-0.54,-2.22l-0.45,-0.3l-2.13,0.35l0.24,-2.48l2.39,-2.4l0.03,-4.31l-1.19,-0.92l-0.78,-1.49l-0.41,-0.21l-1.41,0.19l-1.98,-0.3l0.46,-1.07l-1.17,-1.7l-0.55,-0.11l-1.63,1.05l-2.25,-0.57l-2.89,1.73l-2.25,1.98l-1.75,0.29l-1.17,-0.71l-3.31,-0.65l-1.48,0.79l-1.04,1.27l-0.12,-1.17l-0.54,-0.34l-1.44,0.54l-5.55,-0.86l-1.98,-1.16l-1.89,-0.54l-0.99,-1.35l-1.34,-0.37l-2.55,-1.79l-2.01,-0.84l-1.21,0.56l-5.57,-3.45l-0.53,-2.31l1.19,0.25l0.48,-0.37l0.08,-1.42l-0.98,-1.56l0.15,-2.44l-2.69,-3.32l-4.12,-1.23l-0.67,-2.0l-1.92,-1.48l-0.38,-0.7l-0.51,-3.01l-1.52,-0.66l-0.7,0.13l-0.48,-2.05l0.55,-0.51l-0.09,-0.82l2.03,-1.19l1.6,-0.54l2.56,0.38l0.42,-0.22l0.85,-1.7l3.0,-0.33l1.1,-1.26l4.05,-1.77l0.39,-0.91l-0.17,-1.44l1.45,-0.67l0.2,-0.52l-2.07,-4.9l4.51,-1.12l1.37,-0.73l1.89,-5.51l4.98,0.86l1.51,-1.7l0.11,-2.87l1.99,-0.38l1.83,-2.06l0.49,-0.13l0.68,2.08l2.23,1.77l3.44,1.16l1.55,2.29l-0.92,3.49l0.96,1.67l6.54,1.13l2.95,1.87l1.47,0.35l1.06,2.62l1.53,1.91l3.05,0.08l5.14,0.67l3.37,-0.41l2.36,0.43l3.65,1.8l3.06,0.04l1.45,0.88l2.87,-1.59l3.95,-1.02l3.83,-0.14l3.06,-1.14l1.77,-1.6l1.72,-1.01l0.17,-0.49l-1.1,-2.05l1.02,-1.54l4.02,0.8l2.45,-1.61l3.76,-1.19l1.96,-2.13l1.63,-0.83l3.51,-0.4l1.92,0.34l0.46,-0.3l0.17,-1.5l-2.27,-2.22l-2.11,-1.09l-2.18,1.11l-2.32,-0.47l-1.29,0.32l-0.4,-0.82l2.73,-5.16l3.02,1.06l3.53,-2.06l0.18,-1.68l2.16,-3.35l1.49,-1.35l-0.03,-1.85l-1.07,-0.85l1.54,-1.26l2.98,-0.59l3.23,-0.09l3.64,0.99l2.04,1.16l3.29,6.71l0.92,3.19ZM696.92,237.31l-1.87,1.08l-1.63,-0.64l-0.06,-1.79l1.03,-0.98l2.58,-0.69l1.16,0.05l0.3,0.54l-0.98,1.06l-0.53,1.37Z"
                                                        data-code="CN" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M457.92,257.49l1.05,1.91l-1.4,0.16l-1.05,-0.23l-0.45,0.22l-0.54,1.19l0.08,0.45l1.48,1.47l1.05,0.45l1.01,2.46l-1.52,2.99l-0.68,0.68l-0.13,3.69l2.38,3.84l1.09,0.8l0.24,2.48l-3.67,-1.14l-11.27,-0.13l0.23,-1.79l-0.98,-1.66l-1.19,-0.54l-0.44,-0.97l-0.6,-0.42l1.71,-4.27l0.75,-0.13l1.38,-1.36l0.65,-0.03l1.71,0.99l1.93,-1.12l1.14,-3.18l1.38,-1.17l2.0,-5.14l2.17,-2.13l0.3,-1.64l-0.86,-0.88l0.03,-0.33l0.94,1.28l0.07,3.22Z"
                                                        data-code="CM" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M246.5,429.18l-3.14,1.83l-0.57,3.16l-0.64,0.05l-2.68,-1.06l-2.82,-2.33l-3.04,-1.89l-0.69,-1.85l0.63,-2.14l-1.21,-2.11l-0.31,-5.37l1.01,-2.91l2.57,-2.38l-0.18,-0.68l-3.16,-0.77l2.05,-2.47l0.77,-4.65l2.32,0.9l0.54,-0.29l1.31,-6.31l-0.22,-0.44l-1.68,-0.8l-0.56,0.28l-0.7,3.36l-0.81,-0.22l1.56,-9.41l1.15,-2.24l-0.71,-2.82l-0.18,-2.84l1.01,-0.33l3.26,-9.14l1.07,-4.22l-0.56,-4.21l0.74,-2.34l-0.29,-3.27l1.46,-3.34l2.04,-16.59l-0.66,-7.76l1.03,-0.53l0.54,-0.9l0.79,1.14l0.32,1.78l1.25,1.16l-0.69,2.55l1.33,2.9l0.97,3.59l0.46,0.29l1.5,-0.3l0.11,0.23l-0.76,2.44l-2.57,1.23l-0.23,0.37l0.08,4.33l-0.46,0.77l0.56,1.21l-1.58,1.51l-1.68,2.62l-0.89,2.47l0.2,2.7l-1.48,2.73l1.12,5.09l0.64,0.61l-0.01,2.29l-1.38,2.68l0.01,2.4l-1.89,2.04l0.02,2.75l0.69,2.57l-1.43,1.13l-1.26,5.68l0.39,3.51l-0.97,0.89l0.58,3.5l1.02,1.14l-0.65,1.02l0.15,0.57l1.0,0.53l0.16,0.69l-1.03,0.85l0.26,1.75l-0.89,4.03l-1.31,2.66l0.24,1.75l-0.71,1.83l-1.99,1.7l0.3,3.67l0.88,1.19l1.58,0.01l0.01,2.21l1.04,1.95l5.98,0.63ZM248.69,430.79l0.0,7.33l0.4,0.4l3.52,0.05l-0.44,0.75l-1.94,0.98l-2.49,-0.37l-1.88,-1.06l-2.55,-0.49l-5.59,-3.71l-2.38,-2.63l4.1,2.48l3.32,1.23l0.45,-0.12l1.29,-1.57l0.83,-2.32l2.05,-1.24l1.31,0.29Z"
                                                        data-code="CL" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M280.06,145.6l-1.67,2.88l0.07,0.49l0.5,0.04l1.46,-0.98l1.0,0.42l-0.56,0.72l0.17,0.62l2.22,0.89l1.35,-0.71l1.95,0.78l-0.66,2.01l0.5,0.51l1.32,-0.42l0.98,3.17l-0.91,2.41l-0.8,0.08l-1.23,-0.45l0.47,-2.25l-0.89,-0.83l-0.48,0.06l-2.78,2.63l-0.34,-0.02l1.02,-0.85l-0.14,-0.69l-2.4,-0.77l-7.4,0.08l-0.17,-0.41l1.3,-0.94l0.02,-0.64l-0.73,-0.58l1.85,-1.74l2.57,-5.16l1.47,-1.79l1.99,-1.05l0.46,0.06l-1.53,2.45ZM68.32,74.16l4.13,0.95l4.02,2.14l2.61,0.4l2.47,-1.89l2.88,-1.31l3.85,0.48l3.71,-1.94l3.82,-1.04l1.56,1.68l0.49,0.08l1.87,-1.04l0.65,-1.98l1.24,0.35l4.16,3.94l0.54,0.01l2.75,-2.49l0.26,2.59l0.49,0.35l3.08,-0.73l1.04,-1.27l2.73,0.23l3.83,1.86l5.86,1.61l3.47,0.75l2.44,-0.26l2.73,1.78l-2.98,1.81l-0.19,0.41l0.31,0.32l4.53,0.92l6.87,-0.5l2.0,-0.69l2.49,2.39l0.53,0.02l2.72,-2.16l-0.02,-0.64l-2.16,-1.54l1.15,-1.06l4.83,-0.61l1.84,0.95l2.48,2.31l3.01,-0.23l4.55,1.92l3.85,-0.67l3.61,0.1l0.41,-0.44l-0.25,-2.36l1.79,-0.61l3.49,1.32l-0.01,3.77l0.31,0.39l0.45,-0.22l1.48,-3.16l1.74,0.1l0.41,-0.3l1.13,-4.37l-2.78,-3.11l-2.8,-1.74l0.19,-4.64l2.71,-3.07l2.98,0.67l2.41,1.95l3.19,4.8l-1.99,1.97l0.21,0.68l4.33,0.84l-0.01,4.15l0.25,0.37l0.44,-0.09l3.07,-3.15l2.54,2.39l-0.61,3.33l2.42,2.88l0.61,0.0l2.61,-3.08l1.88,-3.82l0.17,-4.58l6.72,0.94l3.13,2.04l0.13,1.82l-1.76,2.19l-0.01,0.49l1.66,2.16l-0.26,1.71l-4.68,2.8l-3.28,0.61l-2.47,-1.2l-0.55,0.23l-0.73,2.04l-2.38,3.43l-0.74,1.77l-2.74,2.57l-3.44,0.25l-2.21,1.78l-0.28,2.53l-2.82,0.55l-3.12,3.22l-2.72,4.31l-1.03,3.17l-0.14,4.31l0.33,0.41l3.44,0.57l2.24,5.95l0.45,0.23l3.4,-0.69l4.52,1.51l2.43,1.31l1.91,1.73l3.1,0.96l2.62,1.46l6.6,0.54l-0.35,2.74l0.81,3.53l1.81,3.78l3.83,3.3l0.45,0.04l2.1,-1.28l1.37,-3.69l-1.31,-5.38l-1.45,-1.58l3.57,-1.47l2.84,-2.46l1.52,-2.8l-0.25,-2.55l-1.7,-3.07l-2.85,-2.61l2.8,-3.95l-1.08,-3.37l-0.79,-5.67l1.36,-0.7l6.76,1.41l2.12,-0.96l5.12,3.36l1.05,1.61l4.08,0.26l-0.06,2.87l0.83,4.7l0.3,0.32l2.16,0.54l1.73,2.06l0.5,0.09l3.63,-2.03l2.52,-4.19l1.26,-1.32l7.6,11.72l-0.92,2.04l0.16,0.51l3.3,1.97l2.22,1.98l4.1,0.98l1.43,0.99l0.95,2.79l2.1,0.68l0.84,1.08l0.17,3.45l-3.37,2.26l-4.22,1.24l-3.06,2.63l-4.06,0.51l-5.35,-0.69l-6.39,0.2l-2.3,2.41l-3.26,1.51l-6.47,7.15l-0.06,0.48l0.44,0.19l2.13,-0.52l4.17,-4.24l5.12,-2.62l3.52,-0.3l1.69,1.21l-2.12,2.21l0.81,3.47l1.02,2.61l3.47,1.6l4.14,-0.45l2.15,-2.8l0.26,1.48l1.14,0.8l-2.56,1.69l-5.5,1.82l-2.54,1.27l-2.74,2.15l-1.4,-0.16l-0.07,-2.01l4.14,-2.44l0.18,-0.45l-0.39,-0.29l-6.63,0.45l-1.39,-1.49l-0.14,-4.43l-1.11,-0.91l-1.82,0.39l-0.66,-0.66l-0.6,0.03l-1.91,2.39l-0.82,2.52l-0.8,1.27l-1.67,0.56l-0.46,0.76l-8.31,0.07l-1.21,0.62l-2.35,1.97l-0.71,-0.14l-1.37,0.96l-1.12,-0.48l-4.74,1.26l-0.9,1.17l0.21,0.62l1.73,0.3l-1.81,0.31l-1.85,0.81l-2.11,-0.13l-2.95,1.78l-0.69,-0.09l1.39,-2.1l1.73,-1.21l0.1,-2.29l1.16,-1.99l0.49,0.53l2.03,0.42l1.2,-1.16l0.02,-0.47l-2.66,-3.51l-2.28,-0.61l-5.64,-0.71l-0.4,-0.57l-0.79,0.13l0.2,-0.41l-0.22,-0.55l-0.68,-0.26l0.19,-1.26l-0.78,-0.73l0.31,-0.64l-0.29,-0.57l-2.6,-0.44l-0.75,-1.63l-0.94,-0.66l-4.31,-0.65l-1.13,1.19l-1.48,0.59l-0.85,1.06l-2.83,-0.76l-2.09,0.39l-2.39,-0.97l-4.24,-0.7l-0.57,-0.4l-0.41,-1.63l-0.4,-0.3l-0.85,0.02l-0.39,0.4l-0.01,0.85l-69.13,-0.01l-6.51,-4.52l-4.5,-1.38l-1.26,-2.66l0.33,-1.93l-0.23,-0.43l-3.01,-1.35l-0.55,-2.77l-2.89,-2.38l-0.04,-1.45l1.39,-1.83l-0.28,-2.55l-4.16,-2.2l-4.07,-6.6l-4.02,-3.22l-1.3,-1.88l-0.5,-0.13l-2.51,1.21l-2.23,1.87l-3.85,-3.88l-2.44,-1.04l-2.22,-0.13l0.03,-37.49ZM260.37,148.65l3.04,0.76l2.26,1.2l-3.78,-0.95l-1.53,-1.01ZM249.4,3.81l6.68,0.49l5.32,0.79l4.26,1.57l-0.07,1.1l-5.85,2.53l-6.02,1.21l-2.39,1.39l-0.18,0.45l0.39,0.29l4.01,-0.02l-4.65,2.82l-4.2,1.74l-4.19,4.59l-5.03,0.92l-1.67,1.15l-7.47,0.59l-0.37,0.37l0.32,0.42l2.41,0.49l-0.81,0.47l-0.12,0.59l1.83,2.41l-2.02,1.59l-3.81,1.51l-1.32,2.16l-3.38,1.53l-0.22,0.48l0.35,1.19l0.4,0.29l3.88,-0.18l0.03,0.61l-6.33,2.95l-6.41,-1.4l-7.43,0.79l-3.72,-0.62l-4.4,-0.25l-0.23,-1.83l4.29,-1.11l0.28,-0.51l-1.1,-3.45l1.0,-0.25l6.58,2.28l0.47,-0.16l-0.05,-0.49l-3.41,-3.45l-3.58,-0.98l1.48,-1.55l4.34,-1.29l0.97,-2.19l-0.16,-0.48l-3.42,-2.13l-0.81,-2.26l6.2,0.22l2.24,0.58l3.91,-2.1l0.2,-0.43l-0.35,-0.32l-5.64,-0.67l-8.73,0.36l-4.26,-1.9l-2.12,-2.4l-2.78,-1.66l-0.41,-1.52l3.31,-1.03l2.93,-0.2l4.91,-0.99l3.7,-2.27l2.87,0.3l2.62,1.67l0.56,-0.14l1.82,-3.2l3.13,-0.94l4.44,-0.69l7.53,-0.26l1.48,0.67l7.19,-1.06l10.8,0.79ZM203.85,57.54l0.01,0.42l1.97,2.97l0.68,-0.02l2.24,-3.72l5.95,-1.86l4.01,4.64l-0.35,2.91l0.5,0.43l4.95,-1.36l2.32,-1.8l5.31,2.28l3.27,2.11l0.3,1.84l0.48,0.33l4.42,-0.99l2.64,2.87l5.97,1.77l2.06,1.72l2.11,3.71l-4.19,1.86l-0.01,0.73l5.9,2.83l3.94,0.94l3.78,3.95l3.46,0.25l-0.63,2.37l-4.11,4.47l-2.76,-1.56l-3.9,-3.94l-3.59,0.41l-0.33,0.34l-0.19,2.72l2.63,2.38l3.42,1.89l0.94,0.97l1.55,3.75l-0.7,2.29l-2.74,-0.92l-6.25,-3.15l-0.51,0.13l0.05,0.52l6.07,5.69l0.18,0.59l-6.09,-1.39l-5.31,-2.24l-2.63,-1.66l0.6,-0.77l-0.12,-0.6l-7.39,-4.01l-0.59,0.37l0.03,0.79l-6.73,0.6l-1.69,-1.1l1.36,-2.46l4.51,-0.07l5.15,-0.52l0.31,-0.6l-0.74,-1.3l0.78,-1.84l3.21,-4.05l-0.67,-2.35l-1.11,-1.6l-3.84,-2.1l-4.35,-1.28l0.91,-0.63l0.06,-0.61l-2.65,-2.75l-2.34,-0.36l-1.89,-1.46l-0.53,0.03l-1.24,1.23l-4.36,0.55l-9.04,-0.99l-9.26,-1.98l-1.6,-1.22l2.22,-1.77l0.13,-0.44l-0.38,-0.27l-3.22,-0.02l-0.72,-4.25l1.83,-4.04l2.42,-1.85l5.5,-1.1l-1.39,2.35ZM261.19,159.33l2.07,0.61l1.44,-0.04l-1.15,0.63l-2.94,-1.23l-0.4,-0.68l0.36,-0.37l0.61,1.07ZM230.83,84.39l-2.37,0.18l-0.49,-1.63l0.93,-2.09l1.94,-0.51l1.62,0.99l0.02,1.52l-1.66,1.54ZM229.43,58.25l0.11,0.65l-4.87,-0.21l-2.72,0.62l-3.1,-2.57l0.08,-1.26l0.86,-0.23l5.57,0.51l4.08,2.5ZM222.0,105.02l-0.72,1.49l-0.63,-0.19l-0.48,-0.84l0.81,-0.99l0.65,0.05l0.37,0.46ZM183.74,38.32l2.9,1.7l4.79,-0.01l1.84,1.46l-0.49,1.68l0.23,0.48l2.82,1.14l1.76,1.26l7.01,0.65l4.1,-1.1l5.03,-0.43l3.93,0.35l2.48,1.77l0.46,1.7l-1.3,1.1l-3.56,1.01l-3.23,-0.59l-7.17,0.76l-5.09,0.09l-3.99,-0.6l-6.42,-1.54l-0.79,-2.51l-0.3,-2.49l-2.64,-2.5l-5.32,-0.72l-2.52,-1.4l0.68,-1.57l4.78,0.31ZM207.38,91.35l0.4,1.56l0.56,0.26l1.06,-0.52l1.32,0.96l5.42,2.57l0.2,1.68l0.46,0.35l1.68,-0.28l1.15,0.85l-1.55,0.87l-3.61,-0.88l-1.32,-1.69l-0.57,-0.06l-2.45,2.1l-3.12,1.79l-0.7,-1.87l-0.42,-0.26l-2.16,0.24l1.39,-1.39l0.32,-3.14l0.76,-3.35l1.18,0.22ZM215.49,102.6l-2.67,1.95l-1.4,-0.07l-0.3,-0.58l1.53,-1.48l2.84,0.18ZM202.7,24.12l2.53,1.59l-2.87,1.4l-4.53,4.05l-4.25,0.38l-5.03,-0.68l-2.45,-2.04l0.03,-1.62l1.82,-1.37l0.14,-0.45l-0.38,-0.27l-4.45,0.04l-2.59,-1.76l-1.41,-2.29l1.57,-2.32l1.62,-1.66l2.44,-0.39l0.25,-0.65l-0.6,-0.74l4.86,-0.25l3.24,3.11l8.16,2.3l1.9,3.61ZM187.47,59.2l-2.76,3.49l-2.38,-0.15l-1.44,-3.84l0.04,-2.2l1.19,-1.88l2.3,-1.23l5.07,0.17l4.11,1.02l-3.24,3.72l-2.88,0.89ZM186.07,48.79l-1.08,1.53l-3.34,-0.34l-2.56,-1.1l1.03,-1.75l3.25,-1.23l1.95,1.58l0.75,1.3ZM185.71,35.32l-5.3,-0.2l-0.32,-0.71l4.31,0.07l1.3,0.84ZM180.68,32.48l-3.34,1.0l-1.79,-1.1l-0.98,-1.87l-0.15,-1.73l4.1,0.53l2.67,1.7l-0.51,1.47ZM180.9,76.31l-1.1,1.08l-3.13,-1.23l-2.12,0.43l-2.71,-1.57l1.72,-1.09l1.55,-1.72l3.81,1.9l1.98,2.2ZM169.74,54.87l2.96,0.97l4.17,-0.57l0.41,0.88l-2.14,2.11l0.09,0.64l3.55,1.92l-0.4,3.72l-3.79,1.65l-2.17,-0.35l-1.72,-1.74l-6.02,-3.5l0.03,-0.85l4.68,0.54l0.4,-0.21l-0.05,-0.45l-2.48,-2.81l2.46,-1.95ZM174.45,40.74l1.37,1.73l0.07,2.44l-1.05,3.45l-3.79,0.47l-2.32,-0.69l0.05,-2.64l-0.44,-0.41l-3.68,0.35l-0.12,-3.1l2.45,0.1l3.67,-1.73l3.41,0.29l0.37,-0.26ZM170.05,31.55l0.67,1.56l-3.33,-0.49l-4.22,-1.77l-4.35,-0.16l1.4,-0.94l-0.06,-0.7l-2.81,-1.23l-0.12,-1.39l4.39,0.68l6.62,1.98l1.81,2.47ZM134.5,58.13l-1.02,1.82l0.45,0.58l5.4,-1.39l3.33,2.29l0.49,-0.03l2.6,-2.23l1.94,1.32l2.0,4.5l0.7,0.06l1.3,-2.29l-1.63,-4.46l1.69,-0.54l2.31,0.71l2.65,1.81l2.49,7.92l8.48,4.27l-0.19,1.35l-3.79,0.33l-0.26,0.67l1.4,1.49l-0.58,1.1l-4.23,-0.64l-4.43,-1.19l-3.0,0.28l-4.66,1.47l-10.52,1.04l-1.43,-2.02l-3.42,-1.2l-2.21,0.43l-2.51,-2.86l4.84,-1.05l3.6,0.19l3.27,-0.78l0.31,-0.39l-0.31,-0.39l-4.84,-1.06l-8.79,0.27l-0.85,-1.07l5.26,-1.66l0.27,-0.45l-0.4,-0.34l-3.8,0.06l-3.81,-1.06l1.81,-3.01l1.66,-1.79l6.48,-2.81l1.97,0.71ZM158.7,56.61l-1.7,2.44l-3.2,-2.75l0.37,-0.3l3.11,-0.18l1.42,0.79ZM149.61,42.73l1.01,1.89l0.5,0.18l2.14,-0.82l2.23,0.19l0.36,2.04l-1.33,2.09l-8.28,0.76l-6.35,2.15l-3.41,0.1l-0.19,-0.96l4.9,-2.08l0.23,-0.46l-0.41,-0.31l-11.25,0.59l-2.89,-0.74l3.04,-4.44l2.14,-1.32l6.81,1.69l4.58,3.06l4.37,0.39l0.36,-0.63l-3.36,-4.6l1.85,-1.53l2.18,0.51l0.77,2.26ZM144.76,34.41l-4.36,1.44l-3.0,-1.4l1.46,-1.24l3.47,-0.52l2.96,0.71l-0.52,1.01ZM145.13,29.83l-1.9,0.66l-3.67,-0.0l2.27,-1.61l3.3,0.95ZM118.92,65.79l-6.03,2.02l-1.33,-1.9l-5.38,-2.28l2.59,-5.05l2.16,-3.14l-0.02,-0.48l-1.97,-2.41l7.64,-0.7l3.6,1.02l6.3,0.27l4.42,2.95l-2.53,0.98l-6.24,3.43l-3.1,3.28l-0.11,2.01ZM129.54,35.53l-0.28,3.37l-1.72,1.62l-2.33,0.28l-4.61,2.19l-3.86,0.76l-2.64,-0.87l3.72,-3.4l5.01,-3.34l3.72,0.07l3.0,-0.67ZM111.09,152.69l-0.67,0.24l-3.85,-1.37l-0.83,-1.17l-2.12,-1.07l-0.66,-1.02l-2.4,-0.55l-0.74,-1.71l6.02,1.45l2.0,2.55l2.52,1.39l0.73,1.27ZM87.8,134.64l0.89,0.29l1.86,-0.21l-0.65,3.34l1.69,2.33l-1.31,-1.33l-0.99,-1.62l-1.17,-0.98l-0.33,-1.82Z"
                                                        data-code="CA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M466.72,276.48l-0.1,1.03l-1.25,2.97l-0.19,3.62l-0.46,1.78l-0.23,0.63l-1.61,1.19l-1.21,1.39l-1.09,2.43l0.04,2.09l-3.25,3.24l-0.5,-0.24l-0.5,-0.83l-1.36,-0.02l-0.98,0.89l-1.68,-0.99l-1.54,1.24l-1.52,-1.96l1.57,-1.14l0.11,-0.52l-0.77,-1.35l2.1,-0.66l0.39,-0.73l1.05,0.82l2.21,0.11l1.12,-1.37l0.37,-1.81l-0.27,-2.09l-1.13,-1.5l1.0,-2.69l-0.13,-0.45l-0.92,-0.58l-1.6,0.17l-0.51,-0.94l0.1,-0.61l2.75,0.09l3.97,1.24l0.51,-0.33l0.17,-1.28l1.24,-2.21l1.28,-1.14l2.76,0.49Z"
                                                        data-code="CG" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M461.16,278.2l-0.26,-1.19l-1.09,-0.77l-0.84,-1.17l-0.29,-1.0l-1.04,-1.15l0.08,-3.43l0.58,-0.49l1.16,-2.35l1.85,-0.17l0.61,-0.62l0.97,0.58l3.15,-0.96l2.48,-1.92l0.02,-0.96l2.81,0.02l2.36,-1.17l1.93,-2.85l1.16,-0.93l1.11,-0.3l0.27,0.86l1.34,1.47l-0.39,2.01l0.3,1.01l4.01,2.75l0.17,0.93l2.63,2.31l0.6,1.44l2.08,1.4l-3.84,-0.21l-1.94,0.88l-1.23,-0.49l-2.67,1.2l-1.29,-0.18l-0.51,0.36l-0.6,1.22l-3.35,-0.65l-1.57,-0.91l-2.42,-0.83l-1.45,0.91l-0.97,1.27l-0.26,1.56l-3.22,-0.43l-1.49,1.33l-0.94,1.62Z"
                                                        data-code="CF" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M487.01,272.38l2.34,-0.14l1.35,1.84l1.34,0.45l0.86,-0.39l1.21,0.12l1.07,-0.41l0.54,0.89l2.04,1.54l-0.14,2.72l0.7,0.54l-1.38,1.13l-1.53,2.54l-0.17,2.05l-0.59,1.08l-0.02,1.72l-0.72,0.84l-0.66,3.01l0.63,1.32l-0.44,4.26l0.64,1.47l-0.37,1.22l0.86,1.8l1.53,1.41l0.3,1.26l0.44,0.5l-4.08,0.75l-0.92,1.81l0.51,1.34l-0.74,5.43l0.17,0.38l2.45,1.46l0.54,-0.1l0.12,1.62l-1.28,-0.01l-1.85,-2.35l-1.94,-0.45l-0.48,-1.13l-0.55,-0.2l-1.41,0.74l-1.71,-0.3l-1.01,-1.18l-2.49,-0.19l-0.44,-0.77l-1.98,-0.21l-2.88,0.36l0.11,-2.41l-0.85,-1.13l-0.16,-1.36l0.32,-1.73l-0.46,-0.89l-0.04,-1.49l-0.4,-0.39l-2.53,0.02l0.1,-0.41l-0.39,-0.49l-1.28,0.01l-0.43,0.45l-1.62,0.32l-0.83,1.79l-1.09,-0.28l-2.4,0.52l-1.37,-1.91l-1.3,-3.3l-0.38,-0.27l-7.39,-0.03l-2.46,0.42l0.5,-0.45l0.37,-1.47l0.66,-0.38l0.92,0.08l0.73,-0.82l0.87,0.02l0.31,0.68l1.4,0.36l3.59,-3.63l0.01,-2.23l1.02,-2.29l2.69,-2.39l0.43,-0.99l0.49,-1.96l0.17,-3.51l1.25,-2.95l0.36,-3.14l0.86,-1.13l1.1,-0.66l3.57,1.73l3.65,0.73l0.46,-0.21l0.8,-1.46l1.24,0.19l2.61,-1.17l0.81,0.44l1.04,-0.03l0.59,-0.66l0.7,-0.16l1.81,0.25Z"
                                                        data-code="CD" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M458.46,144.88l1.22,1.01l1.47,0.23l0.13,0.93l1.36,0.68l0.54,-0.2l0.24,-0.55l1.15,0.25l0.53,1.09l1.68,0.18l0.6,0.84l-1.04,0.73l-0.96,1.28l-1.6,0.17l-0.55,0.56l-1.04,-0.46l-1.05,0.15l-2.12,-0.96l-1.05,0.34l-1.2,1.12l-1.56,-0.87l-2.57,-2.1l-0.53,-1.88l4.7,-2.52l0.71,0.26l0.9,-0.28Z"
                                                        data-code="CZ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M504.36,193.47l0.43,0.28l-1.28,0.57l-0.92,-0.28l-0.24,-0.46l2.01,-0.13Z"
                                                        data-code="CY" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M211.34,258.05l0.48,0.99l1.6,1.6l-0.54,0.45l0.29,1.42l-0.25,1.19l-1.09,-0.59l-0.05,-1.25l-2.46,-1.42l-0.28,-0.77l-0.66,-0.45l-0.45,-0.0l-0.11,1.04l-1.32,-0.95l0.31,-1.3l-0.36,-0.6l0.31,-0.27l1.42,0.58l1.29,-0.14l0.56,0.56l0.74,0.17l0.55,-0.27Z"
                                                        data-code="CR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M221.21,227.25l1.27,1.02l2.19,-0.28l4.43,3.33l2.08,0.43l-0.1,0.38l0.36,0.5l1.75,0.1l1.48,0.84l-3.11,0.51l-4.15,-0.03l0.77,-0.67l-0.04,-0.64l-1.2,-0.74l-1.49,-0.16l-0.7,-0.61l-0.56,-1.4l-0.4,-0.25l-1.34,0.1l-2.2,-0.66l-0.88,-0.58l-3.18,-0.4l-0.27,-0.16l0.58,-0.74l-0.36,-0.29l-2.72,-0.05l-1.7,1.29l-0.91,0.03l-0.61,0.69l-1.01,0.22l1.11,-1.29l1.01,-0.52l3.69,-1.01l3.98,0.21l2.21,0.84Z"
                                                        data-code="CU" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M500.35,351.36l0.5,2.04l-0.38,0.89l-1.05,0.21l-1.23,-1.2l-0.02,-0.64l0.83,-1.57l1.34,0.27Z"
                                                        data-code="SZ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M511.0,199.79l0.05,-1.33l0.54,-1.36l1.28,-0.99l0.13,-0.45l-0.41,-1.11l-1.14,-0.36l-0.19,-1.74l0.52,-1.0l1.29,-1.21l0.2,-1.18l0.59,0.23l2.62,-0.76l1.36,0.52l2.06,-0.01l2.95,-1.08l3.25,-0.26l-0.67,0.94l-1.28,0.66l-0.21,0.4l0.23,2.01l-0.88,3.19l-10.15,5.73l-2.15,-0.85Z"
                                                        data-code="SY" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M621.35,172.32l-3.87,1.69l-0.96,1.18l-3.04,0.34l-1.13,1.86l-2.36,-0.35l-1.99,0.63l-2.39,1.4l0.06,0.95l-0.4,0.37l-4.52,0.43l-3.02,-0.93l-2.37,0.17l0.11,-0.79l2.32,0.42l1.13,-0.88l1.99,0.2l3.21,-2.14l-0.03,-0.69l-2.97,-1.57l-1.94,0.65l-1.22,-0.74l1.71,-1.58l-0.12,-0.67l-0.36,-0.15l0.32,-0.77l1.36,-0.35l4.02,1.02l0.49,-0.3l0.35,-1.59l1.09,-0.48l3.42,1.22l1.11,-0.31l7.64,0.39l1.16,1.0l1.23,0.39Z"
                                                        data-code="KG" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M506.26,284.69l1.87,-2.56l0.93,-2.15l-1.38,-4.08l-1.06,-1.6l2.82,-2.75l0.79,0.26l0.12,1.41l0.86,0.83l1.9,0.11l3.28,2.13l3.57,0.44l1.05,-1.12l1.96,-0.9l0.82,0.68l1.16,0.09l-1.78,2.45l0.03,9.12l1.3,1.94l-1.37,0.78l-0.67,1.03l-1.08,0.46l-0.34,1.67l-0.81,1.07l-0.45,1.55l-0.68,0.56l-3.2,-2.23l-0.35,-1.58l-8.86,-4.98l0.14,-1.6l-0.57,-1.04Z"
                                                        data-code="KE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M481.71,263.34l1.07,-0.72l1.2,-3.18l1.36,-0.26l1.61,1.99l0.87,0.34l1.1,-0.41l1.5,0.07l0.57,0.53l2.49,0.0l0.44,-0.63l1.07,-0.4l0.45,-0.84l0.59,-0.33l1.9,1.33l1.6,-0.2l2.83,-3.33l-0.32,-2.21l1.59,-0.52l-0.24,1.6l0.3,1.83l1.35,1.18l0.2,1.87l0.35,0.41l0.02,1.53l-0.23,0.47l-1.42,0.25l-0.85,1.44l0.3,0.6l1.4,0.16l1.11,1.08l0.59,1.13l1.03,0.53l1.28,2.36l-4.41,3.98l-1.74,0.01l-1.89,0.55l-1.47,-0.52l-1.15,0.57l-2.96,-2.62l-1.3,0.49l-1.06,-0.15l-0.79,0.39l-0.82,-0.22l-1.8,-2.7l-1.91,-1.1l-0.66,-1.5l-2.62,-2.32l-0.18,-0.94l-2.37,-1.6Z"
                                                        data-code="SS" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M283.12,270.19l2.1,0.53l-1.08,1.95l0.2,1.72l0.93,1.49l-0.59,2.03l-0.43,0.71l-1.12,-0.42l-1.32,0.22l-0.93,-0.2l-0.46,0.26l-0.25,0.73l0.33,0.7l-0.89,-0.13l-1.39,-1.97l-0.31,-1.34l-0.97,-0.31l-0.89,-1.47l0.35,-1.61l1.45,-0.82l0.33,-1.87l2.61,0.44l0.57,-0.47l1.75,-0.16Z"
                                                        data-code="SR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M689.52,249.39l0.49,1.45l-0.28,2.74l-4.0,1.86l-0.16,0.6l0.68,0.95l-2.06,0.17l-2.05,0.97l-1.82,-0.32l-2.12,-3.7l-0.55,-2.85l1.4,-1.85l3.02,-0.45l2.23,0.35l2.01,0.98l0.51,-0.14l0.95,-1.48l1.74,0.74Z"
                                                        data-code="KH" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M195.8,250.13l1.4,-1.19l2.24,1.45l0.98,-0.27l0.44,0.2l-0.27,1.05l-1.14,-0.03l-3.64,-1.21Z"
                                                        data-code="SV" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M476.82,151.17l-1.14,1.9l-2.73,-0.92l-0.82,0.2l-0.74,0.8l-3.46,0.73l-0.47,0.69l-1.76,0.33l-1.88,-1.0l-0.18,-0.81l0.38,-0.75l1.87,-0.32l1.74,-1.89l0.83,0.16l0.79,-0.34l1.51,1.04l1.34,-0.63l1.25,0.3l1.65,-0.42l1.81,0.95Z"
                                                        data-code="SK" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M737.51,185.84l0.98,-0.1l0.87,-1.17l2.69,-0.32l0.33,-0.29l1.76,2.79l0.58,1.76l0.02,3.12l-0.8,1.32l-2.21,0.55l-1.93,1.13l-1.8,0.19l-0.2,-1.1l0.43,-2.28l-0.95,-2.56l1.43,-0.37l0.23,-0.62l-1.43,-2.06Z"
                                                        data-code="KR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M456.18,162.07l-0.51,-1.32l0.18,-1.05l1.69,0.2l1.42,-0.71l2.09,-0.07l0.62,-0.51l0.21,0.47l-1.61,0.67l-0.44,1.34l-0.66,0.24l-0.26,0.82l-1.22,-0.49l-0.84,0.46l-0.69,-0.04Z"
                                                        data-code="SI" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M736.77,185.16l-0.92,-0.42l-0.88,0.62l-1.21,-0.88l0.96,-1.15l0.59,-2.59l-0.46,-0.74l-2.09,-0.77l1.64,-1.52l2.72,-1.58l1.58,-1.91l1.11,0.78l2.17,0.11l0.41,-0.5l-0.3,-1.22l3.52,-1.18l0.94,-1.4l0.98,1.08l-2.19,2.18l0.01,2.14l-1.06,0.54l-1.41,1.4l-1.7,0.52l-1.25,1.09l-0.14,1.98l0.94,0.45l1.15,1.04l-0.13,0.26l-2.6,0.29l-1.13,1.29l-1.22,0.08Z"
                                                        data-code="KP" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M525.13,288.48l-1.13,-1.57l-0.03,-8.86l2.66,-3.38l1.67,-0.13l2.13,-1.69l3.41,-0.23l7.08,-7.55l2.91,-3.69l0.08,-4.82l2.98,-0.67l1.24,-0.86l0.45,-0.0l-0.2,3.0l-1.21,3.62l-2.73,5.97l-2.13,3.65l-5.03,6.16l-8.56,6.4l-2.78,3.08l-0.8,1.56Z"
                                                        data-code="SO" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M390.09,248.21l0.12,1.55l0.49,1.46l0.96,0.82l0.05,1.28l-1.26,-0.19l-0.75,0.33l-1.84,-0.61l-5.84,-0.13l-2.54,0.51l-0.22,-1.03l1.77,0.04l2.01,-0.91l1.03,0.48l1.09,0.04l1.29,-0.62l0.14,-0.58l-0.51,-0.74l-1.81,0.25l-1.13,-0.63l-0.79,0.04l-0.72,0.61l-2.31,0.06l-0.92,-1.77l-0.81,-0.64l0.64,-0.35l2.46,-3.74l1.04,0.19l1.38,-0.56l1.19,-0.02l2.72,1.37l3.03,3.48Z"
                                                        data-code="SN" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M394.46,264.11l-1.73,1.98l-0.58,1.33l-2.07,-1.06l-1.22,-1.26l-0.65,-2.39l1.16,-0.96l0.67,-1.17l1.21,-0.52l1.66,0.0l1.03,1.64l0.52,2.41Z"
                                                        data-code="SL" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M826.69,311.6l-0.61,0.09l-0.2,-0.33l0.37,0.15l0.44,0.09ZM824.18,307.38l-0.26,-0.3l-0.31,-0.91l0.03,0.0l0.54,1.21ZM823.04,309.33l-1.66,-0.22l-0.2,-0.52l1.16,0.28l0.69,0.46ZM819.28,304.68l1.14,0.65l0.02,0.03l-0.81,-0.44l-0.35,-0.23Z"
                                                        data-code="SB" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M537.53,210.34l2.0,0.24l0.9,1.32l1.49,-0.06l0.87,2.08l1.29,0.76l0.51,0.99l1.56,1.03l-0.1,1.9l0.32,0.9l1.58,2.47l0.76,0.53l0.7,-0.04l1.68,4.23l7.53,1.33l0.51,-0.29l0.77,1.25l-1.55,4.87l-7.29,2.52l-7.3,1.03l-2.34,1.17l-1.88,2.74l-0.76,0.28l-0.82,-0.78l-0.91,0.12l-2.88,-0.51l-3.51,0.25l-0.86,-0.56l-0.57,0.15l-0.66,1.27l0.16,1.11l-0.43,0.32l-0.93,-1.4l-0.33,-1.16l-1.23,-0.88l-1.27,-2.06l-0.78,-2.22l-1.73,-1.79l-1.14,-0.48l-1.54,-2.31l-0.21,-3.41l-1.44,-2.93l-1.27,-1.16l-1.33,-0.57l-1.31,-3.37l-0.77,-0.67l-0.97,-1.97l-2.8,-4.03l-1.06,-0.17l0.37,-1.96l0.2,-0.72l2.74,0.3l1.08,-0.84l0.6,-0.94l1.74,-0.35l0.65,-1.03l0.71,-0.4l0.1,-0.62l-2.06,-2.28l4.39,-1.22l0.48,-0.37l2.77,0.69l3.66,1.9l7.03,5.5l4.87,0.3Z"
                                                        data-code="SA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M480.22,89.3l-4.03,1.17l-2.43,2.86l0.26,2.57l-8.77,6.64l-1.78,5.79l1.78,2.68l2.22,1.96l-2.07,3.77l-2.72,1.13l-0.95,6.04l-1.29,3.01l-2.74,-0.31l-0.4,0.22l-1.31,2.59l-2.34,0.13l-0.75,-3.09l-2.08,-4.03l-1.83,-4.96l1.0,-1.93l2.14,-2.7l0.83,-4.45l-1.6,-2.17l-0.15,-4.94l1.48,-3.39l2.58,-0.15l0.87,-1.59l-0.78,-1.57l3.76,-5.59l4.04,-7.48l2.17,0.01l0.39,-0.29l0.57,-2.07l4.37,0.64l0.46,-0.34l0.33,-2.56l1.1,-0.13l6.94,4.87l0.06,6.32l0.66,1.36Z"
                                                        data-code="SE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M505.98,259.4l-0.34,-0.77l-1.17,-0.9l-0.26,-1.61l0.29,-1.81l-0.34,-0.46l-1.16,-0.17l-0.54,0.59l-1.23,0.11l-0.28,0.65l0.53,0.65l0.17,1.22l-2.44,3.0l-0.96,0.19l-2.39,-1.4l-0.95,0.52l-0.38,0.78l-1.11,0.41l-0.29,0.5l-1.94,0.0l-0.54,-0.52l-1.81,-0.09l-0.95,0.4l-2.45,-2.35l-2.07,0.54l-0.73,1.26l-0.6,2.1l-1.25,0.58l-0.75,-0.62l0.27,-2.65l-1.48,-1.78l-0.22,-1.48l-0.92,-0.96l-0.02,-1.29l-0.57,-1.16l-0.68,-0.16l0.69,-1.29l-0.18,-1.14l0.65,-0.62l0.03,-0.55l-0.36,-0.41l1.55,-2.97l1.91,0.16l0.43,-0.4l-0.1,-10.94l2.49,-0.01l0.4,-0.4l-0.0,-4.82l29.02,0.0l0.64,2.04l-0.49,0.66l0.36,2.69l0.93,3.16l2.12,1.55l-0.89,1.04l-1.72,0.39l-0.98,0.9l-1.43,5.65l0.24,1.15l-0.38,2.06l-0.96,2.38l-1.53,1.31l-1.32,2.91l-1.22,0.86l-0.37,1.34Z"
                                                        data-code="SD" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M241.8,239.2l0.05,-0.65l-0.46,-0.73l0.42,-0.44l0.19,-1.0l-0.09,-1.53l1.66,0.01l1.99,0.63l0.33,0.67l1.28,0.19l0.33,0.76l1.0,0.08l0.8,0.62l-0.45,0.51l-1.13,-0.47l-1.88,-0.01l-1.27,0.59l-0.75,-0.55l-1.01,0.54l-0.79,1.4l-0.23,-0.61Z"
                                                        data-code="DO" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M528.43,256.18l-0.45,0.66l-0.58,-0.25l-1.51,0.13l-0.18,-1.01l1.45,-1.95l0.83,0.17l0.77,-0.44l0.2,1.0l-1.2,0.51l-0.06,0.7l0.73,0.47Z"
                                                        data-code="DJ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M452.28,129.07l-1.19,2.24l-2.13,-1.6l-0.23,-0.95l2.98,-0.95l0.57,1.26ZM447.74,126.31l-0.26,0.57l-0.88,-0.07l-1.8,2.53l0.48,1.69l-1.09,0.36l-1.61,-0.39l-0.89,-1.69l-0.07,-3.43l0.96,-1.73l2.02,-0.2l1.09,-1.07l1.33,-0.67l-0.05,1.06l-0.73,1.41l0.3,1.0l1.2,0.64Z"
                                                        data-code="DK" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M453.14,155.55l-0.55,-0.36l-1.2,-0.1l-1.87,0.57l-2.13,-0.13l-0.56,0.63l-0.86,-0.6l-0.96,0.09l-2.57,-0.93l-0.85,0.67l-1.47,-0.02l0.24,-1.75l1.23,-2.14l-0.28,-0.59l-3.52,-0.58l-0.92,-0.66l0.12,-1.2l-0.48,-0.88l0.27,-2.17l-0.37,-3.03l1.41,-0.22l0.63,-1.26l0.66,-3.19l-0.41,-1.18l0.26,-0.39l1.66,-0.15l0.33,0.54l0.62,0.07l1.7,-1.69l-0.54,-3.02l1.37,0.33l1.31,-0.37l0.31,1.18l2.25,0.71l-0.02,0.92l0.5,0.4l2.55,-0.65l1.34,-0.87l2.57,1.24l1.06,0.98l0.48,1.44l-0.57,0.74l-0.0,0.48l0.87,1.15l0.57,1.64l-0.14,1.29l0.82,1.7l-1.5,-0.07l-0.56,0.57l-4.47,2.15l-0.22,0.54l0.68,2.26l2.58,2.16l-0.66,1.11l-0.79,0.36l-0.23,0.43l0.32,1.87Z"
                                                        data-code="DE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M528.27,246.72l0.26,-0.42l-0.22,-1.01l0.19,-1.5l0.92,-0.69l-0.07,-1.35l0.39,-0.75l1.01,0.47l3.34,-0.27l3.76,0.41l0.95,0.81l1.36,-0.58l1.74,-2.62l2.18,-1.09l6.86,-0.94l2.48,5.41l-1.64,0.76l-0.56,1.9l-6.23,2.16l-2.29,1.8l-1.93,0.05l-1.41,1.02l-4.24,0.74l-1.72,1.49l-3.28,0.19l-0.52,-1.18l0.02,-1.51l-1.34,-3.29Z"
                                                        data-code="YE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M462.89,152.8l0.04,2.25l-1.07,0.0l-0.33,0.63l0.36,0.51l-1.04,2.13l-2.02,0.07l-1.33,0.7l-5.29,-0.99l-0.47,-0.93l-0.44,-0.21l-2.47,0.55l-0.42,0.51l-3.18,-0.81l0.43,-0.91l1.12,0.78l0.6,-0.17l0.25,-0.58l1.93,0.12l1.86,-0.56l1.0,0.08l0.68,0.57l0.62,-0.15l0.26,-0.77l-0.3,-1.78l0.8,-0.44l0.68,-1.15l1.52,0.85l0.47,-0.06l1.34,-1.25l0.64,-0.17l1.81,0.92l1.28,-0.11l0.7,0.37Z"
                                                        data-code="AT" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M441.46,188.44l-0.32,1.07l0.39,2.64l-0.54,2.16l-1.58,1.82l0.37,2.39l1.91,1.55l0.18,0.8l1.42,1.03l1.84,7.23l0.12,1.16l-0.57,5.0l0.2,1.51l-0.87,0.99l-0.02,0.51l1.41,1.86l0.14,1.2l0.89,1.48l0.5,0.16l0.98,-0.41l1.73,1.08l0.82,1.23l-8.22,4.81l-7.23,5.11l-3.43,1.13l-2.3,0.21l-0.28,-1.59l-2.56,-1.09l-0.67,-1.25l-26.12,-17.86l0.01,-3.47l3.77,-1.88l2.44,-0.41l2.12,-0.75l1.08,-1.42l2.81,-1.05l0.35,-2.08l1.33,-0.29l1.04,-0.94l3.47,-0.69l0.46,-1.08l-0.1,-0.45l-0.58,-0.52l-0.82,-2.81l-0.19,-1.83l-0.78,-1.49l2.03,-1.31l2.63,-0.48l1.7,-1.22l2.31,-0.84l8.24,-0.73l1.49,0.38l2.28,-1.1l2.46,-0.02l0.92,0.6l1.35,-0.05Z"
                                                        data-code="DZ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M892.72,99.2l1.31,0.53l1.41,-0.37l1.89,0.98l1.89,0.42l-1.32,0.58l-2.9,-1.53l-2.08,0.22l-0.26,-0.15l0.07,-0.67ZM183.22,150.47l0.37,1.47l1.12,0.85l4.23,0.7l2.39,0.98l2.17,-0.38l1.85,0.5l-1.55,0.65l-3.49,2.61l-0.16,0.77l0.5,0.39l2.33,-0.61l1.77,1.02l5.15,-2.4l-0.31,0.65l0.25,0.56l1.36,0.38l1.71,1.16l4.7,-0.88l0.67,0.85l1.31,0.21l0.58,0.58l-1.34,0.17l-2.18,-0.32l-3.6,0.89l-2.71,3.25l0.35,0.9l0.59,-0.0l0.55,-0.6l-1.36,4.65l0.29,3.09l0.67,1.58l0.61,0.45l1.77,-0.44l1.6,-1.96l0.14,-2.21l-0.82,-1.96l0.11,-1.13l1.19,-2.37l0.44,-0.33l0.48,0.75l0.4,-0.29l0.4,-1.37l0.6,-0.47l0.24,-0.8l1.69,0.49l1.65,1.08l-0.03,2.37l-1.27,1.13l-0.0,1.13l0.87,0.36l1.66,-1.29l0.5,0.17l0.5,2.6l-2.49,3.75l0.17,0.61l1.54,0.62l1.48,0.17l1.92,-0.44l4.72,-2.15l2.16,-1.8l-0.05,-1.24l0.75,-0.22l3.92,0.36l2.12,-1.05l0.21,-0.4l-0.28,-1.48l3.27,-2.4l8.32,-0.02l0.56,-0.82l1.9,-0.77l0.93,-1.51l0.74,-2.37l1.58,-1.98l0.92,0.62l1.47,-0.47l0.8,0.66l-0.0,4.09l1.96,2.6l-2.34,1.31l-5.37,2.09l-1.83,2.72l0.02,1.79l0.83,1.59l0.54,0.23l-6.19,0.94l-2.2,0.89l-0.23,0.48l0.45,0.29l2.99,-0.46l-2.19,0.56l-1.13,0.0l-0.15,-0.32l-0.48,0.08l-0.76,0.82l0.22,0.67l0.32,0.06l-0.41,1.62l-1.27,1.58l-1.48,-1.07l-0.49,-0.04l-0.16,0.46l0.52,1.58l0.61,0.59l0.03,0.79l-0.95,1.38l-1.21,-1.22l-0.27,-2.27l-0.35,-0.35l-0.42,0.25l-0.48,1.27l0.33,1.41l-0.97,-0.27l-0.48,0.24l0.18,0.5l1.52,0.83l0.1,2.52l0.79,0.51l0.52,3.42l-1.42,1.88l-2.47,0.8l-1.71,1.66l-1.31,0.25l-1.27,1.03l-0.43,0.99l-2.69,1.78l-2.64,3.03l-0.45,2.12l0.45,2.08l0.85,2.38l1.09,1.9l0.04,1.2l1.16,3.06l-0.18,2.69l-0.55,1.43l-0.47,0.21l-0.89,-0.23l-0.49,-1.18l-0.87,-0.56l-2.75,-5.16l0.48,-1.68l-0.72,-1.78l-2.01,-2.38l-1.12,-0.53l-2.72,1.18l-1.47,-1.35l-1.57,-0.68l-2.99,0.31l-2.17,-0.3l-2.0,0.19l-1.15,0.46l-0.19,0.58l0.39,0.63l0.14,1.34l-0.84,-0.2l-0.84,0.46l-1.58,-0.07l-2.08,-1.44l-2.09,0.33l-1.91,-0.62l-3.73,0.84l-2.39,2.07l-2.54,1.22l-1.45,1.41l-0.61,1.38l0.34,3.71l-0.29,0.02l-3.5,-1.33l-1.25,-3.11l-1.44,-1.5l-2.24,-3.56l-1.76,-1.09l-2.27,-0.01l-1.71,2.07l-1.76,-0.69l-1.16,-0.74l-1.52,-2.98l-3.93,-3.16l-4.34,-0.0l-0.4,0.4l-0.0,0.74l-6.5,0.02l-9.02,-3.14l-0.34,-0.71l-5.7,0.49l-0.43,-1.29l-1.62,-1.61l-1.14,-0.38l-0.55,-0.88l-1.28,-0.13l-1.01,-0.77l-2.22,-0.27l-0.43,-0.3l-0.36,-1.58l-2.4,-2.83l-2.01,-3.85l-0.06,-0.9l-2.92,-3.26l-0.33,-2.29l-1.3,-1.66l0.52,-2.37l-0.09,-2.57l-0.78,-2.3l0.95,-2.82l0.61,-5.68l-0.47,-4.27l-1.46,-4.08l3.19,0.79l1.26,2.83l0.69,0.08l0.69,-1.14l-1.1,-4.79l68.76,-0.0l0.4,-0.4l0.14,-0.86ZM32.44,67.52l1.73,1.97l0.55,0.05l0.99,-0.79l3.65,0.24l-0.09,0.62l0.32,0.45l3.83,0.77l2.61,-0.43l5.19,1.4l4.84,0.43l1.89,0.57l3.42,-0.7l6.14,1.87l-0.03,38.06l0.38,0.4l2.39,0.11l2.31,0.98l3.9,3.99l0.55,0.04l2.4,-2.03l2.16,-1.04l1.2,1.71l3.95,3.14l4.09,6.63l4.2,2.29l0.06,1.83l-1.02,1.23l-1.16,-1.08l-2.04,-1.03l-0.67,-2.89l-3.28,-3.03l-1.65,-3.57l-6.35,-0.32l-2.82,-1.01l-5.26,-3.85l-6.77,-2.04l-3.53,0.3l-4.81,-1.69l-3.25,-1.63l-2.78,0.8l-0.28,0.46l0.44,2.21l-3.91,0.96l-2.26,1.27l-2.3,0.65l-0.27,-1.65l1.05,-3.42l2.49,-1.09l0.16,-0.6l-0.69,-0.96l-0.55,-0.1l-3.19,2.12l-1.78,2.56l-3.55,2.61l-0.04,0.61l1.56,1.52l-2.07,2.29l-5.11,2.57l-0.77,1.66l-3.76,1.77l-0.92,1.73l-2.69,1.38l-1.81,-0.22l-6.95,3.32l-3.97,0.91l4.85,-2.5l2.59,-1.86l3.26,-0.52l1.19,-1.4l3.42,-2.1l2.59,-2.27l0.42,-2.68l1.23,-2.1l-0.04,-0.46l-0.45,-0.11l-2.68,1.03l-0.63,-0.49l-0.53,0.03l-1.05,1.04l-1.36,-1.54l-0.66,0.08l-0.32,0.62l-0.58,-1.14l-0.56,-0.16l-2.41,1.42l-1.07,-0.0l-0.17,-1.75l0.3,-1.71l-1.61,-1.33l-3.41,0.59l-1.96,-1.63l-1.57,-0.84l-0.15,-2.21l-1.7,-1.43l0.82,-1.88l1.99,-2.12l0.88,-1.92l1.71,-0.24l2.04,0.51l1.87,-1.77l1.91,0.25l1.91,-1.23l0.17,-0.43l-0.47,-1.82l-1.07,-0.7l1.39,-1.17l0.12,-0.45l-0.39,-0.26l-1.65,0.07l-2.66,0.88l-0.75,0.78l-1.92,-0.8l-3.46,0.44l-3.44,-0.91l-1.06,-1.61l-2.65,-1.99l2.91,-1.43l5.5,-2.0l1.52,0.0l-0.26,1.62l0.41,0.46l5.29,-0.16l0.3,-0.65l-2.03,-2.59l-3.14,-1.68l-1.79,-2.12l-2.4,-1.83l-3.09,-1.24l1.04,-1.69l4.23,-0.14l3.36,-2.07l0.73,-2.27l2.39,-1.99l2.42,-0.52l4.65,-1.97l2.46,0.23l3.71,-2.35l3.5,0.89ZM37.6,123.41l-2.25,1.23l-0.95,-0.69l-0.29,-1.24l3.21,-1.63l1.42,0.21l0.67,0.7l-1.8,1.42ZM31.06,234.03l0.98,0.47l0.74,0.87l-1.77,1.07l-0.44,-1.53l0.49,-0.89ZM29.34,232.07l0.18,0.05l0.08,0.05l-0.16,0.03l-0.11,-0.14ZM25.16,230.17l0.05,-0.03l0.18,0.22l-0.13,-0.01l-0.1,-0.18ZM5.89,113.26l-1.08,0.41l-2.21,-1.12l1.53,-0.4l1.62,0.28l0.14,0.83Z"
                                                        data-code="US" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M489.16,122.85l0.96,0.66l0.22,1.65l0.68,1.76l-3.65,1.7l-2.23,-1.58l-1.29,-0.26l-0.68,-0.77l-2.42,0.34l-4.16,-0.23l-2.47,0.9l0.06,-1.98l1.13,-2.06l1.95,-1.02l2.12,2.58l2.01,-0.07l0.38,-0.33l0.44,-2.52l1.76,-0.53l3.06,1.7l2.15,0.07Z"
                                                        data-code="LV" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M286.85,372.74l-0.92,1.5l-2.59,1.44l-1.69,-0.52l-1.42,0.26l-2.39,-1.19l-1.52,0.08l-1.27,-1.3l0.16,-1.5l0.56,-0.79l-0.02,-2.73l1.21,-4.74l1.19,-0.21l2.37,2.0l1.08,0.03l4.36,3.17l1.22,1.6l-0.96,1.5l0.61,1.4Z"
                                                        data-code="UY" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M510.37,198.01l-0.88,0.51l1.82,-3.54l0.62,0.08l0.22,0.61l-1.13,0.88l-0.65,1.47Z"
                                                        data-code="LB" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M689.54,248.53l-1.76,-0.74l-0.49,0.15l-0.94,1.46l-1.32,-0.64l0.62,-0.98l0.11,-2.17l-2.04,-2.42l-0.25,-2.65l-1.9,-2.1l-2.15,-0.31l-0.78,0.91l-1.12,0.06l-1.05,-0.4l-2.06,1.2l-0.04,-1.59l0.61,-2.68l-0.36,-0.49l-1.35,-0.1l-0.11,-1.23l-0.96,-0.88l1.96,-1.89l0.39,0.36l1.33,0.07l0.42,-0.45l-0.34,-2.66l0.7,-0.21l1.28,1.81l1.11,2.35l0.36,0.23l2.82,0.02l0.71,1.67l-1.39,0.65l-0.72,0.93l0.13,0.6l2.91,1.51l3.6,5.25l1.88,1.78l0.56,1.62l-0.35,1.96Z"
                                                        data-code="LA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M724.01,226.68l-0.74,1.48l-0.9,-1.52l-0.25,-1.74l1.38,-2.44l1.73,-1.74l0.64,0.44l-1.85,5.52Z"
                                                        data-code="TW" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path d="M266.64,259.32l0.28,-1.16l1.13,-0.22l-0.06,1.2l-1.35,0.18Z"
                                                        data-code="TT" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M513.21,175.47l3.64,1.17l3.05,-0.44l2.1,0.26l3.11,-1.56l2.46,-0.13l2.19,1.33l0.33,0.82l-0.22,1.33l0.25,0.44l2.28,1.13l-1.17,0.57l-0.21,0.45l0.75,3.2l-0.41,1.16l1.13,1.92l-0.55,0.22l-0.9,-0.67l-2.91,-0.37l-1.24,0.46l-4.23,0.41l-2.81,1.05l-1.91,0.01l-1.52,-0.53l-2.58,0.75l-0.66,-0.45l-0.62,0.3l-0.12,1.45l-0.89,0.84l-0.47,-0.67l0.79,-1.3l-0.41,-0.2l-1.43,0.23l-2.0,-0.63l-2.02,1.65l-3.51,0.3l-2.13,-1.53l-2.7,-0.1l-0.86,1.24l-1.38,0.27l-2.29,-1.44l-2.71,-0.01l-1.37,-2.65l-1.68,-1.52l1.07,-1.99l-0.09,-0.49l-1.27,-1.12l2.37,-2.41l3.7,-0.11l1.28,-2.24l4.49,0.37l3.21,-1.97l2.81,-0.82l3.99,-0.06l4.29,2.07ZM488.79,176.72l-1.72,1.31l-0.5,-0.88l1.37,-2.57l-0.7,-0.85l1.7,-0.63l1.8,0.34l0.46,1.17l1.76,0.78l-2.87,0.32l-1.3,1.01Z"
                                                        data-code="TR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M624.16,268.99l-1.82,0.48l-0.99,-1.67l-0.42,-3.46l0.95,-3.43l1.21,0.98l2.26,4.19l-0.34,2.33l-0.85,0.58Z"
                                                        data-code="LK" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M448.1,188.24l-1.0,1.27l-0.02,1.32l0.84,0.88l-0.28,2.09l-1.53,1.32l-0.12,0.42l0.48,1.54l1.42,0.32l0.53,1.11l0.9,0.52l-0.11,1.67l-3.54,2.64l-0.1,2.38l-0.58,0.3l-0.96,-4.45l-1.54,-1.25l-0.16,-0.78l-1.92,-1.56l-0.18,-1.76l1.51,-1.62l0.59,-2.34l-0.38,-2.78l0.42,-1.21l2.45,-1.05l1.29,0.26l-0.06,1.11l0.58,0.38l1.47,-0.73Z"
                                                        data-code="TN" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path d="M734.55,307.93l-0.1,-0.97l4.5,-0.86l-2.82,1.28l-1.59,0.55Z"
                                                        data-code="TL" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M553.03,173.76l-0.04,0.34l-0.09,-0.22l0.13,-0.12ZM555.87,172.66l0.45,-0.1l1.48,0.74l2.06,2.43l4.07,-0.18l0.38,-0.51l-0.32,-1.19l1.92,-0.94l1.91,-1.59l2.94,1.39l0.43,2.47l1.19,0.67l2.58,-0.13l0.62,0.4l1.32,3.12l4.54,3.44l2.67,1.45l3.06,1.14l-0.04,1.05l-1.33,-0.75l-0.59,0.19l-0.32,0.84l-2.2,0.81l-0.46,2.13l-1.21,0.74l-1.91,0.42l-0.73,1.33l-1.56,0.31l-2.22,-0.94l-0.2,-2.17l-0.38,-0.36l-1.73,-0.09l-2.76,-2.46l-2.14,-0.4l-2.84,-1.48l-1.78,-0.27l-1.24,0.53l-1.57,-0.08l-2.0,1.69l-1.7,0.43l-0.36,-1.58l0.36,-2.98l-0.22,-0.4l-1.65,-0.84l0.54,-1.69l-0.34,-0.52l-1.22,-0.13l0.36,-1.64l2.22,0.59l2.2,-0.95l0.12,-0.65l-1.77,-1.74l-0.66,-1.57Z"
                                                        data-code="TM" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M597.75,178.82l-2.54,-0.44l-0.47,0.34l-0.24,1.7l0.43,0.45l2.64,-0.22l3.18,0.95l4.39,-0.41l0.56,2.37l0.52,0.29l0.67,-0.24l1.11,0.49l0.21,2.13l-3.76,-0.21l-1.8,1.32l-1.76,0.74l-0.61,-0.58l0.21,-2.23l-0.64,-0.49l-0.07,-0.93l-1.36,-0.66l-0.45,0.07l-1.08,1.01l-0.55,1.48l-1.31,-0.05l-0.95,1.16l-0.9,-0.35l-1.86,0.74l1.26,-2.83l-0.54,-2.17l-1.67,-0.82l0.33,-0.66l2.18,-0.04l1.19,-1.63l0.76,-1.79l2.43,-0.5l-0.26,1.0l0.73,1.05Z"
                                                        data-code="TJ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M491.06,363.48l-0.49,0.15l-1.49,-1.67l1.1,-1.43l2.19,-1.44l1.51,1.27l-0.98,1.82l-1.23,0.38l-0.62,0.93Z"
                                                        data-code="LS" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M670.27,255.86l-1.41,3.87l0.15,2.0l0.38,0.36l1.38,0.07l0.9,2.04l0.55,2.34l1.4,1.44l1.61,0.38l0.96,0.97l-0.5,0.64l-1.1,0.2l-0.34,-1.18l-2.04,-1.1l-0.63,0.23l-0.63,-0.62l-0.48,-1.3l-2.56,-2.63l-0.73,0.41l0.95,-3.89l2.16,-4.22ZM670.67,254.77l-0.92,-2.18l-0.26,-2.61l-2.14,-3.06l0.71,-0.49l0.89,-2.59l-3.61,-5.45l0.87,-0.51l1.05,-2.58l1.74,-0.18l2.6,-1.59l0.76,0.56l0.13,1.39l0.37,0.36l1.23,0.09l-0.51,2.28l0.05,2.42l0.6,0.34l2.43,-1.42l0.77,0.39l1.47,-0.07l0.71,-0.88l1.48,0.14l1.71,1.88l0.25,2.65l1.92,2.11l-0.1,1.89l-0.61,0.86l-2.22,-0.33l-3.5,0.64l-1.6,2.12l0.36,2.58l-1.51,-0.79l-1.84,-0.01l0.28,-1.52l-0.4,-0.47l-2.21,0.01l-0.4,0.37l-0.19,2.74l-0.34,0.93Z"
                                                        data-code="TH" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M596.68,420.38l-3.2,0.18l-0.05,-1.26l0.39,-1.41l1.3,0.78l2.08,0.35l-0.52,1.36Z"
                                                        data-code="TF" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M422.7,257.63l-0.09,1.23l1.53,1.52l0.08,1.09l0.5,0.65l-0.11,5.62l0.49,1.47l-1.31,0.35l-1.02,-2.13l-0.18,-1.12l0.53,-2.19l-0.63,-1.16l-0.22,-3.68l-1.01,-1.4l0.07,-0.28l1.37,0.03Z"
                                                        data-code="TG" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M480.25,235.49l0.12,9.57l-2.1,0.05l-1.14,1.89l-0.69,1.63l0.34,0.73l-0.66,0.91l0.24,0.89l-0.86,1.95l0.45,0.5l0.6,-0.1l0.34,0.64l0.03,1.38l0.9,1.04l-1.45,0.43l-1.27,1.03l-1.83,2.76l-2.16,1.07l-2.31,-0.15l-0.86,0.25l-0.26,0.49l0.17,0.61l-2.11,1.68l-2.85,0.87l-1.09,-0.57l-0.73,0.66l-1.12,0.1l-1.1,-3.12l-1.25,-0.64l-1.22,-1.22l0.29,-0.64l3.01,0.04l0.35,-0.6l-1.3,-2.2l-0.08,-3.31l-0.97,-1.66l0.22,-1.04l-0.38,-0.48l-1.22,-0.04l0.0,-1.25l-0.98,-1.07l0.96,-3.01l3.25,-2.65l0.13,-3.33l0.95,-5.18l0.52,-1.07l-0.1,-0.48l-0.91,-0.78l-0.2,-0.96l-0.8,-0.58l-0.55,-3.65l2.1,-1.2l19.57,9.83Z"
                                                        data-code="TD" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M483.48,203.15l-0.75,1.1l0.29,1.39l-0.6,1.83l0.73,2.14l0.0,24.12l-2.48,0.01l-0.41,0.85l-19.41,-9.76l-4.41,2.28l-1.37,-1.33l-3.82,-1.1l-1.14,-1.65l-1.98,-1.23l-1.22,0.32l-0.66,-1.11l-0.17,-1.26l-1.28,-1.69l0.87,-1.19l-0.07,-4.34l0.43,-2.27l-0.86,-3.45l1.13,-0.76l0.22,-1.16l-0.2,-1.03l3.48,-2.61l0.29,-1.94l2.45,0.8l1.18,-0.21l1.98,0.44l3.15,1.18l1.37,2.54l5.72,1.67l2.64,1.35l1.61,-0.72l1.29,-1.34l-0.44,-2.34l0.66,-1.13l1.67,-1.21l1.57,-0.35l3.14,0.53l1.08,1.28l3.99,0.78l0.36,0.54Z"
                                                        data-code="LY" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M550.76,223.97l1.88,-0.4l3.84,0.02l4.78,-4.75l0.19,0.36l0.26,1.58l-0.81,0.01l-0.39,0.35l-0.08,2.04l-0.81,0.63l-0.01,0.96l-0.66,0.99l-0.39,1.41l-7.08,-1.25l-0.7,-1.96Z"
                                                        data-code="AE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M240.68,256.69l0.53,0.75l-0.02,1.06l-1.07,1.78l0.95,2.0l0.42,0.22l1.4,-0.44l0.56,-1.83l-0.77,-1.17l-0.1,-1.47l2.82,-0.93l0.26,-0.49l-0.28,-0.96l0.3,-0.28l0.66,1.31l1.96,0.26l1.4,1.22l0.08,0.68l0.39,0.35l4.81,-0.22l1.49,1.11l1.92,0.31l1.67,-0.84l0.22,-0.6l3.44,-0.14l-0.17,0.55l0.86,1.19l2.19,0.35l1.67,1.1l0.37,1.86l0.41,0.32l1.55,0.17l-1.66,1.35l-0.22,0.92l0.65,0.97l-1.67,0.54l-0.3,0.4l0.04,0.99l-0.56,0.57l-0.01,0.55l1.85,2.27l-0.66,0.69l-4.47,1.29l-0.72,0.54l-3.69,-0.9l-0.71,0.27l-0.02,0.7l0.91,0.53l-0.08,1.54l0.35,1.58l0.35,0.31l1.66,0.17l-1.3,0.52l-0.48,1.13l-2.68,0.91l-0.6,0.77l-1.57,0.13l-1.17,-1.13l-0.8,-2.52l-1.25,-1.26l1.02,-1.23l-1.29,-2.95l0.18,-1.62l1.0,-2.21l-0.2,-0.49l-1.14,-0.46l-4.02,0.36l-1.82,-2.1l-1.57,-0.33l-2.99,0.22l-1.06,-0.97l0.25,-1.23l-0.2,-1.01l-0.59,-0.69l-0.29,-1.06l-1.08,-0.39l0.78,-2.79l1.9,-2.11Z"
                                                        data-code="VE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M600.7,188.88l-1.57,1.3l-0.1,0.48l0.8,2.31l-1.09,1.04l-0.03,1.27l-0.48,0.71l-2.16,-0.08l-0.37,0.59l0.78,1.48l-1.38,0.69l-1.06,1.69l0.06,1.7l-0.65,0.52l-0.91,-0.21l-1.91,0.36l-0.48,0.77l-1.88,0.13l-1.4,1.56l-0.18,2.32l-2.91,1.02l-1.65,-0.23l-0.71,0.55l-1.41,-0.3l-2.41,0.39l-3.52,-1.17l1.96,-2.35l-0.21,-1.78l-0.3,-0.34l-1.63,-0.4l-0.19,-1.58l-0.75,-2.03l0.95,-1.36l-0.19,-0.6l-0.73,-0.28l1.47,-4.8l2.14,0.9l2.12,-0.36l0.74,-1.34l1.77,-0.39l1.54,-0.92l0.63,-2.31l1.87,-0.5l0.49,-0.81l0.94,0.56l2.13,0.11l2.55,0.92l1.95,-0.83l0.65,0.43l0.56,-0.13l0.69,-1.12l1.57,-0.08l0.72,-1.66l0.79,-0.74l0.8,0.39l-0.17,0.56l0.71,0.58l-0.08,2.39l1.11,0.95ZM601.37,188.71l1.73,-0.71l1.43,-1.18l4.03,0.35l-2.23,0.74l-4.95,0.8Z"
                                                        data-code="AF" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M530.82,187.47l0.79,0.66l1.26,-0.28l1.46,3.08l1.63,0.94l0.14,1.23l-1.22,1.05l-0.53,2.52l1.73,2.67l3.12,1.62l1.15,1.88l-0.38,1.85l0.39,0.48l0.41,-0.0l0.02,1.07l0.76,0.94l-2.47,-0.1l-1.71,2.44l-4.31,-0.2l-7.02,-5.48l-3.73,-1.94l-2.88,-0.73l-0.85,-2.87l5.45,-3.02l0.95,-3.43l-0.19,-1.96l1.27,-0.7l1.22,-1.7l0.87,-0.36l2.69,0.34Z"
                                                        data-code="IQ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M384.14,88.06l-0.37,2.61l2.54,2.51l-2.9,2.75l-9.19,3.4l-9.25,-1.66l1.7,-1.22l-0.1,-0.7l-4.05,-1.47l2.96,-0.53l0.33,-0.43l-0.11,-1.2l-0.33,-0.36l-4.67,-0.85l1.28,-2.04l3.45,-0.56l3.77,2.72l0.44,0.02l3.64,-2.16l3.3,1.08l3.98,-2.16l3.58,0.26Z"
                                                        data-code="IS" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M533.43,187.16l-1.27,-2.15l0.42,-0.98l-0.71,-3.04l1.03,-0.5l0.33,0.83l1.26,1.35l2.05,0.51l1.11,-0.16l2.89,-2.11l0.62,-0.14l0.39,0.46l-0.72,1.2l0.06,0.49l1.56,1.53l0.65,0.04l0.67,1.81l2.56,0.83l1.87,1.48l3.69,0.49l3.91,-0.76l0.47,-0.73l2.17,-0.6l1.66,-1.54l1.51,0.08l1.18,-0.53l1.59,0.24l2.83,1.48l1.88,0.3l2.77,2.47l1.77,0.18l0.18,1.99l-1.68,5.49l0.24,0.5l0.61,0.23l-0.82,1.48l0.8,2.18l0.19,1.71l0.3,0.34l1.63,0.4l0.15,1.32l-2.15,2.35l-0.01,0.53l2.21,3.03l2.34,1.24l0.06,2.14l1.24,0.72l0.11,0.69l-3.31,1.27l-1.08,3.03l-9.68,-1.68l-0.99,-3.05l-1.43,-0.73l-2.17,0.46l-2.47,1.26l-2.83,-0.82l-2.46,-2.02l-2.41,-0.8l-3.42,-6.06l-0.48,-0.2l-1.18,0.39l-1.44,-0.82l-0.5,0.08l-0.65,0.74l-0.97,-1.01l-0.02,-1.31l-0.71,-0.39l0.26,-1.81l-1.29,-2.11l-3.13,-1.63l-1.58,-2.43l0.5,-1.9l1.31,-1.26l-0.19,-1.66l-1.74,-1.1l-1.57,-3.3Z"
                                                        data-code="IR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M536.99,182.33l-0.28,0.03l-1.23,-2.13l-0.93,0.01l-0.62,-0.66l-0.69,-0.07l-0.96,-0.81l-1.56,-0.62l0.19,-1.12l-0.26,-0.79l2.72,-0.36l1.09,1.01l-0.17,0.92l1.02,0.78l-0.47,0.62l0.08,0.56l2.04,1.23l0.04,1.4Z"
                                                        data-code="AM" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M451.59,158.63l3.48,0.94l-0.21,1.17l0.3,0.83l-1.49,-0.24l-2.04,1.1l-0.21,0.39l0.13,1.45l-0.25,1.12l0.82,1.57l2.39,1.63l1.31,2.54l2.79,2.43l2.05,0.08l0.21,0.23l-0.39,0.33l0.09,0.67l4.05,1.97l2.17,1.76l-0.16,0.36l-1.17,-1.08l-2.18,-0.49l-0.44,0.2l-1.05,1.91l0.14,0.54l1.57,0.95l-0.19,0.98l-1.06,0.33l-1.25,2.34l-0.37,0.08l0.0,-0.33l1.0,-2.45l-1.73,-3.17l-1.12,-0.51l-0.88,-1.33l-1.51,-0.51l-1.27,-1.25l-1.75,-0.18l-4.12,-3.21l-1.62,-1.65l-1.03,-3.19l-3.53,-1.36l-1.3,0.51l-1.69,1.41l0.16,-0.72l-0.28,-0.47l-1.14,-0.33l-0.53,-1.96l0.72,-0.78l0.04,-0.48l-0.65,-1.17l0.8,0.39l1.4,-0.23l1.11,-0.84l0.52,0.35l1.19,-0.1l0.75,-1.2l1.53,0.33l1.36,-0.56l0.35,-1.14l1.08,0.32l0.68,-0.64l1.98,-0.44l0.42,0.82ZM459.19,184.75l-0.65,1.65l0.32,1.05l-0.31,0.89l-1.5,-0.85l-4.5,-1.67l0.19,-0.82l2.67,0.23l3.78,-0.48ZM443.93,176.05l1.18,1.66l-0.3,3.32l-1.06,-0.01l-0.77,0.73l-0.53,-0.44l-0.1,-3.37l-0.39,-1.22l1.04,0.01l0.92,-0.68Z"
                                                        data-code="IT" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M690.56,230.25l-2.7,1.82l-2.09,2.46l-0.63,1.95l4.31,6.45l2.32,1.65l1.43,1.94l1.11,4.59l-0.32,4.24l-1.93,1.54l-2.84,1.61l-2.11,2.15l-2.73,2.06l-0.59,-1.05l0.63,-1.53l-0.13,-0.47l-1.34,-1.04l1.51,-0.71l2.55,-0.18l0.3,-0.63l-0.82,-1.14l4.0,-2.07l0.31,-3.05l-0.57,-1.77l0.42,-2.66l-0.73,-1.97l-1.86,-1.76l-3.63,-5.29l-2.72,-1.46l0.36,-0.47l1.5,-0.64l0.21,-0.52l-0.97,-2.27l-0.37,-0.24l-2.83,-0.02l-2.24,-3.9l0.83,-0.4l4.39,-0.29l2.06,-1.31l1.15,0.89l1.88,0.4l-0.17,1.51l1.35,1.16l1.67,0.45Z"
                                                        data-code="VN" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M249.29,428.93l-2.33,-0.52l-5.83,-0.43l-0.89,-1.66l0.05,-2.37l-0.45,-0.4l-1.43,0.18l-0.67,-0.91l-0.2,-3.13l1.88,-1.47l0.79,-2.04l-0.25,-1.7l1.3,-2.68l0.91,-4.15l-0.22,-1.69l0.85,-0.45l0.2,-0.44l-0.27,-1.16l-0.98,-0.68l0.59,-0.92l-0.05,-0.5l-1.04,-1.07l-0.52,-3.1l0.97,-0.86l-0.42,-3.58l1.2,-5.43l1.38,-0.98l0.16,-0.43l-0.75,-2.79l-0.01,-2.43l1.78,-1.75l0.06,-2.57l1.43,-2.85l0.01,-2.58l-0.69,-0.74l-1.09,-4.52l1.47,-2.7l-0.18,-2.79l0.85,-2.35l1.59,-2.46l1.73,-1.64l0.05,-0.52l-0.6,-0.84l0.44,-0.85l-0.07,-4.19l2.7,-1.44l0.86,-2.75l-0.21,-0.71l1.76,-2.01l2.9,0.57l1.38,1.78l0.68,-0.08l0.87,-1.87l2.39,0.09l4.95,4.77l2.17,0.49l3.0,1.92l2.47,1.0l0.25,0.82l-2.37,3.93l0.23,0.59l5.39,1.16l2.12,-0.44l2.45,-2.16l0.5,-2.38l0.76,-0.31l0.98,1.2l-0.04,1.8l-3.67,2.51l-2.85,2.66l-3.43,3.88l-1.3,5.07l0.01,2.72l-0.54,0.73l-0.36,3.28l3.14,2.64l-0.16,2.11l1.4,1.11l-0.1,1.09l-2.29,3.52l-3.55,1.49l-4.92,0.6l-2.71,-0.29l-0.43,0.51l0.5,1.65l-0.49,2.1l0.38,1.42l-1.19,0.83l-2.36,0.38l-2.3,-1.04l-1.38,0.83l0.41,3.64l1.69,0.91l1.4,-0.71l0.36,0.76l-2.04,0.86l-2.01,1.89l-0.97,4.63l-2.34,0.1l-2.09,1.78l-0.61,2.75l2.46,2.31l2.17,0.63l-0.7,2.32l-2.83,1.73l-1.73,3.86l-2.17,1.22l-1.16,1.67l0.75,3.76l1.04,1.28ZM256.71,438.88l-2.0,0.15l-1.4,-1.22l-3.82,-0.1l-0.0,-5.83l1.6,3.05l3.26,2.07l3.08,0.78l-0.71,1.1Z"
                                                        data-code="AR" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M705.8,353.26l0.26,0.04l0.17,-0.47l-0.48,-1.42l0.92,1.11l0.45,0.15l0.27,-0.39l-0.1,-1.56l-1.98,-3.63l1.09,-3.31l-0.24,-1.57l0.34,-0.62l0.38,1.06l0.43,-0.19l0.99,-1.7l1.91,-0.83l1.29,-1.15l1.81,-0.91l0.96,-0.17l0.92,0.26l1.92,-0.95l1.47,-0.28l1.03,-0.8l1.43,0.04l2.78,-0.84l1.36,-1.15l0.71,-1.45l1.41,-1.26l0.3,-2.58l1.27,-1.59l0.78,1.65l0.54,0.19l1.07,-0.51l0.15,-0.6l-0.73,-1.0l0.45,-0.71l0.78,0.39l0.58,-0.3l0.28,-1.82l1.87,-2.14l1.12,-0.39l0.28,-0.58l0.62,0.17l0.53,-0.73l1.87,-0.57l1.65,1.05l1.35,1.48l3.39,0.38l0.43,-0.54l-0.46,-1.23l1.05,-1.79l1.04,-0.61l0.14,-0.55l-0.25,-0.41l0.88,-1.17l1.31,-0.77l1.3,0.27l2.1,-0.48l0.31,-0.4l-0.05,-1.3l-0.92,-0.77l1.48,0.56l1.41,1.07l2.11,0.65l0.81,-0.2l1.4,0.7l1.69,-0.66l0.8,0.19l0.64,-0.33l0.71,0.77l-1.33,1.94l-0.71,0.07l-0.35,0.51l0.24,0.86l-1.52,2.35l0.12,1.05l2.15,1.65l1.97,0.85l3.04,2.36l1.97,0.65l0.55,0.88l2.72,0.85l1.84,-1.1l2.07,-5.97l-0.42,-3.59l0.3,-1.73l0.47,-0.87l-0.31,-0.68l1.09,-3.28l0.46,-0.47l0.4,0.71l0.16,1.51l0.65,0.52l0.16,1.04l0.85,1.21l0.12,2.38l0.9,2.0l0.57,0.18l1.3,-0.78l1.69,1.7l-0.2,1.08l0.53,2.2l0.39,1.3l0.68,0.48l0.6,1.95l-0.19,1.48l0.81,1.76l6.01,3.69l-0.11,0.76l1.38,1.58l0.95,2.77l0.58,0.22l0.72,-0.41l0.8,0.9l0.61,0.01l0.46,2.41l4.81,4.71l0.66,2.02l-0.07,3.31l1.14,2.2l-0.13,2.24l-1.1,3.68l0.03,1.64l-0.47,1.89l-1.05,2.4l-1.9,1.47l-1.72,3.51l-2.38,6.09l-0.24,2.82l-1.14,0.8l-2.85,0.15l-2.31,1.19l-2.51,2.25l-3.09,-1.57l0.3,-1.15l-0.54,-0.47l-1.5,0.63l-2.01,1.94l-7.12,-2.18l-1.48,-1.63l-1.14,-3.74l-1.45,-1.26l-1.81,-0.26l0.56,-1.18l-0.61,-2.1l-0.72,-0.1l-1.14,1.82l-0.9,0.21l0.63,-0.82l0.36,-1.55l0.92,-1.31l-0.13,-2.34l-0.7,-0.22l-2.0,2.34l-1.51,0.93l-0.94,2.01l-1.35,-0.81l-0.02,-1.52l-1.57,-2.04l-1.09,-0.88l0.24,-0.33l-0.14,-0.59l-3.21,-1.69l-1.83,-0.12l-2.54,-1.35l-4.58,0.28l-6.02,1.9l-2.53,-0.13l-2.62,1.41l-2.13,0.63l-1.49,2.6l-3.49,0.31l-2.29,-0.5l-3.48,0.43l-1.6,1.47l-0.81,-0.04l-2.37,1.63l-3.26,-0.1l-3.72,-2.21l0.04,-1.05l1.19,-0.46l0.49,-0.89l0.21,-2.97l-0.28,-1.64l-1.34,-2.86l-0.38,-1.47l0.05,-1.72l-0.95,-1.7l-0.18,-0.97l-1.01,-0.99l-0.29,-1.98l-1.13,-1.75ZM784.92,393.44l2.65,1.02l3.23,-0.96l1.09,0.14l0.15,3.06l-0.85,1.13l-0.17,1.63l-0.87,-0.24l-1.57,1.91l-1.68,-0.18l-1.4,-2.36l-0.37,-2.04l-1.39,-2.51l0.04,-0.8l1.15,0.18Z"
                                                        data-code="AU" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M507.76,203.05l0.4,-0.78l0.18,0.4l-0.33,1.03l0.52,0.44l0.68,-0.22l-0.86,3.6l-1.16,-3.32l0.59,-0.74l-0.03,-0.41ZM508.73,200.34l0.37,-1.02l0.64,0.0l0.52,-0.51l-0.49,1.53l-0.56,-0.24l-0.48,0.23Z"
                                                        data-code="IL" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M623.34,207.03l-1.24,1.04l-0.97,2.55l0.22,0.51l8.04,3.87l3.42,0.37l1.57,1.38l4.92,0.88l2.18,-0.04l0.38,-0.3l0.29,-1.24l-0.32,-1.64l0.14,-0.87l0.82,-0.31l0.45,2.48l2.28,1.02l1.77,-0.38l4.14,0.1l0.38,-0.36l0.18,-1.66l-0.5,-0.65l1.37,-0.29l2.25,-1.99l2.7,-1.62l1.93,0.62l1.8,-0.98l0.79,1.14l-0.68,0.91l0.26,0.63l2.42,0.36l0.09,0.47l-0.83,0.75l0.13,1.07l-1.52,-0.29l-3.24,1.86l-0.13,1.78l-1.32,2.14l-0.18,1.39l-0.93,1.82l-1.64,-0.5l-0.52,0.37l-0.09,2.63l-0.56,1.11l0.19,0.81l-0.53,0.27l-1.18,-3.73l-1.08,-0.27l-0.38,0.31l-0.24,1.0l-0.66,-0.66l0.54,-1.06l1.22,-0.34l1.15,-2.25l-0.24,-0.56l-1.57,-0.47l-4.34,-0.28l-0.18,-1.56l-0.35,-0.35l-1.11,-0.12l-1.91,-1.12l-0.56,0.17l-0.88,1.82l0.11,0.49l1.36,1.07l-1.09,0.69l-0.69,1.11l0.18,0.56l1.24,0.57l-0.32,1.54l0.85,1.94l0.36,2.01l-0.22,0.59l-4.58,0.52l-0.33,0.42l0.13,1.8l-1.17,1.36l-3.65,1.81l-2.79,3.03l-4.32,3.28l-0.18,1.27l-4.65,1.79l-0.77,2.16l0.64,5.3l-1.06,2.49l-0.01,3.94l-1.24,0.28l-1.14,1.93l0.39,0.84l-1.68,0.53l-1.04,1.83l-0.65,0.47l-2.06,-2.05l-2.1,-6.02l-2.2,-3.64l-1.05,-4.75l-2.29,-3.57l-1.76,-8.2l0.01,-3.11l-0.49,-2.53l-0.55,-0.29l-3.53,1.52l-1.53,-0.27l-2.86,-2.77l0.85,-0.67l0.08,-0.55l-0.74,-1.03l-2.67,-2.06l1.24,-1.32l5.34,0.01l0.39,-0.49l-0.5,-2.29l-1.42,-1.46l-0.27,-1.93l-1.43,-1.2l2.31,-2.37l3.05,0.06l2.62,-2.85l1.6,-2.81l2.4,-2.73l0.07,-2.04l1.97,-1.48l-0.02,-0.65l-1.93,-1.31l-0.82,-1.78l-0.8,-2.21l0.9,-0.89l3.59,0.65l2.92,-0.42l2.33,-2.19l2.31,2.85l-0.24,2.13l0.99,1.59l-0.05,0.82l-1.34,-0.28l-0.47,0.48l0.7,3.06l2.62,1.99l2.99,1.65Z"
                                                        data-code="IN" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M495.56,296.42l2.8,-3.12l-0.02,-0.81l-0.64,-1.3l0.68,-0.52l0.14,-1.47l-0.76,-1.25l0.31,-0.11l2.26,0.03l-0.51,2.76l0.76,1.3l0.5,0.12l1.05,-0.53l1.19,-0.12l0.61,0.24l1.43,-0.62l0.1,-0.67l-0.71,-0.62l1.57,-1.7l8.65,4.86l0.32,1.53l3.34,2.33l-1.05,2.8l0.13,1.61l1.63,1.12l-0.6,1.76l-0.01,2.33l1.89,4.03l0.57,0.43l-1.46,1.08l-2.61,0.94l-1.43,-0.04l-1.06,0.77l-2.29,0.36l-2.87,-0.68l-0.83,0.07l-0.63,-0.75l-0.31,-2.78l-1.32,-1.35l-3.25,-0.77l-3.96,-1.58l-1.18,-2.41l-0.32,-1.75l-1.76,-1.49l0.42,-1.05l-0.44,-0.89l0.08,-0.96l-0.46,-0.58l0.06,-0.56Z"
                                                        data-code="TZ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M539.29,175.73l1.33,0.32l1.94,-1.8l2.3,3.34l1.43,0.43l-1.26,0.15l-0.35,0.32l-0.8,3.14l-0.99,0.96l0.05,1.11l-1.26,-1.13l0.7,-1.18l-0.04,-0.47l-0.74,-0.86l-1.48,0.15l-2.34,1.71l-0.03,-1.27l-2.03,-1.35l0.47,-0.62l-0.08,-0.56l-1.03,-0.79l0.29,-0.43l-0.14,-0.58l-1.13,-0.86l1.89,0.68l1.69,0.06l0.37,-0.87l-0.81,-1.37l0.42,0.06l1.63,1.72ZM533.78,180.57l0.61,0.46l0.69,-0.0l0.59,1.15l-0.68,-0.15l-1.21,-1.45Z"
                                                        data-code="AZ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M405.08,135.42l0.35,2.06l-1.75,2.78l-4.22,1.88l-2.84,-0.4l1.73,-3.0l-1.18,-3.53l4.6,-3.74l0.32,1.15l-0.49,1.74l0.4,0.51l1.47,-0.04l1.6,0.6Z"
                                                        data-code="IE" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M756.47,287.89l0.69,4.01l2.79,1.78l0.51,-0.1l2.04,-2.59l2.71,-1.43l2.05,-0.0l3.9,1.73l2.46,0.45l0.08,15.12l-1.75,-1.54l-2.54,-0.51l-0.88,0.71l-2.32,0.06l0.69,-1.33l1.45,-0.64l0.23,-0.46l-0.65,-2.74l-1.24,-2.21l-5.04,-2.29l-2.09,-0.23l-3.68,-2.27l-0.55,0.13l-0.65,1.07l-0.52,0.12l-0.55,-1.89l-1.21,-0.78l1.84,-0.62l1.72,0.05l0.39,-0.52l-0.21,-0.66l-0.38,-0.28l-3.45,-0.0l-1.13,-1.48l-2.1,-0.43l-0.52,-0.6l2.69,-0.48l1.28,-0.78l3.66,0.94l0.3,0.71ZM757.91,300.34l-0.62,0.82l-0.1,-0.8l0.59,-1.12l0.13,1.1ZM747.38,292.98l0.34,0.72l-1.22,-0.57l-4.68,-0.1l0.27,-0.62l2.78,-0.09l2.52,0.67ZM741.05,285.25l-0.67,-2.88l0.64,-2.01l0.41,0.86l1.21,0.18l0.16,0.7l-0.1,1.68l-0.84,-0.16l-0.46,0.3l-0.34,1.34ZM739.05,293.5l-0.5,0.44l-1.34,-0.36l-0.17,-0.37l1.73,-0.08l0.27,0.36ZM721.45,284.51l-0.19,1.97l2.24,2.23l0.54,0.02l1.27,-1.07l2.75,-0.5l-0.9,1.21l-2.11,0.93l-0.16,0.6l2.22,3.01l-0.3,1.07l1.36,1.74l-2.26,0.85l-0.28,-0.31l0.12,-1.19l-1.64,-1.34l0.17,-2.23l-0.56,-0.39l-1.67,0.76l-0.23,0.39l0.3,6.17l-1.1,0.25l-0.69,-0.47l0.64,-2.21l-0.39,-2.42l-0.39,-0.34l-0.8,-0.01l-0.58,-1.29l0.98,-1.6l0.35,-1.96l1.32,-3.87ZM728.59,296.27l0.38,0.49l-0.02,1.28l-0.88,0.49l-0.53,-0.47l1.04,-1.79ZM729.04,286.98l0.27,-0.05l-0.02,0.13l-0.24,-0.08ZM721.68,284.05l0.16,-0.32l1.89,-1.65l1.83,0.68l3.16,0.35l2.94,-0.1l2.39,-1.66l-1.73,2.13l-1.66,0.43l-2.41,-0.48l-4.17,0.13l-2.39,0.51ZM730.55,310.47l1.11,-1.93l2.03,-0.82l0.08,0.62l-1.45,1.67l-1.77,0.46ZM728.12,305.88l-0.1,0.38l-3.46,0.66l-2.91,-0.27l-0.0,-0.25l1.54,-0.41l1.66,0.73l1.67,-0.19l1.61,-0.65ZM722.9,310.24l-0.64,0.03l-2.26,-1.2l1.11,-0.24l1.78,1.41ZM716.26,305.77l0.88,0.51l1.28,-0.17l0.2,0.35l-4.65,0.73l0.39,-0.67l1.15,-0.02l0.75,-0.73ZM711.66,293.84l-0.38,-0.16l-2.54,1.01l-1.12,-1.44l-1.69,-0.13l-1.16,-0.75l-3.04,0.77l-1.1,-1.15l-3.31,-0.11l-0.35,-3.05l-1.35,-0.95l-1.11,-1.98l-0.33,-2.06l0.27,-2.14l0.9,-1.01l0.37,1.15l2.09,1.49l1.53,-0.48l1.82,0.08l1.38,-1.19l1.0,-0.18l2.28,0.67l2.26,-0.53l1.52,-3.64l1.01,-0.99l0.78,-2.57l4.1,0.3l-1.11,1.77l0.02,0.46l1.7,2.2l-0.23,1.39l2.07,1.71l-2.33,0.42l-0.88,1.9l0.1,2.05l-2.4,1.9l-0.06,2.45l-0.7,2.79ZM692.58,302.03l0.35,0.26l4.8,0.25l0.78,-0.97l4.17,1.09l1.13,1.68l3.69,0.45l2.13,1.04l-1.8,0.6l-2.77,-0.99l-4.8,-0.12l-5.24,-1.41l-1.84,-0.25l-1.11,0.3l-4.26,-0.97l-0.7,-1.14l-1.59,-0.13l1.18,-1.65l2.74,0.13l2.87,1.13l0.26,0.68ZM685.53,299.17l-2.22,0.04l-2.06,-2.03l-3.15,-2.01l-2.93,-3.51l-3.11,-5.33l-2.2,-2.12l-1.64,-4.06l-2.32,-1.69l-1.27,-2.07l-1.96,-1.5l-2.51,-2.65l-0.11,-0.66l4.81,0.53l2.15,2.38l3.31,2.74l2.35,2.66l2.7,0.17l1.95,1.59l1.54,2.17l1.59,0.95l-0.84,1.71l0.15,0.52l1.44,0.87l0.79,0.1l0.4,1.58l0.87,1.4l1.96,0.39l1.0,1.31l-0.6,3.01l-0.09,3.5Z"
                                                        data-code="ID" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M492.5,162.44l1.28,-2.49l1.82,0.19l0.66,-0.23l0.09,-0.71l-0.25,-0.75l-0.79,-0.72l-0.33,-1.21l-0.86,-0.62l-0.02,-1.19l-1.13,-0.86l-1.15,-0.19l-2.04,-1.0l-1.66,0.32l-0.66,0.47l-0.92,-0.0l-0.84,0.78l-2.48,0.7l-1.18,-0.71l-3.07,-0.36l-0.89,0.43l-0.24,-0.55l-1.11,-0.7l0.35,-0.93l1.26,-1.02l-0.54,-1.23l2.04,-2.43l1.4,-0.62l0.25,-1.19l-1.04,-2.39l0.83,-0.13l1.28,-0.84l1.8,-0.07l2.47,0.26l2.86,0.81l1.88,0.06l0.86,0.44l1.04,-0.41l0.77,0.66l2.18,-0.15l0.92,0.3l0.52,-0.34l0.15,-1.53l0.56,-0.54l2.85,-0.05l0.84,-0.72l3.04,-0.18l1.23,1.46l-0.48,0.77l0.21,1.03l0.36,0.32l1.8,0.14l0.93,2.08l3.18,1.15l1.94,-0.45l1.67,1.49l1.4,-0.03l3.35,0.96l0.02,0.54l-0.96,1.59l0.47,1.97l-0.26,0.7l-2.36,0.28l-1.29,0.89l-0.23,1.38l-1.83,0.27l-1.58,0.97l-2.41,0.21l-2.16,1.17l-0.21,0.38l0.34,2.26l1.23,0.75l2.13,-0.08l-0.14,0.31l-2.65,0.53l-3.23,1.69l-0.87,-0.39l0.42,-1.1l-0.25,-0.52l-2.21,-0.73l2.35,-1.06l0.12,-0.65l-0.93,-0.82l-3.62,-0.74l-0.13,-0.89l-0.46,-0.34l-2.61,0.59l-0.91,1.69l-1.71,2.04l-0.86,-0.4l-1.62,0.27Z"
                                                        data-code="UA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M549.33,221.64l-0.76,-0.23l-0.14,-1.64l0.84,-1.29l0.47,0.52l0.04,1.34l-0.45,1.3Z"
                                                        data-code="QA" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                    <path
                                                        d="M508.58,318.75l-0.34,-2.57l0.51,-2.05l3.55,0.63l2.5,-0.38l1.02,-0.76l1.49,0.01l2.74,-0.98l1.66,-1.2l0.5,9.24l0.41,1.23l-0.68,1.67l-0.93,1.71l-1.5,1.5l-5.16,2.28l-2.78,2.73l-1.02,0.53l-1.71,1.8l-0.98,0.57l-0.35,2.41l1.16,1.94l0.49,2.17l0.43,0.31l-0.06,2.06l-0.39,1.17l0.5,0.72l-0.25,0.73l-0.92,0.83l-5.12,2.39l-1.22,1.36l0.21,1.13l0.58,0.39l-0.11,0.72l-1.22,-0.01l-0.73,-2.97l0.42,-3.09l-1.78,-5.37l2.49,-2.81l0.69,-1.89l0.44,-0.43l0.28,-1.53l-0.39,-0.93l0.59,-3.65l-0.01,-3.26l-1.49,-1.16l-1.2,-0.22l-1.74,-1.17l-1.92,0.01l-0.29,-2.08l7.06,-1.96l1.28,1.09l0.89,-0.1l0.67,0.44l0.1,0.73l-0.51,1.29l0.19,1.81l1.75,1.83l0.65,-0.13l0.71,-1.65l1.17,-0.86l-0.26,-3.47l-1.05,-1.85l-1.04,-0.94Z"
                                                        data-code="MZ" fill="#D9D9D9" fill-opacity="1"
                                                        stroke="none" stroke-width="0" font-family="Outfit"
                                                        fill-rule="evenodd" class="jvm-region jvm-element"></path>
                                                </g>
                                                <g id="jvm-regions-labels-group"></g>
                                                <g id="jvm-lines-group"></g>
                                                <g id="jvm-markers-group">
                                                    <circle data-index="0" cx="206.3658540386205"
                                                        cy="73.55446875953989" r="4" fill="#465fff"
                                                        fill-opacity="1" stroke="#FFF" stroke-width="1"
                                                        stroke-opacity="0.5" class="jvm-marker jvm-element">
                                                    </circle>
                                                    <circle data-index="1" cx="183.04200818131713"
                                                        cy="44.21252792408821" r="4" fill="#465fff"
                                                        fill-opacity="1" stroke="#FFF" stroke-width="1"
                                                        stroke-opacity="0.5" class="jvm-marker jvm-element">
                                                    </circle>
                                                    <circle data-index="2" cx="98.53965455475952"
                                                        cy="63.83992805104575" r="4" fill="#465fff"
                                                        fill-opacity="1" stroke="#FFF" stroke-width="1"
                                                        stroke-opacity="0.5" class="jvm-marker jvm-element">
                                                    </circle>
                                                </g>
                                                <g id="jvm-markers-labels-group"></g>
                                            </svg></div>
                                    </div>

                                    <div class="space-y-5">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <div class="w-full max-w-8 items-center rounded-full">
                                                    <img src="src/images/country/country-01.svg" alt="usa">
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-theme-sm font-semibold text-gray-800 dark:text-white/90">
                                                        USA
                                                    </p>
                                                    <span
                                                        class="block text-theme-xs text-gray-500 dark:text-gray-400">
                                                        2,379 Customers
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex w-full max-w-[140px] items-center gap-3">
                                                <div
                                                    class="relative block h-2 w-full max-w-[100px] rounded-sm bg-gray-200 dark:bg-gray-800">
                                                    <div
                                                        class="absolute left-0 top-0 flex h-full w-[79%] items-center justify-center rounded-sm bg-brand-500 text-xs font-medium text-white">
                                                    </div>
                                                </div>
                                                <p class="text-theme-sm font-medium text-gray-800 dark:text-white/90">
                                                    79%
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center gap-3">
                                                <div class="w-full max-w-8 items-center rounded-full">
                                                    <img src="src/images/country/country-02.svg" alt="france">
                                                </div>
                                                <div>
                                                    <p
                                                        class="text-theme-sm font-semibold text-gray-800 dark:text-white/90">
                                                        France
                                                    </p>
                                                    <span
                                                        class="block text-theme-xs text-gray-500 dark:text-gray-400">
                                                        589 Customers
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="flex w-full max-w-[140px] items-center gap-3">
                                                <div
                                                    class="relative block h-2 w-full max-w-[100px] rounded-sm bg-gray-200 dark:bg-gray-800">
                                                    <div
                                                        class="absolute left-0 top-0 flex h-full w-[23%] items-center justify-center rounded-sm bg-brand-500 text-xs font-medium text-white">
                                                    </div>
                                                </div>
                                                <p class="text-theme-sm font-medium text-gray-800 dark:text-white/90">
                                                    23%
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====== Map One End -->
                            </div>

                            <div class="col-span-12 xl:col-span-7">
                                <!-- ====== Table Two Start -->
                                <div
                                    class="overflow-hidden rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
                                    <div
                                        class="flex flex-col gap-4 px-6 mb-4 sm:flex-row sm:items-center sm:justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                                Recent Orders
                                            </h3>
                                        </div>

                                        <div class="flex items-center gap-3">
                                            <button
                                                class="text-theme-sm shadow-theme-xs inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                                                <svg class="stroke-current fill-white dark:fill-gray-800"
                                                    width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.29004 5.90393H17.7067" stroke=""
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M17.7075 14.0961H2.29085" stroke=""
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M12.0826 3.33331C13.5024 3.33331 14.6534 4.48431 14.6534 5.90414C14.6534 7.32398 13.5024 8.47498 12.0826 8.47498C10.6627 8.47498 9.51172 7.32398 9.51172 5.90415C9.51172 4.48432 10.6627 3.33331 12.0826 3.33331Z"
                                                        fill="" stroke="" stroke-width="1.5"></path>
                                                    <path
                                                        d="M7.91745 11.525C6.49762 11.525 5.34662 12.676 5.34662 14.0959C5.34661 15.5157 6.49762 16.6667 7.91745 16.6667C9.33728 16.6667 10.4883 15.5157 10.4883 14.0959C10.4883 12.676 9.33728 11.525 7.91745 11.525Z"
                                                        fill="" stroke="" stroke-width="1.5"></path>
                                                </svg>

                                                Filter
                                            </button>

                                            <button
                                                class="text-theme-sm shadow-theme-xs inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                                                See all
                                            </button>
                                        </div>
                                    </div>

                                    <div class="max-w-full overflow-x-auto custom-scrollbar">
                                        <table class="w-full">
                                            <thead>
                                                <tr class="border-t border-gray-100 dark:border-gray-800">
                                                    <th class="px-6 py-3 text-left">
                                                        <p
                                                            class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                            Products
                                                        </p>
                                                    </th>
                                                    <th class="px-6 py-3 text-left">
                                                        <p
                                                            class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                            Category
                                                        </p>
                                                    </th>
                                                    <th class="px-6 py-3 text-left">
                                                        <p
                                                            class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                            Country
                                                        </p>
                                                    </th>
                                                    <th class="px-6 py-3 text-left">
                                                        <p
                                                            class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                            CR
                                                        </p>
                                                    </th>
                                                    <th class="px-6 py-3 text-left">
                                                        <p
                                                            class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                            Value
                                                        </p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-t border-gray-100 dark:border-gray-800">
                                                    <td class="px-6 py-3.5">
                                                        <p
                                                            class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                            TailGrids
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">UI
                                                            Kit</p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <div class="w-5 h-5 overflow-hidden rounded-full">
                                                            <img src="src/images/country/country-01.svg"
                                                                alt="country">
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                            Dashboard
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-theme-sm text-success-600">$12,499</p>
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-gray-100 dark:border-gray-800">
                                                    <td class="px-6 py-3.5">
                                                        <p
                                                            class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                            GrayGrids
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                            Templates
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <div class="w-5 h-5 overflow-hidden rounded-full">
                                                            <img src="src/images/country/country-03.svg"
                                                                alt="country">
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                            Dashboard
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-theme-sm text-success-600">$5,498</p>
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-gray-100 dark:border-gray-800">
                                                    <td class="px-6 py-3.5">
                                                        <p
                                                            class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                            Uideck
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                            Templates
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <div class="w-5 h-5 overflow-hidden rounded-full">
                                                            <img src="src/images/country/country-04.svg"
                                                                alt="country">
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                            Dashboard
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-theme-sm text-success-600">$4,521</p>
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-gray-100 dark:border-gray-800">
                                                    <td class="px-6 py-3.5">
                                                        <p
                                                            class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                            FormBold
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">SaaS
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <div class="w-5 h-5 overflow-hidden rounded-full">
                                                            <img src="src/images/country/country-05.svg"
                                                                alt="country">
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                            Dashboard
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-theme-sm text-success-600">$13,843</p>
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-gray-100 dark:border-gray-800">
                                                    <td class="px-6 py-3.5">
                                                        <p
                                                            class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                            NextAdmin
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                            Dashboard
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <div class="w-5 h-5 overflow-hidden rounded-full">
                                                            <img src="src/images/country/country-06.svg"
                                                                alt="country">
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                            Dashboard
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-theme-sm text-success-600">$7,523</p>
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-gray-100 dark:border-gray-800">
                                                    <td class="px-6 py-3.5">
                                                        <p
                                                            class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                            Form Builder
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">SaaS
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <div class="w-5 h-5 overflow-hidden rounded-full">
                                                            <img src="src/images/country/country-07.svg"
                                                                alt="country">
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                            Dashboard
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-theme-sm text-success-600">$1,377</p>
                                                    </td>
                                                </tr>
                                                <tr class="border-t border-gray-100 dark:border-gray-800">
                                                    <td class="px-6 py-3.5">
                                                        <p
                                                            class="font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                            AyroUI
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">UI
                                                            Kit</p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <div class="w-5 h-5 overflow-hidden rounded-full">
                                                            <img src="src/images/country/country-08.svg"
                                                                alt="country">
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                            Dashboard
                                                        </p>
                                                    </td>
                                                    <td class="px-6 py-3.5">
                                                        <p class="text-theme-sm text-success-600">$599,00</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- ====== Table Two End -->
                            </div>
                        </div>
                    </div>
                </main>
                <!-- ===== Main Content End ===== -->
            </div>
            <!-- ===== Content Area End ===== -->
        </div>
        <!-- ===== Page Wrapper End ===== -->
        <script defer="" src="bundle.js"></script>
        <script defer=""
            src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
            integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
            data-cf-beacon="{&quot;rayId&quot;:&quot;94bfa0a9092c6bf1&quot;,&quot;version&quot;:&quot;2025.5.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;67f7a278e3374824ae6dd92295d38f77&quot;,&quot;serverTiming&quot;:{&quot;name&quot;:{&quot;cfExtPri&quot;:true,&quot;cfEdge&quot;:true,&quot;cfOrigin&quot;:true,&quot;cfL4&quot;:true,&quot;cfSpeedBrain&quot;:true,&quot;cfCacheStatus&quot;:true}}}"
            crossorigin="anonymous"></script>


        <svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
            style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
            <defs id="SvgjsDefs1002"></defs>
            <polyline id="SvgjsPolyline1003" points="0,0"></polyline>
            <path id="SvgjsPath1004" d="M0 0 "></path>
        </svg>
        <div class="jvm-tooltip"></div>
    </body>

    </html>
</div>
