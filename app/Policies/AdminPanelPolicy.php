<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class AdminPanelPolicy
 * Политика для определения возможностей доступа к админ-панели в целом и для отдельных ее пунктов
 */
class AdminPanelPolicy
{
    use HandlesAuthorization;


    const ADMIN_ACCESS = 'admin_access';
    const USERS_ACCESS = 'users_management';
    const BRANDS_ACCESS = 'brand_management';
    const ACTIONS_ACCESS = 'actions_management';


    public function admin_access(User $user)
    {
        return $user->hasPrivilege(self::ADMIN_ACCESS);
    }


    public function users_management(User $user)
    {
        return $user->hasPrivilege(self::USERS_ACCESS);
    }


    public function brand_management(User $user)
    {
        return $user->hasPrivilege(self::BRANDS_ACCESS);
    }


    public function actions_management(User $user)
    {
        return $user->hasPrivilege(self::ACTIONS_ACCESS);
    }

}
