@include('components.css.frontNavStyle')
<nav class="navbar ">
    <div class="navbar-container container">
        <input type="checkbox" name="" id="">
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
        <ul class="menu-items">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Category</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Testimonial</a></li>
            <li><a href="#">Contact</a></li>

            @if (Route::has('login'))
            @auth
            <li>
                <div class="flex justify-center">
                    <div x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }
 
                this.$refs.button.focus()
 
                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return
        
                        this.open = false
 
                focusAfter && focusAfter.focus()
            }
        }" x-on:keydown.escape.prevent.stop="close($refs.button)" x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']" class="relative">
                        <!-- Button -->
                        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')" type="button" class="flex items-center gap-2 bg-white  py-2.5 rounded-md shadow">
                            {{ Auth::user()->name }}

                            <!-- Heroicon: chevron-down -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Panel -->
                        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;" class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md">


                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>





                            <x-dropdown-link :href="route('dashboard')">
                                {{ __('dashboard') }}
                            </x-dropdown-link>

                        </div>
                    </div>
                </div>

            </li>
            @else
            <li><a href="{{ route('login') }}" class="font-semibold text-blue-500  hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
            </li>
            @if (Route::has('register'))
            <li> <a href="{{ route('register') }}" class=" font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
            @endif
            @endauth
            @endif
        </ul>
        <h1 class="logo">Navbar</h1>
    </div>
</nav>