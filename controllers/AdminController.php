<?php

class AdminController extends BaseController
{
    public $name = 'admin';

    protected $adminProfile;

    public function __construct(AdminRootProfile $adminRootProfile)
    {
        $this->adminProfile = $adminRootProfile;
    }

    private function requireAdmin(Request $request)
    {
        return $this->adminProfile->adminAuth($request->getCookie('pAccount'));
    }

    private function accessDenied()
    {
        return new Response($this->render('main', [
            'title' => 'Основная страница',
            'text'  => '',
            'error' => 'Нет доступа к разделу',
        ]));
    }

    public function admAction(Request $request)
    {
        if (!$this->requireAdmin($request)) {
            return $this->accessDenied();
        }

        return new Response($this->render('admin/main', [
            'title' => 'Панель администратора',
            'msg'   => 'Вы вошли в панель администратора',
        ]));
    }

    public function createUserFormAction(Request $request)
    {
        if (!$this->requireAdmin($request)) {
            return $this->accessDenied();
        }

        return new Response($this->render('admin/form/createUserForm', [
            'title'    => 'Создание Пользователя',
            'formName' => 'Создание нового пользователя',
        ]));
    }

    public function showCounterAction(Request $request)
    {
        if (!$this->requireAdmin($request)) {
            return $this->accessDenied();
        }

        $id    = $request->getQueryParameter('id');
        $count = is_numeric($id) ? $this->adminProfile->getByIdCounter($id) : null;
        if (!$count) {
            return new Response('Page not found <br><a href="/admin">back</a>', '404', 'Not found');
        }

        return new Response($this->render('admin/counter', ['counter' => $count]));
    }

    public function showOneUserAction(Request $request)
    {
        if (!$this->requireAdmin($request)) {
            return $this->accessDenied();
        }

        $id   = $request->getQueryParameter('id');
        $user = is_numeric($id) ? $this->adminProfile->getByIdUser($id) : null;
        if (!$user) {
            return new Response('Page not found <br><a href="/admin">back</a>', '404', 'Not found');
        }

        return new Response($this->render('admin/userAdminProfile', [
            'user'     => $user,
            'counters' => $this->adminProfile->takeCountersUser($id),
        ]));
    }

    public function showUsersAction(Request $request)
    {
        if (!$this->requireAdmin($request)) {
            return $this->accessDenied();
        }

        return new Response($this->render('admin/usersTable', [
            'title' => 'Список Л/С',
            'users' => $this->adminProfile->getAll(),
            'error' => '',
        ]));
    }

    public function changeCountersAction(Request $request)
    {
        if (!$this->requireAdmin($request)) {
            return $this->accessDenied();
        }

        $id   = $request->getQueryParameter('id');
        $user = is_numeric($id) ? $this->adminProfile->getByIdUser($id) : null;
        if (!$user) {
            return new Response('Page not found <br><a href="/admin">back</a>', '404', 'Not found');
        }

        return new Response($this->render('admin/changeCounterForm', [
            'title' => 'Сменить информацию о счетчиках',
            'text'  => '',
            'error' => '',
            'id'    => $id,
        ]));
    }

    public function confirmChangeCountersAction(Request $request)
    {
        if (!$this->requireAdmin($request)) {
            return $this->accessDenied();
        }

        $id = $request->getQueryParameter('id');
        $this->adminProfile->changeInfoCounters($id);
        return $this->redirect('/admin');
    }

    public function newUserAction(Request $request)
    {
        if (!$this->requireAdmin($request)) {
            return $this->accessDenied();
        }

        if ($request->isPost() && !empty($request->getPost('newUsers'))) {
            $rqs = $request->getPost('newUsers');
            if ($this->isNulled($rqs)) {
                if ($this->adminProfile->createUser($rqs['name'], $rqs['surname'], $rqs['password'], $rqs['homeSq'], $rqs['roots']) == 0) {
                    $uid = $this->adminProfile->takeIDuser($rqs['name'], $rqs['surname']);
                    $msg = "<div style='padding: 100px; margin: 200px auto; text-align: center;'>"
                        . "Запомните номер аккаунта пользователя, через 30 секунд вы будете перенесены на основную страницу."
                        . "<p style='font-size: 20px; text-align: center;'>ID : " . htmlspecialchars($uid[0]['uid']) . "</p>"
                        . "</div>";

                    return new Response($this->render('template', [
                        'title'     => 'Аккаунт успешно создан',
                        'text'      => '',
                        'error'     => '',
                        'msg'       => $msg,
                        'pathAdmin' => '/admin',
                    ]));
                }
            }
        }

        return $this->redirect('/admin');
    }
}
