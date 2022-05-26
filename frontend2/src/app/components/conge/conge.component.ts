import { Component, OnInit } from '@angular/core';
import { PersonnelService } from 'src/app/service/personnel.service';
import { AuthService } from 'src/app/service/auth.service';

@Component({
  selector: 'app-conge',
  templateUrl: './conge.component.html',
  styleUrls: ['./conge.component.css']
})
export class CongeComponent implements OnInit {
  user:any;
  conge:any;
  count:any;
  userimagepath:any = 'http://127.0.0.1:8000/image/';
  constructor(
    private authService: AuthService,
    private personnelService: PersonnelService
    ) { }

  ngOnInit(): void {
     this.getUser();
      this.getPersonnelconge();
  }

  getUser(){
    this.authService.getuser().subscribe(res => {
      this.user = res;
    })
  }

  getPersonnelconge(){
    this.authService.getuser().subscribe(res => {
      this.personnelService.getconge(this.user.id).subscribe(res =>{
        this.conge = res;
        this.count =  this.conge.length;
        // console.log(this.conge);
        })
        
    })
    
    
  }
}
