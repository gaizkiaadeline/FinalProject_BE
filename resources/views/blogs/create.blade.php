<!-- Modal -->
<div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBlogModalLabel"><i class="uil uil-plus"></i> Add Blog</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('storeBlog') }}" method="POST">
                    {{-- {{ url('/categories') }} --}}
                    @csrf
                    <div class="form-group">
                        <label>Product Photo</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                            placeholder="Input product name." name="photo" value="{{ old('photo') }}">
                        @error('photo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            placeholder="Input product name." name="title" value="{{ old('title') }}">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror"
                            placeholder="Input product price." name="price" value="{{ old('price') }}">
                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Product Stock</label>
                        <input type="text" class="form-control @error('stock') is-invalid @enderror"
                            placeholder="Input product stock." name="stock" value="{{ old('stock') }}">
                        @error('stock')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Category Product</label>
                        <select class="form-control @error('category') is-invalid @enderror">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}
                                </option>
                            @endforeach
                        </select>

                        @error('price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
