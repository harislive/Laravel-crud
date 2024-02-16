<x-layouts.app title="Product List">
    <div class="card">
        <div class="d-flex justify-content-between">
            <h3>Product Details</h3>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-primary">
                    <tbody>
                        <tr>
                            <th>Name</td>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>Description</td>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th>Price</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <th>Image</td>
                            <td><img src="{{ Storage::url($product->image) }}" height="150" width="150" alt="product image"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.app>
