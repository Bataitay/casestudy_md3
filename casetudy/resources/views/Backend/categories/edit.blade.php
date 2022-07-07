@extends('Backend.main')
@section('content')
            <div class="modal-content">
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-4 bg-light">
                        <div class="my-2">
                            <label for="pwd">Category</label>
                            <input value="" type="text" class="form-control" id="Category"
                                placeholder="Enter Category" name="name">
                        </div>
                        <div class="my-2">
                            <label for="image">Select picture</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                        <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Employee</button>
                    </div>
                </form>
            </div>
@endsection
