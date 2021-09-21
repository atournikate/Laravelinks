@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="writePost">
            @auth
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
            @endauth
        </div>

            @if ($posts->count())
                @foreach ($posts as $post)
                   <x-post :post="$post" />
                @endforeach

                {{ $posts->links() }}
            
            @else
             <p>
                No posts yet!
            </p>
            @endif
        </div>

    </div>


    </div>
@endsection