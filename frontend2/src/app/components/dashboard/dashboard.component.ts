import { Component, OnInit } from '@angular/core';
import {Chart} from 'node_modules/chart.js'
import { DashboardService } from 'src/app/service/dashboard.service';
import "jquery";
import '../../../assets/assets/js/cmp-todo.js';



declare function handle_Knob(): any;
declare function handle_SparklineCharts(): any;
declare function handle_MonthlyCalendar(): any;
declare var TodoApp: any;
@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  template: `
  <app-navbar></app-navbar>
  <router-outlet></router-outlet>
  `,
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {
  stats:any;
  constructor( private dashboardService: DashboardService) { }

  ngOnInit(): void {
    this.getstats();
    handle_Knob();
    handle_SparklineCharts();
    handle_MonthlyCalendar();
    
  
  }
  getstats(){
    this.dashboardService.getStats().subscribe(res =>{
       
     this.stats = res;
    //  console.log(this.stats)
          
    var chart1 = new Chart("chart1", {
      type: 'pie',
      data: {
            
          datasets: [{
              label: '# of Votes',
              data: [this.stats.homme,this.stats.femme],
              backgroundColor: [
                  '#ff4859',
                  '#7ec85a'
              ],
              borderColor: [
                  '#ff4859',
                  '#7ec85a'
                  
              ],
              borderWidth: 1
          }]
      },
      options: {responsive: false,
      }
    });
    var chart2 = new Chart("chart2", {
      type: 'bar',
      data: {
          labels: ['exceptionnel', 'recupertaion',  'annuelle'],
          datasets: [{
              label: '# Solde',
              data: [this.stats.exceptionnel, this.stats.recupertaion,  this.stats.annuelle],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(153, 102, 255, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(153, 102, 255, 1)'
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
       })
  }
 

}
