<?php


namespace Queo\Forms\Eel;

use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;

class FormHelper implements ProtectedContextAwareInterface
{

    /**
     * @Flow\InjectConfiguration("baseUrl")
     * @var string
     */
    protected $baseUrl;

    /**
     * @Flow\InjectConfiguration("requestHeaders")
     * @var array
     */
    protected $requestHeaders;

    public function fetchForm($formId)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET',  $this->baseUrl . '/forms/' . $formId . '.json', [
            'headers' => $this->requestHeaders
        ]);


        return "HALLO ICH WURDE AUFGERUFEN" . $response->getBody()->getContents();
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
