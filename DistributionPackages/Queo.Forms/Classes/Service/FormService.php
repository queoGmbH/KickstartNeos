<?php


namespace Queo\Forms\Service;

use GuzzleHttp\Client;
use Neos\Flow\Annotations as Flow;
use Psr\Http\Message\ResponseInterface;

class FormService
{
    /**
     * @var Client
     */
    private $client;

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

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function fetchForm(int $formId): array
    {
        return $this->authorisedRequest('GET', '/forms/' . $formId . '.json');
    }

    public function fetchUniqueHash(): string
    {
        $response = $this->authorisedRequest('GET', '/unique_hash/generate.json');

        //todo check response
        return $response['data']['unique_hash']['hash'];
    }

    public function postForm(int $client, int $campaign, int $form, string $uniqueHash, array $params): array
    {
        $options = [
            'form_params' => [
                'client' => $client,
                'campaign' => $campaign,
                'form' => $form,
                'unique_hash' => $uniqueHash,
                'params' => json_encode($params),
                'ip' => '127.0.0.1',
                'confirm_url' => 'example.com'
            ]
        ];

        return $this->authorisedRequest('POST', '/entries.json', $options);
    }

    private function getParsedResponse(ResponseInterface $response): array
    {
        $parsedResponse = json_decode($response->getBody()->getContents(), true);

        // TODO caching
        return $parsedResponse;
    }

    private function authorisedRequest(string $method, string $route, array $options = []): array
    {
        $options['headers'] = $this->requestHeaders;

        $response =  $this->client->request($method, $this->baseUrl . $route, $options);

        return $this->getParsedResponse($response);
    }
}