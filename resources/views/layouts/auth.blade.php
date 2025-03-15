<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Simple CMS" />
    <meta name="author" content="Sheikh Heera" />
    <link rel="shortcut icon" href={{ asset('favicon.png') }} />

    <title>{{$page_title ?? 'Miri Panel'}}</title>
    @vite('resources/css/app.css')
    @fluxAppearance
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800">
    <div class="flex min-h-screen w-full flex-wrap items-stretch bg-white dark:bg-gray-800 max-md:pb-20 max-md:pt-32">
        <div class="grow md:flex md:w-1/2 md:flex-col md:items-center md:justify-center md:py-20">
            <div class="w-full px-4 text-center text-xs lg:w-1/2">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <flux:main>
                    @yield('content')
                </flux:main>
            </div>
        </div>

        <div class="hidden flex-col justify-center overflow-hidden bg-cover bg-center md:flex md:w-1/2"
            style="background-image: url(https://img.freepik.com/free-vector/gray-neural-network-illustration_53876-78764.jpg?size=626&ext=jpg)">
            <img class="translate-x-[27%] rounded-[36px] shadow-[0_24px_88px_rgba(0,0,0,0.55)]"
                src="https://images.unsplash.com/photo-1566241477600-ac026ad43874?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwyfHxzY3JlZW5zaG90fGVufDB8MHx8fDE3Mjk1MTI1OTB8MA&ixlib=rb-4.0.3&q=80&w=1080"
                alt="Service Dashboard Mockup">
        </div>
    </div>


    @fluxScripts
</body>

</html>
