<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\Gallery\AddProgramGalleryComponent;
use App\Livewire\Admin\News\AdminCreateNewsComponent;
use App\Livewire\Admin\News\AdminEditNewsComponent;
use App\Livewire\Admin\News\AdminNewsComponent;
use App\Livewire\Admin\News\NewLetterSubscribers;
use App\Livewire\Admin\Profile\ChangePasswordComponent;
use App\Livewire\Admin\Profile\ProfileComponent;
use App\Livewire\Admin\Projects\AdminAddProjectComponent;
use App\Livewire\Admin\Projects\AdminEditProjectComponent;
use App\Livewire\Admin\Projects\AdminProjectsComponent;
use App\Livewire\Admin\Services\AdminAddServiceComponent;
use App\Livewire\Admin\Services\AdminEditServiceComponent;
use App\Livewire\Admin\Services\AdminServicesComponent;
use App\Livewire\Admin\Teams\AdminAddTeamComponent;
use App\Livewire\Admin\Teams\AdminEditTeamComponent;
use App\Livewire\Admin\Teams\AdminTeamsComponent;
use App\Livewire\Guest\AboutComponent;
use App\Livewire\Guest\ContactComponent;
use App\Livewire\Guest\FaqsComponent;
use App\Livewire\Guest\NewsComponent;
use App\Livewire\Guest\NewsDetailsComponent;
use App\Livewire\Guest\ProjectComponent;
use App\Livewire\Guest\ProjectDetailsComponent;
use App\Livewire\Guest\ServiceComponent;
use App\Livewire\Guest\ServiceDetailsComponent;
use App\Livewire\Guest\TeamComponent;
use App\Livewire\Guest\TeamDetailsComponent;
use App\Livewire\Guest\UnsubscribeComponent;
use App\Livewire\Guest\WelcomeComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeComponent::class)->name('welcome');

Route::get('/about', AboutComponent::class)->name('about');
Route::get('/services', ServiceComponent::class)->name('services');
Route::get('/news/{slug}', ServiceDetailsComponent::class)->name('service.show');
Route::get('/our-portfolio', ProjectComponent::class)->name('projects');
Route::get('/portfolio/{slug}/details', ProjectDetailsComponent::class)->name('project.details');
Route::get('/team', TeamComponent::class)->name('team');
Route::get('/team-member/{id}/details', TeamDetailsComponent::class)->name('team.details');
Route::get('/contact-us', ContactComponent::class)->name('contact');
Route::get('/news-updates', NewsComponent::class)->name('news');
Route::get('/news-update/{slug}', NewsDetailsComponent::class)->name('news.show');
Route::get('/frequently-asked-questions', FaqsComponent::class)->name('faqs');

Route::get('/unsubscribe/{email}/{token}', UnsubscribeComponent::class)->name('unsubscribe');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', AdminDashboard::class)->name('admin.dashboard');

        Route::get('/profile', ProfileComponent::class)->name('profile');
        Route::get('/change-password', ChangePasswordComponent::class)->name('password.change');

        Route::get('/team-member/add', AdminAddTeamComponent::class)->name('team.create');
        Route::get('/team-members', AdminTeamsComponent::class)->name('team.index');
        Route::get('/team-member/{id}/edit', AdminEditTeamComponent::class)->name('team.edit');

        Route::get('/news/create', AdminCreateNewsComponent::class)->name('news.create');
        Route::get('/news', AdminNewsComponent::class)->name('news.index');
        Route::get('/news/{id}/edit', AdminEditNewsComponent::class)->name('news.edit');

        Route::get('/subscribers', NewLetterSubscribers::class)->name('subscriber.index');

        Route::get('/service/create', AdminAddServiceComponent::class)->name('service.create');
        Route::get('/services', AdminServicesComponent::class)->name('service.index');
        Route::get('/service/{id}/edit', AdminEditServiceComponent::class)->name('service.edit');

        Route::get('/project/create', AdminAddProjectComponent::class)->name('project.create');
        Route::get('/projects', AdminProjectsComponent::class)->name('project.index');
        Route::get('/project/{id}/edit', AdminEditProjectComponent::class)->name('project.edit');

        Route::get('/gallery/upload', AddProgramGalleryComponent::class)
            ->name('gallery.upload');

    });
});
