@extends('/layout/foundationAdmin')
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
                        <a href="{{route('admin-category_form-create')}}" class="btn btn-success">+ Create Category</a>
                    </div>
                </div>

                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->id}}
                        </td>
                        <td>
                           {{$category->title}}
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <button type="submit" onClick="location.href='{{route('admin-category_form-edit')}}?id={{$category->id}}'" class="btn btn-warning">Edit</button>
                                <button type="button" onClick="location.href='{{route('admin-delete-category')}}?id={{$category->id}}'" class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
