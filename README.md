# 简介

Portsta 是一个基于php的端口扫描器，用于扫描某IP或某IP段下各端口的开启情况。

# 环境配置

Portsta 需要php-cli环境,已在macOS测试。

macOS可使用自带php。

亦可使用homebrew 独立安装最新版php。

```
brew install php
```

# 下载

```git clone https://github.com/StaZhu/portsta.git```

# 修改参数

portsta-ip用于扫描单个IP地址的端口开启情况，请修改IP和端口段

portsta-ip-segment用于扫描IP地址段内的端口开启情况，请修改IP段和端口段

# 开启扫描

```
cd portsta
php portsta-ip.php
php portsta-ip-segment.php
```

# 许可证

 GPL General Public License 3.0 see <http://www.gnu.org/licenses/gpl-3.0.html>