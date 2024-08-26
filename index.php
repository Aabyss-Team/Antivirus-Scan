<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>杀软在线识别-渊龙Sec安全团队</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            width: 50%; /* 宽度设置为50% */
            padding: 40px; /* 增加内边距 */
            text-align: center;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px; /* 增加圆角 */
        }
        textarea {
            width: 100%;
            height: 200px;
            margin-top: 20px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
        button.clear {
            background-color: #f44336;
        }
        button.clear:hover {
            background-color: #e53935;
        }
        .result {
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
            word-wrap: break-word;
        }
    </style>
    <script>
        function clearForm() {
            // 清空文本框和结果显示区域
            document.getElementById('user_input').value = '';
            document.getElementById('result').innerHTML = '';
        }
    </script>
</head>
<body>
    <div class="container">
        <?php
        // 初始化变量
        $result = '';
        $input = '';

        // 处理 POST 请求
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input = $_POST['user_input'] ?? '';

            // 加载并解析 JSON 文件
            $jsonData = file_get_contents('auto.json');
            $data = json_decode($jsonData, true);

            // 遍历 JSON 数据，检查每个软件的进程列表
            foreach ($data as $softwareName => $details) {
                $processes = $details['processes'];
                $url = $details['url'];

                // 检查是否包含指定的进程名
                foreach ($processes as $process) {
                    if (stripos($input, $process) !== false) {  // 使用 stripos 忽略大小写
                        $result .= "$process ==> $softwareName: <a href=\"$url\" target=\"_blank\">$url</a><br>";
                    }
                }
            }

            // 如果没有匹配项
            if ($result === '') {
                $result = "未找到匹配的进程，如有漏报欢迎提交至我们的开源项目</br><a href=\"https://github.com/Aabyss-Team/Antivirus-Scan\">https://github.com/Aabyss-Team/Antivirus-Scan</a>";
            }
        }
        ?>

        <!-- 表单 -->
        <h1>杀软在线识别-<a href="https://www.aabyss.cn">渊龙Sec安全团队</a></h1>
    <h3>如有漏报欢迎提交至我们的开源项目</br><a href=\"https://github.com/Aabyss-Team/Antivirus-Scan\">https://github.com/Aabyss-Team/Antivirus-Scan</a></h3>
        <form action="index.php" method="POST">
            <textarea name="user_input" id="user_input" placeholder="在此输入内容..."><?php echo htmlspecialchars($input); ?></textarea>
            <div>
                <button type="submit">提交</button>
                <button type="button" class="clear" onclick="clearForm()">清空</button>
            </div>
        </form>
        </br>
        <!-- 结果显示区域 -->
        <div class="result" id="result">
            <?php echo $result; ?>
        </div>
    </div>
</body>
</html>
