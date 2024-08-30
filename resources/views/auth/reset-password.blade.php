<x-layout>
    <h1 class="title">Reset your password</h1>

    <div class="max-auto max-w-scrren-sm card">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
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
            <div class="mb-5 relative">
                <label for="password_confirmation" class="font-bold">Confirm Password:</label>
                <input type="password" class="input @error('password') ring-red-500 @enderror" placeholder="Confirm Password" name="password_confirmation">
                @error('password_confirmation')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
            @enderror
            </div>
            <button type="submit" class="btn">Reset Password</button>
        </form>
    </div>
</x-layout>