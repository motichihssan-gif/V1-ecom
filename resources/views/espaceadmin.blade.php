@extends('Master_page')

@section('title', 'Espace Admin - Gestion des Produits')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">
        <i class="fas fa-cog"></i> Espace Admin - Gestion des Produits
    </h1>

    <!-- Message d'accueil -->
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Bienvenue {{ auth()->user()->name }} !</h4>
        <p>Vous êtes administrateur. Vous pouvez gérer tous les produits du site.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <!-- Bouton d'ajout rapide -->
    <div class="mb-4">
        <a href="{{ route('produits.create') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-plus"></i> Ajouter un nouveau produit
        </a>
    </div>

    <!-- Tableau des produits -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0"><i class="fas fa-list"></i> Liste des produits ({{ $produits->total() }})</h5>
        </div>
        <div class="card-body">
            @if($produits->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Prix</th>
                                <th>Solde (%)</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produits as $produit)
                                <tr>
                                    <td>
                                        <strong>{{ $produit->titre }}</strong>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $produit->categorie }}</span>
                                    </td>
                                    <td>
                                        {{ number_format($produit->prix, 2, ',', ' ') }} €
                                    </td>
                                    <td>
                                        @if($produit->solde > 0)
                                            <span class="badge bg-danger">{{ $produit->solde }}%</span>
                                        @else
                                            <span class="badge bg-secondary">Pas de solde</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ $produit->image }}" alt="{{ $produit->titre }}" 
                                             style="height: 50px; width: 50px; object-fit: cover; border-radius: 4px;">
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('produits.edit', $produit->id) }}" 
                                               class="btn btn-warning" title="Éditer">
                                                <i class="fas fa-edit"></i> Éditer
                                            </a>
                                            <form action="{{ route('produits.destroy', $produit->id) }}" 
                                                  method="POST" 
                                                  style="display:inline;"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Supprimer">
                                                    <i class="fas fa-trash"></i> Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $produits->links() }}
                </div>
            @else
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i>
                    <strong>Aucun produit trouvé.</strong>
                    <a href="{{ route('produits.create') }}" class="alert-link">Ajouter le premier produit</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card text-center bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-box"></i> Total produits</h5>
                    <h2>{{ $produits->total() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-tag"></i> Produits en solde</h5>
                    <h2>{{ $produits->getCollection()->where('solde', '>', 0)->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-list"></i> Catégories</h5>
                    <h2>{{ $produits->getCollection()->pluck('categorie')->unique()->count() }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-center bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user"></i> Rôle</h5>
                    <h2>{{ auth()->user()->role }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    h1 {
        color: #0F172A;
        border-bottom: 3px solid #F97316;
        padding-bottom: 1rem;
    }

    .table {
        margin-bottom: 0;
    }

    .btn-group-sm .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .card {
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .badge {
        font-size: 0.85rem;
        padding: 0.5rem 0.7rem;
    }
</style>
@endsection
