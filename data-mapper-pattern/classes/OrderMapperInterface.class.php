<?php

include_once("iOrder.class.php");

interface OrderMapperInterface
{
	public function populate(array $data);
	public function create(iOrder $order);
	public function getAll();
	public function getOne();
	public function update(iOrder $order);
	public function delete();
}