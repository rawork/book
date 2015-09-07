<?php

namespace Fuga\PublicBundle\Controller;

use Fuga\CommonBundle\Controller\PublicController;
use Symfony\Component\HttpFoundation\JsonResponse;

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

	public function addAction()
	{
//		if ($this->isXmlHttpRequest()) {

			$data = array(
				'name' => $this->get('request')->request->get('name', ''),
				'email' => $this->get('request')->request->get('position', ''),
				'position' => '',
				'feedback' => $this->get('request')->request->get('message'),
				'created' => date('Y-m-d H-i:s'),
				'updated' => '0000-00-00 00:00:00',
				'sort' => 500,
				'publish' => 0,
			);

			$this->get('container')->addItem(
				'book_feedback',
				$data
			);

			$response = new JsonResponse();
			$response->setData(array(
				'content' => $this->render('book/add.html.twig'),
			));

			return $response;
//		}

//		return $this->redirect($this->generateUrl('public_page'));
	}
	
}