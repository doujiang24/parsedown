
## 2/statuses/public timeline

api from weibo (http://open.weibo.com/wiki/2/statuses/public_timeline)

powerd by [Markdown parser for PHP](https://github.com/doujiang24/parsedown).

### statuses/public timeline

返回最新的200条公共微博，返回结果非完全实时

### URL

<https://api.weibo.com/2/statuses/public_timeline.json>

### 支持格式

JSON

### HTTP请求方式

GET

### 是否需要登录

是

关于登录授权，参见 [如何登录授权](http://open.weibo.com/wiki/%E6%8E%88%E6%9D%83%E6%9C%BA%E5%88%B6%E8%AF%B4%E6%98%8E)


### 访问授权限制

访问级别：普通接口

频次限制：是

关于频次限制，参见 [接口访问权限说明](http://open.weibo.com/wiki/Rate-limiting)


### 请求参数

key         |必选   |类型及范围 |说明
---         |---    |---        |---
source      |false  |string     |采用OAuth授权方式不需要此参数，其他授权方式为必填参数，数值为应用的AppKey。

access_token|false  |string     |采用OAuth授权方式为必填参数，其他授权方式不需要此参数，OAuth授权后获得。
count       |false  |int        |单页返回的记录条数，最大不超过200，默认为20。


### 注意事项

无

### 调用样例及调试工具

[API测试工具](http://open.weibo.com/tools/console?uri=statuses/public_timeline&httpmethod=GET&)


### 返回结果


JSON示例

``` json
{
    "statuses": [
        {
            "created_at": "Tue May 31 17:46:55 +0800 2011",
            "id": 11488058246,
            "text": "求关注。",
            "source": "<a href="http://weibo.com" rel="nofollow">新浪微博</a>",
            "favorited": false,
            "truncated": false,
            "in_reply_to_status_id": "",
            "in_reply_to_user_id": "",
            "in_reply_to_screen_name": "",
            "geo": null,
            "mid": "5612814510546515491",
            "reposts_count": 8,
            "comments_count": 9,
            "annotations": [],
            "user": {
                "id": 1404376560,
                "screen_name": "zaku",
                "name": "zaku",
                "province": "11",
                "city": "5",
                "location": "北京 朝阳区",
                "description": "人生五十年，乃如梦如幻；有生斯有死，壮士复何憾。",
                "url": "http://blog.sina.com.cn/zaku",
                "profile_image_url": "http://tp1.sinaimg.cn/1404376560/50/0/1",
                "domain": "zaku",
                "gender": "m",
                "followers_count": 1204,
                "friends_count": 447,
                "statuses_count": 2908,
                "favourites_count": 0,
                "created_at": "Fri Aug 28 00:00:00 +0800 2009",
                "following": false,
                "allow_all_act_msg": false,
                "remark": "",
                "geo_enabled": true,
                "verified": false,
                "allow_all_comment": true,
                "avatar_large": "http://tp1.sinaimg.cn/1404376560/180/0/1",
                "verified_reason": "",
                "follow_me": false,
                "online_status": 0,
                "bi_followers_count": 215
            }
        },
        ...
    ],
    "previous_cursor": 0,                    // 暂未支持
    "next_cursor": 11488013766,     // 暂未支持
    "total_number": 81655
}
```

More examples in [the wiki](https://github.com/erusev/parsedown/wiki/Usage).

