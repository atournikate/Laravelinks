@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="item">
            <x-post :post="$post" />
        </div>

    </div>
@endsection