<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethinkinc\CustomRestApi\Model;

use Bluethinkinc\CustomRestApi\Api\Data\StudentSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

/**
 * Service Data Object with student search results.
 */
class StudentSearchResults extends SearchResults implements StudentSearchResultsInterface
{
}
