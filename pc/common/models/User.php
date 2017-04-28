<?php
namespace pc\common\models;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use pc\modules\huati\models\Attach;
use pc\modules\huati\models\UserCount;
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DISPLAY  =1;
    const STATUS_DELETE = 0;
    const  STATUS_STATUS = 0;

  public static function tableName()
    {
        return '{{%user}}';
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'add_time',
                'updatedAtAttribute' => 'update_time',
                'value' => time(),
            ],
        ];
    }
    /**
     * 通过名称获取用户对象
     * @param unknown $username
     */
    public static function findByMobile($mobile)
    {
       
        return static::findOne(['mobile' => $mobile]);
    }
    /**
     * 密码验证
     * @param unknown $password
     */
    public function validatePassword($password){
        return \Yii::$app->security->validatePassword($password,$this->password_hash);
    }
    
    public static function findIdentity($id){
        return static::findOne(['id' => $id]);
    }
    
    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
    */
    public static function findIdentityByAccessToken($token, $type = null){
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
    */
    public function getId(){
        return $this->getPrimaryKey();
    }
    
    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
    */
    public function getAuthKey(){
        return $this->auth_key;
    }
    
    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
    */
    public function validateAuthKey($authKey){
        return $this->getAuthKey() === $authKey;
    }
    
    public function fields(){
        $fields =  ['id','avatar_id','nickname','mobile','password_hash',"type","remark",'display','delete','weixin','access_token'];
        $fields['avatar_info'] = function ($model){
            return Attach::getImageOne($this->avatar_id);
        };
        return $fields;
    }
    
    public function getUserInfoById($id){
        $data =  self::findOne(['id'=>$id]);
        if($data){
            return $data->toArray();
        }
        return $data;
    }
    
    public function getAttach(){
        return $this->hasOne(Attach::className(),['id'=>'avatar_id']);
    }
    
    public  function getTeacherList(){
           $condition=['display'=>self::STATUS_DISPLAY,'delete'=>self::STATUS_DELETE];
           $condition['type'] = 4;
           $data =  self::find()->where($condition)->orderBy(['credit'=>SORT_DESC])->asArray()->all();
           if($data){
               $userCountModel = new UserCount();
               foreach ($data as $k=>$v){
                   $data[$k]['avatar_info'] = Attach::getImageOne($v['avatar_id']);
                   $data[$k]['userCount'] = $userCountModel->getUserCount($v['id']);
               }
               return $data;
           }
         return array();
    }
    
}
?>