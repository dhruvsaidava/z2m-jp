# 🚀 Quick Start Guide

Get up and running with your Zero2Maker Japan documentation in 60 seconds!

---

## 📍 Step 1: Access Your Documentation

### Using XAMPP (Recommended)
1. Make sure XAMPP is running
2. Open your browser
3. Visit: **`http://localhost/z2m-jp/`**

### Clean URLs
- ✅ `http://localhost/z2m-jp/about`
- ✅ `http://localhost/z2m-jp/flow`
- ✅ `http://localhost/z2m-jp/software`

---

## 🎯 Step 2: Enable Clean URLs (One-Time Setup)

If clean URLs don't work, follow these steps:

### Enable mod_rewrite in Apache:

1. Open `C:\xampp\apache\conf\httpd.conf`
2. Find and uncomment (remove `#`):
   ```
   LoadModule rewrite_module modules/mod_rewrite.so
   ```
3. Find and change:
   ```
   <Directory "C:/xampp/htdocs">
       AllowOverride None
   ```
   To:
   ```
   <Directory "C:/xampp/htdocs">
       AllowOverride All
   ```
4. **Restart Apache** in XAMPP Control Panel
5. Test: Visit `http://localhost/z2m-jp/test-rewrite.php`

---

## ⌨️ Step 3: Learn the Shortcuts

### Essential Keyboard Shortcuts:
| Key | Action |
|-----|--------|
| `/` | Focus search box |
| `Esc` | Clear search |
| `←` | Previous page |
| `→` | Next page |

---

## ✨ Step 4: Try the Features

### 🔍 Search
1. Press `/` or click search box
2. Type to filter pages
3. Press `Esc` to clear

### 📋 Copy Code
1. Hover over any code block
2. Click "Copy" button
3. Paste anywhere!

### 📱 Mobile Menu
1. Open on mobile device
2. Tap `☰` button
3. Sidebar slides in

### ↑ Back to Top
1. Scroll down
2. Click blue circle button (bottom-right)
3. Smooth scroll to top

---

## 📁 File Structure

```
z2m-jp/
├── docs.php              ← Main documentation viewer
├── markdown-parser.php   ← Converts .md to HTML
├── .htaccess            ← Clean URLs configuration
├── README.md            ← Home/Introduction page
├── about.md             ← About the Workshop
├── flow.md              ← Workshop Flow
├── software.md          ← Software Requirements
├── learning.md          ← Learning Resources
├── arduino.md           ← Arduino Packages
├── links.md             ← Program Links
├── facilitator.md       ← Facilitator Tips
└── contact.md           ← Contact & Support
```

---

## 🔧 Troubleshooting

### Clean URLs Not Working?
→ Run `http://localhost/z2m-jp/test-rewrite.php`  
→ See **CLEAN-URLS-GUIDE.md** for detailed setup

### Search Not Working?
→ Make sure JavaScript is enabled in your browser

### Mobile Menu Not Opening?
→ Ensure you're viewing on a device ≤768px width  
→ Try refreshing the page

### Code Copy Button Not Appearing?
→ Hover over code blocks  
→ Make sure JavaScript is enabled

---

## 📖 Documentation Files

### Guides Available:
- **FEATURES.md** - Complete list of all features
- **CLEAN-URLS-GUIDE.md** - Clean URL setup instructions
- **DESIGN-NOTES.md** - Design system documentation
- **SETUP.md** - Original GitBook setup (optional)

---

## 🎨 Design Colors

Your documentation uses a minimal 3-color palette:

- **White** (`#ffffff`) - Background
- **Black** (`#111`) - Text
- **Sky Blue** (`#1890ff`) - Accents & Links

---

## 📱 Responsive Breakpoints

- **Desktop**: > 768px - Full sidebar visible
- **Mobile**: ≤ 768px - Hamburger menu

---

## 🖨️ Print Documentation

1. Press `Ctrl+P` (Windows) or `Cmd+P` (Mac)
2. Sidebar and navigation are hidden
3. Clean print layout

---

## 🔗 URLs

### Main Pages:
- Home: `/z2m-jp/` or `/z2m-jp/home`
- About: `/z2m-jp/about`
- Flow: `/z2m-jp/flow`
- Software: `/z2m-jp/software`
- Learning: `/z2m-jp/learning`
- Arduino: `/z2m-jp/arduino`
- 3D Printer: `/z2m-jp/3dprinter`
- Links: `/z2m-jp/links`
- Facilitator: `/z2m-jp/facilitator`
- Contact: `/z2m-jp/contact`

### Testing:
- Test Clean URLs: `/z2m-jp/test-rewrite.php`
- Original index: `/z2m-jp/index.php` (redirects)

---

## ✅ Quick Checklist

Before sharing your documentation:

- [ ] XAMPP Apache is running
- [ ] Clean URLs are enabled (test with test-rewrite.php)
- [ ] All pages load correctly
- [ ] Search functionality works
- [ ] Code copy buttons appear on hover
- [ ] Mobile menu works on small screens
- [ ] Previous/Next navigation works
- [ ] Keyboard shortcuts work

---

## 🎯 Next Steps

1. **Customize Content** - Edit the `.md` files to update content
2. **Share Links** - Use clean URLs when sharing
3. **Test Mobile** - Check on phone/tablet
4. **Explore Features** - Try all keyboard shortcuts

---

## 💬 Need Help?

- See **FEATURES.md** for feature documentation
- See **CLEAN-URLS-GUIDE.md** for URL setup
- Check **test-rewrite.php** for troubleshooting

---

**You're all set! Enjoy your professional documentation site!** 🎉

