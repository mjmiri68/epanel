<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Simple Panel" />
    <meta name="author" content="Mohammad javad Miri" />
    <link rel="shortcut icon" href={{ asset("favicon.png") }} />

    <title>{{$page_title ?? 'Miri Panel'}}</title>
    @vite('resources/css/app.css')
    @fluxAppearance
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="px-2 dark:hidden" />
        <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="px-2 hidden dark:flex" />

        <flux:input as="button" variant="filled" placeholder="Search..." icon="magnifying-glass" />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="home" href="{{ url('admin/dashboard') }}" wire:navigate current wire:current="font-bold text-zinc-800">Home</flux:navlist.item>
            <flux:navlist.item icon="inbox" badge="{{ App\Models\User::count() }}" href="{{ url('admin/users') }}" wire:navigate wire:current="font-bold text-zinc-800">User</flux:navlist.item>
            <flux:navlist.item icon="inbox" badge="{{ App\Models\Category::count() }}" href="{{ url('admin/categories') }}" wire:navigate wire:current="font-bold text-zinc-800">Categories</flux:navlist.item>
            <flux:navlist.item icon="inbox" badge="{{ App\Models\Product::count() }}" href="{{ url('admin/products') }}" wire:navigate wire:current="font-bold text-zinc-800">Products</flux:navlist.item>
        </flux:navlist>

        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
        </flux:navlist>

        <flux:dropdown position="top" align="start" class="max-lg:hidden">
            @if(auth()->check())
                <flux:profile avatar="https://fluxui.dev/img/demo/user.png" name="{{ auth()->user()->name }}" />
            @endif
            <flux:menu>
                <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <flux:header class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
        <flux:navbar class="lg:hidden w-full">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="start">
                <flux:profile avatar="https://fluxui.dev/img/demo/user.png" />

                <flux:menu>
                    <flux:menu.radio.group>

                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.item icon="arrow-right-start-on-rectangle">Logout</flux:menu.item>
                </flux:menu>
            </flux:dropdown>
        </flux:navbar>

        {{-- <flux:navbar scrollable>
            <flux:navbar.item href="#" current>Dashboard</flux:navbar.item>
            <flux:navbar.item badge="32" href="#">Orders</flux:navbar.item>
            <flux:navbar.item href="#">Catalog</flux:navbar.item>
            <flux:navbar.item href="#">Configuration</flux:navbar.item>
        </flux:navbar> --}}
    </flux:header>

    <flux:main>
        @yield('content')
    </flux:main>

    @fluxScripts
    @livewireScripts
    @stack('scripts')
</body>

</html>
