# Team GitHub Workflow — Expense Tracker

This guide assigns the repository ownership and exact collaboration sequence. The team members are Hoor Smeirat (A), Ameed Toqan (B), and Rahaf Shqair (C). Ameed creates and owns the GitHub repository.

## 0. Before starting

One shared project folder should contain the project files. The ZIP intentionally does not contain `config.php`; each student creates their own local copy from `config.example.php`.

Install Git and WAMP. Everyone should use the same repository URL after Ameed creates it.

## 1. Ameed creates the GitHub repository and makes the first push

1. Sign in to GitHub as Ameed.
2. Create a **public** repository named `expense-tracker`.
3. Do not initialize it with a README, license, or `.gitignore` because those files are already included in this project package.
4. Extract the ZIP to `C:\\wamp64\\www\\expense-tracker`.
5. Open PowerShell in that folder and run:

```powershell
git init
git branch -M main
git status
git add .
git status
git commit -m "chore: initialize expense tracker project"
git remote add origin https://github.com/AMEED-USERNAME/expense-tracker.git
git push -u origin main
```

Replace `AMEED-USERNAME` with Ameed's actual GitHub username. Check `git status` before committing. Confirm `config.php` is not in the staged files.

If the folder already contains a `.git` directory or the repository is already connected to GitHub, do not run `git init` or `git remote add origin` again. Check with `git status` and `git remote -v`.

## 2. Ameed invites Hoor and Rahaf

On GitHub, open the repository's Settings → Collaborators (or Collaborators and teams), invite Hoor and Rahaf by their GitHub usernames, and wait for them to accept. Each student must confirm they can open the repository.

## 3. Hoor and Rahaf clone the repository

Hoor and Rahaf each open PowerShell in `C:\\wamp64\\www` and run:

```powershell
git clone https://github.com/AMEED-USERNAME/expense-tracker.git
cd expense-tracker
git status
```

They must each have their own local clone. They should not share a single working folder over a network drive.

## 4. Local configuration and database — each student

On each computer:
1. Start WAMP and make sure Apache and MySQL are running.
2. Import `database/schema.sql` through phpMyAdmin.
3. Copy `config.example.php` to `config.php` in the repository root.
4. Configure local MySQL credentials in `config.php`.
5. Never commit or push `config.php`.
6. Open `http://localhost/expense-tracker/public/`.

If the folder was cloned to a different path, either put it under the WAMP `www` folder or adjust the local URL/path accordingly.

## 5. Role assignments and exact files

### Hoor Smeirat — Role A
Owns:
- `includes/header.php`
- `includes/footer.php`
- `public/assets/css/style.css`
- `.gitignore`
- `README.md`

Before working:
```powershell
git pull --no-rebase origin main
git status
```

After a focused change, stage only the files actually changed:
```powershell
git add includes/header.php includes/footer.php
git commit -m "feat: create shared navigation and footer"
git push origin main
```

For CSS:
```powershell
git add public/assets/css/style.css
git commit -m "style: improve responsive layout"
git push origin main
```

For documentation or `.gitignore`, use separate focused commits. Do not commit other students' unfinished changes as your own.

### Ameed Toqan — Role B and repository owner
Owns:
- `config.example.php`
- `includes/db.php`
- `public/index.php`
- `public/add_expense.php`

Before working:
```powershell
git pull --no-rebase origin main
git status
```

After database connection work:
```powershell
git add includes/db.php config.example.php
git commit -m "feat: configure PDO database connection"
git push origin main
```

After the expense list is complete:
```powershell
git add public/index.php
git commit -m "feat: display expenses and grand total"
git push origin main
```

After the add form is complete:
```powershell
git add public/add_expense.php
git commit -m "feat: validate and save new expenses"
git push origin main
```

The examples assume those exact files are the ones changed. Always inspect `git status` first. Never stage or commit `config.php`.

### Rahaf Shqair — Role C
Owns:
- `database/schema.sql`
- `public/assets/js/main.js`
- `public/summary.php`

Before working:
```powershell
git pull --no-rebase origin main
git status
```

After schema work:
```powershell
git add database/schema.sql
git commit -m "feat: add database schema and seed categories"
git push origin main
```

After summary work:
```powershell
git add public/summary.php
git commit -m "feat: add category spending summary"
git push origin main
```

After JavaScript validation:
```powershell
git add public/assets/js/main.js
git commit -m "feat: validate expense form in JavaScript"
git push origin main
```

## 6. Shared rule before every push

Run:
```powershell
git status
git diff
```

Make sure:
- Only intended files are changed.
- No `config.php` or passwords are staged.
- The code is saved and relevant tests pass.
- The commit message describes one coherent change.

If your push is rejected because someone pushed first:
```powershell
git pull --no-rebase origin main
```
Resolve any conflict, test, commit the resolution if Git requires it, then:
```powershell
git push origin main
```
Never use `git push --force` for this assignment.

## 7. Deliberate merge conflict in `includes/header.php`

Do this only after the initial project is integrated and tested.

1. All three students run `git pull --no-rebase origin main` and confirm `git status` is clean.
2. Agree on a shared starting commit. Each person edits the same navbar lines in `includes/header.php` on their own machine, making a distinct change. Each creates a local commit, but no one pushes yet.
3. Agree that Hoor pushes first.
4. Ameed then attempts to integrate his local commit with Hoor's new remote commit. A conflict may occur when changes overlap. If his branch is behind, run `git pull --no-rebase origin main`; if Git reports a conflict, inspect `git status` and the file.
5. Resolve the conflict by editing the file and preserving all three links: Expenses, Add Expense, Summary. Remove all `<<<<<<<`, `=======`, and `>>>>>>>` markers.
6. Run `git add includes/header.php`, then `git commit -m "fix: resolve shared navbar merge conflict"` if a merge commit is required. Push the result.
7. Rahaf then integrates her local change with the updated `main`, resolves any conflict, tests the navbar, commits the resolution if required, and pushes.
8. Everyone pulls the final version and tests navigation from all three pages.
9. Capture genuine screenshots of the conflict before resolution, the resolved file, and GitHub commit history.

If the expected conflict does not occur, the edits did not overlap sufficiently. Restart the exercise from the same clean commit and change the same lines more directly. Do not pretend a conflict happened if Git did not report one.

## 8. Faulty commit and safe revert

After the app works, Ameed makes one small intentional bug in `public/index.php` and commits/pushes it. Use the assignment's requested ordinary but non-specific commit message. Do this only in the academic exercise repository and coordinate with the others.

Ameed:
```powershell
git add public/index.php
git commit -m "Update expenses page"
git push origin main
```

Hoor and Rahaf:
```powershell
git pull --no-rebase origin main
git log --oneline -10
```

They reproduce the failure and use the diff/history to identify the actual faulty commit hash. One teammate (agree who before starting) reverts it:
```powershell
git revert ACTUAL_COMMIT_HASH
git push origin main
```

Replace the placeholder with the real hash. Then everyone runs:
```powershell
git pull --no-rebase origin main
```

Test the home page and capture real screenshots showing the faulty commit, the revert commit, and the restored page. Do not use `reset --hard` or force-push to remove the shared faulty commit.

## 9. Final shared verification

All three students confirm:
- `git status` is clean after syncing.
- `git log --oneline --graph --all` shows meaningful work from the team and the revert.
- No conflict markers remain in source files.
- `config.php` is not tracked (`git ls-files config.php` should print nothing).
- The app works locally on WAMP.
- README setup instructions work on a fresh clone.
- The three DOCX reports contain real screenshots and actual contribution evidence.
