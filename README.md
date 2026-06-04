# Electricity Billing System - Modular Version

This workspace contains a modularized version of the Electricity Billing System.

To publish this version on Git:

1. Create a new repository locally and commit the changes:

```bash
cd c:/xampp/htdocs
git init
git add .
git commit -m "Modularized electricity billing system - version 2"
```

2. Create a remote repo on GitHub and push:

```bash
git remote add origin <your-remote-url>
git branch -M main
git push -u origin main
```

Notes:
- Modules are in the `modules/` folder: `header.php`, `footer.php`, `validation.php`, `billing.php`.
- Documentation is in `docs/` and simple tests in `tests/`.

