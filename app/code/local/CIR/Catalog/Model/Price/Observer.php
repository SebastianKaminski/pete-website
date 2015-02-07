<?php

class CIR_Catalog_Model_Price_Observer
{
	public function __construct()
	{

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