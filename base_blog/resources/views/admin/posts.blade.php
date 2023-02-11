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

                <div class="create d-flex flex-row-reverse">
                    <div class="p-2">
                        <a href="{{route('admin-post_form-create')}}" class="btn btn-success">+ Create Post</a>
                    </div>
                </div>

                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            {{$post->id}}
                        </td>
                        <td>
                            {{$post->title}}
                        </td>
                        <td>
                           {{$post->category_title}}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="button" class="btn btn-warning" onClick="location.href='{{route('admin-post_form-edit')}}?id={{$post->id}}'">Edit</button>
                                <button type="submit" class="btn btn-danger" onClick="location.href='{{route('admin-delete-post')}}?id={{$post->id}}'">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
