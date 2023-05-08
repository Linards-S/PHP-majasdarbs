
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7/1L_dstPt3HV5HzF6Gvk/e3Gw6fqW8fJUKzE2A/" crossorigin="anonymous"> -->
</head>
<body>
@php
    use Illuminate\Support\Facades\Storage;
@endphp
<div class="container">
        <div class="header">
        <h1 class="mb-4" style="font-family: cursive;">-Dashboard-</h1>
        <div class="menu">
        <a href="{{ route('posts.create') }}" class="btn-custom">Create Post</a>
        <a href="{{ route('user.profile', ['id' => Auth::id()]) }}" class="btn-custom">My Profile</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-custom">Log Out</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
    </div></div>
        <div class="row">
            @foreach($posts as $post)
                
                    <div class="post">
                        
                     @if ($post->image)
    <img src="{{ asset('storage/' . $post->image) }}" alt="Post image" class="post-image">
@endif
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->content }}</p>
                        <div class="post-data">
                        <p>{{ $post->created_at->format('M d, Y') }}</p>
                        <a href="{{ route('user.profile', ['id' => $post->user->id]) }}">{{ $post->user->name }}</a>
                       </div>
                    </div>
                
            @endforeach
        </div>
        
    </div>
</body>
</html>
