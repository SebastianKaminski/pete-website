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


class Magpleasure_Pinterest_Model_System_Config_Source_Type extends Mage_Core_Block_Template
{
    protected function _helper()
    {
        return Mage::helper('mppinterest');
    }

    public function toOptionArray()
    {
        return array(
            array('value'=>'horizontal', 'label'=> $this->_helper()->__("Beside")),
            array('value'=>'vertical', 'label'=> $this->_helper()->__("Above")),
            array('value'=>'none', 'label'=> $this->_helper()->__("None")),
        );
    }
}