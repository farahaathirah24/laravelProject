<?php

namespace App\Http\Controllers;

use App\Models\OrganisationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class organisationController extends Controller
{
    public function index() {
        $data = array();
        $data['org_list'] = OrganisationModel::getAll();
        
        return view('organisation.list', $data);
    }

    public function create(Request $request) {
        if (!empty($request->input())) {
            $request->validate([
                'org_name'  =>  ['required', Rule::unique('organisations', 'org_name')],
                'address_1' =>  'required'
            ]);
            $post = $request->input();

            $data = array(
                'org_code'  =>  generateRandomCode(),
                'org_name'  =>  $post['org_name'],
                'addr_1'  =>  $post['address_1'],
                'addr_2'  =>  $post['address_2'],
                'postcode'  =>  $post['postcode'],
                'state'     =>  $post['state'],
                'country'   =>  $post['country'],
                'bank_name' =>  $post['bank_name'],
                'acc_name' =>  $post['acc_name'],
                'acc_no' =>  $post['acc_no'],
            );
            $id = OrganisationModel::addOrg($data);

            if (!empty($id)) {
                $flash = array(
                    'noty-msg'  =>  __('message.insert_success'),
                    'noty-type'   =>  'success'
                );
            } else {
                $flash = array(
                    'noty-msg'  =>  __('message.insert_failed'),
                    'noty-type'   =>  'error'
                );
            }
            return redirect()->route('org-list')->with($flash);
        } else {
            $data = array();
            $data['action'] = '';
            return view('organisation.form', $data);
        }
        
    }

    public function update($org_code) {
        $data = array();
        $data['action'] = url('upOrgProcess/'. $org_code);
        $data['record'] = OrganisationModel::getOrg($org_code, 'org_code');

        return view('organisation.form', $data);
        
    }

    public function update_process($org_code,Request $request) {
        if (!empty($request->input())) {
            $rules = [
                'org_name'  =>  ['required', Rule::unique('organisations', 'org_name')->ignore($org_code, 'org_code')],
                'address_1' =>  'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['errors'=>$validator->errors()]);
            }

            $post = $request->input();

            $data = array(
                'org_name'  =>  $post['org_name'],
                'addr_1'  =>  $post['address_1'],
                'addr_2'  =>  $post['address_2'],
                'postcode'  =>  $post['postcode'],
                'state'     =>  $post['state'],
                'country'   =>  $post['country'],
                'bank_name' =>  $post['bank_name'],
                'acc_name' =>  $post['acc_name'],
                'acc_no' =>  $post['acc_no'],
            );
            $affected = OrganisationModel::updateOrg($data, $org_code, 'org_code');

            if ($affected > 0) {
                $return = array(
                    'status'    =>  1,
                    'noty_msg'  =>  __('message.update_success'),
                    'noty_type'   =>  'success'
                );
            } else {
                $return = array(
                    'status'    =>  0,
                    'noty_msg'  =>  __('message.update_failed'),
                    'noty_type'   =>  'error'
                );
            }
            return response()->json($return);
        }
        
    }
}
