# 📌 Test Cases

---

## **1. Landing Page**

### **Test Case 1: Verify Landing Page Loads Correctly**
- **Test Case ID:** TC_LP_01
- **Description:** Ensure the landing page loads without errors.
- **Preconditions:** None.
- **Test Steps:**
  1. Open the web application URL.
- **Expected Result:** The landing page should load without errors.
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

### **Test Case 2: Verify Navigation to Login Page**
- **Test Case ID:** TC_LP_02
- **Description:** Ensure the user can navigate to the Login page from the Landing page.
- **Preconditions:** User is on the Landing page.
- **Test Steps:**
  1. Click on the "Login" button.
- **Expected Result:** The user should be redirected to the Login page.
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

## **2. Login Page**

### **Test Case 3: Verify Login with Valid Credentials**
- **Test Case ID:** TC_LOGIN_01
- **Description:** Ensure the user can log in with valid credentials.
- **Preconditions:** User is on the Login page.
- **Test Steps:**
  1. Enter valid username and password.
  2. Click "Login."
- **Expected Result:** The user should be logged in and redirected to the Home page.
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

### **Test Case 4: Verify Login with Invalid Credentials**
- **Test Case ID:** TC_LOGIN_02
- **Description:** Ensure the user cannot log in with invalid credentials.
- **Preconditions:** User is on the Login page.
- **Test Steps:**
  1. Enter invalid username and/or password.
  2. Click "Login."
- **Expected Result:** An error message should be displayed: "Invalid credentials."
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

### **Test Case 5: Verify Login with Empty Credentials**
- **Test Case ID:** TC_LOGIN_03
- **Description:** Ensure the user cannot log in with empty credentials.
- **Preconditions:** User is on the Login page.
- **Test Steps:**
  1. Leave username and password fields empty.
  2. Click "Login."
- **Expected Result:** An error message should be displayed: "Username and password are required."
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

## **3. Authenticated Pages**

### **3.1 Home Page**

#### **Test Case 6: Verify Home Page Loads After Login**
- **Test Case ID:** TC_HOME_01
- **Description:** Ensure the Home page loads correctly after login.
- **Preconditions:** User is logged in.
- **Test Steps:**
  1. Navigate to the Home page.
- **Expected Result:** The Home page should load without errors.
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

#### **Test Case 7: Verify Logout Functionality**
- **Test Case ID:** TC_HOME_02
- **Description:** Ensure the user can log out successfully.
- **Preconditions:** User is on the Home page.
- **Test Steps:**
  1. Click on the "Logout" button.
- **Expected Result:** The user should be logged out and redirected to the Landing page.
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

### **3.2 User Page**

#### **Test Case 8: Verify User Page Loads Correctly**
- **Test Case ID:** TC_USER_01
- **Description:** Ensure the User page displays user details fetched from the API.
- **Preconditions:** User is logged in.
- **Test Steps:**
  1. Navigate to the User page.
- **Expected Result:** The User page should display user details fetched from the API.
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

#### **Test Case 9: Verify Error Handling for User Page**
- **Test Case ID:** TC_USER_02
- **Description:** Ensure the User page handles API errors gracefully.
- **Preconditions:** API is down or returns an error.
- **Test Steps:**
  1. Navigate to the User page.
- **Expected Result:** An error message should be displayed: "Unable to fetch user data."
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

### **3.3 Album Page**

#### **Test Case 10: Verify Album Page Loads Correctly**
- **Test Case ID:** TC_ALBUM_01
- **Description:** Ensure the Album page displays album details fetched from the API.
- **Preconditions:** User is logged in.
- **Test Steps:**
  1. Navigate to the Album page.
- **Expected Result:** The Album page should display album details fetched from the API.
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

#### **Test Case 11: Verify Error Handling for Album Page**
- **Test Case ID:** TC_ALBUM_02
- **Description:** Ensure the Album page handles API errors gracefully.
- **Preconditions:** API is down or returns an error.
- **Test Steps:**
  1. Navigate to the Album page.
- **Expected Result:** An error message should be displayed: "Unable to fetch album data."
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

### **3.4 Photo Page**

#### **Test Case 12: Verify Photo Page Loads Correctly**
- **Test Case ID:** TC_PHOTO_01
- **Description:** Ensure the Photo page displays photo details fetched from the API.
- **Preconditions:** User is logged in.
- **Test Steps:**
  1. Navigate to the Photo page.
- **Expected Result:** The Photo page should display photo details fetched from the API.
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---

#### **Test Case 13: Verify Error Handling for Photo Page**
- **Test Case ID:** TC_PHOTO_02
- **Description:** Ensure the Photo page handles API errors gracefully.
- **Preconditions:** API is down or returns an error.
- **Test Steps:**
  1. Navigate to the Photo page.
- **Expected Result:** An error message should be displayed: "Unable to fetch photo data."
- **Actual Result:** (To be filled during testing)
- **Status:** (Pass/Fail)

---
