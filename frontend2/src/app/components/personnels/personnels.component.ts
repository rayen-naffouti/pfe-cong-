import { Component, OnInit } from '@angular/core';
import { PersonnelService } from 'src/app/service/personnel.service';

@Component({
  selector: 'app-personnels',
  templateUrl: './personnels.component.html',
  styleUrls: ['./personnels.component.css']
})
export class PersonnelsComponent implements OnInit {
  personnels:any;
count:any;

  constructor(private personnelService: PersonnelService) { }

  ngOnInit(): void {
    this.getPersonnelData();
    this.getPersonnelabs();
  }
  getPersonnelData(){
    this.personnelService.getData().subscribe(res =>{
      // console.log(res);
      this.personnels = res;
       })
  }
  getPersonnelabs(){
    this.personnelService.getabs().subscribe(res =>{
      // console.log(res);
      this.count = res;
       })
  }

  

}
