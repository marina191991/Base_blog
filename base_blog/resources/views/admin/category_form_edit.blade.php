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
                <h2 id="add-new-post-title">Edit category</h2>

                <form id="new-post-form" method="get" action="{{route('admin-category-edit',['id'=>$category->id])}}" >
                    @csrf
                    <div class="mb-3">
                        <label for="new-post-title" class="form-label">Title</label>
                        <input placeholder="Title" name="category-title" type="text" class="form-control" id="new-post-title" value="{{$category->title}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit category</button>
                </form>
            </div>
        </div>
    </div>
@endsection

