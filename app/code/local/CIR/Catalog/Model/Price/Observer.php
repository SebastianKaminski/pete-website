<?php

class CIR_Catalog_Model_Price_Observer
{
	public function applyRadiatorPrice($observer) {
		// Quote item
		$item = $observer->getQuoteItem();
		// Product
		$product = $item->getProduct();

		// Is Radiator?
		if ($product->getAttributeText('item_type') == "Radiator") {
			$params = Mage::app()->getFrontController()->getRequest()->getParams();
			if (isset($params['number-of-sections']) && isset($params['radiator-finish-cost'])) {
				$specialPrice = $params['number-of-sections'] * ($params['radiator-finish-cost'] + $product->getPrice());
				$item->setOriginalCustomPrice($specialPrice);
				$item->setFinalPrice($specialPrice);
				$product->setIsSuperMode(true);
			}
		}

  		Mage::log("Special price = ".$specialPrice.", product = ".$product->getPrice(), null, 'debug.log', true);
  		Mage::log(Mage::app()->getFrontController()->getRequest()->getParams(), null, 'debug.log', true);

		return $this;	
	}
}