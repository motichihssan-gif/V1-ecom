@extends('Master_page')

@section('title', 'Produits - EcomSport')

@section('content')
@php
    $isAdmin = Auth::user() && Auth::user()->role === \App\Models\User::ADMIN_ROLE;
@endphp

<style>
    .products-table {
        margin-top: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    .table-header, .table-row {
        display: grid;
<<<<<<< HEAD
        /* 6 colonnes bien définies */
        grid-template-columns: 100px 1.5fr 2fr 1fr 1fr 1.5fr; 
=======
        /* Toggle between 5 and 6 columns based on admin role */
        grid-template-columns: {{ $isAdmin ? '100px 1.5fr 2fr 1fr 1fr 1.5fr' : '100px 1.5fr 2fr 1fr 1fr' }}; 
>>>>>>> e0ac472 (push)
        gap: 20px;
        align-items: center;
        padding: 15px 20px;
    }

    .table-header {
        background: linear-gradient(135deg, #1a1f3a 0%, #2d3561 100%);
        color: white;
        font-weight: bold;
    }

    .table-row {
        background: white;
        border-bottom: 1px solid #eee;
    }

    .categorie-badge {
        background-color: #e2e8f0;
        color: #2d3561;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

</style>

<div class="products-table">
    <div class="table-header">
        <div>IMAGE</div>
        <div>NOM</div>
        <div>DESCRIPTION</div>
        <div>PRIX</div>
        <div>CATÉGORIE</div>
<<<<<<< HEAD
        <div>ACTIONS</div>
=======
        @if($isAdmin)
            <div>ACTIONS</div>
        @endif
>>>>>>> e0ac472 (push)
    </div>

    @foreach ($products as $item)
        <div class="table-row">
            <div>
                <img src="{{ $item->image }}" class="product-image" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
            </div>

            <div style="font-weight: 600;">{{ $item->titre }}</div>

            <div style="font-size: 12px; color: #666;">{{ Str::limit($item->contenu, 80) }}</div>

            <div class="price" style="font-weight: bold;">{{ $item->prix }} DH</div>
            <div>
                <span class="categorie-badge">{{ $item->categorie }}</span>
            </div>

<<<<<<< HEAD
            <div>
                <a href="{{ route('products.edit', $item->id) }}" class="btn btn-primary btn-sm">Éditer</a>
                <form action="{{ route('products.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                </form>
            </div>
=======
            @if($isAdmin)
                <div>
                    <a href="{{ route('produits.edit', $item->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                    <form action="{{ route('produits.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                    </form>
                </div>
            @endif
>>>>>>> e0ac472 (push)
        </div>
    @endforeach
</div>

<!-- Pagination -->
<div style="margin-top: 30px; display: flex; justify-content: center;">
    {{ $products->links('pagination::bootstrap-5') }}
</div>

@endsection