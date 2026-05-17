# NDPC Web Code Organization Review

Generated for this Laravel project on 2026-05-15.

This document explains the current way the project is written, the meaning of the main code patterns, and practical improvements to make the codebase more professional, consistent, and easier to maintain.

## Project Style Summary

This is a Laravel 12 application using Breeze authentication, Blade views, Vite assets, Bootstrap, Tailwind, and Spatie Laravel Permission.

The project currently follows this broad structure:

- `app/Http/Controllers/Backend`: admin panel controllers.
- `app/Http/Controllers/Auth`: Breeze authentication controllers.
- `app/Http/Requests`: validation classes for form submissions.
- `app/Models`: Eloquent models for database tables.
- `app/Traits/HandlesUploads.php`: shared upload and delete logic.
- `routes/web.php`: backend/admin and auth route loading.
- `routes/frontend.php`: public frontend page routes.
- `resources/views/backend`: admin panel Blade templates.
- `resources/views/frontend`: frontend Blade templates.
- `database/migrations`: database table definitions.
- `database/seeders`: initial role and permission data.

The most important pattern in your backend is the reusable `AdminBaseController`. Most content-management controllers extend it and only define model, view path, request class, upload fields, upload path, and route name. This is a useful direction because it reduces repeated CRUD code.

## Current Coding Pattern

### Backend Controller Pattern

Most backend controllers look like this:

```php
class AboutController extends AdminBaseController
{
    protected $model;
    protected $viewPath = 'backend.about.';
    protected $requestClass = AboutRequest::class;
    protected $uploadFields = ['image'];
    protected $uploadPath = 'abouts';
    protected $routePrefix = 'about.index';

    public function __construct(About $model)
    {
        $this->model = $model;
    }
}
```

Definition:

- `$model`: Eloquent model used for CRUD.
- `$viewPath`: Blade folder prefix.
- `$requestClass`: FormRequest used for validation.
- `$uploadFields`: file input names handled by `HandlesUploads`.
- `$uploadPath`: storage folder inside the public disk.
- `$routePrefix`: named route used after store, update, or delete.

This is good because it keeps simple content controllers small. The improvement is to make the properties typed and consistent:

```php
protected string $viewPath = 'backend.about.';
protected string $requestClass = AboutRequest::class;
protected array $uploadFields = ['image'];
protected string $uploadPath = 'abouts';
protected string $routePrefix = 'about.index';
```

### Request Validation Pattern

Form validation is separated into files like `AboutRequest.php`, `BlogRequest.php`, and `VacancyRequest.php`. This is professional because controllers stay cleaner.

Improve by keeping validation style consistent. Some requests use array rules:

```php
'title_en' => ['required', 'string', 'max:255'],
```

Some use string rules:

```php
'title_en' => 'required|string|max:255',
```

Both work, but choose one style. Array syntax is easier when adding conditional rules, so it is recommended.

### Model Pattern

Models define fillable fields, relationships, soft deletes, and slug generation. This is good Laravel structure.

Improve by checking every model for:

- `protected $fillable`.
- Relationship return types.
- Consistent singular/plural naming.
- Casts for booleans, arrays, JSON, dates, and integers.
- Slug generation extracted into a shared trait if many models do the same thing.

### View Pattern

The project separates backend and frontend Blade files clearly. This is good.

Improve by making folder names consistent:

- Prefer kebab-case or snake_case, but do not mix too much.
- Current examples include `ourProduct`, `employeeQuarters`, `sitesetting`, `teamMember`, and `technologySolutions`.
- A professional Laravel project usually prefers one convention, for example `our-product`, `employee-quarters`, `site-setting`, `team-members`, `technology-solutions`.

## Highest Priority Improvements

1. Fix controller namespace and duplicate controller base files.

   Backend controllers should live in `App\Http\Controllers\Backend`. The root `App\Http\Controllers\Controller` should remain only at `app/Http/Controllers/Controller.php`. Avoid keeping another `Controller.php` inside `Backend` unless it has a clear backend-specific purpose.

2. Rename backend route prefix.

   `Route::prefix('Backend')` works, but URLs are normally lowercase. Use:

   ```php
   Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
       // routes
   });
   ```

   Then route names become clearer, such as `admin.dashboard.index`.

3. Remove database queries from `AppServiceProvider::boot`.

   `AppServiceProvider.php` queries `menus` during application boot. This can break commands like `php artisan route:list` when the database is unavailable. Move menu sharing into a view composer or cache it safely.

4. Remove `dd()` from production controller code.

   `AdminBaseController::store()` contains `dd($e->getMessage())`. This will stop the app and expose errors to users. Replace it with logging and redirect errors.

5. Add tests for backend CRUD.

   Add feature tests for creating, updating, deleting, and validation failures for important resources.

