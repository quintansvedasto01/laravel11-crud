<x-layout>
    <h1 class="title">
        Welcome {{ auth()->user()->username }}, you have
        <span>{{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}</span>  
    </h1>

    @if (session('success'))
        <x-flash_message message="{{ session('success') }}" />
    @elseif (session('delete'))
        <x-flash_message message="{{ session('delete') }}" :color="'bg-red-500'"/>
    @endif
    
    {{-- Create Post Form --}}
    <div class="card mb-4">
        <h2 class="font-bold mb-4">Create a New Post</h2>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5 relative">
                <label for="title" class="font-bold">Title:</label>
                <input type="text" class="input @error('title') ring-red-500 @enderror" placeholder="Title" name="title" value="{{ old('title') }}">
                @error('title')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5 relative">
                <label for="title" class="font-bold">Post Content:</label>
                <textarea name="body" id="" cols="30" rows="10" class="input @error('title') ring-red-500 @enderror" value="{{ old('body') }}"></textarea>
                @error('body')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5 relative">
                <label for="iamge" class="font-bold">Cover Photo:</label>
                <input type="file" name="image" id="image" class="input">
                @error('image')
                    <p class="error absolute top-[-15]">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn">Create</button>
        </form>
    </div>

    <h2 class="text-xl font-bold">Your Latest Posts</h2>
    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <x-post_card :post="$post" >
                <a href="{{ route('posts.edit', $post->id) }}" class="flex items-center justify-center text-blue-500 text-sm h-[30px] w-[30px] hover:bg-blue-500 hover:text-white rounded-full duration-600 ease-in-out" title="Update Post">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center justify-center text-red-500 text-sm h-[30px] w-[30px] hover:bg-red-500 hover:text-white rounded-full duration-300 ease-in-out" title="Delete Post">
                        <i class="fa-regular fa-trash-can"></i>
                    </button>
                </form>
            </x-post_card>
        @endforeach
    </div>
    {{-- Pagination --}}
    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
