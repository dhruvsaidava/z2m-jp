<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test mod_rewrite</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }
        .status-box {
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            font-size: 1.2em;
        }
        .success {
            background: #d4edda;
            border: 2px solid #28a745;
            color: #155724;
        }
        .error {
            background: #f8d7da;
            border: 2px solid #dc3545;
            color: #721c24;
        }
        .info {
            background: #d1ecf1;
            border: 2px solid #17a2b8;
            color: #0c5460;
            font-size: 0.9em;
        }
        h1 { color: #2c3e50; }
        h2 { color: #34495e; margin-top: 30px; }
        code {
            background: #f4f4f4;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: monospace;
        }
        pre {
            background: #2c3e50;
            color: #ecf0f1;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
        .test-links {
            margin: 20px 0;
        }
        .test-links a {
            display: inline-block;
            margin: 5px 10px 5px 0;
            padding: 10px 15px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .test-links a:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <h1>🔍 mod_rewrite Test</h1>
    
    <?php
    $rewriteEnabled = false;
    $apacheFunctions = false;
    
    // Check if apache_get_modules function exists
    if (function_exists('apache_get_modules')) {
        $apacheFunctions = true;
        if (in_array('mod_rewrite', apache_get_modules())) {
            $rewriteEnabled = true;
        }
    }
    
    if ($rewriteEnabled): ?>
        <div class="status-box success">
            <strong>✅ SUCCESS!</strong><br>
            mod_rewrite is <strong>ENABLED</strong>
        </div>
        
        <div class="info">
            <strong>✨ Clean URLs are ready to use!</strong><br>
            Your documentation should work with clean URLs like <code>/about</code> and <code>/flow</code>
        </div>
        
    <?php elseif ($apacheFunctions): ?>
        <div class="status-box error">
            <strong>❌ NOT ENABLED</strong><br>
            mod_rewrite is <strong>DISABLED</strong>
        </div>
        
        <div class="info">
            <strong>📋 To enable mod_rewrite:</strong><br><br>
            1. Open <code>C:\xampp\apache\conf\httpd.conf</code><br>
            2. Find: <code>#LoadModule rewrite_module modules/mod_rewrite.so</code><br>
            3. Remove the <code>#</code> to uncomment it<br>
            4. Find <code>&lt;Directory "C:/xampp/htdocs"&gt;</code><br>
            5. Change <code>AllowOverride None</code> to <code>AllowOverride All</code><br>
            6. Save and restart Apache
        </div>
        
    <?php else: ?>
        <div class="status-box error">
            <strong>⚠️ UNABLE TO DETECT</strong><br>
            Cannot determine if mod_rewrite is enabled (function not available)
        </div>
        
        <div class="info">
            This might be because you're using PHP CLI or a non-Apache server.<br>
            For XAMPP with Apache, follow the setup instructions in <strong>CLEAN-URLS-GUIDE.md</strong>
        </div>
    <?php endif; ?>
    
    <h2>🧪 Test Clean URLs</h2>
    <p>Click these links to test if clean URLs are working:</p>
    
    <div class="test-links">
        <a href="home">🏠 Home</a>
        <a href="about">🧭 About</a>
        <a href="flow">📅 Flow</a>
        <a href="software">💻 Software</a>
        <a href="contact">📞 Contact</a>
    </div>
    
    <p><strong>Expected behavior:</strong> These links should take you to the corresponding pages in your documentation.</p>
    
    <h2>📊 Server Information</h2>
    <div class="info">
        <strong>PHP Version:</strong> <?php echo phpversion(); ?><br>
        <strong>Server Software:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?><br>
        <strong>Document Root:</strong> <?php echo $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown'; ?><br>
        <strong>Current File:</strong> <?php echo __FILE__; ?>
    </div>
    
    <?php if ($apacheFunctions): ?>
    <h2>📦 Loaded Apache Modules</h2>
    <div class="info">
        <pre><?php 
        $modules = apache_get_modules();
        sort($modules);
        foreach ($modules as $module) {
            echo ($module === 'mod_rewrite' ? '✅ ' : '   ') . $module . "\n";
        }
        ?></pre>
    </div>
    <?php endif; ?>
    
    <hr style="margin: 40px 0;">
    
    <p><a href="./">← Back to Documentation</a> | <a href="CLEAN-URLS-GUIDE.md" target="_blank">📖 Setup Guide</a></p>
</body>
</html>


