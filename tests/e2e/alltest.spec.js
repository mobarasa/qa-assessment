import { test, expect } from '@playwright/test';
import { login } from './helpers/index.js';

// Get the base URL from environment or configuration
const BASE_URL = process.env.APP_URL || 'http://localhost:8000';

// Dashboard module
test('Should be able to login and access dashboard', async ({ page }) => {
    await login(page, BASE_URL);
    expect(page.url()).toContain('/dashboard');

    await expect(
        page.getByTestId('dashboard-header', { name: 'Dashboard', exact: true })
    ).toBeVisible();
});

// User module
test('Should be able to access users page, search for a user and view their user details', async ({ page }) => {
    await login(page, BASE_URL);
    expect(page.url()).toContain('/dashboard');

    // navigate to user page
    await page.getByRole('navigation').getByRole('link', { name: 'Users' }).click();
    await expect(
        page.getByTestId('users-header', { name: 'Users', exact: true })
    ).toBeVisible();
    expect(page.url()).toContain('/users');

    // Search for a user
    await page.getByRole('textbox', { name: 'Search users...' }).click();
    await page.getByRole('textbox', { name: 'Search users...' }).fill('Patricia');
    await page.getByRole('cell', { name: 'Patricia Lebsack' }).click();

    // View user details
    await page.getByRole('link', { name: 'View Details' }).click();
    await expect(
        page.getByRole('heading', { name: 'Patricia Lebsack', exact: true })
    ).toBeVisible();
});

// Album module
test('Should be able to access albums page, search for an album and view album photos', async ({ page }) => {
    await login(page, BASE_URL);
    expect(page.url()).toContain('/dashboard');

    // navigate to album page
    await page.getByRole('navigation').getByRole('link', { name: 'Albums' }).click();
    await expect(
        page.getByTestId('albums-header', { name: 'Albums', exact: true })
    ).toBeVisible();
    expect(page.url()).toContain('/albums');

    // Search for an album
    await page.getByRole('textbox', { name: 'Search albums...' }).click();
    await page.getByRole('textbox', { name: 'Search albums...' }).fill('quidem molestiae enim');
    await page.getByText('quidem molestiae enim').click();

    // View album photos
    await page.getByRole('link', { name: 'View Photos' }).first().click();
    await expect(
        page.getByTestId('album-photos-header', { name: 'Album Photos', exact: true })
    ).toBeVisible();
    // View photo in an album
    await page.getByRole('textbox', { name: 'Search photos...' }).click();
    await page.getByRole('textbox', { name: 'Search photos...' }).fill('beatae officiis ut aut');
    await expect(
        page.locator('[title="beatae officiis ut aut"]').first()
    ).toBeVisible();
});
