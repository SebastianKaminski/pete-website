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
				$item->setName('Test radiator name');
				$item->save();
				$product->setIsSuperMode(true);
				$item->getQuote()->save();
			}
		}

  		// Mage::log(Mage::app()->getFrontController()->getRequest()->getParams(), null, 'debug.log', true);
  		// Mage::log($product->debug(), null, 'debug.log', true);
  		// Mage::log("Test, sections".$product->getSections(), null, 'debug.log', true);

		return $this;
	}

	public function setNumberOfSections(Varien_Event_Observer $observer) {
		Mage::log(" ========== setNumberOfSections ==========", null, 'debug.log', true);
		$item = $observer->getQuoteItem();
		$product = $observer->getProduct();
		$item->setSections(12);
		return $this;		
	}
}