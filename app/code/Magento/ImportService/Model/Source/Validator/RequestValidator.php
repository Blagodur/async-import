<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\ImportService\Model\Source\Validator;

use Magento\ImportService\Api\Data\SourceInterface;
use Magento\ImportService\ImportServiceException;

/**
 * Class RequestValidator
 */
class RequestValidator implements ValidatorInterface
{
    /**
     * return error messages in array
     *
     * @param SourceInterface $source
     * @throws ImportServiceException
     * @return []
     */
    public function validate(SourceInterface $source)
    {
        $errors = [];

        if (!$source->getSourceType()) {
            $errors[] = __('%1 cannot be empty', SourceInterface::SOURCE_TYPE);
        }

        if (!$source->getImportData()) {
            $errors[] = __('%1 cannot be empty', SourceInterface::IMPORT_DATA);
        }

        return $errors;
    }
}
