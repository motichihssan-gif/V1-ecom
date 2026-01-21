@extends('Master_page')

@section('title', 'À propos - EcomSport')

@section('content')
<style>
    /* ===== ABOUT HERO ===== */
    .about-hero {
        background: linear-gradient(rgba(15, 23, 42, 0.9), rgba(30, 41, 59, 0.9)), 
                    url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80');
        background-size: cover;
        background-position: center;
        padding: 100px 40px;
        text-align: center;
        color: white;
        border-radius: 0 0 20px 20px;
        margin-bottom: 60px;
    }
    
    .about-hero h1 {
        font-size: 48px;
        margin-bottom: 20px;
    }
    
    .about-hero p {
        font-size: 20px;
        opacity: 0.9;
        max-width: 700px;
        margin: 0 auto;
    }
    
    /* ===== SECTION STYLES ===== */
    .about-section {
        margin: 80px 0;
    }
    
    .section-title {
        font-size: 36px;
        color: #0F172A;
        margin-bottom: 20px;
        text-align: center;
        position: relative;
    }
    
    .section-title::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background: #2563EB;
        margin: 15px auto 30px;
        border-radius: 2px;
    }
    
    .section-subtitle {
        text-align: center;
        color: #64748B;
        font-size: 18px;
        max-width: 700px;
        margin: 0 auto 50px;
        line-height: 1.6;
    }
    
    /* ===== VISION SECTION ===== */
    .vision-content {
        display: flex;
        align-items: center;
        gap: 60px;
        background: white;
        padding: 50px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    
    .vision-text {
        flex: 2;
    }
    
    .vision-image {
        flex: 1;
    }
    
    .vision-image img {
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .vision-statement {
        font-size: 20px;
        font-weight: 500;
        color: #0F172A;
        line-height: 1.6;
        margin-bottom: 30px;
        padding-left: 20px;
        border-left: 4px solid #2563EB;
    }
    
    .vision-points {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 40px;
    }
    
    .vision-point {
        background: #F8FAFC;
        padding: 25px;
        border-radius: 10px;
        border: 1px solid #E2E8F0;
    }
    
    .vision-point h4 {
        color: #0F172A;
        margin-bottom: 10px;
        font-size: 18px;
    }
    
    /* ===== VALUES SECTION ===== */
    .values-section {
        background: linear-gradient(135deg, #F8FAFC 0%, #E2E8F0 100%);
        padding: 80px 40px;
        border-radius: 20px;
    }
    
    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }
    
    .value-card {
        background: white;
        padding: 40px 30px;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        transition: transform 0.3s;
    }
    
    .value-card:hover {
        transform: translateY(-10px);
    }
    
    .value-icon {
        width: 70px;
        height: 70px;
        background: #2563EB;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 28px;
    }
    
    .value-card h3 {
        font-size: 22px;
        margin-bottom: 15px;
        color: #0F172A;
    }
    
    .value-card p {
        color: #64748B;
        line-height: 1.6;
    }
    
    /* ===== HISTORY SECTION ===== */
    .history-timeline {
        position: relative;
        max-width: 800px;
        margin: 60px auto 0;
        padding-left: 50px;
    }
    
    .history-timeline::before {
        content: '';
        position: absolute;
        left: 25px;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(to bottom, #2563EB, #8B5CF6);
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 50px;
    }
    
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -35px;
        top: 5px;
        width: 20px;
        height: 20px;
        background: #2563EB;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 0 0 3px #2563EB;
    }
    
    .timeline-date {
        font-weight: 700;
        color: #2563EB;
        font-size: 18px;
        margin-bottom: 10px;
    }
    
    .timeline-content {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    
    .timeline-content h3 {
        color: #0F172A;
        margin-bottom: 10px;
        font-size: 20px;
    }
    
    /* ===== TEAM SECTION ===== */
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 40px;
        margin-top: 50px;
    }
    
    .team-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    
    .team-image {
        height: 250px;
        overflow: hidden;
    }
    
    .team-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s;
    }
    
    .team-card:hover .team-image img {
        transform: scale(1.05);
    }
    
    .team-info {
        padding: 30px;
    }
    
    .team-info h3 {
        font-size: 22px;
        margin-bottom: 5px;
        color: #0F172A;
    }
    
    .team-role {
        color: #2563EB;
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 14px;
    }
    
    .team-sport {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #EFF6FF;
        color: #2563EB;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 14px;
        margin-top: 10px;
    }
    
    /* ===== CTA SECTION ===== */
    .about-cta {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        color: white;
        padding: 80px 40px;
        text-align: center;
        border-radius: 20px;
        margin: 80px 0;
    }
    
    .about-cta h2 {
        font-size: 36px;
        margin-bottom: 20px;
    }
    
    .about-cta p {
        font-size: 18px;
        opacity: 0.9;
        margin-bottom: 40px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .cta-button {
        display: inline-block;
        background: #2563EB;
        color: white;
        padding: 16px 40px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s;
        border: 2px solid #2563EB;
    }
    
    .cta-button:hover {
        background: transparent;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .vision-content {
            flex-direction: column;
        }
        
        .vision-points {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    
    @media (max-width: 768px) {
        .about-hero {
            padding: 60px 20px;
        }
        
        .about-hero h1 {
            font-size: 36px;
        }
        
        .section-title {
            font-size: 28px;
        }
        
        .vision-points {
            grid-template-columns: 1fr;
        }
        
        .values-grid {
            grid-template-columns: 1fr;
        }
        
        .history-timeline {
            padding-left: 40px;
        }
        
        .team-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="about-hero">
    <h1>Notre Histoire, Notre Passion</h1>
    <p>Plus qu'une boutique, une vision du sport moderne et élégant</p>
</section>

<section class="about-section">
    <h2 class="section-title">Notre Vision</h2>
    <p class="section-subtitle">Révolutionner l'expérience sportive en alliant performance technique et design élégant</p>
    
    <div class="vision-content">
        <div class="vision-text">
            <p class="vision-statement">
                Notre vision est de créer une communauté de sportifs qui ne compromettent jamais sur la qualité, le design ou l'innovation. Nous croyons que l'excellence sportive doit être accessible à tous, sans sacrifier l'esthétique ou le confort.
            </p>
            
            <div class="vision-points">
                <div class="vision-point">
                    <h4>Ambition Régionale</h4>
                    <p>Devenir le leader nord-africain des accessoires sportifs premium d'ici 2028.</p>
                </div>
                <div class="vision-point">
                    <h4>Impact Durable</h4>
                    <p>Promouvoir un mode de vie sain tout en réduisant notre empreinte écologique.</p>
                </div>
                <div class="vision-point">
                    <h4>Innovation Continue</h4>
                    <p>Pionniers dans l'intégration de technologies innovantes au service du sport.</p>
                </div>
            </div>
        </div>
        <div class="vision-image">
            <img src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Vision EcomSport">
        </div>
    </div>
</section>

<section class="values-section about-section">
    <h2 class="section-title">Nos Valeurs</h2>
    <p class="section-subtitle">Les principes qui guident chacune de nos décisions</p>
    
    <div class="values-grid">
        <div class="value-card">
            <div class="value-icon">
                <i class="fas fa-gem"></i>
            </div>
            <h3>Excellence</h3>
            <p>Nous ne proposons que des produits répondant à nos standards de qualité les plus exigeants.</p>
        </div>
        
        <div class="value-card">
            <div class="value-icon">
                <i class="fas fa-leaf"></i>
            </div>
            <h3>Éco-responsabilité</h3>
            <p>Emballages recyclés, produits durables et partenariats éthiques avec nos fournisseurs.</p>
        </div>
        
        <div class="value-card">
            <div class="value-icon">
                <i class="fas fa-users"></i>
            </div>
            <h3>Communauté</h3>
            <p>Nous construisons une communauté de passionnés qui partagent nos valeurs sportives.</p>
        </div>
        
        <div class="value-card">
            <div class="value-icon">
                <i class="fas fa-lightbulb"></i>
            </div>
            <h3>Innovation</h3>
            <p>Nous suivons les dernières tendances technologiques pour améliorer votre performance.</p>
        </div>
        
        <div class="value-card">
            <div class="value-icon">
                <i class="fas fa-heart"></i>
            </div>
            <h3>Passion</h3>
            <p>Notre équipe est composée de sportifs passionnés qui testent chaque produit.</p>
        </div>
        
        <div class="value-card">
            <div class="value-icon">
                <i class="fas fa-handshake"></i>
            </div>
            <h3>Transparence</h3>
            <p>Des prix justes, des informations claires et un service client transparent.</p>
        </div>
    </div>
</section>

<section class="about-section">
    <h2 class="section-title">Notre Histoire</h2>
    <p class="section-subtitle">De l'idée à la réalité : le parcours d'EcomSport</p>
    
    <div class="history-timeline">
        <div class="timeline-item">
            <div class="timeline-date">Janvier 2023</div>
            <div class="timeline-content">
                <h3>La Genèse</h3>
                <p>Trois amis sportifs unissent leurs passions pour le sport et l'entrepreneuriat. L'idée EcomSport naît d'un constat simple : le manque d'accessoires sportifs élégants et de qualité au Maroc.</p>
            </div>
        </div>
        
        <div class="timeline-item">
            <div class="timeline-date">Mai 2023</div>
            <div class="timeline-content">
                <h3>Première Collection</h3>
                <p>Lancement de notre première collection exclusive de 15 produits. 200 clients pionniers nous font confiance et valident notre concept.</p>
            </div>
        </div>
        
        <div class="timeline-item">
            <div class="timeline-date">Septembre 2023</div>
            <div class="timeline-content">
                <h3>Expansion Nationale</h3>
                <p>Ouverture de notre plateforme e-commerce complète. Premières livraisons dans tout le Maroc. Notre communauté dépasse les 1 000 membres.</p>
            </div>
        </div>
        
        <div class="timeline-item">
            <div class="timeline-date">Janvier 2024</div>
            <div class="timeline-content">
                <h3>Reconnaissance</h3>
                <p>EcomSport reçoit le prix de "l'Innovation Sportive" au Salon des Entrepreneurs de Tanger, reconnaissant notre approche novatrice.</p>
            </div>
        </div>
        
        <div class="timeline-item">
            <div class="timeline-date">Juin 2024</div>
            <div class="timeline-content">
                <h3>Collection Éco-responsable</h3>
                <p>Lancement de notre ligne "Green Sport", fabriquée à partir de matériaux recyclés, marquant notre engagement environnemental fort.</p>
            </div>
        </div>
        
        <div class="timeline-item">
            <div class="timeline-date">Aujourd'hui</div>
            <div class="timeline-content">
                <h3>Croissance Continue</h3>
                <p>Plus de 10 000 clients satisfaits, une équipe de 5 passionnés, et une ambition sans cesse renouvelée de démocratiser l'excellence sportive.</p>
            </div>
        </div>
    </div>
</section>


<section class="about-cta">
    <h2>Rejoignez Notre Aventure Sportive</h2>
    <p>Que vous soyez un athlète confirmé ou que vous débutiez votre parcours, nous avons les accessoires qu'il vous faut pour exceller avec style.</p>
    <a href="/products" class="cta-button">Découvrir notre collection</a>
</section>
@endsection