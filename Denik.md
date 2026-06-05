# Vývojový deníček: Jak jsem robil e-shop v Laravelu

## Písemná část (Fajny deníček)

### Záznam 1: Architektura a to směrování (Routing)

Můj milý deníčku, kura...
Tuž dneska jsem robil ty cesty v `web.php`. Zjistil jsem, že ty prohlížeče su blbé jak cyp a umí ve formulářích enem GET a POST. Takže když jsem chtěl něco smazat, musel jsem tam narvat takovou fintu – `@method('DELETE')`. Laravel to pak zblajzne, přechytračí prohlížeč a tváří se, že to je fakt DELETE. Kdybych to tam nedal, tak to hodí chujovinu *405 Method Not Allowed* a celá robota by byla v řiti.

* **Odkaz na dokumentaci:** [Laravel Routing - Basic Routing](https://www.google.com/search?q=https://laravel.com/docs/11.x/routing%23basic-routing)
* **Odkaz na dokumentaci:** [Laravel Routing - Form Method Spoofing](https://www.google.com/search?q=https://laravel.com/docs/11.x/routing%23form-method-spoofing)

### Záznam 2: Košík a ta Session paměť

Můj milý deníčku,
dneska jsem se dupal s košíkem. Ten internet si pamatuje prd, po každém kliku je všechno kajsi pryč, tak jsem to musel narvat do Session. Zrobil jsem tam fajne čudlíky `+` a `-`, ať se to dá normálně naklikat. Jak to spadne na nulu nebo do mínusu, tak to nemilosrdně smažu přes `unset()`. Bo co s prázdným košíkem, že jo. Pak to enem švihnu zpátky do té paměti a valím dál.

* **Odkaz na dokumentaci:** [HTTP Session - Storing Data](https://www.google.com/search?q=https://laravel.com/docs/11.x/session%23storing-data)
* **Odkaz na dokumentaci:** [HTTP Session - Retrieving Data](https://www.google.com/search?q=https://laravel.com/docs/11.x/session%23retrieving-data)

### Záznam 3: Přihlašování a ten Breeze

Můj milý deníčku,
nebudu přece robit přihlašování od nuly jak nějaký ocas. Prdnul jsem tam Laravel Breeze. Poslal jsem do terminálu `php artisan breeze:install blade` a ono se to zrobilo úplně samo. Všechny ty formuláře na login a registraci su už nagestylované v Tailwindu. Enem jsem musel eště nahodit `npm install` a `npm run build`, ať to nevypadá jak z minulého století.

* **Odkaz na dokumentaci:** [Laravel Starter Kits - Laravel Breeze](https://www.google.com/search?q=https://laravel.com/docs/11.x/starter-kits%23laravel-breeze)

### Záznam 4: Databáza a ty migrace

Můj milý deníčku,
kura, potřeboval jsem odlišit obyčejného chachara od admina. Tak jsem zrobil migraci na tabulku uživatelů. V metodě `up()` jsem postavil nový sloupeček `is_admin`, v `down()` jsem dal příkaz k vybourání, kdybych to nahodou posral a musel to vracet zpátky. Abych se dostal do adminu, prvního správce jsem naklikal natvrdo přes ten interaktivní `tinker`, bo s tím se nebudu párat.

* **Odkaz na dokumentaci:** [Database Migrations - Generating Migrations](https://www.google.com/search?q=https://laravel.com/docs/11.x/migrations%23generating-migrations)
* **Odkaz na dokumentaci:** [Database Migrations - Columns](https://www.google.com/search?q=https://laravel.com/docs/11.x/migrations%23creating-columns)

### Záznam 5: Vyhazovač na dveřích (Middleware)

Můj milý deníčku,
do administrace mi nesmí vlézt kdejaký cyp z ulice. Zrobil jsem `AdminMiddleware`, což je takový namakaný vyhazovač. Koukne, esli jsi přihlášený (`!auth()->check()`), a esli máš rolu admina (`!auth()->user()->is_admin`). Jak nemáš oboje, tak ti hodí `abort(403)` a valíš zpátky k mašině. V `web.php` jsem to pak prdnul na celou skupinu cest a mám svatý klid.

* **Odkaz na dokumentaci:** [Laravel Middleware - Defining Middleware](https://www.google.com/search?q=https://laravel.com/docs/11.x/middleware%23defining-middleware)
* **Odkaz na dokumentaci:** [Laravel Middleware - Registering Middleware](https://www.google.com/search?q=https://laravel.com/docs/11.x/middleware%23registering-middleware)

### Záznam 6: Správa produktů a ten CRUD

Můj milý deníčku,
tuž na bublifuky jsem si vygeneroval `Resource Controller`. To je kura pecka, bo to má hnedka 7 funkcí na všechno (přidat, upravit, smazat...). V `web.php` jsem napsal jeden řádek a ono si to udělalo cesty samo (třeba `admin.products.index`). Na výpis do tabulky jsem použil tu chytrou smyčku `@forelse`, ať mi to rovnou hodí hlášku, když je databáza prázdná, a nespadne to jak hruška.

* **Odkaz na dokumentaci:** [Laravel Controllers - Resource Controllers](https://www.google.com/search?q=https://laravel.com/docs/11.x/controllers%23resource-controllers)
* **Odkaz na dokumentaci:** [Blade Templates - Loops (@forelse)](https://www.google.com/search?q=https://laravel.com/docs/11.x/blade%23loops)

---

## Zhodnocení: Co je fajne a co mě točí (Výhody a nevýhody Laravelu)

### Co je na tom fest fajne (Výhody):


* **Lítá to jak cyp (RAD):** Zrobíš kopec věcí za pár minut. Nemusíš datlovat od nuly šifrování hesel nebo login, Artisan ti to vyblije hotové. Ušetří to mraky času.
* **Má to řád (MVC architektura):** Kura, aspoň to není špagetový kód. Všecko má své místo – modely do databáze, pohledy (Blade) pro lidi a kontrolery, co to celé řídí. I po měsíci se v tom vyznáš.
* **Je to bezpečné:** V čistém PHP člověk na bezpečnost kašle, ale Laravel to hlídá za tebe. Vyžaduje tokeny, chrání to proti SQL injekcím a dalším cypovinám.
* **Kolem su lidi:** Je k tomu brutální dokumentace a co nevíš, to už někdo řešil. Přes Composer tam nasypeš další moduly jak nic.

### Co je na palicu (Nevýhody):

* **Je to těžké jak prase (Strmá křivka učení):** Pro nováčka to je chaos. Děje se tam mraky magie pod kapotou, a když nevíš, jak funguje jádro, tak čumíš do monitoru jak bůh do hodin.
* **Žere to výkon (Overhead):** Je to macatý framework. I na úplně blbou stránku to načítá hromadu souborů. Na malé weby to je jak jít na komára s brokovnicú.