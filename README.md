# 🚀 Quality Assurance Engineer Assessment

## 📌 Project Overview
This project is a web application built with **Laravel 11** and **Vue 3 (Inertia.js)**, consuming data from [JSONPlaceholder](https://jsonplaceholder.typicode.com/). The system includes authentication and allows users to:
- View, search, and paginate **Users, Albums, and Photos**
- Perform API testing, automation, and load testing using **Postman, JMeter, Playwright, and GitHub Actions**

## 🏗️ Tech Stack
- **Backend:** Laravel 12 (PHP)
- **Frontend:** Vue 3 (Inertia.js, Vite)
- **API Services:** JSONPlaceholder API
- **Testing:** Postman, JMeter, Cypress, Playwright
- **CI/CD:** GitHub Actions

## 📜 Features
- **Authentication:** Secure login/logout
- **Users Management:** List, search, and paginate users
- **Albums & Photos:** View, search, and paginate albums & photos
- **API Testing:** Postman collection & automated tests
- **Load Testing:** JMeter performance tests
- **End-to-End Testing:** Playwright for UI automation
- **CI/CD Integration:** Automated tests in GitHub Actions

---

## 🔧 Installation & Setup
### 1️⃣ Clone the Repository
```sh
git clone https://github.com/mobarasa/qa-assessment
cd qa-assessment
```
### 2️⃣ Install Dependencies
#### Backend (Laravel)
```sh
composer install
cp .env.example .env
php artisan key:generate
```
#### Frontend (Vue 3)
```sh
npm install
npm run dev
```
### 3️⃣ Run Migrations (If using a database)
```sh
php artisan migrate
```
### 4️⃣ Start the Development Server
```sh
php artisan serve
```

---

## 🚀 API Testing (Postman)
### 📥 Import the Postman Collection
1. Open **Postman**
2. Click **Import** and select `postman_collection.json`
3. Run the **API Tests**

### ✅ Run Postman Tests via CLI (Newman)
```sh
newman run postman_collection.json --reporters cli
```

---

## 🔥 Load Testing (JMeter)
### 📥 Run JMeter Load Tests
```sh
jmeter -n -t jsonplaceholder_test.jmx -l results.jtl -e -o jmeter-report/
```
### 📊 Performance Metrics:
- **Response Time:** Time taken per request
- **Error Rate:** Failed request percentage
- **Latency:** Delay before transfer starts

---

## 🎭 End-to-End Testing (Playwright)
### 📥 Install Playwright
```sh
npm install -D @playwright/test
```
### 🏃 Run Playwright Tests
```sh
npx playwright test
```
### 📊 Playwright Test Report
```sh
npx playwright show-report
```
### ✅ Playwright Test Scenario
- Open the browser and navigate to the **photo/album listing page**
- Enter a **search term** into the search box
- Validate that the **correct results appear**

---

## 🚀 CI/CD - Automated Tests in GitHub Actions
✅ **Triggers:**
- Push or pull request to `main`
- Runs **API, E2E & Load Tests**
- Sends an email if tests fail

### 🔧 Setup Email Notifications
1. Generate an **App Password** (if using Gmail)
2. Add **GitHub Secrets**:
   - `EMAIL_USERNAME` → `your-email@example.com`
   - `EMAIL_PASSWORD` → **App Password**

---

## 📜 Test Cases & Reports
- **Test Cases:** Documented in `test-cases.md`
- **Bug Reports:** Documented in `bug-reports.md`
- **Postman Reports:** Available in `postman-report.html`
- **JMeter Reports:** Available in `jmeter-report/`
- **Playwright Reports:** Available in `playwright-report/`

---

## 🤝 Contributing
1. Fork the repository
2. Create a feature branch
3. Submit a pull request

---

## 📞 Contact
For any questions or issues, reach out via [GitHub Issues](https://github.com/mobarasa/qa-assessment/issues).

🚀 **Happy Testing!**
