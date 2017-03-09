<?php
namespace backend\components;
// по умолчанию укажите  app вместо frontend

use Yii;
use yii\web\Request;

class LangRequest extends Request {

    private $lang_arr = ['en', 'ru'];
    /*создаем массив языков, или передаем сюда из БД,
     что бы никто не смог их подменить на неправильные значения*/

    public function init() {
        parent::init();
//базовый класс должен выполниться

        if (isset(Yii::$app->request->cookies['lang'])) {
//если язык установлен
            $user_lang = Yii::$app->request->cookies->getValue('lang');
//получаем язык пользователя
            if (!in_array($user_lang, $this->lang_arr)) {
                /*если у пользователь пытается
                 подменить язык - показываем 404*/
                throw new NotFoundHttpException;
            }

            $code = $this->getCode($user_lang);
//получаем код языка,метод реализован чуть ниже
            Yii::$app->language = $code;
//устанавливаем язык
            Yii::$app->formatter->locale = $code;
//устанавливаем локаль(для отображения дат и т.п)
        } else {
//если язык не установлен
            $language = $this->getBrowserLoc();
            // получаем язык из браузера пользователя
            $language_code = $this->getCode($language);
            /* получаем код языка*/

            Yii::$app->language = $language_code;
//устаналиваем язык yii
            Yii::$app->formatter->locale = $language_code;
//устанавливаем локаль
        }
    }

    public static function getCode($lang) {
        switch ($lang) {
            case 'ru':
                return "ru-RU";

            case 'en':
                return "en-US";

            case 'ua':
                return "uk-UA";

            default :
                return "en-US";
        }
    }

    private function getBrowserLoc() {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            return substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        }
        else {
// если вдруг не установлено возвращаем язык по умолчанию
            return 'eng';
        }

    }

}