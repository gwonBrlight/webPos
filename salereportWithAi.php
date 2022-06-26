<?php
  //header('Content-Type: text/html; charset=UTF-8');
  require_once('auth.php');
  $store=$_SESSION['LOGIN_MEMBER_ID'];
  $server='capstone.cx8j7fkiwfmt.ap-northeast-2.rds.amazonaws.com';
  $password='&ZOQtmxhs12&';
  $database='inventory';
  $user='Capstone';
  $con = mysqli_connect($server,$user,$password,$database,'3306',128);
  if (!$con){
  die('Could not connect: ' . mysqli_error($con));
  }
  mysqli_select_db($con,"inventory");
  $sales_on=$_SESSION['LOGIN_MEMBER_ID'];
  $result = mysqli_query($con,"SELECT brandname FROM user WHERE id = '$sales_on'");
  $row = mysqli_fetch_array($result);
  $name=$row["brandname"];
?>
<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/annotations.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<html lang="ko">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
  <title>Document</title> 
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
<!--임시 예측실행 버튼추가-->
<form name="update" method="post" >
    <button name = "update" type="submit"> Run </button>
</form>
  <?php 
  if(isset($_POST['update'])){
    @set_time_limit(0);
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    exec("test.py");
  }
  ?>

<div style="position:relative;width: 250px; height: 100px; float: left;">
<select id="graphtime" name="plist">
<p>기간별 판매량</p>
  <option value=thesemonth name="test2">=시간=</option>
  <option value=pertime name="test2"selected="selected">=일일=</option>
  <option value=permonth name="test2">=월별=</option>
  <option value=peryear name="test2">=년도=</option>
</select>
</div>

<!--콤보박스 항목추가-->
<div style="position:relative;width: 250px; height: 100px; float: right;">
<p>상품별 판매량</p>
<select id="product_select" name="plist">
<p>상품별 판매량</p>
  <option value=non name="test1" selected="selected">=가게 총합=</option>
  <?php 
  $result = mysqli_query($con,"SELECT pname FROM inventory.productlist WHERE sales_on = $sales_on");
  while($row = mysqli_fetch_array($result))
  {
    echo ("<option value=$row[id]>" .$row["pname"]. "</option>");
  }
?>
</select>
</div>


<!--그래프영역-->
<div id="container" style="position:absolute; width: 1500px; height: 800px; margin: 80 auto;left:10%" >
</div> 
</body>
<form>
  <input type="hidden" value="<?php $_POST?>">
</form>
</html>

<script charset="UTF-8">
  setdata_day();
  function setdata_day(){
  <?php
  $result = mysqli_query($con,"SELECT DATE_FORMAT(datetime,'%Y-%m-%d')as date_, sum(count)/3+4800 count FROM inventory.test123 where DATE(datetime) BETWEEN '2021-10-01' AND '2021-10-10' GROUP BY date_;");
  while($row2 = mysqli_fetch_array($result))
  {
    extract ($row2);
    $_POST2[] = "[\"$date_\", $count],";
  }

  $result = mysqli_query($con,"SELECT DATE_FORMAT(datetime,'%Y-%m-%d')as date_, sum(count)/5+5000 count FROM inventory.sales_summary where DATE(datetime) BETWEEN '2021-09-01' AND '2021-09-30' GROUP BY date_;");
  while($row1 = mysqli_fetch_array($result))
  {
    extract ($row1);
    $_POST1[] = "[\"$date_\", $count],";
  }
  mysqli_close($con);
  ?>}
</script>

<script charset="UTF-8">
  printgraph();
  function printgraph(){
    url:'salereportForGraph.php'
    var saleData = [<?php echo join($_POST1)?>];
    var forecastData = [<?php echo $_POST1[sizeof($_POST1)-1] ?><?php echo join($_POST2) ?>];
    // Now create the chart
    Highcharts.chart('container',{
      title: {
        text: '<?=$name?>',
        style: {
            'font-weight': "bold",
            textTransform: 'uppercase',
            fontSize: '40px',
        },
      },
      subtitle : {
        style: {
            textTransform: 'uppercase',
            fontSize: '25px',
        },
        text: $("#product_select option:selected").text()
      },
      chart: {
        type: 'line',
        zoomType: 'x',
        panning: true,
        panKey: 'shift',
        scrollablePlotArea: {
          minWidth: 600
        }
      },

      credits: {
        enabled: false
      },

      annotations: [{
        draggable: '',
        labelOptions: {
          verticalAlign: 'top',
          y: 15
        },
      }, {
        draggable: '',
        labelOptions: {
          shape: 'connector',
          align: 'right',
          justify: false,
          crop: true,
          style: {
            fontSize: '0.8em',
            textOutline: '1px white'
          }
        },
      }],

      xAxis: {
        type: 'category',
        title: {
          text: 'day'        
        }
      },

      yAxis: {
        startOnTick: true,
        endOnTick: false,
        maxPadding: 0.1,
        title: {  
          text: 'sale amount'
        },
        labels: {
          format: '{value}'
        },
        accessibility: {
          description: 'Elevation',
        }
      },

      tooltip: {
        crosshairs: true,
        //headerFormat: 'Date: Octo {point.x} <br>',
        pointFormat: 'sales amount : {point.y}',
        shared: true
      },
      legend: {
        enabled: true
      },

      series: [{
        data: saleData,
        color: Highcharts.getOptions().colors[2],
        fillOpacity: 1,
        name: 'saleData',
        marker: {
          enabled: false},
        },
        {
        data: forecastData,
        color: Highcharts.getOptions().colors[4],
        fillOpacity: 1,
        name: 'forecastData',
        marker: {
          enabled: false},
        threshold: null
      }]
    }
    );
  }
$(document).ready(function(){ //셀렉박스 변경때마다
  $('#product_select').on('change',function() {
    setdata_day();
    printgraph();
  });
});

$(document).ready(function(){ //셀렉박스 변경때마다
  $('#graphtime').on('change',function() {
    var s = document.getElementById("graphtime");
    var graphtime = s.options[s.selectedIndex].value;
    if(graphtime='permonth'){
      
    }
    else{
      setdata_day();
    }
    printgraph();
  });
});
</script>
