@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end">
    <a href="{{route('categories.create')}}" class="btn btn-success mb-2">Add category</a>
</div>
<div class="card card-default">
    <div class="card-header">
        <h5>Categories</h5>
    </div>
    <div class="card-body">
        @if($categories->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Posts Count</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>
                        <!-- count posts in each category -->
                        <span class="badge badge-danger p-2">
                            {{$category->posts->count()}}
                        </span>

                    </td>
                    <td>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>

                        <a href="" id="delete_btn" data-id="{{ $category->id }}" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="handleDelete( {{ $category->id }} )">Delete</a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @else
        <h3 class="text-center">No Categories in Table</h3>
        @endif


        <!-- Modal -->
        <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="POST" id="deleteCategoryForm">
                    @csrf
                    <!-- directive makes sure its a delete request -->
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModal">Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">Are you sure you want to delete this category??</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                            <button type="submit" class="btn btn-danger">Yes,Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function handleDelete(id) {

        var form = document.getElementById('deleteCategoryForm');
        form.action = '/categories/' + id;


        $('#deleteModal').modal('show');
    }
</script>
@endsection