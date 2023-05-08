<?php
declare(strict_types=1);

namespace Bluethinkinc\CustomRestApi\Model\ResourceModel\Student;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
    * @var string
    */
    protected $_idFieldName = 'student_id';
    /**
    * Define resource model
    *
    * @return void
    */
    protected function _construct() {
    $this->_init(
    \Bluethinkinc\CustomRestApi\Model\Student::class,
    \Bluethinkinc\CustomRestApi\Model\ResourceModel\Student::class 
);
    }
}
