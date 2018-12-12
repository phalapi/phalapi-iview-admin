<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 数据接口
 */
class Data extends Api {

    public function getRules() {
        return [];
    }

    /**
     * 获取表格数据
     */
    public function getTableData() {
        return [
            ['name' => 'dogstar', 'email' => 'chanzonghuang@gmail.com', 'createTime' => date('Y-m-d')],
            ['name' => '张三', 'email' => 'xxx@phalapi.net', 'createTime' => date('Y-m-d')],
        ];
    }

    /**
     * 获取拖拉数据列表
     */
    public function getDragList() {
        return [
            ['id' => 1, 'name' => 'one'],
            ['id' => 2, 'name' => 'tow'],
            ['id' => 3, 'name' => 'three'],
        ];
    }

    /**
     * 保存错误日志
     */
    public function saveErrorLogger() {
        return 'success';
    }
}
