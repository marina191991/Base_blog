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
                <h2 id="add-new-post-title">Edit comment</h2>

                <form id="new-comment-form" method="post" action="{{route('admin-comment-edit')}}/?id={{$comment->id}}">
                    @csrf
                    <div class="mb-3">
                        <label for="new-comment-title" class="form-label">Name</label>
                        <input name="name" placeholder="Name" value={{$comment->name}} type="text" class="form-control" id="new-comment-title">
                    </div>
                    <div class="mb-3">
                        <label for="comment-input-text" class="form-label">Body</label>
                        <textarea  class="form-control" name="body"
                                  id="comment-input-text">{{$comment->body}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Ok</button>
                </form>
            </div>
        </div>
    </div>
@endsection

