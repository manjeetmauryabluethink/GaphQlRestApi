<?php

namespace Bluethinkinc\CustomRestApi\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;
use Bluethinkinc\CustomRestApi\Api\Data\StudentInterface;

/**
 * Class File
 * @package Bluethinkinc\CustomRestApi\Model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Student extends AbstractModel implements StudentInterface, IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'student_record_table_cache';

    /**
     * Post Initialization
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Bluethinkinc\CustomRestApi\Model\ResourceModel\Student');
    }


     /**
     * @inheritdoc
     */
    public function getStudentId()
    {
        return $this->getData(self::STUDENT_ID);
    }

    /**
     * @inheritdoc
     */
    public function setStudentId($student_id)
    {
        return $this->setData(self::STUDENT_ID, $student_id);
    }

     /**
     * @inheritdoc
     */
    public function getStuName()
    {
        return $this->getData(self::STU_NAME);
    }
    
     /**
     * @inheritdoc
     */
    public function  setStuName($stu_name)
    {
        return $this->setData(self::STU_NAME, $stu_name);
    }

     /**
     * @inheritdoc
     */
    public function getStuEmail()
    {
        return $this->getData(self::STU_EMAIL);
    }

     /**
     * @inheritdoc
     */
    public function  setStuEmail($stu_email)
    {
        return $this->setData(self::STU_EMAIL, $stu_email);
    }

    /**
     * @inheritdoc
     */
    public function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }

     /**
     * @inheritdoc
     */
    public function  setMessage($message)
    {
        return $this->setData(self::MESSAGE, $message);
    }

     /**
     * @inheritdoc
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATED_AT);
    }

     /**
     * @inheritdoc
     */
    public function  setCreationTime($creation_time)
    {
        return $this->setData(self::CREATED_AT, $creation_time);
    }

     /**
     * @inheritdoc
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATED_AT);
    }

     /**
     * @inheritdoc
     */
    public function  setUpdateTime($update_time)
    {
        return $this->setData(self::UPDATED_AT, $update_time);
    }


    /**
     * Return identities
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getStudentId()];
    }
}
