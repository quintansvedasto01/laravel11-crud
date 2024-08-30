<x-layout>
    <div class="card">
        <div class="py-2">
            <h1>Please verify your email through the email we've sent you.</h1>
            <p>Didn't get the email?</p>
        </div>
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit" class="btn">Resend Email</button>
        </form>
    </div>
</x-layout>