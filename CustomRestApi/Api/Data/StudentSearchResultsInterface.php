<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Bluethinkinc\CustomRestApi\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for cms page search results.
 * @api
 * @since 100.0.2
 */
interface StudentSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get student list.
     *
     * @return \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface[]
     */
    public function getItems();

    /**
     * Set student list.
     *
     * @param \Bluethinkinc\CustomRestApi\Api\Data\StudentInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
