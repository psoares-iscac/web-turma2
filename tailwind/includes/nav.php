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
            if($_SESSION['ligado'] === false){
            ?>
            <a href="login.php" 
                class="relative text-gray-700 font-medium transition-all duration-300 
                    after:content-[''] after:absolute after:left-0 after:bottom-[-12px] 
                    after:w-0 after:h-[2px] after:bg-black after:transition-all after:duration-300 
                    hover:after:w-full hover:text-black">
                Login
            </a>
            <?php 
            }else echo $_SESSION['nome']; 
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