6. Standardize naming.

   Use one naming style for route URLs, route names, Blade folders, migration fields, and model properties.

7. Use services for complex logic.

   `AdminBaseController`, `MenuController`, `RoleController`, `UserController`, and `AppServiceProvider` should not keep growing. Move upload, menu tree, role assignment, and dashboard statistics into service classes when they become more complex.

## Recommended Folder Organization

Suggested future structure:

```text
app/
  Http/
    Controllers/
      Admin/
      Frontend/
      Auth/
    Requests/
      Admin/
      Auth/
  Models/
  Services/
    UploadService.php
    MenuService.php
  Traits/
routes/
  web.php
  admin.php
  frontend.php
resources/views/
  admin/
  frontend/
```

You currently use `Backend`; that is acceptable, but Laravel projects often use `Admin` for dashboard/admin-panel code. Choose one term and use it everywhere.

## File Inventory And Improvement Notes

This inventory focuses on source files and project files. It intentionally excludes `vendor`, `node_modules`, `storage`, and generated cache files.

### Root Project Files

- `.editorconfig`: Defines editor formatting. Keep it and follow it.
- `.env`: Local environment file. Never commit real credentials.
- `.env.example`: Example environment file. Keep this updated when new env variables are added.
- `.gitattributes`: Git file handling. Usually no change needed.
- `.gitignore`: Ignored files. Ensure `.env`, `vendor`, `node_modules`, and storage cache remain ignored.
- `README.md`: Project introduction. Improve with setup steps, admin login, test commands, and deployment notes.
- `artisan`: Laravel CLI entrypoint. Do not edit.
- `composer.json`: PHP dependencies and scripts. Add Pint formatting script if desired.
- `composer.lock`: Locked PHP dependency versions. Commit this for application projects.
- `package.json`: Frontend dependencies and scripts. Keep only packages actually used.
- `package-lock.json`: Locked JS dependency versions. Commit this.
- `phpunit.xml`: Test configuration. Add testing database settings if needed.
- `postcss.config.js`: CSS build config. Keep aligned with Tailwind version.
- `tailwind.config.js`: Tailwind config. Add content paths carefully when adding new view folders.
- `vite.config.js`: Asset build config. Keep input files current.

### Bootstrap And Public Files

- `bootstrap/app.php`: Laravel app bootstrap. Keep route loading clean.
- `bootstrap/providers.php`: Service provider registration. Add custom providers here if needed.
- `public/.htaccess`: Apache rewrite rules. Do not edit unless deployment needs it.
- `public/favicon.ico`: Site icon. Replace with project-specific icon.
- `public/hot`: Vite dev marker. Usually should not be committed.
- `public/index.php`: Public entrypoint. Do not edit.
- `public/robots.txt`: Search engine rules. Update before production.

### Routes

- `routes/web.php`: Backend/admin route definitions and route includes. Improve by using lowercase `admin` prefix, route name prefix, and moving admin routes to `routes/admin.php` if the file grows.
- `routes/frontend.php`: Public page routes. Improve by using frontend controllers instead of closure routes when pages become dynamic.
- `routes/auth.php`: Breeze auth routes. Keep unless customizing auth flow.
- `routes/console.php`: Console command routes. Add scheduled or custom commands here.

### Controllers

