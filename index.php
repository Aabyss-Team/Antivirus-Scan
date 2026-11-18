<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <link rel="icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>杀软在线识别-渊龙Sec安全团队</title>
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="styles.css">
    <script>
        function clearTextarea() {
            document.getElementById('user_input').value = '';
        }

        function copyToClipboard() {
            var copyText = document.getElementById("commandInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999); // 对移动设备有用
            document.execCommand("copy");
            
            // 显示通知
            const notification = document.createElement('div');
            notification.className = 'copy-notification';
            notification.textContent = '已复制: ' + copyText.value;
            document.body.appendChild(notification);
            
            // 触发重排以应用动画
            setTimeout(() => {
                notification.classList.add('show');
            }, 10);
            
            // 2秒后移除通知
            setTimeout(() => {
                notification.classList.remove('show');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 2000);
        }
        
        // 添加按钮点击波纹效果
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('div');
                ripple.classList.add('ripple');
                this.appendChild(ripple);
                
                const rect = button.getBoundingClientRect();
                ripple.style.left = `${e.clientX - rect.left}px`;
                ripple.style.top = `${e.clientY - rect.top}px`;
                
                setTimeout(() => ripple.remove(), 600);
            });
        });

        // 添加页面加载动画
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.5s ease';
                document.body.style.opacity = '1';
            }, 100);

            const text = "渊龙Sec安全团队";
            const animatedText = document.querySelector('.animated-text');
            
            text.split('').forEach(char => {
                const span = document.createElement('span');
                span.textContent = char;
                animatedText.appendChild(span);
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <header>
            <h1>杀软在线识别-<a href="https://www.aabyss.cn" class="animated-text"></a></h1>
            <h3><b>如有漏报欢迎提交至我们的开源项目<br>
            <a href="https://github.com/Aabyss-Team/Antivirus-Scan">https://github.com/Aabyss-Team/Antivirus-Scan</a></b></h3>
        </header>

<?php
// 初始化变量
$result = '';
$input = '';

// 处理 POST 请求
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['user_input'] ?? '';

    // 按行拆分输入的内容
    $lines = explode("\n", $input);

    // 格式化处理：找到每行中的 " K " 和 " KB " 并换行处理
    $formattedLines = [];
    foreach ($lines as $line) {
        $line = trim($line);

        // 处理 " KB " 的格式化
        if (strpos($line, ' KB ') !== false) {
            $parts = explode('KB', $line);
            foreach ($parts as $key => $part) {
                $formattedLines[] = trim($part) . ($key < count($parts) - 1 ? 'KB' : '');
            }
        } 
        // 处理 " K " 的格式化
        elseif (strpos($line, ' K ') !== false) {
            $parts = explode('K', $line);
            foreach ($parts as $key => $part) {
                $formattedLines[] = trim($part) . ($key < count($parts) - 1 ? 'K' : '');
            }
        } else {
            $formattedLines[] = $line;
        }
    }

    // 重组格式化后的文本
    $formattedText = implode("\n", $formattedLines);

    // 从 JSON 文件读取数据
    $jsonData = file_get_contents('auto.json');
    $data = json_decode($jsonData, true);

    // 匹配处理
    $matches = [];
    foreach (explode("\n", $formattedText) as $line) {
        foreach ($data as $key => $value) {
            foreach ($value['processes'] as $process) {
                if (stripos($line, $process) === 0) { // 仅匹配每行的开头部分，且忽略大小写
                    // 如果软件名已存在，则添加到现有的进程列表中
                    if (!isset($matches[$key])) {
                        $matches[$key] = [
                            'url' => $value['url'],
                            'processes' => []
                        ];
                    }
                    $matches[$key]['processes'][] = htmlspecialchars($process);
                }
            }
        }
    }
    // 去重每个软件名对应的进程列表
    foreach ($matches as $key => $details) {
        $matches[$key]['processes'] = array_unique($details['processes']);
    }

    // 生成 HTML 显示结果
    if (count($matches) > 0) {
        foreach ($matches as $softwareName => $details) {
            $result .= "<p><strong>" . htmlspecialchars($softwareName) . ":</strong> " 
                        . implode(', ', $details['processes']) . " ==> <a href=\"" 
                        . htmlspecialchars($details['url']) . "\" target=\"_blank\">" 
                        . htmlspecialchars($details['url']) . "</a></p>";
        }
    } else {
        $result = "<p>未找到匹配的进程，如有漏报欢迎提交至我们的开源项目</br><a href=\"https://github.com/Aabyss-Team/Antivirus-Scan\">https://github.com/Aabyss-Team/Antivirus-Scan</a></p>";
    }
}
?>
        <!-- 表单 -->
        <section class="search-section">
            <form action="index.php" method="POST">
                <textarea name="user_input" id="user_input" placeholder="在此输入 tasklist /SVC 命令的执行结果..."><?php echo htmlspecialchars($input); ?></textarea>
                
                <div class="command-container">
                    <input type="text" id="commandInput" value="tasklist /SVC" readonly>
                </div>
                
                <div class="button-group">
                    <button type="submit" class="submit-button">
                        <i class="fas fa-search"></i> 提交分析
                    </button>
                    <button type="button" class="clear-button" onclick="clearTextarea()">
                        <i class="fas fa-trash-alt"></i> 清空内容
                    </button>
                    <button type="button" class="copy-button" onclick="copyToClipboard()">
                        <i class="fas fa-copy"></i> 复制命令
                    </button>
                </div>
            </form>
        </section>
        
        <!-- 结果显示区域 -->
        <?php if ($result !== ''): ?>
        <section class="results-section">
            <div class="results-header">
                <h2><i class="fas fa-shield-alt"></i> 分析结果</h2>
            </div>
            <div class="result">
                <?php echo $result; ?>
            </div>
        </section>
        <?php endif; ?>
        
        <div class="footer">
            <p><b>项目版本号 V1.8.6-2026.11</b></p>
        </div>
    </div>
</body>
</html>
