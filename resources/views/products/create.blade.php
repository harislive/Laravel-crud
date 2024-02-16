<x-layouts.app title="Product Create">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Add New Product</h3>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter product name" value="{{ old('name') }}" />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description <sup class="text-danger">*</sup></label>
                    <textarea name="description" id="description" class="form-control @error('name') is-invalid @enderror" placeholder="Enter product description">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price <sup class="text-danger">*</sup></label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter product price" value="{{ old('price') }}">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image <sup class="text-danger">*</sup></label>
                    <input type="file" name="image" id="image" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter product image">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</x-layouts.app>
