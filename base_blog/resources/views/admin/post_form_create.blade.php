@extends('layout/foundationAdmin')
@section('head_link_script')
@endsection
@section('add_head_link_script_Admin')
@endsection
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h1 id="main-title">Admin Panel</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- navigation-->
        @include('inc.admin_navigation')

        <!--    content-->
        <div class="row">
            <div class="col-md-12">
                <h2 id="add-new-post-title">Add new post</h2>

                <form id="new-post-form" method="post" action="{{route('admin-create-post')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="new-post-title" class="form-label" >Title</label>
                        <input name = 'title' placeholder="Title" type="text" class="form-control" id="new-post-title">
                    </div>
                    <div class="mb-3">
                        <label for="new-post-category" class="form-label">Category</label>
                        <select class="form-control" id="new-post-category" name ='category'>
                            @foreach($categoriesTitle as $categoryTitle)
                            <option>{{$categoryTitle->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="comment-input-text" class="form-label">Body</label>
                        <textarea name = 'body' placeholder="Write you post here..." class="form-control"
                                  id="comment-input-text"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create post</button>
                </form>
            </div>
        </div>
    </div>
@endsection

