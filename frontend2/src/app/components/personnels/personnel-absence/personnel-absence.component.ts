import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from "@angular/router";
import { AuthService } from 'src/app/service/auth.service';
import { PersonnelService } from 'src/app/service/personnel.service';
import { SignataireService } from 'src/app/service/signataire.service';

@Component({
  selector: 'app-personnel-absence',
  templateUrl: './personnel-absence.component.html',
  styleUrls: ['./personnel-absence.component.css']
})
export class PersonnelAbsenceComponent implements OnInit {
  PERS_MAT_95=this.route.snapshot.params['PERS_MAT_95'];
  userimagepath:any = 'http://127.0.0.1:8000/image/';
  persabs : any ;
  user:any;
  signs:any;
  list:any;
  personnels:any;

  constructor
  (private route: ActivatedRoute ,
    private personnelService: PersonnelService ,
    private signataireService: SignataireService,
    private authService: AuthService) { }

  ngOnInit(): void {
    this.getPersonnelData();
    this.getPersonnelabsence();
    this.getPersonnelSign();
  }

  addTask(item:string)
  {
      this.authService.getuser().subscribe(res => {
        this.user = res;
        this.list.push({PERS_ID:this.PERS_MAT_95,signataire_ID:item,order:this.list.length})
        console.log(this.list)
      })

  }
  removeTask(order:number)
  {
    this.list=this.list.filter(item=>item.order!==order);
  }
  chekTask()
  {
    console.log(this.list)
    this.signataireService.addsignataire(this.list);
  }
  getPersonnelSign(){
    this.signataireService.getsignataire(this.PERS_MAT_95).subscribe(res =>{
       
      this.list = res;
       console.log(this.list);
       })
  }
  
  getPersonnelData(){
    this.personnelService.getData().subscribe(res =>{
      this.personnels = res;
       console.log(this.personnels);
       })
  }

  getPersonnelabsence(){
    this.personnelService.getabsence(this.PERS_MAT_95).subscribe(res =>{
        console.log(res);
       this.persabs = res;
       })
  }
}
