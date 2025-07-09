<?php

namespace MenyongMenying\MLibrary\Kucil\Utilities\MString;

use stdClass;

/**
 * @author MenyongMenying <menyongmenying.main@email.com>
 * @version 0.0.1
 * @date 2025-07-01
 */
final class MString
{
    /**
     * Mengecek apakah $string merupakan string.
     * @param  mixed   $string Nilai yang akan dicek.
     * @return boolean         Hasil pengecekan.
     */
    public function isString(mixed $string) :bool
    {
        return is_string($string);
    }

    /**
     * Mengecek apakah suatu string hanya berisi spasi.
     * @param  string  $data String yang akan dicek.
     * @return bool       Hasil pengecekan.
     */
    public function isWhiteSpaceOnly(string $data) :bool
    {
        return preg_match('/^\s*$/', $data) === 1;
    }

    /**
     * Mengecek apakah string mengandung hanya huruf alfabet.
     * @param string $string
     * @return bool  Hasil pengecekan.
     */
    public function isAlphabetOnly(string $string) :bool
    {
        return ctype_alpha($string);
    }

    /**
     * Mengecek apakah string mengandung hanya angka.
     * @param string $string
     * @return bool  Hasil pengecekan.
     */
    public function isDigitOnly(string $string) :bool
    {
        return ctype_digit($string);
    }

    /**
     * Tidak mengeksekusi kode html.
     * @param  string $string String yang ingin diubah menjadi data string yang tidak mengeksekusi kode html.
     * @return string         String yang sudah diproses.
     */
    public function escapeHtml(string $string) :string
    {
        return htmlspecialchars($string);
    }

    /**
     * Mengukur panjang karakter pada suatu string.
     * @param  string  $string Nilai yang akan diukur panjangnya.
     * @return integer         Hasil pengukuran panjang karakter $string.
     */
    public function length(string $string) :int
    {
        return strlen($string);
    }

    /**
     * Membalikan nilai suatu string.
     * @param  string $string Nilai yang akan dibalik.
     * @return string         Hasil pengembalian nilai $string.
     */
    public function reverse(string $string) :string
    {
        return strrev($string);
    }

    /**
     * Mengganti karakter pada suatu string.
     * @param  string $string        String yang akan menjadi subjek pergantian.
     * @param  string $search        Karakter yang akan diganti.
     * @param  string $replace       Karakter pengganti.
     * @param  bool   $sensitiveCase Penggunaan sensitive case.
     * @return string                
     */
    public function replace(string $string, string $search, string $replace, bool $sensitiveCase = true) :string
    {
        if ($sensitiveCase) {
            return str_replace($search, $replace, $string);
        }
        return str_ireplace($search, $replace, $string);
    }

    /**
     * Mengubah nilai string menjadi huruf kecil semua.
     * @param  string $string Nilai yang akan diubah menjadi huruf kecil semua.
     * @return string         Hasil pengubahan $string menjadi huruf kecil semua.
     */
    public function toLower(string $string) :string
    {
        return strtolower($string);
    }

    /**
     * Mengubah string menjadi huruf kapital semua.
     * @param  string $string Nilai yang akan diubah menjadi huruf kapital semua.
     * @return string         Hasil pengubahan $string menjadi huruf kapital semua.
     */
    public function toUpper(string $string) :string
    {
        return strtoupper($string);
    }

    /**
     * Mengubah karakter pertama dari string menjadi huruf kapital.
     * @param  string $data String yang karakter pertamanya akan diubah menjadi huruf kapital.
     * @return string       $data yang karakter pertamanya sudah diubah menjadi huruf kapital.
     */
    public function toFirstCharUpper(string $string) :string
    {
        return ucfirst($string);
    }

    /**
     * Mengubah karakter pertama dari string menjadi huruf kecil.
     * @param  string $data String yang karakter pertamanya akan diubah menjadi huruf kecil.
     * @return string       $data yang karakter pertamanya sudah diubah menjadi huruf kecil.
     */
    public function toFirstCharLower(string $string) :string
    {
        return lcfirst($string);
    }

    /**
     * Mengubah setiap karakter pertama dari setiap kata menjadi huruf kapital. 
     * @param  string $string String yang akan menjadi subjek pengubahan.
     * @return string         $string yang sudah diubah.
     */
    public function toTitle(string $string) :string
    {
        return ucwords($string);
    }

    /**
     * Mengubah string menjadi format camel case.
     * @param  string $string               String yang akan diubah menjadi format camel case.
     * @param  bool   $firstCharCaplitalize Karakter pertama dari string menggunakan huruf kapital atau tidak.
     * @return string                       $string yang sudah diubah menjadi format camel case.
     */
    public function toCamel(string $string, bool $firstCharCaplitalize = false) :string
    {
        $string = $this->toLower($string);
        $string = $this->replace($string, '-', ' ');
        $string = $this->toTitle($string);
        $string = $this->replace($string, ' ', '');
        $string = $firstCharCaplitalize ? $string : $this->toFirstCharLower($string);
        return $string;
    }

    /**
     * Membalikkan kapitalisasi setiap huruf (besar jadi kecil, kecil jadi besar).
     * @param string  $string
     * @return string $string yang sudah diubah.
     */
    public function toSwapeCase(string $string) :string
    {
        $chars = str_split($string);
        foreach ($chars as &$char) {
            $char = ctype_upper($char) ? strtolower($char) : strtoupper($char);
        }
        return implode('', $chars);
    }

