<?php
namespace app\modules\controllers;

use yii\web\Controller;
use app\modules\models\Admin;
use Yii;

class PublicController extends Controller
{

    public function actionLogin()
    {
        $this->layout = false;
        if(isset(Yii::$app->session['admin']['adminuser'])){
            $this->redirect(['default/index']);
            Yii::$app->end();
        }
        $model = new Admin;
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if($model->login($post)){
                $this->redirect(['default/index']);
                Yii::$app->end();
            }
        }

        return $this->render('login',['model' => $model]);
    }

    public function actionLogout(){
        Yii::$app->session->removeAll();
        if(!isset(Yii::$app->session['admin']['isLogin'])){
            $this->redirect(['public/login']);
            Yii::$app->end();
        }
        $this->goback();
    }

    public function actionSeekpassword(){
        $this->layout = false;
        $model = new Admin;
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            $model->seekPass($post);
        }
        return $this->render('seekpassword',['model' => $model]);
    }
}
