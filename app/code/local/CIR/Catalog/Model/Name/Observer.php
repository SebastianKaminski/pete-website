<?php

class CIR_Catalog_Model_Name_Observer
{
	public function applyRadiatorName($observer) {
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
			if (isset($params['number-of-sections'])) {
				Mage::log(" ========== applyRadiatorName ==========", null, 'debug.log', true);
				$product->setIsSuperMode(true);
				$item->setName('Test radiator name');
			}
		}

  		Mage::log(Mage::app()->getFrontController()->getRequest()->getParams(), null, 'debug.log', true);
  		Mage::log($product->debug(), null, 'debug.log', true);

		return $this;
	}
}