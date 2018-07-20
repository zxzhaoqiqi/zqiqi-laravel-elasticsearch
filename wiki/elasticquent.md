## 1.添加elasticquent到`composer.json`

    "elasticquent/elasticquent": "dev-master"
    
  然后执行`composer update`将包引入laravel项目
  
 ## 2.修改`config/app.php`
 
    'providers' => [
        //增加
        Elasticquent\ElasticquentServiceProvider::class,
    ],
    
    'aliases' => [
        //增加
        'Es' => Elasticquent\ElasticquentElasticsearchFacade::class,
    ],

## 3.Model 文件使用 `Elasticquent\ElasticquentTrait;`

    use Elasticquent\ElasticquentTrait;
    
    class Article extends Eloquent
    {
        use ElasticquentTrait;
    }
    
 ## 4.生成elasticquent配置文件
    php artisan vendor:publish --provider="Elasticquent\ElasticquentServiceProvider"
上述命令生成`/app/config/elasticquent.php`文件

## 5.