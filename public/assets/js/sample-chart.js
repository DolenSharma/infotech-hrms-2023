var sampleChartClass;
(function($){
    $(document).ready(function(){
        // console.log(submissions);

        var labels = Object.keys(submissions);

        //  console.log(labels);

         var data = Object.values(submissions);

        //  console.log(data);

    var ctx = document.getElementById('myChart').getContext('2d');
    sampleChartClass.ChartData(ctx, 'line', labels, data);

    // var ctxpi = document.getElementById('myPiChart').getContext('2d');
    // sampleChartClass.ChartData(ctxpi, 'pie')

    });
    sampleChartClass = {

        ChartData:function(ctx, type, labels, data){
            new Chart(ctx, {
                type: type,
                data: {
                  labels: labels,
                  datasets: [{
                    label: ['Submissions'],
                    data: data,
                    tension: 0.4,
                    // borderWidth: 2,
                    borderColor: 'red',
                    backgroundColor: ['green'],
                  }]
                },
                options: {
                  scales: {

                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });

        }

    }
})(jQuery);
