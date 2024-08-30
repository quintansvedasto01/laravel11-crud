<x-layout>
    <h1 class="title">Latest Posts</h1>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-6 place-items-center">
        @foreach ($posts as $post)
            <x-post_card :post="$post" />
        @endforeach
    </div>
    {{-- Pagination --}}
    <div>
        {{ $posts->links() }}
    </div>
</x-layout>