@props([
    'message',
    'color' => 'bg-green-500'
])

<p class="mb-2 text-sm text-center font-medium text-white  px-3 py-2 rounded-md {{ $color }}">
    {{ $message }}
</p>