<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 11.07.2019
 * Time: 10:49
 */

namespace Queo\Forms\Service;

use Neos\Flow\Annotations as Flow;

class FormsApiService
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

    public function getCampaigns($client)
    {
        $response = $this->getClient()->request('GET',  $this->baseUrl . '/campaigns.json?filter[client]=' . $client, [
            'headers' => $this->requestHeaders
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getForms($campaignIdentifier)
    {
        $response = $this->getClient()->request('GET',  $this->baseUrl . '/forms.json?filter[campaign]=' . $campaignIdentifier, [
            'headers' => $this->requestHeaders
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    private function getClient()
    {
        return new \GuzzleHttp\Client();
    }
}