<?php
namespace Queo\Forms\DataSource;

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Queo\Forms\Service\FormsApiService;

class FormDataSource extends AbstractDataSource
{
    /**
     * @var string
     */
    static protected $identifier = 'queo-forms-form';

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
        $campaignId = empty($arguments['campaignId']) ? $node->getProperty('campaignId') : $arguments['campaignId'];

        if (empty($campaignId)) {
            return [];
        }

        $formsApiService = new FormsApiService();

        $parsedResponse = $formsApiService->getForms($campaignId);

        $forms = [];

        foreach ($parsedResponse['data']['forms'] as $formFromApi) {
            $forms[] = ['value' => $formFromApi['identifier'], 'label' => $formFromApi['title']];
        }

        return $forms;
    }
}
