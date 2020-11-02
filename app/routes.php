<?php
// Routes

$app->group('/admin', function () {
	$this->get('/login', 'App\Action\AdminAction:getLogin')->setName('admin.login')->add(App\Middlewares\RedirectIfAuthed::class);
    $this->post('/login', 'App\Action\AdminAction:postLogin');
	$this->post('/logout', 'App\Action\AdminAction:postLogout')->setName('admin.logout');

    $this->post('/members', 'App\Action\MemberAction:getData')->setName('member.data');
    $this->post('/members/edit', 'App\Action\MemberAction:editData')->setName('member.edit');
    $this->post('/members/delete', 'App\Action\MemberAction:deleteData')->setName('member.delete');

    $this->get('/settings', 'App\Action\SettingsAction:getSettings')->setName('admin.settings')->add(App\Middlewares\AuthMiddleware::class);
    $this->post('/settings', 'App\Action\SettingsAction:postSettings')->add(App\Middlewares\AuthMiddleware::class);

    $this->get('/stats', 'App\Action\AdminAction:stats')->setName('admin.stats')->add(App\Middlewares\AuthMiddleware::class);
    $this->get('/export', 'App\Action\ExportAction:export')->setName('admin.export')->add(App\Middlewares\AuthMiddleware::class);
    $this->get('/', 'App\Action\AdminAction:home')->setName('admin')->add(App\Middlewares\AuthMiddleware::class);
    
    $this->get('/report', 'App\Action\ReportAction:index')->setName('admin.report')->add(App\Middlewares\AuthMiddleware::class);
    
    $this->get('/faqs', 'App\Action\FaqAction:index')->setName('admin.faq')->add(App\Middlewares\AuthMiddleware::class);
    $this->get('/faqs/{id}/edit', 'App\Action\FaqAction:edit')->setName('admin.faq.edit')->add(App\Middlewares\AuthMiddleware::class);
    $this->get('/faqs/create', 'App\Action\FaqAction:create')->setName('admin.faq.create')->add(App\Middlewares\AuthMiddleware::class);
    $this->post('/faqs', 'App\Action\FaqAction:store')->setName('admin.faq.store')->add(App\Middlewares\AuthMiddleware::class);
    $this->put('/faqs/{id}', 'App\Action\FaqAction:update')->setName('admin.faq.update')->add(App\Middlewares\AuthMiddleware::class);
    $this->delete('/faqs/{id}', 'App\Action\FaqAction:delete')->setName('admin.faq.delete')->add(App\Middlewares\AuthMiddleware::class);
});

$app->get('/soon', 'App\Action\HomeAction:soon')->setName('soon');
$app->get('/', 'App\Action\HomeAction:home')->setName('home')->add($app->getContainer()->get('csrf'));
$app->get('/faqs', 'App\Action\HomeAction:faqs')->setName('faqs');
$app->post('/', 'App\Action\HomeAction:register')->add($app->getContainer()->get('csrf'))->add('App\Middlewares\CheckRegisteredMiddleware:run');
$app->get('/e-nota/{id}', 'App\Action\NotaAction:view')->setName('nota.view');
$app->get('/contact/payment', 'App\Action\ContactAction:payment')->setName('contact.payment');