<?php

class CIR_Catalog_Model_Observer
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
<<<<<<< HEAD

    public function checkoutCartProductAddAfter(Varien_Event_Observer $observer)
    {
        $item = $observer->getEvent()->getQuoteItem();
        $item->setData('custom_attribute_column', 'the value');
        $item->save();

        return $this;
    }

	public function calculate_radiator_price(Varien_Event_Observer $observer)
	{
	    $customPrice = 999;
	    $p = $observer->getQuoteItem();
	    $p->setCustomPrice($customPrice)->setOriginalCustomPrice($customPrice);
	}

	public function setKozaAttribute(Varien_Event_Observer $observer)
	{
        $item = $observer->getQuoteItem();
        Zend_Debug::dump($item);
        $product = $observer->getProduct();
        $item->setKoza($product->getKoza());
        return $this;
	}
}
=======
}
>>>>>>> f75c41d4e1e12a5ae421bcdb8821f5e15add6c1c
