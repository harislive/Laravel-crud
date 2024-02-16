<x-layouts.app title="Product List">
    <div class="card ">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Product List</h3>
                <a href="{{ route('products.create') }}" class="btn btn-secondary">Create</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                {{--  formula => 11 + 10 x (1 = 1) = 11 --}}
                                <td scope="row">{{ $loop->iteration + 10 * ($products->currentPage() - 1) }}</td>
                                <td scope="row">{{ $product->name }}</td>
                                <td scope="row">{{ str()->limit($product->description,20) }}</td>
                                <td scope="row">{{ $product->price }}</td>
                                <td scope="row"><img src="{{ Storage::url($product->image) }}" height="100" width="100" alt="product image"></td>
                                <td>
                                    <div class="d-flex gap-3">
                                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-info">Edit</a>
                                        <form id="form-{{ $product->id }}" action="{{ route('products.destroy',$product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete('{{ $product->id }}')" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-center">
                                <td class="text-danger" colspan="5">No product found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-alerts.delete-alert />
</x-layouts.app>
