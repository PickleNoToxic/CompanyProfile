<script>
    const navbar = document.getElementById('navbar');
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const showMenu = document.getElementById('hamburger-icon');
    const hiddenMenu = document.getElementById('close-hamburger-icon');

    hamburger.addEventListener('click', () => {
        sidebar.classList.toggle('fixed');
        sidebar.classList.toggle('top-0');
        sidebar.classList.toggle('left-0');
        sidebar.classList.toggle('z-40');
        sidebar.classList.toggle('hidden');
        sidebar.classList.toggle('mt-[70px]');
        sidebar.classList.toggle('h-screen');
        sidebar.classList.toggle('bg-whitePrimary');
        sidebar.classList.toggle('shadow');
        sidebar.classList.toggle('py-10');
        sidebar.classList.toggle('flex');
        sidebar.classList.toggle('flex-col');
        sidebar.classList.toggle('w-full');
        sidebar.classList.toggle('px-5');
        sidebar.classList.toggle('text-base');
        sidebar.classList.toggle('text-xl');

        showMenu.classList.toggle('hidden');
        hiddenMenu.classList.toggle('hidden');
    });
</script>