- `app/Http/Controllers/Controller.php`: Root base controller. Keep this in root namespace for auth and normal controllers.
- `app/Http/Controllers/Backend/Controller.php`: Backend base controller file. Remove if it only duplicates the root controller and has no backend-specific logic.
- `app/Http/Controllers/Backend/AdminBaseController.php`: Shared CRUD controller. Improve with typed properties, no `dd()`, logging, transactions in update, and clearer upload cleanup.
- `app/Http/Controllers/Backend/AboutController.php`: Single-record about page controller. Good use of base CRUD; document why `index()` returns form directly.
- `app/Http/Controllers/Backend/AlbumController.php`: Album CRUD. Ensure slug and gallery relationships are handled consistently.
- `app/Http/Controllers/Backend/BannerController.php`: Banner CRUD. Keep upload fields and route names consistent.
- `app/Http/Controllers/Backend/BlogCategoryController.php`: Blog category CRUD. Keep slug uniqueness and relationship cleanup consistent.
- `app/Http/Controllers/Backend/BlogController.php`: Blog CRUD. Ensure category syncing and user assignment are tested.
- `app/Http/Controllers/Backend/BoardDirectorController.php`: Team member controller filtered for board directors. Consider a shared team-member service.
- `app/Http/Controllers/Backend/CompanyGoalController.php`: Company goal CRUD. Since it may be single-record, keep behavior consistent with `AboutController`.
- `app/Http/Controllers/Backend/DarkBannerController.php`: Feature area type controller. Consider renaming if it uses `FeatureAreas` model.
- `app/Http/Controllers/Backend/DashboardController.php`: Dashboard page controller. Move statistics queries into a service if this grows.
- `app/Http/Controllers/Backend/EmployeeQuarterController.php`: Employee quarter CRUD. Ensure year and quarter validation are strict.
- `app/Http/Controllers/Backend/FeatureController.php`: Service/feature CRUD. Check naming because it appears to use service-related request/model.
- `app/Http/Controllers/Backend/GalleryController.php`: Gallery CRUD. Good candidate for multiple-image upload tests.
- `app/Http/Controllers/Backend/LeadingTeamController.php`: Team member controller filtered for leading team. Reduce duplication with board directors.
- `app/Http/Controllers/Backend/MenuController.php`: Menu CRUD and menu ordering. Move tree/order logic into a `MenuService`.
- `app/Http/Controllers/Backend/MvgController.php`: Mission/vision/goals or feature-area CRUD. Rename clearly if `Mvg` is not obvious to future developers.
- `app/Http/Controllers/Backend/NoticeController.php`: Notice CRUD. Ensure `type` is fixed to notices when route is notices.
- `app/Http/Controllers/Backend/OurProductController.php`: Product section CRUD. Consider route/folder naming `our-products`.
- `app/Http/Controllers/Backend/PermissionController.php`: Permission controller. Confirm if used; remove dead controller if unused.
- `app/Http/Controllers/Backend/PlayStoreController.php`: Appears related to promotion message. Rename or remove if unused to avoid confusion.
- `app/Http/Controllers/Backend/ProfileController.php`: Admin profile controller. Confirm namespace import in routes; current route imports root `ProfileController`, which should be checked.
- `app/Http/Controllers/Backend/PromotionMessageController.php`: Promotion message CRUD. Good small base-controller use case.
- `app/Http/Controllers/Backend/RecruitmentResultController.php`: Recruitment result CRUD. Consider casting candidate arrays in model.
- `app/Http/Controllers/Backend/ReportController.php`: Report CRUD. Ensure it is not accidentally using notice behavior without type isolation.
- `app/Http/Controllers/Backend/RoleController.php`: Role and permission management. Keep authorization checks strict.
- `app/Http/Controllers/Backend/ServiceController.php`: Service CRUD. Keep naming distinct from feature areas.
- `app/Http/Controllers/Backend/SiteSettingController.php`: Site setting controller. Good candidate for single-record pattern and caching.
- `app/Http/Controllers/Backend/TeamMemberController.php`: General team member controller. Confirm if used; remove if board/leading controllers cover all use cases.
- `app/Http/Controllers/Backend/TechnologySolutionCategoryController.php`: Technology category CRUD. Ensure delete behavior handles child items safely.
- `app/Http/Controllers/Backend/TechnologySolutionItemController.php`: Technology item CRUD. This has many fields; consider a dedicated service if form logic grows.
- `app/Http/Controllers/Backend/TechnologySolutionSectionController.php`: Technology section CRUD. Consider single-record pattern if only one section exists.
- `app/Http/Controllers/Backend/TestimonialController.php`: Testimonial CRUD. Standardize image validation.
- `app/Http/Controllers/Backend/UserController.php`: User management. Keep password, role assignment, image upload, and soft delete logic tested.
- `app/Http/Controllers/Backend/VacancyController.php`: Vacancy CRUD. Ensure slug and deadline validation are reliable.
- `app/Http/Controllers/Auth/AuthenticatedSessionController.php`: Breeze login/logout controller. Keep unless customizing authentication.
- `app/Http/Controllers/Auth/ConfirmablePasswordController.php`: Breeze password confirmation. Usually no change.
- `app/Http/Controllers/Auth/EmailVerificationNotificationController.php`: Breeze email verification notification. Usually no change.
- `app/Http/Controllers/Auth/EmailVerificationPromptController.php`: Breeze email verification prompt. Usually no change.
- `app/Http/Controllers/Auth/NewPasswordController.php`: Breeze password reset. Usually no change.
- `app/Http/Controllers/Auth/PasswordController.php`: Breeze password update. Usually no change.
- `app/Http/Controllers/Auth/PasswordResetLinkController.php`: Breeze reset link. Usually no change.
- `app/Http/Controllers/Auth/RegisteredUserController.php`: Breeze registration. Disable public registration if admin users should be created only by admin.
- `app/Http/Controllers/Auth/VerifyEmailController.php`: Breeze email verification. Usually no change.

### Requests

