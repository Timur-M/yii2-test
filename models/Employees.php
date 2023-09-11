<?php

namespace app\models;

use yii\db\ActiveRecord;

class Employees extends ActiveRecord
{
    public function getRole()
    {
        return $this->hasOne(Employee_roles::class, ['employee_role_id' => 'employee_role_id']);
    }
}