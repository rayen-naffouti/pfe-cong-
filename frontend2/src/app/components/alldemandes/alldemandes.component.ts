import { Component, OnInit } from '@angular/core';
import { CongeService } from 'src/app/service/conge.service';
import { AuthService } from 'src/app/service/auth.service';

@Component({
  selector: 'app-alldemandes',
  templateUrl: './alldemandes.component.html',
  styleUrls: ['./alldemandes.component.css']
})
export class AlldemandesComponent implements OnInit {
  userimagepath:any = 'http://127.0.0.1:8000/image/';
  src = 'http://127.0.0.1:8000/storage/storage/-562163623_1650971664.pdf';
  conges:any;
  count:any;
  user:any;
  constructor(private congeService: CongeService,private authService: AuthService,) { }

  ngOnInit(): void {
   
    this.getmydemandes();
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
}
