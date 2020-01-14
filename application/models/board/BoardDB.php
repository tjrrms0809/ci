<?php

    defined('BASEPATH') or exit('직접 접근 허용안함');

    class BoardDB extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

        //board테이블의 레코드들 읽어오는 기능 함수
        public function getBoards(){
            //database를 관리하는 DBMS(Mysql)에 접속            
            //database.php에 설정된 데이터베이스접속 값으로 접속하기
            $this->load->database();

            //위에서 로드하면 DB제어할 수 있는 객체($this->db)생성됨
            //$this->db를 이용해서 원하는 쿼리 작성( PDO객체와 메소드가 다름 )
            $result= $this->db->query('SELECT * FROM board2');

            //$result객체에게 쿼리의 결과를 배열로 달라고 할 수 있음
            $rows= $result->result_array(); //result_array()함수는 쿼리의 결과를 2차원 배열로 리턴 : 각 레코드는 연관배열로 되어 있음.
            $this->db->close();

            //가져온 2차원배열 데이터를 리턴
            return $rows;
        }

        //데이터를 삽입하는 메소드
        public function insertRecord($name, $msg){
            //DB접속
            $this->load->database();

            $datas= array('name'=>$name, 'msg'=>$msg);
            $this->db->insert('board2', $datas);

        }
    }


?>