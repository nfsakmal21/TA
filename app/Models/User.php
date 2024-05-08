<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getAdmin(){
        $return = self::select('users.*')
                    ->where('user_type','=',1);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email'))){
                        $return = $return->where('email', 'like', '%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('nip'))){
                        $return = $return->where('nip', 'like', '%'.Request::get('nip').'%');
                    }
        $return = $return->orderBy('id', 'desc') 
                    -> paginate(10);

        return $return;
    }

    static public function getMahasiswa(){
        $return = self::select('users.*')
                    ->where('user_type','=',3);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name',  'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email'))){
                        $return = $return->where('email', 'like', '%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('nim', 'like', '%'.Request::get('nip').'%');
                    }

        $return = $return->orderBy('id', 'desc') 
                    -> paginate(10);

        return $return;
    }
    static public function getJoinedData()
    {
        $return = User::join('perwalian', 'users.name', '=', 'perwalian.name')
                    ->select('users.perwalian as userper')->join('users as users2', 'users.perwalian', '=', 'users2.id')
                    ->select('perwalian.*', 'users2.name as perwalian_name');
                    if(!empty(Request::get('name'))){
                            $return = $return->where('perwalian.name',  'like', '%'.Request::get('name').'%');
                        }
                        if(!empty(Request::get('pname'))){
                            $return = $return->where('users2.name',  'like', '%'.Request::get('pname').'%');
                        }
                    $return = $return->orderBy('perwalian.id', 'desc') // Menggunakan 'perwalian.id' untuk mengurutkan hasil
                    ->paginate(10);
                

        return $return;
    }
    static public function getJoinedDatas()
    {
        $return = self::leftJoin('users as users2', 'users.perwalian', '=', 'users2.id')
                        ->select('users.*', 'users2.name as perwalian_name')->where('users.user_type', '=', 3);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('users.name',  'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email'))){
                        $return = $return->where('users.email', 'like', '%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('users.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    $return = $return->orderBy('id', 'desc') 
                    -> paginate(10);

        return $return;
    }

    static public function perwalian($id)
{
    $return = User::join('perwalian', 'users.name', '=', 'perwalian.name') // Anda mungkin perlu mengganti 'users.name' dengan 'users.id' jika 'perwalian' adalah ID pengguna
                ->select('perwalian.*')
                ->where('users.user_type', '=', 3)
                ->where('users.perwalian', '=', $id)
                ->where('perwalian.status', '!=', 2)
                ->orderBy('perwalian.id', 'desc') // Menggunakan 'perwalian.id' untuk mengurutkan hasil
                ->paginate(10);

    return $return;
}

    public function getProfile(){
        if(!empty($this->profil_picture) && file_exists('upload/profile/'. $this->profil_picture)){
            return url('upload/profile/'.$this->profil_picture);
        }
        else{
            return "";
        }
    }

    static public function getDosen(){
        $return = self::select('users.*')
                    ->where('user_type','=',2);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email'))){
                        $return = $return->where('email', 'like', '%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('nip'))){
                        $return = $return->where('nip', 'like', '%'.Request::get('nip').'%');
                    }
                    
        $return = $return->orderBy('id', 'desc') 
                    -> paginate(10);

        return $return;
    }

    static public function getTotalUser($user_type){
        return self::select('users.id')
                        ->where('user_type', '=', $user_type)
                        ->count();
    }
}