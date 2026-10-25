# Expense Tracker

A small PHP, MySQL, HTML, CSS, JavaScript and Bootstrap application for recording expenses and reviewing spending by category. This project is also a practical Git/GitHub collaboration assignment for a three-person team.

## Team and responsibilities

| Role | Student | Main files |
|---|---|---|
| A — Frontend and documentation | Hoor Smeirat | `includes/header.php`, `includes/footer.php`, `public/assets/css/style.css`, `.gitignore`, `README.md` |
| B — PHP backend | Ameed Toqan | `config.example.php`, `includes/db.php`, `public/index.php`, `public/add_expense.php` |
| C — Database, JavaScript and summary | Rahaf Shqair | `database/schema.sql`, `public/assets/js/main.js`, `public/summary.php` |

All students should review the integrated application, contribute meaningful commits, and take part in the merge-conflict and revert exercises.

## Features

- Three application pages: Expenses, Add Expense and Summary.
- MySQL persistence using PDO and prepared statements.
- Expense table ordered newest first.
- Positive amount, description, category and date validation.
- Category totals and percentage progress bars.
- Responsive Bootstrap layout and empty states.
- No authentication or user accounts.

## Requirements

- WAMP with Apache, PHP and MySQL/MariaDB enabled.
- PHP PDO MySQL extension enabled.
- Git.
- A modern browser.
- Internet access for the Bootstrap and optional Google Fonts CDN resources.

## Install on WAMP

1. Clone the repository into `C:\wamp64\www\expense-tracker` (or the `www` directory of your WAMP installation).
2. Start WAMP and make sure Apache and MySQL are running.
3. Open `http://localhost/phpmyadmin/`.
4. Select **Import**, choose `database/schema.sql`, and run the import. The script creates `expense_tracker`, the two tables, and five categories.
5. Copy `config.example.php` to `config.php` in the project root.
6. Edit `config.php` with your local MySQL host, database, username and password. Default WAMP installations often use `root` with an empty password, but use the credentials configured on your machine.
7. Open `http://localhost/expense-tracker/public/`.

The local `config.php` file is deliberately excluded from Git. Never commit credentials. Only `config.example.php` is shared.

## Pages

- `public/index.php` — lists recorded expenses and displays the total.
- `public/add_expense.php` — validates and stores a new expense.
- `public/summary.php` — displays totals and percentage shares by category.

## Git workflow

Check your working tree before editing:

```bash
git status
git pull --no-rebase origin main
```

Commit focused changes:

```bash
git add path/to/your-file
git commit -m "feat: describe the change"
git push origin main
```

If your push is rejected because a teammate has pushed first, do not force-push. Pull and integrate their changes, resolve any conflict, test, commit the resolution if needed, then push.

Suggested commit messages:
- `chore: add project structure and gitignore`
- `feat: create shared navigation and footer`
- `feat: add database schema and seed categories`
- `feat: configure PDO database connection`
- `feat: display expenses and grand total`
- `feat: validate and save new expenses`
- `feat: add category spending summary`
- `feat: validate expense form in JavaScript`
- `style: improve responsive layout`
- `docs: document local setup and workflow`

## Required merge conflict exercise

1. All three students synchronize to the same known commit.
2. Each student independently changes the same navbar section in `includes/header.php`, then commits locally without pushing yet.
3. Agree on a push order. After the first student's commit is pushed, another student integrates that change with their own commit. The overlapping edits should produce a real conflict.
4. Inspect the conflict markers (`<<<<<<<`, `=======`, `>>>>>>>`), edit the file to retain all three navigation links, and remove every marker.
5. Commit the resolution, push it, and synchronize the third student.
6. Test the navbar from all three pages.
7. Capture screenshots of the real conflict, the resolved file, and the relevant Git history.

If no conflict appears, make the local edits overlap more directly and repeat from a clean shared starting point. Do not fake screenshots or leave markers in the final code.

## Required faulty commit and revert exercise

Perform this exercise only after the app works, and coordinate with the team.

1. Role B introduces a small, reversible bug in `public/index.php` and commits it using a normal, non-descriptive message as the assignment requests.
2. Role B pushes the commit.
3. Roles A and C pull the update, reproduce the failure, and inspect the history with `git log --oneline`.
4. Identify the faulty commit hash and revert it:

```bash
git revert COMMIT_HASH
git push origin main
```

5. Everyone pulls and verifies that the home page works again.

Use the actual commit hash. `git revert` creates a new commit that reverses the faulty change. Do not rewrite shared history with `git reset --hard` or force-push. Capture the faulty commit, the revert commit and the recovered page.

## Manual testing checklist

- [ ] The home page loads and displays database records.
- [ ] Expenses are ordered by date descending.
- [ ] The total equals the sum of all expenses.
- [ ] A valid expense can be saved.
- [ ] Empty description is rejected.
- [ ] Zero and negative amounts are rejected.
- [ ] Invalid dates and category IDs are rejected.
- [ ] Output is HTML-escaped.
- [ ] All five categories appear in Summary, including categories with no expenses.
- [ ] Category percentages are accurate.
- [ ] An empty database does not cause division-by-zero errors.
- [ ] All navigation links work.
- [ ] The site is usable on mobile and desktop.
- [ ] `config.php` is not tracked by Git.
- [ ] A teammate can set up a fresh clone using this README.
- [ ] The merge conflict is resolved and documented.
- [ ] The faulty pushed commit is reverted and documented.

## Final submission

Submit the public GitHub repository, this README, and the three individual reports as DOCX files (`report/A.docx`, `report/B.docx`, `report/C.docx`) according to the instructor's instructions. Each report should describe the student's actual work and include real screenshots of the conflict and revert. Do not invent commits, dates, screenshots or contributions.
