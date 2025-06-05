
# laravel复习

### basic cmd

```
laravel new procject_name
cd procject_name
php artisan serve

php8.0 or php 8.1 が必要です
composer create-project laravel/laravel demo8 "8.*"
```

### router
path: routes>

| 文件名            | 用途               | 示例前缀              | 是否有 CSRF/session |
| -------------- | ---------------- | ----------------- | ---------------- |
| `web.php`      | 网页请求 (浏览器页面)     | `/`               | ✅ 是              |
| `api.php`      | API 请求（客户端/前端）   | `/api`            | ❌ 否              |
| `channels.php` | WebSocket 广播通道定义 | 通道名               | ✅ 可控权限验证         |
| `console.php`  | Artisan 命令行脚本定义  | `php artisan xxx` | 无                |
``` 
Route::get('/', function () {
    return view('welcome');
});

对应

resources/views/welcome.blpade.php 

Route::get('/string', function () {
    return "string";
});

Route::get('/json', function () {
    return [
        'name' => 'John Doe',
        'age' => 30,];
});

Route::get('/laravel', function () {
    return redirect("https://laravel.com");
});
```

### view 视图

``` 
Route::get('/user/{id}', function ($id) {
    return view("testview", ['id' => $id]);
});

Route::get('/user', function () {
    $id = request('id');
    return view("testview", ['id' => $id]);
});

<body>
{{$id}}
</body>
```

### controller 控制器
App>Http>Controllers

``` 
php artisan make:controller UserController

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function show($id) {
        return "ID: " . $id;
    }
}

Route::get('/controller/test/{id}', [
    App\Http\Controllers\UserController::class, 'show']);
```

### database

修改default .env file 

``` 
#DB_CONNECTION=mysql
#DB_HOST=127.0.0.1
#DB_PORT=3306
#DB_DATABASE=laravel
#DB_USERNAME=root
#DB_PASSWORD=

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laraveltest8
DB_USERNAME=root
DB_PASSWORD=root
```

``` 
CREATE TABLE posts (
    id SERIAL PRIMARY KEY,      -- 自动递增主键
    slug TEXT NOT NULL,         -- slug 字段，字符串类型
    body TEXT NOT NULL          -- body 字段，字符串类型
);

INSERT INTO public.posts
(id, slug, body)
VALUES(1, 'test-slug', 'test-body');


public function showPosts($slug) {
    $post = DB::table('posts')->where("slug", $slug)->first();

    if (!$post) {
        abort(404);  // 如果找不到，返回 404
    }

//        dd($post);   调试

    return view("post", [
        "post" => $post
    ]);
}

<body>
<h1>{{$post->slug}}</h1>
<h1>{{$post->body}}</h1>
</body>
```

### migration

path: Http/Models/youCreateModelFileName.php
`php artisan make:model PostName`

- c 同时生成控制器
- m 同时生成迁移文件

path: database/migrations

创建名为 posts 的表 的迁移文件
`php artisan make:migration create_posts_table`

数据库迁移
`php artisan migrate`

数据库迁移回滚 全部从跑
`php artisan migrate:fresh`

laravel 命令行交互
`php artisan tinker`

php -S 127.0.0.1:8085 -t public
