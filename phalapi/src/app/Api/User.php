<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 用户接口
 */
class User extends Api {

    // 模拟的静态数据
    protected static $USER_MAP = [
        'super_admin' => [
            'name' => 'super_admin',
            'user_id' => '1',
            'access' => ['super_admin', 'admin'],
            'token' => 'super_admin',
            'avator' => 'https://file.iviewui.com/dist/a0e88e83800f138b94d2414621bd9704.png',
        ],
        'admin' => [
            'name' => 'admin',
            'user_id' => '2',
            'access' => ['admin'],
            'token' => 'admin',
            'avator' => 'https://avatars0.githubusercontent.com/u/20942571?s=460&v=4',
        ]
    ];

    public function getRules() {
        return [
            'login' => [
                'username' => ['name' => 'userName', 'require' => true, 'min' => 1, 'max' => 50, 'desc' => '用户名'],
                'password' => ['name' => 'password', 'require' => true, 'min' => 1, 'max' => 20, 'desc' => '密码'],
            ],
            'getInfo' => [
                'token' => ['name' => 'token', 'require' => true, 'min' => 1, 'max' => 50, 'desc' => 'TOKEN'],
            ],
        ];
    }

    /**
     * 登录接口
     * @desc 根据账号和密码进行登录操作
     */
    public function login() {
        return ['token' => self::$USER_MAP[$this->username]['token']];
    }

    /**
     * 获取用户信息
     */
    public function getInfo() {
        return self::$USER_MAP[$this->token];
    }

    /**
     * 退出登录
     */
    public function logout() {
        return null;
    } 
} 
