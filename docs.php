<?php
// Simple routing system
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Sanitize page parameter
$page = preg_replace('/[^a-z0-9_-]/', '', $page);

// Define available pages
$pages = [
    'home' => ['title' => 'Welcome', 'file' => 'README.md', 'icon' => '🏠'],
    'about' => ['title' => 'About the Workshop', 'file' => 'about.md', 'icon' => '🧭'],
    'flow' => ['title' => 'Workshop Flow', 'file' => 'flow.md', 'icon' => '📅'],
    'software' => ['title' => 'Software Requirements', 'file' => 'software.md', 'icon' => '💻'],
    'learning' => ['title' => 'Learning Resources', 'file' => 'learning.md', 'icon' => '📚'],
    'arduino' => ['title' => 'Arduino Packages', 'file' => 'arduino.md', 'icon' => '💾'],
    '3dprinter' => ['title' => '3D Printer Setup', 'file' => '3dprinter.md', 'icon' => '🖨️'],
    'links' => ['title' => 'Program Links', 'file' => 'links.md', 'icon' => '🔗'],
    'facilitator' => ['title' => 'Facilitator Tips', 'file' => 'facilitator.md', 'icon' => '🧭'],
    'contact' => ['title' => 'Contact & Support', 'file' => 'contact.md', 'icon' => '📞'],
];

// Get current page info
$currentPage = $pages[$page] ?? $pages['home'];

// Read markdown file
$markdownFile = __DIR__ . '/' . $currentPage['file'];
$content = file_exists($markdownFile) ? file_get_contents($markdownFile) : 'Content not found.';

// Simple Markdown to HTML converter
require_once 'markdown-parser.php';
$htmlContent = parseMarkdown($content);

