<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{

    use Notifiable, HasApiTokens;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $appends = ['url', 'avatar'];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getUrlAttribute()
    {
        //return route("questions.show", $this->id);
        return '#';
    }

    // ANSWER MODEL
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // GENERATE AVATOR
    public function getAvatarAttribute()
    {
        $email = $this->email;
        $size = 32;

        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "&s=" . $size;
    }

    // FAVORITE
    public function favorites()
    {
        return $this->belongsToMany(Question::class, 'favorites')->withTimestamps();
    }

    // VOTE
    public function voteQuestions() //relationship method
    {
        return $this->morphedByMany(Question::class, 'votable');
    }

    public function voteAnswers()
    {
        return $this->morphedByMany(Answer::class, 'votable');
    }

    private function _vote($relationship, $model, $vote)
    {
        if ($relationship->where('votable_id', $model->id)->exists()) {
            $relationship->updateExistingPivot($model, ['vote' => $vote]);
        }
        else {
            $relationship->attach($model, ['vote' => $vote]);
        }

        $model->load('votes');
        $downVotes = (int) $model->downVotes()->sum('vote');
        $upVotes = (int) $model->upVotes()->sum('vote');

        $model->votes_count = $upVotes + $downVotes;
        $model->save();
    }

    public function voteQuestion(Question $question, $vote) //custom method
    {
        $voteQuestions = $this->voteQuestions();
        return $this->_vote($voteQuestions, $question, $vote);
    }

    public function voteAnswer(Answer $answer, $vote)
    {
        $voteAnswers = $this->voteAnswers();
        return $this->_vote($voteAnswers, $answer, $vote);
    }

    // private function _vote($relationship, $model, $vote)
    // {
    //     if ($relationship->where('votable_id', $model->id)->exits()) {
    //         $relationship->undateExistingPivot($model, ['vote' => $vote]);
    //     }
    //     else {
    //         $relationship->attach($model, ['vote' => $vote]);
    //     }
    //     $model->load('votes');
    //     $downVotes = (int) $model->downVotes()->sum('vote');
    //     $upVotes = (int) $model->upVotes()->sum('vote');

    //     $model->votes_count = $upVotes + $downVotes;
    //     $model->save();

    //     return $model->votes_count;
    // }

}
