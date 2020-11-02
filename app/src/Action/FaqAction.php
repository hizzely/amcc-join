<?php
namespace App\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class FaqAction extends BaseAction
{
    public function index(Request $request, Response $response)
    {
        $faqs = $this->db->select('faqs', '*');

        $this->view->render($response, 'admin.faq.index', compact('faqs'));
    }
    
    public function create(Request $request, Response $response)
    {
        $this->view->render($response, 'admin.faq.create');
    }

    public function store(Request $request, Response $response, array $params)
    {
        $form = $request->getParsedBody();

        $data = [
            'pertanyaan'    => $form['pertanyaan'],
            'jawaban'       => $form['jawaban'],
            'published'     => $form['published'] ?? '0'
        ];

        $this->db->insert('faqs', $data);

        return $response->withStatus(200)->withHeader('Location', $this->router->pathFor('admin.faq'));
    }

    public function edit(Request $request, Response $response, array $params)
    {
        $faq = $this->db->get('faqs', '*', ['id' => $params['id']]);

        $this->view->render($response, 'admin.faq.edit', compact('faq'));
    }

    public function update(Request $request, Response $response, array $params)
    {
        $form = $request->getParsedBody();

        $data = [
            'pertanyaan'    => $form['pertanyaan'],
            'jawaban'       => $form['jawaban'],
            'published'     => $form['published'] ?? '0'
        ];

        $this->db->update('faqs', $data, ['id' => $params['id']]);

        return $response->withStatus(200)->withHeader('Location', $this->router->pathFor('admin.faq'));
    }

    public function delete(Request $request, Response $response, array $params)
    {
        $this->db->delete('faqs', ['id' => $params['id']]);

        return $response->withStatus(200)->withHeader('Location', $this->router->pathFor('admin.faq'));
    }
}
