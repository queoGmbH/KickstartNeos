<?php
namespace Queo\Forms\DataSource;


use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Neos\Flow\Annotations as Flow;

class CampaignDataSource extends AbstractDataSource
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

    /**
     * @var string
     */
    static protected $identifier = 'queo-forms-campaign';

    /**
     * Get data
     *
     * The return value must be JSON serializable data structure.
     *
     * @param NodeInterface $node The node that is currently edited (optional)
     * @param array $arguments Additional arguments (key / value)
     * @return mixed JSON serializable data
     * @api
     */
    public function getData(NodeInterface $node = null, array $arguments)
    {

        if (empty($arguments['clientId'])) {
            return [];
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET',  $this->baseUrl . '/campaigns.json?filter[client]=' . $arguments['clientId'], [
            'headers' => $this->requestHeaders
        ]);

        $parsedResponse = json_decode($response->getBody()->getContents(), true);

        $campaigns = [];

        foreach ($parsedResponse['data']['campaigns'] as $campaignFromApi) {
            $campaigns[] = ['value' => $campaignFromApi['identifier'], 'label' => $campaignFromApi['title']];
        }

        return $campaigns;
    }
}
