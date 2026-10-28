# 💰 Expense Tracker | متتبع المصاريف

**A PHP & MySQL Expense Management Application**

**تطبيق ويب لإدارة المصاريف باستخدام PHP وMySQL**

A collaborative university project developed by a team of three students to demonstrate web development skills, database integration, and professional teamwork using Git and GitHub.

مشروع جامعي جماعي تم تطويره بواسطة ثلاثة طلاب، بهدف تطبيق مهارات تطوير الويب، وربط قواعد البيانات، والتعاون البرمجي باستخدام Git وGitHub.

**Technologies:** PHP · MySQL · HTML · CSS · JavaScript · Bootstrap · Git · GitHub

---

## 📑 Table of Contents | الفهرس

**English**
1. Project Overview
2. Team Members & Responsibilities
3. Features & Technologies
4. Project Structure
5. Installation & Setup
6. Git & GitHub Collaboration
7. Merge Conflict & Revert Exercises
8. Testing & Verification
9. Final Submission

**العربية**
1. نظرة عامة على المشروع
2. أعضاء الفريق وتوزيع المهام
3. المميزات والتقنيات
4. هيكلية المشروع
5. التثبيت والتشغيل
6. التعاون باستخدام Git وGitHub
7. تجربة التعارض والتراجع
8. الاختبارات والتحقق
9. التسليم النهائي

---

# 🇬🇧 English Documentation

## 1. Project Overview

Expense Tracker is a lightweight web application that allows users to record expenses, organize them into categories, and monitor their spending.

The application includes three main pages:

| Page | Description |
|---|---|
| Expenses | Displays recorded expenses and the total amount spent. |
| Add Expense | Allows users to add expenses with input validation. |
| Summary | Displays category totals and spending percentages. |

In addition to building a functional application, this project focuses on practical collaboration using Git and GitHub, including version control, meaningful commits, synchronization, merge-conflict resolution, and reverting faulty changes.

## 2. Team Members & Responsibilities

| Role | Student | Responsibilities |
|---|---|---|
| A — Frontend & Documentation | **Ameed Toqan** | Shared layout, styling, README, and Git configuration |
| B — PHP Backend | **Hoor Smeirat** | Database connection, expense listing, and expense submission |
| C — Database & JavaScript | **Rahaf Shqair** | Database schema, form validation, and spending summary |

### Role A — Ameed Toqan

Main files:
- `includes/header.php`
- `includes/footer.php`
- `public/assets/css/style.css`
- `.gitignore`
- `README.md`

### Role B — Hoor Smeirat

Main files:
- `config.example.php`
- `includes/db.php`
- `public/index.php`
- `public/add_expense.php`

### Role C — Rahaf Shqair

Main files:
- `database/schema.sql`
- `public/assets/js/main.js`
- `public/summary.php`

All three members participate in integration, Git synchronization, merge-conflict resolution, and version recovery.

## 3. Features & Technologies

### Application Features

- Record expenses with a description, amount, category, and date.
- Display expenses in a table, ordered from newest to oldest.
- Calculate the total amount spent.
- Organize expenses into five categories: Food, Transport, Bills, Entertainment, and Other.
- Display category totals and percentage progress bars.
- Validate user input on the frontend and backend.
- Store expenses in MySQL using PDO and prepared statements.
- Provide a responsive Bootstrap interface.
- Handle empty datasets appropriately.
- No user registration or authentication is required.

### Technology Stack

| Technology | Purpose |
|---|---|
| HTML | Page structure |
| CSS | Custom styling |
| Bootstrap | Responsive layout and components |
| JavaScript | Client-side validation |
| PHP | Server-side logic and validation |
| MySQL | Data storage |
| PDO | Database connectivity |
| Git | Version control |
| GitHub | Collaboration and source hosting |
| WAMP | Local development environment |

## 4. Project Structure

