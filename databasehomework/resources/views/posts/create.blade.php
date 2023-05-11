<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
  <div class="header">
            <h1 class="mb-4" style="font-family: cursive; text-align: center;">Create a New Post!</h1>
            <button class="burger">☰</button>
            <div class="menu" style="text-align: center;">
                <a href="{{ route('user.profile', ['id' => Auth::id()]) }}" class="btn-custom-danger">My Profile</a>
                <a href="{{ route('dashboard') }}" class="btn-custom-danger">Dashboard</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-custom-danger">Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label style="font-family: cursive">Title</label>
                                <input type="text" name="title" required maxlength="25" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label style="font-family: cursive">Content</label>
                                <textarea name="content" rows="4" cols="50" required maxlength="115" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Create Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


<!-- <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" style="display: flex; flex-direction: column; align-items: center; width: 70%; margin: auto; height: calc(100vh - 150px);">
            @csrf
            <div style="width: 100%; height: 100%;">
                <label style="display: block; text-align: center; font-family: cursive;">What are you thinking about?</label>
                 <div>
                  <label for="image">Image (optional)</label>
                  <input type="file" name="image" id="image">
                </div>
                <textarea name="content" rows="4" cols="50" required style="display: block; margin: 10px auto; width: 100%; height: 90%; resize: none;"></textarea>
            </div>
            <button type="submit" style="background-color: #AA714D; border: none; color: white; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 12px;">Create Post</button>
        </form> -->