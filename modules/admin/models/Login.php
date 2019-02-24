<?php
namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

/**
 * Login form
 */
class Login extends Users
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['login', 'required', 'message' => 'Логин не может быть пустым'],
            ['password', 'required', 'message' => 'Пароль не может быть пустым'],
            ['password', 'validatePassword'],
        ];
    }
    
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Неправильный логин или пароль');
            }
        }
    }


}
