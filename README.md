# PSN API 库  
## 安装
```shell
composer require abtswath/psn-client
```
## 使用
### 登录
1. 登录 [PlayStation](https://www.playstation.com/)
2. 到[这个页面](https://ca.account.sony.com/api/v1/ssocookie)获取 NPSSO token 并复制。
3. 使用 NOSSO token 换取 oauth token
```injectablephp
use Abtswath\PSNClient\Client;

$npsso = '上一步获取的 NPSSO';
$client = new Client();
$authToken = $client->auth()->login($npsso);
$accessToken = $authToken->getAccessToken();
$client->setAccessToken($accessToken);
```
### API
```injectablephp
$client->user()->gameList(); // 获取用户游戏列表
$client->user()->trophyTitles(); // 获取用户奖杯列表
$client->trophy()->trophies(); // 获取某个游戏奖杯列表
$client->trophy()->earned(); // 获取某个游戏已解锁的奖杯
```
## 参考
本工具库的实现参考了 [https://andshrew.github.io/PlayStation-Trophies](https://andshrew.github.io/PlayStation-Trophies) 与 [https://github.com/Tustin/psn-php](https://github.com/Tustin/psn-php)，具体的接口返回示例与请求参数说明请参考以上文档。
