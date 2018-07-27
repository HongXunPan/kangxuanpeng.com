## [www.kangxuanpeng.com](http://www.kangxuanpeng.com) 网站布局图

### index 首页

##### view

| |  | |  | |
| :------: | :------:  | :------:  | :------ | :------: |
| | | |
| | | |
| | | |
| | | |
| | | HongXunPan | | |
| | | |
| | | |
| [xxx](http://xxx.kangxuanpeng.com) | [xxx](http://xxx.kangxuanpeng.com)  | [blog](http://blog.kangxuanpeng.com) | [About Me](http://me.kangxuanpeng.com) | [contact](http://www.kangxuanpeng.com/contact) |
| | | |
| | | |
| | | |
| | | |
| | | |
| | | copyright---xxx@ccas | | |

##### function

- title : 康宣鹏 · HongXunPan · kangxuanpeng
- meta in header ``` for seo , such as http://www.dandyweng.com/ ```
- change scroll bar style to google's


### blog 博客

##### view - list 列表页

| [logo](http://bolg.kangxuanpeng.com) | nav  | xx xx xx xx |  | |
| :------: | :------:  | :------:  | :------ | :------: |
| | | | | |
| | | | | |
| | | time8  | event xx | |
| | event x | time7 | | |
| | | time6 | event | |
| | | time5 | | |
| | | time4 | | |
| | | time3 | | |
| | | time2 | | |
| | | time1 | | [^](go top) |
| | | time0 | | |
| | | | | |

##### view - info 博客详情页

| | | nav |  | |
| :------: | :------:  | :------:  | :------ | :------: |
| crumbs |  | | | |
| | | title | | |
|  | label.. | author | date-time | |
| | | | | |
| | | content | | |
| | | | | [^](go top) |
| \<prev | | | | next\>|
| | comment | | | |
| | | | | |


##### function
 
 - time axis at center,event around
 - content support markdown
 - comment support markdown two
 - comment can be reply , no login , input name,email ```such as jianshu.com or laravelacademy.org```
 
 now can use [typecho](https://github.com/typecho/typecho)
 
 ### about me 个人资料页
 
 my resume ```base on markdown```
 
 ### contact 联系方式页
 
 how can contact me:
 - wechat
 - fb
 - ins
 - 
 or u can leave a message on this form
 
 ## 安装步骤
 
 - copy 代码
 
 ```git clone https://github.com/HongXunPan/kangxuanpeng.com.git```
 
 - 安装依赖
 
 ```composer update```
 
 - 配置文件 .env 放到根目录
 
 - 执行迁移文件
 ```php artisan migration```
 
 ```php artisan migration --path=database/migrations/blog```
 
 ## [MyBlog](http://blog.kangxuanpeng.com)
 
 模板来自于[linpx.cn](https://www.linpx.com/),基于typecho的 Pinghsu 皮肤，作者是 Chakhsu
 
 ### database数据库设计
  
 ##### table:posts 文章表
 
 | column | type | attribute | comment |
 | --- | --- | ---| --- |
 | post_id | int(11) | PK auto increase | 文章ID |
 | post_name | varchar(200) | default '' | 文章标题 |
 | slug | varchar(100) | unique default '' | [将文章标题转化为URL的一部分，以利于SEO](https://laravel-china.org/topics/2857/write-a-url-slug-wheel-to-support-chinese-translation) |
 | content | text |  | 文章内容，存放md格式 |
 | author_id | int(11) | default 0 | 作者id |
 | comment_num | int(11) | default 0 | 评论数(冗余字段) |
 | created_at | int(11) | default 0 | 创建时间 |
 | updated_at | int(11) | default 0 | 修改时间 |
 | status | tinyint(1) | default 0 | 草稿or已发布 |
 | | | | |
 
 ##### table:comments 评论表
 
 | column | type | attribute | comment |
 | --- | --- | ---| --- |
 | comment_id | int(11) | PK auto increase | 评论ID |
 | post_id | int(11) | default 0 | 文章ID |
 | content | text | | 评论内容 |
 | parent_id | int(11) | default 0 | 父评论id |
 | nick_name | varchar(30) | default '' | 评论者昵称 |
 | email | varchar(50) | default '' | 评论者邮箱 |
 | site | varchar(50) | default '' | 评论者网站 |
 | created_at | int(11) | default 0 | 评论时间|
 | status | tinyint(1) | default 0 | 状态 删除or正常 |
 | | | | |
 
 ##### table:tags 分类表
 
 | column | type | attribute | comment |
 | --- | --- | ---| --- |
 | tag_id | int(5) | PK auto increase | 标签ID |
 | tag_name | varchar(50) | default '' | 标签名称 |
 | | | | |
 
 ##### table:post_tag_relations 文章分类的关系表
 
 | column | type | attribute | comment |
 | --- | --- | ---| --- |
 | post_id | int(11) | PK1 | 文章ID |
 | tag_id | int(5) | PK1 | 标签ID |
 | | | | |
