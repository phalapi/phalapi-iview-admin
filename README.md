# PhalApi-iView-admin 开源后台框架

主要采用的技术：

 + [PhalApi](https://github.com/phalapi/phalapi) 开源接口框架 
 + [iView-admin](https://github.com/iview/iview-admin) 基于iView的管理系统模板 

本项目的最大特色：符合前后端分离的主流设计思想，结合了专注于接口领域的PhalApi框架，以及很火的iView。目前，使用的都是最新版本的技术，包括：PhalApi 2.4.2、iView-admin 2.3.0、PHP 7、Vue等。  

**欢迎大家一起参与开源维护！**

# 在线访问

在线demo请访问：todo。

# 前端部分（即界面）

## 安装
```
// install dependencies
npm install
```

## 运行

### 开发环境
本地开发调试时使用，
```
npm run dev
```

### 生产环境
打包发布时使用，
```
npm run build
```

更多帮助和说明，请前往[iView-admin](https://github.com/iview/iview-admin)。

# 后端部分（即接口）

## 安装

配置站点，如果使用的是Nginx，请参考以下配置。为了整合PhalApi与iView-admin，关键有两点：  

 + 第1点、网站根目录需要定位到 dist 目录
 + 第2点、需要为接口配置重定向，以便前端能通过相对路径访问后端接口

```
server {
        listen 80;
        server_name iview-admin.phalapi.net;

        index index.html;
        root /path/to/phalapi-iview-admin/dist;

        # 接口重定向
        rewrite ^/api/(.*) /api.php?s=$1 last;

        location ~ \.php$ {
                fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
                fastcgi_index index.php;
                include fastcgi_params;
                fastcgi_pass unix:/var/run/php-fpm/php-fpm.sock;
        }

        access_log /var/log/nginx/iview-admin.phalapi.net.access;
        error_log /var/log/nginx/iview-admin.phalapi.net.error;
}
```

## 两个重要的访问链接

本地部署好后，就能开始访问了。假设当前配置的站点域名是：iview-admin.phalapi.net，两个重要的访问链接分别是：

 + 管理后台首页：http://iview-admin.phalapi.net
 + 在线接口文档：http://iview-admin.phalapi.net/docs.php

## 接口模拟、接口请求、接口实现与接口文档

### 接口模拟

特别说明一下，针对接口的访问路径，之所以使用重定向，是了方便在前端本地开发调试时能很好模拟数据。例如：

在./src/mock/index.js文件中，设定需要模拟的接口：
```
Mock.mock(/\/api\/Message.Count/, messageCount)
```
在./src/mock/user.js文件中，就能返回模拟的数据：
```
 export const messageCount = () => {
  return 3
}
```

### 接口请求

对于在前端，需要请求接口时，可以参考./src/api/user.js 文件中的：
```
export const getUnreadCount = () => {
  return axios.request({
    url: 'api/Message.Count',
    method: 'get'
  })
}
```


如果请求的是真实的接口，例如请求的接口链接是：http://iview-admin.phalapi.net/api/Message.Count，那么返回的接口结果是：
```
{"ret":200,"data":3,"msg":""}
```

此时，在 ./src/libs/axios.js 底层已经兼容了开发与生产这两种模式。 

### 接口实现

Message.Count对应的接口PHP源代码，则位于：./phalapi/src/app/Api/Message.php，相关代码片段如下：
```
 <?php
namespace App\Api;
use PhalApi\Api;

/**
 * 消息接口
 */
class Message extends Api {
    /**
     * 新消息数量
     */
    public function count() {
        return 3;
    }
}    
```

### 接口文档

自动生成的在线接口文档，访问链接是：http://iview-admin.phalapi.net/docs.php?service=App.Message.Count&detail=1&type=fold。效果如下：  

todo


更多帮助和说明，请前往[PhalApi](https://github.com/phalapi/phalapi)。

# 如何升级iView-admin？

可直接通过更新npm依赖包进行升级，即：
```
$ npm update
```

如果有其他更新，则根据需要相应覆盖源代码即可。

# 如何升级PhalApi？

如果PhalApi框架有更新，可直接进入phalapi目录进行升级。即：
```
$ cd phalapi
$ composer update
```

更新前，需要先确保./phalapi/composer.json配置中的PhalApi版本号是最新的。如果有其他更新，则根据需要相应覆盖源代码即可。

# 许可

本项目以iView-admin的开源协议为主，即MIT协议。

