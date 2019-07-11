<?php


namespace Queo\Forms\Controller;

use Neos\Flow\Mvc\Controller\ActionController;
use Queo\Forms\Service\FormService;

class FormSubmissionController extends ActionController
{
    /**
     * @var FormService
     */
    private $formService;

    public function __construct(FormService $formService)
    {
        $this->formService = $formService;
    }

    public function submitAction(int $client, int $campaign, int $form, array $params, string $uniqueHash)
    {
        $response = $this->formService->postForm($client, $campaign, $form, $uniqueHash, $params);

        $this->forward(
            'show',
            'Frontend\Node',
            'Neos.Neos',
            [
                'node' => $this->request->getArgument('refererNode'),
                'submittedArguments' => $params,
                'state' => $response['status'],
                'submitResponse' => $response['data']
            ]
        );

    }
}
