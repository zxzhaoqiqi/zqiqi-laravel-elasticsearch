## 「项目概述」
laravel 5.6 使用elasticsearch的Elasticquent扩展

开发规范：https://laravel-china.org/docs/laravel-specification

## 运行环境
ubuntu16.4 

php7.2

mysql5.7

nginx 1.10

elasticSearch

#### 开发环境部署/安装
1. 修改本地host文件 增加`study.test`

1. 创建数据库 

```
create database lv_elasticsearch DEFAULT charset utf8mb4 collate utf8mb4_general_ci;
```
3. 运行迁移
```
php artisan migrate
php artisan db:seed
```
或者
```$xslt
php artisan migrate:refresh --seed
```

## 服务器架构说明

## 代码上线

## 扩展包说明

## 自定义 Artisan 命令列表



