Highcharts.chart('container', {
    /* 차트 타이틀 */
    title: {
      text: 'Solar Employment Growth by Sector, 2010-2016'
    },
    /* 차트 서브타이틀, 링크 이동 가능 */
    subtitle: {
      text: 'Source: thesolarfoundation.com'
    },
    /* Y축 */
    yAxis: {
      /* Y축 타이틀*/
      title: {
        text: 'Number of Employees'
      }
    },
    /* X축 */
    xAxis: {
      accessibility: {
        rangeDescription: 'Range: 2010 to 2017'
      }
      , type:"datetime"
      , dateTimeLabelFormats : {
        day: '%Y. %m. %e'
      }
    },
    /* 범례 */
    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },
  
    plotOptions: {
      series: {
        label: {
          connectorAllowed: false // 선과 라벨 연결여부 (true : 연결, false : 미연결)
        },
        pointStart: 2010 // X축 시작 값 (맨 왼쪽 값, +1씩 올라간다) // 날짜나 다른 유형으로 변경하고 싶을 경우 Axis 의 타입을 설정하면된다. type : 'datetime'
        // pointStart: Date.UTC(2010, 0, 1), Axis 타입 datetime 일 경우 주석한 2개 사용
        // pointInterval: 24 * 3600 * 1000 
      }
    },
    /* 데이터 형식 */
    series: [{
      name: 'Installation',
      data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    }, {
      name: 'Manufacturing',
      data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    }, {
      name: 'Sales & Distribution',
      data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    }, {
      name: 'Project Development',
      data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    }, {
      name: 'Other',
      data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
    }],
  
    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }
  
  });