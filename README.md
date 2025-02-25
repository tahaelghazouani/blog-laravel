Voici un fichier **README.md** prêt à être copié et collé dans ton projet **Blog** Laravel :  

---

### 📜 **README.md**  

```markdown
# 📝 Blog Laravel

Un projet de blog développé avec Laravel, Blade et Bootstrap. Permet la gestion des articles (création, modification, suppression) avec un système d'authentification.

## 🚀 Fonctionnalités
- 📌 Création, modification et suppression d'articles.
- 👤 Authentification avec `laravel/ui`.
- 🖥️ Interface utilisateur en Blade et Bootstrap.
- 🔒 Gestion des droits d'accès aux articles.

## 📂 Installation

1. **Cloner le projet**  
   ```bash
   git clone https://github.com/tahaelghazouani/blog-laravel.git
   cd Blog
   ```

2. **Installer les dépendances**  
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Configurer l'environnement**  
   Copier le fichier `.env.example` et le renommer en `.env` :  
   ```bash
   cp .env.example .env
   ```
   Puis générer la clé de l'application :  
   ```bash
   php artisan key:generate
   ```

4. **Configurer la base de données**  
   - Modifier le fichier `.env` avec les informations de connexion à la base de données.
   - Exécuter les migrations :  
     ```bash
     php artisan migrate
     ```

5. **Démarrer le serveur**  
   ```bash
   php artisan serve
   ```

## 🔑 Authentification
- **Créer un compte** via `/register`
- **Se connecter** via `/login`
- **Se déconnecter** via `/logout`

## 🛠 Technologies utilisées
- **Laravel** - Framework PHP
- **Blade** - Moteur de templates Laravel
- **Bootstrap** - Pour le design
- **MySQL** - Base de données

