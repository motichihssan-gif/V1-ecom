# Script de débogage - Vérifier l'état du système d'authentification

## Pour exécuter ce script, utilisez:
```bash
php artisan tinker
```

Puis copiez-collez les commandes ci-dessous:

### 1. Vérifier si la colonne 'role' existe

```php
// Vérifier les colonnes de la table users
$columns = DB::getSchemaBuilder()->getColumnListing('users');
dd($columns);
```

### 2. Vérifier les utilisateurs existants

```php
// Voir tous les utilisateurs
$users = User::all();
dd($users);
```

### 3. Créer un utilisateur de test

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Créer un admin
User::create([
    'name' => 'Admin Test',
    'email' => 'admin@test.com',
    'password' => Hash::make('password'),
    'role' => 'ADMIN'
]);

// Créer un user
User::create([
    'name' => 'User Test',
    'email' => 'user@test.com',
    'password' => Hash::make('password'),
    'role' => 'USER'
]);

echo "Utilisateurs créés avec succès!";
```

### 4. Mettre à jour les rôles des utilisateurs existants

```php
use App\Models\User;

// Mettre à jour tous les utilisateurs sans rôle
User::whereNull('role')->orWhere('role', '')->update(['role' => 'USER']);

echo "Utilisateurs mis à jour!";
```

### 5. Vérifier si un utilisateur peut se connecter

```php
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Récupérer un utilisateur
$user = User::where('email', 'test@example.com')->first();

if ($user) {
    // Vérifier le mot de passe
    if (Hash::check('password', $user->password)) {
        echo "Le mot de passe est correct!";
        echo "Rôle: " . $user->role;
    } else {
        echo "Le mot de passe est incorrect!";
    }
} else {
    echo "L'utilisateur n'existe pas!";
}
```

### 6. Générer un hash de mot de passe

```php
use Illuminate\Support\Facades\Hash;

// Générer un hash pour 'password'
$hash = Hash::make('password');
echo $hash;
```

### 7. Afficher tous les utilisateurs avec leurs rôles

```php
use App\Models\User;

User::all()->each(function ($user) {
    echo "{$user->id} - {$user->name} ({$user->email}) - Role: {$user->role}\n";
});
```

### 8. Supprimer et récréer les utilisateurs de test

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Supprimer les utilisateurs de test
User::whereIn('email', ['admin@example.com', 'test@example.com'])->delete();

// Les recréer
User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'role' => 'ADMIN'
]);

User::create([
    'name' => 'Test User',
    'email' => 'test@example.com',
    'password' => Hash::make('password'),
    'role' => 'USER'
]);

echo "Utilisateurs de test recréés!";
```

---

## Pour sortir de tinker:
```
exit
```

## Notes importantes:

1. Assurez-vous que les migrations ont été exécutées avant
2. Utilisez `php artisan migrate:fresh --seed` pour réinitialiser complètement la base de données
3. Le mot de passe "password" doit toujours être hashé avec Hash::make()
4. Les rôles ne sont que 'USER' ou 'ADMIN'
