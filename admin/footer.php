		</div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../template/admin_template/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../template/admin_template/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../template/admin_template/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../template/admin_template/js/startmin.js"></script>

        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

        <script src="../template/admin_template/js/canvasjs.min.js"></script>

        <script>
            CKEDITOR.replace('editor');
        </script>

        <script>
            tinymce.init({
                selector: '#editor'
            });
        </script>

        <script>
          $(function () {
            $('#item_tbl').DataTable({
              "pageLength": 3,
              "paging": true,
              "lengthChange": false,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true
            });
          });
        </script>

        

        <script>
          window.onload = function() {
 
          var dataPoints = [];
           
          var chart = new CanvasJS.Chart("chartContainer", {
            click: visitorsChartDrilldownHandler,
            animationEnabled: true,
            theme: "light2",
            title: {
              text: "Daily Sales Data"
            },
            axisY: {
              title: "Units",
              titleFontSize: 24
            },
            data: [{
              type: "column",
              yValueFormatString: "#,### Units",
              dataPoints: dataPoints
            }]
          });
           
          function addData(data) {
            for (var i = 0; i < data.length; i++) {
              dataPoints.push({
                x: new Date(data[i].date),
                y: data[i].units
              });
            }
            chart.render();
           
          }
           
          $.getJSON("https://canvasjs.com/data/gallery/javascript/daily-sales-data.json", addData);
           
          }
        </script>

    </body>
</html>