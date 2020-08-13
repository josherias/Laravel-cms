@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end">
    <a href="{{route('tags.create')}}" class="btn btn-success mb-2">Add tag</a>
</div>
<div class="card card-default">
    <div class="card-header">
        <h5>tags</h5>
    </div>
    <div class="card-body">
        @if($tags->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Posts Count</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->name}}</td>
                    <td>
                        <!-- count posts in each tag -->
                        <span class="badge badge-danger p-2">
                            {{ $tag->posts->count() }}
                        </span>

                    </td>
                    <td>
                        <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-info btn-sm">Edit</a>

                        <a href="" id="delete_btn" data-id="{{ $tag->id }}" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btn-sm" onclick="handleDelete( {{ $tag->id }} )">Delete</a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @else
        <h3 class="text-center">No tags in Table</h3>
        @endif


        <!-- Modal -->
        <div class="modal fade" id="deleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <form action="" method="POST" id="deletetagForm">
                    @csrf
                    <!-- directive makes sure its a delete request -->
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModal">Delete tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">Are you sure you want to delete this tag??</p>
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

        var form = document.getElementById('deletetagForm');
        form.action = '/tags/' + id;


        $('#deleteModal').modal('show');
    }
</script>
@endsection