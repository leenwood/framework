<?php

class IndexController extends BaseController
{
    public $name = 'index';

    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function indexAction(Request $request)
    {
        return new Response($this->render('main', []));
    }

    public function showAction(Request $request)
    {
        $id      = $request->getQueryParameter('id');
        $article = is_numeric($id) ? $this->articleRepository->getById($id) : null;

        if ($article === null) {
            return new Response(
                'Page not found <br><a href="/">back to articles list</a>',
                '404', 'Not found'
            );
        }

        return new Response($this->render('article', ['article' => $article]));
    }

    public function loginAction(Request $request)
    {
        return new Response($this->render('auth/login', ['title' => 'login page', 'text' => '']));
    }

    public function authAction(Request $request)
    {
        setcookie('pAccount', $request->getPost('login'));
        setcookie('password', $request->getPost('password'));
        return $this->redirect('/');
    }

    public function registrAction(Request $request)
    {
        return new Response($this->render('auth/registr', ['title' => 'registr page', 'text' => '']));
    }

    public function addInfoAction(Request $request)
    {
        return new Response($this->render('changeInfo', ['title' => 'Показания счетчиков', 'text' => '']));
    }

    public function addAction(Request $request)
    {
        if ($request->isPost() && $request->getCountersValueBool()) {
            $pAccount = $request->getCookie('pAccount');

            $counterGVSid = $this->articleRepository->getIdCountersUD('GVS', $pAccount);
            $counterHVSid = $this->articleRepository->getIdCountersUD('HVS', $pAccount);
            $counterELEid = $this->articleRepository->getIdCountersUD('ELE', $pAccount);

            foreach ([
                ['GVScounter', $counterGVSid, 'GVS'],
                ['HVScounter', $counterHVSid, 'HVS'],
                ['ELEcounter', $counterELEid, 'ELE'],
            ] as [$field, $counterId, $label]) {
                $value = $request->getValueCounter($field);
                if (!is_numeric($value) || $value < 0) {
                    return new Response($this->render('main', [
                        'title' => 'Основная страница',
                        'text'  => '',
                        'error' => "Показания счетчика $label некорректны или меньше 0",
                    ]));
                }
            }

            $timeDate = $request->getValueCounter('dateTime');

            $prevGVS = $this->articleRepository->getPrevValueCounterUD($counterGVSid);
            $prevHVS = $this->articleRepository->getPrevValueCounterUD($counterHVSid);
            $prevELE = $this->articleRepository->getPrevValueCounterUD($counterELEid);

            $this->articleRepository->addInfoUD($counterGVSid, $request->getValueCounter('GVScounter'), $prevGVS[0]['curValue'], $timeDate);
            $this->articleRepository->addInfoUD($counterHVSid, $request->getValueCounter('HVScounter'), $prevHVS[0]['curValue'], $timeDate);
            $this->articleRepository->addInfoUD($counterELEid, $request->getValueCounter('ELEcounter'), $prevELE[0]['curValue'], $timeDate);
        }

        return $this->redirect('/');
    }

    public function createTicketAction(Request $request)
    {
        $pAccount = $request->getCookie('pAccount');

        $counterGVSid = $this->articleRepository->getIdCountersUD('GVS', $pAccount);
        $counterHVSid = $this->articleRepository->getIdCountersUD('HVS', $pAccount);
        $counterELEid = $this->articleRepository->getIdCountersUD('ELE', $pAccount);

        $GVS = $this->articleRepository->getByIdCounter($counterGVSid);
        $HVS = $this->articleRepository->getByIdCounter($counterHVSid);
        $ELE = $this->articleRepository->getByIdCounter($counterELEid);

        $values = [
            '1' => ['id' => $GVS[count($GVS) - 1]['idCount'], 'curValue' => $GVS[count($GVS) - 1]['curValue'], 'prevValue' => $GVS[count($GVS) - 1]['prevValue']],
            '2' => ['id' => $HVS[count($HVS) - 1]['idCount'], 'curValue' => $HVS[count($HVS) - 1]['curValue'], 'prevValue' => $HVS[count($HVS) - 1]['prevValue']],
            '3' => ['id' => $ELE[count($ELE) - 1]['idCount'], 'curValue' => $ELE[count($ELE) - 1]['curValue'], 'prevValue' => $ELE[count($ELE) - 1]['prevValue']],
        ];

        return new Response($this->render('ticket', ['title' => 'Квитанция', 'values' => $values]));
    }
}
