<?php

namespace Modules\Iprofile\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UserMenu extends Component
{
  public $view;
  public $user;
  public $params;
  public $showLabel;
  public $moduleLinks;
  public $moduleLinksWithoutSession;
  public $id;
  public $panel;
  public $profileRoute;
  public $openLoginInModal;
  public $openRegisterInModal;
  public $onlyShowInTheDropdownHeader;
  public $onlyShowInTheMenuOfTheIndexProfilePage;
  protected $authApiController;
  public $label;
  public $classUser;
  public $styleUser;
  public $layout;

  public function __construct($layout = 'user-menu-layout-1', $showLabel = false, $id = "userMenuComponent",
                              $params = [], $openLoginInModal = true, $openRegisterInModal = false,
                              $onlyShowInTheDropdownHeader = true, $onlyShowInTheMenuOfTheIndexProfilePage = false,
                              $label = null, $classUser = '', $styleUser = ''  )
  {
    $this->layout = $layout;
    $this->onlyShowInTheDropdownHeader = $onlyShowInTheDropdownHeader;
    $this->onlyShowInTheMenuOfTheIndexProfilePage = $onlyShowInTheMenuOfTheIndexProfilePage;
    $this->view = 'iprofile::frontend.components.user-menu.layouts.' . (isset($layout) ? $layout : 'user-menu-layout-1') . '.index';

    $this->showLabel = $showLabel;
    $this->label = $label ?? trans('iprofile::frontend.button.my_account');
    $this->openLoginInModal = $openLoginInModal;
    $this->openRegisterInModal = $openRegisterInModal;
    $this->classUser = $classUser;
    $this->styleUser = $styleUser;


    $this->id = $id ?? "userMenuComponent";
  }



  public function render()
  {

    return view($this->view);
  }
}
