@extends('Master_page')

@section('title', 'Accueil - E-Commerce')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="hero-card p-5 rounded-3">
            <div class="row align-items-center">
                <div class="col-md-7 text-white">
                    <h1 class="hero-title">Accessoires de Sport<br>Élégants</h1>
                    <p class="hero-sub">Performance &amp; Style pour Hommes et Femmes – Conçus pour votre quotidien actif</p>

                    <div class="mt-4 d-flex gap-3">
                        <a href="{{ route('produits.index') }}" class="btn btn-primary btn-orange btn-lg me-2">Découvrir la collection</a>
                        <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">Notre histoire</a>
                    </div>
                </div>

                <div class="col-md-5 text-center">
                    <div class="hero-image-box mx-auto shadow-sm">
                        <img src="{{ asset('imgs/hero.jpg') }}" alt="Sport" class="img-fluid rounded-3" style="max-height:320px; object-fit:cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h2 class="mb-4">Pourquoi nous choisir ?</h2>
            <div class="row">
                <div class="col-md-4 text-center mb-3">
                    <div class="bg-white p-4 rounded">
                        <h5>Qualité Garantie</h5>
                        <p>Tous nos produits sont sélectionnés pour leur qualité et leur durabilité.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-3">
                    <div class="bg-white p-4 rounded">
                        <h5>Livraison Rapide</h5>
                        <p>Nous livrons vos commandes rapidement et en toute sécurité.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-3">
                    <div class="bg-white p-4 rounded">
                        <h5>Support Client</h5>
                        <p>Notre équipe est disponible pour répondre à toutes vos questions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection