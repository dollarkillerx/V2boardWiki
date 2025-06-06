# V2boardWiki

### 分离主题
> https://github.com/vlesstop/v2board-theme-buddy


### V2board 目录解析
``` 
.
├── Console
│   ├── Commands    // 命令行工具
│   │   ├── CheckCommission.php
│   │   ├── CheckOrder.php
│   │   ├── CheckServer.php
│   │   ├── CheckTicket.php
│   │   ├── ClearUser.php
│   │   ├── ResetLog.php
│   │   ├── ResetPassword.php
│   │   ├── ResetTraffic.php  // 重置用户流量
│   │   ├── ResetUser.php
│   │   ├── SendRemindMail.php
│   │   ├── Test.php
│   │   ├── V2boardInstall.php      // v2安装时调用
│   │   ├── V2boardStatistics.php
│   │   └── V2boardUpdate.php
│   └── Kernel.php
├── Exceptions
│   └── Handler.php
├── Http
│   ├── Controllers 
│   │   ├── Admin  // 管理员后台接口
│   │   │   ├── ConfigController.php // 配置管理
│   │   │   ├── CouponController.php // 优惠券管理
│   │   │   ├── KnowledgeController.php // 知识库
│   │   │   ├── NoticeController.php // 公告
│   │   │   ├── OrderController.php // 订单
│   │   │   ├── PaymentController.php // 支付
│   │   │   ├── PlanController.php // 订阅套餐
│   │   │   ├── Server
│   │   │   │   ├── GroupController.php // 节点分组
│   │   │   │   ├── HysteriaController.php
│   │   │   │   ├── ManageController.php // 节点管理
│   │   │   │   ├── RouteController.php // 路由规则
│   │   │   │   ├── ShadowsocksController.php
│   │   │   │   ├── TrojanController.php
│   │   │   │   └── VmessController.php
│   │   │   ├── StatController.php // 统计
│   │   │   ├── SystemController.php // 系统信息
│   │   │   ├── ThemeController.php // 主题
│   │   │   ├── TicketController.php // 工单管理
│   │   │   └── UserController.php // 用户管理
│   │   ├── Client // 客户端相关接口
│   │   │   ├── AppController.php // 客户端信息
│   │   │   ├── ClientController.php // 客户端配置和信息获取
│   │   │   └── Protocols。 // 各类代理协议的配置生成
│   │   │       ├── Clash.php
│   │   │       ├── ClashMeta.php
│   │   │       ├── QuantumultX.php
│   │   │       ├── SagerNet.php
│   │   │       ├── Shadowsocks.php
│   │   │       └── V2rayNG.php
│   │   ├── Controller.php
│   │   ├── Guest // 访客访问接口
│   │   │   ├── CommController.php
│   │   │   ├── PaymentController.php 
│   │   │   ├── PlanController.php // 订阅套餐展示
│   │   │   └── TelegramController.php
│   │   ├── Passport  //  用户登录接口
│   │   │   ├── AuthController.php // 用户登录注册
│   │   │   └── CommController.php // 邮件验证码等
│   │   ├── Server // agent代理交互接口
│   │   │   ├── DeepbworkController.php  // v2ray
│   │   │   ├── ShadowsocksTidalabController.php // ss
│   │   │   ├── TrojanTidalabController.php // trojan
│   │   │   └── UniProxyController.php // 用户数据，流量统计
│   │   ├── Staff // 客服后台
│   │   │   ├── NoticeController.php // 公告管理
│   │   │   ├── PlanController.php // 订阅计划
│   │   │   ├── TicketController.php // 工单
│   │   │   └── UserController.php // 用户
│   │   └── User // 用户个人中心接口
│   │       ├── CommController.php
│   │       ├── CouponController.php // 优惠券
│   │       ├── InviteController.php // 邀请
│   │       ├── KnowledgeController.php // 知识库
│   │       ├── NoticeController.php // 公告
│   │       ├── OrderController.php // 订单
│   │       ├── PlanController.php // 订阅计划 
│   │       ├── ServerController.php // 节点
│   │       ├── StatController.php // 流量统计
│   │       ├── TelegramController.php // bot info
│   │       ├── TicketController.php // 工单
│   │       └── UserController.php // 个人信息
│   ├── Kernel.php
│   ├── Middleware // 中间件 
│   │   ├── Admin.php // admin权限校验
│   │   ├── Staff.php
│   │   ├── TrimStrings.php
│   │   ├── TrustProxies.php
│   │   ├── User.php
│   │   └── VerifyCsrfToken.php
│   ├── Requests  // validate 请求参数
│   └── Routes    // 路由
│       ├── AdminRoute.php
│       ├── ClientRoute.php
│       ├── GuestRoute.php
│       ├── PassportRoute.php
│       ├── ServerRoute.php
│       ├── StaffRoute.php
│       └── UserRoute.php
├── Jobs  // 异步任务
│   ├── OrderHandleJob.php // 订单处理
│   ├── SendEmailJob.php    // 发送邮件
│   ├── SendTelegramJob.php // 发送telegram消息
│   └── TrafficFetchJob.php  // 用户流量统计
├── Logging // 日志
│   ├── MysqlLogger.php
│   └── MysqlLoggerHandler.php
├── Models  // 表模型
├── Payments // 三方支付
│   ├── AlipayF2F.php
│   ├── BTCPay.php
│   ├── CoinPayments.php
│   ├── Coinbase.php
│   ├── EPay.php
│   ├── MGate.php
│   ├── StripeAlipay.php
│   ├── StripeCheckout.php
│   ├── StripeCredit.php
│   ├── StripeWepay.php
│   └── WechatPayNative.php
├── Plugins
│   └── Telegram // telegram bot 支持
├── Providers // 服务注册 router 等
├── Services  // 调用封装
│   ├── AuthService.php
│   ├── CouponService.php
│   ├── MailService.php
│   ├── OrderService.php
│   ├── PaymentService.php
│   ├── PlanService.php
│   ├── ServerService.php
│   ├── StatisticalService.php
│   ├── TelegramService.php
│   ├── ThemeService.php
│   ├── TicketService.php
│   └── UserService.php
└── Utils
```