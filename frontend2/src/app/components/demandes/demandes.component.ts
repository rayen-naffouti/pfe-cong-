import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { PersonnelService } from 'src/app/service/personnel.service';
import { AuthService } from 'src/app/service/auth.service';

@Component({
  selector: 'app-demandes',
  templateUrl: './demandes.component.html',
  styleUrls: ['./demandes.component.css']
})
export class DemandesComponent implements OnInit {
  user:any;
  personnel:any;
  form!: FormGroup;
  constructor(
    private formBuilder: FormBuilder,
    private http: HttpClient,
    private router: Router,
    private authService: AuthService,
    private personnelService: PersonnelService
    ) {
    
   }
   
  
  ngOnInit(): void {
    this.getPersonnelData();
    this.form = this.formBuilder.group({
      natureconge :'',
      direction:'RH',
      debut :'',
      debutX:'',
      fin :'',
      finx :'',
      adresse :'',
      nbrjour :''
            
    });
  }

  

  getPersonnelData(){
    this.authService.getuser().subscribe(res => {
      this.user = res;
      this.personnelService.getpers(this.user.id).subscribe(res =>{
            this.personnel = res;

            this.form = this.formBuilder.group({
              PERS_ID: this.personnel[0].PERS_MAT_95,
              name: this.personnel[0].PERS_NOM,
              lastname: this.personnel[0].PERS_PRENOM,
              natureconge :'',
              matricule :this.personnel[0].PERS_MAT_ACT,
              natureagent :this.personnel[0].NATAG_LIB_X50,
              direction:'RH',
              debut :'',
              debutX:'',
              fin :'',
              finx :'',
              adresse :'',
              tel :this.personnel[0].PERS_TEL_98,
              nbrjour :''
                    
            });
       })
      })  
  }



  submit(): void {
    console.log(this.form.getRawValue())
  this.http.post('http://localhost:8000/api/demande',this.form.getRawValue())
         .subscribe();
   this.router.navigate(['/my_leaves'])
  }

}
