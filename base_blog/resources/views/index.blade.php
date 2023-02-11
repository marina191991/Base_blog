@extends('layout/foundation')
@section('head_link_script')
    @parent
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
                @isset($categoryTitle)
                    <div class="alert alert-info" role="alert">
                        Now is showing the posts only from category <strong>{{$categoryTitle}}</strong>. You can go back
                        to
                        <a href="{{route('index')}}" class="alert-link">homepage</a>.
                    </div>
                @endisset
                @isset($posts)
                    <!-- post-->
                    @foreach($posts as $post)
                        <div class="post-preview">
                            <h2 class="post-preview-title">
                                {{$post->title}}
                            </h2>
                            <div class="post-preview-meta text-muted">
                                <ul class="list-inline">
                                    <li class="datetime list-inline-item">Date: {{$post->date}}</li>
                                    <li class="list-inline-item">Category: <a
                                            href="/?category_title={{$post->category_title}}">{{$post->category_title}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="post-preview-body">
                                {{$post->body}}
                            </div>
                            <div class="post-preview-buttons">
                                <a href="{{route('posts',['id'=>$post->id])}}" class="btn btn-primary">Open</a>
                            </div>
                        </div>
                    @endforeach
                @endisset

                @if ($totalCountPost>5)
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">

                            <li class="page-item @if($page==1) disabled @endif">
                                <a class="page-link"
                                   href="{{route('index')}}?page={{$page-1}}@isset($categoryTitle)&category_title={{$categoryTitle}}@endisset">Previous</a>
                            </li>

                            @if($totalCountPages<5)
                                @for($i=1;$i<=$totalCountPages;$i++)
                                    <li class="page-item"><a class="page-link @if ($page==$i) active @endif"
                                                             href="{{route('index')}}?page={{$i}}@isset($categoryTitle)&category_title={{$categoryTitle}}@endisset">{{$i}}</a>
                                    </li>
                                @endfor
                            @endif
                            @if($totalCountPages>5)

                                @if($page>5)
                                    @for($i=$page-4;$i<=$page;$i++)
                                        <li class="page-item"><a class="page-link @if ($page==$i) active @endif"
                                                                 href="{{route('index')}}?page={{$i}}@isset($categoryTitle)&category_title={{$categoryTitle}}@endisset">{{$i}}
                                            </a>
                                        </li>
                                    @endfor

                                @else
                                    @for($i=1;$i<=5;$i++)
                                        <li class="page-item"><a class="page-link @if ($page==$i) active @endif"
                                                                 href="{{route('index')}}?page={{$i}}@isset($categoryTitle)&category_title={{$categoryTitle}}@endisset">{{$i}}@if($i==5)
                                                    ...
                                                @endif
                                            </a>
                                        </li>
                                    @endfor
                                @endif
                            @endif
                            <li class="page-item @if ($page == $totalCountPages) disabled @endif">
                                <a class="page-link"
                                   href="{{route('index')}}?page={{$page+1}}@isset($categoryTitle)&category_title={{$categoryTitle}}@endisset">Next</a>
                            </li>
                        </ul>
                    </nav>
                @endif
            </div>
            @endsection
        </div>
    </div>



