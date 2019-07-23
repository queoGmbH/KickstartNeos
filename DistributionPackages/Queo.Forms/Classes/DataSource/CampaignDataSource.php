<?php
namespace Queo\Forms\DataSource;


use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Neos\Flow\Annotations as Flow;
use Queo\Forms\Service\FormsApiService;

class CampaignDataSource extends AbstractDataSource
{

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

        /**
         * TODO Workaround eigentlich müsste die UI das bereits machen
         */
        $clientId = empty($arguments['clientId']) ? $node->getProperty('clientId') : $arguments['clientId'];

        if (empty($clientId)) {
            return [];
        }

        $formsApiService = new FormsApiService();

        $parsedResponse = $formsApiService->getCampaigns($clientId);

        $campaigns = [];

        foreach ($parsedResponse['data']['campaigns'] as $campaignFromApi) {
            $campaigns[] = ['value' => $campaignFromApi['identifier'], 'label' => $campaignFromApi['title']];
        }

        return $campaigns;
    }
}
