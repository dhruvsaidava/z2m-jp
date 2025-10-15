# GitBook Setup Instructions

## How to Build and View Your GitBook

### Method 1: Using GitBook CLI (Local)

#### Install GitBook CLI

```bash
npm install -g gitbook-cli
```

#### Initialize and Build

```bash
# Install GitBook plugins
gitbook install

# Serve locally (with live reload)
gitbook serve

# Build static HTML
gitbook build
```

Your documentation will be available at: `http://localhost:4000`

---

### Method 2: GitBook.com (Online)

1. Go to [GitBook.com](https://www.gitbook.com)
2. Create an account or sign in
3. Click "New Space" → "Import from Git"
4. Connect your Git repository
5. GitBook will automatically build and host your documentation

---

### Method 3: GitHub Pages

1. Build the static site:
   ```bash
   gitbook build
   ```

2. The output will be in the `_book` folder

3. Push the `_book` folder contents to your GitHub Pages branch

---

## File Structure

```
z2m-jp/
├── README.md           # Introduction page
├── SUMMARY.md          # Table of Contents (sidebar navigation)
├── book.json          # GitBook configuration
├── .gitbook.yaml      # Modern GitBook config
├── about.md           # About the workshop
├── flow.md            # Workshop flow
├── software.md        # Software requirements
├── learning.md        # Learning resources
├── arduino.md         # Arduino packages
├── links.md           # Program links
├── facilitator.md     # Facilitator tips
└── contact.md         # Contact information
```

---

## Customization

### Edit Navigation

Modify `SUMMARY.md` to change the sidebar navigation structure.

### Edit Styling

Modify `book.json` to:
- Change plugins
- Customize theme
- Add variables

### Add New Pages

1. Create a new `.md` file
2. Add it to `SUMMARY.md` in the appropriate section
3. GitBook will automatically include it

---

## Troubleshooting

### "gitbook: command not found"

Make sure Node.js and npm are installed:
```bash
node --version
npm --version
```

Then reinstall GitBook CLI:
```bash
npm install -g gitbook-cli
```

### Port 4000 already in use

Change the port:
```bash
gitbook serve --port 4001
```

### Plugins not installing

Clear cache and reinstall:
```bash
gitbook install
```

---

## Deployment Options

### Option 1: GitBook.com
- **Pros:** Automatic builds, beautiful UI, search, analytics
- **Cons:** Requires GitBook account
- **Best for:** Official documentation, team collaboration

### Option 2: GitHub Pages
- **Pros:** Free hosting, custom domain support
- **Cons:** Manual builds required
- **Best for:** Open source projects

### Option 3: Netlify/Vercel
- **Pros:** Automatic builds from Git, fast CDN
- **Cons:** Requires account
- **Best for:** Modern static site hosting

---

## Additional Resources

- [GitBook Documentation](https://docs.gitbook.com/)
- [GitBook CLI GitHub](https://github.com/GitbookIO/gitbook)
- [Markdown Guide](https://www.markdownguide.org/)
- [GitBook Plugins](https://plugins.gitbook.com/)

---

## Support

For questions about this GitBook setup:
- Email: japan@z2m.org
- See: [Contact & Support](contact.md)

