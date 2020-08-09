<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\URL;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        //
    }

    /**
     * ユーザーにより指定されたポストが更新可能か決める
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return bool
     */

    public function update(?User $user, Product $product)
    {
        return optional($user)->id === $product->user_id;
    }

    public function delete(?User $user, Product $product)
    {
        return optional($user)->id === $product->user_id;
    }
}
