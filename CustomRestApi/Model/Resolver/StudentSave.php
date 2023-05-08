<?php
/**
 * @author Mohit Patel
 * @copyright Copyright (c) 2021
 * @package Mag_ContactUs
 */

namespace Bluethinkinc\CustomRestApi\Model\Resolver;

use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Bluethinkinc\CustomRestApi\Model\ResourceModel\Student as ResourceBlock;
use Bluethinkinc\CustomRestApi\Model\CreateStudent;
use Bluethinkinc\CustomRestApi\Api\Data\StudentInterface;



class StudentSave implements ResolverInterface
{
    /**
     * @var CreateStudent
     */
    public CreateStudent $createStudent;

    /**
     * @param CreateStudent $createStudent
     */
    public function __construct(
        CreateStudent $createStudent
    ) {
        $this->createStudent = $createStudent;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ) : StudentInterface {

        return $this->createStudent->execute($args['input']);
    }
}