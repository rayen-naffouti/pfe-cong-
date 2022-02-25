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

  constructor(private route: ActivatedRoute ,private personnelService: PersonnelService) { }

  ngOnInit(): void {
    
    this.getPersonnelabsence();
  }
  getPersonnelabsence(){
    this.personnelService.getabsence(this.PERS_MAT_95).subscribe(res =>{
       console.log(res);
       this.persabs = res;
       })
  }
}
