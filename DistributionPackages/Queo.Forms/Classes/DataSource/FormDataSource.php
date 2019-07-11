<?php
namespace Queo\Forms\DataSource;

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Neos\Service\DataSource\AbstractDataSource;

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
        // TODO: Implement getData() method.
    }
}
