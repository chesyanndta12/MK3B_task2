<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>GT Gallery</title>
    <style>
        @layer base {
            :root {
                --accent-color: #D40000;
                --base-color: #0f0f0f;
                --text-color: #fbfcf8;
            }
        }
    </style>
</head>
<body class="min-h-screen bg-[--base-color] text-[--text-color] font-montserrat text-base">
    <!-- Header -->
    <header class="fixed top-0 left-0 w-full z-[100] flex justify-between items-center py-4 px-5 bg-transparent">
    <div class="text-2xl font-bold">GT Gallery</div>
    <nav class="hidden md:flex items-center space-x-6">
        <!-- Navigation Links -->
        <a href="#home" class="hover:text-[--accent-color]">Home</a>
        <a href="#brands" class="hover:text-[--accent-color]">Brands</a>
        <a href="#aboutus" class="hover:text-[--accent-color]">About Us</a>
        <a href="#footer" class="hover:text-[--accent-color]">Contact</a>

        <!-- Authentication Section -->
        <div class="relative">
            @if (Route::has('login'))
                @auth
                    <!-- Dropdown for Logged-in Users -->
                    <div x-data="{ open: false }" class="relative">
                        <button 
                            @click="open = !open" 
                            class="flex items-center text-white space-x-1">
                            <span>{{ auth()->user()->name }}</span>
                            <svg 
                                class="w-4 h-4" 
                                xmlns="http://www.w3.org/2000/svg" 
                                fill="none" 
                                viewBox="0 0 20 20" 
                                stroke="currentColor">
                                <path 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    stroke-width="2" 
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <ul 
                            x-show="open" 
                            @click.outside="open = false" 
                            class="absolute right-0 mt-2 w-36  bg-white text-gray-700 rounded-full shadow-lg z-10">
                            <li>
                                <a href="{{ route('profile') }}" 
                                   class="block text-center px-2 py-2 hover:bg-gray-100 rounded-full">
                                    Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Links for Guests -->
                    <ul class="flex space-x-4">
                        <li>
                            <a href="{{ route('login') }}" class="text-white text-sm no-underline p-2">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="text-white text-sm no-underline p-2">Register</a>
                            </li>
                        @endif
                    </ul>
                @endauth
            @endif
        </div>
    </nav>
</header>



    <!-- Main Content -->
    <main class="pt-6">
        <!-- Home Section -->
        <section id="home" class="min-h-screen bg-black text-white flex items-center justify-center">
            <div class="container mx-auto flex flex-wrap items-center px-4">
                <!-- Left Content -->
                <div class="w-full md:w-1/2 text-left">
                    <h1 class="text-[3.5rem] font-bold leading-tight">Your Journey Starts Here</h1>
                    <p class="text-[1.125rem] mt-4">Quality You Can Count On</p>
                    <a href="#brands" class="mt-8 inline-block">
                        <button class="bg-[#D40000] text-white font-bold text-[1.25rem] rounded-full py-3 px-12 transition-colors duration-300 hover:bg-white hover:text-[#D40000]">
                            Start
                        </button>
                    </a>
                </div>
                <!-- Right Image -->
                <div class="w-full md:w-1/2 mt-8 md:mt-0 flex justify-center">
                    <img src="{{ asset('storage/imgs/Untitled design (3).png') }}" alt="Home Illustration" class="max-w-full h-auto">
                </div>
            </div>
        </section>

            <!-- Brands Section -->
        <section id="brands" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10 p-10 px-12 text-center">
            @foreach ($products as $product)
                <article class="brands_card">
                    <div class="relative overflow-hidden group">
                        <!-- Gambar Produk -->
                        @if ($product->photo)
                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}" 
                                class="w-full h-auto rounded-[16px] transition-transform duration-300 group-hover:scale-105">
                        @else
                            <div class="w-full h-40 bg-gray-500 rounded-[16px] flex items-center justify-center">
                                <span class="text-white text-xl">No Photo Available</span>
                            </div>
                        @endif
                        
                        <!-- Overlay Hover -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <h1 class="text-2xl font-bold text-[--text-color]">{{ $product->name }}</h1>
                            <p class="text-lg">{{ $product->desc }}</p>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>




        <!-- About Us Section -->
        <br><br><br><br><br><br><br><br><br>
        <section id="aboutus" class="my-20 px-10 text-center">
            <h1 class="text-5xl font-bold mb-10">About Us</h1>
            <p class="text-xl mb-10">More about us and our mission</p>
            <div class="flex flex-wrap justify-center gap-10">
                @foreach ([
                    ['src' => 'jia.jpg', 'name' => 'Kezhia Aurelia'],
                    ['src' => 'jema.jpg', 'name' => 'Jema'],
                    ['src' => 'me.jpg', 'name' => 'Nam'],
                    ['src' => 'ce.jpg', 'name' => 'Chesya'],
                ] as $member)
                <article class="w-[20%] relative group overflow-hidden">
                    <img src="{{ asset('storage/imgs/' . $member['src']) }}" alt="{{ $member['name'] }}" class="w-full h-auto rounded-full transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <h2 class="text-white text-lg">{{ $member['name'] }}</h2>
                    </div>
                </article>
                @endforeach
            </div>
        </section>
        <!-- GT Section -->
        <br><br><br><br><br><br>
        <section class="flex flex-col items-center justify-center text-center my-20 px-10 min-h-screen">
            <h1 class="text-5xl font-semibold mb-6"> Where Quality Meets the Road</h1>
            <p class="text-xl">More Than Just a Deal</p>
            <div class="w-[50%] mt-10">
                <div class="text-6xl font-bold text-[--accent-color]">GRAN TURISMO</div>
                <div class="text-6xl font-bold text-[--text-color]">GRAND GALLERY</div>
                <img src="{{ asset('storage/imgs/Vferrari.png') }}" alt="Ferrari" class="w-full h-auto mt-6 rounded-lg">
            </div>
        </section>
        <br><br><br><br><br><br>

    </main>

    <!-- Footer -->
    <footer id="footer" class="bg-[--text-color] py-10 text-center">
        <p class="text-lg font-semibold text-[--accent-color]">© GT Gallery | @GT_Gallery | All rights reserved.</p>
    </footer>
</body>
</html>