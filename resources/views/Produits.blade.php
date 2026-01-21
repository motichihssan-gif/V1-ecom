@extends('Master_page')

@section('title', 'Produits - EcomSport')

@section('content')
<style>
    .products-table {
        margin-top: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    .table-header, .table-row {
        display: grid;
        /* 5 colonnes bien définies */
        grid-template-columns: 100px 1.5fr 3fr 1fr 1.2fr; 
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
    </div>

    @foreach ($products as $item)
        <div class="table-row">
            <div>
                <img src="{{ asset('imgs/' . $item->image) }}" class="product-image" style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
            </div>

            <div style="font-weight: 600;">{{ $item->titre }}</div>

            <div style="font-size: 12px; color: #666;">{{ Str::limit($item->contenu, 80) }}</div>

            <div class="price" style="font-weight: bold;">{{ $item->prix }} DH</div>

            <div>
                <span class="categorie-badge">{{ $item->categorie }}</span>
            </div>
        </div>
    @endforeach
</div>

<div style="margin-top: 20px;">
    
</div>
@endsection