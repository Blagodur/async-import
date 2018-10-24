<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\ImportRest\Api;

/**
 * Class ImportProcessor
 *
 * @package Magento\ImportRest\Model
 */
interface ImportProcessorInterface
{

    /**
     * Run import.
     *
     * @param \Magento\ImportRest\Api\Data\ImportEntryInterface $importEntry
     * @return bool
     */
    public function executeImport($importEntry);
}
