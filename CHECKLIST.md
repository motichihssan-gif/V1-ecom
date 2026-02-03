# Checklist de vérification du système d'authentification

## ✅ Étape 1 : Vérifier la migration

La migration doit ajouter une colonne `role` à la table `users`.

### Vérification:
```sql
-- Exécutez cette commande dans phpmyadmin
DESCRIBE users;
-- Vous devriez voir une colonne 'role' de type VARCHAR(255)
```

Si la colonne n'existe pas, exécutez:
```bash
php artisan migrate
```

## ✅ Étape 2 : Vérifier les utilisateurs existants

Tous les utilisateurs doivent avoir un rôle assigné.

### Via SQL:
```sql
SELECT id, name, email, role FROM users;
-- Vérifiez que tous les utilisateurs ont 'USER' ou 'ADMIN' dans la colonne role
```

Si certains utilisateurs ont NULL ou une chaîne vide:
```sql
UPDATE users SET role = 'USER' WHERE role IS NULL OR role = '';
```

## ✅ Étape 3 : Créer des utilisateurs de test

### Option A - Via Artisan (recommandé):
```bash
php artisan setup:test-users
```

### Option B - Via phpmyadmin (SQL):
Importez le fichier `setup_authentication.sql`

### Option C - Via inscription:
1. Allez sur http://localhost/register
2. Créez un compte avec un email
3. Vous serez automatiquement assigné le rôle 'USER'

## ✅ Étape 4 : Tester le menu

### Test 1 - Visiteur (non connecté):
1. Allez sur http://localhost/ sans être connecté
2. Vous devriez voir:
   - Accueil
   - Produits
   - À propos
   - Contact
   - **Se connecter** ✓
   - **S'inscrire** ✓

### Test 2 - Utilisateur USER:
1. Connectez-vous avec: test@example.com / password
2. Vous devriez voir:
   - Accueil
   - Produits
   - À propos
   - Contact
   - **Espace Client** ✓
   - **Déconnexion** ✓

### Test 3 - Utilisateur ADMIN:
1. Connectez-vous avec: admin@example.com / password
2. Vous devriez voir:
   - Accueil
   - Produits
   - À propos
   - Contact
   - **Ajouter un produit** ✓
   - **Mise à jour des produits** ✓
   - **Déconnexion** ✓

## ✅ Étape 5 : Vérifier les routes protégées

Les routes suivantes doivent être protégées:
- `/produits/create` - Formulaire pour créer un produit (ADMIN only)
- `/produits/{id}/edit` - Éditer un produit (ADMIN only)
- `/produits` (POST) - Soumettre un produit (ADMIN only)
- `/produits/{id}` (PUT) - Mettre à jour un produit (ADMIN only)
- `/produits/{id}` (DELETE) - Supprimer un produit (ADMIN only)

### Test:
1. Connectez-vous en tant que USER
2. Essayez d'accéder à `/produits/create`
3. Vous devriez être redirigé vers la page d'accueil avec un message d'erreur

## ✅ Étape 6 : Vérifier les fichiers modifiés

Les fichiers suivants ont été modifiés ou créés:

### 1. Menu.blade.php
- Affiche les liens selon le rôle

### 2. migrations/2026_02_01_000000_add_role_to_users_table.php
- Ajoute la colonne role avec valeur par défaut 'USER'

### 3. app/Http/Middleware/AdminMiddleware.php
- Middleware pour protéger les routes admin

### 4. routes/web.php
- Routes protégées par le middleware admin

### 5. app/Http/Controllers/Auth/AuthenticatedSessionController.php
- Redirection intelligente après connexion

### 6. app/Http/Controllers/Auth/RegisteredUserController.php
- Attribution du rôle 'USER' lors de l'inscription

### 7. database/seeders/DatabaseSeeder.php
- Création des utilisateurs de test

## 🔴 Troubleshooting

### Problème: "Class not found: User::ADMIN_ROLE"
**Solution:** Les constantes ont été remplacées par des chaînes. Utilisez 'ADMIN' au lieu de User::ADMIN_ROLE

### Problème: Le menu n'affiche pas les bonnes options
**Solution:** Videz le cache: `php artisan cache:clear`

### Problème: La connexion échoue
**Solution:** 
1. Vérifiez que l'utilisateur existe en base de données
2. Vérifiez que la migration a été exécutée (colonne role existe)
3. Vérifiez que le mot de passe est correct

### Problème: Erreur 403 (Unauthorized)
**Solution:** Vous n'avez pas le rôle ADMIN. Modifiez votre rôle en base de données ou créez un compte admin.

## 📋 Résumé des routes

| Route | Method | Middleware | Description |
|-------|--------|-----------|------------|
| `/login` | GET/POST | guest | Afficher/traiter le formulaire de connexion |
| `/register` | GET/POST | guest | Afficher/traiter le formulaire d'inscription |
| `/logout` | POST | auth | Déconnexion |
| `/dashboard` | GET | auth | Tableau de bord utilisateur |
| `/produits` | GET | - | Liste des produits (public) |
| `/produits/create` | GET | auth,admin | Formulaire de création (admin only) |
| `/produits` | POST | auth,admin | Créer un produit (admin only) |
| `/produits/{id}/edit` | GET | auth,admin | Formulaire d'édition (admin only) |
| `/produits/{id}` | PUT | auth,admin | Mettre à jour un produit (admin only) |
| `/produits/{id}` | DELETE | auth,admin | Supprimer un produit (admin only) |

---

Pour plus d'informations, consultez:
- AUTHENTICATION_SETUP.md
- resources/views/Menu.blade.php
- routes/web.php
- app/Http/Middleware/AdminMiddleware.php
