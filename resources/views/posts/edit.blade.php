<x-layout>
    <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500 hover:underline">
        &larr; Go back to your dashboard 
    </a>
        
    {{-- Edit Post Form --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Update your Post</h2>

        <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-5 relative">
                <label for="title" class="font-bold">Title:</label>
                <input type="text" class="input @error('title') ring-red-500 @enderror" placeholder="Title" name="title" value="{{ $post->title }}">
                @error('title')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5 relative">
                <label for="title" class="font-bold">Post Content:</label>
                <textarea name="body" id="" cols="30" rows="10" class="input @error('title') ring-red-500 @enderror">{{ $post->body }}</textarea>
                @error('body')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
                @enderror
            </div>

            @if($post->image)
            <div class="h-full rounded-md w-1/4 object-cover overflow-hidden mb-5">
                <label class="font-bold">Current Cover Photo:</label>
                <img src="{{ asset('storage/' . $post->image) }}" alt="post_image">
            </div>
            @endif

            <div class="mb-5 relative">
                <label for="iamge" class="font-bold">Cover Photo:</label>
                <input type="file" name="image" id="image" class="input">
                @error('image')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn">Update</button>
        </form>
    </div>
</x-layout>
