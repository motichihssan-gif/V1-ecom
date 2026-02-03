# Vérification rapide du système - Étapes à suivre

## 🎯 Objectif
Vérifier que le système d'authentification avec rôles fonctionne correctement.

## ⚡ Étapes rapides (5 minutes)

### 1. Exécuter les migrations (si pas déjà fait)
```bash
php artisan migrate
```

### 2. Créer les utilisateurs de test
```bash
php artisan setup:test-users
```

**Résultat attendu:**
```
Test users created successfully!

Admin Account:
  Email: admin@example.com
  Password: password
  Role: ADMIN

Regular User Account:
  Email: test@example.com
  Password: password
  Role: USER
```

### 3. Lancer le serveur
```bash
php artisan serve
```

### 4. Tester dans le navigateur

#### Test 1 - Page d'accueil (non connecté)
- URL: `http://localhost:8000/`
- **Résultat attendu:**
  - Menu affiche: "Se connecter" et "S'inscrire"
  - ✓ Doit afficher "Se connecter" (Se connecter link)
  - ✓ Doit afficher "S'inscrire" (S'inscrire link)

#### Test 2 - Se connecter comme USER
- URL: `http://localhost:8000/login`
- Email: `test@example.com`
- Mot de passe: `password`
- **Résultat attendu:**
  - Redirection vers `/dashboard`
  - Menu affiche: "Espace Client" et "Déconnexion"
  - ✓ Doit afficher "Espace Client" (lien vers le dashboard)
  - ✗ NE doit PAS afficher "Ajouter un produit"
  - ✗ NE doit PAS afficher "Mise à jour des produits"

#### Test 3 - Accéder à la création de produit (USER)
- URL: `http://localhost:8000/produits/create` (en tant que USER)
- **Résultat attendu:**
  - Erreur 403 (Unauthorized)
  - Message: "Vous n'avez pas accès à cette ressource"
  - Redirection vers la page d'accueil

#### Test 4 - Se déconnecter
- Cliquez sur "Déconnexion"
- **Résultat attendu:**
  - Redirection vers `/`
  - Menu revient à: "Se connecter" et "S'inscrire"

#### Test 5 - Se connecter comme ADMIN
- URL: `http://localhost:8000/login`
- Email: `admin@example.com`
- Mot de passe: `password`
- **Résultat attendu:**
  - Redirection vers `/produits` (liste des produits)
  - Menu affiche:
    - ✓ "Ajouter un produit"
    - ✓ "Mise à jour des produits"
    - ✓ "Déconnexion"
  - ✗ NE doit PAS afficher "Espace Client"

#### Test 6 - Accéder à la création de produit (ADMIN)
- URL: `http://localhost:8000/produits/create` (en tant que ADMIN)
- **Résultat attendu:**
  - Accès autorisé
  - Affichage du formulaire de création de produit

#### Test 7 - S'inscrire
- URL: `http://localhost:8000/register`
- Remplissez le formulaire
- **Résultat attendu:**
  - Nouvel utilisateur créé avec rôle "USER"
  - Redirection vers `/` (accueil)
  - Menu affiche: "Espace Client" et "Déconnexion"

## 📊 Tableau de vérification

| Test | Visiteur | USER | ADMIN | Résultat |
|------|----------|------|-------|----------|
| Menu "Se connecter" | ✓ | ✗ | ✗ | |
| Menu "S'inscrire" | ✓ | ✗ | ✗ | |
| Menu "Espace Client" | ✗ | ✓ | ✗ | |
| Menu "Ajouter produit" | ✗ | ✗ | ✓ | |
| Menu "Mise à jour produits" | ✗ | ✗ | ✓ | |
| Menu "Déconnexion" | ✗ | ✓ | ✓ | |
| Accès /produits/create (USER) | ✗ | ✗ | ✓ | |
| Accès /dashboard (USER) | ✗ | ✓ | ? | |

## 🔴 Problèmes courants et solutions

### Erreur: "SQLSTATE[42S22]: Column not found: Unknown column 'role'"
**Solution:** Exécutez les migrations
```bash
php artisan migrate
```

### Le menu n'affiche pas les bonnes options
**Solution:** Videz le cache
```bash
php artisan cache:clear
php artisan config:clear
```

### Impossible de se connecter
**Solution:**
```bash
# Vérifiez les utilisateurs
php artisan tinker
> User::all()

# Ou créez les utilisateurs de test
php artisan setup:test-users
```

### Erreur 403 même avec le rôle ADMIN
**Solution:** Vérifiez que le middleware admin est activé
```bash
# Consultez routes/web.php pour voir les middleware appliqués
```

## ✅ Checklist finale

- [ ] Migrations exécutées
- [ ] Utilisateurs de test créés
- [ ] Test connexion USER réussi
- [ ] Test connexion ADMIN réussi
- [ ] Menu affiche les bonnes options
- [ ] Routes admin protégées
- [ ] Inscription fonctionnelle
- [ ] Tous les fichiers incluent header/footer

## 📚 Fichiers à vérifier

1. **resources/views/Menu.blade.php** - Affichage du menu selon le rôle
2. **routes/web.php** - Routes et middleware
3. **app/Http/Middleware/AdminMiddleware.php** - Protection admin
4. **resources/views/layouts/app.blade.php** - Layout avec Menu et Footer
5. **resources/views/Master_page.blade.php** - Master layout avec Menu et Footer

## 🚀 Prochaines étapes

Si tous les tests réussissent:
1. Pousser les changements vers le serveur
2. Exécuter les migrations en production
3. Créer les utilisateurs de production
4. Tester en production

Pour toute question, consultez:
- AUTHENTICATION_SETUP.md
- CHECKLIST.md
- DEBUG_GUIDE.md
