<?php

namespace backend\modules\api\controllers;


use \backend\modules\api\models\Login;

class LoginController extends \yii\web\Controller
{
    public $enableCsrfValidation=false ;

    public function actionIndex()
    {
        echo 'this is new'; exit;
        return $this->render('index');
    }

    public function actionCreateLogin ()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //return array ('status'=>true) ;
          $login = new Login() ;
          $login->scenario = Login::SCENARIO_CREATE ;
          $login->attributes = \Yii::$app->request->post();

            if ($login->validate()) {

                $login->save();

                return array('status' => true , 'data'=>'Login was created succesfully' ) ;

            } else  {
                return array ('status'=> false, 'data' => $login->getErrors()) ;
            }
        }

        public function getRegister ()
        {

        }

        public function actionSearchAnalyze()
        {

        }

        public function actionListLogin()
       {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $login=Login::find()->all();

        if(count($login)>0)
        {

            return array ( 'status' =>true , 'data ' =>$login) ;
        }
            else {
             return array ( 'status' =>false,'data'=>'no login found') ;
            }



       // echo 'this Create user' ; exit;


}

        }
