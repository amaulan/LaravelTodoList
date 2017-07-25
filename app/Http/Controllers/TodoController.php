<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //->Memanggil class Request
use Illuminate\Support\Facades\Auth;//->Memanggil class Auth
use App\Todo;//->Memanggil Model Todo
use App\Todouser;//->Memanggil Model Todouser
use DB;//->Memanggil class DB
use Validator;//->Memanggil class Validator
use App\User;//->Memanggil class User
use Session;//->Memanggil class Session
use Mail;
use App\mail\sendMail;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//->Memunculkan Tampilan Awal
    {
        if (Session::has('inlogin')) {
            return redirect('setlogin');
        }else{
            return view('login2');//->Menampilkan halaman login
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//->Memanggil class Request
    {   
        $validator = Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'todo' => 'required|string|max:50|min:3',//->Memfilter data dari inputan
        ]);

        if ($validator->fails()) {//->percabangan jika data tidak benar
            \Session::flash('notadd','Data has not successfully added');//->Memanggil class Session agar dapat menampilan notifikasi
            return redirect('setlogin')//->Mengalihkan ke halaman awal
                        ->withErrors($validator)//->Menampilkan hasil eror
                        ->withInput();//->Menampilkan bagian inputan yang salah
        }
            

            Todo::create($request->all());//->Menyimpan data ke Model Todo jika data Valid
            \Session::flash('add','Data has successfully added');//->Memanggil class Session agar dapat menampilan notifikasi
            return redirect('setlogin');//->Mengalihkan ke halaman awal
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = $request->id;//->Mengambil data dengan class Request dan memasukan ke variable
       $created = $request->created_at;//->Mengambil data dengan class Request dan memasukan ke variable
       $todo = $request->todo;//->Mengambil data dengan class Request dan memasukan ke variable
       if ($todo == "") {//->percabangan jika inputan kosong atau belum diisi
           \Session::flash('notupdate','Data has not successfully updated.');//->Memanggil class Session agar dapat menampilan notifikasi
         return redirect('setlogin');//->Mengalihkan ke halaman awal
       }else{
        DB::table('todo')->where('id',$id)->update([//->Melakukan update jika data benar berdasarkan id Todo
            'todo' => $todo,
            'created_at' => $created,
            'updated_at' => date('Y-m-d H:i:s')
       ]);
        // DB::update("UPDATE todo set todo='$todo',created_at='$created',updated_at=date('yyyy-mm') where id = $id");
        \Session::flash('update','Data successfully updated.');//->Memanggil class Session agar dapat menampilan notifikasi
         return redirect('setlogin');//->Mengalihkan ke halaman awal
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $nomor = $request->id;//->Mengambil data dengan class Request dan memasukan ke variable
        Todo::destroy($nomor);//->Menghapus data berdasarkan id Todo
        \Session::flash('destroy','Data successfully deleted.');//->Memanggil class Session agar dapat menampilan notifikasi
        return redirect('setlogin');//->Mengalihkan ke halaman awal
    }
    public function logout(Request $request)
    {
       Auth::logout();//->Melakukan proses logout dan menghapus semua Session Auth
       Session::flush();
       return redirect('/');//->Mengalihkan ke halaman login
    }

    public function setlogin(Request $request)
   {
        $todo = Todo::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();//->Memunculkan data yang sesuai dengan id user dari terbesar 
            $row = $todo->count();//->Menghitung baris dari Variable $todo yang di masukan dalam variable $row
            return view('name', compact('todo','row'));//->Menampilkan halaman name.blade.php dengan membawa variable di dalam compact
    }public function regist(Request $request)
   {
        if (Session::has('inlogin')) {
            return redirect('setlogin');
        }else{
            return view('register2');//->Menampilkan halaman login
        }//->Menampilkan halaman register
    }public function inregister(Request $request)
   {

       $hasil = Validator::make($request->all(), [//->Memanggil class Validator dan mengambil semua data inputan
            'email' => 'required|string|unique:users|min:3|email',//->Memfilter data dari inputan
            'password' => 'required|string|min:8',//->Memfilter data dari inputan
            'alamat' => 'required|string|'//->Memfilter data dari inputan
        ]);

        if ($hasil->fails()) {
            \Session::flash('notregist','Data has not successfully added');//->Memanggil class Session agar dapat menampilan notifikasi
            return redirect('registes')//->Mengalihkan ke halaman register
                        ->withErrors($hasil)//->Menampilkan hasil eror
                        ->withInput();//->Menampilkan bagian inputan yang salah
        }
            $data = $request->all();//Mengambil semua data dan memasukannya ke dalam variable dengan bentuk array
            $data['password'] = bcrypt($request->password);
            $request->verification_code = str_random(10);
            $data['verification_code'] = $request->verification_code;//->Mengambil nilai password yang sudah di enkripsy
            User::create($data);
            Mail::send(new sendMail());//->Membuat akun user
            \Session::flash('addregist','Data has successfully added');//->Memanggil class Session agar dapat menampilan notifikasi
            return redirect('registes');//->Mengalihkan ke halaman register
    }public function inlogin(Request $request)
   {
            $email = $request->email;//->Mengambil data dengan class Request dan memasukan ke variable
            $password = $request->password;//->Mengambil data dengan class Request dan memasukan ke variable
            
            if (Auth::attempt(['email' => $email, 'password' => $password])) {//Melakukann proses authentication dari table user
                $status = User::where('email',$request->email)->orderBy('id','desc')->get();
                foreach ($status as $status) {
                    $status->status;
                }
                if ($status->status == 0) {
                    \Session::flash('notverified','Please Verified Your Email');//->Memanggil class Session agar dapat menampilan notifikasi
                
                    return redirect('/');
                }else{
                    \Session::flash('login','Login Success');//->Memanggil class Session agar dapat menampilan notifikasi
                    \Session::put('inlogin',1);
                    return redirect('setlogin');//->Mengalihkan ke halaman awal  
                }
            }else{
                \Session::flash('notlogin','Login Failed');//->Memanggil class Session agar dapat menampilan notifikasi
                return redirect('/');//->Mengalihkan ke halaman login
            }
    }
    public function update_status(Request $request)
    {
        DB::table('users')->where('verification_code',$request->verification_code)->update([//->Melakukan update jika data benar berdasarkan id Todo
            'status' => 1,
            'updated_at' => date('Y-m-d H:i:s')
       ]);
         \Session::flash('verified','Congratuliation Email Was Verified');
        return redirect('/');
    }
    public function latihan()
    {
        
       return view('latihan');
    }
    public function latihan2()
    {
        $q = $_REQUEST["q"];
        $a = User::like('email',$q)->orderBy('id','desc')->get();
       foreach ($a as $a) {
           echo $a->id;
           echo "<br>";
           echo $a->email;
           echo "<br>";
       }
    }
    public function send()
    {
       if (Mail::send(new sendMail())) {
         echo "Berhasil";
       }else{
        echo "Gagal";
       }
    }
    public function email()
    {
        return view('email');
    }

}
