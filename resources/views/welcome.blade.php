<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechMart | Solusi Aksesoris Teknologi Premium</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white selection:bg-blue-500 selection:text-white">

    <nav class="fixed w-full z-50 bg-white/90 backdrop-blur-md border-b border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-2">
                    <div class="bg-blue-600 p-2 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                    </div>
                    <span class="text-2xl font-black tracking-tighter text-slate-900 uppercase">TECH<span class="text-blue-600">MART.</span></span>
                </div>
                <div class="flex items-center gap-6">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-bold text-slate-700 hover:text-blue-600 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-bold text-slate-700 hover:text-blue-600 transition">Masuk</a>
                            <a href="{{ route('register') }}" class="bg-slate-900 text-white px-6 py-3 rounded-xl font-bold shadow-xl shadow-slate-200 hover:bg-blue-600 transition transform hover:-translate-y-1">
                                Join Member
                            </a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <div class="absolute top-20 -left-20 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
        <div class="absolute bottom-20 -right-20 w-96 h-96 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="inline-block px-4 py-1.5 mb-6 text-sm font-bold tracking-widest text-blue-600 uppercase bg-blue-50 rounded-full border border-blue-100">
                    Premium Tech Accessories
                </span>
                <h1 class="text-6xl md:text-8xl font-black text-slate-900 mb-8 leading-none tracking-tight">
                    Upgrade Your <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-500">
                        Digital Lifestyle
                    </span>
                </h1>
                <p class="max-w-2xl mx-auto text-xl md:text-2xl text-slate-500 leading-relaxed mb-12">
                    Lengkapi produktivitas Anda dengan aksesoris teknologi kelas dunia. Dari setup meja kerja hingga perangkat mobile, kami punya semuanya.
                </p>

                <div class="flex flex-col sm:flex-row justify-center items-center gap-8">
                    <a href="{{ route('register') }}" class="w-full sm:w-auto bg-blue-600 text-white px-10 py-5 rounded-2xl font-black text-xl hover:bg-slate-900 transition-all duration-300 shadow-2xl shadow-blue-200 group">
                        Belanja Sekarang 
                        <span class="inline-block transition-transform group-hover:translate-x-2">→</span>
                    </a>
                    <div class="flex flex-col items-center sm:items-start">
                        <div class="flex -space-x-3 mb-2">
                            <img class="w-10 h-10 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=User+1&background=0284c7&color=fff" alt="">
                            <img class="w-10 h-10 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=User+2&background=4f46e5&color=fff" alt="">
                            <img class="w-10 h-10 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=User+3&background=06b6d4&color=fff" alt="">
                            <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 border-white bg-slate-100 text-[10px] font-bold shadow-sm">
                                5k+
                            </div>
                        </div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Trusted by Techies</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 hover:border-blue-500 hover:shadow-2xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04kM12 21.48l2 2 4-4m5.618-4.016"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04kM12 21.48l2 2 4-4m5.618-4.016"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Authentic Quality</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">Semua produk yang kami jual 100% original dengan garansi resmi untuk ketenangan pikiran Anda.</p>
                </div>

                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 hover:border-blue-500 hover:shadow-2xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Latest Technology</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">Selalu terdepan dalam menghadirkan aksesoris gadget terbaru yang mengikuti tren teknologi masa kini.</p>
                </div>

                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 hover:border-blue-500 hover:shadow-2xl transition-all duration-300 group">
                    <div class="w-16 h-16 bg-cyan-50 text-cyan-600 rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:bg-cyan-600 group-hover:text-white transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">24/7 Support</h3>
                    <p class="text-slate-500 leading-relaxed text-sm">Tim ahli kami siap membantu Anda memilih perangkat yang paling tepat untuk kebutuhan setup Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white py-12 border-t border-slate-100 text-center">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-center gap-2 mb-4 opacity-50">
                <div class="bg-slate-900 p-1 rounded">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2-2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                </div>
                <span class="font-black text-slate-900 text-sm tracking-tighter uppercase">TECHMART</span>
            </div>
            <p class="text-slate-400 text-sm font-medium uppercase tracking-[0.3em]">&copy; 2025 TechMart Indonesia. Built for the future.</p>
        </div>
    </footer>

</body>
</html>