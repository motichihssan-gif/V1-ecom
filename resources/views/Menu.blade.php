<style>
    /* ===== HEADER ===== */
        .navbar {
            background: #0F172A;
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        
        .logo-icon {
            color: #F97316;
            margin-right: 10px;
            font-size: 24px;
        }
        
        .logo span:last-child {
            color: #DC2626;
        }
        
        .tagline {
            font-size: 12px;
            opacity: 0.8;
            font-style: italic;
        }
        
        .navbar nav {
            display: flex;
            gap: 25px;
            align-items: center;
        }
        
        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 15px;
            border-radius: 6px;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            background: rgba(255,255,255,0.1);
        }
        
        .nav-link.cart {
            background: #DC2626;
        }
        
        .nav-link.cart:hover {
            background: #B91C1C;
        }
</style>
<header class="navbar">
    <div class="logo-container">
        <div class="logo">
            <i class="fas fa-dumbbell logo-icon"></i>
            <span>Ecom</span><span>Sport</span>
        </div>
        <p class="tagline">Performance & Élégance</p>
    </div>
    <nav>
        <a href="/" class="nav-link"><i class="fas fa-home"></i> Accueil</a>
        <a href="/products" class="nav-link"><i class="fas fa-store"></i> Produits</a>
        <a href="/about" class="nav-link"><i class="fas fa-info-circle"></i> À propos</a>
        <a href="/contact" class="nav-link"><i class="fas fa-envelope"></i> Contact</a>
        <a href="{{ route('products.create') }}" class="nav-link"><i class="fas fa-plus-circle"></i> Ajouter</a>
    </nav>
</header>