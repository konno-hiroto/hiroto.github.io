<?php
ob_start();
?>
<?php include ("file/db_conn.php"); ?>
<?php include ("file/header.php"); ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        
        <title>gitのファイル反映させるためのやつ</title>
        <style>
            .box1 {
                width:400px;
                padding: 0.5em 1em;
                margin: 2em 0;
                font-weight: bold;
                color: #6091d3;/*文字色*/
                background: #FFF;
                border: solid 3px #6091d3;/*線*/
                border-radius: 10px;/*角の丸み*/
                 -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-transition: all .3s;
                transition: all .3s;
                margin: 10px 0 0 0;
                display: block;
                margin: 0 auto 0 auto;
            }
            .box1 p {
                font-size: 25px;
                text-align : center
            }
            .box2 {
                width:400px;            
                padding: 0.5em 1em;
                margin: 2em 0;
                font-weight: bold;
                color: #7fff00;/*文字色*/
                background: #FFF;
                border: solid 3px #7fff00;/*線*/
                border-radius: 10px;/*角の丸み*/
                display: block;
                margin: 0 auto 0 auto;
                 -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-transition: all .3s;
                transition: all .3s;
                margin: 10px 0 0 0;
                display: block;
                margin: 0 auto 0 auto;
            }
            .box2 p {
                font-size: 25px;
                text-align : center
            }
            
            .box3 {
                width:400px;
                padding: 0.5em 1em;
                margin: 2em 0;
                font-weight: bold;
                color: #ffc0cb;/*文字色*/
                background: #FFF;
                border: solid 3px #ffc0cb;/*線*/
                border-radius: 10px;/*角の丸み*/
                display: block;
                margin: 0 auto 0 auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-transition: all .3s;
                transition: all .3s;
                margin: 10px 0 0 0;
                display: block;
                margin: 0 auto 0 auto;
            }
            .box3 p {
                font-size: 25px;
                text-align : center
            }
            
            .title {
                width:500px;
                font-size: 32px;
                text-align : center;
                  color: #6cb4e4;
                  text-align: center;
                  padding: 0.25em;
                  border-top: solid 2px #6cb4e4;
                  border-bottom: solid 2px #6cb4e4;
                  background: -webkit-repeating-linear-gradient(-45deg, #f0f8ff, #f0f8ff 3px,#e9f4ff 3px, #e9f4ff 7px);
                  background: repeating-linear-gradient(-45deg, #f0f8ff, #f0f8ff 3px,#e9f4ff 3px, #e9f4ff 7px);
                  border: solid 3px #6091d3;/*線*/
                  border-radius: 10px;/*角の丸み*/
                  display: block;
                margin: 0 auto 0 auto;
            }
            a{
                text-decoration: none;
            }
            .box1:hover {
                -webkit-transform: translateY(-5px);
                -ms-transform: translateY(-5px);
                transform: translateY(-5px);
            }
            .box2:hover {
                -webkit-transform: translateY(-5px);
                -ms-transform: translateY(-5px);
                transform: translateY(-5px);
            }
            .box3:hover {
                -webkit-transform: translateY(-5px);
                -ms-transform: translateY(-5px);
                transform: translateY(-5px);
            }
            .wrapper {
              margin: 15px auto;
              max-width: 700px;
            }
            .container-calendar {
             
              padding: 15px;
              width: 300px;
              height: 500px;
              margin: 0 auto;
              overflow: auto;
              position: absolute;
              top: 25%;
              left: 70%;
            }
            .button-container-calendar button {
              cursor: pointer;
              display: inline-block;
              zoom: 1;
              background: #00a2b7;
              color: #fff;
              border: 1px solid #0aa2b5;
              border-radius: 4px;
              padding: 5px 10px;
            }
            .table-calendar {
              border-collapse: collapse;
              width: 100%;
            }
            .table-calendar th,
            .table-calendar td{
              padding: 10px;
              border: 1px solid #000000;
              text-align: center;
              vertical-align: top;
            }
            .date-picker.selected {
              font-weight: bold;
              color: #000000;
              background: #cc0000;
            }
            .date-picker.selected span {
              border-bottom: 2px solid currentColor;
            }
            /* 日曜 */
            .date-picker:nth-child(1) {
            color: red;
            }
            /* 土曜 */
            .date-picker:nth-child(7) {
            color: blue;
            }
            #monthAndYear {
              text-align: center;
              margin-top: 0;
            }
            .button-container-calendar {
              position: relative;
              margin-bottom: 1em;
              overflow: hidden;
              clear: both;
            }
            #previous {
              float: left;
            }
            #next {
              float: right;
            }
            .footer-container-calendar {
              margin-top: 1em;
              border-top: 1px solid #dadada;
              padding: 10px 0;
            }
            .footer-container-calendar select {
              cursor: pointer;
              display: inline-block;
              zoom: 1;
              background: #ffffff;
              color: #454545;
              border: 1px solid #bfc5c5;
              border-radius: 3px;
              padding: 5px 1em;
            }

            body {
               background: linear-gradient(#ffffff, #6DD5FA,#2980B9);
            }
    </style>
    </head>
    <body>
           <div class="title">メンテナンス画面</div>
           <br>
        <a href="User.php">   
        <div class="box1">
        <p>ユーザー管理モード</p>
        </div></a>
        <br>
        <a href="Item.php">  
        <div class="box2">
        <p>商品管理</p>
        </div></a>
        <br>
        <a href="Reciept.php">  
        <div class="box3">
        <p>売り上げレシート</p>
        </div></a>
        <div class="container-calendar">
          <h4 id="monthAndYear"></h4>
          <div class="button-container-calendar">
              <button id="previous" onclick="previous()">‹</button>
              <button id="next" onclick="next()">›</button>
          </div>
          <table class="table-calendar" id="calendar" data-lang="ja">
              <thead id="thead-month"></thead>
              <tbody id="calendar-body"></tbody>
          </table>
          <div class="footer-container-calendar">
              <label for="month">日付指定：</label>
              <select id="month" onchange="jump()">
                  <option value=0>1月</option>
                  <option value=1>2月</option>
                  <option value=2>3月</option>
                  <option value=3>4月</option>
                  <option value=4>5月</option>
                  <option value=5>6月</option>
                  <option value=6>7月</option>
                  <option value=7>8月</option>
                  <option value=8>9月</option>
                  <option value=9>10月</option>
                  <option value=10>11月</option>
                  <option value=11>12月</option>
              </select>
              <select id="year" onchange="jump()"></select>
          </div>
    </div>
        <script src="../js/calendar.js" type="text/javascript"></script>
        
    </body>
</html>