<?php

class CIR_Catalog_Model_Price_Observer
{
	public function apply_radiator_price($observer) {
		$event = $observer->getEvent();
		$product = $event->getProduct();   
  		Mage::log(Mage::app()->getFrontController()->getRequest()->getParams(), null, 'debug.log', true);
		return $this;	
	}
}