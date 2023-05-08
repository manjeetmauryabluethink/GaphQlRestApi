<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\CustomRestApi\Block;

use Magento\Framework\View\Element\Template;

class Student extends Template
{
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(Template\Context $context ,array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * Returns action url for contact form
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('student/index/saveStudentRecord', ['_secure' => true]);
    }    
}

