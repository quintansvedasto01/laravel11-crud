@props([
    'post',
    'full' => false
])

<div class="card flex flex-col justify-between">
    <div>
        <div class="h-52 rounded-md w-full object-cover overflow-hidden">
            <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('storage/post_images/default.jpg') }}" alt="post_image">
        </div>

        <h2 class="font-bold text-xl">{{ $post->title }}</h2>
        <div class="text-xs font-light mb-4"> 
            <span>Posted {{ $post->created_at->diffForHumans() }} by </span>
            <a href="{{ route('posts.user', $post->user->id) }}" class="text-blue-500 hover:underline">{{ $post->user->username }}</a>
        </div>
        @if ($full)
            <div class="text-sm text-justify">
                <span>{{ $post->body }}</span>
            </div>
        @else
            <div class="text-sm text-justify">
                <span>{{ Str::words($post->body, 15) }}</span>
                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">Read More &rarr;</a>
                
            </div>
        @endif
    </div>

    <div class="flex items-center justify-end gap-4  mt-6">
        {{ $slot}}
    </div>
</div> 
