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

    public function submitAction()
    {
        $client = $this->request->getArgument('client');
        $campaign = $this->request->getArgument('campaign');
        $form = $this->request->getArgument('form');
        $params = $this->request->getArgument('params');
        $uniqueHash = $this->request->getArgument('unique_hash');

        $response = $this->formService->postForm($client, $campaign, $form, $uniqueHash, $params);

        return $response['data']['completion_message'];
    }
}
