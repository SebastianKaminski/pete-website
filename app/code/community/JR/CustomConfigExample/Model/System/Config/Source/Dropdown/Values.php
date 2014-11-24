<?php

class JR_CustomConfigExample_Model_System_Config_Source_Dropdown_Values
{
    public function toOptionArray()
    {
        return array(
            array(
                'value' => 'no',
                'label' => 'No',
            ),
            array(
                'value' => 'yes',
                'label' => 'Yes',
            ),
        );
    }
}