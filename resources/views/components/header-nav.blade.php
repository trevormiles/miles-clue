<header class="bg-red-950">
    <div class="container mx-auto px-4 py-2">
        <div class="flex item-center justify-between">
            <a href="{{ route('games.index') }}" class="text-white text-2xl font-extrabold">Miles Clue</a>
            <button class="w-5 flex flex-col justify-center items-center" data-menu-toggle-btn>
                <span class="bg-white w-full h-0.5"></span>
                <span class="bg-white w-full h-0.5 my-1"></span>
                <span class="bg-white w-full h-0.5"></span>
            </button>
        </div>
        <nav class="mt-2 px-6 hidden" data-nav-menu>
            @foreach ($links as $link)
                <a
                    href="{{ $link['href'] }}"
                    class="text-white py-1.5 hover:text-gray-100 block border-b border-gray-400 last:border-0"
                >
                    {{ $link['title'] }}
                </a>
            @endforeach
        </nav>
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggleBtn = document.querySelector("[data-menu-toggle-btn]");
        menuToggleBtn.addEventListener("click", function() {
            toggleMenu();
        });
    }); 
    function toggleMenu() {
        const navMenu = document.querySelector("[data-nav-menu]");
        navMenu.classList.toggle("hidden");
    }
</script>