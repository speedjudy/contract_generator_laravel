<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminpanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('home');
    }

    public function users()
    {
        return view('users', ['name' => 'Users']);
    }

    public function users_add(Request $request)
    {
        $input = $request->all();
        if ($input['flag']==="save") {
            DB::table('users')->insert([
                'name' => $input['username'],
                'email' => $input['useremail'],
                'user_type' => $input['usertype'],
                'entry_allow' => $input['userallowentries'],
                'password' => md5($input['userpassword']),
                'remember_token' => $input['_token']
            ]);
        } else {
            DB::table('users')->where('id', $input['user_id'])->update([
                'name' => $input['username'],
                'email' => $input['useremail'],
                'user_type' => $input['usertype'],
                'entry_allow' => $input['userallowentries'],
                'password' => md5($input['userpassword']),
                'remember_token' => $input['_token']
            ]);
        }
        return redirect()->back();
    }

    public function users_get()
    {
        $data = DB::table('users')
            ->select('users.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function user_info_get(Request $request)
    {
        $id = $request->input('user_id');

        $data = DB::table('users')
            ->select('users.*')
            ->where('id', $id)
            ->get();
        echo json_encode($data);
        exit();
    }
    public function user_remove(Request $request)
    {
        $id = $request->input('user_id');
        DB::table('users')->where('id', '=', $id)->delete();
        exit();
    }
    

    public function shortcodes()
    {
        return view('shortcodes', ['name' => 'ShortCodes']);
    }
    public function shortcodes_add(Request $request)
    {
        $input = $request->all();
        if ($input['flag']==="save") {
            DB::table('shortcodes')->insert([
                'shortcode_name' => $input['shortcodeName'],
                'shortcode' => $input['shortcode']
            ]);
        } else {
            DB::table('shortcodes')->where('id', $input['shortcode_id'])->update([
                'shortcode_name' => $input['shortcodeName'],
                'shortcode' => $input['shortcode']
            ]);
        }
        return redirect()->back();
    }
    public function shortcodes_get()
    {
        $data = DB::table('shortcodes')
            ->select('shortcodes.*')
            ->get();
        echo json_encode($data);
        exit();
    }
    public function shortcode_info_get(Request $request)
    {
        $id = $request->input('shortcode_id');

        $data = DB::table('shortcodes')
            ->select('shortcodes.*')
            ->where('id', $id)
            ->get();
        echo json_encode($data);
        exit();
    }
    public function shortcode_remove(Request $request)
    {
        $id = $request->input('shortcode_id');
        DB::table('shortcodes')->where('id', '=', $id)->delete();
        exit();
    }
}
