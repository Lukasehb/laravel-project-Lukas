# WoW Hardcore Fan Site - Laravel Project

Dit project is een content management systeem voor een World of Warcraft Hardcore community website. Het bevat functionaliteiten voor nieuwsbeheer, een FAQ-sectie en gebruikersprofielen met verschillende rollen (Admin/User).

## Installatie Handleiding

Volg deze stappen om het project lokaal draaiende te krijgen:

1.  **Clone de repository**
    ```bash
    git clone (https://github.com/Lukasehb/laravel-project-Lukas
    cd project-laravel-lukas-devroey-wow-hardcore
    ```

2.  **Installeer PHP dependencies**
    ```bash
    composer install
    ```

3.  **Installeer en build JavaScript assets**
    ```bash
    npm install
    npm run build
    ```

4.  **Omgevingsvariabelen instellen**
    Maak een kopie van het voorbeeld bestand:
    ```bash
    cp .env.example .env
    ```
    Generate de app key:
    ```bash
    php artisan key:generate
    ```

5.  **Database Configuratie**
    * Zorg dat je database driver (bijv. SQLite of MySQL) correct is ingesteld in het `.env` bestand.
    * Voor SQLite (standaard):
        ```bash
        touch database/database.sqlite
        ```

6.  **Migraties en Seeders draaien**
    Dit commando maakt de tabellen aan en vult de database met testdata en het admin account:
    ```bash
    php artisan migrate:fresh --seed
    ```

## Inloggegevens

Het project wordt geleverd met een standaard administrator account zoals vereist:

* **Rol:** Admin
* **Email:** `admin@ehb.be`
* **Wachtwoord:** `Password!321`

## Functionaliteiten

* **Nieuws:** Publiek kan nieuws lezen. Admins kunnen nieuwsberichten aanmaken, bewerken en verwijderen en Tags koppelen (Many-to-Many).
* **FAQ:** Vragen gegroepeerd per categorie. Admins kunnen categorieën en vragen beheren.
* **Contact:** Bezoekers kunnen een contactformulier sturen (wordt gelogd of gemaild naar admin).
* **Gebruikersbeheer:** Admins kunnen via het dashboard andere gebruikers admin-rechten geven of ontnemen.
* **Profiel:** Gebruikers kunnen hun profiel aanpassen en hebben een publieke profielpagina.

## Bronvermeldingen

* **Framework:** [Laravel 11 Documentation](https://laravel.com/docs)
* **Authenticatie:** [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
* **Styling:** [Tailwind CSS](https://tailwindcss.com/)
* **Assets:** Afbeeldingen en logo's zijn eigendom van Blizzard Entertainment (gebruikt voor educatieve doeleinden/fan art).
* **Cursusmateriaal:** Backend Development cursusmateriaal (Erasmusshogeschool Brussel).
* **Gemini chats:
* check vereiste https://gemini.google.com/share/31deeaf06e36
