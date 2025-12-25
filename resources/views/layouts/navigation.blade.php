<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2 group">
                        <div class="bg-white-600 p-2 rounded-xl group-hover:rotate-12 transition-transform duration-300">
                            <x-application-logo class="block h-10 w-auto fill-current text-white" />
                        </div>
                        <span class="font-black text-xl tracking-tighter text-slate-900">Tech<span class="text-blue-600">Mart</span></span>
                    </a>
                </div>

                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex items-center">
                    @if(Auth::user()->role == 'admin')
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-[11px] font-black uppercase tracking-widest">
                            {{ __('Admin Panel') }}
                        </x-nav-link>

                        <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.*')" class="text-[11px] font-black uppercase tracking-widest">
                            {{ __('Categories') }}
                        </x-nav-link>

                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')" class="text-[11px] font-black uppercase tracking-widest">
                            {{ __('Inventory') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.*')" class="text-[11px] font-black uppercase tracking-widest">
                            {{ __('Incoming Orders') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" class="text-[11px] font-black uppercase tracking-widest">
                            {{ __('Users') }}
                        </x-nav-link>
                    @endif

                    @if(Auth::user()->role == 'user')
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-[11px] font-black uppercase tracking-widest">
                            {{ __('Dashboard') }}
                        </x-nav-link>

                        <x-nav-link :href="route('user.menu')" :active="request()->routeIs('user.menu')" class="text-[11px] font-black uppercase tracking-widest">
                            {{ __('Store') }}
                        </x-nav-link>

                        <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')" class="relative text-[11px] font-black uppercase tracking-widest">
                            {{ __('Cart') }}
                            @php
                                $cartCount = \App\Models\Cart::where('user_id', Auth::id())->count();
                            @endphp
                            @if($cartCount > 0)
                                <span class="absolute -top-1 -right-4 flex h-4 w-4">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-4 w-4 bg-blue-600 text-[9px] font-black text-white items-center justify-center">
                                        {{ $cartCount }}
                                    </span>
                                </span>
                            @endif
                        </x-nav-link>

                        <x-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index')" class="text-[11px] font-black uppercase tracking-widest">
                            {{ __('Orders') }}
                        </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-slate-100 text-sm leading-4 font-bold rounded-xl text-slate-700 bg-slate-50 hover:bg-white hover:shadow-sm transition ease-in-out duration-150">
                                <div class="w-6 h-6 bg-blue-600 rounded-lg flex items-center justify-center text-[10px] text-white mr-2">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 py-2 border-b border-slate-50">
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Account Node</p>
                            </div>
                            <x-dropdown-link :href="route('profile.edit')" class="font-bold text-slate-700">
                                {{ __('My Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="font-bold text-red-600 hover:bg-red-50"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Sign Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition duration-150">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-slate-100">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="font-bold">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.menu')" :active="request()->routeIs('user.menu')" class="font-bold">
                {{ __('Store') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-slate-100">
            <div class="px-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center text-white font-black">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-black text-slate-900">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-xs text-slate-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();" class="text-red-600 font-bold">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>