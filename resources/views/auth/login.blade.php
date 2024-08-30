<x-layout>
    <h1 class="title">Login</h1>

    @if (session('status'))
        <x-flash_message message="{{ session('status') }}" />
    @endif

    <div class="max-auto max-w-scrren-sm card">
        <form action="{{ route('login') }}" method="POST">
            @csrf  {{-- Required for form with POST method --}}
            @error('failed')
                <p class="error text-center">{{ $message }}</p>
            @enderror
            <div class="mb-5 relative">
                <label for="email" class="font-bold">Email:</label>
                <input type="text" class="input @error('email') ring-red-500 @enderror" placeholder="Email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5 relative">
                <label for="password" class="font-bold">Password:</label>
                <input type="password" class="input @error('password') ring-red-500 @enderror" placeholder="Password" name="password">
                @error('password')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5 flex justify-between items-center">
                <div>
                    <input type="checkbox"name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">Forgot Your Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</x-layout>