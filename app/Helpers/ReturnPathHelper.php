<?php

namespace App\Helpers;

use Request;
use File;

use App\Models\Admin;
use App\Models\User;

class ReturnPathHelper
{

  public static function getAdminImage($admin_id)
  {
    $admin = Admin::find($admin_id);

    if ($admin->image == NULL || $admin->image == "") {
      $image_url = 'public/admin/img/defaults/default.png';
      //Find Gravator image from Gravaton
      if (GravatarHelper::validate_gravatar($admin->email)) {
        return GravatarHelper::gravatar_image($admin->email, 200, "identicon");
      }
    }else{
      if (File::exists('public/admin/img/admins/'.$admin->image)) {
        $image_url = 'public/admin/img/admins/'.$admin->image;
      }else{
        //Find Gravator image from Gravaton
        if (GravatarHelper::validate_gravatar($admin->email)) {
          return GravatarHelper::gravatar_image($admin->email, 200, "identicon");
        }
        $image_url = 'public/admin/img/defaults/default.png';
      }
    }
    return url($image_url);
  }

  /**
   * getUserImage
   * @param  [type] $user_id [description]
   * @return [type]          [description]
   */
  public static function getUserImage($user_id)
  {
    $user = User::find($user_id);

    if ($user->profile_picture == NULL || $user->profile_picture == "") {
      $image_url = 'public/images/users/user.png';
      //Find Gravator image from Gravaton
      if (GravatarHelper::validate_gravatar($user->email)) {
        return GravatarHelper::gravatar_image($user->email, 200, "identicon");
      }
    }else{
      if (File::exists('public/images/users/'.$user->profile_picture)) {
        $image_url = 'public/images/users/'.$user->profile_picture;
      }else{
        //Find Gravator image from Gravaton
        if (GravatarHelper::validate_gravatar($user->email)) {
          return GravatarHelper::gravatar_image($user->email, 200, "identicon");
        }
        $image_url = 'public/images/users/user.png';
      }
    }
    return url($image_url);
  }

}
