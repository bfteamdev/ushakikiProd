<?php

namespace App\Models;

use Parsedown;
use Illuminate\Database\Eloquent\Model;
use League\HTMLToMarkdown\HtmlConverter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ["question", "response"];

    // public function setQuestionAttribute($value)
    // {
    //     return trim(htmlentities($value));
    // }

    // public function setResponseAttribute($value)
    // {
    //     $convertToMarkDown = new HtmlConverter(array('strip_tags' => true));
    //     return $convertToMarkDown->convert(trim(nl2br($value)));
    // }
    public function getResponseAttribute($value)
    {
        $Parsedown = new Parsedown();
        $Parsedown->setSafeMode(true);
        return $Parsedown->text($value);
    }
}
