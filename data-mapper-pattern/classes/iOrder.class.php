<?php
	interface iOrder
	{

		public function __set($p_sProperty, $p_vValue);
		public function __get($p_sProperty);
		public function CalculateTotalCost($p_sCountry, $p_iAmount);
	}