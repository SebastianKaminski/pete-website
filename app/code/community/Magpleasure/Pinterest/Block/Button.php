<?php

/**
 * MagPleasure Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.magpleasure.com/LICENSE.txt
 *
 * @category   Magpleasure
 * @package    Magpleasure_Pinterest
 * @copyright  Copyright (c) 2011-2014 MagPleasure Ltd. (http://www.magpleasure.com)
 * @license    http://www.magpleasure.com/LICENSE.txt
 */
class Magpleasure_Pinterest_Block_Button extends Mage_Core_Block_Template
{

    public function canShow()
    {
        return (!!$this->getProduct());
    }

    /**
     * Product
     *
     * @return Mage_Catalog_Model_Product
     */
    public function getProduct()
    {
        if ($product = Mage::registry('current_product')) {
            return $product;
        }
        return false;
    }

    /**
     * Retrieves Canonical Url
     *
     * @return string
     */
    public function getCanonicalUrl()
    {
        $params = array();
        if (Mage::helper('catalog/product')->canUseCanonicalTag()) {
            $params = array('_ignore_category' => true);
        }
        /** @var Mage_Catalog_Model_Product $product */
        $product = $this->getProduct();
        return $product->getUrlModel()->getUrl($product, $params);
    }

    public function getProductUrl()
    {
        return urlencode($this->getCanonicalUrl());
    }

    public function getAddPrice()
    {
        return $this->htmlEscape(Mage::getStoreConfig('mppinterest/general/add_price'));
    }

    public function getButtonType()
    {
        switch ($this->htmlEscape(Mage::getStoreConfig('mppinterest/general/button_type'))) {
            case "vertical":
                return "above";
            case "horizontal":
                return "beside";
            case "none":
                return "none";
        }
    }

    public function showZeroCount()
    {
        $displayed = $this->htmlEscape(Mage::getStoreConfig('mppinterest/general/button_type'));
        if ("vertical" === $displayed || "horizontal" === $displayed) {
            return "data-pin-zero='true'";
        }
        return "";
    }

    public function addCssClass() {
        $displayed = $this->htmlEscape(Mage::getStoreConfig('mppinterest/general/button_type'));
        if ("vertical" === $displayed) {
            return "class='pin-it-button'";
        }
        return "";
    }

    public function getShortDescription()
    {
        $shortDescription = strip_tags($this->getProduct()->getShortDescription());
        if ($this->getAddPrice()) {
            $price = str_replace("USD", "$", Mage::app()->getStore()->formatPrice($this->getProduct()->getFinalPrice(), false));
            $shortDescription = trim($shortDescription) . $this->__(" Price %s", $price);
        }
        return urlencode($shortDescription);
    }

    public function getPinItUrl()
    {
        $productUrl = $this->getProductUrl();
        $shortDescription = $this->getShortDescription();
        $imageUrl = urlencode($this->helper('catalog/image')->init($this->getProduct(), 'image')->__toString());
        $url = "http://pinterest.com/pin/create/button/?url={$productUrl}&media={$imageUrl}&description={$shortDescription}";
        return $url;
    }
}
