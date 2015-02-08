<?php

class CIR_Catalog_Model_Price_Observer
{
	public function applyRadiatorPrice($observer) {
		$product = $observer->getQuoteItem();

		// if ($product->getSuperProduct() && $product->getSuperProduct()->isConfigurable()) {
		// 	// Not simple product here
		// } else {
			// Simple product
		$params = Mage::app()->getFrontController()->getRequest()->getParams();
		$specialPrice = $params['number-of-sections'] * ($params['radiator-finish'] + $product->getPrice());
		$product->setOriginalCustomPrice($specialPrice);
		$product->setFinalPrice($specialPrice);
		// }

  		Mage::log("Special price = ".$specialPrice.", product = ".$product->getPrice(), null, 'debug.log', true);
  		// Mage::log($product->debug(), null, 'debug.log', true);
  		Mage::log(Mage::app()->getFrontController()->getRequest()->getParams(), null, 'debug.log', true);

		return $this;	
	}
}