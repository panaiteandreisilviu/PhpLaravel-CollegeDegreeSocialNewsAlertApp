<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FacebookController extends Controller
{
    public function retrievePageAccessToken(){

        $fb_page_app_id = request('fb_page_app_id');
        $fb_page_access_token = request('fb_page_access_token');

        Session::put('fb_page_app_id', $fb_page_app_id);
        Session::put('fb_page_access_token', $fb_page_access_token);

        Session::flash('success_message', 'Page token was retrieved successfully!');
    }
}
