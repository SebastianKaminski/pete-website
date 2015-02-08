<?php

class CIR_Catalog_Model_Price_Observer
{
	public function applyRadiatorPrice($observer) {
		// Quote item
	    $item = $observer->getQuoteItem();
	    if ($item->getParentItem()) {
	        $item = $item->getParentItem();
	    }	
		// Product
		$product = $item->getProduct();
		if ($product->getTypeId() == 'cofigurable') {
		    return $this;
		}		
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

		return $this;	
	}
}
