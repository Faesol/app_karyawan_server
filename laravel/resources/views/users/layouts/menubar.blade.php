<div class="menubar-area">
    <div class="toolbar-inner menubar-nav">
        <a id="btn_klik" href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active':'' }}">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.14373 20.7821V17.7152C9.14372 16.9381 9.77567 16.3067 10.5584 16.3018H13.4326C14.2189 16.3018 14.8563 16.9346 14.8563 17.7152V20.7732C14.8562 21.4473 15.404 21.9951 16.0829 22H18.0438C18.9596 22.0023 19.8388 21.6428 20.4872 21.0007C21.1356 20.3586 21.5 19.4868 21.5 18.5775V9.86585C21.5 9.13139 21.1721 8.43471 20.6046 7.9635L13.943 2.67427C12.7785 1.74912 11.1154 1.77901 9.98539 2.74538L3.46701 7.9635C2.87274 8.42082 2.51755 9.11956 2.5 9.86585V18.5686C2.5 20.4637 4.04738 22 5.95617 22H7.87229C8.19917 22.0023 8.51349 21.8751 8.74547 21.6464C8.97746 21.4178 9.10793 21.1067 9.10792 20.7821H9.14373Z" fill="#130F26" />
            </svg>
        </a>
        <a id="btn_klik" href="{{ route('history') }}" class="nav-link {{ request()->routeIs('history') ? 'active':'' }}">
            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 441 512.398">
                <path fill="#a19fa8" fill-rule="nonzero" d="M102.778 354.886c-5.727 0-10.372-4.645-10.372-10.372s4.645-10.372 10.372-10.372h85.568a148.095 148.095 0 00-7.597 20.744h-77.971zm0-145.37c-5.727 0-10.372-4.645-10.372-10.372 0-5.726 4.645-10.372 10.372-10.372h151.288c5.727 0 10.372 4.646 10.372 10.372 0 5.727-4.645 10.372-10.372 10.372H102.778zm0 72.682c-5.727 0-10.372-4.646-10.372-10.373 0-5.727 4.645-10.372 10.372-10.372H246.05c2.83 0 5.395 1.134 7.265 2.971a149.435 149.435 0 00-25.876 17.774H102.778z" />
                <path fill="#a19fa8" d="M324.263 278.925c32.23 0 61.418 13.067 82.544 34.192C427.933 334.241 441 363.43 441 395.66c0 32.236-13.067 61.419-34.193 82.544-21.126 21.126-50.31 34.194-82.544 34.194-32.232 0-61.419-13.068-82.543-34.194-21.125-21.125-34.194-50.312-34.194-82.544s13.069-61.417 34.194-82.543c21.126-21.125 50.309-34.192 82.543-34.192zM60.863 0h174.809c3.382 0 6.384 1.619 8.279 4.124l110.107 119.119a10.292 10.292 0 012.745 7.012h.053v119.817a149.591 149.591 0 00-20.752-3.111v-92.212h-43.666v-.042h-.161c-22.046-.349-39.33-6.222-51.694-16.784-12.849-10.979-20.063-26.614-21.504-46.039a10.145 10.145 0 01-.095-1.404V20.752H60.863c-11.02 0-21.049 4.516-28.321 11.79-7.274 7.272-11.79 17.301-11.79 28.321v338.276c0 11.015 4.521 21.037 11.796 28.311 7.278 7.28 17.31 11.802 28.315 11.802h120.749a148.132 148.132 0 008.116 20.752H60.863c-16.73 0-31.958-6.85-42.987-17.881C6.852 431.099 0 415.882 0 399.139V60.863C0 44.114 6.842 28.894 17.87 17.87 28.894 6.842 44.114 0 60.863 0zm178.873 29.983v60.433c1.021 13.737 5.819 24.535 14.302 31.783 8.667 7.404 21.488 11.544 38.4 11.835v-.037h43.442L239.736 29.983zm94.347 309.703l-10.063 51.127-10.203-15.37c-21.968 8.819-34.299 23.358-36.132 45.74-18.044-31.549-7.086-59.827 15.78-76.397l-10.404-15.677 51.022 10.577zm-19.655 111.947l10.062-51.127 10.203 15.37c21.969-8.819 34.3-23.356 36.134-45.739 18.045 31.546 7.085 59.828-15.78 76.396l10.406 15.677-51.025-10.577z" />
            </svg>
        </a>
        <a id="btn_klik" href="{{ route('absen') }}" class="nav-link {{ request()->routeIs('absen') ? 'active':'' }}">
            <span class="dz-icon" style="background-color: #F3F2F3; position: fixed; bottom: 1%; height: 70px; width: 70px; border-radius: 50px; box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2), 0 1px 4px 0 rgba(0, 0, 0, 0.1);">
                <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 24 24" fill="none">
                    <path d="M7 3H5C3.89543 3 3 3.89543 3 5V7M3 17V19C3 20.1046 3.89543 21 5 21H7M17 21H19C20.1046 21 21 20.1046 21 19V17M21 7V5C21 3.89543 20.1046 3 19 3H17" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    <circle cx="12" cy="9" r="3" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    <path d="M17 16C17 13.7909 14.7614 12 12 12C9.23858 12 7 13.7909 7 16" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                </svg>
            </span>
        </a>
        <a id="btn_klik" href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active':'' }}">
            <svg id="Layer_1" width="24" height="24" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 116.17">
                <path fill="#a19fa8" class="cls-1" d="M0,107.68c0-32.08,26.21-21,35-32.2,6.45,15.23,29.74,13.94,37.63,0A11.7,11.7,0,0,0,76,78a8.26,8.26,0,0,0,.4,5.29l.27.55a11.12,11.12,0,0,0-1.24.39,8.54,8.54,0,0,0-4.55,4.55l-.2.58a8.37,8.37,0,0,0-.41,2.57v5.27a8.25,8.25,0,0,0,.63,3.16l.25.51A8.42,8.42,0,0,0,72.6,103l.14.14a8.18,8.18,0,0,0,2.59,1.75l.66.24a8.47,8.47,0,0,0-1.06,2.56ZM115.64,79.32a2,2,0,0,0-2.9,0l-2.22,2.21a15.3,15.3,0,0,0-1.87-1,19,19,0,0,0-2-.78V76.34a2,2,0,0,0-.59-1.46,2,2,0,0,0-1.45-.59h-4.26a2,2,0,0,0-1.43.59,2,2,0,0,0-.61,1.46v3.1a15.41,15.41,0,0,0-2.06.64,15.89,15.89,0,0,0-1.91.88l-2.45-2.42a1.88,1.88,0,0,0-1.42-.61,2,2,0,0,0-1.45.61l-3,3a2,2,0,0,0,0,2.9l2.21,2.22a14.06,14.06,0,0,0-1,1.87,19,19,0,0,0-.78,2H83a2,2,0,0,0-2,2v4.26a2,2,0,0,0,.59,1.43,1.94,1.94,0,0,0,1.45.61h3.11a15.41,15.41,0,0,0,.64,2.06,19,19,0,0,0,.87,1.95l-2.41,2.41a1.85,1.85,0,0,0-.61,1.42,2,2,0,0,0,.61,1.45l3,3a2.13,2.13,0,0,0,2.9,0l2.21-2.25a14.18,14.18,0,0,0,1.88,1,19.67,19.67,0,0,0,2,.78v3.4a2,2,0,0,0,2,2h4.26a2,2,0,0,0,2-2V111a17,17,0,0,0,2.06-.63c.67-.26,1.32-.56,2-.88l2.41,2.41a1.86,1.86,0,0,0,1.43.62,1.9,1.9,0,0,0,1.44-.62l3-3a2.13,2.13,0,0,0,0-2.9l-2.25-2.21a14.18,14.18,0,0,0,1-1.88,19.67,19.67,0,0,0,.78-2h3.39a2,2,0,0,0,1.46-.6,2,2,0,0,0,.59-1.45V93.63a2,2,0,0,0-.59-1.43,2,2,0,0,0-1.46-.6h-3.1a17.31,17.31,0,0,0-.64-2,15.49,15.49,0,0,0-.88-1.93l2.42-2.45a1.88,1.88,0,0,0,.61-1.41,2.05,2.05,0,0,0-.61-1.46l-3-3Zm-13.7,7.57a8.27,8.27,0,0,1,3.25.65A8.23,8.23,0,0,1,109.63,92a8.45,8.45,0,0,1,0,6.5,8.23,8.23,0,0,1-4.44,4.44,8.45,8.45,0,0,1-6.5,0,8.23,8.23,0,0,1-4.44-4.44,8.45,8.45,0,0,1,0-6.5,8.23,8.23,0,0,1,4.44-4.44,8.27,8.27,0,0,1,3.25-.65ZM30.74,42a5,5,0,0,0-2.67.7,2,2,0,0,0-.77.88A3.11,3.11,0,0,0,27.05,45c.05,1.62.89,3.73,2.53,6.17l0,0h0l5.31,8.45C37,63.05,39.28,66.5,42.06,69a14.58,14.58,0,0,0,10.19,4.1A15,15,0,0,0,63,68.86c2.86-2.68,5.13-6.36,7.35-10l6-9.86c1.12-2.55,1.53-4.26,1.27-5.25-.15-.6-.81-.89-1.93-.95-.24,0-.48,0-.73,0l-.84.05a1.75,1.75,0,0,1-.46,0A9.15,9.15,0,0,1,72,42.7l2.06-9.08c-15.22,2.4-26.6-8.9-42.68-2.26l1.16,10.7A9.16,9.16,0,0,1,30.74,42Zm47-1.92A3.89,3.89,0,0,1,80.56,43c.43,1.67,0,4-1.46,7.26h0l-.09.17L73,60.4c-2.33,3.84-4.7,7.7-7.86,10.66a17.86,17.86,0,0,1-12.83,5.09A17.46,17.46,0,0,1,40,71.26c-3.07-2.82-5.42-6.45-7.66-10l-5.32-8.45c-1.94-2.9-3-5.55-3-7.72a6.2,6.2,0,0,1,.52-2.77,5.22,5.22,0,0,1,1.82-2.12,6,6,0,0,1,1.29-.65,136.66,136.66,0,0,1-.25-15.2,21.8,21.8,0,0,1,.65-3.43,20.41,20.41,0,0,1,9-11.45,28.41,28.41,0,0,1,7.53-3.35c1.68-.48-1.44-5.88.31-6C53.33-.8,67,6.9,72.88,13.28c2.94,3.2,4.8,7.42,5.2,13l-.33,13.78Z" />
            </svg>
        </a>
        <a href="javascript:void(0);" class="menu-toggler">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.4" d="M16.0755 2H19.4615C20.8637 2 22 3.14585 22 4.55996V7.97452C22 9.38864 20.8637 10.5345 19.4615 10.5345H16.0755C14.6732 10.5345 13.537 9.38864 13.537 7.97452V4.55996C13.537 3.14585 14.6732 2 16.0755 2Z" fill="#a19fa8" />
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z" fill="#a19fa8" />
            </svg>
        </a>
    </div>
</div>