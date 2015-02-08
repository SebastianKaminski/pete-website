<?php

class CIR_Catalog_Model_Price_Observer
{
	public function applyRadiatorPrice($observer) {
		$product = $observer->getQuoteItem();

		// if ($product->getSuperProduct() && $product->getSuperProduct()->isConfigurable()) {
		// 	// Not simple product here
		// } else {
			// Simple product
		$product->setOriginalCustomPrice($product->getRadiatorPrice($product));
		$product->setFinalPrice($product->getRadiatorPrice($product));
		// }

  		// Mage::log($product->debug(), null, 'debug.log', true);

		return $this;	
	}

	protected function getRadiatorPrice(Mage_Sales_Model_Quote_Item $product) {
		$params = Mage::app()->getFrontController()->getRequest()->getParams();
		$price = $params['number-of-sections'] * ($params['radiator-finish'] + $product->getPrice());

  		Mage::log("Special price = ".$price.", product price = ".$product->getPrice(), null, 'debug.log', true);
  		Mage::log($params, null, 'debug.log', true);

		return $price;
	}

}