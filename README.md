# Our Family Farm Nig. Ltd.

Premium agricultural production and consultancy marketing website for a registered Nigerian agribusiness based in Kano with a branch in Hadejia, Jigawa State.

## Quick Start

1. Copy `.env.example` to `.env` and set local database and mail values.
2. Run `composer install`
3. Run `npm install`
4. Run `php artisan key:generate`
5. Run `php artisan migrate --seed`
6. Run `npm run build`
7. Run `php artisan serve`

## Company details

- Company: Our Family Farm Nig. Ltd.
- Registration: RC 3301324
- Head office: 11A Port Louis Close, Tudun Yola, C. Layout, Kano, Nigeria
- Branch: Beside Nagari Café, Opposite Police Headquarters, Hadejia, Jigawa State, Nigeria
- Phone: +234 805 806 1627
- Email: abumuniru1@gmail.com

## Pages and structure

- [resources/views/pages/home.blade.php](resources/views/pages/home.blade.php) – landing page
- [resources/views/pages/about.blade.php](resources/views/pages/about.blade.php) – company profile
- [resources/views/pages/contact.blade.php](resources/views/pages/contact.blade.php) – contact page and map
- [resources/views/pages/services/index.blade.php](resources/views/pages/services/index.blade.php) – services overview
- [resources/views/pages/services/show.blade.php](resources/views/pages/services/show.blade.php) – service detail page
- [resources/views/pages/gallery.blade.php](resources/views/pages/gallery.blade.php) – gallery grid
- [resources/views/components/site-layout.blade.php](resources/views/components/site-layout.blade.php) – shared layout and header/footer
- [resources/views/components/section-heading.blade.php](resources/views/components/section-heading.blade.php) – reusable heading component

## Adding a service or team member

- Add or update records in [database/seeders/DatabaseSeeder.php](database/seeders/DatabaseSeeder.php).
- Keep the `slug` unique for each service.
- The detail page is automatically resolved by the slug in [routes/web.php](routes/web.php).

## Deployment notes

- Use PHP 8.2+ and Composer on a Linux VPS or shared hosting.
- Ensure `storage` and `bootstrap/cache` are writable.
- Set `APP_ENV=production`, `APP_DEBUG=false`, and run `php artisan optimize` before launch.

## Notes

This project follows the required premium agribusiness branding, a reusable Blade component structure, and a Livewire-based enquiry form for a modern marketing website experience.
