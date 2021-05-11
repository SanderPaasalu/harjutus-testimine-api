# HARJUTUS - API TESTIMINE

API kood on loodud suuresti [maurobonfietti/slim4-api-skeleton](https://github.com/maurobonfietti/slim4-api-skeleton) põhjal. Eesmärgiks on tutvustada testimist PHP API näitel.


## PROJEKTI ÜLESSEADMINE


### Nõuded:

- [Composer](https://getcomposer.org/)
- PHP 7.4+
- MySQL/MariaDB

Kui PHP ja/või MySQL ülesseadmisel on probleeme, siis soovitan kasutada näiteks [XAMPP](https://www.apachefriends.org/download.html) abi. Kindlasti jälgige, et kasutate PHP versiooni 7.x. XAMPP annab kaasa ka phpMyAdmin kasutamise valiku, mis lihtsustab oluliselt andmebaasi loomist ja haldamist.


### Ülesseadmise sammud

- Lae alla ja paigalda endale [Composer](https://getcomposer.org/). Kontrolli tema olemasolu käsureal käsuga `composer --version`.
- Paigalda PHP 7.x (soovitatavalt kasutades XAMPP) ja veendu, et ta oleks käsurealt kättesaadav käsuga `php --version`.
- Paigalda MySQL (soovitatavalt kasutades XAMPP) - kõige kergem.
- Tee omale oma _fork_ koodist
- Klooni käsurea (`git clone`) või GitHub Desktop abil kood oma arvutisse. Või lae kood .zip formaadis alla - annan valikuvabaduse, mis viisil projekti endale paigaldad.
- Liigu käsureal projekti kausta ja jooksuta käsk `composer install`, mis paigaldab kõik vajalikud PHP moodulid.
- Loo `.env.example` näitel `.env` fail, kus on info sinu MySQL andmebaasi kohta.
- Kasutades juurkaustas olevat `harjutus-testimine-api.sql` faili loo omale oma andmebaas ja tabel _candidates_. Eelmainitud faili saab ka importida lihtsalt phpMyAdmin'i, kui seda kasutad. Vaja oleks andmebaasi olemasolu ja selle sees _candidates_ tabel vastavalt kujule, mis on ära märgitud .sql failis. 
- Käivitades käsureal `composer test` ja `composer start` peaks nüüd vastavalt jooksma automaatsed testid ja käivituma API ise.

Jaga oma muudetud koodi minuga oma valitud viisil: tee oma privaatne repo GitHubis või mujal ning anna mulle ligipääs; lae kood üles Drive'i või mujale; jaga lihtsalt muudetud koodi tekstina. Tahan tehtud tööd kuidagi kontrollida - teste jooksutada.


### Käsud

Ole oma käsureaga projekti kaustas. Toetatud on järgmised käsud.

- `composer test` - Jooksuta kõik hetkel olemas olevad testid.
- `composer start` - Käivitab API (vaikimisi aadressil localhost:8080)


## Lisainfo

Kui soovid niisama proovida API pihta teha päringuid mugavalt, siis kasuta näiteks sellist rakendust nagu [Postman](https://www.postman.com/).


## ÜLESANDED

Testide muutmisel ja/või loomisel on abiks [PHPUnit dokumentatsioon](https://phpunit.readthedocs.io/en/9.5/assertions.html).


### Ühiktestid

Kaustas `tests/unit` asub üks fail `CardDeckServiceTest.php`. Seal on juba loodud kaks ühiktesti. Testid käivad PHP klassi pihta, mis tagastab kas _array_ ühe kaardipaki kaartidest, kusjuures kaardid on õiges järjekorras, või _array_ kaartide nimedest segatud kujul.

Tutvu ka PHP klassi endaga `src/App/Service/CardDeckService.php`.

Kirjuta juurde kaks testi või muuda olemasolevaid ning veendu, et nad jookseksid edukalt tehes käsureal `composer test tests/unit`. Lisades `tests/unit` käsu lõppu jooksevad ainult ühiktestid.


### Integratsioonitestid

Kaustas `tests/integration` on hulk integratsiooniteste kontrollimaks, kas API tagastab ootuspäraseid vastuseid. Failis `CandidatesTest.php` asub hulk kandidaatide info töötlemise teste. 

Palun muuta `testUpdate()` testi nii, et lisaks first_name väljale kontrollitaks ka last_name muutumist. Veendu, et testid tomiksid käivitades käsureal `composer test tests/integration`.

