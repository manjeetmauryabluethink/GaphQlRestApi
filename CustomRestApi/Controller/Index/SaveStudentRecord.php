<?php

namespace Bluethinkinc\CustomRestApi\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Bluethinkinc\CustomRestApi\Model\StudentRepository;

class SaveStudentRecord extends \Magento\Framework\App\Action\Action 
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     * 
     */

    protected $resultPageFactory;
    /**
     * @param PageFactory $resultPageFactory
     */
    
     protected $studentRepository;
     /**
      * @param StudentRepository $studentRepository
      */

    public function __construct(PageFactory $resultPageFactory,
    Context $context,
    StudentRepository $studentRepository
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->studentRepository = $studentRepository;

    }

    /**
     * Prints the information 
     * @return Student
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $this->studentRepository->save();
        return $this->resultPageFactory->create();
    }

   
}