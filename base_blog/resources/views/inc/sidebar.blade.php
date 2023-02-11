<div class="col-md-4">
    <div id="sidebar-categories">
        <h3 id="sidebar-categories-title">Categories</h3>
        <ul>
            @foreach($categories as $category)
                @if(isset($categoryTitle))
                    @if($categoryTitle==$category->title)
                        <li class="sidebar-categories-item active">
                            {{$category->title}}</li>

                    @else
                        <li class="sidebar-categories-item">
                            <a
                                href="/?category_title={{$category->title}}">{{$category->title}}</a></li>
                    @endif
                @else
                    <li class="sidebar-categories-item ">
                        <a
                            href="/?category_title={{$category->title}}">{{$category->title}}</a></li>
                @endif
            @endforeach
        </ul>
    </div>

    <div id="sidebar-comments">
        <h3 id="sidebar-comments-title">Last Comments</h3>
        @foreach($comments as $comment)
            <div class="sidebar-comments-item" id="{{$comment->id}}">
                <div class="sidebar-comments-item-title">
                    <span class="nickname">{{$comment->name}}</span> <a
                        href="{{route('posts',['id'=>$comment->postID])}}#{{$comment->id}}">commented</a> post <a
                        href="{{route('posts',['id'=>$comment->postID])}}"
                        class="post-title">{{$comment->post_title}}</a>:
                </div>
                <div class="sidebar-comments-item-body">
                    {{$comment->body}}
                </div>
                @endforeach
            </div>
    </div>
</div>