    /**
     * Mencari posisi pertama suatu karakter pada string.
     * @param  string $string String yang sumber karakter.
     * @param  string $search Karakter yang akan dicari posisi pertamanya.
     * @return int            Posisi pertama dari $search pada $string.
     */
    public function indexOfFirst(string $string, string $search) :int
    {
        return strpos($string, $search);
    }

    /**
     * Mencari posisi terakhir suatu karakter pada string.
     * @param  string $string String yang sumber karakter.
     * @param  string $search Karakter yang akan dicari posisi terakhirnya.
     * @return int            Posisi terakhir dari $search pada $string.
     */
    public function indexOfLast(string $string, string $search) :int
    {
        return strrpos($string, $search);
    }

    /**
     * Mengecek apakah suatu string mengandung karakter tertentu.
     * @param  string $string String yang akan dicek.
     * @param  string $search Karakter yang akan dicari.
     * @return bool           Hasil pencarian.
     */
    public function contains(string $string, string $search) :bool
    {
        return str_contains($string, $search);
    }

    /**
     * Mengecek apakah suatu string dimulai dengan karakter/kata/kalimat tertentu.
     * @param  string  $string          String yang akan menjadi acuan.
     * @param  string  $search          Karakter/kata/kalimat yang akan dicari pada awalan $data.
     * @param  bool    $sensitiveCase   Memungkinkan pencarian tidak memperhatikan huruf besar/kecil.
     * @return boolean                  Hasil pengecekan.     
     */
    public function startWith(string $string, string $search, bool $sensitiveCase = true) :bool
    {
        if (!$sensitiveCase) {
            $string = $this->toLower($string);
            $search = $this->toLower($search);
        }
        return str_starts_with($string, $search);
    }

    /**
     * Mengecek apakah suatu string diakhiri dengan karakter/kata/kalimat tertentu.
     * @param  string  $string          String yang akan menjadi acuan.
     * @param  string  $search          Karakter/kata/kalimat yang akan dicari pada akhiran $data.
     * @param  bool    $sensitiveCase   Memungkinkan pencarian tidak memperhatikan huruf besar/kecil.
     * @return boolean                  Hasil pengecekan.     
     */
    public function endWith(string $string, string $search, bool $sensitiveCase = true) :bool
    {
        if (!$sensitiveCase) {
            $string = $this->toLower($string);
            $search = $this->toLower($search);
        }
        return str_ends_with($string, $search);
    }

    /**
     * Menghapus karakter/kata/kalimat tertentu yang ada pada awalan string.
     * @param  string $string String yang akan menjadi acuan.
     * @param  string $search Karakter/kata/kalimat yang akan dihapus dari awalan $string.
     * @return string         $string yang sudah diproses.
     */
    public function removeFirst(string $string, string $search) :string
    {
        return ltrim($string, $search);
    }

    /**
     * Menghapus karakter/kata/kalimat tertentu yang ada pada akhiran string.
     * @param  string $string String yang akan menjadi acuan.
     * @param  string $search Karakter/kata/kalimat yang akan dihapus dari akhiran $string.
     * @return string         $string yang sudah diproses.
     */
    public function removeLast(string $string, string $search) :string
    {
        return rtrim($string, $search);
    }

    /**
     * Menghapus karakter/kata/kalimat tertentu yang ada pada awalan dan akhiran string.
     * @param  string $data   String yang akan menjadi acuan.
     * @param  string $search Karakter/kata/kalimat yang akan dihapus dari awalan dan akhiran $data.
     * @return string         $data yang sudah diproses.
     */
    public function removeFirstAndLast(string $data, string $search) :string
    {
        return trim($data, $search);
    }

    /**
     * Mengubah string menjadi integer.
     * @param  string $string String yang akan diubah menjadi integer.
     * @return int            Integer dari $string.
     */
    public function convertToInteger(string $string) :int
    {
        return (int) $string;
    }

    /**
     * Mengubah string menjadi float.
     * @param  string $string String yang akan diubah menjadi float.
     * @return float          Float dari $string.
     */
    public function convertToFloat(string $string) :float
    {
        return (float) $string;
    }

    /**
     * Mengubah string menjadi boolean.
     * @param  string $string String yang akan diubah menjadi boolean.
     * @return bool           Boolean dari $string.
     */
    public function convertToBoolean(string $string) :bool
    {
        switch ($this->toLower($string)) {
            case 'true':
            case 'benar':
                return true;
            case 'false':
            case 'salah':
                return false;
            default:
                return false;
        }
    }

    /**
     * Mengubah string menjadi array.
     * @param  string $string    String yang akan diubah menjadi array.
     * @param  string $separator Karakter pemisah string.
     * @param  int    $length    Panjang karakter setiap elemen array.
     * @param  [type] $limit     Batas maksimum array yang akan dihasilkan.
     * @return array             Array dari $string.
     */
    public function convertToArray(string $string, string $separator = '', int $length = 1, int $limit = PHP_INT_MAX) :array
    {
        if ('' === $separator) {
            $length = max(1, $length);
            return str_split($string);
        }

        return explode($separator, $string, $limit);
    }
}
