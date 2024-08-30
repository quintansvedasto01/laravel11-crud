<x-layout>
    <h1 class="title">Register</h1>

    <div class="max-auto max-w-scrren-sm card">
        <form action="{{ route('register') }}" method="POST" x-data="formSubmit" @submit.prevent="submit">
            @csrf
            <div class="mb-5 relative">
                <label for="username" class="font-bold">Username:</label>
                <input type="text" class="input @error('username') ring-red-500 @enderror" placeholder="Username" name="username" value="{{ old('username') }}">
                @error('username')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
                @enderror
            </div>
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
            <div class="mb-5 flex justify-between items-center">
                <div>
                    <input type="checkbox"name="subscribe" id="subscribe">
                    <label for="subscribe">Subscribe to LaraBlade</label>
                </div>
                <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">Already have an account?</a>
            </div>
            <button type="submit" class="btn" x-ref="btn">Register</button>
        </form>
    </div>
</x-layout>