<?php

namespace App\Services;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Operations
{

     public static function decryptId($value)
    {
        try {
            return Crypt::decrypt($value);
        } catch (DecryptException $e) {
            return redirect('/');
        }
    }

       public static function encryptId($value)
    {
        return Crypt::encrypt($value);
    }

    public static function dinheiro($value)
    {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    public static function estoqueTotal($produtos)
    {
        return $produtos->sum('estoque');
    }


}
