<x-layout>
    <h1 class="title">Request a password reset email</h1>

    @if (session('status'))
        <x-flash_message message="{{ session('status') }}" />
    @endif

    <div class="max-auto max-w-scrren-sm card">
        <form action="{{ route('password.request') }}" method="POST" x-data="formSubmit" @submit.prevent="submit">
            @csrf  {{-- Required for form with POST method --}}
            <div class="mb-5 relative">
                <label for="email" class="font-bold">Email:</label>
                <input type="text" class="input @error('email') ring-red-500 @enderror" placeholder="Email" name="email" value="{{ old('email') }}">
                @error('email')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn" x-ref="btn">Submit</button>
        </form>
    </div>
</x-layout>