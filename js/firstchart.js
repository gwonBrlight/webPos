$(function () { 
    var myChart = Highcharts.chart('container', {
        /* 차트종류 */
        chart: { type: 'line' },

        /* 제목 / 부제목 */
        title: { text: 'Fruit Consumption' },
        subtitle: { text: 'Fruit Consumption Decenber'}

        /* X축 / Y 축 */
        xAxis: { categories: ['Apples', 'Bananas', 'Oranges'] },
        yAxis: { title: { text: 'Fruit eaten' } },

        /* 범례 */
        legend: { layout: 'vertical', align: 'right', verticalAlign: 'middle', borderWidth:0 },

        /* 툴팁 */
        tooltip: {valueSuffix: '개'},

        /* 표 데이터 */
        series: [
            { name: 'Jane', data: [1, 0, 4] },
            { name: 'John', data: [5, 7, 3] }
        ]
    });
});
