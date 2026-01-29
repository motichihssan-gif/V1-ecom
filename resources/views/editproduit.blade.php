@extends('Master_page')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow border-0 rounded-3">
                    <div class="card-body p-5">
                        <h3 class="card-title text-center mb-4 fw-bold">Edit Product</h3>
<<<<<<< HEAD
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">Product Name</label>
=======
                        <form action="{{ route('produits.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold">nom du produit</label>
>>>>>>> e0ac472 (push)
                                <input type="text" name="titre" id="name" class="form-control @error('titre') is-invalid @enderror" value="{{ old('titre', $product->titre) }}">
                                @error('titre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label fw-semibold">Description</label>
                                <textarea name="contenu" id="description" rows="4" class="form-control @error('contenu') is-invalid @enderror">{{ old('contenu', $product->contenu) }}</textarea>
                                @error('contenu')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
<<<<<<< HEAD
                                <label for="price" class="form-label fw-semibold">Price</label>
=======
                                <label for="price" class="form-label fw-semibold">Prix</label>
>>>>>>> e0ac472 (push)
                                <input type="number" step="0.01" name="prix" id="price" class="form-control @error('prix') is-invalid @enderror" value="{{ old('prix', $product->prix) }}">
                                @error('prix')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
<<<<<<< HEAD
                                <label for="image" class="form-label fw-semibold">Product Image</label>
=======
                                <label for="image" class="form-label fw-semibold">Image</label>
>>>>>>> e0ac472 (push)
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
<<<<<<< HEAD
                                <label for="category" class="form-label fw-semibold">Category</label>
                                <select name="categorie" id="category" class="form-select @error('categorie') is-invalid @enderror">
                                    <option value="" disabled>Select a category</option>
=======
                                <label for="category" class="form-label fw-semibold">Categorie</label>
                                <select name="categorie" id="category" class="form-select @error('categorie') is-invalid @enderror">
                                    <option value="" disabled>choisir une categorie</option>
>>>>>>> e0ac472 (push)
                                    <option value="sac de sport" {{ (old('categorie', $product->categorie) == 'sac de sport') ? 'selected' : '' }}>Sac de Sport</option>
                                    <option value="fitness" {{ (old('categorie', $product->categorie) == 'fitness') ? 'selected' : '' }}>fitness</option>
                                    <option value="running" {{ (old('categorie', $product->categorie) == 'running') ? 'selected' : '' }}>running</option>
                                </select>
                                @error('categorie')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger btn-lg fw-semibold">Update Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection