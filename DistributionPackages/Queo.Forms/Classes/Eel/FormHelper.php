<?php


namespace Queo\Forms\Eel;


use Neos\Eel\ProtectedContextAwareInterface;

class FormHelper implements ProtectedContextAwareInterface
{
    public function fetchForm($formId)
    {
        return "HALLO ICH WURDE AUFGERUFEN";
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
