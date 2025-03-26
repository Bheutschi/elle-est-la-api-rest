# API Commandes - Laravel 12 + Sail

Ce projet est une API REST construite avec Laravel 12, utilisant Laravel Sail pour l'environnement de développement.

---

## 🚀 Lancer le projet

### 1. Cloner le dépôt

```bash
git clone https://github.com/Bheutschi/elle-est-la-api-rest
cd elle-est-la-api-rest
```

### 2. Copier le fichier `.env`

```bash
cp .env.example .env
```

### 3. Lancer Sail (en arrière-plan)

```bash
./vendor/bin/sail up -d
```

### 4. Installer les dépendances

```bash
./vendor/bin/sail composer install
```

### 5. Générer la clé d'application

```bash
./vendor/bin/sail artisan key:generate
```

### 6. Créer la base de données (SQLite ici)

Crée un fichier vide :
```bash
touch database/database.sqlite
```

Vérifie que `.env` contient bien :

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

### 7. Lancer les migrations + seeders

```bash
./vendor/bin/sail artisan migrate --seed
```

---

## 📚 Documentation de l'API (Swagger)

Une fois le projet lancé, la documentation est disponible ici :

```
http://localhost/api/documentation
```

Pour regénérer la documentation après modifications :
```bash
./vendor/bin/sail artisan l5-swagger:generate
```

---

## 🧪 Tester les routes

Utilise un outil comme Postman ou Thunder Client, ou passe directement par Swagger UI.

---

## 📦 Stack utilisée

- Laravel 12
- Laravel Sail
- SQLite
- L5-Swagger

---

## 🛠️ Commandes utiles

```bash
# Lancer Sail
./vendor/bin/sail up -d

# Arrêter Sail
./vendor/bin/sail down

# Accéder à un shell dans le conteneur
./vendor/bin/sail shell

# Rafraîchir les migrations + seed
./vendor/bin/sail artisan migrate:fresh --seed
```
