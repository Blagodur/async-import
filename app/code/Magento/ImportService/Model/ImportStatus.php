<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\ImportService\Model;

use Magento\ImportService\Api\ImportStatusInterface;
use Magento\ImportService\Api\Data\ImportStatusResponseInterface;
use Magento\ImportService\Model\ImportStatusResponseItemFactory;

/**
 * Class Import
 *
 * @package Magento\ImportService\Model
 */
class ImportStatus implements ImportStatusInterface
{
	/**
     * @var ImportStatusResponse
     */
    private $responseFactory;

    /**
     * @var ImportStatusResponseItem
     */
    private $responseItemFactory;

    /**
     * Status constructor.
     * @param ImportStatusResponseFactory $responseFactory
     * @param ImportStatusResponseItemFactory $responseItemFactory
     */
    public function __construct(
        ImportStatusResponseFactory $responseFactory,
        ImportStatusResponseItemFactory $responseItemFactory
    ) {
        $this->responseFactory = $responseFactory;
        $this->responseItemFactory = $responseItemFactory;
    }

    /**
     * @param string $uuid
     * @return ImportStatusResponseFactory
     */
    public function execute(string $uuid)
    {
        // Create new response object
        $response = $this->responseFactory->create();

        try
        {
            // Set the required response parameters with appropriate details
            $response->setStatus(ImportStatusResponseInterface::STATUS_COMPLETED)
                ->setUuid($uuid)
                ->setEntityType('catalog_product')
                ->setUserId(null)
                ->setUserType(null);

            // Create sample response item object
            $item = $this->responseItemFactory->create();
            $item->setUuid($uuid)
                ->setStatus("")
                ->setSerializedData("")
                ->setResultSerializedData("")
                ->setErrorCode("")
                ->setResultMessage("");

            // Set sample response items as an array
            $response->setItems([$item]);
        } catch (\Exception $e) {
            $response = $this->responseFactory->createFailure($e->getMessage());
        }

        return $response;
    }
}
