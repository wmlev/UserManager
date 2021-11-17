<?php

namespace EvolutionCMS\UserManager\Services\Users;

trait SafelyDestroyUserSessionTrait
{
    private $userSessionFields = [
        'Shortname',
        'Fullname',
        'Email',
        'Validated',
        'InternalKey',
        'Failedlogins',
        'Lastlogin',
        'Logincount',
        'Role',
        'Permissions',
        'Docgroups',
        'Token',
    ];

    protected function safelyDestroyUserSession()
    {
        if (defined('NO_SESSION')) {
            return;
        }

        foreach ($this->userSessionFields as $field) {
            if (isset($_SESSION[$this->context . $field])) {
                unset($_SESSION[$this->context . $field]);
            }
        }
    }
}
