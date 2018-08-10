<?php
    namespace App\Services;

    use App\Models\Role;

    class RoleService
    {

        protected $roles;

        function __construct()
        {
            $this->roles = new Role;
        }

        public function FetchRoleName($role_id)
        {
            return Role::find($role_id)->role_name;
        }
    }