<?php

namespace backend\modules\api\models;

use Yii;

/**
 * This is the model class for table "user".
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
 *
 * @property Comment[] $comments
 * @property Content[] $contents
 * @property Content[] $contents0
 * @property File[] $files
 * @property GroupUser[] $groupUsers
 * @property Group[] $groups
 * @property Like[] $likes
 * @property Like[] $likes0
 * @property Notification[] $notifications
 * @property Profile $profile
 * @property SpaceMembership[] $spaceMemberships
 * @property Space[] $spaces
 * @property UserAuth[] $userAuths
 * @property UserFollow[] $userFollows
 * @property UserFriendship[] $userFriendships
 * @property UserFriendship[] $userFriendships0
 * @property User[] $users
 * @property User[] $friendUsers
 * @property UserHttpSession[] $userHttpSessions
 * @property UserMentioning[] $userMentionings
 * @property UserModule[] $userModules
 * @property UserPassword[] $userPasswords
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'NIK', 'created_by', 'updated_by', 'visibility', 'contentcontainer_id', 'category_id', 'point_id'], 'integer'],
            [['NIK', 'auth_mode', 'category_id', 'point_id'], 'required'],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContents()
    {
        return $this->hasMany(Content::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContents0()
    {
        return $this->hasMany(Content::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(File::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupUsers()
    {
        return $this->hasMany(GroupUser::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Group::className(), ['id' => 'group_id'])->viaTable('group_user', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLikes0()
    {
        return $this->hasMany(Like::className(), ['target_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotifications()
    {
        return $this->hasMany(Notification::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpaceMemberships()
    {
        return $this->hasMany(SpaceMembership::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpaces()
    {
        return $this->hasMany(Space::className(), ['id' => 'space_id'])->viaTable('space_membership', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserAuths()
    {
        return $this->hasMany(UserAuth::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFollows()
    {
        return $this->hasMany(UserFollow::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFriendships()
    {
        return $this->hasMany(UserFriendship::className(), ['friend_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserFriendships0()
    {
        return $this->hasMany(UserFriendship::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_friendship', ['friend_user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriendUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'friend_user_id'])->viaTable('user_friendship', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserHttpSessions()
    {
        return $this->hasMany(UserHttpSession::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserMentionings()
    {
        return $this->hasMany(UserMentioning::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserModules()
    {
        return $this->hasMany(UserModule::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPasswords()
    {
        return $this->hasMany(UserPassword::className(), ['user_id' => 'id']);
    }
}
