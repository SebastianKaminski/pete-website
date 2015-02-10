<?php

class CIR_Catalog_Model_Observer
{
	public function __construct()
	{

	}

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