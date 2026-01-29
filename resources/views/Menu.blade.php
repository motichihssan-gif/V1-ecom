<style>
    /* ===== MODERN ONE-LINE NAV BAR ===== */
    .navbar {
        background: #0F172A;
        color: white;
        padding: 0.6rem 2%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        position: sticky;
        top: 0;
        z-index: 1000;
        gap: 1rem;
    }

    .logo-container {
        display: flex;
        align-items: center;
        gap: 1rem;
        flex-shrink: 0;
    }

    .logo {
        font-family: 'Outfit', 'Inter', sans-serif;
        font-size: 1.4rem;
        font-weight: 800;
        letter-spacing: -0.5px;
        display: flex;
        align-items: center;
        text-decoration: none;
        color: white;
    }

    .logo-icon {
        color: #F97316;
        margin-right: 0.4rem;
        font-size: 1.2rem;
    }

    .logo span:last-child {
        color: #DC2626;
    }

    .tagline {
        font-size: 0.75rem;
        color: #94A3B8;
        font-style: italic;
        font-weight: 300;
        margin-bottom: 0;
        border-left: 1px solid rgba(255,255,255,0.1);
        padding-left: 1rem;
        white-space: nowrap;
    }

    .navbar nav {
        display: flex;
        gap: 0.25rem;
        align-items: center;
        flex-wrap: nowrap;
    }

    .nav-link {
        color: #E2E8F0;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.85rem;
        padding: 0.5rem 0.7rem;
        border-radius: 6px;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        transition: all 0.2s;
        white-space: nowrap;
    }

    .nav-link i {
        font-size: 0.9rem;
        opacity: 0.7;
    }

    .nav-link:hover {
        color: white;
        background: rgba(249, 115, 22, 0.1);
    }

    .nav-link:hover i {
        color: #F97316;
    }

    /* Mobile Adaptations - Keeping One Line */
    @media (max-width: 1100px) {
        .tagline { display: none; }
        .logo { font-size: 1.2rem; }
    }

    @media (max-width: 768px) {
        .navbar {
            padding: 0.5rem 1%;
            gap: 0.5rem;
        }
        .nav-link {
            padding: 0.4rem 0.5rem;
            font-size: 0.75rem;
        }
        .nav-link span {
            display: none; /* Only show icons on very small screens to keep one line */
        }
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
        <a href="/" class="nav-link"><i class="fas fa-home"></i> <span>Accueil</span></a>
        <a href="{{ route('produits.index') }}" class="nav-link"><i class="fas fa-store"></i> <span>Produits</span></a>
        <a href="{{ route('about') }}" class="nav-link"><i class="fas fa-info-circle"></i> <span>À propos</span></a>
        <a href="{{ route('contact') }}" class="nav-link"><i class="fas fa-envelope"></i> <span>Contact</span></a>

        @guest
            <a href="{{ route('login') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i> <span>Se connecter</span></a>
            <a href="{{ route('register') }}" class="nav-link"><i class="fas fa-user-plus"></i> <span>S'inscrire</span></a>
        @endguest

        @auth
            @if(Auth::user()->role === \App\Models\User::USER_ROLE)
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-user"></i> <span>Espace Client</span></a>
            @endif

            @if(Auth::user()->role === \App\Models\User::ADMIN_ROLE)
                <a href="{{ route('produits.create') }}" class="nav-link"><i class="fas fa-plus-circle"></i> <span>Ajouter un produit</span></a>
                <a href="{{ route('produits.index') }}" class="nav-link"><i class="fas fa-edit"></i> <span>Mise à jour des produits</span></a>
            @endif

            <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                @csrf
            </form>
            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span>
            </a>
        @endauth
    </nav>
</header>