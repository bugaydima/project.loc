<?php
namespace backend\controllers;// в стандартной версии app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\components\LangRequest;
/*подключаем наш созданный ранее файл,
пропишите стандартный путь app\components\LangRequest;
вместо frontend\components\LangRequest;если вы его там создавали*/

class LangController extends Controller {

    private $lang_arr = ['en', 'ru'];

    public function actionSet($lang = null) {

        if (!in_array($lang, $this->lang_arr)) {
            throw new NotFoundHttpException;
        }
        if (isset(Yii::$app->request->cookies['lang'])) {
//если язык уже установлен
            Yii::$app->response->cookies->remove('lang');
//удаляем cookie языка
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'lang',
                'value' => $lang
            ]));//устанавливаем cookie для языка
            $lang = LangRequest::getCode($lang);//получаем код

            Yii::$app->language = $lang;//устанавливаем язык фреймворку
            Yii::$app->formatter->locale = $lang;//устанавливаем локаль
        } else {//если язык не был установлен(а вдруг)
            Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'lang',
                'value' => $lang
            ]));
            $lang = LangRequest::getCode($lang);
            Yii::$app->language = $lang;
            Yii::$app->formatter->locale = $lang;
        }
        return $this->redirect(Yii::$app->request->baseUrl);
//возвращаем пользователя откуда пришел
    }

}