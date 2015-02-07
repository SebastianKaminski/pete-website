<?php

class CIR_Catalog_Model_Price_Observer
{
	public function __construct()
	{

	}

	public function calculate_radiator_price($observer)
	{
		$event = $observer->getEvent();
		$quote_item = $event->getQuoteItem();
		$new_price = 999;
		$quote_item->setOriginalCustomPrice($new_price);
		$quote_item->save();
	}
}