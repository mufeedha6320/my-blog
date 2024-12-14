<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index')}}">MyBlogs</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @if(Auth::check())

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('blog.create') ? 'active' : '' }}"
                            href="{{ route('blog.create') }}">Create Blog</a>
                    </li>
                    <li class="nav-item ml-2  {{ request()->routeIs('blog.list') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('blog.list') }}">My Blogs</a>
                    </li>
                    <li class="nav-item ml-2">
                        <form action="{{ route('user.logout') }}" method="POST" class="form-inline">
                            @csrf
                            <button class="btn text-white-50" type="submit">Logout</button>
                        </form>
                    </li>
                    @else

                    <li class="nav-item  {{ request()->routeIs('blog.register') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.register') }}">Register</a>
                    </li>
                    <li class="nav-item  {{ request()->routeIs('blog.login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('message'))
        <div class="alert alert-info text-center">
            {{ session('message') }}
        </div>
        @endif
        @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @yield('content')
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>

        $(document).ready(function() {
                CKEDITOR.replace('editor', {
                    removeButtons: 'Source,Save,ExportPdf,Cut,Copy,PasteFromWord,SelectAll,TextColor,NewPage,Preview,Print,Templates,Form,Checkbox,Radio,TextField,Select,Button,ImageButton,HiddenField,About,ShowBlocks,Language,Anchor,Image,PageBreak,Iframe,Textarea'

                });
            });
    </script>
</body>
</html>
