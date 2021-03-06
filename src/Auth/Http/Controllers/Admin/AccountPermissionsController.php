<?php

declare(strict_types=1);

namespace Francken\Auth\Http\Controllers\Admin;

use Francken\Auth\Account;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

final class AccountPermissionsController
{
    public function store(Account $account, Permission $permission, Request $request)
    {
        $account->givePermissionTo($request->get('permission_id'));
        return redirect()->back();
    }

    public function remove(Account $account, Permission $permission)
    {
        $account->revokePermissionTo($permission);
        return redirect()->back();
    }
}
