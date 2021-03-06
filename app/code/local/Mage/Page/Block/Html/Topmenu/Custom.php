<?php
	class Mage_Page_Block_Html_Topmenu_Custom extends Mage_Page_Block_Html_Topmenu
	{
	    /**
	     * Returns array of menu item's classes
	     *
	     * @param Varien_Data_Tree_Node $item
	     * @return array
	     */
	    protected function _getMenuItemClasses(Varien_Data_Tree_Node $item)
	    {
	        $classes = array();

	        $classes[] = 'level' . $item->getLevel();
	        $classes[] = $item->getPositionClass();

	        if ($item->getIsFirst()) {
	            $classes[] = '';
	        }

	        if ($item->getIsActive()) {
	            $classes[] = 'active';
	        }

	        if ($item->getIsLast()) {
	            $classes[] = '';
	        }

	        if ($item->getClass()) {
	            $classes[] = $item->getClass();
	        }

	        if ($item->hasChildren()) {
	            $classes[] = 'dropdown';
	        }

	        return $classes;
	    }

	    protected function _getHtml(Varien_Data_Tree_Node $menuTree, $childrenWrapClass)
	    {
	        $html = '';

	        $children = $menuTree->getChildren();
	        $parentLevel = $menuTree->getLevel();
	        $childLevel = is_null($parentLevel) ? 0 : $parentLevel + 1;

	        $counter = 1;
	        $childrenCount = $children->count();

	        $parentPositionClass = $menuTree->getPositionClass();
	        $itemPositionClassPrefix = $parentPositionClass ? $parentPositionClass . '-' : 'nav-';

	        foreach ($children as $child) {

	            $child->setLevel($childLevel);
	            $child->setIsFirst($counter == 1);
	            $child->setIsLast($counter == $childrenCount);
	            $child->setPositionClass($itemPositionClassPrefix . $counter);

	            $outermostClassCode = '';
	            $outermostClass = $menuTree->getOutermostClass();

	            if ($childLevel == 0 && $outermostClass) {
	                $outermostClassCode = ' class="' . ($child->hasChildren() ? 'dropdown-toggle"' : '"');
	                $child->setClass($outermostClass);
	            }

	            $html .= '<li ' . $this->_getRenderedMenuItemAttributes($child) . '>';
	            $html .= '<a href="' . $child->getUrl() . '" ' . $outermostClassCode . '>'
	                . $this->escapeHtml($child->getName()) . ' ' . ($child->hasChildren() ? '<span class="caret"></span>' : '') . '</a>';

	            if ($child->hasChildren()) {
	                if (!empty($childrenWrapClass)) {
	                    $html .= '<div class="' . $childrenWrapClass . '">';
	                }
	                $html .= '<ul class="dropdown-menu" role="menu">';
	                $html .= $this->_getHtml($child, $childrenWrapClass);
	                $html .= '</ul>';

	                if (!empty($childrenWrapClass)) {
	                    $html .= '</div>';
	                }
	            }
	            $html .= '</li>';

	            $counter++;
	        }

	        return $html;
	    }
	}
?>