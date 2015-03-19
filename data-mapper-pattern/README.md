# DataMapper pattern: php test1

In deze folder vind je een oplossing van test1 met behulp van het datamapper pattern.

**Wat is een domain object / entity**

Alle objecten uit de echte wereld (zelfstandige naamwoorden) kunnen domain objecten zijn. Voorbeeld: User, Car, Order, OrderItem, Product, Article, ...

Een domain object bevat alleen domain logic --> getters setters, berekeningen, ...

**Wat is een datamapper?**

Een datamapper zorgt voor de communicatie tussen het domain object en een storage. Storage kan een DB zijn maar ook tekstbestanden of iets anders.

**Waarom datamapper pattern?**

Volgens het SOLID princiepe mag een klasse maar één verantwoordelijkheid hebben. Een user klasse kan volgens dit idee dus NOOIT zichzelf createn of getten uit een database. Een user klasse kan en mag eigenlijk zelfs niet weten hoe het opgeslagen wordt.

**Alternatieven?**

Er zijn natuurlijke ook alternatieven (en andere meningen). Bij het Active Record pattern worden de CRUD methodes wel opgenomen in de User klasse.

Active Record pattern is de manier die we momenteel gebruiken denk ik.

**Nuttige links:**

* [http://martinfowler.com/eaaCatalog/dataMapper.html](http://martinfowler.com/eaaCatalog/dataMapper.html)
* [http://nl.wikipedia.org/wiki/SOLID](http://nl.wikipedia.org/wiki/SOLID)
* [http://en.wikipedia.org/wiki/Single_responsibility_principle](http://en.wikipedia.org/wiki/Single_responsibility_principle)
* [http://stackoverflow.com/questions/6988111/understanding-the-domain-object-data-mapper-pattern](http://stackoverflow.com/questions/6988111/understanding-the-domain-object-data-mapper-pattern)
* [http://culttt.com/2014/06/18/whats-difference-active-record-data-mapper/](http://culttt.com/2014/06/18/whats-difference-active-record-data-mapper/)
