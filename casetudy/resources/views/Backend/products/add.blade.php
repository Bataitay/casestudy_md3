@extends('Backend.main')
@section('content')
            <div class="modal-content">
                <form action="{{ route('product.store') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4 bg-light">
                        <div class="my-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name product" required>
                        </div>
                        <div class="my-2">
                            <label for="price">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="price product" required>
                        </div>
                        <div class="my-2">
                            <label for="quantity">Category</label>

                            <select class="form-control" name="category_id" id="category">
                                @foreach ($categories as $category )
                                <option  value="{{  $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2">
                            <label for="quantity">Quantity</label>
                            <input type="text" name="quantity" class="form-control" placeholder="quantity" product" required>
                        </div>
                        <div class="my-2">
                              <label for=""> Cấu hình</label>
                            <select class="form-control" name="config_id" id="config">
                                @foreach ($configs as $config )
                                <option  value="{{  $config->id }}">{{ $config->chip }} - {{$config->memory}} - {{$config->pin}}  </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2">
                            <label for="color">color</label>
                            <input type="text" name="color" class="form-control" placeholder="color product" required>
                        </div>
                        <div class="my-2">
                            <label for="description">description</label>
                            <input type="text" name="description" class="form-control" placeholder="description product" required>
                        </div>
                        <div class="my-2">
                            <label for="image">Select picture</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                        <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Product</button>
                    </div>
                </form>
            </div>
@endsection

