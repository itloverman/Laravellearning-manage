<?php


namespace App\Providers;


use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\Contracts\LessonRepositoryInterface;
use App\Repositories\Contracts\PermissionRepositoryInterface;
use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\EloquentCourseRepository;
use App\Repositories\EloquentLessonRepository;
use App\Repositories\EloquentPermissionRepository;
use App\Repositories\EloquentRoleRepository;
use App\Repositories\EloquentUserRepository;
use App\Services\Contracts\ServiceRoleInterface;
use App\Services\Roles\SpatieServiceRole;
use App\Usescases\Courses\Contracts\CreateCourseUsescaseInterface;
use App\Usescases\Courses\Contracts\CreateLessonUsecaseInterface;
use App\Usescases\Courses\Contracts\DeleteLessonUsescaseInterface;
use App\Usescases\Courses\Contracts\ListCourseUsecaseInterface;
use App\Usescases\Courses\Contracts\ListLessonUsecaseInterface;
use App\Usescases\Courses\Contracts\UpdateCourseUsecaseInterface;
use App\Usescases\Courses\Contracts\DeleteCourseUsecaseInterface;
use App\Usescases\Courses\Contracts\UpdateLessonUsescaseInterface;
use App\Usescases\Courses\CreateCourseUsecase;
use App\Usescases\Courses\CreateLessonUsecase;
use App\Usescases\Courses\DeleteLessonUsecase;
use App\Usescases\Courses\ListCourseUsecase;
use App\Usescases\Courses\ListLessonUsecase;
use App\Usescases\Courses\UpdateCourseUsecase;
use App\Usescases\Courses\DeleteCourseUsecase;
use App\Usescases\Courses\UpdateLessonUsecase;
use App\Usescases\Users\AssignRoleUserUsecase;
use App\Usescases\Users\Contracts\AssingRoleUserUsecaseInterface;
use Illuminate\Support\ServiceProvider;
use App\Usescases\Contracts\AssignRoleUserUsecaseInterface;


class ContractsServiceProvider extends ServiceProvider
{

    protected $classes = [
        //Repositories
        UserRepositoryInterface::class => EloquentUserRepository::class,
        CourseRepositoryInterface::class => EloquentCourseRepository::class,
        RoleRepositoryInterface::class => EloquentRoleRepository::class,
        PermissionRepositoryInterface::class => EloquentPermissionRepository::class,
        LessonRepositoryInterface::class => EloquentLessonRepository::class,

        //Usescases
        CreateCourseUsescaseInterface::class => CreateCourseUsecase::class,
        ListCourseUsecaseInterface::class => ListCourseUsecase::class,
        UpdateCourseUsecaseInterface::class => UpdateCourseUsecase::class,
        DeleteCourseUsecaseInterface::class => DeleteCourseUsecase::class,
        CreateLessonUsecaseInterface::class => CreateLessonUsecase::class,
        //AssignRoleUserUsecaseInterface::class => AssignRoleUserUsecase::class,
        UpdateLessonUsescaseInterface::class => UpdateLessonUsecase::class,
        DeleteLessonUsescaseInterface::class => DeleteLessonUsecase::class,
        ListLessonUsecaseInterface::class => ListLessonUsecase::class,


        //Services
        ServiceRoleInterface::class => SpatieServiceRole::class

    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->classes as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
