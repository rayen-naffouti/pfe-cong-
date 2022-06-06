import { Component, OnInit } from '@angular/core';
import { CongeService } from 'src/app/service/conge.service';
import { AuthService } from 'src/app/service/auth.service';
import { NgsignService } from 'src/app/service/ngsign.service';

@Component({
  selector: 'app-alldemandes',
  templateUrl: './alldemandes.component.html',
  styleUrls: ['./alldemandes.component.css']
})
export class AlldemandesComponent implements OnInit {
  userimagepath:any = 'http://127.0.0.1:8000/image/';
  src = 'http://127.0.0.1:8000/storage/storage/';
  uuid = '5914fb69-ee9c-406d-ab33-5bab15fb67dd';
  conges:any;
  count:any;
  user:any;
  signs:any;
  test: any;
  list: any[]=[];
  
  constructor(
    private congeService: CongeService,
    private authService: AuthService,
    private ngsignService:NgsignService
    ) { }

  ngOnInit(): void {
   
    this.getmydemandes();
    this.getsignerstatus();
    // this.getmydemandesngsign('5914fb69-ee9c-406d-ab33-5bab15fb67dd');
    // console.log(this.pdfsrc)
  }

  getmydemandes(){
    this.authService.getuser().subscribe(res => {
      this.user = res;
    this.congeService.getmydemandes(this.user.id).subscribe(res =>{
      this.conges = res;
      this.count =  this.conges.length;
       console.log(this.conges);
    })
  }) 
  }

  getsignerstatus(){
    this.authService.getuser().subscribe(res => {
      this.user = res;
    this.congeService.getmydemandes(this.user.id).subscribe(res =>{
      this.signs = res;
      this.count =  this.signs.length;
      // console.log(this.count);
      for (let i = 0; i < this.count; i++) {
        this.test = res[i].ngsign.object.signers;
        this.list.push(this.test)
        
        
      }
      console.log(this.list);
    })
  })
  }
}
