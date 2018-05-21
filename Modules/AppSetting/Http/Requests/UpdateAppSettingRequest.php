<?php

namespace Modules\AppSetting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        
      $tab=$this->tab;
        
      if($tab == 'basic')
      {  
        return [

            'app_name'=>'required',
            'facebook'=>'required',
            'googleplus'=>'required',
            'app_email'=>'required',
            'app_phone'=>'required',
            'app_address'=>'required', 
            'app_tnc'=>'required',
            'google_map'=>'required',

        ];
      }

      elseif($tab == 'theme')
      {
        return [

            'app_color'=>'required',
            'app_font_color'=>'required',
            'app_border_color'=>'required',
        ];
      }

      elseif($tab == 'payment')
      {

        $rules = [];
        if($this->ok_enable){
           $rules['ok_apikey'] ='required';
           $rules['ok_destination'] ='required';
           $rules['ok_merchant_name'] ='required';
           $rules['ok_payment_url'] ='required';
           $rules['ok_charge'] ='required';
        }
        if($this->paypal_enable){
           $rules['paypal_payment_url'] = 'required';
           $rules['paypal_email'] = 'required';
           $rules['paypal_charge'] = 'required';
        }
        if($this->mpu_enable){
           $rules['mpu_merchant_id'] = 'required';
           $rules['mpu_payment_url'] = 'required';
           $rules['mpu_hash_key'] = 'required';
           $rules['mpu_charge'] = 'required';
        }
        if($this->true_enable){
           $rules['true_hash_key'] = 'required';
           $rules['true_merchant_id'] = 'required';
           $rules['true_payment_url'] = 'required';
           $rules['true_charge'] = 'required';
        }
        if($this->onetwothree_enable){
           $rules['onetwothree_merchantid'] = 'required';
           $rules['onetwothree_merchantpassword'] = 'required';
           $rules['onetwothree_version'] = 'required';
           $rules['onetwothree_currencycode'] = 'required';
           $rules['onetwothree_agentcode'] = 'required';
           $rules['onetwothree_agentid'] = 'required';
           $rules['onetwothree_channelcode'] = 'required';
           $rules['onetwothree_apikey'] = 'required';
           $rules['onetwothree_url'] = 'required';
           $rules['onetwothree_charge'] = 'required';
        }
        if($this->mab_enable){
           $rules['mab_mid'] = 'required';
           $rules['mab_sharekey'] = 'required';
           $rules['mab_mname'] = 'required';
           $rules['mab_url'] = 'required';
           $rules['mab_act_url'] = 'required';
           $rules['mab_charge'] = 'required';
        }

        return $rules;

      } 
      elseif($tab == 'email')
      {
        return [

            'mail_driver'=>'required',
            'mail_host'=>'required',
            'mail_port'=>'required',
            
        ];

      }  


    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
