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
        'username',
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
                    if(!empty(Request::get('username'))){
                        $return = $return->where('username', 'like', '%'.Request::get('username').'%');
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
                    if(!empty(Request::get('username'))){
                        $return = $return->where('username', 'like', '%'.Request::get('username').'%');
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
                    if(!empty(Request::get('username'))){
                        $return = $return->where('users.username', 'like', '%'.Request::get('username').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('users.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('users.status', 'like', '%'.Request::get('status').'%');
                    }
                    if(!empty(Request::get('perwal'))){
                        $return = $return->where('users2.name', 'like', '%'.Request::get('perwal').'%');
                    }
                    $return = $return->orderBy('id', 'desc') 
                    -> paginate(10);

        return $return;
    }

    static public function getcsvmahasiswa()
    {
        $return = self::leftJoin('users as users2', 'users.perwalian', '=', 'users2.id')
                        ->select('users.*', 'users2.name as perwalian_name')->where('users.user_type', '=', 3);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('users.name',  'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('username'))){
                        $return = $return->where('users.username', 'like', '%'.Request::get('username').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('users.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('users.status', 'like', '%'.Request::get('status').'%');
                    }
                    if(!empty(Request::get('perwal'))){
                        $return = $return->where('users2.name', 'like', '%'.Request::get('perwal').'%');
                    }
                    $return = $return->orderBy('id', 'desc') 
                    -> get();

        return $return;
    }

    static public function perwalian($id)
{
    $return = User::join('perwalian', 'users.name', '=', 'perwalian.name') 
                ->select('perwalian.*')
                ->where('users.user_type', '=', 3)
                ->where('users.status', '=', "Aktif")
                ->where('users.perwalian', '=', $id)
                ->where('perwalian.status', '!=', 2);
                if(!empty(Request::get('name'))){
                        $return = $return->where('users.name',  'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('username'))){
                        $return = $return->where('users.username', 'like', '%'.Request::get('username').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('users.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    $return = $return->orderBy('id', 'desc') 
                    -> paginate(10);
    return $return;
}

    static public function bapperwalian($id)
{
    $return = User::join('perwalian', 'users.name', '=', 'perwalian.name') 
                ->select('perwalian.*')
                ->where('users.user_type', '=', 3)
                ->where('users.status', '=', "Aktif")
                ->where('users.perwalian', '=', $id)
                ->where('perwalian.status', '!=', 2);
                if(!empty(Request::get('name'))){
                        $return = $return->where('users.name',  'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('username'))){
                        $return = $return->where('users.username', 'like', '%'.Request::get('username').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('users.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    $return = $return->orderBy('id', 'desc') 
                    -> get();
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
        $return = self::select('users.*')->where('users.status','=',"Aktif")
                    ->where('user_type','=',2)->get();
        return $return;
    }

    static public function getDosens(){
        $return = self::select('users.*')
                    ->where('user_type','=',2);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('username'))){
                        $return = $return->where('username', 'like', '%'.Request::get('username').'%');
                    }
                    if(!empty(Request::get('nip'))){
                        $return = $return->where('nip', 'like', '%'.Request::get('nip').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('users.status', 'like', '%'.Request::get('status').'%');
                    }
        $return = $return->orderBy('id', 'desc') 
                    -> paginate(10);

        return $return;
    }

    static public function getcsvDosens(){
        $return = self::select('users.*')
                    ->where('user_type','=',2);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('username'))){
                        $return = $return->where('username', 'like', '%'.Request::get('username').'%');
                    }
                    if(!empty(Request::get('nip'))){
                        $return = $return->where('nip', 'like', '%'.Request::get('nip').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('users.status', 'like', '%'.Request::get('status').'%');
                    }
        $return = $return->orderBy('id', 'desc')
                    ->get();

        return $return;
    }

    static public function getTotalUser($user_type){
        return self::select('users.id')
                        ->where('user_type', '=', $user_type)
                        ->count();
    }
    static public function getTotalUseraktif($user_type){
        return self::select('users.id')
                        ->where('user_type', '=', $user_type)
                        ->where('status', '=', "Aktif")
                        ->count();
    }
    static public function getTotalUserlulus($user_type){
        return self::select('users.id')
                        ->where('user_type', '=', $user_type)
                        ->where('status', '=', "Lulus")
                        ->count();
    }
    static public function getTotalUserdo($user_type){
        return self::select('users.id')
                        ->where('user_type', '=', $user_type)
                        ->where('status', '=', "Drop Out")
                        ->count();
    }
    static public function getTotalUserud($user_type){
        return self::select('users.id')
                        ->where('user_type', '=', $user_type)
                        ->where('status', '=', "Undur Diri")
                        ->count();
    }
    static public function getTotalUseralm($user_type){
        return self::select('users.id')
                        ->where('user_type', '=', $user_type)
                        ->where('status', '=', "Meninggal")
                        ->count();
    }
    
    
    static public function getTotalUseraktifs($id){
        return self::select('users.id')
                        ->where('user_type', '=', 3)
                        ->where('users.perwalian', '=', $id)
                        ->where('status', '=', "Aktif")
                        ->count();
    }
    static public function getTotalUserluluss($id){
        return self::select('users.id')
                        ->where('user_type', '=', 3)
                        ->where('users.perwalian', '=', $id)
                        ->where('status', '=', "Lulus")
                        ->count();
    }
    static public function getTotalUserdos($id){
        return self::select('users.id')
                        ->where('user_type', '=', 3)
                        ->where('users.perwalian', '=', $id)
                        ->where('status', '=', "Drop Out")
                        ->count();
    }
    static public function getTotalUseruds($id){
        return self::select('users.id')
                        ->where('user_type', '=', 3)
                        ->where('users.perwalian', '=', $id)
                        ->where('status', '=', "Undur Diri")
                        ->count();
    }
    static public function getTotalUseralms($id){
        return self::select('users.id')
                        ->where('user_type', '=', 3)
                        ->where('users.perwalian', '=', $id)
                        ->where('status', '=', "Meninggal")
                        ->count();
    }

    static public function mhsdosen($id)
    {
        $return = self::leftJoin('users as users2', 'users.perwalian', '=', 'users2.id')
                        ->select('users.*', 'users2.name as perwalian_name')->where('users.user_type', '=', 3)->where('users.perwalian','=',$id);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('users.name',  'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('username'))){
                        $return = $return->where('users.username', 'like', '%'.Request::get('username').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('users.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('users.status', 'like', '%'.Request::get('status').'%');
                    }
                    if(!empty(Request::get('perwal'))){
                        $return = $return->where('users2.name', 'like', '%'.Request::get('perwal').'%');
                    }
                    $return = $return->orderBy('id', 'desc') 
                    -> paginate(10);

        return $return;
    }

    static public function getcsvmhsdosen($id)
    {
        $return = self::leftJoin('users as users2', 'users.perwalian', '=', 'users2.id')
                        ->select('users.*', 'users2.name as perwalian_name')->where('users.user_type', '=', 3)->where('users.perwalian','=',$id);
                    if(!empty(Request::get('name'))){
                        $return = $return->where('users.name',  'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('username'))){
                        $return = $return->where('users.username', 'like', '%'.Request::get('username').'%');
                    }
                    if(!empty(Request::get('nim'))){
                        $return = $return->where('users.nim', 'like', '%'.Request::get('nim').'%');
                    }
                    if(!empty(Request::get('status'))){
                        $return = $return->where('users.status', 'like', '%'.Request::get('status').'%');
                    }
                    if(!empty(Request::get('perwal'))){
                        $return = $return->where('users2.name', 'like', '%'.Request::get('perwal').'%');
                    }
                    $return = $return->orderBy('id', 'desc') 
                    -> get();

        return $return;
    }
}