<?php

class CIR_Catalog_Model_Name_Observer
{
	public function applyRadiatorName($observer) {
		// Quote item
		$item = $observer->getQuoteItem();
		// Product
		$product = $item->getProduct();
		// Is radiator?
		if ($product->getAttributeText('item_type') == "Radiator") {
			$params = Mage::app()->getFrontController()->getRequest()->getParams();
			if (isset($params['number-of-sections'])) {
				$item->setName('Test radaitor name');
			}
		}

  		// Mage::log("Special price = ".$specialPrice.", product = ".$product->getPrice(), null, 'debug.log', true);
  		Mage::log(Mage::app()->getFrontController()->getRequest()->getParams(), null, 'debug.log', true);
  		Mage::log($product->debug(), null, 'debug.log', true);

		return $this;
	}
}