
        <style>
.footer {
            background: #0F172A;
            color: white;
            padding: 40px 0 20px;
            margin-top: 60px;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }
        
        .footer-section h3 {
            margin-bottom: 20px;
            font-size: 18px;
        }
        
        .footer-section a {
            display: block;
            color: #CBD5E1;
            margin-bottom: 10px;
            text-decoration: none;
        }
        
        .footer-section a:hover {
            color: white;
        }
        
        .footer-section p {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            margin-top: 30px;
            border-top: 1px solid #334155;
            color: #94A3B8;
            font-size: 14px;
        }
        
        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 15px;
                gap: 15px;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .container {
                padding: 0 15px;
            }
        }
		</style>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>EcomSport</h3>
            <p>Votre destination pour des accessoires de sport haut de gamme.</p>
        </div>
        <div class="footer-section">
            <h3>Liens rapides</h3>
            <a href="/">Accueil</a>
            <a href="/products">Produits</a>
            <a href="/about">À propos</a>
            <a href="/contact">Contact</a>
        </div>
        <div class="footer-section">
            <h3>Contact</h3>
            <p><i class="fas fa-envelope"></i> ihsane@ecomsport.com</p>
            <p><i class="fas fa-phone"></i> +212 623989094</p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>© 2026 EcomSport – Tous droits réservés</p>
    </div>
</footer>