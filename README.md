# SQL injekció teszt

## A projekt beszerzése és indítása

```bash
git clone https://github.com/oktat/sql_injection_test
cd sql_injection_test
```

## Szükséges

A használathoz szükség van a MaridaDB vagy MySQL szerverre és a következő parancsokra:

* php
* pip - Az automat teszteléshez szükséges

## Beállítás

Indítsunk egy MariaDB/MySQL szervert. Futtassuk a database/database.sql fáljban található scripteket, amik létrehozzák az adatbázist és felveszik a felhasználókat.

* database/database.sql

## Indítás

```bash
php artisan start
```

Vagy:

```bash
php -S localhost:3000 -t app
```

## Belépési adatok

| Felhasználó | Jelszó |
| --- | --- |
| admin | admin_password |
| mari | titok |

## Tesztelés

### Böngészőben

A böngészőbe írjuk be:

* localhost:3000

### Python script

Az artisan fájlban állítsuk be a rendelkezésre álló python parancsot:

* python
* python3

Az artisan fájlban keressük a $CMD nevű változót.

```bash
php artisan test
```

Másik lehetőség:

```bash
python tests/test_login.py
```
