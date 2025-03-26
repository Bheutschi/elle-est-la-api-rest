# API Commandes - Laravel 12

Ce projet est une API REST construite avec Laravel 12, dans le cadre du module i321 - Programmer des systèmes distribués.

Il a été fait par Keanu De Coster et Bryan Heutschi.

---

## 📢 Disclaimer

Nous avons bien générer une migration pour la table **commandes_produits**, mais comme il n'y a pas de table produits, nous pouvons pas la remplir.

---

## 🧰 Prérequis

- PHP ≥ 8.2
- [Composer](https://getcomposer.org/) (obligatoire pour installer les dépendances)
- Docker (Laravel Sail fonctionne avec Docker)

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

### 3. Installer les dépendances

```bash
composer install
```

### 4. Lancer Sail (en arrière-plan)

```bash
./vendor/bin/sail up -d
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

Pour éviter d'aller dans la db pour copier coller un id nous avons mis un seeder qui génère une commande avec cette id : **6d4acb24-e4e4-33bd-a667-677794a653af**

Pour regénérer la documentation après modifications :
```bash
./vendor/bin/sail artisan l5-swagger:generate
```

---

## 🧪 Tester les routes

Vous pouvez tester les routes de l'API avec un client HTTP comme Postman ou Insomnia.

Si vous voulez lister les routes disponibles, vous pouvez utiliser la commande suivante :

```bash
./vendor/bin/sail artisan route:list
```
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
