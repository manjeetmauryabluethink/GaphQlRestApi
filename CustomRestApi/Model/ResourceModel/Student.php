<?php

namespace Bluethinkinc\CustomRestApi\Model\ResourceModel;

class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
    * Define resource model
    *
    * @return void
    */
    protected function _construct() {
    $this->_init('student_record_table', 'student_id'); 

    }
}