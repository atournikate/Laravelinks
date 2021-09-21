@extends('layouts.app')

@section('content')
    <div class="title">
        <h1>
            {{ $user->name }}
        </h1>
        <p class="postLight">has created {{ $posts->count() }} {{ Str::plural('post', $posts->count()) }}</p>
        {{-- <p>has received {{ $user->receivedLikes->count() }} likes </p> --}}
    </div>
    <div class="container">
        <div class="item">
            @if ($posts->count())
                @foreach ($posts as $post)
                
                {{-- this is where the div content for the component.post.blade 
                    was located, but then we moved it and replaced it with the 
                    component caller and its props shown below. --}}
                   <x-post :post="$post" />
                
                @endforeach

                {{ $posts->links() }}
            
            @else
             <p>
                {{ $user->name }} does not have any posts yet!
            </p>
            @endif
        </div>

    </div>
@endsection