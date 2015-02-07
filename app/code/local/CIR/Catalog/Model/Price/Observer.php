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

	public function catalogProductLoadAfter(Varien_Event_Observer $observer)
	{
		$action = Mage::app()->getFrontController()->getAction();
		if ($action->getFullActionName() == 'checkout_cart_add')
		{
			$options = $action->getRequest()->getParam('extra_options');
			Mage:log($options);
		}
	}
}