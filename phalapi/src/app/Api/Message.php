<?php
namespace App\Api;

use PhalApi\Api;

/**
 * 消息接口
 */
class Message extends Api {

    public function getRules() {
        return [
            'content' => [
                'msgId' => ['name' => 'msg_id', 'require' => true, 'desc' => '消息ID'],
            ],
        ];
    }

    /**
     * 新消息数量
     */
    public function count() {
        return 3;
    }

    /**
     * 初始化接口
     */
    public function initMsg() {
        $unread = [
            ['title' => '测试未读', 'create_time' => '2018-12-12', 'msg_id' => 100],
        ];
        $readed = [
            ['title' => '测试已读', 'create_time' => '2018-12-12', 'msg_id' => 101],
        ];
        $trash = [
            ['title' => '测试删除', 'create_time' => '2018-12-12', 'msg_id' => 102],
        ];

        return ['unread' => $unread, 'readed' => $readed, 'trash' => $trash];
    }

    /**
     * 获取消息内容
     */
    public function content() {
        return '神奇的接口！当前需要获取的消息ID是：' . $this->msgId;
    }

    /**
     * 是否有未读消息
     */
    public function hasRead() {
        return true;
    }

    /**
     * 标志为已读
     */
    public function removeReaded() {
        return true;
    }

    /**
     * 恢复
     */
    public function restore() {
        return true;
    }

}