- `app/Http/Requests/AboutRequest.php`: About validation. Use consistent array rule style.
- `app/Http/Requests/AlbumRequest.php`: Album validation. Ensure slug uniqueness and image update behavior are correct.
- `app/Http/Requests/Auth/LoginRequest.php`: Breeze login validation. Usually no change.
- `app/Http/Requests/BannerRequest.php`: Banner validation. Add dimensions rule if banners require fixed size.
- `app/Http/Requests/BlogCategoryRequest.php`: Blog category validation. Keep slug unique.
- `app/Http/Requests/BlogRequest.php`: Blog validation. Ensure category IDs exist.
- `app/Http/Requests/CompanyGoalRequest.php`: Company goal validation. Use image dimensions if needed.
- `app/Http/Requests/DarkBannerRequest.php`: Dark banner validation. Consider using enum/constants for type values.
- `app/Http/Requests/EmployeeQuarterRequest.php`: Employee quarter validation. Year should probably be integer or date-year.
- `app/Http/Requests/GalleryRequest.php`: Gallery validation. Decide whether gallery supports one or multiple images.
- `app/Http/Requests/MenuRequest.php`: Menu validation. This is complex; consider splitting SEO fields or menu rules into smaller methods.
- `app/Http/Requests/MvgRequest.php`: MVG validation. Rename class if `Mvg` is unclear.
- `app/Http/Requests/NoticeRequest.php`: Notice/report validation. Consider separate `NoticeRequest` and `ReportRequest` if behavior differs.
- `app/Http/Requests/OurProductRequest.php`: Product validation. Good candidate for image dimension rules.
- `app/Http/Requests/ProfileUpdateRequest.php`: Breeze profile validation. Usually no change.
- `app/Http/Requests/PromotionMessageRequest.php`: Promotion message validation. Link validation is good.
- `app/Http/Requests/RecruitmentResultRequest.php`: Candidate list validation. Cast arrays in model.
- `app/Http/Requests/ServiceRequest.php`: Service validation. Bootstrap icon validation is useful.
- `app/Http/Requests/SiteSettingRequest.php`: Site setting validation. Keep URLs and emails strict.
- `app/Http/Requests/TeamMemberRequest.php`: Team member validation. Split board director and leading team rules if fields differ.
- `app/Http/Requests/TechnologySolutionCategoryRequest.php`: Category validation. Add uniqueness if titles/slugs must be unique.
- `app/Http/Requests/TechnologySolutionItemRequest.php`: Item validation. Consider smaller private methods for stats and use-case rules.
- `app/Http/Requests/TechnologySolutionSectionRequest.php`: Section validation. Add max length if title is displayed in fixed layout.
- `app/Http/Requests/TestimonialRequest.php`: Testimonial validation. Add image dimensions if design requires it.
- `app/Http/Requests/UsersRequest.php`: User validation. Good use of custom messages; ensure update ignores current user email.
- `app/Http/Requests/VacancyRequest.php`: Vacancy validation. Ensure slug unique rule works on update.

### Models

- `app/Models/About.php`: About model. Add casts for `is_active`.
- `app/Models/Album.php`: Album model. Relationship to galleries is good; move slug generation to shared trait if repeated.
- `app/Models/Banner.php`: Banner model. Add casts for active flag.
- `app/Models/Blog.php`: Blog model. Good category and user relationships; cast dates and active flag.
- `app/Models/BlogCategory.php`: Blog category model. Good relationship; shared slug trait recommended.
- `app/Models/CompanyGoal.php`: Company goal model. Add soft deletes if admin delete should be reversible.
- `app/Models/EmployeeQuarter.php`: Employee quarter model. Cast quarter/year appropriately.
- `app/Models/FeatureAreas.php`: Feature area model. Rename to singular `FeatureArea` for Laravel convention.
- `app/Models/Gallery.php`: Gallery model. Good album relationship; cast active flag.
- `app/Models/Menu.php`: Menu model. Good parent/children relationships; consider scope methods for header/footer/useful links.
- `app/Models/Notice.php`: Notice model. Consider soft deletes and file casts if needed.
- `app/Models/OurProduct.php`: Product model. Consider plural route/view naming consistency.
- `app/Models/PromotionMessage.php`: Promotion message model. Add casts for active flag.
- `app/Models/RecruitmentResult.php`: Recruitment result model. Cast candidate JSON fields to arrays.
- `app/Models/Role.php`: Spatie role extension. Keep only custom behavior here.
- `app/Models/Service.php`: Service model. Cast position and active flag.
- `app/Models/SiteSetting.php`: Site setting model. Consider cache invalidation after update.
- `app/Models/TeamMember.php`: Team member model. Cast sort order and active flag.
- `app/Models/TechnologySolutionCategory.php`: Category model. Good item relationship; cast position.
- `app/Models/TechnologySolutionItem.php`: Item model. Cast stats and active flag.
- `app/Models/TechnologySolutionSection.php`: Section model. Add casts.
- `app/Models/Testimonial.php`: Testimonial model. Cast active flag.
- `app/Models/User.php`: User model. Keep role relationships through Spatie; add image cleanup if user image changes.
- `app/Models/Vacancy.php`: Vacancy model. Slug generation is useful; cast deadline as date.

