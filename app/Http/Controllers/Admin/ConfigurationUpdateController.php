<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GlobalSetting;
use Illuminate\Http\Request;

class ConfigurationUpdateController extends Controller
{
    public function updateDetailsPage(Request $request)
    {
        $request->validate([
            'admin_email' => 'required|email',
            'default_mail_address' => 'required|email',
            'support_mail_address' => 'required|email',
            'admin_phone' => 'required',
            'admin_address' => 'required',
            'site_name' => 'required',
            'site_description' => 'required',
            'site_facebook' => 'required',
            'site_twitter' => 'required',
            'site_url' => 'required',
            'site_youtube' => 'required',
            'site_address' => 'required',
            'site_phone' => 'required',
            'site_email' => 'required|email',
            'site_instagram' => 'required',
            'site_linkedin' => 'required',
            'site_pinterest' => 'required',
            'mail_address' => 'required|email',
            'mail_host' => 'required'
        ]);

        $site_logo = $request->file('site_logo');
        $site_favicon = $request->file('site_favicon');

        if ($site_logo) {
            $site_logo_name = time() . '.' . $site_logo->getClientOriginalExtension();
            $site_logo->move(public_path('custom/settings/'), $site_logo_name);
            $logo = $site_logo_name;
        }

        if ($site_favicon) {
            $site_favicon_name = time() . '.' . $site_favicon->getClientOriginalExtension();
            $site_favicon->move(public_path('custom/settings/'), $site_favicon_name);
            $favicon = $site_favicon_name;
        }


        $update = GlobalSetting::where("id", 1)->update([
            'admin_email' => $request->admin_email,
            'default_mail_address' => $request->default_mail_address,
            'support_mail_address' => $request->support_mail_address,
            'admin_phone' => $request->admin_phone,
            'admin_address' => $request->admin_address,
            'site_logo' => isset($logo) ? 'custom/settings/' . $logo : GlobalSetting::where("id", 1)->first()->site_logo,
            'site_favicon' => isset($favicon) ? 'custom/settings/' . $favicon : GlobalSetting::where("id", 1)->first()->site_favicon,
            'site_name' => $request->site_name,
            'site_description' => $request->site_description,
            'site_facebook' => $request->site_facebook,
            'site_twitter' => $request->site_twitter,
            'site_url' => $request->site_url,
            'site_youtube' => $request->site_youtube,
            'site_address' => $request->site_address,
            'site_phone' => $request->site_phone,
            'site_email' => $request->site_email,
            'site_instagram' => $request->site_instagram,
            'site_linkedin' => $request->site_linkedin,
            'site_pinterest' => $request->site_pinterest,
            'mail_address' => $request->mail_address,
            'mail_host' => $request->mail_host
        ]);

        if ($update) {
            return redirect(route('config.details'))->with('success', 'Configuration Updated');
        } else {
            return redirect(route('config.details'))->with('error', 'Configuration Not Updated');
        }
    }
}
