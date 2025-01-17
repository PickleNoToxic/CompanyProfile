<nav id="navbar" class="h-[70px] md:h-[85px] w-screen flex flex-row justify-between lg:justify-center px-5 lg:px-0 items-center gap-20 fixed top-0 bg-whitePrimary shadow z-40">
    <div class="h-7 md:h-10 cursor-pointer">
        <img src="/assets/images/Transformer-Logo.png" alt="" class="h-7 md:h-10 object-contain">
    </div>
    <div id="sidebar" class="hidden lg:flex gap-10 font-normal text-base">
        <a href="{{ route('home') }}" class="{{ Request::is('/') ? 'text-gradient-primary' : 'text-graySecondary/50 hover:text-graySecondary transition-opacity delay-75 duration-200' }}">Beranda</a>
        <a href="{{ route('programs') }}" class="{{ Request::is('programs') ? 'text-gradient-primary' : 'text-graySecondary/50 hover:text-graySecondary transition-opacity delay-75 duration-200' }}">Program</a>
        <a href="{{ route('posts') }}" class="{{ Request::is('posts', 'posts/*') ? 'text-gradient-primary' : 'text-graySecondary/50 hover:text-graySecondary transition-opacity delay-75 duration-200' }}">Artikel</a>
        <a href="{{ route('facilities') }}" class="{{ Request::is('facilities') ? 'text-gradient-primary' : 'text-graySecondary/50 hover:text-graySecondary transition-opacity delay-75 duration-200' }}">Fasilitas</a>
        <a href="{{ route('orders') }}" class="{{ Request::is('orders') ? 'text-gradient-primary' : 'text-graySecondary/50 hover:text-graySecondary transition-opacity delay-75 duration-200' }}">Pemesanan</a>
        <a href="{{ route('galleries') }}" class="{{ Request::is('our-galleries') ? 'text-gradient-primary' : 'text-graySecondary/50 hover:text-graySecondary transition-opacity delay-75 duration-200' }}">Galeri</a>
        <a href="{{ route('contact') }}" class="{{ Request::is('contact-us') ? 'text-gradient-primary' : 'text-graySecondary/50 hover:text-graySecondary transition-opacity delay-75 duration-200' }}">Kontak Kami</a>
    </div>
    <div id="hamburger" class="lg:hidden h-9 md:h-12 w-9 md:w-12 p-1.5 text-black flex justify-center items-center cursor-pointer z-40 animate-pulse" data-aos="fade-up">
        <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
        <svg id="close-hamburger-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </div>
</nav>