@extends('Master_page')

@section('title', 'Contact - EcomSport')

@section('content')
<style>
    /* ===== CONTACT HERO ===== */
    .contact-hero {
        background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.9)), 
                    url('https://images.unsplash.com/photo-1518611012118-696072aa579a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
        background-size: cover;
        background-position: center;
        padding: 80px 40px;
        text-align: center;
        color: white;
        border-radius: 0 0 20px 20px;
        margin-bottom: 60px;
    }
    
    .contact-hero h1 {
        font-size: 42px;
        margin-bottom: 15px;
    }
    
    .contact-hero p {
        font-size: 18px;
        opacity: 0.9;
        max-width: 600px;
        margin: 0 auto;
    }
    
    /* ===== CONTACT LAYOUT ===== */
    .contact-container {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 60px;
        margin: 60px 0;
    }
    
    /* ===== CONTACT INFO ===== */
    .contact-info {
        background: white;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    }
    
    .contact-info h2 {
        font-size: 28px;
        color: #0F172A;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #E2E8F0;
    }
    
    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 35px;
        padding-bottom: 35px;
        border-bottom: 1px solid #F1F5F9;
    }
    
    .contact-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .contact-icon {
        width: 50px;
        height: 50px;
        background: #2563EB;
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        font-size: 20px;
        flex-shrink: 0;
    }
    
    .contact-details h3 {
        font-size: 18px;
        color: #0F172A;
        margin-bottom: 8px;
    }
    
    .contact-details p {
        color: #64748B;
        margin-bottom: 5px;
    }
    
    /* ===== SOCIAL LINKS ===== */
    .social-links {
        margin-top: 40px;
    }
    
    .social-links h3 {
        font-size: 18px;
        color: #0F172A;
        margin-bottom: 20px;
    }
    
    .social-icons {
        display: flex;
        gap: 15px;
    }
    
    .social-icon {
        width: 45px;
        height: 45px;
        background: #F1F5F9;
        color: #64748B;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 18px;
        transition: all 0.3s;
    }
    
    .social-icon:hover {
        background: #2563EB;
        color: white;
        transform: translateY(-5px);
    }
    
    /* ===== CONTACT FORM ===== */
    .contact-form {
        background: white;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.08);
    }
    
    .contact-form h2 {
        font-size: 28px;
        color: #0F172A;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #E2E8F0;
    }
    
    .form-group {
        margin-bottom: 25px;
    }
    
    .form-group label {
        display: block;
        margin-bottom: 10px;
        font-weight: 500;
        color: #0F172A;
    }
    
    .form-group label span {
        color: #DC2626;
    }
    
    .form-control {
        width: 100%;
        padding: 14px 18px;
        border: 2px solid #E2E8F0;
        border-radius: 10px;
        font-family: inherit;
        font-size: 16px;
        transition: border-color 0.3s;
        background: #F8FAFC;
    }
    
    .form-control:focus {
        outline: none;
        border-color: #2563EB;
        background: white;
    }
    
    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }
    
    .submit-btn {
        background: #2563EB;
        color: white;
        border: none;
        padding: 16px 40px;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s;
    }
    
    .submit-btn:hover {
        background: #1D4ED8;
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }
    
    /* ===== FAQ SECTION ===== */
    .faq-section {
        background: #F8FAFC;
        padding: 60px 40px;
        border-radius: 20px;
        margin: 80px 0;
    }
    
    .faq-section h2 {
        font-size: 32px;
        text-align: center;
        color: #0F172A;
        margin-bottom: 40px;
    }
    
    .faq-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }
    
    .faq-item {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .faq-item h3 {
        font-size: 18px;
        color: #0F172A;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .faq-item h3 i {
        color: #2563EB;
    }
    
    /* ===== MAP SECTION ===== */
    .map-section {
        margin: 60px 0;
    }
    
    .map-container {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        height: 400px;
    }
    
    .map-placeholder {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .contact-container {
            grid-template-columns: 1fr;
            gap: 40px;
        }
        
        .contact-hero {
            padding: 60px 20px;
        }
        
        .contact-hero h1 {
            font-size: 36px;
        }
    }
    
    @media (max-width: 768px) {
        .contact-info,
        .contact-form {
            padding: 30px 20px;
        }
        
        .faq-section {
            padding: 40px 20px;
        }
        
        .faq-grid {
            grid-template-columns: 1fr;
        }
        
        .social-icons {
            justify-content: center;
        }
        
        .contact-item {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .contact-icon {
            margin-right: 0;
            margin-bottom: 15px;
        }
    }
</style>

<section class="contact-hero">
    <h1>Contactez-nous</h1>
    <p>Une question ? Une suggestion ? Notre équipe est à votre écoute</p>
</section>

<div class="contact-container">
    <div class="contact-info">
        <h2>Nos Coordonnées</h2>
        
        <div class="contact-item">
            <div class="contact-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="contact-details">
                <h3>Email</h3>
                <p>motichihssan@gmail.com</p>
                <p style="color: #94A3B8; font-size: 14px;">Réponse sous 24h</p>
            </div>
        </div>
        
        <div class="contact-item">
            <div class="contact-icon">
                <i class="fas fa-phone"></i>
            </div>
            <div class="contact-details">
                <h3>Téléphone</h3>
                <p>+212 623989094</p>
                <p style="color: #94A3B8; font-size: 14px;">Lun-Ven: 9h-18h</p>
            </div>
        </div>
        
        <div class="contact-item">
            <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <div class="contact-details">
                <h3>Adresse</h3>
                <p>123 Avenue Mabrouk</p>
                <p>9000 Tanger, Maroc</p>
                <p style="color: #94A3B8; font-size: 14px;">Sur rendez-vous</p>
            </div>
        </div>
        
        <div class="social-links">
            <h3>Suivez-nous</h3>
            <div class="social-icons">
                <a href="#" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="contact-form">
        <h2>Envoyez-nous un message</h2>
        
        @if(session()->has('success'))
            <script>alert('✅ ' + '{{ session('success') }}');</script>
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb; font-weight: bold;">
                ✅ {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <strong>❌ Erreurs:</strong>
                <ul style="margin: 5px 0 0 20px; padding-left: 0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom complet <span>*</span></label>
                <input type="text" id="name" name="name" class="form-control" required placeholder="Votre nom et prénom">
            </div>
            
            <div class="form-group">
                <label for="email">Adresse email <span>*</span></label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="exemple@email.com">
            </div>
            
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="tel" id="phone" name="phone" class="form-control" placeholder="+212 600 000 000">
            </div>
            
            <div class="form-group">
                <label for="subject">Sujet <span>*</span></label>
                <select id="subject" name="subject" class="form-control" required>
                    <option value="">Sélectionnez un sujet</option>
                    <option value="commande">Suivi de commande</option>
                    <option value="produit">Question sur un produit</option>
                    <option value="retour">Retour & Remboursement</option>
                    <option value="partenariat">Demande de partenariat</option>
                    <option value="autre">Autre demande</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="message">Message <span>*</span></label>
                <textarea id="message" name="message" class="form-control" required placeholder="Décrivez-nous votre demande..."></textarea>
            </div>
            
            <button type="submit" class="submit-btn">Envoyer votre message</button>
        </form>
    </div>
</div>


@endsection