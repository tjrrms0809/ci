<?php

    // 코드이그나이터에서 직접 이문서에 접속을 허용하지 않는 코드
    defined('BASEPATH') or exit('직접 문서 접속 불가');

    // CI에서 사용하는 모델 클래스 제작. 반드시 CI_MODEL를 상속해야 함
    class Member extends CI_Model
    {
        //멤버변수
        private $name;
        private $msg;

        // 생성자
        public function __construct()
        {
            parent::__construct();

            $this->name= "SAM";
            $this->msg= "Hello CI";
        }

        public function getName()
        {
            return $this->name;
        }

        public function getMessage()
        {
            return $this->msg;
        }

    }
    

?>