@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1>Add Product</h1>
@stop

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter product name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Product Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label>Product Variations</label>
            <div id="variations">
                <div class="variation">
                    <input type="text" name="variations[0][type]" class="form-control" placeholder="Variation Type (e.g., Size)">
                    <input type="text" name="variations[0][value]" class="form-control" placeholder="Variation Value (e.g., Large)">
                    <input type="number" step="0.01" name="variations[0][price]" class="form-control" placeholder="Price">
                </div>
            </div>
            <button type="button" id="add-variation" class="btn btn-primary">Add Variation</button>
        </div>

        <button type="submit" class="btn btn-success">Add Product</button>
    </form>
@stop

@section('js')
    <script>
        let variationIndex = 1;
        document.getElementById('add-variation').addEventListener('click', function() {
            const variationHtml = `
                <div class="variation">
                    <input type="text" name="variations[${variationIndex}][type]" class="form-control" placeholder="Variation Type (e.g., Size)">
                    <input type="text" name="variations[${variationIndex}][value]" class="form-control" placeholder="Variation Value (e.g., Large)">
                    <input type="number" step="0.01" name="variations[${variationIndex}][price]" class="form-control" placeholder="Price">
                </div>`;
            document.getElementById('variations').insertAdjacentHTML('beforeend', variationHtml);
            variationIndex++;
        });
    </script>
@stop
