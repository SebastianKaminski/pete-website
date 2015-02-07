<?php

class CIR_Catalog_Model_Price_Observer
{
	public function __construct()
	{

	}

	public function calculate_radiator_price(Varien_Event_Observer $obs)
	{
	    // $customPrice = Mage::getSingleton(’core/session’)->getCustomPriceCalcuation(); // Provide you price i have set with session
	    $customPrice = 999;
	    $p = $obs->getQuoteItem();
	    $p->setCustomPrice($customPrice)->setOriginalCustomPrice($customPrice);
	}
}