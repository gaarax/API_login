<?php

namespace backend\modules\api\models;

use Yii;

/**
 * This is the model class for table "login".
 *
 * @property integer $id
 * @property string $guid
 * @property integer $status
 * @property string $username
 * @property integer $NIK
 * @property string $email
 * @property string $auth_mode
 * @property string $tags
 * @property string $language
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $last_login
 * @property integer $visibility
 * @property string $time_zone
 * @property integer $contentcontainer_id
 * @property integer $category_id
 * @property integer $point_id
 */
class Login extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE='create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'NIK', 'created_by', 'updated_by', 'visibility', 'contentcontainer_id', 'category_id', 'point_id'], 'integer'],
            [['NIK', 'auth_mode', 'category_id', 'point_id', 'email' , 'username' ], 'required'],
            [['tags'], 'string'],
            [['created_at', 'updated_at', 'last_login'], 'safe'],
            [['guid'], 'string', 'max' => 45],
            [['username'], 'string', 'max' => 50],
            [['email', 'time_zone'], 'string', 'max' => 100],
            [['auth_mode'], 'string', 'max' => 10],
            [['language'], 'string', 'max' => 5],
            [['email'], 'unique'],
            [['username'], 'unique'],
            [['guid'], 'unique'],
        ];
    }

    public function scenarios() {

        $scenarios = parent::scenarios() ;
        $scenarios['create'] = ['NIK' , 'email' , 'username' ] ;

        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guid' => 'Guid',
            'status' => 'Status',
            'username' => 'Username',
            'NIK' => 'Nik',
            'email' => 'Email',
            'auth_mode' => 'Auth Mode',
            'tags' => 'Tags',
            'language' => 'Language',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'last_login' => 'Last Login',
            'visibility' => 'Visibility',
            'time_zone' => 'Time Zone',
            'contentcontainer_id' => 'Contentcontainer ID',
            'category_id' => 'Category ID',
            'point_id' => 'Point ID',
        ];
    }
}
