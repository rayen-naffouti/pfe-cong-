import { Component, OnInit } from '@angular/core';

import { CongeService } from 'src/app/service/conge.service';

@Component({
  selector: 'app-listedemande',
  templateUrl: './listedemande.component.html',
  styleUrls: ['./listedemande.component.css']
})
export class ListedemandeComponent implements OnInit {
  userimagepath:any = 'http://127.0.0.1:8000/image/';
  conges:any;
  count:any;
  
  constructor(private congeService: CongeService) { }
  


  ngOnInit(): void {
    this.getcongeData();
  }
 
  getcongeData(){
    this.congeService.getdemandes().subscribe(res =>{
       console.log(res);
      this.conges = res;
      this.count =  this.conges.length;
    })
  }

}
