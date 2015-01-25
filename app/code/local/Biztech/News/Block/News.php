<?php
class Biztech_News_Block_News extends Mage_Core_Block_Template
{
	public function _prepareLayout()
        {

            return parent::_prepareLayout();
        }

        public function getNews()     
        { 
                       
            
            $store  = Mage::app()->getStore()->getId();
            $news = Mage::getModel("news/news");
            $newsId = $this->getRequest()->getParam("id");
            $news->load($newsId,"news_id");

            $model_text  = Mage::getModel('news/newsdata')->getCollection()->addFieldToFilter('store_id',$store)->addFieldToFilter('news_id',$newsId)->getData();
            $text_data = $model_text[0];
            $news = $news->setTitle($text_data['title'])
            ->setNewsContent($text_data['news_content'])
            ->setStatus($text_data['status'])
            ->setIntro($text_data['intro'])
            ->setDateToPublish($text_data['date_to_publish'])
            ->setDateToUnpublish($text_data['date_to_unpublish'])
            ->setBrowserTitle($text_data['browser_title'])
            ->setSeoKeywords($text_data['seo_keywords'])
            ->setSeoDescription($text_data['seo_description']);

            $this->setData('news',$news);
            
            return $news;

          

        }

        protected function _beforeToHtml()
        {
            Mage::helper('news/toolbar')->create($this, array(
                    'default_order' => 'created_time',
                    'dir' => 'asc',
                    'limits' => Mage::helper('news')->commentsPerPage(),
                )
            );

            return $this;
        }

        public function getPreparedCollection()
        {
            return $this->_prepareCollection();
        }
        protected function _prepareCollection()
        {
            
            
            $collection = Mage::helper('news')->getNewsCollection();
            $collection->setPageSize(10);

            if ($this->getRequest()->getParam('p') > 0)
                $collection->setCurPage($this->getRequest()->getParam('p'));

            $this->setData('cached_collection', $collection);


            return $this->getData('cached_collection');
        }

}