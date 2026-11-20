![Antivirus-Scan](https://socialify.git.ci/Aabyss-Team/Antivirus-Scan/image?description=1&descriptionEditable=What%20AV%3F%20%E4%B8%80%E6%AC%BE%E8%BD%BB%E9%87%8F%E7%BA%A7%E7%9A%84%E6%9D%80%E8%BD%AF%E5%9C%A8%E7%BA%BF%E8%AF%86%E5%88%AB%E7%9A%84%E9%A1%B9%E7%9B%AE%EF%BC%8C%E6%8C%81%E7%BB%AD%E6%9B%B4%E6%96%B0ing&font=Bitter&forks=1&issues=1&language=1&logo=https%3A%2F%2Favatars.githubusercontent.com%2Fu%2F54609343%3Fs%3D200%26v%3D4&name=1&owner=1&pattern=Overlapping%20Hexagons&pulls=1&stargazers=1&theme=Dark)

## ✈️ 工具概述

杀软识别一直是内网渗透中常见的课题，网络上也有非常多的在线杀软识别的网站

但很多在线识别的网站，都已经年久失修，许多新的杀软进程无法有效准确识别

本项目就是做一款长期维护的在线杀软识别网站，帮助各位师傅在内网渗透中更进一步~

![Antivirus-Scan-3](./img/Antivirus-Scan-3.png)

项目在线地址：[https://av.aabyss.cn/](https://av.aabyss.cn/)，欢迎各位师傅给我们点点Star~😘

## 📝 TODO

* [x] 2026-11-18 新增对于 `FortiEDR` 飞塔EDR的识别补充
* [x] 2026-11-18 优化对于 `Sophos` Sophos相关进程的识别补充
* [x] 2026-11-18 新增对于 `Sonicwall` Sonicwall的识别，感谢 @BugFor-Pings 师傅提供的资料
* [x] 2025-10-22 新增对于 `Windows Defender Advanced Threat Protection` Defender ATP的识别，感谢 @Re1axCyber 师傅提供的资料
* [x] 2025-10-22 感谢 @namoen0301 师傅提交的PR，优化对于 `F-Secure & WithSecure` 的识别补充
* [x] 2025-7-8 感谢 @Fadouse 师傅提交的PR，新增对于 `Elastic EDR` 的识别补充
* [x] 2025-4-29 新增对于 `Trellix EDR` 火眼EDR进程（McAfee引擎）的识别，具体可见链接：[Combination of McAfee Enterprise and FireEye Complete](https://www.trellix.com/news/press-releases/combination-of-mcafee-enterprise-and-fireeye-complete/)
* [x] 2025-4-20 将调用的 `all.min.css` 及 `fa-solid-900.woff2` 放到本地加载，优化网页打开速度
* [x] 2025-4-20 新增对于 `戎码翼龙 NG-EDR` 戎码EDR进程的识别补充
* [x] 2025-3-18 感谢 @BushANQ 师傅提交的PR，新增对于 `Norton V25` 的识别补充
* [x] 2025-3-18 感谢 @BushANQ 师傅对本项目UI的优化
* [x] 2025-3-4 优化对于 `Symantec` 赛门铁克及 `Norton` 诺顿进程的识别
* [x] 2025-1-27 新增对于 `Trend Micro` 趋势科技进程的识别，感谢 @ghoulsec 师傅提供的资料
* [x] 2024-10-1 新增对于 `NuboshEndpoint` 奇安信统一服务器安全进程的识别，感谢 @byyanxia 师傅提供的资料
* [x] 2024-9-6 进行CDN链路的优化，在线识别的网站允许全球访问
* [x] 2024-9-2 感谢 @msmoshang 师傅提交的PR，对杀软识别结果的去重处理
* [x] 2024-9-2 感谢 @Mr-xn 师傅提交的PR，新增对于 `Norton` 以及 `Kaspersky` 的识别补充
* [x] 2024-9-2 针对于提交的文本挤在一起无法识别的情况，进行了专门的优化匹配
* [x] 2024-9-2 新增对于 `Fortinet` 飞塔进程的识别补充
* [x] 2024-8-27 新增对于 `TQClient` 360天擎进程的识别，感谢 @DmTomHL 师傅提供的资料
* [x] 2024-8-27 感谢 @msmoshang 师傅对杀软库的去重和归档
* [x] 2024-8-26 从行开头进行进程匹配，避免进程识别结果误报
* [x] 2024-8-26 新增对于 `OneSEC` 微步终端在线安全进程的识别，感谢 @SunshineBread 师傅提供的资料
* [x] 2024-8-26 新增对于 `SentinelOne` 哨兵一号进程的识别，感谢 @wulala 师傅提供的资料
* [x] 2024-8-26 新增复制命令按钮，一键复制 `tasklist /SVC` 命令
* [x] 2024-8-26 感谢 @土豆 师傅提供的资料，更新了一些杀软库
* [x] 2024-8-26 采用Json匹配的方式，放弃数据库查询从而避免SQL注入，更加轻量化
* [x] 2024-8-26 编写了轻量级的PHP页面，并预防了XSS等问题的产生

## 🚨 项目优势

- 页面简洁明了，没有多余的资源消耗
- 代码轻量化部署，安全可靠，只需要一个PHP7环境即可
- Json格式容易维护，感谢项目 [StudyCat404/WhatAV](https://github.com/StudyCat404/WhatAV) 提供的支持
- 我们将持续维护本仓库，欢迎给我们提交PR~

## 🙏 感谢各位师傅

本项目的完成离不开以下小伙伴的贡献，感谢他们的付出！

<a href="https://github.com/Aabyss-Team/Antivirus-Scan/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Aabyss-Team/Antivirus-Scan" />
</a>

Star趋势图，感谢各位师傅点的Star~

[![Star History Chart](https://api.star-history.com/svg?repos=Aabyss-Team/Antivirus-Scan&type=Date)](https://star-history.com/#Aabyss-Team/Antivirus-Scan&Date)
