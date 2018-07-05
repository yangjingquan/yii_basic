<?php

namespace app\modules\controllers;

use yii\web\Controller;
use Yii;
/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'layout1';
        if(!isset(Yii::$app->session['admin']['adminuser'])){
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        return $this->render('index');
    }
}
