# Copilot Instructions for Innovate_Edu_Lms

## Project Overview

This is a Laravel-based Learning Management System (LMS). The codebase follows standard Laravel conventions for routing, controllers, views (Blade), and asset management (Vite/Tailwind). The main entry point for the frontend is `resources/views/welcome.blade.php`.

## Architecture & Key Patterns

- **MVC Structure**: Follows Laravel's MVC pattern. Business logic resides in controllers and models, while presentation is handled via Blade templates in `resources/views/`.
- **Routing**: Web routes are defined in `routes/web.php`. Authentication routes are conditionally rendered in Blade using `Route::has('login')` and `Route::has('register')`.
- **Authentication**: Uses Laravel's built-in authentication scaffolding. Auth state is checked in Blade with `@auth` and `@else`.
- **Asset Pipeline**: Uses Vite for asset bundling. If `public/build/manifest.json` or `public/hot` exists, assets are loaded via `@vite`; otherwise, fallback styles are inlined.
- **Styling**: Uses Tailwind CSS (see inlined fallback in `welcome.blade.php`). Custom color palette and responsive classes are heavily used.
- **Dark Mode**: Blade templates use Tailwind's `dark:` variants for dark mode support.

## Developer Workflows

- **Development Server**: Use `php artisan serve` for backend and `npm run dev` for frontend assets (Vite).
- **Production Build**: Run `npm run build` to generate production assets in `public/build`.
- **Authentication Scaffolding**: If using Laravel Breeze/Jetstream, run `php artisan breeze:install` or `php artisan jetstream:install` as needed.
- **Testing**: Use `php artisan test` for backend tests. Frontend tests (if any) are typically in `resources/js/tests/`.

## Project-Specific Conventions

- **Blade Templates**: Use semantic HTML and Tailwind utility classes. Prefer conditional rendering for navigation/auth links.
- **SVG Assets**: Inline SVGs are used for branding and illustrations in Blade files.
- **No Hardcoded Asset Paths**: Always use Laravel helpers like `asset()`, `url()`, or `@vite` for referencing assets.
- **Responsive Design**: Use Tailwind's responsive classes (`lg:`, etc.) for layout adjustments.

## Integration Points

- **External Docs/Tutorials**: Links to Laravel docs and Laracasts are present in the main welcome page.
- **Deployment**: "Deploy now" button links to [Laravel Cloud](https://cloud.laravel.com).

## Key Files & Directories

- `resources/views/welcome.blade.php`: Main landing page, demonstrates most frontend conventions.
- `routes/web.php`: Main route definitions.
- `public/`: Contains built assets and static files.
- `resources/css/app.css`, `resources/js/app.js`: Main entry points for frontend assets.

## Example: Adding a New Authenticated Page

1. Add a route in `routes/web.php` with `->middleware('auth')`.
2. Create a Blade view in `resources/views/`.
3. Link to it in the navigation using Blade's `@auth` directive.

---

If you need more details on a specific workflow or convention, ask for clarification!
