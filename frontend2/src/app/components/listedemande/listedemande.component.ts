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
  signs:any;
  test: any;
  list: any[]=[];
  constructor(private congeService: CongeService) { }
  


  ngOnInit(): void {
    this.getcongeData();
    this.getsignerstatus();
    
  }
 
  getcongeData(){
    this.congeService.getdemandes().subscribe(res =>{
       console.log(res);
      this.conges = res;
      this.count =  this.conges.length;
    })
  }

  getsignerstatus(){
    this.congeService.getdemandes().subscribe(res =>{
      this.signs = res;
      this.count =  this.signs.length;
      // console.log(this.count);
      for (let i = 0; i < this.count; i++) {
        this.test = res[i].ngsign.object.signers;
        this.list.push(this.test)
        
        
      }
      console.log(this.list);
    })
  }

}
