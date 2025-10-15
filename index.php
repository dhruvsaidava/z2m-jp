<?php
// Redirect to home page with clean URL
header('Location: home');
exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🇯🇵 Zero2Maker Japan — 2-Day Workshop Guide</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f5f5f5;
            padding: 20px;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #2c3e50;
            font-size: 2.5em;
            margin-bottom: 10px;
            border-bottom: 3px solid #3498db;
            padding-bottom: 15px;
        }
        
        h2 {
            color: #34495e;
            font-size: 1.8em;
            margin-top: 40px;
            margin-bottom: 20px;
            border-left: 5px solid #3498db;
            padding-left: 15px;
        }
        
        h3 {
            color: #555;
            font-size: 1.4em;
            margin-top: 25px;
            margin-bottom: 15px;
        }
        
        .subtitle {
            font-style: italic;
            color: #7f8c8d;
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        
        hr {
            border: none;
            border-top: 2px solid #ecf0f1;
            margin: 30px 0;
        }
        
        p {
            margin-bottom: 15px;
        }
        
        strong {
            color: #2c3e50;
        }
        
        em {
            color: #e74c3c;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }
        
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        ul {
            margin: 20px 0;
            padding-left: 20px;
        }
        
        li {
            margin: 15px 0;
            list-style: none;
            position: relative;
        }
        
        li:before {
            content: "▸";
            color: #3498db;
            font-weight: bold;
            margin-right: 10px;
        }
        
        a {
            color: #3498db;
            text-decoration: none;
            font-weight: 600;
        }
        
        a:hover {
            color: #2980b9;
            text-decoration: underline;
        }
        
        blockquote {
            background: #ecf0f1;
            border-left: 5px solid #3498db;
            padding: 15px 20px;
            margin: 20px 0;
            font-style: italic;
            color: #555;
        }
        
        .quote-content {
            margin-bottom: 10px;
        }
        
        .section {
            margin: 30px 0;
        }
        
        .contact-box {
            background: #e8f4f8;
            border: 2px solid #3498db;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        
        .tips-box {
            background: #fff9e6;
            border-left: 5px solid #f39c12;
            padding: 20px;
            margin: 20px 0;
        }
        
        .tips-box ul li:before {
            color: #f39c12;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🇯🇵 Zero2Maker Japan — 2-Day Workshop Guide</h1>
        <p class="subtitle">ゼロトゥメーカー日本 — 2日間ワークショップガイド</p>
        
        <hr>
        
        <section class="section">
            <h2>🧭 About the 2-Day Workshop</h2>
            <p><strong>English:</strong><br>
            Zero2Maker (Z2M) is a hands-on innovation program that transforms students from <em>consumers of technology</em> to <em>creators of solutions.</em><br>
            Over 2 days, participants learn to identify problems, ideate, prototype, and present innovative solutions.</p>
            
            <p><strong>日本語:</strong><br>
            Zero2Maker（Z2M）は、学生を「テクノロジーの消費者」から「解決策を創るイノベーター」へ導く実践的プログラムです。<br>
            この2日間で、参加者は課題発見・アイデア創出・試作・プレゼンテーションを体験します。</p>
        </section>
        
        <hr>
        
        <section class="section">
            <h2>📅 Workshop Flow</h2>
            <table>
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>English</th>
                        <th>日本語</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Day 1</td>
                        <td>Introduction, Team formation, Problem identification, Ideation, Prototyping</td>
                        <td>導入、チーム編成、課題発見、アイデア発想、試作</td>
                    </tr>
                    <tr>
                        <td>Day 2</td>
                        <td>Testing, Iteration, Pitch preparation, Final presentation</td>
                        <td>検証、改良、発表準備、最終プレゼンテーション</td>
                    </tr>
                </tbody>
            </table>
        </section>
        
        <hr>
        
        <section class="section">
            <h2>🧰 Required Tools and Downloads</h2>
            
            <h3>💻 Software</h3>
            <ul>
                <li><a href="#"><strong>Download Arduino Software</strong></a>
                    <blockquote>
                        Install the latest Arduino IDE to write and upload code.<br>
                        最新版のArduino IDEをインストールしてコードを書き込みましょう。
                    </blockquote>
                </li>
                
                <li><a href="https://www.tinkercad.com"><strong>Tinkercad Web Portal</strong></a>
                    <blockquote>
                        Use Tinkercad for virtual circuit simulation and design.<br>
                        Tinkercadを使って回路シミュレーションやデザインを体験します。
                    </blockquote>
                </li>
            </ul>
            
            <hr>
            
            <h3>📚 Learning Resources</h3>
            <ul>
                <li><a href="https://z2m.org/library"><strong>Z2M Learning Library</strong></a>
                    <blockquote>
                        Access reference videos, guides, and tutorials.<br>
                        ビデオやチュートリアルなどの学習資料はこちら。
                    </blockquote>
                </li>
                
                <li><a href="#"><strong>Workshop Portfolio Template</strong></a>
                    <blockquote>
                        Record your project journey step by step.<br>
                        プロジェクトの進行を記録するテンプレートです。
                    </blockquote>
                </li>
            </ul>
            
            <hr>
            
            <h3>💾 Arduino Packages</h3>
            <ul>
                <li><a href="#"><strong>Download Library Package (Arduino)</strong></a>
                    <blockquote>
                        Includes all sensor and module libraries used in Z2M.<br>
                        使用センサー・モジュールのライブラリ一式。
                    </blockquote>
                </li>
                
                <li><a href="#"><strong>Download Code Package (Arduino)</strong></a>
                    <blockquote>
                        Sample programs for Z2M workshop activities.<br>
                        ワークショップ用のサンプルコード集。
                    </blockquote>
                </li>
            </ul>
        </section>
        
        <hr>
        
        <section class="section">
            <h2>🔗 Program Links</h2>
            <table>
                <thead>
                    <tr>
                        <th>Purpose</th>
                        <th>Link</th>
                        <th>説明</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pre-Workshop Survey</td>
                        <td><a href="https://z2m.org/presurvey">z2m.org/presurvey</a></td>
                        <td>ワークショップ前アンケート</td>
                    </tr>
                    <tr>
                        <td>Post-Workshop Survey</td>
                        <td><a href="https://z2m.org/postsurvey">z2m.org/postsurvey</a></td>
                        <td>ワークショップ後アンケート</td>
                    </tr>
                    <tr>
                        <td>Project Files Upload</td>
                        <td><a href="https://z2m.org/projectfiles">z2m.org/projectfiles</a></td>
                        <td>プロジェクトファイル提出リンク</td>
                    </tr>
                </tbody>
            </table>
        </section>
        
        <hr>
        
        <section class="section">
            <h2>🧭 Facilitator Tips</h2>
            <div class="tips-box">
                <p><strong>English:</strong></p>
                <ul>
                    <li>Prepare all kits, laptops, and materials beforehand.</li>
                    <li>Encourage open discussion and iteration.</li>
                    <li>Keep time discipline.</li>
                    <li>Celebrate creativity and teamwork.</li>
                </ul>
                
                <p><strong>日本語:</strong></p>
                <ul>
                    <li>キットやパソコンなど必要なものを事前に準備してください。</li>
                    <li>自由な発想と改良を促しましょう。</li>
                    <li>各アクティビティの時間を守りましょう。</li>
                    <li>チームワークと創造力を大切にしましょう。</li>
                </ul>
            </div>
        </section>
        
        <hr>
        
        <section class="section">
            <h2>📞 Contact</h2>
            <div class="contact-box">
                <p>For any support during the program:<br>
                📧 <a href="mailto:japan@z2m.org">japan@z2m.org</a></p>
            </div>
        </section>
        
        <hr>
        
        <section class="section">
            <h3>🪴 Closing Note</h3>
            <blockquote>
                <div class="quote-content">"Innovation begins when you start making."</div>
                <strong>Zero2Maker Team</strong>
            </blockquote>
        </section>
    </div>
</body>
</html>

