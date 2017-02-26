<?php
/**
 * Created by PhpStorm.
 * User: Quercus
 * Date: 26.02.2017
 * Time: 11:39
 */

namespace backend\controllers;


class IndexController extends AppController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}