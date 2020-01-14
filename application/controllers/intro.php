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

        // 뷰에데이터를 전달하기
        public function transmission()
        {
            // 뷰를 로드하면서 보내줄 데이터들 연관배열로
            $datas= array("name"=>"SAM", "msg"=>"Hello codeIgniter");


            // views/trans/first.php를 load하면서 데이터를 전달
            $this->load->view('trans/first', $datas);   
        }

        // 뷰를 로딩하여 화면에 보여주는 것이 아니라 문자열로 리턴해주기
        public function returnView()
        {
            // 세번째 파라미터 : 문자열로 리턴할지 여부
            $str= $this->load->view('intro_view', '', true);
            echo "로딩한 뷰의 문자열 데이터 : " . $str;
        }

        // 이제 데이터를 관리하는 Model문서에 대해서.....
        // aplication/models/Member.php를 만들어서 모델 문서 제작
        public function members()
        {
            // application/models/Member.php문서 로드하기
            $this->load->model('Member');

            // 위에서 로딩을 하면 이 컨트롤러 클래스의 객체(Intro)의
            // 멤버변수로 Member라는 클래스객체 참조변수가 생김
            $name= $this->Member->getName();
            $msg= $this->Member->getMessage();

            // echo " $name, $msg ";

            // 뷰 문서로 이쁘게 보여주기
            $datas= array();
            $datas['name']= $name;
            $datas['msg']= $msg;

            // 뷰문서로 이쁘게 보여주기위해 데이터를 전달
            $this->load->view('member/member_view', $datas);

            // 참고 //
            // 모델 로딩하면 자동으로 Controller클래스의 멤버변수가 만들어짐
            // 이때, 기본 변수명은 Model class의 클래스명과 같음
            // 이 이름을 별명으로 변경할 수 있음
            $this->load->model('Member', 'aaa');
            $this->load->getName();
        }
    }

?>