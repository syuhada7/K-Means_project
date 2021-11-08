</body>

</html>
<script type="text/javascript">
  $(function() {
    Highcharts.chart('total_masuk', {
      data: {
        table: 'jml_masuk'
      },
      chart: {
        type: 'column'
      },
      title: {
        text: 'Item Raw Material Masuk'
      },
      yAxis: {
        allowDecimals: false,
        title: {
          text: 'Item Raw Material'
        }
      },
      tooltip: {
        formatter: function() {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name;
        }
      }
    });
  });
  $(function() {
    Highcharts.chart('total_keluar', {
      data: {
        table: 'jml_keluar'
      },
      chart: {
        type: 'column'
      },
      title: {
        text: 'Item Raw Material Keluar'
      },
      yAxis: {
        allowDecimals: false,
        title: {
          text: 'Item Raw Material'
        }
      },
      tooltip: {
        formatter: function() {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name;
        }
      }
    });
  });
  $(function() {
    Highcharts.chart('total_tangkap', {
      data: {
        table: 'jml_tangkap'
      },
      chart: {
        type: 'column'
      },
      title: {
        text: 'Jenis Penangkapan'
      },
      yAxis: {
        allowDecimals: false,
        title: {
          text: 'Metode'
        }
      },
      tooltip: {
        formatter: function() {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name;
        }
      }
    });
  });
  $(function() {
    Highcharts.chart('total_qty', {
      data: {
        table: 'jml_qty'
      },
      chart: {
        type: 'column'
      },
      title: {
        text: 'Jumlah Qty Item'
      },
      yAxis: {
        allowDecimals: false,
        title: {
          text: 'Jumlah Qty'
        }
      },
      tooltip: {
        formatter: function() {
          return '<b>' + this.series.name + '</b><br/>' +
            this.point.y + ' ' + this.point.name;
        }
      }
    });
  });
</script>