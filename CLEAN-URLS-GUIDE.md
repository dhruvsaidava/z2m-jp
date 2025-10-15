# Clean URLs Setup Guide

## ✅ Clean URLs Are Now Configured!

Your documentation now uses beautiful clean URLs instead of query parameters.

---

## 🔗 URL Examples

### Before (Query Parameters)
```
http://localhost/z2m-jp/docs.php?page=about
http://localhost/z2m-jp/docs.php?page=flow
http://localhost/z2m-jp/docs.php?page=software
```

### After (Clean URLs) ✨
```
http://localhost/z2m-jp/about
http://localhost/z2m-jp/flow
http://localhost/z2m-jp/software
```

---

## 📋 Available Clean URLs

| Clean URL | Description |
|-----------|-------------|
| `/z2m-jp/` or `/z2m-jp/home` | Introduction/Home |
| `/z2m-jp/about` | About the Workshop |
| `/z2m-jp/flow` | Workshop Flow |
| `/z2m-jp/software` | Software Requirements |
| `/z2m-jp/learning` | Learning Resources |
| `/z2m-jp/arduino` | Arduino Packages |
| `/z2m-jp/links` | Program Links |
| `/z2m-jp/facilitator` | Facilitator Tips |
| `/z2m-jp/contact` | Contact & Support |

---

## 🛠️ Setup Requirements

### 1. Enable mod_rewrite in Apache

**For XAMPP on Windows:**

1. Open `C:\xampp\apache\conf\httpd.conf`
2. Find this line:
   ```
   #LoadModule rewrite_module modules/mod_rewrite.so
   ```
3. Remove the `#` to uncomment it:
   ```
   LoadModule rewrite_module modules/mod_rewrite.so
   ```
4. Find this section:
   ```
   <Directory "C:/xampp/htdocs">
       AllowOverride None
   ```
5. Change `None` to `All`:
   ```
   <Directory "C:/xampp/htdocs">
       AllowOverride All
   ```
6. Save the file
7. Restart Apache from XAMPP Control Panel

---

## 🔍 How to Test

### Check if mod_rewrite is enabled:

1. Create a test file: `test-rewrite.php`
   ```php
   <?php
   if (in_array('mod_rewrite', apache_get_modules())) {
       echo "mod_rewrite is ENABLED ✅";
   } else {
       echo "mod_rewrite is DISABLED ❌";
   }
   ?>
   ```

2. Visit: `http://localhost/z2m-jp/test-rewrite.php`

### Test Clean URLs:

Visit these URLs (they should all work):
- `http://localhost/z2m-jp/`
- `http://localhost/z2m-jp/about`
- `http://localhost/z2m-jp/flow`

---

## ❓ Troubleshooting

### Problem: Clean URLs show 404 error

**Solution:**
- Make sure Apache's `mod_rewrite` is enabled
- Check that `AllowOverride All` is set in httpd.conf
- Restart Apache after making changes

### Problem: Internal Server Error (500)

**Solution:**
- Check `.htaccess` file exists in `/z2m-jp/` folder
- Verify `.htaccess` syntax is correct
- Check Apache error logs: `C:\xampp\apache\logs\error.log`

### Problem: Pages work with `docs.php?page=about` but not with `/about`

**Solution:**
- Confirm `AllowOverride All` in Apache config
- Make sure `.htaccess` file is in the correct directory
- Clear browser cache

---

## 📁 Files Created

1. **`.htaccess`** - Apache rewrite rules for clean URLs
2. **`docs.php`** - Updated with clean URL links in navigation

---

## 🎨 Benefits of Clean URLs

✅ **Better SEO** - Search engines prefer clean URLs  
✅ **User-Friendly** - Easy to remember and share  
✅ **Professional** - Looks more polished  
✅ **Bookmarkable** - Users can bookmark specific pages easily  
✅ **GitBook-like** - Matches the style of professional documentation sites

---

## 📝 Notes

- Markdown files (`.md`) are protected and cannot be accessed directly
- The `markdown-parser.php` file is also protected
- All routing goes through `docs.php` internally
- Old URLs with query parameters will still work for backward compatibility

---

## 🚀 Quick Start

1. Make sure XAMPP Apache is running
2. Visit: `http://localhost/z2m-jp/`
3. Navigate using the sidebar
4. Notice clean URLs in the browser address bar!

---

**Enjoy your beautiful, clean documentation URLs!** ✨


