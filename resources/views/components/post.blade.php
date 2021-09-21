@props(['post' => $post])

<div class="postCard">
    <a href="{{ route('users.posts', $post->user) }}" class="poster">{{ $post->user->username }}</a> 
    <span class="postLight">{{ $post->created_at->diffForHumans() }}</span>
    
    <p class="postMessage">{{ $post->body }}</p>
    

    <div class="postRate">

    {{-- @if ($post->ownedBy(auth()->user())) <.... this would have worked but was rendered 
        obsolete with the use of the PostPolicy--}}
        {{-- <div> --}}

            @can('delete', $post)
            <form action="{{ route('posts.destroy', $post) }}" method="post" class="rateItem">
                @csrf
                @method('DELETE')
                <button type="submit" class="postBtn">Delete</button>
            </form>
            @endcan
        {{-- </div> --}}
    {{-- @endif --}}

        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="rateItem">
                    @csrf
                    <button type="submit" class="postBtn">Like</button>
                </form>

            @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="rateItem">
                    @csrf
                    {{-- the following (below) is called 'method spoofing'
                    the word 'spoof' means to trick or imitate --}}
                    @method('DELETE')
                    <button type="submit" class="postBtn">Unlike</button>
                </form>
            @endif
        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

    </div>
</div>