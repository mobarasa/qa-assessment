# Bug Report

This document provides a detailed description of a bug discovered during manual testing of the web application.

---

## **Bug Details**

| **Field**               | **Details**                                                                 |
|-------------------------|-----------------------------------------------------------------------------|
| **Bug ID**              | BUG_LOGIN_01                                                               |
| **Title**               | Login fails: Page refreshes after entering valid credentials                |
| **Severity**            | High                                                                       |
| **Priority**            | High                                                                       |
| **Reported By**         | Michael Barasa                                                             |
| **Reported Date**       | 10/03/2025                                                                 |
| **Environment**         | Browser: Chrome v117, OS: Windows 10                                       |
| **Build Version**       | v1.0.0                                                                     |
| **Category**            | Authentication                                                             |
| **Status**              | Open                                                                       |
| **Assigned To**         | John Doe                                                                   |

---

## **Description**
When a user enters valid credentials on the Login page and clicks the "Login" button, the page refreshes instead of logging the user in and redirecting them to the Home page. This issue prevents users from accessing authenticated pages and impacts the core functionality of the application.

---

## **Steps to Reproduce**
1. Navigate to the Login page.
2. Enter valid credentials:
   - Username: `testuser`
   - Password: `testpassword`
3. Click the "Login" button.

---

## **Expected Result**
- The user should be authenticated successfully.
- The user should be redirected to the Home page.
- The authenticated navigation menu (Home, User, Album, Photo) should be accessible.

---

## **Actual Result**
- The page refreshes, and the user remains on the Login page.
- No error message is displayed.
- The user is not logged in, and authenticated pages remain inaccessible.

---

## **Attachments**
1. **Screenshot 1:** Login page before clicking "Login."
   ![Login Page Before](screenshots/login_before.png)
2. **Screenshot 2:** Login page after clicking "Login."
   ![Login Page After](screenshots/login_after.png)
3. **Console Logs:** Errors or warnings in the browser console.
