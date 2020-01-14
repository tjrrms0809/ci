<?php

    // 코드이그나이터에서 코드를 웹에서 직접 접근하는 경우를 허용하지 않게 해주는 코드
    defined('BASEPATH') or exit('직접 접근은 불가합니다.');

    //클래스명은 파일명과 같아야 함.
    //그리고 컨트롤러는 CI_Contorller를 상속 받아야 함.
    class Intro extends CI_Controller{
        //이 컨트롤러 클래스인 Intro가 처음 실행될 때 별동의 지정이 없다면
        //무조건 호출되는 메소드(마치 index.html같은)
        public function index(){
            echo "Intro index!!!!<br>";

            //echo로 화면을 만드는 것을 불편함.또한, 이 클래스의 코드가 매우 복잡함
            //화면에 보여지는 것들은 별도로 views폴더안에 별도문서로 제작하고
            //이를 불러와서 보여주기
            $this->load->view('intro_view');
        }

        //Intro를 실행할 때 특정 메소드를 지정해서 실행할 수도 있음
        public function show(){
            echo "Intro show!!!!<br>";

            //별도의 view문서로 화면 설계하고 보여주기
            $this->load->view('intro_show');

            //하나의 함수안에 여러뷰를 load할 수 있음
            $this->load->view('intro_show_second');
        }

        //이를 이용해서 웹페이지의 공통모듈작업 가능함
        //header.php, footer.php 영역, nav영역 따로 제작 가능]
        public function module(){
            //headerview 추가
            $this->load->view('module/header.php');

            //콘텐츠 추가
            $this->load->view('module/content.php');
        }

    }

?>