// Navigation order for Previous/Next
$navOrder = ['home', 'about', 'flow', 'software', 'learning', 'arduino', '3dprinter', 'links', 'facilitator', 'contact'];
$currentIndex = array_search($page, $navOrder);
$prevPage = $currentIndex > 0 ? $navOrder[$currentIndex - 1] : null;
$nextPage = $currentIndex < count($navOrder) - 1 ? $navOrder[$currentIndex + 1] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($currentPage['title']); ?> - Zero2Maker Japan</title>
    <meta name="description" content="Zero2Maker Japan - 2-Day Workshop Guide for hands-on innovation and maker education">
    <meta name="keywords" content="Zero2Maker, Workshop, Arduino, Innovation, Maker, Education, Japan">
    <meta name="author" content="Zero2Maker Team">
    
    <!-- Open Graph / Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo htmlspecialchars($currentPage['title']); ?> - Zero2Maker Japan">
    <meta property="og:description" content="2-Day Workshop Guide for hands-on innovation and maker education">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='0.9em' font-size='90'>📚</text></svg>">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.7;
            color: #111;
            background: #fff;
            display: flex;
            height: 100vh;
            overflow: hidden;
            font-size: 16px;
        }
        
        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #fafafa;
            border-right: 1px solid #e8e8e8;
            overflow-y: auto;
            flex-shrink: 0;
        }
        
        .sidebar-header {
            padding: 30px 20px 20px 20px;
            border-bottom: 1px solid #e8e8e8;
        }
        
        .sidebar-header h1 {
            font-size: 1.1em;
            font-weight: 600;
            color: #111;
            margin-bottom: 4px;
            letter-spacing: -0.3px;
        }
        
        .sidebar-header p {
            font-size: 0.8em;
            color: #666;
            font-weight: 400;
        }
        
        .nav-section {
            padding: 8px 0;
        }
        
        .nav-section:first-of-type {
            padding-top: 16px;
        }
        
        .nav-section-title {
            padding: 8px 20px 6px 20px;
            font-size: 0.7em;
            text-transform: uppercase;
            color: #999;
            font-weight: 600;
            letter-spacing: 0.5px;
        }
        
        .nav-item {
            display: block;
            padding: 8px 20px 8px 20px;
            color: #555;
            text-decoration: none;
            transition: all 0.15s ease;
            font-size: 0.9em;
            border-left: 2px solid transparent;
        }
        
        .nav-item:hover {
            color: #1890ff;
            background: #f0f9ff;
        }
        
        .nav-item.active {
            color: #1890ff;
            background: #f0f9ff;
            border-left-color: #1890ff;
            font-weight: 500;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            overflow-y: auto;
            background: #fff;
        }
        
        .content-wrapper {
            max-width: 860px;
            margin: 0 auto;
            padding: 50px 60px 100px 60px;
        }
        
        .content h1 {
            font-size: 2.4em;
            font-weight: 600;
            color: #111;
            margin-bottom: 24px;
            line-height: 1.3;
            letter-spacing: -0.5px;
        }
        
        .content h2 {
            font-size: 1.75em;
            font-weight: 600;
            color: #111;
            margin-top: 48px;
            margin-bottom: 16px;
            line-height: 1.4;
            letter-spacing: -0.3px;
        }
        
        .content h3 {
            font-size: 1.3em;
            font-weight: 600;
            color: #111;
            margin-top: 32px;
            margin-bottom: 12px;
            line-height: 1.4;
        }
        
        .content h4 {
            font-size: 1.1em;
            font-weight: 600;
            color: #333;
            margin-top: 24px;
            margin-bottom: 8px;
        }
        
        .content p {
            margin-bottom: 16px;
            line-height: 1.7;
            color: #333;
        }
        
        .content hr {
            border: none;
            border-top: 1px solid #e8e8e8;
            margin: 40px 0;
        }
        
        .content ul, .content ol {
            margin: 16px 0 16px 24px;
            line-height: 1.7;
        }
        
        .content li {
            margin: 8px 0;
            color: #333;
        }
        
        .content ul li {
            padding-left: 8px;
        }
        
        .content table {
            width: 100%;
            border-collapse: collapse;
            margin: 24px 0;
            border: 1px solid #e8e8e8;
        }
        
        .content th, .content td {
            padding: 12px 16px;
            text-align: left;
            border: 1px solid #e8e8e8;
        }
        
        .content th {
            background-color: #fafafa;
            color: #111;
            font-weight: 600;
            font-size: 0.9em;
        }
        
        .content tr:hover {
            background-color: #fafafa;
        }
        
        .content a {
            color: #1890ff;
            text-decoration: none;
            font-weight: 400;
        }
        
        .content a:hover {
            color: #40a9ff;
            text-decoration: underline;
        }
        
        .content blockquote {
            background: #f0f9ff;
            border-left: 3px solid #1890ff;
            padding: 16px 20px;
            margin: 24px 0;
            color: #333;
        }
        
        .content blockquote p {
            margin: 0;
        }
        
        .content code {
            background: #f5f5f5;
            padding: 3px 6px;
            border-radius: 3px;
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
            font-size: 0.88em;
            color: #1890ff;
            border: 1px solid #e8e8e8;
        }
        
        .content pre {
            background: #fafafa;
            border: 1px solid #e8e8e8;
            color: #111;
            padding: 16px;
            border-radius: 4px;
            overflow-x: auto;
            margin: 24px 0;
            line-height: 1.6;
        }
        
        .content pre code {
            background: none;
            color: #111;
            padding: 0;
            border: none;
            font-size: 0.9em;
        }
        
        .content strong {
            color: #111;
            font-weight: 600;
        }
        
        .content em {
            font-style: italic;
            color: #555;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                height: auto;
                overflow-y: visible;
                border-right: none;
                border-bottom: 1px solid #e8e8e8;
            }
            
            .content-wrapper {
                padding: 30px 20px 60px 20px;
            }
            
            .content h1 {
                font-size: 2em;
            }
            
            .content h2 {
                font-size: 1.5em;
            }
        }
        
        /* Scrollbar styling */
        .sidebar::-webkit-scrollbar,
        .main-content::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .sidebar::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 3px;
        }
        
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #bbb;
        }
        
        .main-content::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 3px;
        }
        
        .main-content::-webkit-scrollbar-thumb:hover {
            background: #bbb;
        }
        
        /* Search Box */
        .search-container {
            padding: 16px 20px;
            border-bottom: 1px solid #e8e8e8;
        }
        
        .search-box {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #e8e8e8;
            border-radius: 4px;
            font-size: 0.9em;
            color: #333;
            background: #fff;
            transition: all 0.2s;
        }
        
        .search-box:focus {
            outline: none;
            border-color: #1890ff;
            box-shadow: 0 0 0 2px rgba(24, 144, 255, 0.1);
        }
        
        .search-box::placeholder {
            color: #999;
        }
        
        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: #1890ff;
            color: white;
            border: none;
            padding: 10px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.2em;
        }
        
        .mobile-menu-toggle:hover {
            background: #40a9ff;
        }
        
        /* Previous/Next Navigation */
        .page-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 60px;
            padding-top: 30px;
            border-top: 1px solid #e8e8e8;
        }
        
        .page-nav a {
            display: inline-flex;
            align-items: center;
            padding: 10px 16px;
            background: #fafafa;
            border: 1px solid #e8e8e8;
            border-radius: 4px;
            color: #333;
            text-decoration: none;
            font-size: 0.9em;
            transition: all 0.2s;
        }
        
        .page-nav a:hover {
            background: #f0f9ff;
            border-color: #1890ff;
            color: #1890ff;
        }
        
        .page-nav-prev::before {
            content: "← ";
            margin-right: 4px;
        }
        
        .page-nav-next::after {
            content: " →";
            margin-left: 4px;
        }
        
        /* Copy Button for Code Blocks */
        .code-block-wrapper {
            position: relative;
            margin: 24px 0;
        }
        
        .copy-button {
            position: absolute;
            top: 8px;
            right: 8px;
            padding: 6px 12px;
            background: #fff;
            border: 1px solid #e8e8e8;
            border-radius: 4px;
            color: #666;
            font-size: 0.8em;
            cursor: pointer;
            transition: all 0.2s;
            opacity: 0;
        }
        
        .code-block-wrapper:hover .copy-button {
            opacity: 1;
        }
        
        .copy-button:hover {
            background: #1890ff;
            color: white;
            border-color: #1890ff;
        }
        
        .copy-button.copied {
            background: #52c41a;
            color: white;
            border-color: #52c41a;
        }
        
        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }
        
        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #1890ff;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.2em;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.2s;
            z-index: 100;
        }
        
        .back-to-top:hover {
            background: #40a9ff;
            transform: translateY(-2px);
        }
        
        .back-to-top.visible {
            display: flex;
        }
        
        /* Mobile Responsive Updates */
        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }
            
            .sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                height: 100vh;
                width: 280px;
                z-index: 999;
                transition: left 0.3s ease;
                box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            }
            
            .sidebar.open {
                left: 0;
            }
            
            .content-wrapper {
                padding: 80px 20px 60px 20px;
            }
            
            .page-nav {
                flex-direction: column;
                gap: 12px;
            }
            
            .page-nav a {
                width: 100%;
                justify-content: center;
            }
        }
        
        /* Print Styles */
        @media print {
            .sidebar,
            .mobile-menu-toggle,
            .back-to-top,
            .page-nav,
            .copy-button {
                display: none !important;
            }
            
            .main-content {
                width: 100%;
            }
            
            .content-wrapper {
                max-width: 100%;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">☰</button>
    
    <!-- Sidebar Navigation -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <h1>Zero2Maker Japan</h1>
            <p>Workshop Guide</p>
        </div>
        
        <!-- Search Box -->
        <div class="search-container">
            <input type="text" 
                   class="search-box" 
                   id="searchBox" 
                   placeholder="Search documentation..." 
                   onkeyup="searchDocs()"
                   autocomplete="off">
        </div>
        
        <nav class="nav-section">
            <a href="home" class="nav-item <?php echo $page === 'home' ? 'active' : ''; ?>">
                Introduction
            </a>
        </nav>
        
        <nav class="nav-section">
            <div class="nav-section-title">Workshop Overview</div>
            <a href="about" class="nav-item <?php echo $page === 'about' ? 'active' : ''; ?>">
                About the Workshop
            </a>
            <a href="flow" class="nav-item <?php echo $page === 'flow' ? 'active' : ''; ?>">
                Workshop Flow
            </a>
        </nav>
        
        <nav class="nav-section">
            <div class="nav-section-title">Tools & Resources</div>
            <a href="software" class="nav-item <?php echo $page === 'software' ? 'active' : ''; ?>">
                Software Requirements
            </a>
            <a href="learning" class="nav-item <?php echo $page === 'learning' ? 'active' : ''; ?>">
                Learning Resources
            </a>
            <a href="arduino" class="nav-item <?php echo $page === 'arduino' ? 'active' : ''; ?>">
                Arduino Packages
            </a>
            <a href="3dprinter" class="nav-item <?php echo $page === '3dprinter' ? 'active' : ''; ?>">
                3D Printer Setup
            </a>
        </nav>
        
        <nav class="nav-section">
            <div class="nav-section-title">Program Information</div>
            <a href="links" class="nav-item <?php echo $page === 'links' ? 'active' : ''; ?>">
                Program Links
            </a>
            <a href="facilitator" class="nav-item <?php echo $page === 'facilitator' ? 'active' : ''; ?>">
                Facilitator Tips
            </a>
            <a href="contact" class="nav-item <?php echo $page === 'contact' ? 'active' : ''; ?>">
                Contact & Support
            </a>
        </nav>
    </div>
    
    <!-- Main Content Area -->
    <div class="main-content" id="mainContent">
        <div class="content-wrapper">
            <div class="content" id="content">
                <?php echo $htmlContent; ?>
            </div>
            
            <!-- Previous/Next Navigation -->
            <div class="page-nav">
                <?php if ($prevPage): ?>
                    <a href="<?php echo $prevPage; ?>" class="page-nav-prev">
                        <?php echo $pages[$prevPage]['title']; ?>
                    </a>
                <?php else: ?>
                    <span></span>
                <?php endif; ?>
                
                <?php if ($nextPage): ?>
                    <a href="<?php echo $nextPage; ?>" class="page-nav-next">
                        <?php echo $pages[$nextPage]['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop" onclick="scrollToTop()">↑</div>
    
    <script>
        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-menu-toggle');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target) && 
                sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
            }
        });
        
        // Search Functionality
        function searchDocs() {
            const searchText = document.getElementById('searchBox').value.toLowerCase();
            const navItems = document.querySelectorAll('.nav-item');
            
            navItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (text.includes(searchText)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
        
        // Copy Button for Code Blocks
        document.addEventListener('DOMContentLoaded', function() {
            const codeBlocks = document.querySelectorAll('pre code');
            
            codeBlocks.forEach((codeBlock) => {
                const pre = codeBlock.parentElement;
                const wrapper = document.createElement('div');
                wrapper.className = 'code-block-wrapper';
                
                pre.parentNode.insertBefore(wrapper, pre);
                wrapper.appendChild(pre);
                
                const button = document.createElement('button');
                button.className = 'copy-button';
                button.textContent = 'Copy';
                button.onclick = function() {
                    const code = codeBlock.textContent;
                    navigator.clipboard.writeText(code).then(() => {
                        button.textContent = 'Copied!';
                        button.classList.add('copied');
                        setTimeout(() => {
                            button.textContent = 'Copy';
                            button.classList.remove('copied');
                        }, 2000);
                    });
                };
                
                wrapper.appendChild(button);
            });
        });
        
        // Back to Top Button
        const mainContent = document.getElementById('mainContent');
        const backToTop = document.getElementById('backToTop');
        
        mainContent.addEventListener('scroll', function() {
            if (mainContent.scrollTop > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });
        
        function scrollToTop() {
            mainContent.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
        
        // Keyboard Shortcuts
        document.addEventListener('keydown', function(event) {
            // Press '/' to focus search
            if (event.key === '/' && !event.ctrlKey && !event.metaKey) {
                event.preventDefault();
                document.getElementById('searchBox').focus();
            }
            
            // Press 'Escape' to clear search
            if (event.key === 'Escape') {
                document.getElementById('searchBox').value = '';
                searchDocs();
            }
            
            // Arrow keys for navigation (when not in input)
            if (event.target.tagName !== 'INPUT') {
                <?php if ($prevPage): ?>
                if (event.key === 'ArrowLeft') {
                    window.location.href = '<?php echo $prevPage; ?>';
                }
                <?php endif; ?>
                
                <?php if ($nextPage): ?>
                if (event.key === 'ArrowRight') {
                    window.location.href = '<?php echo $nextPage; ?>';
                }
                <?php endif; ?>
            }
        });
    </script>
</body>
</html>

