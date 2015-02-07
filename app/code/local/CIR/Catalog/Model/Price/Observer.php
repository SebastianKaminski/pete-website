<?php

class CIR_Catalog_Model_Price_Observer
{
	public function __construct()
	{

	}

	public function calculate_radiator_price($observer)
	{
		$event = $observer->getEvent();
		$product = $event->getProduct();
		$product->setFinalPrice(999);
		return $this;
	}
}