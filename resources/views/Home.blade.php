@extends('Master_page')

@section('title', 'Accueil - E-Commerce')

@section('content')
<style>
    /* Hero Section Styles */
    .hero-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 20px 60px rgba(102, 126, 234, 0.3);
        border: none;
        position: relative;
        overflow: hidden;
    }
    
    .hero-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: pulse 4s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.1); opacity: 0.8; }
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        text-shadow: 2px 4px 8px rgba(0,0,0,0.2);
        letter-spacing: -1px;
        line-height: 1.2;
    }
    
    .hero-sub {
        font-size: 1.2rem;
        opacity: 0.95;
        margin-top: 1.5rem;
        line-height: 1.6;
    }
    
    .btn-orange {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
        border: none;
        padding: 15px 35px;
        font-weight: 600;
        letter-spacing: 0.5px;
        box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
        transition: all 0.3s ease;
    }
    
    .btn-orange:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(255, 107, 107, 0.4);
        background: linear-gradient(135deg, #ee5a6f 0%, #ff6b6b 100%);
    }
    
    .btn-outline-light {
        border: 2px solid rgba(255, 255, 255, 0.8);
        padding: 15px 35px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    
    .btn-outline-light:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: white;
        transform: translateY(-3px);
    }
    
    .hero-image-box {
        position: relative;
        z-index: 10;
        transition: transform 0.4s ease;
    }
    
    .hero-image-box:hover {
        transform: scale(1.05) rotate(2deg);
    }
    
    .hero-image-box img {
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    }
    
    /* Features Section */
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 3rem;
        text-align: center;
        position: relative;
        padding-bottom: 20px;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 2px;
    }
    
    .feature-card {
        background: white;
        padding: 2.5rem 2rem;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        height: 100%;
        border: 2px solid transparent;
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(102, 126, 234, 0.2);
        border-color: rgba(102, 126, 234, 0.3);
    }
    
    .feature-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .feature-icon {
        transform: rotateY(360deg);
    }
    
    .icon-quality {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    .icon-delivery {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }
    
    .icon-support {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        color: white;
    }
    
    .feature-card h5 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1rem;
    }
    
    .feature-card p {
        color: #718096;
        font-size: 1rem;
        line-height: 1.6;
        margin: 0;
    }
</style>

<div class="py-5">
    <div class="container">
        <div class="hero-card p-5 rounded-3">
            <div class="row align-items-center">
                <div class="col-md-7 text-white">
                    <h1 class="hero-title">Accessoires de Sport<br>Élégants</h1>
                    <p class="hero-sub">Performance & Style pour Hommes et Femmes – Conçus pour votre quotidien actif</p>

                    <div class="mt-4 d-flex gap-3">
                        <a href="{{ route('produits.index') }}" class="btn btn-primary btn-orange btn-lg me-2">Découvrir la collection</a>
                        <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">Notre histoire</a>
                    </div>
                </div>

                <div class="col-md-5 text-center">
                    <div class="hero-image-box mx-auto shadow-sm">
                        <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=800&q=80" alt="Sport" class="img-fluid rounded-3" style="max-height:320px; object-fit:cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5 pt-4">
        <h2 class="section-title">Pourquoi nous choisir ?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="feature-icon icon-quality">
                        <i class="fas fa-award"></i>
                    </div>
                    <h5>Qualité Garantie</h5>
                    <p>Tous nos produits sont sélectionnés pour leur qualité et leur durabilité exceptionnelle.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="feature-icon icon-delivery">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h5>Livraison Rapide</h5>
                    <p>Nous livrons vos commandes rapidement et en toute sécurité partout au Maroc.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center">
                    <div class="feature-icon icon-support">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5>Support Client</h5>
                    <p>Notre équipe est disponible 24/7 pour répondre à toutes vos questions.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection