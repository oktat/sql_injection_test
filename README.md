# SQL injekció teszt

## A projekt beszerzése és indítása

```bash
git clonehttps://github.com/oktat/sql_injection_test
cd sql_injection_test
```

## Szükséges

A használathoz szükség van a MaridaDB vagy MySQL szerverre és a következő parancsokra:

* php
* composer

## Beállítás

Indítsunk egy MariaDB/MySQL szervert. Futtassuk a database/database.sql fáljban található scripteket, amik létrehozzák az adatbázist és felveszik a felhasználókat.

* database/database.sql

## Indítás

```bash
composer start
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

A composer.json fájlban javítsuk a `test` scriptet, ha a python3 parancs helyett python parancsot használunk.

```bash
composer test
```
