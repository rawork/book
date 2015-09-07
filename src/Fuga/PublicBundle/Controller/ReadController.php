<?php

namespace Fuga\PublicBundle\Controller;

use Fuga\CommonBundle\Controller\PublicController;

class ReadController extends PublicController
{
	public function __construct()
	{
		parent::__construct('read');
	}

	public function indexAction()
	{
		$quotations = $this->get('container')->getItems('read_quotation', 'publish=1');

		return $this->render('read/index.html.twig', compact('quotations'));
	}
	
}