<?php

class HelloWorldController extends BaseController
{
    public $name = 'helloworld';

    public function helloAction()
    {
        return new Response($this->render('template', ['title' => 'Hello page', 'text' => 'hello']));
    }

    public function worldAction()
    {
        return new Response($this->render('template', ['title' => 'World page', 'text' => 'world']));
    }
}
