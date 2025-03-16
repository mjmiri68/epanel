@extends('layouts.auth')
@section('content')
    <h1 class="mb-8 text-2xl font-bold text-gray-800 dark:text-white">SignUp!!!</h1>
    <p class="mb-6 text-gray-600 dark:text-gray-400">Register account for access to panel</p>
    <livewire:auth.register />
    <div class="mt-20 text-gray-600 dark:text-gray-400">
        You have an account yet?
        <a class="font-medium text-indigo-600 underline" href="{{ route('login') }}" wire:navigate>Login</a>
    </div>
@stop
