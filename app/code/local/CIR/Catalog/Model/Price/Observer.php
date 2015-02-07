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

	public function catalog_product_load_after(Varien_Event_Observer $observer)
	{
		$action = Mage::app()->getFrontController()->getAction();
		if ($action->getFullActionName() == 'checkout_cart_add')
		{
		    if ($options = $action->getRequest()->getParam('extra_options'))
		    {
		        $product = $observer->getProduct();

		        $additionalOptions = array();
		        if ($additionalOption = $product->getCustomOption('additional_options'))
		        {
		            $additionalOptions = (array) unserialize($additionalOption->getValue());
		        }
		        foreach ($options as $key => $value)
		        {
		            $additionalOptions[] = array(
		                'label' => $key,
		                'value' => $value,
		            );
		        }
		        // add the additional options array with the option code additional_options
		        $observer->getProduct()->addCustomOption('additional_options', serialize($additionalOptions));
		    }
		}
	}

	public function sales_convert_quote_item_to_order_item(Varien_Event_Observer $observer)
	{
	    $quoteItem = $observer->getItem();
	    if ($additionalOptions = $quoteItem->getOptionByCode('additional_options')) {
	        $orderItem = $observer->getOrderItem();
	        $options = $orderItem->getProductOptions();
	        $options['additional_options'] = unserialize($additionalOptions->getValue());
	        $orderItem->setProductOptions($options);
	    }
	}
}