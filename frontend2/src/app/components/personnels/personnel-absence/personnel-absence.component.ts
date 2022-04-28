import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from "@angular/router";
import { PersonnelService } from 'src/app/service/personnel.service';

@Component({
  selector: 'app-personnel-absence',
  templateUrl: './personnel-absence.component.html',
  styleUrls: ['./personnel-absence.component.css']
})
export class PersonnelAbsenceComponent implements OnInit {
  PERS_MAT_95=this.route.snapshot.params['PERS_MAT_95'];
  persabs : any ;
  list:any[]=[];
  personnels:any;

  constructor(private route: ActivatedRoute ,private personnelService: PersonnelService) { }

  ngOnInit(): void {
    this.getPersonnelData();
    this.getPersonnelabsence();
  }

  addTask(item:string)
  {
    this.list.push({id:this.list.length,name:item})
  

  }
  removeTask(id:number)
  {
    this.list=this.list.filter(item=>item.id!==id);
  }
  chekTask()
  {
    console.log(this.list)
  }
  
  getPersonnelData(){
    this.personnelService.getData().subscribe(res =>{
       
      this.personnels = res;
       console.log(this.personnels);
       })
  }

  getPersonnelabsence(){
    this.personnelService.getabsence(this.PERS_MAT_95).subscribe(res =>{
        // console.log(res);
       this.persabs = res;
       })
  }
}
