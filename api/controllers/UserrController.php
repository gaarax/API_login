<?php

namespace backend\modules\api\controllers;


use \backend\modules\api\models\Userr;

class UserrController extends \yii\web\Controller
{
    public $enableCsrfValidation=false ;

    public function actionIndex()
    {
         echo 'this is new'; exit;
        return $this->render('index');
    }

    public function actionCreateUserr ()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        //return array ('status'=>true) ;
          $userr = new Userr() ;
          $userr->scenario = Userr::SCENARIO_CREATE ;
          $userr->attributes = \Yii::$app->request->post();

            if ($userr->validate()) {

                $userr->save();

                return array('status' => true , 'data'=>'Userr was created succesfully' ) ;

            } else  {
                return array('status'=> false, 'data' => $userr->getErrors()) ;
            }
          }

    public function actionListUserr()
     {
      \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

      $userr=Userr::find()->all();

      if(count($userr)>0)
      {

          return array ( 'status' =>true , 'data ' =>$userr) ;
      }
          else {
           return array ( 'status' =>false,'data'=>'no login found') ;
          }


        }



}
