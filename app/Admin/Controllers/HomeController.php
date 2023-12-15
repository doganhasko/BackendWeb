<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Controllers\Dashboard;
use OpenAdmin\Admin\Layout\Column;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->css_file(Admin::asset("open-admin/css/pages/dashboard.css"))
            ->title('
                <div style="background-color: lightcoral; padding: 10px;">
                    <span style="font-size: 20px; font-weight: bold; color: white;">
                        THIS IS ADMIN DASHBOARD. I am using OpenAdmin for my admin functionalities. And I configured it as I wanted.<br>If you want CRUD operations for Users, Admins, FAQs, Contacts then you can use the sidebar on the left. <br><br> Here is the button to go to CoffeeShop project= 
                    </span>
                    <a href="' . url('/') . '" class="btn btn-primary" style="margin-left: 10px; font-size: 40px;">Go to Project Homepage</a>
                </div>
            ')
            ->row(Dashboard::title());
    }
}




