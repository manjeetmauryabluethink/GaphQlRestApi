<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\CustomRestApi\Api\Data;

/**
 * @api
 * @since 100.0.2
 */
interface StudentInterface 
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const STUDENT_ID               = 'student_id';
    const STU_NAME                 = 'stu_name';
    const STU_EMAIL                = 'stu_email';
    const MESSAGE                  = 'message';
    const CREATED_AT               = 'creation_time';
    const UPDATED_AT               = 'update_time';

    /**#@-*/

    /**
    * Get ID
    *
    * @return int|null
    */
    public function getStudentId();

     /**
     * Set ID
     *
     * @param int $student_id
     * @return \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface
     */
    public function setStudentId($student_id);

    /**
     * Get stu_name
     *
     * @return string|null
     */
    public function getStuName();

     /**
     * Set stu_name
     *
     * @param string $stu_name
     * @return \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface
     */
    public function setStuName($stu_name);

    /**
     * Get student email
     *
     * @return string
     */
    public function getStuEmail();

    /**
     * Set stu_email
     *
     * @param string $stu_email
     * @return \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface
     */
    public function setStuEmail($stu_email);

    /**
     * Get student message
     *
     * @return string
     */
    public function getMessage();

    /**
     * Set student message
     *
     * @param string $message
     * @return \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface
     */
    public function setMessage($message);

     /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Set creation time
     *
     * @param string $creation_time
     * @return \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface
     */
    public function setCreationTime($creation_time);

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Set update time
     *
     * @param string $update_time
     * @return \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface
     */
    public function setUpdateTime($update_time);
}
