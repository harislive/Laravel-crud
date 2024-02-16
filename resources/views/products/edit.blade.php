<x-layouts.app title="Product Edit">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h3>Edit Product</h3>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter product name" value="{{ old('name',$product->name) }}" />
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description <sup class="text-danger">*</sup></label>
                    <textarea name="description" id="description" class="form-control @error('name') is-invalid @enderror" placeholder="Enter product description">{{ old('description',$product->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price <sup class="text-danger">*</sup></label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter product price" value="{{ old('price',$product->price) }}">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image <sup class="text-danger">*</sup></label>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="file" name="image" id="image" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter product image">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
                                View
                            </button>
                            @include('products.image')
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>
</x-layouts.app>
