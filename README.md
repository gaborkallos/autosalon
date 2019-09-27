# autosalon
PHP gyakorlófeladat: Autószalon-nyilvántartó webes
felület
Feladat: Hozz létre egy olyan adminisztratív felületet, amellyel egy
autószalon nyilvántartását lehet szimulálni.
A felületnek a következőket kell tudnia:
• Beléptetés felhasználónév és jelszó segítségével (login
screen).
• Az oldal szerkezeti felépítése (belépés utáni
screen):
• Fejléc: Rendszer neve, belépett felhasználó, kilépés
gomb.
• Baloldalon menü: Autók, Alkalmazottak, Vevők
• Menü mellett legyen látható az éppen aktuálisan kiválasztott
lista.
• Az elsődleges szempont a funkcionalitás legyen, nem kell „szépnek”
lennie a felületnek, szerkezetileg legyen átlátható.
• Mindegyik listanézetben legalább néhány oszlop legyen kereshető (lista feletti
input). A gépelés hatására nem szükséges frissülnie a listának, megfelelő egy submit
gomb is.
• Az egyes adatokat lehessen szerkeszteni egy új layerben (a lista felett jelenjen meg a
form). A módosítás elvégzése után a layer záródjon be és a lista frissüljön.
• A lista alatt, vagy felett legyen egy új hozzáadása gomb, amely hatására a
szerkesztésnél megadott layeres formban fel lehet vinni az adatokat.
• Az egyes listák megjelenítése, keresés hatására történő frissítése és a formok
mentése is AJAX-osan történjen.
• Autók menüpont: a listának tartalmaznia kell a tényleges autó árakat, illetve hogy
melyik alkalmazott a felelősük. A hozzá tartozó lista is ennek megfelelő legyen
megjelenítve (pl. lehessen márkára vagy alkalmazottra is szűrni).

A megvalósításhoz használandó
eszközök:
• Szerver oldalon: PHP
• Adatbázis: PostgreSQL (vagy MySQL)
• Kliens oldalon: HTML5, CSS, Javascript,
jQuery/AngularJS/Vue.js
• Firefox és Chrome böngészőben is működjön és a megjelenés is nagyjából
egyezzen.
Javaslat a
megvalósításra:
• Az egyes részek megvalósításához (lista megjelenítés, form mentés, stb.) célszerű
közös kódrészeket létrehozni.
• A megjelenítést és a logikát válasszuk el amennyire csak
lehet.
