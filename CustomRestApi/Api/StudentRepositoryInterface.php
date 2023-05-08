<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\CustomRestApi\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Student  CRUD interface.
 * @api
 * @since 100.0.2
 */
interface StudentRepositoryInterface
{
    /**
     * Save student.
     *
     * @param \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface $block
     * @return \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\Bluethinkinc\CustomRestApi\Api\Data\StudentInterface $block);

    /**
     * Retrieve student.
     *
     * @param int $studentId
     * @return \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($studentId);

    /**
     * Retrieve student matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Bluethinkinc\CustomRestApi\Api\Data\StudentSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete student.
     *
     * @param \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface $student
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Bluethinkinc\CustomRestApi\Api\Data\StudentInterface $student);

    /**
     * Delete student by ID.
     *
     * @param int $studentId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($studentId);
}
