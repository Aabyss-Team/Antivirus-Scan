![Antivirus-Scan](https://socialify.git.ci/Aabyss-Team/Antivirus-Scan/image?description=1&descriptionEditable=What%20AV%3F%20%E4%B8%80%E6%AC%BE%E8%BD%BB%E9%87%8F%E7%BA%A7%E7%9A%84%E6%9D%80%E8%BD%AF%E5%9C%A8%E7%BA%BF%E8%AF%86%E5%88%AB%E7%9A%84%E9%A1%B9%E7%9B%AE%EF%BC%8C%E6%8C%81%E7%BB%AD%E6%9B%B4%E6%96%B0ing&font=Bitter&forks=1&issues=1&language=1&logo=https%3A%2F%2Favatars.githubusercontent.com%2Fu%2F54609343%3Fs%3D200%26v%3D4&name=1&owner=1&pattern=Overlapping%20Hexagons&pulls=1&stargazers=1&theme=Dark)

## ✈️ 工具概述

杀软识别一直是内网渗透中常见的课题，网络上也有非常多的在线杀软识别的网站

但很多在线识别的网站，都已经年久失修，许多新的杀软进程无法有效准确识别

本项目就是做一款长期维护的在线杀软识别网站，帮助各位师傅在内网渗透中更进一步~

![Antivirus-Scan-1](./img/Antivirus-Scan-1.png)

项目在线地址：[https://av.aabyss.cn/](https://av.aabyss.cn/)，欢迎各位师傅给我们点点Star~😘

## 📝 TODO

* [x] 感谢 @msmoshang 师傅对杀软库的去重和归档
* [x] 从行开头进行进程匹配，避免进程识别结果误报
* [x] 新增对于 `OneSEC` 微步终端在线安全进程的识别，感谢 @SunshineBread 师傅提供的资料
* [x] 新增对于 `SentinelOne` 哨兵一号进程的识别，感谢 @wulala 师傅提供的资料
* [x] 新增复制命令按钮，一键复制 `tasklist /SVC` 命令
* [x] 感谢 @土豆 师傅提供的资料，更新了一些杀软库
* [x] 采用Json匹配的方式，放弃数据库查询从而避免SQL注入，更加轻量化
* [x] 编写了轻量级的PHP页面，并预防了XSS等问题的产生

## 🚨 项目优势

- 页面简洁明了，没有多余的资源消耗
- 代码轻量化部署，安全可靠，只需要一个PHP7环境即可
- Json格式容易维护，感谢项目 [StudyCat404/WhatAV](https://github.com/StudyCat404/WhatAV) 提供的支持
- 我们将持续维护本仓库，欢迎给我们提交PR~

## 🙏 感谢各位师傅

[![Star History Chart](https://api.star-history.com/svg?repos=Aabyss-Team/Antivirus-Scan&type=Date)](https://star-history.com/#Aabyss-Team/Antivirus-Scan&Date)
