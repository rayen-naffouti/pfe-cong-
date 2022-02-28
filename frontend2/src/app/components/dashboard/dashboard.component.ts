import { Component, OnInit } from '@angular/core';
import {Chart} from 'node_modules/chart.js'




declare function handle_Knob(): any;
declare function handle_SparklineCharts(): any;
declare function TodoApp(): any;
@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  constructor() { }

  ngOnInit(): void {
    handle_Knob();
    handle_SparklineCharts();
    

    
    
    
    var chart1 = new Chart("chart1", {
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
              y: {
                  beginAtZero: true
              }
          }
      }
    });


    var data4 = [
      {
          value: 300,
          color:"#01c0c8",
          highlight: "#01c0c8",
          label: "Megna"
      },
      {
          value: 50,
          color: "#25a6f7",
          highlight: "#25a6f7",
          label: "Blue"
      },
      {
          value: 100,
          color: "#fb9678",
          highlight: "#fb9678",
          label: "Orange"
      }
  ];

    var chart2 = new Chart("chart2", {
      type: 'pie',
      data: {
          labels: ['Red', 'Blue', 'Yellow'],
          datasets: [{
              label: '# of Votes',
              data: data4,
          }]
      },
      options: {
        
        responsive: true
      }
    });


  }

}
