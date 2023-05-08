<?php
/**
 * @author Bluethinkinc 
 * @copyright Copyright (c) 2021
 * @package Bluethinkinc
 */

namespace Bluethinkinc\CustomRestApi\Model\Resolver;

use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlAuthorizationException;
use Magento\Framework\GraphQl\Exception\GraphQlNoSuchEntityException;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;
use Magento\Framework\GraphQl\Query\Resolver\Value;
use Magento\Framework\GraphQl\Query\Resolver\ValueFactory;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Bluethinkinc\CustomRestApi\Model\StudentFactory;

/**
 * Students field resolver, used for GraphQL request processing.
 */

class Student implements ResolverInterface
{
    /**
     * @var ValueFactory
     */
    private $valueFactory;

    /**
     * @var studentFactory
     */
    private $studentFactory;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    private $logger;

    /**
     *
     * @param ValueFactory $valueFactory
     * @param studentFactory $studentFactory
     */
    public function __construct(
        ValueFactory $valueFactory,
        StudentFactory $studentFactory,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->valueFactory = $valueFactory;
        $this->studentFactory = $studentFactory;
        $this->logger = $logger;
    }

    /**
     * @param Field $field
     * @param [type] $context
     * @param ResolveInfo $info
     * @param array|null $value
     * @param array|null $args
     * @return array
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (!isset($args['stuEmail'])) {
            throw new GraphQlAuthorizationException(
                __(
                    'email for student should be specified'
                )
            );
        }
        try {
            $data = $this->getstudentData($args['stuEmail']);
            $result = function () use ($data) {
                return !empty($data) ? $data : [];
            };
            return $this->valueFactory->create($result);
        } 
        catch (NoSuchEntityException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        }
         catch (LocalizedException $exception) {
            throw new GraphQlNoSuchEntityException(__($exception->getMessage()));
        }
    }

    /**
     *
     * @param int $context
     * @return array
     * @throws NoSuchEntityException|LocalizedException
     */
    private function getstudentData($studentEmail) : array
    {
        try {
            $studentData = [];
            $studentColl = $this->studentFactory->create()->getCollection()->addFieldToFilter('stu_email', ['eq'=>$studentEmail]);
            foreach ($studentColl as $student) {
                array_push($studentData, $student->getData());
            }
            return isset($studentData[0])?$studentData[0]:[];
        } catch (NoSuchEntityException $e) {
            return [];
        } catch (LocalizedException $e) {
            throw new NoSuchEntityException(__($e->getMessage()));
        }
    }
}
