@extends('layout/foundation')
@section('head_link_script')
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h1 id="main-title">My Blog Title</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <!-- post-->
                <div class="post">
                    <h2 class="post-title">
                        {{$post->title}}
                    </h2>
                    <div class="post-meta text-muted">
                        <ul class="list-inline">
                            <li class="datetime list-inline-item">Date: {{$post->date}}</li>
                            <li class="list-inline-item">Category: <a
                                    href="/?category_title={{$post->category_title}}">{{$post->category_title}}</a></li>
                        </ul>
                    </div>
                    <div class="post-body">
                        <p>
                            {{$post->body}}
                        </p>
                    </div>
                </div>
                @isset($commentsPost)

                    <div id="comments">
                        <h3 id="comments-title">Comments</h3>

                        <!-- comment-->
                        @foreach($commentsPost as $comment)
                            <div class="comments-item">
                                <h5 class="comment-title">{{$comment->name}} <small
                                        class="text-muted">at {{$comment->date}}</small>
                                </h5>
                                <div class="comment-body">
                                    {{$comment->body}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endisset

                <form id="new-comment-form" action="{{route('posts',['id'=>$post->id])}}" method="get">
                    @csrf
                    <div class="mb-3">
                        <label for="comment-input-name" class="form-label">Name</label>
                        <input placeholder="Your name" type="text" class="form-control" id="comment-input-name" name="comment-input-name">
                    </div>
                    <div class="mb-3">
                        <label for="comment-input-text" class="form-label">Comment</label>
                        <textarea placeholder="Write you message" class="form-control"
                                  id="comment-input-text" name="comment-input-text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add comment</button>
                </form>
            </div>
            @endsection
        </div>
    </div>

