<?php

namespace App;

use App\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use \Venturecraft\Revisionable\RevisionableTrait;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $revisionCreationsEnabled = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
    protected $guarded = [];

//    protected $dontKeepRevisionOf = array(
//        'password'
//    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function exams()
    {
        return $this->hasmany(Exam::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_user')->withPivot('bedrijfsrol');
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_user')->withPivot('active', 'startdatum', 'einddatum');
    }

    public function remarks()
    {
        return $this->hasMany(Remark::class);
    }

    public function questionaires()
    {
        return $this->hasmany(Questionaire::class);
    }

    public function role()
    {
        return $this->belongsto(Role::class);
    }

    public function kwalificatiedossier()
    {
        return $this->belongsto(Kwalificatiedossier::class, 'kwalificatiedossier_id');
    }

    public function slots()
    {
        return $this->belongsToMany(Slot::class, 'slot_user');
    }

    public function currentProject()
    {
//        $this->projects()->wherePivot('active', '=', true);
        return $this->projects()->wherePivot('active', '=', true)->first();
    }

    public function hasRole($roleArray){
        if(in_array($this->role_id, $roleArray)){
            return true;
        }
        return false;
    }

    public function fullName(){
        return $this->achternaam . ', ' . $this->voornaam . ' ' . $this->tussenvoegsel;
    }
}