```text
expense-tracker/
├── README.md
├── .gitignore
├── config.example.php
├── config.php              # Local only, not committed
├── database/
│   └── schema.sql
├── includes/
│   ├── db.php
│   ├── header.php
│   └── footer.php
├── public/
│   ├── index.php
│   ├── add_expense.php
│   ├── summary.php
│   └── assets/
│       ├── css/
│       │   └── style.css
│       └── js/
│           └── main.js
└── report/
    ├── A.docx
    ├── B.docx
    └── C.docx
```

**Note:** The `report/` files represent the required final submission documents. Their presence in this structure does not confirm that they have already been uploaded.

## 5. Installation & Setup

### Requirements

- WAMP with Apache, PHP, and MySQL/MariaDB
- PHP PDO MySQL extension
- Git
- A modern web browser
- Internet access for external Bootstrap and optional Google Fonts resources

### Step 1 — Clone the Repository

Clone the project into the WAMP `www` directory:

```bash
cd C:\wamp64\www
git clone https://github.com/Ameed-S-Toqan/expense-tracker.git
```

Project directory:

```text
C:\wamp64\www\expense-tracker
```

### Step 2 — Start WAMP

Start WAMP and ensure Apache and MySQL are running.

### Step 3 — Import the Database

Open:

`http://localhost/phpmyadmin/`

Select **Import**, choose:

`database/schema.sql`

Run the import to create the `expense_tracker` database, its tables, and the five initial categories.

### Step 4 — Configure the Database Connection

Copy:

`config.example.php`

Rename the copy to:

`config.php`

Update the database settings to match your local MySQL configuration.

The configuration uses the database host, name, username, and password.

**Security:** Never commit `config.php` or real database credentials to GitHub.

### Step 5 — Run the Application

Open:

`http://localhost/expense-tracker/public/`

The application should now be accessible locally.

## 6. Git & GitHub Collaboration

The team uses a shared public GitHub repository:

https://github.com/Ameed-S-Toqan/expense-tracker

### Before Making Changes

```bash
git status
git pull --no-rebase origin main
```

### Commit and Push Changes

```bash
git add path/to/your-file
git commit -m "feat: describe the change"
git push origin main
```

Commit messages should be clear and describe a focused change.

Common prefixes include:

| Prefix | Meaning |
|---|---|
| `feat:` | New feature |
| `fix:` | Bug fix |
| `docs:` | Documentation update |
| `style:` | Styling change |
| `chore:` | Maintenance or setup |

If a push is rejected because another member pushed first, the developer should pull and integrate the latest changes before pushing again.

Do not force-push over teammates' work.

## 7. Merge Conflict & Revert Exercises

### 7.1 Merge Conflict Resolution

The team performed a merge-conflict exercise using the shared file:

`includes/header.php`

The exercise involved:
1. Synchronizing all three working copies.
2. Editing the same navigation section independently.
3. Creating local commits.
4. Pushing and integrating overlapping changes.
5. Resolving the resulting Git conflicts.
6. Preserving all three navigation links.
7. Removing conflict markers and verifying the application.

The exercise was documented using screenshots of the conflict, its resolution, and Git history.

### 7.2 Faulty Commit & Revert

The team also performed an intentional error and recovery exercise.

1. Role B introduced a deliberate error in `public/index.php`.
2. The faulty commit was pushed to GitHub.
3. Roles A and C synchronized and identified the faulty change.
4. Role A reverted the faulty commit.
5. The revert was pushed, and the team synchronized again.

The faulty commit was:

`5e0b55f` — `Update expenses page`

The recovery used the Git Revert workflow:

```bash
git revert COMMIT_HASH
git push origin main
```

Git Revert preserves the shared commit history while reversing the effect of a selected commit.

**Important:** The team does not rewrite shared history using force-push to undo an already published faulty commit.

## 8. Testing & Verification

The following behaviors were tested during local development:

- [x] Application runs in the WAMP environment.
- [x] MySQL database import succeeds.
- [x] Expenses can be saved and displayed.
- [x] Negative amounts are rejected.
- [x] The Summary page displays category spending information.
- [x] Navigation was tested after merge-conflict resolution.
- [x] The faulty commit was reverted and the application recovered.

