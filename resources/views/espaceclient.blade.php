@extends('Master_page')

@section('title', 'Espace Client - Produits en Solde')

@section('content')
<div class="container mt-5">
    @auth
    <h1 class="mb-4">
        <i class="fas fa-user"></i> Espace Client - Bienvenue {{ auth()->user()->name }}
    </h1>

    <!-- Message de bienvenue -->
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Découvrez nos produits en solde!</h4>
        <p>Vous accédez à une sélection exclusive de produits à prix réduit réservée à nos clients.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <!-- Section produits en solde -->
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">
                <i class="fas fa-tag"></i> Produits en solde
            </h2>

            @if($produits_en_solde && $produits_en_solde->count() > 0)
                <div class="row">
                    @foreach($produits_en_solde as $produit)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100">
                                <!-- Image du produit -->
                                <div class="position-relative">
                                    <img src="{{ $produit->image }}" class="card-img-top" alt="{{ $produit->titre }}" style="height: 250px; object-fit: cover;">
                                    
                                    <!-- Badge solde -->
                                    @if($produit->solde > 0)
                                        <span class="badge bg-danger position-absolute top-0 end-0 m-2">
                                            -{{ $produit->solde }}%
                                        </span>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <!-- Titre -->
                                    <h5 class="card-title">{{ $produit->titre }}</h5>

                                    <!-- Description -->
                                    <p class="card-text text-muted small">
                                        {{ Str::limit($produit->contenu, 100) }}
                                    </p>

                                    <!-- Catégorie -->
                                    <p class="card-text">
                                        <span class="badge bg-light text-dark">{{ $produit->categorie }}</span>
                                    </p>

                                    <!-- Prix -->
                                    <div class="mb-3">
                                        @if($produit->solde > 0)
                                            <div class="text-danger">
                                                <strong>Prix: {{ number_format($produit->prix, 2, ',', ' ') }} €</strong>
                                            </div>
                                            <div class="text-success small">
                                                <i class="fas fa-arrow-down"></i>
                                                <strong>
                                                    Économies: {{ number_format($produit->prix * ($produit->solde / 100), 2, ',', ' ') }} €
                                                </strong>
                                            </div>
                                        @else
                                            <div>Prix: {{ number_format($produit->prix, 2, ',', ' ') }} €</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-footer bg-light">
                                    <a href="/produits" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="fas fa-shopping-cart"></i> Voir détails
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $produits_en_solde->links() }}
                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    <i class="fas fa-info-circle"></i>
                    <strong>Aucun produit en solde pour le moment.</strong>
                    <p class="mt-2 mb-0">Revenez bientôt pour découvrir nos nouvelles réductions!</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Informations utilisateur -->
    <hr class="my-5">
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="fas fa-user-circle"></i> Mon profil</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nom:</strong> {{ auth()->user()->name }}</p>
                    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    <p><strong>Type de compte:</strong> 
                        <span class="badge bg-info">{{ auth()->user()->role }}</span>
                    </p>
                    <p><strong>Membre depuis:</strong> {{ auth()->user()->created_at->format('d/m/Y') }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Modifier le profil
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="fas fa-shopping-bag"></i> Statistiques</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nombre de produits en solde:</strong> {{ $produits_en_solde->total() }}</p>
                    <p><strong>Période d'accès:</strong> À partir de votre inscription</p>
                    <p><strong>Avantages:</strong></p>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success"></i> Accès exclusif aux produits en solde</li>
                        <li><i class="fas fa-check text-success"></i> Prix réduits pour les membres</li>
                        <li><i class="fas fa-check text-success"></i> Notifications spéciales</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
    }

    .badge {
        font-size: 0.85rem;
        padding: 0.5rem 0.7rem;
    }

    .card-title {
        font-weight: 600;
        color: #333;
    }

    h1 {
        color: #0F172A;
        border-bottom: 3px solid #F97316;
        padding-bottom: 1rem;
    }

    h2 {
        color: #333;
        margin-bottom: 2rem;
    }
</style>
    @else
    <div class="alert alert-warning">
        <h4>Accès refusé</h4>
        <p>Vous devez être connecté pour accéder à cette page.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
    </div>
    @endauth
@endsection
