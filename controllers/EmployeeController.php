<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Employees;
use app\models\Requests;

class EmployeeController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $employees = Employees::find()
            ->orderBy('employee_full_name')
            ->all();

        return $this->render('index', [
            'employees' => $employees,
        ]);
    }

    public function actionPage($name)
    {
        $decoded_arg = base64_decode($name);
        $exploded_arg = explode("_",$decoded_arg);

        $employee = Employees::find()
                ->select('employees.*,employee_roles.employee_role_name')
                ->leftJoin('employee_roles', 'employee_roles.employee_role_id = employees.employee_role_id')
                ->where(['employee_id' => $exploded_arg[1]])
                ->one();

        return $this->render('page', [
            'employee' => $employee,
        ]);
    }

    public function actionRequest()
    {
        $employees = Employees::find()
            ->orderBy('employee_full_name')
            ->all();

        return $this->render('request', [
            'employees' => $employees,
        ]);
    }

    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }

    public function actionHandler()
    {
        $request = $this->request;
        $post = $request->post();
        
        $employee_check = Employees::find()
            ->where(['employee_full_name' => trim($post['sender_name'])])
            ->orWhere(['employee_email' => trim($post['sender_email'])])
            ->one();

        $request = new Requests();
        $request->request_receiver_id = $post['receiver_id'];
        $request->request_content = trim($post['content']);

        if(!$employee_check){
            $employee = new Employees();
            $employee->employee_full_name = trim($post['sender_name']);
            $employee->employee_email = trim($post['employee_email']);
            $employee->save();
            $sender_id = $employee->employee_id;
            $request->request_sender_id = $sender_id;
        } else {
            $request->request_sender_id = $employee_check->employee_id;
        }    

        $request->save();
        return $this->redirect('/form_success');
    }

    public function actionForm_success()
    {
        return $this->render('form_success', [
            
        ]);
    }

    public function actionAjax_get_employee()
    {
        $request = $this->request;
        $post = $request->post();
        $employee = Employees::find()
        ->where(['employee_id' => $post['id']]);

        $role_name = $employee->one()->role->employee_role_name;

        $employee = $employee
            ->asArray()
            ->one();
        $employee['role_name'] = $role_name;

        echo json_encode($employee);
    }
}