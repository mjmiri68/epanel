@extends('layouts.auth')
@section('content')
    <h1 class="mb-8 text-2xl font-bold text-gray-800 dark:text-white">Welcome Back!</h1>
    <p class="mb-6 text-gray-600 dark:text-gray-400">Access your account to explore our amazing features.</p>
    <livewire:auth.login />
    <div class="mt-20 text-gray-600 dark:text-gray-400">
        Don't have an account yet?
        <a class="font-medium text-indigo-600 underline" href="{{ route('register') }}" wire:navigate>Sign up</a>
    </div>
@stop
