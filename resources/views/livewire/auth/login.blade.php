<div>
    <form wire:submit.prevent="login">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" wire:model="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" wire:model="password">
        </div>
        <button type="submit">Login</button>
    </form>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <a href="{{ route('register') }}">Register</a>

</div>
