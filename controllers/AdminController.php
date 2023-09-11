<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Employees;
use app\models\Requests;
use app\models\Employee_roles;

class AdminController extends Controller
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
        return $this->render('index', [
            
        ]);
    }

    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }

    public function actionUsers()
    {
        $roles = Employee_roles::find()
            ->all();

        $employees = Employees::find()
            ->orderBy('employee_full_name')
            ->all();

        return $this->render('users', [
            'employees' => $employees,
            'roles' => $roles,
        ]);
    }

    public function actionNew_employee()
    {
        $request = $this->request;
        $post = $request->post();
        
        $employee = new Employees();
        $employee->employee_role_id = $post['employee_role_id'];
        $employee->employee_full_name = trim($post['employee_name']);
        $employee->employee_email = trim($post['employee_email']);
        $employee->save();
        
        return $this->redirect('/admin/users');
    }

    public function actionUser($id)
    {
        $roles = Employee_roles::find()
            ->all();

        $employee = Employees::find()
            ->where(['employee_id' => $id])
            ->one();

        return $this->render('user', [
            'employee' => $employee,
            'roles' => $roles,
        ]);
    }

    public function actionUpdate_employee()
    {
        $request = $this->request;
        $post = $request->post();
        
        $employee = Employees::find()
            ->where(['employee_id' => $post['employee_id']])
            ->one();

        if(isset($post['update'])){
            $employee->employee_role_id = $post['employee_role_id'];
            $employee->employee_full_name = trim($post['employee_name']);
            $employee->employee_email = trim($post['employee_email']);
            $employee->save();
            \Yii::$app->session->setFlash('success', "Данные пользователя успешно обновлены!");
            return $this->redirect('/admin/user/'.$post['employee_id']);
        }

        if(isset($post['delete'])){
            $employee->delete();
            return $this->redirect('/admin/users');
        }
        
    }

    public function actionRequests()
    {
        $requests = Requests::find()
            ->all();

        $employees = Employees::find()
        ->orderBy('employee_full_name')
        ->all();

        return $this->render('requests', [
            'requests' => $requests,
            'employees' => $employees,
        ]);
    }

    public function actionNew_request()
    {
        $request = $this->request;
        $post = $request->post();

        $request = new Requests();
        $request->request_sender_id = $post['sender_id'];
        $request->request_receiver_id = $post['receiver_id'];
        $request->request_content = $post['content'];
        $request->save();
        return $this->redirect('/admin/requests');
    }

    public function actionRequest($id)
    {
        $request = Requests::findOne($id);
            
        $employees = Employees::find()
        ->orderBy('employee_full_name')
        ->all();

        return $this->render('request', [
            'request' => $request,
            'employees' => $employees,
        ]);
    }

    public function actionUpdate_request()
    {
        $post = $this->request->post();
        
        $request = Requests::findOne($post['request_id']);

        if(isset($post['update'])){
            $request->request_sender_id = $post['sender_id'];
            $request->request_receiver_id = $post['receiver_id'];
            $request->request_content = trim($post['content']);
            $request->save();
            \Yii::$app->session->setFlash('success', "Данные заявки успешно обновлены!");
            return $this->redirect('/admin/request/'.$post['request_id']);
        }

        if(isset($post['delete'])){
            $request->delete();
            return $this->redirect('/admin/requests');
        }
        
    }
}