### Additional Verification Checklist

The following checks should be completed or independently reconfirmed before final submission:

- [ ] Expenses are ordered correctly by date.
- [ ] Total expenses match the sum of all records.
- [ ] Empty descriptions and zero amounts are rejected.
- [ ] Invalid dates and category IDs are rejected.
- [ ] User-provided text is HTML-escaped.
- [ ] All five categories appear, including empty categories.
- [ ] Spending percentages are mathematically correct.
- [ ] Empty datasets do not cause division-by-zero errors.
- [ ] The layout works correctly on mobile and desktop.
- [ ] `config.php` is not tracked by Git.
- [ ] A fresh clone can be installed using this README alone.

These unchecked items are verification tasks, not claims that the features are missing.

## 9. Final Submission

The final submission includes:

1. The public GitHub repository.
2. A complete and updated README.
3. Individual DOCX reports for all three team members.

| Role | Report |
|---|---|
| A — Ameed Toqan | `report/A.docx` |
| B — Hoor Smeirat | `report/B.docx` |
| C — Rahaf Shqair | `report/C.docx` |

Each report should include the student's actual contributions, relevant files, merge-conflict screenshots, revert evidence, and the main collaboration challenge encountered.

All screenshots, commits, and documented contributions must reflect real work.

---

# 🇵🇸 التوثيق باللغة العربية

## 1. نظرة عامة على المشروع

**Expense Tracker — متتبع المصاريف** هو تطبيق ويب بسيط يساعد المستخدم على تسجيل مصاريفه وتنظيمها ومتابعة الإنفاق حسب التصنيف.

يتكون التطبيق من ثلاث صفحات رئيسية:

| الصفحة | الوظيفة |
|---|---|
| Expenses — المصاريف | عرض المصاريف المسجلة والمجموع الكلي |
| Add Expense — إضافة مصروف | إضافة مصروف جديد والتحقق من البيانات |
| Summary — الملخص | عرض مجموع الإنفاق ونسبته لكل تصنيف |

إلى جانب تطوير التطبيق، يهدف المشروع إلى تطبيق مبادئ العمل الجماعي باستخدام Git وGitHub، بما يشمل إدارة الإصدارات، وكتابة Commits واضحة، ومزامنة التعديلات، وحل التعارضات، والتراجع عن الأخطاء.

## 2. أعضاء الفريق وتوزيع المهام

| الدور | الطالب | المسؤولية |
|---|---|---|
| A — الواجهة الأمامية والتوثيق | **عميد طوقان** | تصميم الواجهة المشتركة، التنسيقات، والتوثيق |
| B — البرمجة الخلفية | **حور سميرات** | الاتصال بقاعدة البيانات، عرض المصاريف وإضافتها |
| C — قاعدة البيانات وJavaScript | **رهف شقير** | إنشاء قاعدة البيانات، التحقق من النموذج، وصفحة الملخص |

### العضو A — عميد طوقان

الملفات الأساسية:
- `includes/header.php`: الجزء العلوي وشريط التنقل.
- `includes/footer.php`: الجزء السفلي المشترك.
- `public/assets/css/style.css`: تنسيقات الواجهة.
- `.gitignore`: استثناء الملفات المحلية والحساسة.
- `README.md`: توثيق المشروع وتعليمات تشغيله.

### العضو B — حور سميرات

الملفات الأساسية:
- `config.example.php`: نموذج إعدادات قاعدة البيانات.
- `includes/db.php`: الاتصال بقاعدة البيانات باستخدام PDO.
- `public/index.php`: عرض المصاريف والمجموع الكلي.
- `public/add_expense.php`: إضافة المصاريف والتحقق منها وحفظها.

### العضو C — رهف شقير

الملفات الأساسية:
- `database/schema.sql`: إنشاء الجداول والتصنيفات.
- `public/assets/js/main.js`: التحقق من المدخلات باستخدام JavaScript.
- `public/summary.php`: عرض إجمالي المصاريف حسب التصنيف.

