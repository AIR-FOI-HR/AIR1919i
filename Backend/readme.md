# Bistro Deno Backend

Laravel dio koji je zaslužan za komunikaciju između korisnika mobilne aplikacije i baze podataka.

### Uputa za instalaciju

Priručnik za instalaciju Laravela se može pronaći na sljedećoj poveznici:

https://laravel.com/docs/6.x#installation

Prvo je potrebno preuzeti Laravel koristeći Composer alat:

```
composer global require laravel/installer
```

Sljedeće što treba napraviti je instalirati potrebne pakete sa ```composer install``` naredbom.

Nakon preuzimanja alata, potrebno je preći u Backend direktorij i pokrenuti sljedeću komandu:

```
php artisan serve --host 0.0.0.0
```

Nakon toga je potrebno stvoriti .env datoteku iz .env.example datoteke i postaviti vaš lokalni inet adresu u APP_URL varijablu (npr. APP_URL=192.168.1.1:8000)

Isto tako, public direktorij treba imati dozvoljen pristup kako bi se mogle slati razne slike koje se koriste u mobilnoj aplikaciji.

Nadalje, u nekim slučajevima će biti potrebno onemogućiti vatroštit jer je moguće da blokira pristup zahtjevima mobilne aplikacije.