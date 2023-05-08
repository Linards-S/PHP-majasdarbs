<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3Gw6fqW8fJUKzE2A/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
<div class="container">
        <div class="header">
        <h1 class="mb-4" style="font-family: cursive;">{{ $user->name }}'s Profile</h1>
        <div class="menu">
        <a href="{{ route('posts.create') }}" class="btn-custom-danger">Create Post</a>
        <a href="{{ route('dashboard') }}" class="btn-custom-danger">Dashboard</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-custom-danger">Log Out</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form></div>
        </div>
       <h2 class="mb-3" style="font-family: cursive;">My Posts:</h2> 
       @foreach($posts as $post)
            <div class="post">
                 <h3>{{ $post->title }}</h3>
                <p>{{ $post->content }}</p>
                <p>{{ $post->created_at->format('M d, Y') }}</p>
                <a href="{{ route('user.profile', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a>
                @if(Auth::id() === $post->user_id)
                <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST" class="post-delete-btn">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-custom-danger">Delete Post</button>
                    </form>
                @endif
            </div>
        @endforeach
        
    </div>
</body>
</html>