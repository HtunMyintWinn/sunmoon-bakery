<?php

namespace Modules\AppSetting\Repositories;

use App\Exceptions\GeneralException;


/**
 * Class AppSettingRepository.
 */
class AppSettingRepository
{

    public function update($request)
    {
        $tab = $request->input('tab');
        $data = $request->except('_token', 'tab');

        if($tab == 'basic'){
            
           $main_logo_url =  config('app.app_setting.main_logo');
           if($request->hasFile('main_logo')){
                $file = $request->file('main_logo');
                $logoname = 'main_logo.'.$file->extension();
                $main_logo = explode("/", $main_logo_url);
                \File::delete('storage/app_data/'. end($main_logo));
                $file->move('storage/app_data/', $logoname);
                $data['main_logo'] =  url('storage/app_data/'.$logoname);
            }
            else{
                $data['main_logo'] = config('app.app_setting.main_logo');
            }

            $logo_url =  config('app.app_setting.favicon');
            if($request->hasFile('app_favicon')){
                $file = $request->file('app_favicon');
                $faviconname = 'logo.'.$file->extension();
                $fav_logo = explode("/", $logo_url);
                \File::delete('storage/app_data/'. end($fav_logo));
                $file->move('storage/app_data/', $faviconname);
                $data['app_favicon'] =  url('storage/app_data/'.$faviconname);
            }
            else{
                $data['app_favicon'] = config('app.app_setting.favicon');
            }

           $defaults = [
               config('backend.theme'), config('app.app_setting.name'),config('app.app_setting.playstore'), config('app.app_setting.appstore'),config('app.app_setting.facebook'), 
               config('app.app_setting.googleplus'),config('app.app_setting.youtube'),config('app.app_setting.twitter'), config('app.app_setting.instagram'),config('app.app_setting.youtubedemo'),  
              config('app.app_setting.email'), config('app.app_setting.phone'), 
              config('app.app_setting.address'),config('app.app_setting.date_format'),config('app.app_setting.time_format'),
              config('app.app_setting.date_time_format'), config('app.app_setting.tnc'),config('app.app_setting.map_key'), $main_logo_url,$logo_url, 
            ];
        }

        elseif($tab == 'payment'){
            $defaults = [

                config('payment.ok.apikey'), 
                config('payment.ok.destination'), config('payment.ok.merchant_name'), 
                config('payment.ok.url'), 
                config('payment.ok.charge_type'), config('payment.ok.charge'),

                config('payment.paypal.payment_url'),
                config('payment.paypal.email'), config('payment.paypal.charge_type'), 
                config('payment.paypal.charge'),

                config('payment.mpu.merchant_id'),
                config('payment.mpu.payment_url'), config('payment.mpu.hash_key'), 
                config('payment.mpu.charge_type'), config('payment.mpu.charge'),

                config('payment.truemoney.hash_key'),
                config('payment.truemoney.merchant_id'), config('payment.truemoney.url'), 
                config('payment.truemoney.charge_type'),
                config('payment.truemoney.charge'),

                config('payment.onetwothree.MerchantID'),
                config('payment.onetwothree.Merchantpassword'), config('payment.onetwothree.Version'), 
                config('payment.onetwothree.CurrencyCode'), config('payment.onetwothree.CountryCode'), 
                config('payment.onetwothree.AgentCode'), config('payment.onetwothree.ChannelCode'), 
                config('payment.onetwothree.ApiKey'), config('payment.onetwothree.Url'), 
                config('payment.onetwothree.charge_type'), config('payment.onetwothree.charge'), 

                config('payment.visa_master.version'), 
                config('payment.visa_master.currency'), config('payment.visa_master.hash_key'), 
                config('payment.visa_master.merchant_id'), config('payment.visa_master.payment_url'),  
                config('payment.visa_master.charge_type'), config('payment.visa_master.charge'), 

                config('payment.mab.MID'), 
                config('payment.mab.ShareKey'), config('payment.mab.MName'), 
                config('payment.mab.url'),
                config('payment.mab.act_url'), config('payment.mab.charge_type'), 
                config('payment.mab.charge')
   
               ];

                $ok_payment_enable = (isset($data['ok_enable']))?"true":"false";
                unset($data['ok_enable']);
                $data['ok_enable'] =  $ok_payment_enable;
                $defaults[] = config('payment.ok.enable')?"true":"false";

                $paypal_enable = (isset($data['paypal_enable']))?"true":"false";
                unset($data['paypal_enable']);
                $data['paypal_enable'] =  $paypal_enable;
                $defaults[] = config('payment.paypal.enable')?"true":"false";

                $mpu_enable = (isset($data['mpu_enable']))?"true":"false";
                unset($data['mpu_enable']);
                $data['mpu_enable'] =  $mpu_enable;
                $defaults[] = config('payment.mpu.enable')?"true":"false";

                $true_enable = (isset($data['true_enable']))?"true":"false";
                unset($data['true_enable']);
                $data['true_enable'] =  $true_enable;
                $defaults[] = config('payment.truemoney.enable')?"true":"false";
        
                $onetwothree_enable = (isset($data['onetwothree_enable']))?"true":"false";
                unset($data['onetwothree_enable']);
                $data['onetwothree_enable'] =  $onetwothree_enable;
                $defaults[] = config('payment.onetwothree.enable')?"true":"false";

                $visa_master_enable = (isset($data['visa_master_enable']))?"true":"false";
                unset($data['visa_master_enable']);
                $data['visa_master_enable'] =  $visa_master_enable;
                $defaults[] = config('payment.visa_master.enable')?"true":"false";

                $mab_enable = (isset($data['mab_enable']))?"true":"false";
                unset($data['mab_enable']);
                $data['mab_enable'] =  $mab_enable;
                $defaults[] = config('payment.mab.enable')?"true":"false";
        }

        elseif($tab == 'email'){
            $defaults = [
                config('mail.driver'), config('mail.host'), config('mail.port'), 
                config('mail.username'), config('mail.password'), config('mail.encryption')
            ];
        }

        $content = file_get_contents(base_path() . '/.env');

        // dd($defaults,$data);

        // replace default values with new ones
        $i = 0;
        foreach ($data as $key => $value) {
            
            $content = str_replace(strtoupper($key).'="'.$defaults[$i].'"', strtoupper($key).'="'.$value.'"', $content);
            $i++;
        }
      
        // Update .env file
        $path = base_path('.env');
        if(file_exists($path)) {
            file_put_contents($path, $content);
        }
        return true;
    }

    public function restore()
    {
        $content = file_get_contents(base_path() . '/.env.example');
        $data['app_url'] = env('APP_URL');
        $data['database_name'] = env('DB_DATABASE');
        $data['database_username'] = env('DB_USERNAME');
        $data['database_password'] = env('DB_PASSWORD');

        $i = 0;
        foreach ($data as $key => $value) {
            $content = str_replace( $key ,  $value  , $content);
            $i++;
        }

        $path = base_path('.env');
        if (file_exists($path)) {
            if(file_put_contents($path , $content)){
                \Log::info('User Restore Default App Setting: ' . access()->user()->name);
                return true;
            }
            return false;
        }

        return false;
    }
}
