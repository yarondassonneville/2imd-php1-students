<?php
	include_once("iOrder.class.php");

	class Order implements iOrder
	{
		private $m_sName;			// John Doe
		private $m_iHowMany; 		// 5
		private $m_sDestination;	// nl

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) {
				case 'Name':
					$this->m_sName = $p_vValue;
					break;
				
				case 'HowMany':
					if($p_vValue > 0) {
						$this->m_iHowMany = $p_vValue;
					}
					else {
						throw new Exception("Aantal stuks moet altijd groter dan nul zijn!");
					}
					
					break;

				case 'Destination':
					$this->m_sDestination = $p_vValue;
					break;				
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case 'Name':
					return($this->m_sName);
					break;

				case 'HowMany':
					return($this->m_iHowMany);
					break;

				case 'Destination':
					return($this->m_sDestination);
					break;
			}
		}

		public function CalculateTotalCost($p_sCountry, $p_iAmount)
		{
			// this function should calculate your total cost, with tax depending on the destination (nl = 19%, be = 21%)
			switch ($p_sCountry) {
				case 'nl':
					return ($p_iAmount * 10) * 1.19;
					break;
				case 'be':
					return ($p_iAmount * 10) * 1.21;
					break;
				
				default:
					throw new Exception("Geen informatie over het gekozen land: " . $p_sCountry);
					break;
			}
		}
	}


?>