يشارك جميع أعضاء الفريق في دمج الأجزاء، ومراجعة التطبيق، ومزامنة المستودع، وحل تعارضات Git، والتراجع عن التعديلات الخاطئة.

## 3. المميزات والتقنيات المستخدمة

### مميزات التطبيق

- تسجيل المصاريف مع الوصف والمبلغ والتصنيف والتاريخ.
- عرض المصاريف في جدول من الأحدث إلى الأقدم.
- حساب المجموع الكلي للمصاريف.
- تصنيف المصاريف إلى خمس فئات: الطعام، المواصلات، الفواتير، الترفيه، وأخرى.
- حساب إجمالي الإنفاق لكل فئة.
- عرض نسب الإنفاق باستخدام أشرطة تقدم مرئية.
- التحقق من المدخلات باستخدام JavaScript وPHP.
- حفظ البيانات باستخدام MySQL وPDO.
- واجهة متجاوبة باستخدام Bootstrap.
- التعامل مع حالات عدم وجود بيانات.
- لا يتطلب التطبيق إنشاء حساب أو تسجيل دخول.

**ملاحظة:** واجهة التطبيق نفسها باللغة الإنجليزية وفقًا لمتطلبات الواجب، بينما يتوفر هذا التوثيق باللغتين العربية والإنجليزية.

### التقنيات

| التقنية | الاستخدام |
|---|---|
| HTML | بناء هيكل الصفحات |
| CSS | تنسيق المظهر |
| Bootstrap | تصميم واجهة متجاوبة |
| JavaScript | التحقق من المدخلات |
| PHP | تنفيذ العمليات والتحقق من البيانات على الخادم |
| MySQL | تخزين البيانات |
| PDO | الاتصال بقاعدة البيانات |
| Git | إدارة الإصدارات |
| GitHub | استضافة المستودع والتعاون |
| WAMP | تشغيل المشروع محليًا |

## 4. هيكلية المشروع

```text
expense-tracker/
├── README.md
├── .gitignore
├── config.example.php
├── config.php              # محلي فقط
├── database/
│   └── schema.sql
├── includes/
│   ├── db.php
│   ├── header.php
│   └── footer.php
├── public/
│   ├── index.php
│   ├── add_expense.php
│   ├── summary.php
│   └── assets/
│       ├── css/
│       │   └── style.css
│       └── js/
│           └── main.js
└── report/
    ├── A.docx
    ├── B.docx
    └── C.docx
```

مجلد `database` يحتوي ملف إنشاء قاعدة البيانات، ومجلد `includes` يحتوي ملفات PHP المشتركة، بينما يحتوي `public` على صفحات التطبيق وملفات CSS وJavaScript.

أما مجلد `report` فهو مخصص للتقارير الفردية المطلوبة في التسليم النهائي، ولا يعني ظهوره في الهيكل أن التقارير قد رُفعت بالفعل.

## 5. تثبيت المشروع وتشغيله

### المتطلبات

- برنامج WAMP مع تشغيل Apache وMySQL.
- دعم PDO MySQL في PHP.
- برنامج Git.
- متصفح حديث.
- اتصال بالإنترنت لتحميل الموارد الخارجية المستخدمة في التصميم.

### الخطوة الأولى — تنزيل المشروع

افتح Terminal أو Git Bash ونفّذ:

```bash
cd C:\wamp64\www
git clone https://github.com/Ameed-S-Toqan/expense-tracker.git
```

سيتم تنزيل المشروع داخل:

`C:\wamp64\www\expense-tracker`

### الخطوة الثانية — تشغيل WAMP

شغّل WAMP وتأكد من عمل خدمتي Apache وMySQL.

### الخطوة الثالثة — تجهيز قاعدة البيانات

افتح:

`http://localhost/phpmyadmin/`

ثم:
1. اختر **Import**.
2. حدد الملف `database/schema.sql`.
3. نفّذ عملية الاستيراد.

