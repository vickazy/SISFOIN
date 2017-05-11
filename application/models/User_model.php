<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
    public function getValidationRules($rules_set=null)
    {
        if ($rules_set===null){
        $validationRules = [
            [
                'field' => 'id_user',
                'label' => 'ID User',
                'rules' => 'trim|required|min_length[1]|max_length[10]|numeric'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[4]|max_length[20]|callback_username_unik|alpha_numeric'
            ],
            [
                'field' => 'nama_user',
                'label' => 'Nama User',
                'rules' => 'trim|required|min_length[6]|max_length[50]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|callback_is_password_required|min_length[4]|max_length[30]'
            ],
            [
                'field' => 'id_level',
                'label' => 'Level',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'id_level_ruang',
                'label' => 'Detail Level',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'is_blokir',
                'label' => 'Blokir?',
                'rules' => 'trim|required'
            ],
        ];}
		
		else if ($rules_set="profile"){
			$validationRules = [
			[
                'field' => 'id_user',
                'label' => 'ID User',
                'rules' => 'trim|required|min_length[1]|max_length[10]|numeric'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[4]|max_length[20]|callback_username_unik|alpha_numeric'
            ],
            [
                'field' => 'nama_user',
                'label' => 'Nama User',
                'rules' => 'trim|required|min_length[6]|max_length[50]'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|callback_is_password_required2|min_length[4]|max_length[30]'
            ],
        ];
		}

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'id_user'   		=> '',
            'username' 			=> '',
            'password'  		=> '',
            'nama_user' 		=> '',
            'id_level'  		=> '',
            'id_level_ruang'  	=> '',
            'is_blokir' 		=> '',
        ];
    }
}
