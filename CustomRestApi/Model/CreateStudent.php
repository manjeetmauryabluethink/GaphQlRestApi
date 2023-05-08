<?php

declare(strict_types=1);

namespace Bluethinkinc\CustomRestApi\Model;

use Bluethinkinc\CustomRestApi\Api\StudentRepositoryInterface;
use Bluethinkinc\CustomRestApi\Api\Data\StudentInterface;
use Bluethinkinc\CustomRestApi\Api\Data\StudentInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\Reflection\DataObjectProcessor;

/**
 * Create new customer account
 */
class CreateStudent
{
    /**
     * @var DataObjectHelper
     */
    private DataObjectHelper $dataObjectHelper;

    /**
     * @var StudentInterfaceFactory
     */
    private StudentInterfaceFactory $studentFactory;

    /**
     * @var StudentRepositoryInterface
     */
    private StudentRepositoryInterface $studentRepository;

    /**
     * @var DataObjectProcessor
     */
    private $dataObjectProcessor;

    /**
     * CreateCustomerAccount constructor.
     *
     * @param DataObjectHelper $dataObjectHelper
     * @param StudentInterfaceFactory $studentFactory
     * @param StudentRepositoryInterface $studentRepository
     * @param DataObjectProcessor $dataObjectProcessor
     */
    public function __construct(
        DataObjectHelper $dataObjectHelper,
        StudentInterfaceFactory $studentFactory,
        StudentRepositoryInterface $studentRepository,
        DataObjectProcessor $dataObjectProcessor
    ) {
        $this->dataObjectHelper = $dataObjectHelper;
        $this->studentFactory = $studentFactory;
        $this->studentRepository = $studentRepository;
        $this->dataObjectProcessor = $dataObjectProcessor;
    }

    /**
     * Create new Subscription
     *
     * @param array $data
     * @return StudentInterface
     * @throws GraphQlInputException
     */
    public function execute(array $data): StudentInterface
    {
        try {
            $subscription = $this->createSubscription($data);
        } catch (LocalizedException $e) {
            throw new GraphQlInputException(__($e->getMessage()));
        }
        return $subscription;
    }

    /**
     * Create Subscription
     *
     * @param array $data
     * @return StudentInterface
     * @throws LocalizedException
     * @throws GraphQlInputException
     */
    private function createSubscription(array $data): StudentInterface
    {
        $subscriptionDataObject = $this->studentFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $subscriptionDataObject,
            $data,
            StudentInterface::class
        );
        try {
            $this->studentRepository->save($subscriptionDataObject);
        } catch (LocalizedException $e) {
            throw new GraphQlInputException(__($e->getMessage()), $e);
        }
        return $subscriptionDataObject;
    }
}