### Mail, Policies, Providers, Traits, Components

- `app/Mail/UserWelcomeMail.php`: Welcome email. Ensure queueing if user creation sends email often.
- `app/Policies/PermissionPolicy.php`: Permission policy. Keep permission names centralized to avoid typos.
- `app/Providers/AppServiceProvider.php`: App boot logic. Move menu queries out of boot or cache them.
- `app/Traits/HandlesUploads.php`: Shared upload helper. Improve by adding type hints, return types, private JSON helper safety, and tests.
- `app/View/Components/AppLayout.php`: Breeze layout component. Usually no change.
- `app/View/Components/GuestLayout.php`: Breeze guest layout component. Usually no change.

### Config Files

- `config/app.php`: App config. Keep app name/timezone/env correct.
- `config/auth.php`: Auth guards/providers. Usually no change unless adding admin guard.
- `config/cache.php`: Cache config. Use Redis/database cache in production if available.
- `config/database.php`: Database config. Keep credentials in `.env`.
- `config/filesystems.php`: File storage config. Ensure public disk is linked with `php artisan storage:link`.
- `config/logging.php`: Logging config. Use daily logs in production.
- `config/mail.php`: Mail config. Keep credentials in `.env`.
- `config/permission.php`: Spatie permission config. Clear permission cache after permission changes.
- `config/queue.php`: Queue config. Use database/redis queue for mail and slow tasks.
- `config/services.php`: Third-party service credentials. Keep secrets in `.env`.
- `config/session.php`: Session config. Use secure cookies in production.

### Database Files

- `database/.gitignore`: Keeps generated database files out of Git. Usually no change.
- `database/factories/UserFactory.php`: User factory. Extend for admin/test users.
- `database/migrations/0001_01_01_000000_create_users_table.php`: Users table. Keep aligned with `User` model fields.
- `database/migrations/0001_01_01_000001_create_cache_table.php`: Cache table. Usually no change.
- `database/migrations/0001_01_01_000002_create_jobs_table.php`: Jobs table. Use if queues are enabled.
- `database/migrations/2026_04_27_073402_create_banners_table.php`: Banner table. Ensure indexes if ordering/filtering.
- `database/migrations/2026_04_28_061102_create_abouts_table.php`: About table. If only one row is allowed, enforce it in code.
- `database/migrations/2026_04_28_094350_create_permission_tables.php`: Spatie permissions. Usually no change.
- `database/migrations/2026_05_04_074337_add_soft_deletes_to_roles_table.php`: Role soft deletes. Check Spatie compatibility carefully.
- `database/migrations/2026_05_05_094808_create_menus_table.php`: Menu table. Add indexes on `parent_id`, `menu_location`, and `position`.
- `database/migrations/2026_05_07_084412_add_extra_fields_to_users_table.php`: User profile fields. Keep fillable/casts updated.
- `database/migrations/2026_05_11_091721_create_blog_categories_table.php`: Blog categories. Add unique index for slug.
- `database/migrations/2026_05_11_091740_create_blogs_table.php`: Blogs. Add index for user and slug.
- `database/migrations/2026_05_11_101409_create_blog_category_blog_table.php`: Blog-category pivot. Add unique composite index.
- `database/migrations/2026_05_12_055717_create_albums_table.php`: Albums. Add slug uniqueness if used publicly.
- `database/migrations/2026_05_12_055732_create_galleries_table.php`: Galleries. Add album foreign key constraints.
- `database/migrations/2026_05_13_053851_create_team_members_table.php`: Team members. Add type/sort indexes.
- `database/migrations/2026_05_13_091038_create_company_goals_table.php`: Company goals. Decide if single row or multi-row.
- `database/migrations/2026_05_13_093419_create_testimonials_table.php`: Testimonials. Add sort/order if display order matters.
- `database/migrations/2026_05_13_100210_create_employee_quarters_table.php`: Employee quarters. Add index for year/quarter.
- `database/migrations/2026_05_14_035130_create_our_products_table.php`: Products. Decide if single row or multiple rows.
- `database/migrations/2026_05_14_045955_create_technology_solution_sections_table.php`: Technology sections. Decide single vs multiple.
- `database/migrations/2026_05_14_050018_create_technology_solution_categories_table.php`: Technology categories. Add position index.
- `database/migrations/2026_05_14_050033_create_technology_solution_items_table.php`: Technology items. Add category foreign key index.
- `database/migrations/2026_05_14_073232_create_services_table.php`: Services. Add position index.
- `database/migrations/2026_05_14_135538_create_site_settings_table.php`: Site settings. Usually should be single-row.
- `database/migrations/2026_05_14_152350_create_feature_areas_table.php`: Feature areas. Rename model/table concept clearly if possible.
- `database/migrations/2026_05_15_041456_create_notices_table.php`: Notices. Add indexes for type and active flag.
- `database/migrations/2026_05_15_061557_create_recruitment_results_table.php`: Recruitment results. Cast JSON fields in model.
- `database/migrations/2026_05_15_070159_create_vacancies_table.php`: Vacancies. Add slug index and deadline index.
- `database/migrations/2026_05_15_093726_create_promotion_messages_table.php`: Promotion messages. Good single-section candidate.
- `database/seeders/DatabaseSeeder.php`: Main seeder. Call all required seeders here.
- `database/seeders/RolePermissionSeeder.php`: Role/permission seed data. Keep permission names synchronized with policies and views.

