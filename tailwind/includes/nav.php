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
                A Equipa
            </a>

            <?php 
            if(!isset($_SESSION['ligado']) || $_SESSION['ligado'] === false){
            ?>
            <a href="login.php" 
                class="relative text-gray-700 font-medium transition-all duration-300 
                    after:content-[''] after:absolute after:left-0 after:bottom-[-12px] 
                    after:w-0 after:h-[2px] after:bg-black after:transition-all after:duration-300 
                    hover:after:w-full hover:text-black">
                Login
            </a>
            <?php 
            }else{
            ?>
            <div class="relative group inline-block">
        
                <div class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold cursor-pointer select-none transition hover:bg-blue-700">
                    <?= $_SESSION['iniciais']; ?>
                </div>

                <div class="absolute right-0 mt-2 w-32 bg-white rounded-md shadow-lg py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right">
                    
                    <div class="px-4 py-2 text-xs text-gray-500 border-b border-gray-100">
                        Olá, <?= $_SESSION['nome'] ?>
                    </div>

                    <a href="auth/logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-red-600">
                        Sair (Logout)
                    </a>
                </div>

            </div>
            <?php
            }
            ?>

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