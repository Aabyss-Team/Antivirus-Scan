<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <link rel="icon" href="favicon.ico">
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
            width: 60%;
            max-width: 800px;
            padding: 40px;
            text-align: center;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        textarea {
            width: 100%;
            height: 200px;
            margin-top: 20px;
            padding: 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }
        .button-group {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        button {
            padding: 10px 25px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .submit-button {
            background-color: #4CAF50;
            color: white;
        }
        .submit-button:hover {
            background-color: #45a049;
        }
        .clear-button {
            background-color: #f44336;
            color: white;
        }
        .clear-button:hover {
            background-color: #e53935;
        }
        .copy-button {
            background-color: #008CBA;
            color: white;
        }
        .copy-button:hover {
            background-color: #007B9A;
        }
        .result {
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            max-height: 300px;
            overflow-y: auto;
        }
        .result p {
            text-align: center; /* 每行内容居中显示 */
            margin: 5px 0;
        }
        #commandInput {
            width: 200px;
            padding: 10px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
    <script>
        function clearTextarea() {
            document.getElementById('user_input').value = '';
        }

        function copyToClipboard() {
            var copyText = document.getElementById("commandInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999); // 对移动设备有用
            document.execCommand("copy");
            alert("已复制: " + copyText.value);
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

            // 按行拆分输入的内容
            $lines = explode("\n", $input);

            // 加载并解析 JSON 文件
            $jsonData = file_get_contents('auto.json');
            $data = json_decode($jsonData, true);

            // 遍历每一行输入
            foreach ($lines as $line) {
                $line = trim($line); // 移除前后空白字符

                // 遍历 JSON 数据，检查每个软件的进程列表
                foreach ($data as $softwareName => $details) {
                    $processes = $details['processes'];
                    $url = $details['url'];

                    // 检查是否包含指定的进程名，且匹配行的开头
                    foreach ($processes as $process) {
                        if (stripos($line, $process) === 0) {  // 使用 stripos 忽略大小写，并确保匹配开头
                            $result .= htmlspecialchars($process) . " ==> <strong>" . htmlspecialchars($softwareName) . ":</strong> <a href='" . htmlspecialchars($url) . "' target='_blank'>" . htmlspecialchars($url) . "</a><br>";
                        }
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
    <h3>如有漏报欢迎提交至我们的开源项目</br><a href="https://github.com/Aabyss-Team/Antivirus-Scan">https://github.com/Aabyss-Team/Antivirus-Scan</a></h3>
        <form action="index.php" method="POST">
            <textarea name="user_input" id="user_input" placeholder="在此输入 tasklist /SVC 命令的执行结果..."><?php echo htmlspecialchars($input); ?></textarea>
            <div class="button-group">
                <button type="submit" class="submit-button">提交</button>
                <button type="button" class="clear-button" onclick="clearTextarea()">清空</button>
                <button type="button" class="copy-button" onclick="copyToClipboard()">复制命令</button>
            </div>
        </form>
        
        <!-- 输入框用于展示要复制的命令 -->
        <input type="text" id="commandInput" value="tasklist /SVC" readonly>
        </br>
        <!-- 结果显示区域 -->
        <?php if ($result !== ''): ?>
            <div class="result">
                <?php echo $result; ?>
            </div>
        <?php endif; ?>
        <h4>项目版本号V1.5-2024.08</h4>
    </div>
</body>
</html>
