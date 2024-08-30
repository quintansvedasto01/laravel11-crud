<x-layout>
    <h1 class="title">
        {{ $user->username == auth()->user()->username 
            ? 'My' 
            : $posts[0]->user->username . "'s" }} Posts &#8718;
        <span>{{ $posts->count() }}</span>    
    </h1>
    <div class="grid grid-cols-2 gap-6">
        @foreach ($posts as $post)
            <x-post_card :post="$post" />
        @endforeach
    </div>
    {{-- Pagination --}}
    <div>
        {{ $posts->links() }}
    </div>
</x-layout>