### Assets

- `resources/css/app.css`: Main CSS entry. Avoid large custom CSS if utility classes or components can handle it.
- `resources/js/app.js`: Main JS entry. Keep app-wide JS small.
- `resources/js/bootstrap.js`: Axios/bootstrap JS setup. Usually no change.

### Backend Views

- `resources/views/backend/dashboard.blade.php`: Admin dashboard. Move repeated widgets into partials if it grows.
- `resources/views/backend/about/form.blade.php`: About form. Keep field names aligned with `AboutRequest`.
- `resources/views/backend/album/form.blade.php`: Album form. Keep upload preview reusable.
- `resources/views/backend/album/index.blade.php`: Album list. Standardize table actions.
- `resources/views/backend/banner/form.blade.php`: Banner form. Add image size help text if needed.
- `resources/views/backend/banner/index.blade.php`: Banner list. Standardize active/status UI.
- `resources/views/backend/blog/category/form.blade.php`: Blog category form. Keep slug generation clear.
- `resources/views/backend/blog/category/index.blade.php`: Blog category list. Standardize actions.
- `resources/views/backend/blog/form.blade.php`: Blog form. Consider extracting category select.
- `resources/views/backend/blog/index.blade.php`: Blog list. Add filters if content grows.
- `resources/views/backend/emails/user-welcome.blade.php`: Welcome email view. Keep styling email-safe.
- `resources/views/backend/employeeQuarters/form.blade.php`: Employee quarter form. Rename folder to `employee-quarters` for consistency.
- `resources/views/backend/employeeQuarters/index.blade.php`: Employee quarter list. Rename folder consistently.
- `resources/views/backend/features/form.blade.php`: Feature form. Confirm naming matches controller/model.
- `resources/views/backend/features/index.blade.php`: Feature list. Standardize table actions.
- `resources/views/backend/gallery/form.blade.php`: Gallery form. Reuse upload component if possible.
- `resources/views/backend/gallery/index.blade.php`: Gallery list. Add album filter if useful.
- `resources/views/backend/layout/footer.blade.php`: Backend footer layout. Keep scripts organized.
- `resources/views/backend/layout/header.blade.php`: Backend header layout. Keep nav/user dropdown reusable.
- `resources/views/backend/layout/main.blade.php`: Backend layout shell. Avoid page-specific logic here.
- `resources/views/backend/layout/sidebar.blade.php`: Backend sidebar. Use route names and active-state helper.
- `resources/views/backend/menu/form.blade.php`: Menu form. This is complex; split SEO fields into partial.
- `resources/views/backend/menu/index.blade.php`: Menu list/order UI. Keep JavaScript separated if large.
- `resources/views/backend/menu/partials/delete-modal.blade.php`: Delete modal partial. Good use of partial.
- `resources/views/backend/mvg/form.blade.php`: MVG form. Rename if acronym is unclear.
- `resources/views/backend/mvg/index.blade.php`: MVG list. Standardize actions.
- `resources/views/backend/notices/form.blade.php`: Notice form. Ensure report/notice type is clear.
- `resources/views/backend/notices/index.blade.php`: Notice list. Add type/status filters if needed.
- `resources/views/backend/ourProduct/form.blade.php`: Product form. Rename folder to `our-product` or `our-products`.
- `resources/views/backend/recruitments/form.blade.php`: Recruitment result form. Keep candidate row JS maintainable.
- `resources/views/backend/recruitments/index.blade.php`: Recruitment result list. Standardize actions.
- `resources/views/backend/report/form.blade.php`: Report form. Consider separate request/controller if reports differ from notices.
- `resources/views/backend/report/index.blade.php`: Report list. Add file/download clarity.
- `resources/views/backend/roles/permissionForm.blade.php`: Permission form. Keep permission naming consistent.
- `resources/views/backend/roles/roleForm.blade.php`: Role form. Add validation error display consistently.
- `resources/views/backend/roles/roleTrash.blade.php`: Role trash list. Ensure restore/force delete permissions.
- `resources/views/backend/roles/userForm.blade.php`: User form. Consider moving to `backend/user`.
- `resources/views/backend/roles/userIndex.blade.php`: User list. Consider moving to `backend/user`.
- `resources/views/backend/roles/userTrash.blade.php`: User trash list. Consider moving to `backend/user`.
- `resources/views/backend/services/form.blade.php`: Service form. Keep icon input user-friendly.
- `resources/views/backend/services/index.blade.php`: Service list. Add ordering if position exists.
- `resources/views/backend/sitesetting/form.blade.php`: Site setting form. Rename folder to `site-setting`.
- `resources/views/backend/teamMember/boardOfDirectors/form.blade.php`: Board director form. Rename folder with consistent casing.
- `resources/views/backend/teamMember/boardOfDirectors/index.blade.php`: Board director list. Standardize sort order.
- `resources/views/backend/teamMember/leadingTeams/form.blade.php`: Leading team form. Share partials with board director form.
- `resources/views/backend/teamMember/leadingTeams/index.blade.php`: Leading team list. Share table component if possible.
- `resources/views/backend/technologySolutions/categories/form.blade.php`: Technology category form. Rename folder consistently.
- `resources/views/backend/technologySolutions/categories/index.blade.php`: Technology category list. Add sort support if needed.
- `resources/views/backend/technologySolutions/solutionItems/form.blade.php`: Technology item form. Split long form into partials.
- `resources/views/backend/technologySolutions/solutionItems/index.blade.php`: Technology item list. Add category filter.
- `resources/views/backend/testimonials/form.blade.php`: Testimonial form. Standardize image preview.
- `resources/views/backend/testimonials/index.blade.php`: Testimonial list. Add ordering if needed.
- `resources/views/backend/user/form.blade.php`: User form. Align with route/controller folder naming.
- `resources/views/backend/vacancy/form.blade.php`: Vacancy form. Consider date picker and slug preview.
- `resources/views/backend/vacancy/index.blade.php`: Vacancy list. Add deadline/status filters.

