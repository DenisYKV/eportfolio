<!-- Settings Dropdown -->
<li> @if (Auth::user()->avatar)
                    <img  width="30" style="height:30px" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar"
                        class="rounded-full">
                @else
                    <img width="30" style="height:30px" src="https://cdn-icons-png.flaticon.com/512/12225/12225881.png" alt="Avatar" class="rounded-full">
                @endif
    {{ Auth::user()->name }}
    <ul>
        <li>
            <x-dropdown-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-dropdown-link>
        </li>
        <li>
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </li>
    </ul>
</li>
