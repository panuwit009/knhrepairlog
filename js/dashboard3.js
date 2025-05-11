// js/dashboard3.js
$(function () {
  'use strict'
  
  var ticksStyle = {
      fontColor: '#495057',
      fontStyle: 'bold'
  }
  
  var mode = 'index'
  var intersect = true
  var salesChart = null
  
  function loadSalesData() {
    console.log('Loading sales data...');
    $('.loading').show();
    
    $.ajax({
        url: 'get_sales_data.php',
        method: 'GET',
        success: function(response) {
            console.log('Data received:', response);
            updateDashboard(response);
        },
        error: function(xhr, status, error) {
            console.error('Error details:', {
                status: status,
                error: error,
                response: xhr.responseText
            });
            alert('Error loading sales data. Please try again later.');
        },
        complete: function() {
            $('.loading').hide();
        }
    });
}
  
  function updateDashboard(data) {
      // Update total sales
      $('#totalSales').text('$' + formatNumber(data.totalSales));
      
      // Update growth rate
      const growthElement = $('#growthRate');
      const growthIcon = growthElement.find('i');
      const growthRate = data.growthRate;
      
      growthElement.removeClass('text-success text-danger');
      growthIcon.removeClass('fa-arrow-up fa-arrow-down');
      
      if (growthRate >= 0) {
          growthElement.addClass('text-success');
          growthIcon.addClass('fa-arrow-up');
      } else {
          growthElement.addClass('text-danger');
          growthIcon.addClass('fa-arrow-down');
      }
      
      growthElement.contents().filter(function() {
          return this.nodeType === 3;
      }).remove();
      
      growthElement.append(` ${Math.abs(growthRate).toFixed(1)}%`);
      
      // Update chart
      if (salesChart) {
          salesChart.destroy();
      }
      
      var $salesChart = $('#sales-chart');
      salesChart = new Chart($salesChart, {
          type: 'bar',
          data: {
              labels: data.labels,
              datasets: [
                  {
                      backgroundColor: '#007bff',
                      borderColor: '#007bff',
                      data: data.currentYear
                  },
                  {
                      backgroundColor: '#ced4da',
                      borderColor: '#ced4da',
                      data: data.lastYear
                  }
              ]
          },
          options: {
              maintainAspectRatio: false,
              tooltips: {
                  mode: mode,
                  intersect: intersect,
                  callbacks: {
                      label: function(tooltipItem, data) {
                          return '$ ' + formatNumber(tooltipItem.value);
                      }
                  }
              },
              hover: {
                  mode: mode,
                  intersect: intersect
              },
              legend: {
                  display: false
              },
              scales: {
                  yAxes: [{
                      gridLines: {
                          display: true,
                          lineWidth: '4px',
                          color: 'rgba(0, 0, 0, .2)',
                          zeroLineColor: 'transparent'
                      },
                      ticks: $.extend({
                          beginAtZero: true,
                          callback: function(value) {
                              if (value >= 1000) {
                                  value /= 1000;
                                  value += 'k';
                              }
                              return '$' + value;
                          }
                      }, ticksStyle)
                  }],
                  xAxes: [{
                      display: true,
                      gridLines: {
                          display: false
                      },
                      ticks: ticksStyle
                  }]
              }
          }
      });
  }
  
  function formatNumber(num) {
      return new Intl.NumberFormat('en-US', {
          minimumFractionDigits: 2,
          maximumFractionDigits: 2
      }).format(num);
  }
  
  // Load initial data
  loadSalesData();
  
  // Refresh data when clicking "View Report"
  $('#refreshData').on('click', loadSalesData);
});