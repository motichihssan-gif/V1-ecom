# Guide de déploiement et test de l'authentification

## 1. Instructions pour exécuter les migrations

Assurez-vous que votre application est configurée avec la base de données correcte dans le fichier `.env`.

### Option A: Via terminal/SSH (Recommandé)

```bash
# Exécutez les migrations
php artisan migrate

# (Optionnel) Exécutez les seeders pour créer des utilisateurs de test
php artisan db:seed
```

### Option B: Sur Vercel/Alwaysdata

Si vous utilisez un hébergement en ligne, vous pouvez:
1. Vous connecter à phpmyadmin ou votre panel d'administration
2. Exécuter la migration manuellement via SQL:

```sql
-- Ajouter la colonne 'role' aux utilisateurs existants
ALTER TABLE users ADD COLUMN role VARCHAR(255) DEFAULT 'USER' AFTER password;

-- Assurez-vous que tous les rôles sont définis
UPDATE users SET role = 'USER' WHERE role IS NULL;
```

## 2. Résumé des changements d'authentification

### Structure du menu par rôle:

**Visiteur (non connecté):**
- Se connecter
- S'inscrire
- Accueil, Produits, À propos, Contact

**Utilisateur USER (connecté):**
- Espace Client
- Déconnexion
- Accueil, Produits, À propos, Contact

**Utilisateur ADMIN (connecté):**
- Ajouter un produit
- Mise à jour des produits
- Déconnexion
- Accueil, Produits, À propos, Contact

### Fichiers modifiés:

1. **resources/views/Menu.blade.php** - Menu responsive avec affichage basé sur le rôle
2. **app/Http/Middleware/AdminMiddleware.php** - Middleware pour protéger les routes admin
3. **database/migrations/2026_02_01_000000_add_role_to_users_table.php** - Migration pour ajouter le champ role
4. **app/Http/Controllers/Auth/AuthenticatedSessionController.php** - Redirection intelligente après login
5. **app/Http/Controllers/Auth/RegisteredUserController.php** - Attribution du rôle USER lors de l'inscription
6. **routes/web.php** - Routes protégées par le middleware admin

## 3. Comptes de test à créer

Après les migrations, les comptes suivants sont disponibles:

```
Admin:
Email: admin@example.com
Mot de passe: password (si créé via seeder)

Utilisateur:
Email: test@example.com
Mot de passe: password (si créé via seeder)
```

Ou créez vos propres comptes via le formulaire d'inscription.

## 4. Test du système

1. **Test Visiteur:**
   - Allez sur `/` sans vous connecter
   - Vérifiez que le menu affiche "Se connecter" et "S'inscrire"

2. **Test Inscription:**
   - Cliquez sur "S'inscrire"
   - Remplissez le formulaire avec un email et un mot de passe
   - Vous devez être redirigé vers le dashboard

3. **Test Utilisateur USER:**
   - Après inscription, vous êtes automatiquement connecté en tant que USER
   - Le menu devrait afficher "Espace Client"
   - Vous avez accès à votre tableau de bord

4. **Test Admin:**
   - Si vous avez un compte admin, connectez-vous avec cet email
   - Le menu devrait afficher "Ajouter un produit" et "Mise à jour des produits"
   - Vous pouvez créer et modifier des produits

## 5. Routes protégées

Les routes suivantes sont protégées par le middleware admin:
- `POST /produits` - Créer un produit
- `GET /produits/create` - Afficher le formulaire de création
- `GET /produits/{id}/edit` - Éditer un produit
- `PUT /produits/{id}` - Mettre à jour un produit
- `DELETE /produits/{id}` - Supprimer un produit

Seuls les users avec le rôle 'ADMIN' peuvent accéder à ces routes.

## 6. Troubleshooting

### Problème: Je ne peux pas me connecter

**Solution:**
1. Vérifiez que la migration a été exécutée (la colonne 'role' existe dans la table users)
2. Vérifiez que l'email existe dans la table users
3. Vérifiez que le mot de passe est correct

### Problème: Le menu n'affiche pas les bonnes options

**Solution:**
1. Vérifiez que vous êtes correctement connecté
2. Vérifiez que l'utilisateur a un rôle assigné dans la base de données
3. Rafraîchissez la page

### Problème: Je reçois une erreur 403 (Unauthorized)

**Solution:**
- Cela signifie que vous essayez d'accéder à une route admin sans avoir le rôle ADMIN
- Changez le rôle de l'utilisateur en base de données à 'ADMIN', ou créez un nouveau compte admin

---

Pour toute question, consultez le code dans `resources/views/Menu.blade.php` et `routes/web.php`.
