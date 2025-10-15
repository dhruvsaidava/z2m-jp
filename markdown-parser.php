<?php
/**
 * Simple Markdown to HTML Parser
 * Converts basic markdown syntax to HTML
 */

function parseMarkdown($markdown) {
    // Escape HTML first
    // $markdown = htmlspecialchars($markdown, ENT_NOQUOTES);
    
    $lines = explode("\n", $markdown);
    $html = '';
    $inCodeBlock = false;
    $inList = false;
    $inTable = false;
    $tableHeaders = [];
    
    for ($i = 0; $i < count($lines); $i++) {
        $line = $lines[$i];
        $trimmed = trim($line);
        
        // Code blocks (```)
        if (preg_match('/^```(\w*)/', $trimmed, $matches)) {
            if (!$inCodeBlock) {
                $lang = $matches[1] ?? '';
                $html .= '<pre><code class="language-' . $lang . '">';
                $inCodeBlock = true;
            } else {
                $html .= '</code></pre>';
                $inCodeBlock = false;
            }
            continue;
        }
        
        if ($inCodeBlock) {
            $html .= htmlspecialchars($line) . "\n";
            continue;
        }
        
        // Horizontal rule (---)
        if ($trimmed === '---' || $trimmed === '***') {
            $html .= '<hr>';
            continue;
        }
        
        // Headers
        if (preg_match('/^(#{1,6})\s+(.+)$/', $trimmed, $matches)) {
            $level = strlen($matches[1]);
            $text = parseInline($matches[2]);
            $html .= "<h{$level}>{$text}</h{$level}>";
            continue;
        }
        
        // Tables
        if (preg_match('/^\|(.+)\|$/', $trimmed)) {
            if (!$inTable) {
                // Check if next line is separator
                $nextLine = isset($lines[$i + 1]) ? trim($lines[$i + 1]) : '';
                if (preg_match('/^\|[\s\-:|]+\|$/', $nextLine)) {
                    // Start table
                    $html .= '<table>';
                    $inTable = true;
                    
                    // Parse headers
                    $headers = array_map('trim', explode('|', trim($trimmed, '|')));
                    $html .= '<thead><tr>';
                    foreach ($headers as $header) {
                        $html .= '<th>' . parseInline($header) . '</th>';
                    }
                    $html .= '</tr></thead><tbody>';
                    $tableHeaders = $headers;
                    $i++; // Skip separator line
                    continue;
                }
            } else {
                // Parse table row
                $cells = array_map('trim', explode('|', trim($trimmed, '|')));
                $html .= '<tr>';
                foreach ($cells as $cell) {
                    $html .= '<td>' . parseInline($cell) . '</td>';
                }
                $html .= '</tr>';
                continue;
            }
        } else if ($inTable && $trimmed !== '') {
            // End table if not a table line
            $html .= '</tbody></table>';
            $inTable = false;
        }
        
        // Unordered lists
        if (preg_match('/^[\-\*]\s+(.+)$/', $trimmed, $matches)) {
            if (!$inList) {
                $html .= '<ul>';
                $inList = 'ul';
            }
            $html .= '<li>' . parseInline($matches[1]) . '</li>';
            
            // Check if next line is also a list item
            $nextLine = isset($lines[$i + 1]) ? trim($lines[$i + 1]) : '';
            if (!preg_match('/^[\-\*]\s+/', $nextLine)) {
                $html .= '</ul>';
                $inList = false;
            }
            continue;
        }
        
        // Ordered lists
        if (preg_match('/^(\d+)\.\s+(.+)$/', $trimmed, $matches)) {
            if (!$inList) {
                $html .= '<ol>';
                $inList = 'ol';
            }
            $html .= '<li>' . parseInline($matches[2]) . '</li>';
            
            // Check if next line is also a list item
            $nextLine = isset($lines[$i + 1]) ? trim($lines[$i + 1]) : '';
            if (!preg_match('/^\d+\.\s+/', $nextLine)) {
                $html .= '</ol>';
                $inList = false;
            }
            continue;
        }
        
        // Blockquotes
        if (preg_match('/^>\s+(.+)$/', $trimmed, $matches)) {
            $html .= '<blockquote>' . parseInline($matches[1]) . '</blockquote>';
            continue;
        }
        
        // Empty lines
        if ($trimmed === '') {
            if ($inList) {
                $html .= $inList === 'ul' ? '</ul>' : '</ol>';
                $inList = false;
            }
            continue;
        }
        
        // Regular paragraphs
        if ($trimmed !== '') {
            $html .= '<p>' . parseInline($trimmed) . '</p>';
        }
    }
    
    // Close any open tags
    if ($inCodeBlock) {
        $html .= '</code></pre>';
    }
    if ($inList) {
        $html .= $inList === 'ul' ? '</ul>' : '</ol>';
    }
    if ($inTable) {
        $html .= '</tbody></table>';
    }
    
    return $html;
}

function parseInline($text) {
    // Links [text](url)
    $text = preg_replace('/\[([^\]]+)\]\(([^\)]+)\)/', '<a href="$2">$1</a>', $text);
    
    // Bold **text** or __text__
    $text = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $text);
    $text = preg_replace('/__(.+?)__/', '<strong>$1</strong>', $text);
    
    // Italic *text* or _text_
    $text = preg_replace('/\*(.+?)\*/', '<em>$1</em>', $text);
    $text = preg_replace('/_(.+?)_/', '<em>$1</em>', $text);
    
    // Inline code `code`
    $text = preg_replace('/`([^`]+)`/', '<code>$1</code>', $text);
    
    // Line breaks (two spaces + newline or <br>)
    $text = preg_replace('/  \n/', '<br>', $text);
    $text = str_replace('<br>', '<br>', $text);
    
    return $text;
}

