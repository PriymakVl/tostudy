<?php
 
namespace app\helpers;
 
class Inflector extends \yii\helpers\BaseInflector
{
    public static $transliterator = 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;';
}