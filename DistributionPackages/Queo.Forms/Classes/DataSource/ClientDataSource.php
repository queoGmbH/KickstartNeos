<?php
namespace Queo\Forms\DataSource;

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Neos\Service\DataSource\AbstractDataSource;

class ClientDataSource extends AbstractDataSource
{
    /**
     * @var string
     */
    static protected $identifier = 'queo-forms-client';

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
        return $this->getClients();
    }

    private function getClients() {
        return [
            ['value' => 0, 'label' => 'Bundesverband'],
            ['value' => 1, 'label' => 'Sachsen-Anhalt'],
            ['value' => 2, 'label' => 'Baden-Württemberg'],
            ['value' => 3, 'label' => 'Bremen/Bremerhaven'],
            ['value' => 4, 'label' => 'Rheinland-Pfalz/Saarland'],
            ['value' => 5, 'label' => 'Rheinland/Hamburg'],
            ['value' => 6, 'label' => 'Niedersachsen'],
            ['value' => 7, 'label' => 'Hessen'],
            ['value' => 8, 'label' => 'NORDWEST'],
            ['value' => 9, 'label' => 'Nordost'],
            ['value' => 10, 'label' => 'PLUS'],
            ['value' => 11, 'label' => 'Bayern']
        ];
    }
}