### Frontend Views

- `resources/views/frontend/about.blade.php`: About page. Replace static content with model data when ready.
- `resources/views/frontend/album.blade.php`: Album page. Use controller/model data for albums.
- `resources/views/frontend/blogs.blade.php`: Blog list page. Use paginated blog query.
- `resources/views/frontend/blogsingle.blade.php`: Blog detail page. Rename to `blog-single.blade.php` or use route slug.
- `resources/views/frontend/contact.blade.php`: Contact page. Pull site settings from model/cache.
- `resources/views/frontend/default_page.blade.php`: Dynamic menu page. Good candidate for controller-based rendering.
- `resources/views/frontend/employee_quaterly.blade.php`: Employee quarterly page. Fix spelling to `quarterly`.
- `resources/views/frontend/gallery.blade.php`: Gallery page. Use album/gallery relationships.
- `resources/views/frontend/index.blade.php`: Homepage. Move dynamic data loading into frontend controller.
- `resources/views/frontend/job_detail.blade.php`: Job detail page. Use vacancy slug route.
- `resources/views/frontend/layout/footer.blade.php`: Frontend footer. Avoid DB assumptions in layout.
- `resources/views/frontend/layout/main.blade.php`: Frontend layout. Keep page-specific logic out.
- `resources/views/frontend/layout/navbar.blade.php`: Frontend navbar. Use cached menu data.
- `resources/views/frontend/member.blade.php`: Member/team page. Pull active team members from database.
- `resources/views/frontend/notice.blade.php`: Notice page. Use notice query and pagination.
- `resources/views/frontend/product.blade.php`: Product page. Use product model data.
- `resources/views/frontend/report.blade.php`: Report page. Use report type query and pagination.
- `resources/views/frontend/vacancy.blade.php`: Vacancy list page. Use active vacancies with deadline filter.
- `resources/views/frontend/vacancy_result.blade.php`: Vacancy result page. Use recruitment result data.

### Auth, Layout, Component, Profile Views

