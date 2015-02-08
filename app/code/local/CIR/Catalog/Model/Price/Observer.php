<?php

class CIR_Catalog_Model_Price_Observer
{
	public function applyRadiatorPrice($observer) {
		// Quote item
		$item = $observer->getQuoteItem();
		// Product
		$product = $item->getProduct();

		// if ($product->getSuperProduct() && $product->getSuperProduct()->isConfigurable()) {
		// 	// Not simple product here
		// } else {
			// Simple product
		$params = Mage::app()->getFrontController()->getRequest()->getParams();
		$specialPrice = $params['number-of-sections'] * ($params['radiator-finish'] + $product->getPrice());
		$item->setOriginalCustomPrice($specialPrice);
		$item->setFinalPrice($specialPrice);
		$product->setIsSuperMode(true);
		// }

  		Mage::log("Special price = ".$specialPrice.", product = ".$product->getPrice(), null, 'debug.log', true);
  		// Mage::log($product->debug(), null, 'debug.log', true);
  		Mage::log(Mage::app()->getFrontController()->getRequest()->getParams(), null, 'debug.log', true);

		return $this;	
	}
}