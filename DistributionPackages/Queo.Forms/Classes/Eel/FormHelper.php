<?php

namespace Queo\Forms\Eel;

use Neos\Eel\ProtectedContextAwareInterface;
use Queo\Forms\Service\FormService;


class FormHelper implements ProtectedContextAwareInterface
{
    /**
     * @var FormService
     */
    private $formService;

    public function __construct(
        FormService $formService
    )
    {
        $this->formService = $formService;
    }

    public function fetchForm($formId)
    {
        return $this->formService->fetchForm($formId);
    }

    /**
     * @param string $methodName
     * @return boolean
     */
    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
