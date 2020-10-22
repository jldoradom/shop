

{{-- <div class="relative flex items-top justify-center  bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Panel</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registro</a>
                @endif
            @endif
        </div>
    @endif
</div> --}}

<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('web.admin_header_productos')
        </h2>
    </x-slot> --}}

    <div class="">
        <div class="">
            <div class="">
                <div>
                    <livewire:producto-component />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





