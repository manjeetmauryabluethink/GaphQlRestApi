<?php

namespace Bluethinkinc\CustomRestApi\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Student extends \Magento\Framework\App\Action\Action 
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     * 
     */

    protected $resultPageFactory;
    /**
     * @param PageFactory $resultPageFactory
     */

    public function __construct(PageFactory $resultPageFactory,Context $context) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Prints the information 
     * @return Student
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }

   
}