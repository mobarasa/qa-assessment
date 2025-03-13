/**
 * Helper function to handle login process for Laravel application
 * @param {Object} page - Playwright page object
 * @param {string} baseUrl - Base URL of the application
 * @param {Object} options - Login options
 * @returns {Promise<void>}
 */
const login = async (page, baseUrl, options = {}) => {
    const {
      email = 'test@example.com',
      password = 'password',
      waitForDashboard = true,
      dashboardUrl = '/dashboard',  // Laravel's default route after login
      timeout = 30000
    } = options;

    // Handle external navigation prompts by adding a listener before login actions
  page.on('dialog', async dialog => {
    console.log(`Dialog message: ${dialog.message()}`);
    await dialog.dismiss();
  });

  // Block any external protocol handlers that might trigger the xdg-open prompt
  await page.route('**/*', route => {
    const url = route.request().url();
    if (url.startsWith('http://') || url.startsWith('https://')) {
      return route.continue();
    } else {
      // Block non-http protocols
      console.log(`Blocked navigation to: ${url}`);
      return route.abort();
    }
  });


    // Navigate to login page (Laravel's default auth route)
    await page.goto(`${baseUrl}/login`, { timeout });

    // Fill in login credentials
    await page.getByRole('textbox', { name: 'Email' }).fill(email);
    await page.getByRole('textbox', { name: 'Email' }).press('Tab');
    await page.getByRole('textbox', { name: 'Password' }).fill(password);

    // Click login button
    await page.getByRole('button', { name: 'Log in' }).click();

    // Wait for successful login if specified
    if (waitForDashboard) {
      await page.waitForURL(`${baseUrl}${dashboardUrl}`, { timeout });
    }

    // Verify user is logged in
    try {
      // This selector should be adjusted to match an element that appears on your authenticated pages
      await page.waitForSelector('[data-testid="dashboard-header"]', {
        timeout: 5000,
        state: 'visible'
      });
    } catch (error) {
      console.warn('Could not verify login success by finding user menu element');
    }
  };

  /**
   * Helper function to handle logout process
   * @param {Object} page - Playwright page object
   * @param {string} baseUrl - Base URL of the application
   * @returns {Promise<void>}
   */
  const logout = async (page, baseUrl) => {
    // Common Laravel logout patterns - adjust as needed for your UI
    try {
      // Try clicking a logout button or link if available
      await page.click('[data-testid="logout-button"], .logout-link, a:text("Logout")');
    } catch (error) {
      // Fallback: visit the logout route directly
      await page.goto(`${baseUrl}/logout`);
    }

    // Verify logout by checking for login page or redirect
    await page.waitForURL(`${baseUrl}/login`);
  };

  export { login, logout };
