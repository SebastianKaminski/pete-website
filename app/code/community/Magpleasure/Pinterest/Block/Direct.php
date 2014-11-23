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
class Magpleasure_Pinterest_Block_Direct extends Mage_Core_Block_Template
{
    protected function _isDirectEnabled()
    {
        return Mage::getStoreConfig('mppinterest/display/place') == 'direct';
    }

    protected function _toHtml()
    {
        if ($this->_isDirectEnabled()){
            return $this->getLayout()->getBlock('mppinterest.original')->toHtml();
        }
        return false;
    }
}
