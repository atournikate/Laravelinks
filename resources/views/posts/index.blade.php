@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="writePost">
            <form action="{{ route('posts') }}" method="post">
                @csrf
                <div class="formField">
                    <label for="body" class="sr-only"></label><br>
                    <textarea name="body" id="body" cols="80" rows="6"
                    class="postBody @error('body') box @enderror"
                    placeholder="Write your post here!" ></textarea>

                    @error('body')
                        <div class="alert">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <button type="submit" class="btn">Post</button>
            </form>

            @if ($posts->count())
                @foreach ($posts as $post) 
                    <div class="postCard">
                        <a href="" class="poster">{{ $post->user->username }}</a> 
                        <span class="postLight">{{ $post->created_at->diffForHumans() }}</span>
                        <p class="postMessage">{{ $post->body }}</p>
                        
                        <div class="postRate">

                            @if (!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="rateItem">
                                    @csrf
                                    <button type="submit" class="btn postLike">Like</button>
                                </form>

                            @else
                                <form action="{{ route('posts.likes', $post) }}" method="post" class="rateItem">
                                    @csrf
                                    {{-- the following (below) is called 'method spoofing'
                                    the word 'spoof' means to trick or imitate --}}
                                    @method('DELETE')
                                    <button type="submit" class="btn postLike">Unlike</button>
                                </form>
                            @endif

                            <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>

                        </div>
                    </div>
                
                @endforeach

                {{ $posts->links() }}
            
            @else
            <p>You haven't posted anything yet! Oh no!</p>
            @endif
        </div>

    </div>
@endsection