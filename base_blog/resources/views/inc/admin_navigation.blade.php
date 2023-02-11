<div class="row justify-content-center">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link @isset($categories) active @endisset"
                               href="{{route('admin-categories')}}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @isset($posts) active @endisset" href="{{route('admin-post-page')}}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @isset($comments) active @endisset" href="{{route('admin-comments')}}">Comments moderation</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