- `resources/views/auth/confirm-password.blade.php`: Breeze auth view. Usually no change.
- `resources/views/auth/forgot-password.blade.php`: Breeze auth view. Usually no change.
- `resources/views/auth/login.blade.php`: Login view. Customize branding.
- `resources/views/auth/register.blade.php`: Registration view. Remove/disable if public registration is not needed.
- `resources/views/auth/reset-password.blade.php`: Breeze auth view. Usually no change.
- `resources/views/auth/verify-email.blade.php`: Breeze auth view. Usually no change.
- `resources/views/components/application-logo.blade.php`: App logo component. Replace with NDPC logo.
- `resources/views/components/auth-session-status.blade.php`: Breeze component. Usually no change.
- `resources/views/components/danger-button.blade.php`: Breeze component. Usually no change.
- `resources/views/components/dropdown-link.blade.php`: Breeze component. Usually no change.
- `resources/views/components/dropdown.blade.php`: Breeze component. Usually no change.
- `resources/views/components/input-error.blade.php`: Breeze component. Reuse in backend forms if possible.
- `resources/views/components/input-label.blade.php`: Breeze component. Reuse in backend forms if possible.
- `resources/views/components/modal.blade.php`: Breeze component. Reuse for delete modals.
- `resources/views/components/nav-link.blade.php`: Breeze component. Usually no change.
- `resources/views/components/primary-button.blade.php`: Breeze component. Reuse in forms.
- `resources/views/components/responsive-nav-link.blade.php`: Breeze component. Usually no change.
- `resources/views/components/secondary-button.blade.php`: Breeze component. Usually no change.
- `resources/views/components/text-input.blade.php`: Breeze component. Reuse in backend forms if style matches.
- `resources/views/dashboard.blade.php`: Default Breeze dashboard. Remove if backend dashboard replaces it.
- `resources/views/layouts/app.blade.php`: Breeze app layout. Keep for auth/profile pages.
- `resources/views/layouts/guest.blade.php`: Breeze guest layout. Keep for login/reset pages.
- `resources/views/layouts/navigation.blade.php`: Breeze navigation. Remove or customize if unused.
- `resources/views/profile/edit.blade.php`: Breeze profile page. Ensure route/controller namespace matches.
- `resources/views/profile/partials/delete-user-form.blade.php`: Profile delete partial. Usually no change.
- `resources/views/profile/partials/update-password-form.blade.php`: Password update partial. Usually no change.
- `resources/views/profile/partials/update-profile-information-form.blade.php`: Profile info partial. Usually no change.
- `resources/views/welcome.blade.php`: Laravel welcome page. Remove if not used.

## Professional Coding Checklist

Use this checklist when adding or cleaning any feature.

- Controller is in the correct namespace.
- Route uses a lowercase URL and a consistent route name.
- Controller does not contain validation rules directly.
- Validation is in a FormRequest.
- Model has `$fillable` and casts.
- File uploads are handled by one shared service or trait.
- No `dd()`, `dump()`, or temporary comments remain.
- Error handling logs the real exception but shows users a clean message.
- Blade folder name matches route/resource name.
- Repeated form fields are partials/components.
- Delete actions use CSRF and method spoofing.
- Authorization checks protect admin-only actions.
- Feature has at least one happy-path test and one validation test.
- `php artisan route:list` works without requiring fragile boot queries.
- `./vendor/bin/pint` or equivalent formatting is run before commit.

## Suggested Refactor Order

1. Stabilize namespaces and route imports.
2. Remove duplicate or unused controllers.
3. Move menu database queries out of `AppServiceProvider`.
4. Clean `AdminBaseController` error handling and typed properties.
5. Standardize route prefixes and names.
6. Standardize Blade folder naming.
7. Add model casts and relationship return types.
8. Add tests for the most important admin CRUD modules.
9. Convert static frontend routes to frontend controllers.
10. Add caching for site settings and menus.

## Example Target Route Structure

```php
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {
        Route::resource('dashboard', DashboardController::class)->only(['index']);
        Route::resource('banners', BannerController::class);
        Route::resource('blogs', BlogController::class);
    });
```

Benefits:

- URLs are professional: `/admin/blogs`.
- Route names are clear: `admin.blogs.index`.
- Sidebar active checks become easier.
- Frontend and backend routes are clearly separated.

## Example Improved Base Controller Ideas

Avoid this in production:

```php
dd($e->getMessage());
```

Use this instead:

```php
report($e);

return back()
    ->withInput()
    ->with('error', 'Unable to save the record. Please try again.');
```

This keeps real errors in logs and avoids exposing internal details to users.

## Final Notes

Your project is already moving in the right direction because it uses Laravel FormRequests, Eloquent models, Blade layout separation, Spatie permissions, and a reusable CRUD base controller. The main professional improvements are consistency, naming, safer error handling, route organization, and tests.

The biggest technical risk right now is application boot depending on a database query in `AppServiceProvider`. Fixing that will make local development, artisan commands, testing, and deployment more reliable.
