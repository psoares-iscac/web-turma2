<nav class="bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-24">
        <!-- Logo -->        
        <a href="index.php" class="flex items-center">
        <img class="h-1/2" src="imgs/logo-min.png" alt="logo">
        </a>
        <!-- Menu desktop -->
        <div class="hidden md:flex space-x-8 items-center">
            <a href="index.php" class="text-black font-bold underline decoration-clone underline-offset-[15px] decoration-2">
                Home
            </a>

            <a href="eventos.php" 
                class="relative text-gray-700 font-medium transition-all duration-300 
                    after:content-[''] after:absolute after:left-0 after:bottom-[-12px] 
                    after:w-0 after:h-[2px] after:bg-black after:transition-all after:duration-300 
                    hover:after:w-full hover:text-black">
                Eventos
            </a>

            <a href="contactos.php" 
                class="relative text-gray-700 font-medium transition-all duration-300 
                    after:content-[''] after:absolute after:left-0 after:bottom-[-12px] 
                    after:w-0 after:h-[2px] after:bg-black after:transition-all after:duration-300 
                    hover:after:w-full hover:text-black">
                Sobre Nós
            </a>

            <?php if (isset($_SESSION['ligado']) && $_SESSION['ligado'] == true): ?>
                    <div class="relative group"> 
    
                        <a href="#" class="flex items-center focus:outline-none" tabindex="0"> 
                            <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-indigo-600 text-white font-semibold text-lg ring-2 ring-offset-2 ring-indigo-400 transition-all duration-150">
                                <?= $_SESSION['iniciais'] ?>
                            </span>
                        </a>
                        
                        <div id="user-menu" class="absolute right-0 top-full pt-1 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden 
                                    group-hover:block group-focus-within:block 
                                    border border-gray-100">
                            <div class="px-4 py-2 text-sm text-gray-700 border-b font-medium">
                                Olá, <?= $_SESSION['nome'] ?>!
                            </div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition">
                                Dashboard
                            </a>
                            <a href="auth/logout.php" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">
                                Logout
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition duration-150 shadow-md">
                        Login
                    </a>
                <?php endif; ?>

        </div>
        <!-- Hamburger mobile -->
        <div class="flex items-center md:hidden">
        <button id="menu-btn" class="text-gray-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        </div>
    </div>
    </div>
</nav>