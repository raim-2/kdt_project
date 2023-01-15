<?

function generateRandomPassword($length=8, $strength=0) { //strength = 상황

    $vowels = 'aeuy';  //아무거나 넣어줘도 됨

    $consonants = 'bdghjmnpqrstvz'; //아무거나 넣어줘도 됨

    if ($strength & 1) { //대문자를 섞어서 나오게

        $consonants .= 'BDGHJLMNPQRSTVWXZ';

    }

    if ($strength & 2) {

        $vowels .= "AEUY";

    }

    if ($strength & 4) {

        $consonants .= '23456789';

    }

    if ($strength & 8) {

        $consonants .= '@#$%';

    }


    $password = '';

    $alt = time() % 2; //난수 쓰기 위해 입력
    //time() 시간 %2 나머지 0 또는 1

    for ($i = 0; $i < $length; $i++) {

        if ($alt == 1) {

            $password .= $consonants[(rand() % strlen($consonants))]; //숫자값이 나오게

            $alt = 0;

        } else {

            $password .= $vowels[(rand() % strlen($vowels))];

            $alt = 1;

        }

    }

    return $password;

}


$ranpass = generateRandomPassword(8,8);

echo "$ranpass";

?>