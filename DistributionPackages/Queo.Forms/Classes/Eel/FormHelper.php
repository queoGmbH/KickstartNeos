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
        $formData =  $this->formService->fetchForm($formId);

        //todo validate structure
        return $formData['data']['form'];
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