بحسب إعداد المشروع، يقوم الملف بإنشاء قاعدة البيانات `expense_tracker` وجدولي المصاريف والتصنيفات، مع إضافة خمس فئات أساسية.

### الخطوة الرابعة — إعداد الاتصال

انسخ الملف:

`config.example.php`

وأنشئ نسخة باسم:

`config.php`

ثم أدخل بيانات الاتصال بقاعدة البيانات الخاصة بجهازك.

**تنبيه أمني:** لا ترفع ملف `config.php` أو كلمات المرور إلى GitHub.

### الخطوة الخامسة — فتح التطبيق

افتح الرابط:

`http://localhost/expense-tracker/public/`

إذا كانت الإعدادات صحيحة، ستظهر الصفحة الرئيسية للتطبيق.

## 6. التعاون باستخدام Git وGitHub

يعمل الفريق على مستودع GitHub مشترك:

https://github.com/Ameed-S-Toqan/expense-tracker

### قبل بدء العمل

```bash
git status
git pull --no-rebase origin main
```

الأمر الأول يعرض حالة الملفات، والثاني يسحب آخر التعديلات ويدمجها مع النسخة المحلية.

### حفظ التعديلات ورفعها

```bash
git add path/to/your-file
git commit -m "feat: describe the change"
git push origin main
```

يتم استخدام Commits صغيرة وواضحة، بحيث تصف كل رسالة التعديل الذي تم تنفيذه.

عند وجود تحديثات جديدة من أحد أعضاء الفريق، يجب سحبها ودمجها قبل إعادة الرفع.

يُمنع استخدام Force Push لتجاوز تعديلات أعضاء الفريق.

## 7. تجربة التعارض والتراجع عن الأخطاء

### 7.1 حل تعارض Git — Merge Conflict

نفّذ الفريق تجربة تعارض حقيقي باستخدام الملف المشترك:

`includes/header.php`

تضمنت التجربة:
1. مزامنة نسخ المشروع لدى الأعضاء الثلاثة.
2. تعديل الجزء نفسه من شريط التنقل بشكل مستقل.
3. إنشاء Commits محلية.
4. رفع التعديلات ودمجها وفق ترتيب متفق عليه.
5. التعامل مع التعارضات التي ظهرت.
6. الاحتفاظ بروابط الصفحات الثلاث.
7. إزالة علامات التعارض والتأكد من عمل التطبيق.

تم توثيق التجربة باستخدام لقطات شاشة للتعارض وحلّه وسجل Git.

### 7.2 التراجع عن خطأ — Git Revert

نفّذ الفريق أيضًا تجربة لإضافة خطأ مقصود ثم التراجع عنه.

- أضاف العضو B خطأً مقصودًا في `public/index.php`.
- تم رفع الـ Commit الذي يحتوي الخطأ.
- قام العضوان A وC بسحب التحديث وتحديد سبب المشكلة.
- نفّذ العضو A عملية Revert للتراجع عن الخطأ.
- تم رفع الإصلاح ومزامنة نسخ المشروع.

الـ Commit الذي احتوى الخطأ:

`5e0b55f` — `Update expenses page`

الأوامر المستخدمة في التراجع:

```bash
git revert COMMIT_HASH
git push origin main
```

تسمح عملية Git Revert بإلغاء أثر تعديل سابق دون حذف سجل الـ Commits، مما يحافظ على تاريخ العمل الجماعي.



## 📌 Repository | مستودع المشروع

**GitHub:** https://github.com/Ameed-S-Toqan/expense-tracker

**Project:** Expense Tracker

**Team:** Ameed Toqan · Hoor Smeirat · Rahaf Shqair

**Academic Project — Git & GitHub Collaboration**

*Developed collaboratively as part of a university software development assignment.*

**Directories Website** https://expensetrackerevidence.netlify.app

*تم تطوير هذا المشروع بشكل جماعي ضمن متطلبات واجب جامعي في تطوير البرمجيات والتعاون باستخدام Git وGitHub.*
