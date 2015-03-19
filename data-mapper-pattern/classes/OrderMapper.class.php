<?php

include_once("Database.class.php");
include_once("iOrder.class.php");
include_once("Order.class.php");
include_once("OrderMapperInterface.class.php");


// Deze klasse heeft als taak "communiceren" tussen storage (PDO in dit geval) en het Order Domain object
// Meer info over mapper-pattern: http://martinfowler.com/eaaCatalog/dataMapper.html
// De klasse "Order" heeft maar één taak en mag ook maar één taak hebben en dat is data vasthouden. 
// Hoe of waar de data opgeslagen wordt weet deze klasse niet en mag deze klasse ook niet weten. 
// In welke klassen zorgen we dan wel voor het opslaan van data? --> De OrderMapper klasse. Data-Mapper-Pattern == TOP OOP! (naar mijn mening)
// als je echt OOP schrijft volg je het "single responsibility principe". 
// Order class mag dus maar één verantwoordelijkheid hebben. http://en.wikipedia.org/wiki/Single_responsibility_principle 
// Een alternatief voor het mapper pattern is het Active record pattern maar daar ben ik geen fan van, het is wel een alternatief.
class OrderMapper implements OrderMapperInterface {
	
	// Maakt een Order object van een array
	public function populate(array $data) {

		$Order = new Order();
		$Order->Name = $data['name'];
		$Order->HowMany = $data['howmany'];
		$Order->Destination = $data['destination'];

		return $Order;
	}

	// crud functies --> spreekt voor zich
	public function create(iOrder $Order) {
		// this function should save an order to the database
		$sql = "INSERT INTO ooptblorders_v8
				VALUES(
					'',
					:name,
					:amount,
					:totalprice,
					:destination
				)";
			
		// Beter DI gebruiken vind ik persoonlijk. --> Later nog aanpassen dus
		$q = Database::getInstance()->prepare($sql);

		return $q->execute(array(
			':name' => $Order->Name,
			':amount' => $Order->HowMany,
			':totalprice' => $Order->CalculateTotalCost($Order->Destination, $Order->HowMany),
			':destination' => $Order->Destination
		));		
	}

	public function getAll() {
		$sql = "SELECT id, name, howmany, totalprice, destination
					FROM ooptblorders_v8;";

			$q = Database::getInstance()->prepare($sql);

			$q->execute(array());

			$res = $q->fetchAll();

			$orders = [];

			foreach($res as $r) {
				$orders[] = $this->populate($r);
			}

		return $orders;
	}

	public function getOne() {

	}

	public function update(iOrder $Order) {

	}

	public function delete() {

	}
}