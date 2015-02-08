<?php

class CIR_Catalog_Model_Price_Observer
{
	public function apply_radiator_price($observer) {
		$event = $observer->getEvent();
		$product = $event->getProduct();   

		if ($product->getSuperProduct() && $product->getSuperProduct()->isConfigurable()) {
			// Not simple product here
		} else {
			// Simple product
			$params = Mage::app()->getFrontController()->getRequest()->getParams();
			$specialPrice = $params['number-of-sections'] * ($params['radiator-finish'] + $product->getPrice());
			$product->setFinalPrice($specialPrice);
		}

  		Mage::log($product->debug(), null, 'debug.log', true);
  		Mage::log(Mage::app()->getFrontController()->getRequest()->getParams(), null, 'debug.log', true);
  		
		return $this;	
	}
}