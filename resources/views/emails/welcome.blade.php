<h1>Hello {{ $user->username }} </h1>
<div>
    <h2>You created {{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
    <img src="{{ $message->embed('storage/' . $post->image) }}" alt="" width="300">
</div>