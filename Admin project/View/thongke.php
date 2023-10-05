 <meta charset="UTF-8">
 <div class="card mt-5">
     <div class="card-header info">
         THỐNG KÊ
     </div>
     <div class="card-body">
         <div class="list-group">
             <!-- <a href="?action=thong_ke&lich=ngay" class="list-group-item list-group-item-action">Theo ngày</a> -->
             <a href="?action=thong_ke&lich=thang" class="list-group-item list-group-item-action">Theo tháng</a>
             <!-- <a href="?action=thong_ke&lich=quy" class="list-group-item list-group-item-action">Theo quý</a> -->
             <a href="?action=thong_ke&lich=nam" class="list-group-item list-group-item-action">Theo năm</a>
         </div>
         <div class="w-75">

             <div>
                 <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                     <input type="number" name="so_ngay" value=""> trước đến nay<button type="submit"
                         name="thong_ke">Thống kê</button>
                 </form>
             </div>
             <div id="chart_div"></div>
         </div>
     </div>
     <!--Load the AJAX API-->
     <script type="text/javascript" src="https://www.google.com/jsapi"></script>
     <script type="text/javascript">
     google.load('visualization', '1.0', {
         'packages': ['corechart']
     });
     google.setOnLoadCallback(drawVisualization);

     function drawVisualization() {
         //thống kê số lượng bán hàng theo mặt hàng vẽ bieu do tron
         // tạo bảng DataTable
         var data = new google.visualization.DataTable();
         var tenhh = new Array();
         var soluongban = new Array();
         var dataten = 0;
         var sl = 0;
         var rows = new Array();
         // + dòng
         <?php
              $hh=new hanghoa();
              $result=$hh->getThongKeHangHoa();
              while($set=$result->fetch())
              {
                $tenhh=$set['ten_sp'];
                $soluong=$set['soluong'];
                echo "tenhh.push('".$tenhh."');";
                echo "soluongban.push('".$soluong."');";
              }
            ?>
         for (var i = 0; i < tenhh.length; i++) {
             dataten = tenhh[i];
             sl = parseInt(soluongban[i]);
             rows.push([dataten, sl]);
         }
         // + cột
         data.addColumn('string', 'Hàng hóa');
         data.addColumn('number', 'Số lượng bán');
         data.addRows(rows);
         // tạo option
         var option = {
             title: 'Thống kê số lượng bán',
             'width': 600,
             'height': 400,
             'backgroundColor': '#ffffff',
             is3D: true
         };
         // tiến hành vẽ draw Pie,Column,Bar,Line
         var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
         chart.draw(data, option);

     }
     </script>
     <!-- <div class="thongke">
        <div style=" width:50%;  float: left;"   id="chart_div">Thống kê</div>
        <div style=" width:50%;  float: right"   id="chart_div1">dsfd</div>    
      </div>
  -->
