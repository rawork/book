<?php

namespace Fuga\PublicBundle\Controller;

use Fuga\CommonBundle\Controller\PublicController;

class BookController extends PublicController
{
	public function __construct()
	{
		parent::__construct('book');
	}

	public function indexAction()
	{
		$feedback = $this->get('container')->getItems('book_feedback', 'publish=1');

		return $this->render('book/index.html.twig', compact('feedback'));
	}
	
}