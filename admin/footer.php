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
          var ctx = document.getElementById('yearly').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                  datasets: [{
                      label: '# of Votes',
                      data: [12, 19, 3, 5, 2, 3],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255, 99, 132, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          });
        </script>

        <script>
          var ctx = document.getElementById('monthly').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                  datasets: [{
                      label: '# of Votes',
                      data: [12, 19, 3, 5, 2, 3],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255, 99, 132, 1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          });
        </script>

    </body>
</html>