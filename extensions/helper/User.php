<?php

namespace li3_simple_acl\extensions\helper;
use lithium\security\Auth;
use li3_simple_acl\extensions\security\Acl;
/**
 * Usage, in a view:
 * <?=$this->user->fullName(); ?>
 * <?=$this->user->info(); ?>
 */
class User extends \lithium\template\Helper {

    public function info() {

        // $user = Auth::check('default');
        // return $user;
        return Auth::check('default');
    }

    public function fullName() {

        $userinfo = self::info();

        return $userinfo["first_name"] . " " . $userinfo["last_name"];
    }

    public function allowed($perms) {
        return Acl::isAllowed($this->info(), $perms);
    }
}

?>