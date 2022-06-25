# Soft Drinks Organizer

### Calcan Teodor Alexandru

### Amăriucăi Cosmin

<p align="center">
<br/>
  <img src="./assets/logo.png" width="45%" alt="GraphBotProfilePicture">
<br/>
</p>

## Ce oferă Soft Drinks Organizer?

- O gamă extinsă de băuturi non-alcolice și informații detaliate despre acestea
- Un formular pentru găsirea băuturii potrivite bazat pe un set de parametri
- Gestionarea băuturilor în diferite liste și printr-un sistem de "whishlist"
- Descărcarea listelor și whishlistului în format .csv
- Statistici despre popularitatea băuturilor

## Funcțiile folosite pentru realizarea Soft Drink Organizer-ului

### în "functions"

```getProductID```

- Returnează ID-ul produsului din baza de date

```isFav```

- Verifică dacă produsul este în whishlistul unui utilizator

```toggleFav```

- Introduce sau șterge produsele din whishlistul unui utilizator

```getProductByID```

- Returnează produsul pe baza ID-ului

```emptyInputRegister```

- Verifică dacă datele de înregistrare au fost introduse

```emptyInputLogin```

- Verifică dacă datele de autentificare au fost introduse

```invalidEmail```

- Verifică dacă emailul are formatul corect

```invalidUser```

- Verifică dacă numele de utilizator conține doar litere și cifre

```invalidPwd```

- Verifică dacă ambele parole introduse la înregistrare sunt identice

```userRpt```

- Verifică daca numele de utilizator sau emailul există deja

```createUser```

- Creează un entry în baza de date pentru un utilizator nou

```loginUser```

- Funcția de logare pe site

```wrongPwd```

- Verifică dacă parola introdusă la logare este corectă

```updateEmail```

- Permite utilizatorului schimbarea emailului

```updatePwd```

- Permite utilizatorului schimbarea parolei

```getEmail```

- Returnează emailul unui utilizator

```startTableDesk```

- Creează tabelul de produse (internal use)

```allProductsDesk```

- Afișează lista completă de produse

```selectedProductsDesk```

- Afișează lista de produse în funcție de preferințele completate în formular

```allWishlistDesk```

- Afișează produsele din whishlist

```getProductsDesk```

- Returnează informațiile despre produse din baza de date

```WishlistDesk```

- Transformă fiecare produs din wishlist într-o linie de tabel, similar cu ```getProductsDesk```

```PopularityContest```

- Verifică de câte ori apar produsele în liste, incluzând wishlist-ul, și creează un top 10 pentru ambele situații

### în "beverage functions"

```getProductImageLink```

- Face parte dintr-o suită de funcții care extrag informații de pe "<a href="openfoodfacts.org">openfoodfacts.org</a>"
- Aceasta, în particular, returnează poza cu produsul relevant

```getProductIngredients```

- Precum funcția de mai sus aceasta returnează informații de pe "<a href="openfoodfacts.org">openfoodfacts.org</a>"
- Funcția aceasta, în schimb, returnează lista de ingrediente

```getNova```

- Această funcție returnează NOVA rating-ul produsului

```getNutriscore```

- În final, aceasta funcție returnează Nutri-Score-ul produsului

### în "preference functions"

```getID```

- Returnează ID-ul utilizatorului

```getAcid```

- Returnează preferința față de parametrul "acid"

```getNatural```

- Returnează preferința față de parametrul "natural"

```getLowCal```

- Returnează preferința față de parametrul "lowcal"

```getMilk```

- Returnează preferința față de parametrul "milk"

```getCofe```

- Returnează preferința față de parametrul "cofe"

```getGust```

- Returnează preferința față de parametrul "gust"

```getAroma```

- Returnează preferința față de parametrul "aroma"

```updatePreferences```

- Permite schimbarea preferințelor în baza de date o dată cu recompletarea formularului

### în "list functions"

```createList```

- Creează o listă nouă

```checkListName```

- Verifică dacă există deja o listă cu același nume

```addBevToList```

- Adaugă băuturi la listă

```getListID```

- Returnează ID-ul listei

```getUserListsOptions```

- Afișează toate listele plus opțiunea de a creea una nouă

```getUserLists```

 - Afișează toate listele utilizatorului plus opțiunea de a le șterge

```removeList```

- Elimină lista curentă

```removeItemFromList```

- Elimină produsul din listă

```checkPIDinList```

 - Verifică existența unui produs într-o listă

```allListDesk```

 - afișează toate listele utilizatorului

```getListProductsDesk```

 - Transformă fiecare produs dintr-o listă într-o linie de tabel, similar cu ```getProductsDesk```,cu posibilitatea de a le elimina




