<?php




function isPermission($slug=null){
    if(auth()->check()){
        $permissions = [];
        collect(request()->user()->roles)->each(function($role) use (&$permissions){
            $permissions = array_merge($permissions, $role->permission->pluck('permission_name')->toArray());
        });
        return in_array($slug, $permissions);
    }
}